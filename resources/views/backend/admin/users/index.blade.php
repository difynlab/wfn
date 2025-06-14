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
                        <input type="text" class="form-control input-field" name="name" placeholder="Search by Name">
                    </div>

                    <select class="form-select input-field width" name="role">
                        <option>User Role</option>
                        <option>Admin</option>
                        <option>Manager</option>
                        <option>Landlord</option>
                        <option>Tenant</option>
                    </select>

                    <input type="text" class="form-control input-field width" name="city" placeholder="City">

                    <select class="form-select input-field width" name="order_by">
                        <option>Order by: A-Z</option>
                        <option>A-Z</option>
                        <option>Z-A</option>
                    </select>

                    <select class="form-select input-field width" name="status">
                        <option>Status</option>
                        <option>Active</option>
                        <option>Inactive</option>
                    </select>

                    <a href="" class="form-control input-field reset">
                        <span>⟲</span>
                        Reset Filter
                    </a>

                    <button class="apply-button">Apply Filters</button>
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

        <x-backend.delete-data title="User"></x-backend.delete-data>
    </div>

@endsection


@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('.page .table .delete-button').on('click', function() {
                let id = $(this).attr('id');
                let url = "{{ route('admin.users.destroy', [':id']) }}";
                destroy_url = url.replace(':id', id);

                $('.page .delete-modal form').attr('action', destroy_url);
                $('.page .delete-modal').modal('show');
            });

            $(".page .pagination-form select").change(function () {
                window.location = "{!! $users->url(1) !!}&items=" + this.value; 
            });
        });
    </script>
@endpush