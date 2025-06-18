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
                <a href="{{ route('admin.warehouses.create') }}" class="add-button">
                    <i class="bi bi-plus-lg"></i>
                    Add New Warehouse
                </a>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-12">
                <form action="{{ route('admin.warehouses.filter') }}" method="GET" class="filter-form">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                        <input type="text" class="form-control input-field" name="name" value="{{ $name ?? '' }}" placeholder="Search by Name">
                    </div>

                    <input type="text" class="form-control input-field width" name="city" value="{{ $city ?? '' }}" placeholder="City">

                    <select class="form-select input-field width" name="order_by">
                        <option value="">Order by: Z-A</option>
                        <option value="a-z" {{ isset($order_by) && $order_by == 'a-z' ? "selected" : "" }}>A-Z</option>
                        <option value="z-a" {{ isset($order_by) && $order_by == 'z-a' ? "selected" : "" }}>Z-A</option>
                    </select>

                    <select class="form-select input-field width" name="status">
                        <option value="">Status</option>
                        <option value="1" {{ isset($status) && $status == 1 ? "selected" : "" }}>Active</option>
                        <option value="0" {{ isset($status) && $status == 0 ? "selected" : "" }}>Inactive</option>
                    </select>

                    <input type="submit" class="form-control input-field reset" name="action" value="⟲ Reset Filter">

                    <input type="submit" class="apply-button" name="action" value="Apply Filters">
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
                                <th scope="col">ID</th>
                                <th scope="col">NAME</th>
                                <th scope="col">CITY</th>
                                <th scope="col">COUNTRY</th>
                                <th scope="col">TOTAL PALLETS</th>
                                <th scope="col">AVAILABLE PALLETS</th>
                                <th scope="col">RENTED PALLETS</th>
                                <th scope="col">STATUS</th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if(count($items) > 0)
                                @foreach($items as $item)
                                    <tr>
                                        <td>#{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->city }}</td>
                                        <td>{{ $item->country }}</td>
                                        <td>{{ $item->pallets }}</td>
                                        <td>{{ $item->available_pallets }}</td>
                                        <td>{{ $item->rented_pallets }}</td>
                                        <td>{!! $item->status !!}</td>
                                        <td>{!! $item->action !!}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8" style="text-align: center;">No data available in the table</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                {{ $items->appends(request()->except('page'))->links("pagination::bootstrap-5") }}
            </div>
        </div>

        <x-backend.delete data="warehouse"></x-backend.delete>
        <x-backend.notification></x-backend.notification>
    </div>
@endsection


@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('.page .table .delete-button').on('click', function() {
                let id = $(this).attr('id');
                let url = "{{ route('admin.warehouses.destroy', [':id']) }}";
                destroy_url = url.replace(':id', id);

                $('.page #delete-modal form').attr('action', destroy_url);
                $('.page #delete-modal').modal('show');
            });

            $(".page .custom-pagination select").change(function () {
                window.location = "{!! $items->url(1) !!}&pagination=" + this.value; 
            });
        });
    </script>
@endpush