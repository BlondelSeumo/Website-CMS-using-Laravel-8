@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{clean( trans('niva-backend.edit') , array('Attr.EnableID' => true))}}</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{clean( trans('niva-backend.edit') , array('Attr.EnableID' => true))}}</h6>
        </div>
        <div class="card-body">



                @if ($message = Session::get('language_success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>    
                        <strong>{{ $message }}</strong>
                    </div>
                @endif


                @include('includes.form-errors')

                <div class="row">

                	<div class="col-md-12">

                		<form action="{{route('language.update', $language->id)}}" method="POST" enctype="multipart/form-data">
					        @csrf
					        @method('PUT')

					        <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">

                                    <div class="form-group">
                                        <img class="img-fluid pb-4" width="100" height="100" src="{{$language->photo ? '/public/images/media/' . $language->photo->file : '/public/img/200x200.png'}}">
                                        <p><strong>{{clean( trans('niva-backend.photo') , array('Attr.EnableID' => true))}}</strong></p>
                                        <input type="file"  name="photo_id" class="form-control-file"  id="photo_id">
                                    </div>


                                     <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.name') , array('Attr.EnableID' => true))}}</strong>
                                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{$language->name}}">
                                    </div>
                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.code_lang') , array('Attr.EnableID' => true))}}</strong>
                                        <input type="text" name="code" class="form-control" placeholder="Code" value="{{$language->code}}">
                                    </div>

                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.is_default') , array('Attr.EnableID' => true))}}</strong>
                                        
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="is_default" id="on_off_sublanguage1" value="1" 
                                            @if($language->is_default == 1) checked @endif>
                                          <label class="form-check-label" for="on_off_sublanguage1"> {{clean( trans('niva-backend.yes') , array('Attr.EnableID' => true))}}  </label>
                                        </div>

                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="is_default" id="on_off_sublanguage0" value="0" 
                                            @if($language->is_default == 0) checked @endif>
                                          <label class="form-check-label" for="on_off_sublanguage0"> {{clean( trans('niva-backend.no') , array('Attr.EnableID' => true))}}  </label>
                                        </div>  
                                        
                                    </div>

                                     <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.ltr_rtl') , array('Attr.EnableID' => true))}}</strong>
                                        
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="rtl" id="on_off_sublanguage1" value="1" 
                                            @if($language->rtl == 1) checked @endif>
                                          <label class="form-check-label" for="on_off_sublanguage1"> {{clean( trans('niva-backend.yes') , array('Attr.EnableID' => true))}}  </label>
                                        </div>

                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="rtl" id="on_off_sublanguage0" value="0" 
                                            @if($language->rtl == 0) checked @endif>
                                          <label class="form-check-label" for="on_off_sublanguage0"> {{clean( trans('niva-backend.no') , array('Attr.EnableID' => true))}}  </label>
                                        </div>  
                                        
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

