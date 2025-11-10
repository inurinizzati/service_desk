@extends('layouts.app')

@section('title', 'User List')

@section('page-header', 'User Management')

@section('css_after')
    <link href="{{ asset('metronic/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('js_after')
    <script src="{{ asset('metronic/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('metronic/js/datatable.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#users-table').DataTable({
                responsive: true,
                pageLength: 25,
                columnDefs: [
                    { orderable: false, targets: -1 } // disable ordering on actions column
                ]
            });
        });

        // confirm delete (reuse existing Swal pattern)
        $(document).on('click', '.delete-data', function(e){
            e.preventDefault();

            Swal.fire({
            title: 'Warning!',
            text: 'Click Continue to delete this data.',
            icon: 'warning',
            confirmButtonText: 'Continue',
            showCancelButton: true,
            cancelButtonText: 'Cancel',
            customClass: {
                confirmButton: "btn btn-primary",
                cancelButton: "btn btn-danger",
                }
            }).then((result) => {
                if (result.value) {
                    window.location.href = $(this).attr("href");
                }
            });
        });
    </script>
@endsection

@section('content')
    <div id="kt_content_container" class="container-xxl">
        <div class="card-header d-flex align-items-center justify-content-between">
    </div>
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h3 class="card-title">Users</h3>
            <div class="card-toolbar">
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Add User
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('admin.stud.create') }}?role=STUDENT">Student</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('admin.tech.create') }}?role=TECHNICIAN">Technician</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="card-body">
            <table id="users-table" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th style="width:50px">No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Created at</th>
                        <th style="width:120px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $i => $user)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ optional($user->role)->name ?? '—' }}</td>
                            <td>
                                @if(isset($user->is_active) && $user->is_active)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-secondary">Inactive</span>
                                @endif
                            </td>
                            <td>{{ optional($user->created_at)->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-primary">
                                    Edit
                                </a>
                                <a href="{{ route('admin.users.destroy', $user->id) }}"
                                   class="btn btn-sm btn-danger delete-data">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if(method_exists($users, 'links'))
                <div class="mt-3">
                    {{ $users->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
