@extends('layouts.admin')

@section('content')

@include('includes.tinyeditor')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{clean( trans('niva-backend.edit_slider') , array('Attr.EnableID' => true))}}</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{clean( trans('niva-backend.edit_slider') , array('Attr.EnableID' => true))}}</h6>
        </div>
        <div class="card-body">

                <a href="{{route('slider.index') . '?language=' . request()->input('language')}}" class="btn btn-primary btn-back">{{clean( trans('niva-backend.back_slider') , array('Attr.EnableID' => true))}} </a>


                @if ($message = Session::get('slider_success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>    
                        <strong>{{ $message }}</strong>
                    </div>
                @endif


                @include('includes.form-errors')

                <div class="row">

                	<div class="col-md-12">

                		<form action="{{route('slider.update', $slider->id)}}" method="POST" enctype="multipart/form-data">
					        @csrf
					        @method('PUT')

					        <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.heading_1') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="heading1" class="form-control" value="{{$slider->heading1}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.heading_2') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="heading2" class="form-control" value="{{$slider->heading2}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.typed_text') , array('Attr.EnableID' => true))}}</strong>
                                        <input type="text" name="typed_text" class="form-control" value="{{$slider->typed_text}}">
                                    </div>

                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.body') , array('Attr.EnableID' => true))}}</strong>
                                        <textarea name="bodyslider" class="form-control" id="bodyslider" rows="10">{{$slider->bodyslider}}</textarea>
                                    </div>
                             

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.button_text') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="button_text" class="form-control" value="{{$slider->button_text}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.button_link') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="button_link" class="form-control" value="{{$slider->button_link}}">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.button_text') , array('Attr.EnableID' => true))}} 2</strong>
                                                <input type="text" name="button_text2" class="form-control" value="{{$slider->button_text2}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.button_link') , array('Attr.EnableID' => true))}} 2</strong>
                                                <input type="text" name="button_link2" class="form-control" value="{{$slider->button_link2}}">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                       
                                    

                                    <div class="form-group">
                                        <img class="img-fluid pb-4" width="100" height="100" src="{{$slider->photo ? '/public/images/media/' . $slider->photo->file : '/public/img/200x200.png'}}">
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