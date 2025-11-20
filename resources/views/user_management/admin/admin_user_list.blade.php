@extends('layouts.app')

@section('title', 'User List')

@section('page-header', 'User List')

@section('css_after')
    <link href="{{ asset('metronic/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('js_after')
    <script src="{{ asset('metronic/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('metronic/js/datatable.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Initialize DataTable with search functionality
            var table = $('#users-table').DataTable({
                responsive: true,
                pageLength: 25,
                columnDefs: [
                    { orderable: false, targets: -1 } // disable ordering on actions column
                ],
                dom: 'rtip', // Remove default search box since we're using custom search
            });

            // Custom search functionality
            var searchInput = $('input[data-kt-user-table-filter="search"]');
            var searchTimeout;

            searchInput.on('keyup', function() {
                clearTimeout(searchTimeout);
                var value = $(this).val();
                
                searchTimeout = setTimeout(function() {
                    // Use DataTable search
                    table.search(value).draw();
                }, 300); // Debounce search
            });

            // Export button functionality
            $('#export-btn').on('click', function() {
                var searchValue = searchInput.val();
                var roleFilter = new URLSearchParams(window.location.search).get('role');
                
                var exportUrl = '{{ route("admin.users.export") }}';
                var params = new URLSearchParams();
                
                if (searchValue) {
                    params.append('search', searchValue);
                }
                if (roleFilter) {
                    params.append('role', roleFilter);
                }
                
                if (params.toString()) {
                    exportUrl += '?' + params.toString();
                }
                
                window.location.href = exportUrl;
            });

            // Confirm delete (existing code)
            $(document).on('click', '.delete-data', function(e){
                e.preventDefault();
                const row = $(this).closest('tr');

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
                        // Frontend-only removal
                        row.fadeOut(300, function() { $(this).remove(); });
                    }
                });
            });
        });
    </script>
@endsection

@section('content')
    <div id="kt_content_container" class="container-xxl">
        <div class="card shadow-sm"> {{-- MODIFIED: Added shadow-sm --}}

            {{-- START: NEW CARD HEADER (from Ticket List) --}}
            <div class="card-header border-0 pt-6">
                <div class="card-title">
                    <div class="d-flex align-items-center position-relative my-1">
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                            </svg>
                        </span>
                        <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-200px ps-14" placeholder="Search user" />
                    </div>
                </div>
                <div class="card-toolbar">
                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                        <!-- Filter Button -->
                        <div class="dropdown">
                            <button type="button" class="btn btn-light-primary me-3 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M19.0759 3H4.92406C4.4001 3 4.02406 3.4001 4.02406 3.92406V4.02406C4.02406 4.45186 4.19827 4.85506 4.49101 5.1478L9.21303 9.86983C9.50576 10.1626 9.67997 10.5657 9.67997 11V17.0759C9.67997 17.5133 9.94593 17.9238 10.3686 18.1166L14.3686 20.1166C15.0163 20.4409 15.7728 19.9351 15.7728 19.2V11C15.7728 10.5657 15.947 10.1626 16.2397 9.86983L20.9617 5.1478C21.2545 4.85506 21.4287 4.45186 21.4287 4.02406V3.92406C21.4287 3.4001 21.0526 3 20.5287 3H19.0759Z" fill="currentColor" />
                                    </svg>
                                </span>
                                Filter
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('userlist') }}">All Roles</a></li>
                                @foreach($roles as $role)
                                    <li>
                                        <a class="dropdown-item" href="{{ route('userlist', ['role' => $role->slug]) }}">
                                            {{ $role->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <button type="button" class="btn btn-light-primary me-3" id="export-btn">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1" transform="rotate(90 12.75 4.25)" fill="currentColor" />
                                    <path d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.944C15.4888 7.51118 15.5209 6.8001 15.1292 6.33001L12.4999 3.13C12.2166 2.80993 11.7834 2.80993 11.5001 3.13L8.87083 6.33001C8.4791 6.8001 8.51118 7.51118 8.944 7.944C9.37683 8.37683 10.0879 8.34457 10.4797 7.87435L12.0573 6.11875Z" fill="currentColor" />
                                    <path d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25H18.75C19.3023 10.25 19.75 10.6977 19.75 11.25V18.25C19.75 18.8023 19.3023 19.25 18.75 19.25H5.25C4.69772 19.25 4.25 18.8023 4.25 18.25V11.25C4.25 10.6977 4.69772 10.25 5.25 10.25H6.25C6.80228 10.25 7.25 9.80228 7.25 9.25C7.25 8.69772 6.80228 8.25 6.25 8.25H5.25C4.14543 8.25 3.25 9.14543 3.25 10.25V19.25C3.25 20.3546 4.14543 21.25 5.25 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z" fill="currentColor" />
                                </svg>
                            </span>
                            Export
                        </button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ki-duotone ki-plus-square">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
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
            </div>
            {{-- END: NEW CARD HEADER --}}

            <div class="card-body">
                                <style>
                    /* Active page number button (currently blue) → make it purple */
                    .page-item.active .page-link {
                        background-color: #6f42c1 !important; /* Purple */
                        border-color: #6f42c1 !important;
                        color: #fff !important;
                    }

                    /* Normal page number buttons (optional, if you also want purple border on hover/normal) */
                    .page-link {
                        color: #6f42c1 !important;
                    }

                    .page-link:hover {
                        background-color: #ebe0ff !important; /* light purple hover */
                        color: #6f42c1 !important;
                    }
                </style>
                {{-- MODIFIED: Table classes changed to match Ticket List --}}
                <table id="users-table" class="table align-middle table-row-dashed fs-6 gy-5">
                    <thead>
                        {{-- MODIFIED: Row classes changed --}}
                        <tr class="text-start text-dark fw-bold fs-7 text-uppercase gs-0">
                            <th style="width:40px">No</th>
                            <th>UserID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Created at</th>
                            <th style="width:170px">Action</th>
                        </tr>
                    </thead>
                    {{-- MODIFIED: Body classes changed --}}
                    <tbody class="text-black-600 fw-semibold">
                        @foreach($users as $i => $user)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $user->userid }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ optional($user->role)->name ?? '—' }}</td>
                                <td>
                                    {{-- MODIFIED: Matched badge classes from Ticket List --}}
                                    @if(isset($user->is_active) && $user->is_active)
                                        <span class="badge badge-light-success fs-6">Active</span>
                                    @else
                                        <span class="badge badge-light-secondary fs-6">Inactive</span>
                                    @endif
                                </td>
                                <td>{{ optional($user->created_at)->format('Y-m-d') }}</td>

                                {{-- START: MODIFIED ACTION BUTTONS TO ICONS --}}
                                <td>
                                    <a href="{{ route('admin.users.update', $user->id) }}" class="btn btn-sm btn-primary btn-icon" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('admin.users.destroy', $user->id) }}"
                                       class="btn btn-sm btn-danger btn-icon delete-data" title="Delete">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                                {{-- END: MODIFIED ACTION BUTTONS TO ICONS --}}
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
