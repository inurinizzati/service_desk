@extends('layouts.app')

@section('title', 'Ticket List')

@section('page-header',  'Ticket List')

{{-- @section('breadcrumbs',  Breadcrumbs::render('penceramah') ) --}}

@section('css_after')
    <link href="{{ asset ('metronic/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('js_after')
    <script src="{{ asset ('metronic/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script src="{{ asset ('metronic/js/datatable.js')}}"></script>
     <script>
        $(document).on('click', '.hapus-data', function(e){
            e.preventDefault(); // Halang link daripada terus redirect

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
    <div class="card shadow-sm">
        <div class="card-header">
            <h3 class="card-title">History of Ticket List</h3>
            <div class="card-toolbar">
                <a href=/createticket class="btn btn-sm btn-primary">
                    <i class="ki-duotone ki-plus-square">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                    </i>
                    Create Ticket
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="m-datatable table align-middle table-row-dashed fs-6 gy-5">
                <thead>
                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                        <th>ID</th>
                        <th>Title</th>
                        <th class="text-center">Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 fw-semibold">
                    @foreach ($tickets as $ticket)
                        <tr onclick="window.location='{{ route('ticket.details', $ticket->id) }}';" style="cursor:pointer;">
                            <td>{{ $ticket->id }}</td>
                            <td>{{ $ticket->title }}</td>
                            <td class="text-center">
                                @if ($ticket->status == 'Completed')
                                    <span class="badge bg-success text-white fs-6">Completed</span>
                                @elseif ($ticket->status == 'Pending')
                                    <span class="badge bg-warning text-white fs-6">Pending</span>
                                @else
                                    <span class="badge bg-secondary text-white fs-6">Unknown</span>
                                @endif
                            </td>
                            {{-- <td class="text-end"> --}}
                                {{-- <a href="{{ route('ticket.edit', $ticket->id) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" title="Edit">
                                    <i class="ki-duotone text-warning ki-notepad-edit fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </a> --}}
                                {{-- <a href="{{ route('ticket.delete', $ticket->id) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm hapus-data" title="Delete">
                                    <i class="ki-duotone text-danger ki-trash fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                        <span class="path5"></span>
                                    </i>
                                </a> --}}
                            {{-- </td> --}}
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
@endsection
