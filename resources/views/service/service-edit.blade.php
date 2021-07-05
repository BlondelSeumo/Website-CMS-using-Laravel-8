@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{clean( trans('niva-backend.section_4_services') , array('Attr.EnableID' => true))}}</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{clean( trans('niva-backend.section_4_services') , array('Attr.EnableID' => true))}}</h6>
        </div>
        <div class="card-body">

                <a href="{{route('service.index') . '?language=' . request()->input('language')}}" class="btn btn-primary btn-back">{{clean( trans('niva-backend.back_services') , array('Attr.EnableID' => true))}}</a>

                @if ($message = Session::get('service_success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>    
                        <strong>{{ $message }}</strong>
                    </div>
                @endif


                @include('includes.form-errors')

                <div class="row">

                	<div class="col-md-12">

                		<form action="{{route('service.update', $service->id)}}" method="POST" enctype="multipart/form-data">
					        @csrf
					        @method('PUT')

					        <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.box_icon') , array('Attr.EnableID' => true))}} <a target="_blank" href="https://fontawesome.com/">{{clean( trans('niva-backend.here') , array('Attr.EnableID' => true))}}</a></strong>
                                                <input type="text" name="icon" class="form-control" value="{{$service->icon}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.title') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="title" class="form-control" value="{{$service->title}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.description') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="description" class="form-control" value="{{$service->description}}">
                                            </div>
                                        </div>
                                    </div>

                                    
                                    
                                   
                       
                     

                                    <div class="form-group">
                                        <img class="img-fluid pb-4" width="100" height="100" src="{{$service->photo ? '/public/images/media/' . $service->photo->file : '/public/img/200x200.png'}}">
                                        <p><strong>{{clean( trans('niva-backend.photo') , array('Attr.EnableID' => true))}}</strong></p>
                                        <input type="file"  name="photo_id" class="form-control-file"  id="photo_id">
                                    </div>


                                </div>
					   
	                           
                   

					            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
					                <button type="submit" class="btn btn-primary">{{clean( trans('niva-backend.update') , array('Attr.EnableID' => true))}}</button>
					            </div>
					        </div>

					    </form>
                		
                	</div>
                </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->



@endsection