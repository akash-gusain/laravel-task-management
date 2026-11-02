<div>
   
@extends('layouts.app')

@section('title', 'My Tasks | TaskFlow')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="fw-bold mb-1">My Tasks</h1>
        <p class="text-muted mb-0">Organize your work, one task at a time.</p>
    </div>

    <a href="{{ route('tasks.create') }}" class="btn btn-primary">
        + Add Task
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        Please check the form data and try again.
    </div>
@endif

<div class="card border-0 shadow-sm">
    <div class="card-body">
        @forelse ($tasks as $task)
            <div class="border-bottom py-3">
                <div class="d-flex justify-content-between flex-wrap gap-3">
                    <div>
                        <h5 class="mb-1">{{ $task->title }}</h5>

                        <p class="text-muted mb-2">
                            {{ $task->description ?: 'No description provided.' }}
                        </p>

                        <span class="badge bg-secondary">
                            {{ ucfirst($task->priority) }} priority
                        </span>

                        <span class="badge {{ $task->status === 'completed' ? 'bg-success' : 'bg-warning text-dark' }}">
                            {{ ucfirst($task->status) }}
                        </span>

                        @if ($task->due_date)
                            <small class="text-muted ms-2">
                                Due: {{ $task->due_date }}
                            </small>
                        @endif
                    </div>

                    <div class="d-flex align-items-start gap-2">
                        <a href="{{ route('tasks.edit', $task) }}"
                           class="btn btn-sm btn-outline-primary">
                            Edit
                        </a>

                        <form action="{{ route('tasks.destroy', $task) }}"
                              method="POST"
                              onsubmit="return confirm('Delete this task?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-sm btn-outline-danger">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center py-5">
                <h5>No tasks yet</h5>
                <p class="text-muted">Create your first task to get started.</p>

                <a href="{{ route('tasks.create') }}"
                   class="btn btn-primary">
                    Create your first task
                </a>
            </div>
        @endforelse
    </div>
</div>
@endsection

</div>
