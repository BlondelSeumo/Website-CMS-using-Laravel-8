@include('includes.tinyeditor')

@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{clean( trans('niva-backend.create_pricing') , array('Attr.EnableID' => true))}}</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{clean( trans('niva-backend.create_pricing') , array('Attr.EnableID' => true))}}</h6>
        </div>
        <div class="card-body">

                <a href="{{route('pricing.index') . '?language=' . request()->input('language')}}" class="btn btn-primary btn-back">{{clean( trans('niva-backend.back_pricingpage') , array('Attr.EnableID' => true))}}</a>


                @if ($message = Session::get('pricing_success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>    
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
   

                @include('includes.form-errors')

                <div class="row">
                    <div class="col-md-12">

                        <form action="{{route('pricing.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="language_id" value="{{$lang_id}}">

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    
                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.title') , array('Attr.EnableID' => true))}}</strong>
                                        <input type="text" name="title" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.description') , array('Attr.EnableID' => true))}}</strong>
                                        <textarea name="description" class="form-control" id="description" rows="6"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.button_text') , array('Attr.EnableID' => true))}}</strong>
                                        <input type="text" name="button_text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.button_link') , array('Attr.EnableID' => true))}}</strong>
                                        <input type="text" name="button_link" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.is_featured') , array('Attr.EnableID' => true))}}</strong>
                                        
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="pricing_switch" id="pricing_switch1" value="1">
                                          <label class="form-check-label" for="pricing_switch1"> {{clean( trans('niva-backend.yes') , array('Attr.EnableID' => true))}}  </label>
                                        </div>

                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="pricing_switch" id="pricing_switch0" value="0">
                                          <label class="form-check-label" for="pricing_switch0"> {{clean( trans('niva-backend.no') , array('Attr.EnableID' => true))}}  </label>
                                        </div>

                                    </div>
                     

                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.featured_badge') , array('Attr.EnableID' => true))}}</strong>
                                        <input type="text" name="popular_text" class="form-control">
                                    </div> 
                                
                                </div>
  

                                <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                                    <button type="submit" class="btn btn-primary">{{clean( trans('niva-backend.create_pricing') , array('Attr.EnableID' => true))}}</button>
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

