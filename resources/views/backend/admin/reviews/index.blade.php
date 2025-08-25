@extends('backend.layouts.app')

@section('title', 'Reviews')

@section('content')
    <div class="page">
        <div class="row align-items-center mb-3 mb-md-4">
            <div class="col-12 mb-3 mb-md-0 col-md-8">
                <p class="title">Reviews</p>
                <p class="description">Manage reviews here.</p>
            </div>
            <div class="col-12 col-md-4 text-end">
                <a href="{{ route('admin.reviews.create') }}" class="add-button">
                    <i class="bi bi-plus-lg"></i>
                    Add New Review
                </a>
            </div>
        </div>

        <div class="row mb-3 mb-md-4">
            <div class="col-12">
                <form class="filter-form">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                        <input type="text" class="form-control input-field" name="name" value="{{ $name ?? '' }}" placeholder="Search by Name">
                    </div>

                    <select class="form-select input-field width" name="language">
                        <option value="">Language</option>
                        <option value="english" {{ isset($language) && $language == 'english' ? "selected" : "" }}>English</option>
                        <option value="arabic" {{ isset($language) && $language == 'arabic' ? "selected" : "" }}>Arabic</option>
                    </select>

                    <select class="form-select input-field width" name="status">
                        <option value="">Status</option>
                        <option value="1" {{ isset($status) && $status == 1 ? "selected" : "" }}>Active</option>
                        <option value="0" {{ isset($status) && $status == 0 ? "selected" : "" }}>Inactive</option>
                        <option value="2" {{ isset($status) && $status == 2 ? "selected" : "" }}>Pending</option>
                    </select>

                    <button type="button" class="form-control input-field reset">⟲ Reset Filters</button>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <x-backend.pagination pagination="{{ $pagination }}"></x-backend.pagination>
            
                <div class="table-container">
                    <table class="table w-100">
                        <thead>
                            <tr>
                                <th scope="col">NAME <i class="bi bi-arrows-vertical sort-icon" data-name="name" data-order="desc"></i></th>
                                <th scope="col">DESIGNATION <i class="bi bi-arrows-vertical sort-icon" data-name="designation" data-order="desc"></i></th>
                                <th scope="col">CONTENT <i class="bi bi-arrows-vertical sort-icon" data-name="content" data-order="desc"></i></th>
                                <th scope="col">LANGUAGE <i class="bi bi-arrows-vertical sort-icon" data-name="language" data-order="desc"></i></th>
                                <th scope="col">STATUS <i class="bi bi-arrows-vertical sort-icon" data-name="status" data-order="desc"></i></th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                        </thead>

                        <tbody id="tbody">
                            @if(count($items) > 0)
                                @foreach($items as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->designation }}</td>
                                        <td>{{ $item->content }}</td>
                                        <td>{{ ucfirst($item->language) }}</td>
                                        <td>{!! $item->status !!}</td>
                                        <td>{!! $item->action !!}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" style="text-align: center;">No data available in the table</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <div id="pagination">
                    {{ $items->appends(request()->except('page'))->links("pagination::bootstrap-5") }}
                </div>
            </div>
        </div>

        <x-backend.delete data="review"></x-backend.delete>
        <x-backend.notification></x-backend.notification>
    </div>
@endsection


@push('after-scripts')
    <script>
        window.moduleRoutes = {
            destroyRoute: "{{ route('admin.reviews.destroy', [':id']) }}",
            filterRoute: "{{ route('admin.reviews.filter') }}",
            indexRoute: "{{ route('admin.reviews.index') }}",
            pageUrl: "{!! $items->url(1) !!}"
        };
    </script>

    <script src="{{ asset('backend/js/index-script.js') }}"></script>
@endpush