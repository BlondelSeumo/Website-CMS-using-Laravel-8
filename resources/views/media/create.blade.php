@extends('layouts.admin')
@section('styles')
<link href="{{asset('css/libs/dropzone.min.css')}}" rel="stylesheet">
@stop
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{clean( trans('niva-backend.upload_image') , array('Attr.EnableID' => true))}}</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{clean( trans('niva-backend.upload_image') , array('Attr.EnableID' => true))}}</h6>
        </div>
        <div class="card-body">


            <a href="{{ route('media.index') }}" class="btn btn-primary btn-back">{{clean( trans('niva-backend.back_media') , array('Attr.EnableID' => true))}}</a>

            <div class="table-responsive">
			    <form action="{{route('media.store')}}" class="dropzone" method="POST" enctype="multipart/form-data">
			        @csrf

			    </form>
            </div>

            <p class="mb-4 mt-4">{{clean( trans('niva-backend.accepted_files') , array('Attr.EnableID' => true))}}</p>  

        </div>
    </div>

</div>
@stop
