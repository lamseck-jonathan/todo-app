@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div>
                        {{ __('Todo List') }}
                    </div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add Task
                    </button>
                    @include('components.modal',['title' => 'What do i do today ?'])
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($tasks as $task)
                        <li class="list-group-item d-inline-flex justify-content-between align-items-center">
                            <div>
                                {{$task->name}}
                            </div>
                            <div>
                                <form action="{{ route('delete',$task->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button 
                                    type="submit" 
                                    class="btn btn-danger mt-2 float-end delete-task">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </li>
                        @empty
                        <p class="text-center">{{ __('No task for now!') }}</p>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.delete-task').click((e) => {
        e.preventDefault();
        if(confirm('Are you sure ?')){
            $(e.target).closest('form').submit()
        }
    })
</script>
@endsection
