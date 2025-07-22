@extends('backend.layouts.app')

@section('title', 'Warehouses')

@section('content')
    <div class="page">
        <div class="row align-items-center mb-4">
            <div class="col-8">
                <p class="title">Warehouses</p>
                <p class="description">Manage warehouse details here.</p>
            </div>
            <div class="col-4 text-end">
                <a href="{{ route('landlord.warehouses.create') }}" class="add-button">
                    <i class="bi bi-plus-lg"></i>
                    Add New Warehouse
                </a>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-12">
                <form class="filter-form">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                        <input type="text" class="form-control input-field" name="name" value="{{ $name ?? '' }}" placeholder="Search by Name">
                    </div>

                    <input type="text" class="form-control input-field width" name="address" value="{{ $address ?? '' }}" placeholder="Address">

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
                                <th scope="col">NAME (EN) <i class="bi bi-arrows-vertical sort-icon" data-name="name_en" data-order="desc"></i></th>
                                <th scope="col">ADDRESS (EN) <i class="bi bi-arrows-vertical sort-icon" data-name="address_en" data-order="desc"></i></th>
                                <th scope="col">TOTAL AREA <i class="bi bi-arrows-vertical sort-icon" data-name="total_area" data-order="desc"></i></th>
                                <th scope="col">TOTAL PALLETS <i class="bi bi-arrows-vertical sort-icon" data-name="total_pallets" data-order="desc"></i></th>
                                <th scope="col">STATUS <i class="bi bi-arrows-vertical sort-icon" data-name="status" data-order="desc"></i></th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                        </thead>

                        <tbody id="tbody">
                            @if(count($items) > 0)
                                @foreach($items as $item)
                                    <tr>
                                        <td>{{ $item->name_en }}</td>
                                        <td>{{ $item->address_en }}</td>
                                        <td>{{ $item->total_area }}</td>
                                        <td>{{ $item->total_pallets }}</td>
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

        <x-backend.delete data="warehouse"></x-backend.delete>
        <x-backend.notification></x-backend.notification>
    </div>
@endsection


@push('after-scripts')
    <script>
        window.moduleRoutes = {
            destroyRoute: "{{ route('landlord.warehouses.destroy', [':id']) }}",
            filterRoute: "{{ route('landlord.warehouses.filter') }}",
            indexRoute: "{{ route('landlord.warehouses.index') }}",
            pageUrl: "{!! $items->url(1) !!}"
        };
    </script>

    <script src="{{ asset('backend/js/index-script.js') }}"></script>
@endpush