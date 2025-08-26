@extends('backend.layouts.app')

@section('title', ' Terms of Use')

@section('content')

    <div class="inner-page">
        <form action="{{ route('admin.pages.terms-of-use.update', $language) }}" method="POST" enctype="multipart/form-data" class="form">
            @csrf
            <div class="page-details">
                <p class="title">{{ ucfirst($language) }} Language</p>
                <p class="description">View or update page content here.</p>
            </div>

            <div class="row mb-3 mb-md-4">
                <div class="col-12">
                    <label for="page_name_{{ $short_code }}" class="form-label label">Page Name<span class="asterisk">*</span></label>
                    <input type="text" class="form-control input-field" id="page_name_{{ $short_code }}" name="page_name_{{ $short_code }}" value="{{ $contents->{'page_name_' . $short_code} ?? '' }}" placeholder="Page Name" required>
                </div>
            </div>

            <div class="section mb-3 mb-md-4">
                <div class="row mb-3 mb-md-4">
                    <div class="col-12 mb-3 mb-md-4">
                        <label for="title_{{ $short_code }}" class="form-label label">Title</label>
                        <input type="text" class="form-control input-field" id="title_{{ $short_code }}" name="title_{{ $short_code }}" value="{{ $contents->{'title_' . $short_code} ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-12">
                        <label for="description_{{ $short_code }}" class="form-label label">Description<span class="asterisk">*</span></label>
                        <textarea class="form-control input-field textarea" rows="5" id="description_{{ $short_code }}" name="description_{{ $short_code }}" placeholder="Description" value="{{ $contents->{'description_' . $short_code} ?? '' }}" required>{{ $contents->{'description_' . $short_code} ?? '' }}</textarea>
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-12 col-md-9 mb-0">
                        <label class="form-label label">Contents</label>
                    </div>

                    <div class="col-12 col-md-3 mb-0 text-end">
                        <button type="button" class="add-row-button">
                            <i class="bi bi-plus-lg"></i>
                            Add Content
                        </button>
                    </div>
                </div>

                @if($contents->{'content_' . $short_code})
                    @foreach(json_decode($contents->{'content_' . $short_code}) as $content)
                        <div class="row single-item mt-4">
                            <div class="col-12 mb-2">
                                <input type="text" class="form-control input-field" name="tab_titles[]" value="{{ $content->title }}" placeholder="Title" required>
                            </div>

                            <div class="col-12 col-md-11 mb-2 mb-md-0">
                                <textarea class="editor froala-initialized" name="tab_contents[]" placeholder="Content" value="{{ $content->content }}">{{ $content->content }}</textarea>
                            </div>
                            
                            <div class="col-12 col-md-1 d-flex align-items-center">
                                <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <button type="submit" class="submit-button">Save Changes</button>

            <x-backend.notification></x-backend.notification>
        </form>
    </div>

@endsection


@push('after-scripts')
    <script>
        $(document).on('click', '.delete-button', function() {
            $(this).closest('.single-item').remove();
        });

        $('.add-row-button').on('click', function() {
            let html = `<div class="row single-item mt-4">
                                <div class="col-12 mb-2">
                                    <input type="text" class="form-control input-field" name="tab_titles[]" placeholder="Title" required>
                                </div>

                                <div class="col-12 col-md-11 mb-2 mb-md-0">
                                    <textarea class="editor" name="tab_contents[]" placeholder="Content"></textarea>
                                </div>

                                <div class="col-12 col-md-1 d-flex align-items-center">
                                    <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                </div>
                            </div>`;

            const newRow = $(this).closest('.row').parent().append(html);

            newRow.find('.editor').each((index, element) => {
                if(!element.classList.contains('froala-initialized')) {
                    new FroalaEditor(element, {
                        imageUploadURL: '/admin/froala/upload',
                        imageUploadParam: 'upload',
                        imageAllowedTypes: ['jpeg', 'jpg', 'png', 'gif'],
                        imageMaxSize: 2 * 1024 * 1024,
                        requestHeaders: {
                            'X-CSRF-TOKEN': csrfToken
                        },
                        events: {
                            'image.uploaded': function (response) {
                                console.log('Uploaded:', response);
                            },
                            'image.error': function (error, response) {
                                console.error('Upload failed:', error);
                            },
                            'image.removed': function ($img) {
                                const imageSrc = $img.attr('src');
                                if(imageSrc) {
                                    fetch('/admin/froala/delete', {
                                        method: 'POST',
                                        headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': csrfToken
                                        },
                                        body: JSON.stringify({ src: imageSrc })
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        console.log('Image deleted:', data);
                                    })
                                    .catch(err => {
                                        console.error('Failed to delete image:', err);
                                    });
                                }
                            }
                        }
                    });

                    element.classList.add('froala-initialized');
                }
            });
        });
    </script>
@endpush