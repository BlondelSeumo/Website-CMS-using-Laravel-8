

@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{clean( trans('niva-backend.create_menu') , array('Attr.EnableID' => true))}}</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{clean( trans('niva-backend.create_menu') , array('Attr.EnableID' => true))}}</h6>
        </div>
        <div class="card-body">

                <a href="{{route('menu.index') . '?language=' . request()->input('language')}}" class="btn btn-primary btn-back">{{clean( trans('niva-backend.back_menu') , array('Attr.EnableID' => true))}}</a>


                @if ($message = Session::get('menu_success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>    
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
   

                @include('includes.form-errors')

                <div class="row form-menu">
                    <div class="col-md-12">

                        <form action="{{route('menu.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.name') , array('Attr.EnableID' => true))}}</strong>
                                        <input type="text" name="name" class="form-control" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.link') , array('Attr.EnableID' => true))}}</strong>
                                        <input type="text" name="link" class="form-control" placeholder="Link">
                                    </div>

                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.on_off_submenu') , array('Attr.EnableID' => true))}}</strong>
                                        
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="on_off_submenu" id="on_off_submenu1" value="1">
                                          <label class="form-check-label" for="on_off_submenu1"> {{clean( trans('niva-backend.on') , array('Attr.EnableID' => true))}}  </label>
                                        </div>

                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="on_off_submenu" id="on_off_submenu0" value="0">
                                          <label class="form-check-label" for="on_off_submenu0"> {{clean( trans('niva-backend.off') , array('Attr.EnableID' => true))}}  </label>
                                        </div>
                                        
                                    </div>

                                    <div class="form-group submeniu-code hide">
                                        <strong>{{clean( trans('niva-backend.html_submenu') , array('Attr.EnableID' => true))}}</strong>
                                        <textarea name="submenu" class="form-control" id="submenu" rows="6"></textarea>
                                        <div class="alert alert-success">
                                            <strong>{{clean( trans('niva-backend.html_submenu_ex') , array('Attr.EnableID' => true))}}</strong>
                                            <xmp>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">{{clean( trans('niva-backend.html_submenu_link_test') , array('Attr.EnableID' => true))}}</a>
                                                <a class="dropdown-item" href="#">{{clean( trans('niva-backend.html_submenu_link_test') , array('Attr.EnableID' => true))}}</a>
                                                <a class="dropdown-item" href="#">{{clean( trans('niva-backend.html_submenu_link_test') , array('Attr.EnableID' => true))}}</a>
                                            </div>
                                            </xmp>
                                            </pre>
                                        </div>
                                    </div>
                       
                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.order') , array('Attr.EnableID' => true))}}</strong>
                                        <input type="text" name="order" class="form-control" placeholder="Order">
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
