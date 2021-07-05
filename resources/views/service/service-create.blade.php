

@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{clean( trans('niva-backend.create_service') , array('Attr.EnableID' => true))}}</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{clean( trans('niva-backend.create_service') , array('Attr.EnableID' => true))}}</h6>
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

                        <form action="{{route('service.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.box_icon') , array('Attr.EnableID' => true))}} <a  target="_blank" href="https://fontawesome.com/">{{clean( trans('niva-backend.here') , array('Attr.EnableID' => true))}}</a></strong>
                                                <input type="text" name="icon" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.title') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="title" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.description') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="description" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    

                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.photo') , array('Attr.EnableID' => true))}}</strong>
                                        <input type="file"  name="photo_id" class="form-control-file"  id="photo_id">
                                    </div>

                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.select_language') , array('Attr.EnableID' => true))}}</strong>
                                        <select name="language_id" id="language_id" class="form-control">
                                            @foreach($langs as $lang)
                                                <option value="{{ $lang->id }}">{{ $lang->name }}</option>
                                            @endforeach 
                                        </select>
                                    </div>
                                
                                </div>
  

                                <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                                    <button type="submit" class="btn btn-primary">{{clean( trans('niva-backend.create') , array('Attr.EnableID' => true))}}</button>
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