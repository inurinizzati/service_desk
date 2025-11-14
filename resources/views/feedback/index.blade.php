@extends('layouts.app')

@section('title', 'Feedback')

@section('page-header',  'Feedback')


@section('css_after')
    <link href="{{ asset ('metronic/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('js_after')
    <script src="{{ asset ('metronic/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script src="{{ asset('metronic/js/feedback.js') }}"></script>
@endsection

@section('content')
<div id="kt_content_container" class="container-xxl">
   	<div class="card card-flush">
		<div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <input type="text" class="form-control form-control-solid w-250px ps-14" placeholder="Search..." id="feedbackSearch" />
                    <i class="ki-duotone ki-magnifier fs-2 position-absolute ms-4">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
                <!--end::Search-->
            </div>
            <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                <div class="d-flex align-items-center position-relative my-1">
                    {{-- <input type="text" class="form-control form-control-solid w-250px ps-14" placeholder="Search..." id="feedbackSearch" /> --}}
                    <select id="ratingFilter" class="form-select form-select-solid ms-3 w-125px" data-control="select2" data-hide-search="true" data-placeholder="Rating">
                        <option value="all">All</option>
                        <option value="rating-5">5 Stars</option>
                        <option value="rating-4">4 Stars</option>
                        <option value="rating-3">3 Stars</option>
                        <option value="rating-2">2 Stars</option>
                        <option value="rating-1">1 Star</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            <table class="m-datatable table align-middle table-row-dashed fs-6 gy-5">
                <thead>
                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                        <th class="text-center">Complaint ID</th>
                        <th class="text-center">Technician ID</th>
                        <th class="text-center" style="width: 150px;" >Rating</th>
                        <th class="text-center" style="width: 400px;">Comment</th>
                        {{-- <th >Action</th> --}}
                    </tr>
                </thead>
                <tbody class="text-gray-600 fw-semibold">
                    <!-- Static sample data (frontend only) -->
                    <tr>
                        <td class="text-center">#CMP001</td>
                        <td class="text-center">TECH002</td>
                        <td class="text-center" data-order="rating-5" data-filter="rating-5">
                            <div class="rating justify-content-center">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-2"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-2"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-2"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-2"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-2"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">Very fast service, excellent job!</td>
                        {{-- <td>
                            <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="tooltip" title="Edit">
                                <i class="ki-duotone text-warning ki-notepad-edit fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </a>
                            <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="tooltip" title="Delete">
                                <i class="ki-duotone text-danger ki-trash fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                    <span class="path5"></span>
                                </i>
                            </a>
                        </td> --}}
                    </tr>
                    <tr>
                        <td class="text-center">#CMP002</td>
                        <td class="text-center">TECH003</td>
                        <td class="text-center" data-order="rating-2" data-filter="rating-2">
                            <div class="rating justify-content-center">
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-2"></i>
                                </div>
                                <div class="rating-label checked">
                                    <i class="ki-duotone ki-star fs-2"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-2"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-2"></i>
                                </div>
                                <div class="rating-label">
                                    <i class="ki-duotone ki-star fs-2"></i>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">Response was okay but could be faster next time.</td>
                            {{-- <td>
                                <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" title="Edit">
                                    <i class="ki-duotone text-warning ki-notepad-edit fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </a>
                                <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" title="Delete">
                                    <i class="ki-duotone text-danger ki-trash fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                        <span class="path5"></span>
                                    </i>
                                </a>
                            </td> --}}
                        </tr>
                </tbody>
            </table>
        </div>

    </div>


</div>

@endsection

