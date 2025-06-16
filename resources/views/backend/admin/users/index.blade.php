@extends('backend.layouts.app')

@section('title', 'Users')

@section('content')
    <div class="page">
        <div class="row align-items-center mb-4">
            <div class="col-8">
                <p class="title">Users</p>
                <p class="description">Manage user accounts, roles, and activity here.</p>
            </div>
            <div class="col-4 text-end">
                <a href="{{ route('admin.users.create') }}" class="add-button">
                    <i class="bi bi-plus-lg"></i>
                    Add New User
                </a>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-12">
                <form action="{{ route('admin.users.filter') }}" method="GET" class="filter-form">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                        <input type="text" class="form-control input-field" name="name" value="{{ $name ?? '' }}" placeholder="Search by Name">
                    </div>

                    <select class="form-select input-field width" name="role">
                        <option value="">User Role</option>
                        <option value="admin" {{ isset($role) && $role == 'admin' ? "selected" : "" }}>Admin</option>
                        <option value="manager" {{ isset($role) && $role == 'manager' ? "selected" : "" }}>Manager</option>
                        <option value="landlord" {{ isset($role) && $role == 'landlord' ? "selected" : "" }}>Landlord</option>
                        <option value="tenant" {{ isset($role) && $role == 'tenant' ? "selected" : "" }}>Tenant</option>
                    </select>

                    <input type="text" class="form-control input-field width" name="city" value="{{ $city ?? '' }}" placeholder="City">

                    <select class="form-select input-field width" name="order_by">
                        <option value="">Order by: Z-A</option>
                        <option value="a-z" {{ isset($order_by) && $order_by == 'a-z' ? "selected" : "" }}>A-Z</option>
                        <option value="z-a" {{ isset($order_by) && $order_by == 'z-a' ? "selected" : "" }}>Z-A</option>
                    </select>

                    <select class="form-select input-field width" name="status">
                        <option value="">Status</option>
                        <option value="1" {{ isset($status) && $status == '1' ? "selected" : "" }}>Active</option>
                        <option value="2" {{ isset($status) && $status == '2' ? "selected" : "" }}>Inactive</option>
                    </select>

                    <input type="submit" class="form-control input-field reset" name="action" value="⟲ Reset Filter">

                    <input type="submit" class="apply-button" name="action" value="Apply Filters">
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <x-backend.pagination items="{{ $items }}"></x-backend.pagination>
            
                <div class="table-container">
                    <table class="table w-100">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">NAME</th>
                                <th scope="col">CITY</th>
                                <th scope="col">COUNTRY</th>
                                <th scope="col">EMAIL</th>
                                <th scope="col">ROLE</th>
                                <th scope="col">STATUS</th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if(count($users) > 0)
                                @foreach($users as $user)
                                    <tr>
                                        <td>#{{ $user->id }}</td>
                                        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                        <td>{{ $user->city }}</td>
                                        <td>{{ $user->country }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>{!! $user->status !!}</td>
                                        <td>{!! $user->action !!}</td>
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

                {{ $users->appends(request()->except('page'))->links("pagination::bootstrap-5") }}
            </div>
        </div>

        <x-backend.delete data="user"></x-backend.delete>
        <x-backend.notification></x-backend.notification>
    </div>
@endsection


@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('.page .table .delete-button').on('click', function() {
                let id = $(this).attr('id');
                let url = "{{ route('admin.users.destroy', [':id']) }}";
                destroy_url = url.replace(':id', id);

                $('.page #delete-modal form').attr('action', destroy_url);
                $('.page #delete-modal').modal('show');
            });

            $(".page .custom-pagination select").change(function () {
                window.location = "{!! $users->url(1) !!}&items=" + this.value; 
            });
        });
    </script>
@endpush