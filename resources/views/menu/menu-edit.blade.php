@extends('layouts.admin')

@section('content')

@include('includes.tinyeditor')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{clean( trans('niva-backend.edit_menu') , array('Attr.EnableID' => true))}}</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{clean( trans('niva-backend.edit_menu') , array('Attr.EnableID' => true))}}</h6>
        </div>
        <div class="card-body">

                <a href="{{route('menu.index') . '?language=' . request()->input('language')}}" class="btn btn-primary btn-back">{{clean( trans('niva-backend.back_menu') , array('Attr.EnableID' => true))}}</a>

                @if ($message = Session::get('menu_success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>    
                        <strong>{{ $message }}</strong>
                    </div>
                @endif


                @include('includes.form-errors')

                <div class="row">

                	<div class="col-md-12">

                		<form action="{{route('menu.update', $menu->id)}}" method="POST" enctype="multipart/form-data">
					        @csrf
					        @method('PUT')

					        <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">


                                     <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.name') , array('Attr.EnableID' => true))}}</strong>
                                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{$menu->name}}">
                                    </div>
                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.link') , array('Attr.EnableID' => true))}}</strong>
                                        <input type="text" name="link" class="form-control" placeholder="Link" value="{{$menu->link}}">
                                    </div>

                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.on_off_submenu') , array('Attr.EnableID' => true))}}</strong>
                                        
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="on_off_submenu" id="on_off_submenu1" value="1" 
                                            @if($menu->on_off_submenu == 1) checked @endif>
                                          <label class="form-check-label" for="on_off_submenu1"> {{clean( trans('niva-backend.on') , array('Attr.EnableID' => true))}}  </label>
                                        </div>

                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="on_off_submenu" id="on_off_submenu0" value="0" 
                                            @if($menu->on_off_submenu == 0) checked @endif>
                                          <label class="form-check-label" for="on_off_submenu0"> {{clean( trans('niva-backend.off') , array('Attr.EnableID' => true))}}  </label>
                                        </div>  
                                        
                                    </div>

                                    <div class="form-group submeniu-code @if($menu->on_off_submenu == 0) hide @endif">
                                        <strong>{{clean( trans('niva-backend.html_submenu') , array('Attr.EnableID' => true))}}</strong>
                                        <textarea name="submenu" class="form-control" id="submenu" rows="6">{{clean( $menu->submenu , array('Attr.EnableID' => true))}}</textarea>
                                    </div>
                       
                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.order') , array('Attr.EnableID' => true))}}</strong>
                                        <input type="text" name="order" class="form-control" value="{{$menu->order}}" placeholder="Order">
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

