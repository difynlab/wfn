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
                    <div class="row align-items-center">
                        <div class="col-3">
                            <input type="text" class="form-control" name="name" value="{{ $name ?? '' }}" placeholder="Name">
                        </div>

                        <div class="col-3">
                            <input type="text" class="form-control" name="email" value="{{ $email ?? '' }}" placeholder="Email">
                        </div>

                        <div class="col-3">
                            <select class="form-control form-select" name="language">
                                <option value="All" selected>All languages</option>
                                <option value="English" {{ isset($language) && $language == 'English' ? "selected" : "" }}>English</option>
                                <option value="Chinese" {{ isset($language) && $language == 'Chinese' ? "selected" : "" }}>Chinese</option>
                                <option value="Japanese" {{ isset($language) && $language == 'Japanese' ? "selected" : "" }}>Japanese</option>
                            </select>
                        </div>

                        <div class="col-3 d-flex justify-content-between">
                            <button type="submit" class="filter-search-button" name="action" value="search">SEARCH</button>

                            <button type="submit" class="filter-reset-button" name="action" value="reset">RESET</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <x-backend.pagination items="{{ $items }}"></x-backend.pagination>
            
                <div class="table-container mb-3">
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
            $('.pages .table .delete-button').on('click', function() {
                let id = $(this).attr('id');
                let url = "{{ route('admin.users.destroy', [':id']) }}";
                destroy_url = url.replace(':id', id);

                $('.pages .delete-modal form').attr('action', destroy_url);
                $('.pages .delete-modal').modal('show');
            });

            $(".pages .pagination-form select").change(function () {
                window.location = "{!! $users->url(1) !!}&items=" + this.value; 
            });
        });
    </script>
@endpush