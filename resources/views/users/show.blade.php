@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{$user->name}}</h6>
        </div>
        <div class="card-body">

                <a href="{{ route('users.index') }}" class="btn btn-primary btn-back">{{clean( trans('niva-backend.back_user') , array('Attr.EnableID' => true))}}</a>

                <div class="row">
                    <div class="col-md-3">
                        <div class="img-container">
                            <img class="img-fluid" src="/public/images/media/{{$user->photo ? $user->photo->file : '/public/img/200x200.png'}}" alt="">
                        </div>
                    </div>
                    <div class="col-md-9">

                        <form>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.name') , array('Attr.EnableID' => true))}}</strong>
                                        <input type="text" name="name" value="{{$user->name}}" class="form-control" placeholder="{{clean( trans('niva-backend.name') , array('Attr.EnableID' => true))}}" readonly="">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.email') , array('Attr.EnableID' => true))}}</strong>
                                        <input type="email" name="email" value="{{$user->email}}" class="form-control" placeholder="{{clean( trans('niva-backend.email') , array('Attr.EnableID' => true))}}" readonly="">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.address') , array('Attr.EnableID' => true))}}</strong>
                                        <input type="text" name="address" value="{{$user->address}}" class="form-control" placeholder="{{clean( trans('niva-backend.address') , array('Attr.EnableID' => true))}}" readonly="">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.city') , array('Attr.EnableID' => true))}}</strong>
                                        <input type="text" name="city" value="{{$user->city}}" class="form-control" placeholder="{{clean( trans('niva-backend.city') , array('Attr.EnableID' => true))}}" readonly="">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.phone') , array('Attr.EnableID' => true))}}</strong>
                                        <input type="text" name="phone" value="{{$user->phone}}" class="form-control" placeholder="{{clean( trans('niva-backend.phone') , array('Attr.EnableID' => true))}}" readonly="">
                                    </div>
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