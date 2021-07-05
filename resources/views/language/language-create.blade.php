

@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{clean( trans('niva-backend.create_language') , array('Attr.EnableID' => true))}}</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{clean( trans('niva-backend.create_language') , array('Attr.EnableID' => true))}}</h6>
        </div>
        <div class="card-body">



                @if ($message = Session::get('language_success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>    
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
   

                @include('includes.form-errors')

                <div class="row form-language">
                    <div class="col-md-12">

                        <form action="{{route('language.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">

                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.photo') , array('Attr.EnableID' => true))}}</strong>
                                        <input type="file"  name="photo_id" class="form-control-file"  id="photo_id">
                                    </div>

                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.name') , array('Attr.EnableID' => true))}}</strong>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.code_lang') , array('Attr.EnableID' => true))}}</strong>
                                        <input type="text" name="code" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.is_default') , array('Attr.EnableID' => true))}}</strong>
                                        
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="is_default" id="is_default1" value="1">
                                          <label class="form-check-label" for="is_default1"> {{clean( trans('niva-backend.yes') , array('Attr.EnableID' => true))}}  </label>
                                        </div>

                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="is_default" id="is_default2" value="0">
                                          <label class="form-check-label" for="is_default2"> {{clean( trans('niva-backend.no') , array('Attr.EnableID' => true))}}  </label>
                                        </div>
                                        
                                    </div>


                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.ltr_rtl') , array('Attr.EnableID' => true))}}</strong>
                                        
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="rtl" id="rtl2" value="0">
                                          <label class="form-check-label" for="rtl2"> LTR  </label>
                                        </div>

                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="rtl" id="rtl1" value="1">
                                          <label class="form-check-label" for="rtl1"> RTL  </label>
                                        </div>

                                        
                                        
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
