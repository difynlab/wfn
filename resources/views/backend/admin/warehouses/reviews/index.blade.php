@extends('backend.layouts.app')

@section('title', 'Warehouse Reviews')

@section('content')
    <div class="page">
        <div class="row align-items-center mb-3 mb-md-4">
            <div class="col-12 mb-3 mb-md-0 col-md-8">
                <p class="title">Warehouse Reviews</p>
                <p class="description">Manage warehouse review details here.</p>
            </div>

            <div class="col-12 col-md-4 text-end">
                <a href="{{ route('admin.warehouses.reviews.create', $warehouse) }}" class="add-button">
                    <i class="bi bi-plus-lg"></i>
                    Add New Warehouse Review
                </a>
            </div>
        </div>

        <!-- <div class="row mb-3 mb-md-4">
            <div class="col-12">
                <form class="filter-form">
                    <select class="form-select input-field width" name="status">
                        <option value="">Status</option>
                        <option value="1" {{ isset($status) && $status == 1 ? "selected" : "" }}>Active</option>
                        <option value="0" {{ isset($status) && $status == 0 ? "selected" : "" }}>Inactive</option>
                        <option value="2" {{ isset($status) && $status == 2 ? "selected" : "" }}>Pending</option>
                    </select>

                    <button type="button" class="form-control input-field reset">⟲ Reset Filters</button>
                </form>
            </div>
        </div> -->

        <div class="row">
            <div class="col-12">
                <x-backend.pagination pagination="{{ $pagination }}"></x-backend.pagination>
            
                <div class="table-container">
                    <table class="table w-100">
                        <thead>
                            <tr>
                                <th scope="col">TENANT</th>
                                <th scope="col">CONTENT <i class="bi bi-arrows-vertical sort-icon" data-name="content" data-order="desc"></i></th>
                                <th scope="col">STAR <i class="bi bi-arrows-vertical sort-icon" data-name="star" data-order="desc"></i></th>
                                <th scope="col">LANGUAGE <i class="bi bi-arrows-vertical sort-icon" data-name="language" data-order="desc"></i></th>
                                <th scope="col">STATUS <i class="bi bi-arrows-vertical sort-icon" data-name="status" data-order="desc"></i></th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                        </thead>

                        <tbody id="tbody">
                            @if(count($items) > 0)
                                @foreach($items as $item)
                                    <tr>
                                        <td>{!! $item->tenant !!}</td>
                                        <td>{{ $item->content }}</td>
                                        <td>{{ $item->star }}</td>
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

        <x-backend.delete data="warehouse-review"></x-backend.delete>
        <x-backend.notification></x-backend.notification>
    </div>
@endsection


@push('after-scripts')
    <script>
        let warehouse_id = '<?php echo $warehouse->id?>';
        window.moduleRoutes = {
            destroyRoute: "{{ route('admin.warehouses.reviews.destroy', [':warehouse_id', ':id']) }}"
                         .replace(':warehouse_id', "{{ $warehouse->id }}"),
            indexRoute: "{{ route('admin.warehouses.reviews.index', [':warehouse_id']) }}",
            pageUrl: "{!! $items->url(1) !!}"
        };
    </script>

    <script src="{{ asset('backend/js/index-script.js') }}"></script>
@endpush