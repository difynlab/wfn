@extends('backend.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="page dashboard">
        <div class="row mb-4">
            <div class="col-12">
                <p class="title">Dashboard</p>
                <p class="description">Manage and track operations seamlessly here.</p>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-4">
                <div class="single-box">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="left">
                            <p class="text">Booked Warehouses</p>
                            <p class="value">{{ $total_bookings }}</p>
                        </div>

                        <div class="right">
                            <div class="icon-box">
                                <i class="bi bi-house-add"></i>
                            </div>
                        </div>
                    </div>

                    <p class="text">{!! $booking_month_percentage !!}</p>
                </div>
            </div>

            <div class="col-4">
                <div class="single-box">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="left">
                            <p class="text">Pending Requests</p>
                            <p class="value">{{ $total_pending_bookings }}</p>
                        </div>

                        <div class="right">
                            <div class="icon-box">
                                <i class="bi bi-bezier2"></i>
                            </div>
                        </div>
                    </div>

                    <p class="text">{!! $pending_booking_month_percentage !!}</p>
                </div>
            </div>

            <div class="col-4">
                <div class="single-box">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="left">
                            <p class="text">Total Paid</p>
                            <p class="value">{{ $total_paid }} SAR</p>
                        </div>

                        <div class="right">
                            <div class="icon-box">
                                <i class="bi bi-cash"></i>
                            </div>
                        </div>
                    </div>

                    <p class="text">{!! $paid_month_percentage !!}</p>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-12">
                <div class="box todos">
                    <p class="box-title mb-2">To-Do Overview</p>

                    @if(count($todos) > 0)
                        @foreach($todos as $todo)
                            @if($todo->complete == null)
                                <div class="row single-todo" data-id="{{ $todo->id }}">
                                    <div class="col-9 details">
                                        <input class="form-check-input" type="checkbox">

                                        <div class="text">
                                            <p class="todo-name">{{ $todo->title }}</p>
                                            <p class="todo-description">{{ $todo->description }}</p>
                                        </div>
                                    </div>
                                    
                                    <div class="col-3 links">
                                        @if($todo->favorite)
                                            <i class="bi bi-star-fill link favorite gold" title="Favorite"></i>
                                        @else
                                            <i class="bi bi-star link favorite" title="Favorite"></i>
                                        @endif

                                        <i class="bi bi-x-lg link delete" title="Delete"></i>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                        @foreach($todos as $todo)
                            @if($todo->complete)
                                <div class="row single-todo" data-id="{{ $todo->id }}">
                                    <div class="col-9 details">
                                        <input class="form-check-input" type="checkbox" checked>

                                        <div class="text">
                                            <p class="todo-name cross-line">{{ $todo->title }}</p>
                                            <p class="todo-description cross-line">{{ $todo->description }}</p>
                                        </div>
                                    </div>
                                    
                                    <div class="col-3 links">
                                        @if($todo->favorite)
                                            <i class="bi bi-star-fill link favorite gold" title="Favorite"></i>
                                        @else
                                            <i class="bi bi-star link favorite" title="Favorite"></i>
                                        @endif

                                        <i class="bi bi-x-lg link delete" title="Delete"></i>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <div class="row single-todo">
                            <div class="col-12">
                                <p class="no-data">No data available in the todo list</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="box table-container">
                    <table class="table w-100">
                        <thead>
                            <tr>
                                <th scope="col">WAREHOUSE</th>
                                <th scope="col">PALLET RENTED</th>
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
                                    <td colspan="7" style="text-align: center;">No data available in the table</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
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
                let url = "{{ route('tenant.bookings.destroy', [':id']) }}";
                destroy_url = url.replace(':id', id);

                $('.page #delete-modal form').attr('action', destroy_url);
                $('.page #delete-modal').modal('show');
            });
        });
    </script>

    <script>
        $('.form-check-input').on('change', function () {
            const todoItem = $(this).closest('.single-todo');
            const todoId = $(this).closest('.single-todo').data('id');
            const completed = $(this).is(':checked') ? 1 : 0;

            $.post(`todos/${todoId}/complete`, { complete: completed, _token: csrfToken })
                .done(() => {
                    todoItem.fadeOut(300, function () {
                        if(completed === 1) {
                            $(this).appendTo($(this).parent()).fadeIn(300);

                            $(this).find('.todo-name').addClass('cross-line');
                            $(this).find('.todo-description').addClass('cross-line');
                        }
                        else {
                            const container = $(this).parent();
                            const firstCompleted = container.find('.form-check-input:checked').first().closest('.single-todo');
                            if(firstCompleted.length > 0) {
                                $(this).insertBefore(firstCompleted).fadeIn(300);
                            }
                            else {
                                const firstTodo = container.children('.single-todo').first();
    
                                if(firstTodo.length > 0) {
                                    $(this).insertAfter(firstTodo).fadeIn(300);
                                }
                                else {
                                    container.append($(this).fadeIn(300));
                                }
                            }

                            $(this).find('.todo-name').removeClass('cross-line');
                            $(this).find('.todo-description').removeClass('cross-line');
                        }
                    });
                });
        });

        $('.favorite').on('click', function () {
            const todoId = $(this).closest('.single-todo').data('id');

            $.post(`todos/${todoId}/favorite`, { _token: csrfToken })
                .done(() => {
                    $(this).toggleClass('bi-star');
                    $(this).toggleClass('bi-star-fill');
                    $(this).toggleClass('gold');
                });
        });

        $('.delete').on('click', function () {
            const todoId = $(this).closest('.single-todo').data('id');

            $.post(`todos/${todoId}/destroy`, { _token: csrfToken })
                .done(() => {
                    $(this).closest('.single-todo').remove();

                    if($('.single-todo').length === 0) {
                        location.reload();
                    }
                });
        });
    </script>
@endpush