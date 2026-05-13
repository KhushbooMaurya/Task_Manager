@extends('layouts.app')

@section('content')

<div class="container py-4">

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <h3 class="fw-bold">
                    Task Details
                </h3>

                <a href="{{ route('tasks.index') }}"
                   class="btn btn-secondary">
                    Back
                </a>

            </div>

            <div class="mb-3">

                <label class="fw-bold">
                    Title
                </label>

                <p class="text-muted">
                    {{ $task->title }}
                </p>

            </div>

            <div class="mb-3">

                <label class="fw-bold">
                    Description
                </label>

                <div class="border rounded p-3 bg-light">

                    {{ $task->description }}

                </div>

            </div>

            <div class="mb-3">

                <label class="fw-bold">
                    Status
                </label>

                <p>

                    @if($task->status == 'Completed')

                        <span class="badge bg-success px-3 py-2">
                            Completed
                        </span>

                    @else

                        <span class="badge bg-warning text-dark px-3 py-2">
                            Pending
                        </span>

                    @endif

                </p>

            </div>

            <div class="mb-3">

                <label class="fw-bold">
                    Due Date
                </label>

                <p class="text-muted">
                    {{ $task->due_date }}
                </p>

            </div>

        </div>

    </div>

</div>

@endsection