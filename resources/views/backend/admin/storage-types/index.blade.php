@extends('backend.layouts.app')

@section('title', 'Storage Types')

@section('content')
    <div class="page">
        <div class="row align-items-center mb-4">
            <div class="col-8">
                <p class="title">Storage Types</p>
                <p class="description">Manage storage types here.</p>
            </div>
            <div class="col-4 text-end">
                <a href="{{ route('admin.storage-types.create') }}" class="add-button">
                    <i class="bi bi-plus-lg"></i>
                    Add New Storage Type
                </a>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-12">
                <form action="{{ route('admin.storage-types.filter') }}" method="GET" class="filter-form">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                        <input type="text" class="form-control input-field" name="name" value="{{ $name ?? '' }}" placeholder="Search by Name">
                    </div>

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
                                <th scope="col">NAME</th>
                                <th scope="col">STATUS</th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if(count($items) > 0)
                                @foreach($items as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{!! $item->status !!}</td>
                                        <td>{!! $item->action !!}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" style="text-align: center;">No data available in the table</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                {{ $items->appends(request()->except('page'))->links("pagination::bootstrap-5") }}
            </div>
        </div>

        <x-backend.delete data="storage type"></x-backend.delete>
        <x-backend.notification></x-backend.notification>
    </div>
@endsection


@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('.page .table .delete-button').on('click', function() {
                let id = $(this).attr('id');
                let url = "{{ route('admin.storage-types.destroy', [':id']) }}";
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