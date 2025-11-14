@extends('layouts.app')

@section('title', 'Create Feedback')

@section('page-header',  'Create Feedback')


@section('css_after')
    <link href="{{ asset ('metronic/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('js_after')
    <script src="{{ asset ('metronic/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script src="{{ asset ('metronic/js/datatable.js')}}"></script>


@endsection

@section('content')
<div id="kt_content_container" class="container-xxl">

</div>

@endsection

