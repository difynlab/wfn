@extends('backend.layouts.app')

@section('title', 'Articles')

@section('content')
    <div class="page">
        <div class="row align-items-center mb-4">
            <div class="col-8">
                <p class="title">Articles</p>
                <p class="description">Manage article here.</p>
            </div>
            <div class="col-4 text-end">
                <a href="{{ route('admin.articles.create') }}" class="add-button">
                    <i class="bi bi-plus-lg"></i>
                    Add New Article
                </a>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-12">
                <form class="filter-form">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                        <input type="text" class="form-control input-field" name="title" value="{{ $title ?? '' }}" placeholder="Search by Title">
                    </div>

                    <select class="form-select input-field js-single" id="category" name="category">
                        <option value="">Category</option>
                        @foreach($article_categories as $article_category)
                            <option value="{{ $article_category->id }}" {{ isset($category) && $category == $article_category->id ? "selected" : "" }}>{{ $article_category->name }}</option>
                        @endforeach
                    </select>

                    <select class="form-select input-field width" name="status">
                        <option value="">Status</option>
                        <option value="1" {{ isset($status) && $status == 1 ? "selected" : "" }}>Active</option>
                        <option value="0" {{ isset($status) && $status == 0 ? "selected" : "" }}>Inactive</option>
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
                                <th scope="col">THUMBNAIL</th>
                                <th scope="col">TITLE <i class="bi bi-arrows-vertical sort-icon" data-name="title" data-order="desc"></i></th>
                                <th scope="col">CATEGORY</th>
                                <th scope="col">STATUS <i class="bi bi-arrows-vertical sort-icon" data-name="status" data-order="desc"></i></th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                        </thead>

                        <tbody id="tbody">
                            @if(count($items) > 0)
                                @foreach($items as $item)
                                    <tr>
                                        <td>{!! $item->thumbnail !!}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->articleCategory->name }}</td>
                                        <td>{!! $item->status !!}</td>
                                        <td>{!! $item->action !!}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" style="text-align: center;">No data available in the table</td>
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

        <x-backend.delete data="article"></x-backend.delete>
        <x-backend.notification></x-backend.notification>
    </div>
@endsection


@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('.page .table .delete-button').on('click', function() {
                let id = $(this).attr('id');
                let url = "{{ route('admin.articles.destroy', [':id']) }}";
                destroy_url = url.replace(':id', id);

                $('.page #delete-modal form').attr('action', destroy_url);
                $('.page #delete-modal').modal('show');
            });

            $(".page .custom-pagination select").change(function () {
                window.location = "{!! $items->url(1) !!}&pagination=" + this.value; 
            });

            function fetchFiltered(sortColumn = null, sortDirection = null) {
                const url = "{{ route('admin.articles.filter') }}";

                let formObject = {};
                $('.filter-form').serializeArray().forEach(function (field) {
                    formObject[field.name] = field.value;
                });

                if(sortColumn && sortDirection) {
                    formObject.column = sortColumn;
                    formObject.direction = sortDirection;
                }

                $.ajax({
                    url: url,
                    type: 'GET',
                    data: formObject,
                    success: function (response) {
                        $('#tbody').html(response.tbody);
                        $('#pagination').html(response.pagination);
                    },
                    error: function () {
                        alert('Something went wrong while loading data.');
                    }
                });
            }

            $('.filter-form input, .filter-form select').on('input change', function () {
                fetchFiltered();
            });

            $('.sort-icon').on('click', function () {
                let name = $(this).data('name');
                let orderBy = $(this).data('orderby');

                orderBy = orderBy === 'asc' ? 'desc' : 'asc';
                $(this).data('orderby', orderBy);

                fetchFiltered(name, orderBy);
            });

            $('.reset').on('click', function () {
                window.location = "{{ route('admin.articles.index') }}";
            });
        });
    </script>
@endpush