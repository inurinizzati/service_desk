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
        $(document).on('click', '.hapus-data', function(e){
            e.preventDefault();

            Swal.fire({
                title: 'Peringatan!',
                text: 'Klik Teruskan untuk hapuskan data.',
                icon: 'warning',
                confirmButtonText: 'Teruskan',
                showCancelButton: true,
                cancelButtonText: 'Batal',
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
        <h3 class="card-title mb-0">Users</h3>
        <div class="card-toolbar d-flex align-items-center">
            <!-- Small "+" icon button (top-right) -->
            <a href="{{ route('admin.users.create') }}" class="btn btn-icon btn-primary btn-sm me-2" title="Tambah Pengguna">
                <span class="h5 mb-0 text-white">+</span>
            </a>

            <!-- Optional full-text button for larger screens -->
            <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-primary d-none d-sm-inline">
                Add User
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h3 class="card-title">Users</h3>
            <div class="card-toolbar">
                <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-primary">
                    Tambah Pengguna
                </a>
            </div>
        </div>

        <div class="card-body">
            <table id="users-table" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th style="width:50px">No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Peranan</th>
                        <th>Status</th>
                        <th>Dicipta</th>
                        <th style="width:120px">Tindakan</th>
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
                                   class="btn btn-sm btn-danger hapus-data">
                                    Hapus
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
