@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{clean( trans('niva-backend.dashboard') , array('Attr.EnableID' => true))}}</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4 dashboard-page">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{clean( trans('niva-backend.dashboard') , array('Attr.EnableID' => true))}}</h6>
        </div>
        <div class="card-body">
        <div class="row">

                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{clean( trans('niva-backend.blog') , array('Attr.EnableID' => true))}}</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$post_number}} {{clean( trans('niva-backend.posts') , array('Attr.EnableID' => true))}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{clean( trans('niva-backend.projects') , array('Attr.EnableID' => true))}}</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$project_number}} {{clean( trans('niva-backend.projects') , array('Attr.EnableID' => true))}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{clean( trans('niva-backend.what_we_do') , array('Attr.EnableID' => true))}}</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$service_number}} {{clean( trans('niva-backend.services') , array('Attr.EnableID' => true))}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{clean( trans('niva-backend.feedback') , array('Attr.EnableID' => true))}}</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$testimonial_number}} {{clean( trans('niva-backend.testimonials') , array('Attr.EnableID' => true))}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                 <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> {{clean( trans('niva-backend.our_team') , array('Attr.EnableID' => true))}}</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$member_number}} {{clean( trans('niva-backend.members') , array('Attr.EnableID' => true))}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                 <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> {{clean( trans('niva-backend.our_clients') , array('Attr.EnableID' => true))}}</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$client_number}} {{clean( trans('niva-backend.clients') , array('Attr.EnableID' => true))}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


        </div>
        </div>

    </div>
</div>
<!-- /.container-fluid -->

@stop


