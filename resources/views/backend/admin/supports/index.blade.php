@extends('backend.layouts.app')

@section('title', 'Supports')

@section('content')
    <div class="page">
        <div class="row align-items-center mb-3 mb-md-4">
            <div class="col-12 mb-3 mb-md-0 col-md-8">
                <p class="title">Supports</p>
                <p class="description">Manage supports here.</p>
            </div>
        </div>

        <div class="row mb-3 mb-md-4">
            <div class="col-12">
                <form class="filter-form">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                        <input type="text" class="form-control input-field" name="name" value="{{ $name ?? '' }}" placeholder="Search by Name">
                    </div>

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
                                <th scope="col">PHONE <i class="bi bi-arrows-vertical sort-icon" data-name="phone" data-order="desc"></i></th>
                                <th scope="col">EMAIL <i class="bi bi-arrows-vertical sort-icon" data-name="email" data-order="desc"></i></th>
                                <th scope="col">CATEGORY <i class="bi bi-arrows-vertical sort-icon" data-name="category" data-order="desc"></i></th>
                                <th scope="col">SUBJECT <i class="bi bi-arrows-vertical sort-icon" data-name="subject" data-order="desc"></i></th>
                                <th scope="col">MESSAGE <i class="bi bi-arrows-vertical sort-icon" data-name="message" data-order="desc"></i></th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                        </thead>

                        <tbody id="tbody">
                            @if(count($items) > 0)
                                @foreach($items as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ ucfirst($item->category) }}</td>
                                        <td>{{ $item->subject }}</td>
                                        <td>{{ $item->message }}</td>
                                        <td>{!! $item->action !!}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" style="text-align: center;">No data available in the table</td>
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

        <x-backend.delete data="support"></x-backend.delete>
        <x-backend.notification></x-backend.notification>
    </div>
@endsection


@push('after-scripts')
    <script>
        window.moduleRoutes = {
            destroyRoute: "{{ route('admin.supports.destroy', [':id']) }}",
            filterRoute: "{{ route('admin.supports.filter') }}",
            indexRoute: "{{ route('admin.supports.index') }}",
            pageUrl: "{!! $items->url(1) !!}"
        };
    </script>

    <script src="{{ asset('backend/js/index-script.js') }}"></script>
@endpush