@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2 class="text-center">Task Management</h2>
        </div>
        <div class="col-md-6 text-end">
            <!-- Create New Task Button -->
            <a href="{{ route('tasks.create') }}" class="btn btn-success">Create New Task</a>

            <!-- Logout Button -->
            <form action="{{ route('logout') }}" method="POST" class="d-inline-block">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </div>

    <!-- Filter and Sort Form -->
    <form method="GET" action="{{ route('tasks.index') }}" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <div class="input-group">
                    <label class="input-group-text" for="status">Filter by Status</label>
                    <select name="status" id="status" class="form-select">
                        <option value="">All</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="in-progress" {{ request('status') == 'progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="input-group">
                    <label class="input-group-text" for="sort">Sort by Due Date</label>
                    <select name="sort" id="sort" class="form-select">
                        <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Ascending</option>
                        <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Descending</option>
                    </select>
                </div>
            </div>

            <div class="col-md-4">
                <button type="submit" class="btn btn-primary w-100">Apply Filters</button>
            </div>
        </div>
    </form>

    <!-- Tasks Table -->
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Due Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->title }}</td>
                    <td>
                        <span class="badge bg-{{ $task->status === 'completed' ? 'success' : ($task->status === 'in-progress' ? 'warning' : 'secondary') }}">
                            {{ ucfirst($task->status) }}
                        </span>
                    </td>
                    <td>{{ \Carbon\Carbon::parse($task->due_date)->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this task?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No tasks available.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
