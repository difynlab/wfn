@extends('backend.layouts.app')

@section('title', 'Subscriptions')

@section('content')
    <div class="page">
        <div class="row align-items-center mb-4">
            <div class="col-8">
                <p class="title">Subscriptions</p>
                <p class="description">Manage subscriptions here.</p>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-12">
                <form class="filter-form">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                        <input type="text" class="form-control input-field" name="email" value="{{ $email ?? '' }}" placeholder="Search by Email">
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
                                <th scope="col">EMAIL <i class="bi bi-arrows-vertical sort-icon" data-name="email" data-order="desc"></i></th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                        </thead>

                        <tbody id="tbody">
                            @if(count($items) > 0)
                                @foreach($items as $item)
                                    <tr>
                                        <td>{{ $item->email }}</td>
                                        <td>{!! $item->action !!}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="2" style="text-align: center;">No data available in the table</td>
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

        <x-backend.delete data="subscription"></x-backend.delete>
        <x-backend.notification></x-backend.notification>
    </div>
@endsection


@push('after-scripts')
    <script>
        window.moduleRoutes = {
            destroyRoute: "{{ route('admin.subscriptions.destroy', [':id']) }}",
            filterRoute: "{{ route('admin.subscriptions.filter') }}",
            indexRoute: "{{ route('admin.subscriptions.index') }}",
            pageUrl: "{!! $items->url(1) !!}"
        };
    </script>

    <script src="{{ asset('backend/js/index-script.js') }}"></script>
@endpush