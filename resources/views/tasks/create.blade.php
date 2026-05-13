@extends('layouts.app')

@section('content')
    <div class="card shadow">

        <div class="card-body">

            <h2 class="mb-4">
                Create Task
            </h2>

            <form method="POST" action="{{ route('tasks.store') }}">

                @csrf

                <div class="mb-3">

                    <label class="form-label">
                        Title
                    </label>

                    <input type="text" name="title" class="form-control" required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Description
                    </label>

                    <textarea name="description" class="form-control" rows="4"></textarea>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Status
                    </label>

                    <select name="status" class="form-select">

                        <option value="Pending">
                            Pending
                        </option>

                        <option value="Completed">
                            Completed
                        </option>

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Due Date
                    </label>

                    <input type="date" name="due_date" class="form-control">

                </div>

                <button class="btn btn-success">
                    Save Task
                </button>

                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">

                    Back

                </a>

            </form>

        </div>

    </div>
@endsection
