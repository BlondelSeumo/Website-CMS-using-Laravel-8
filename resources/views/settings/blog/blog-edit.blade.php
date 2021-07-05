@extends('layouts.admin')

@section('content')

@include('includes.tinyeditor')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{clean( trans('niva-backend.blog_settings') , array('Attr.EnableID' => true))}}</h1>




                @if ($message = Session::get('setting_success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>    
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                <div class="pb-2 text-right">
                    @if (!empty($langs))
                        <select name="language" class="form-control language-control" onchange="window.location='{{url()->current() . '?language='}}'+this.value">
                            <option value="" selected disabled>{{clean( trans('niva-backend.select_language') , array('Attr.EnableID' => true))}}</option>
                            @foreach ($langs as $lang)
                                <option value="{{$lang->code}}" {{$lang->code == request()->input('language') ? 'selected' : ''}}>{{$lang->name}}</option>
                            @endforeach
                        </select>
                    @endif
                </div>


                @include('includes.form-errors')

                <div class="row">

                	<div class="col-md-12">


                        <!-- blogs -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-dark">{{clean( trans('niva-backend.blog_settings') , array('Attr.EnableID' => true))}}</h6>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <a class="btn btn-primary" href="{{ route('post.index') . '?language=' . request()->input('language')}}">{{clean( trans('niva-backend.view_all') , array('Attr.EnableID' => true))}}</a>
                                    <a class="btn btn-primary" href="{{ route('post.create') . '?language=' . request()->input('language')}}">{{clean( trans('niva-backend.create') , array('Attr.EnableID' => true))}}</a>
                                </div>
                            </div>
                        </div>
                        <!-- blogs -->

                        <!-- Sidebar -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-dark">{{clean( trans('niva-backend.sidebar') , array('Attr.EnableID' => true))}}</h6>
                            </div>
                            <div class="card-body">
                                <form action="{{route('blog-setting.update', $setting->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.html_sidebar1') , array('Attr.EnableID' => true))}}</strong>
                                                <textarea name="html_sidebar1" class="form-control" rows="6">{{clean( $setting->html_sidebar1, array('Attr.EnableID' => true))}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.html_sidebar2') , array('Attr.EnableID' => true))}}</strong>
                                                <textarea name="html_sidebar2" class="form-control" rows="6">{{clean( $setting->html_sidebar2 , array('Attr.EnableID' => true))}}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                                            <button type="submit" class="btn btn-primary">{{clean( trans('niva-backend.update') , array('Attr.EnableID' => true))}}</button>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                        <!-- SEO -->


                        <!-- SEO -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-dark">{{clean( trans('niva-backend.seo') , array('Attr.EnableID' => true))}}</h6>
                            </div>
                            <div class="card-body">
                                <form action="{{route('blog-setting.update', $setting->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.meta_title') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="meta_title" class="form-control" value="{{$setting->meta_title}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.meta_description') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="meta_description" class="form-control" value="{{$setting->meta_description}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.slug') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="slug" class="form-control" value="{{$setting->slug}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.anchor_text') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="breadcrumbs_anchor" class="form-control" value="{{$setting->breadcrumbs_anchor}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                                            <button type="submit" class="btn btn-primary">{{clean( trans('niva-backend.update') , array('Attr.EnableID' => true))}}</button>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                        <!-- SEO -->


                		
                	</div>
                </div>



</div>
<!-- /.container-fluid -->




@endsection