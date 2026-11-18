@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="offset-md-2 col-md-8">
            <!-- New Task Card -->
            <div class="card mb-4">
                @if (@isset($task))
                <div class="card-header">
                    edit Task
                </div>
                <div class="card-body">
                    <!-- update Task Form -->
                    <form action="{{url('update')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$task->id}}"
                        <!-- Task Name -->
                        <div class="mb-3">
                            <label for="task-name" class="form-label">Task</label>
                            <input type="text" name="name" id="task-name" class="form-control" value="{{$task->name}}">
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-plus me-2"></i>Update Task
                            </button>
                        </div>
                    </form>
                </div>
                @else
                <div class="card-header">
                    New Task
                </div>
                <div class="card-body">
                    <!-- New Task Form -->
                    <form action="/create" method="POST">
                        @csrf
                        <!-- Task Name -->
                        <div class="mb-3">
                            <label for="task-name" class="form-label">Task</label>
                            <input type="text" name="name" id="task-name" class="form-control" value="">
                        </div>

                        <!-- Add Task Button -->
                        <div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-plus me-2"></i>Add Task
                            </button>
                        </div>
                    </form>
                </div>
                @endif
            </div>

            <!-- Current Tasks Card -->
            <div class="card">
                <div class="card-header">
                    Current Tasks
                </div>
                <div class="card-body">
                    <table class="table table-striped align-middle">
                        <thead>
                            <tr>
                                <th>Task</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{ $task->name }}</td>
                                    <td>
                                        <form action="/delete/{{ $task->id }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm me-1">
                                                <i class="fa fa-trash me-1"></i>Delete
                                            </button>
                                        </form>

                                        <form action="/edit/{{ $task->id }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-info btn-sm me-1">
                                                <i class="fa fa-info me-1"></i>edit
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    </body>
</html>
@endsection
