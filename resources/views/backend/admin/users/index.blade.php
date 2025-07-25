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
                <form class="filter-form">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                        <input type="text" class="form-control input-field" name="name" value="{{ $name ?? '' }}" placeholder="Search by Name">
                    </div>

                    <input type="text" class="form-control input-field width" name="city" value="{{ $city ?? '' }}" placeholder="City">

                    <select class="form-select input-field width" name="role">
                        <option value="">User Role</option>
                        <option value="admin" {{ isset($role) && $role == 'admin' ? "selected" : "" }}>Admin</option>
                        <option value="landlord" {{ isset($role) && $role == 'landlord' ? "selected" : "" }}>Landlord</option>
                        <option value="tenant" {{ isset($role) && $role == 'tenant' ? "selected" : "" }}>Tenant</option>
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
                                <th scope="col">CITY <i class="bi bi-arrows-vertical sort-icon" data-name="city" data-order="desc"></i></th>
                                <th scope="col">COUNTRY <i class="bi bi-arrows-vertical sort-icon" data-name="country" data-order="desc"></i></th>
                                <th scope="col">EMAIL <i class="bi bi-arrows-vertical sort-icon" data-name="email" data-order="desc"></i></th>
                                <th scope="col">ROLE <i class="bi bi-arrows-vertical sort-icon" data-name="role" data-order="desc"></i></th>
                                <th scope="col">STATUS <i class="bi bi-arrows-vertical sort-icon" data-name="status" data-order="desc"></i></th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                        </thead>

                        <tbody id="tbody">
                            @if(count($items) > 0)
                                @foreach($items as $item)
                                    <tr>
                                        <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                                        <td>{{ $item->city ?? '-' }}</td>
                                        <td>{{ $item->country ?? '-' }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ ucfirst($item->role) }}</td>
                                        <td>{!! $item->status !!}</td>
                                        <td>{!! $item->action !!}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" class="text-center">No data available in the table</td>
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

        <x-backend.delete data="user"></x-backend.delete>
        <x-backend.notification></x-backend.notification>
    </div>
@endsection


@push('after-scripts')
    <script>
        window.moduleRoutes = {
            destroyRoute: "{{ route('admin.users.destroy', [':id']) }}",
            filterRoute: "{{ route('admin.users.filter') }}",
            indexRoute: "{{ route('admin.users.index') }}",
            pageUrl: "{!! $items->url(1) !!}"
        };
    </script>

    <script src="{{ asset('backend/js/index-script.js') }}"></script>
@endpush