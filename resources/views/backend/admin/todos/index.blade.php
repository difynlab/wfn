@extends('backend.layouts.app')

@section('title', 'To-Do')

@section('content')
    <div class="page">
        <div class="row align-items-center mb-4">
            <div class="col-8">
                <p class="title">T-Do</p>
                <p class="description">Manage reminders and notes with the to-do list.</p>
            </div>
            <div class="col-4 text-end">
                <a href="{{ route('admin.todos.create') }}" class="add-button">
                    <i class="bi bi-plus-lg"></i>
                    Add New
                </a>
            </div>
        </div>

        <div class="todos">
            @if(count($items) > 0)
                @foreach($items as $item)
                    @if($item->complete == null)
                        <div class="row single-todo" data-id="{{ $item->id }}">
                            <div class="col-9 details">
                                <input class="form-check-input" type="checkbox">

                                <div class="text">
                                    <p class="todo-name">{{ $item->title }}</p>
                                    <p class="todo-description">{{ $item->description }}</p>
                                </div>
                            </div>
                            
                            <div class="col-3 links">
                                @if($item->favorite)
                                    <i class="bi bi-star-fill link favorite gold" title="Favorite"></i>
                                @else
                                    <i class="bi bi-star link favorite" title="Favorite"></i>
                                @endif

                                <i class="bi bi-x-lg link delete" title="Delete"></i>
                            </div>
                        </div>
                    @endif
                @endforeach

                @foreach($items as $item)
                    @if($item->complete)
                        <div class="row single-todo" data-id="{{ $item->id }}">
                            <div class="col-9 details">
                                <input class="form-check-input" type="checkbox" checked>

                                <div class="text">
                                    <p class="todo-name cross-line">{{ $item->title }}</p>
                                    <p class="todo-description cross-line">{{ $item->description }}</p>
                                </div>
                            </div>
                            
                            <div class="col-3 links">
                                @if($item->favorite)
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
@endsection

@push('after-scripts')
    <script>
        let csrfToken = $('meta[name="csrf-token"]').attr('content');

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
                                $(this).prependTo(container).fadeIn(300);
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