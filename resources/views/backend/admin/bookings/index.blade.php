@extends('backend.layouts.app')

@section('title', 'Bookings')

@section('content')
    <div class="page">
        <div class="row align-items-center mb-4">
            <div class="col-8">
                <p class="title">Bookings</p>
                <p class="description">Manage booking details here.</p>
            </div>
            <div class="col-4 text-end">
                <a href="{{ route('backend.bookings.create') }}" class="add-button">
                    <i class="bi bi-plus-lg"></i>
                    Add New Booking
                </a>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-12">
                <form action="{{ route('backend.bookings.filter') }}" method="GET" class="filter-form">
                    <select class="form-select input-field js-single w-100" id="selected_tenant" name="selected_tenant">
                        <option value="">Select tenant</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ isset($selected_tenant) && $selected_tenant == $user->id ? "selected" : "" }}>{{ $user->first_name }} {{ $user->last_name }}</option>
                        @endforeach
                    </select>

                    <select class="form-select input-field js-single" id="selected_warehouse" name="selected_warehouse">
                        <option value="">Select warehouse</option>
                        @foreach($warehouses as $warehouse)
                            <option value="{{ $warehouse->id }}" {{ isset($selected_warehouse) && $selected_warehouse == $warehouse->id ? "selected" : "" }}>{{ $warehouse->name }}</option>
                        @endforeach
                    </select>

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
                                <th scope="col">TENANT</th>
                                <th scope="col">WAREHOUSE</th>
                                <th scope="col">PALLETS RENTED</th>
                                <th scope="col">TOTAL RENT</th>
                                <th scope="col">TENANCY DATE</th>
                                <th scope="col">RENEWAL DATE</th>
                                <th scope="col">STATUS</th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if(count($items) > 0)
                                @foreach($items as $item)
                                    <tr>
                                        <td>{!! $item->tenant !!}</td>
                                        <td>{!! $item->warehouse !!}</td>
                                        <td>{{ $item->no_of_pallets }}</td>
                                        <td>{{ $item->total_rent }}</td>
                                        <td>{{ $item->tenancy_date }}</td>
                                        <td>{{ $item->renewal_date }}</td>
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

        <x-backend.delete data="booking"></x-backend.delete>
        <x-backend.notification></x-backend.notification>
    </div>
@endsection


@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('.page .table .delete-button').on('click', function() {
                let id = $(this).attr('id');
                let url = "{{ route('backend.bookings.destroy', [':id']) }}";
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