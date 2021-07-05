

@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"> {{clean( trans('niva-backend.create_user') , array('Attr.EnableID' => true))}} </h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{!! trans('niva-backend.create_user') !!}</h6>
        </div>
        <div class="card-body">

                <a href="{{ route('users.index') }}" class="btn btn-primary btn-back">{{clean( trans('niva-backend.back_user') , array('Attr.EnableID' => true))}}</a>


                @if ($message = Session::get('user_success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>    
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
   

                @include('includes.form-errors')

                <div class="row">
                    <div class="col-md-12">

                        <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.name') , array('Attr.EnableID' => true))}}</strong>
                                        <input type="text" name="name" class="form-control" placeholder="{{clean( trans('niva-backend.name') , array('Attr.EnableID' => true))}}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.email') , array('Attr.EnableID' => true))}}</strong>
                                        <input type="email" name="email" class="form-control" placeholder="{{clean( trans('niva-backend.email') , array('Attr.EnableID' => true))}}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
  
                                        <strong>{{clean( trans('niva-backend.roles') , array('Attr.EnableID' => true))}}</strong>
                                        <select name="role_id" id="role_id" class="form-control">
                                            <option>{{clean( trans('niva-backend.choose_role') , array('Attr.EnableID' => true))}}</option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach 
                                        </select>
        
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.address') , array('Attr.EnableID' => true))}}</strong>
                                        <input type="text" name="address" class="form-control" placeholder="{{clean( trans('niva-backend.address') , array('Attr.EnableID' => true))}}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.city') , array('Attr.EnableID' => true))}}</strong>
                                        <input type="text" name="city" class="form-control" placeholder="{{clean( trans('niva-backend.city') , array('Attr.EnableID' => true))}}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.phone') , array('Attr.EnableID' => true))}}</strong>
                                        <input type="text" name="phone" class="form-control" placeholder="{{clean( trans('niva-backend.phone') , array('Attr.EnableID' => true))}}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.photo') , array('Attr.EnableID' => true))}}</strong>
                                        <input type="file"  name="photo_id" class="form-control-file"  id="photo_id">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.password') , array('Attr.EnableID' => true))}}</strong>
                                        <input type="password" name="password" class="form-control" placeholder="{{clean( trans('niva-backend.password') , array('Attr.EnableID' => true))}}">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                                    <button type="submit" class="btn btn-primary">{{clean( trans('niva-backend.create_user') , array('Attr.EnableID' => true))}}</button>
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