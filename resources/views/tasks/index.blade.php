@extends('layouts.app')

@section('content')

    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h2 class="fw-bold mb-1">My Tasks</h2>
                <small class="text-muted">Manage your tasks and uploads</small>
            </div>

            <a href="{{ route('tasks.create') }}" class="btn btn-primary shadow-sm px-4">
                + Add Task
            </a>

        </div>
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body">

                <h5 class="mb-3">Multiple File Upload</h5>

                <form id="uploadForm" enctype="multipart/form-data">

                    <div id="fileWrapper">

                        <div class="file-group d-flex gap-2 align-items-center mb-2">

                            <input type="file" name="files[]" class="form-control file-input" multiple>

                            <button type="button" class="btn btn-danger btn-sm remove-file d-none">
                            </button>

                        </div>

                    </div>

                    <div class="d-flex gap-2 mt-3">

                        <button type="button" id="addMore" class="btn btn-secondary btn-sm">
                            + More
                        </button>

                        <button type="submit" class="btn btn-dark btn-sm">
                            Upload Files
                        </button>

                    </div>

                </form>

                {{-- PREVIEW --}}
                <div id="preview" class="mt-4 d-flex flex-wrap gap-3"></div>

            </div>
        </div>

        {{-- TASK TABLE CARD --}}
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h5 class="mb-3">Tasks List</h5>
                <div class="row mb-3">

                    <div class="col-md-3">
                        <select id="statusFilter" class="form-select">
                            <option value="">All Status</option>
                            <option value="Completed">Completed</option>
                            <option value="Pending">Pending</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <input type="date" id="dateFilter" class="form-control">
                    </div>

                    <div class="col-md-3 d-flex gap-2">

                        <button id="applyFilter" class="btn btn-primary">
                            Apply Filter
                        </button>

                        <button id="resetFilter" class="btn btn-secondary">
                            Reset
                        </button>

                    </div>

                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle" id="taskTable">
                        <thead class="table-light">
                            <tr>
                                <th>Sr. No</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Due Date</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if ($tasks->count())
                                @foreach ($tasks as $task)
                                    <tr>

                                        <td class="fw-semibold">
                                            {{ $loop->iteration }}
                                        </td>

                                        <td class="fw-semibold">
                                            {{ $task->title }}
                                        </td>

                                        <td class="text-muted" style="max-width: 250px; white-space: normal;">
                                            {{ $task->description }}
                                        </td>

                                        <td>
                                            @if ($task->status == 'Completed')
                                                <span class="badge bg-success px-3 py-2">Completed</span>
                                            @else
                                                <span class="badge bg-warning text-dark px-3 py-2">Pending</span>
                                            @endif
                                        </td>

                                        <td>
                                            {{ $task->due_date }}
                                        </td>

                                        <td class="text-end">
                                            <a href="{{ route('tasks.show', $task->id) }}"
                                                class="btn btn-sm btn-outline-info">
                                                View
                                            </a>
                                            <a href="{{ route('tasks.edit', $task->id) }}"
                                                class="btn btn-sm btn-outline-primary">
                                                Edit
                                            </a>

                                            <a href="{{ route('tasks.delete', $task->id) }}"
                                                class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Delete Task?')">
                                                Delete
                                            </a>

                                        </td>

                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center">
                                        No tasks found. Create your first task.
                                    </td>
                                </tr>
                            @endif
                        </tbody>

                    </table>

                </div>
            </div>

        </div>

        <div class="card border-0 shadow-sm mt-4">
            <div class="card-body">
                <h5 class="mb-3">Uploaded Files</h5>
                <div class="table-responsive">
                    <table class="table table-sm table-hover" id="uploadTable">

                        <thead class="table-light">
                            <tr>
                                <th>Sr. No.</th>
                                <th>File Name</th>
                                <th>Type</th>
                                <th>Preview</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($uploads as $file)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $file->file_name }}</td>
                                    <td>{{ $file->file_type }}</td>
                                    <td>
                                        <a href="{{ asset($file->file_path) }}" target="_blank"
                                            class="btn btn-sm btn-outline-primary">
                                            View
                                        </a>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('upload.delete', $file->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">
                                        No files uploaded yet
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>
            </div>

        </div>

    </div>

@endsection
@section('scripts')
    {{-- DATATABLE CSS/JS --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>


    <script>
        $(document).ready(function() {
            var table = $('#taskTable').DataTable({

                pageLength: 5,
                lengthMenu: [5, 10, 25, 50],

                ordering: true,
                searching: true,
                responsive: true,

                dom: 'Bfrtip',

                buttons: [
                    'copy',
                    'csv',
                    'excel',
                    'pdf',
                    'print'
                ]
            });

            $('#applyFilter').click(function() {

                let status = $('#statusFilter').val();
                let date = $('#dateFilter').val();

                table.column(3).search(status);
                table.column(4).search(date);

                table.draw();
            });

            $('#resetFilter').click(function() {

                $('#statusFilter').val('');
                $('#dateFilter').val('');

                table.column(3).search('');
                table.column(4).search('');

                table.draw();
            });

            $('#uploadTable').DataTable({
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50],
                ordering: true,
                searching: true,
                responsive: true,
            });

        });
    </script>
    <script>
        // ================= ADD MORE INPUT =================
        $('#addMore').click(function() {

            let html = `
        <div class="file-group d-flex gap-2 align-items-center mb-2">
            <input type="file" name="files[]" class="form-control file-input">
            <button type="button" class="btn btn-danger btn-sm remove-file">Remove</button>
        </div>
    `;

            $('#fileWrapper').append(html);
        });


        // ================= REMOVE INPUT =================
        $(document).on('click', '.remove-file', function() {
            $(this).closest('.file-group').remove();
        });


        // ================= PREVIEW FILES =================
        $(document).on('change', '.file-input', function() {

            let files = this.files;
            let preview = $('#preview');

            preview.html('');

            Array.from(files).forEach(file => {

                let reader = new FileReader();

                reader.onload = function(e) {

                    if (file.type.startsWith('image/')) {

                        preview.append(`
                    <div class="text-center">
                        <img src="${e.target.result}" width="120" class="img-thumbnail">
                        <p class="small">${file.name}</p>
                    </div>
                `);

                    } else if (file.type === "application/pdf") {

                        preview.append(`
                    <div class="border p-2 text-center" style="width:120px;">
                         PDF
                        <p class="small">${file.name}</p>
                        <a href="${e.target.result}" target="_blank">View</a>
                    </div>
                `);

                    } else {

                        preview.append(`
                    <div class="border p-2 text-center" style="width:120px;">
                         File
                        <p class="small">${file.name}</p>
                    </div>
                `);

                    }
                };

                reader.readAsDataURL(file);
            });
        });


        // ================= AJAX UPLOAD =================
        $('#uploadForm').submit(function(e) {

            e.preventDefault();

            let formData = new FormData(this);

            $.ajax({

                url: "{{ route('upload.files') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                success: function(response) {

                    alert("Files uploaded successfully");

                    // Reset form
                    $('#uploadForm')[0].reset();

                    // Clear preview
                    $('#preview').html('');

                    // Remove extra rows and add default row
                    $('#fileWrapper').html(`
                <div class="file-group d-flex gap-2 align-items-center mb-2">

                    <input type="file" 
                           name="files[]" 
                           class="form-control file-input" 
                           multiple>

                    <button type="button" 
                            class="btn btn-danger btn-sm remove-file d-none">
                    </button>

                </div>
            `);

                    if (response.files) {

                        $('#uploadTable tbody tr td[colspan="4"]').closest('tr').remove();

                        response.files.forEach(function(file) {

                            let row = `
            <tr>

                <td>${file.file_name}</td>

                <td>${file.file_type}</td>

                <td>
                    <a href="/${file.file_path}" 
                       target="_blank" 
                       class="btn btn-sm btn-primary">
                       View
                    </a>
                </td>

                <td>

                    <form method="POST" 
                          action="/upload/delete/${file.id}">

                        <input type="hidden" 
                               name="_token" 
                               value="{{ csrf_token() }}">

                        <input type="hidden" 
                               name="_method" 
                               value="DELETE">

                        <button class="btn btn-sm btn-danger">
                            Delete
                        </button>

                    </form>

                </td>

            </tr>
        `;

                            $('#uploadTable tbody').prepend(row);

                        });
                    }

                }

            });

        });
    </script>
@endsection
