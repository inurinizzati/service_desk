<!-- this page is for technician to view and edit their profile.
There are some attribute that cannot be edited like user_ID, user_name, etc.
Some are editable. at the bottom of the page there will be cancel button and update button -->

@extends('layouts.app')

@section('title', 'Student Profile View')

@section('page-header',  'Profile')


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

</div>
@endsection
