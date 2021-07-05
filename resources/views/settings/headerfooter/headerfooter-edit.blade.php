@extends('layouts.admin')

@section('content')

@include('includes.tinyeditor')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{clean( trans('niva-backend.headerfooter_settings') , array('Attr.EnableID' => true))}}</h1>




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




                        <!-- Sidebar Header -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-dark">{{clean( trans('niva-backend.start_project_button') , array('Attr.EnableID' => true))}}</h6>
                            </div>
                            <div class="card-body">
                                <form action="{{route('headerfooter-setting.update', $setting->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.title') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="sidebar_title" class="form-control" value="{{$setting->sidebar_title}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.link') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="sidebar_description" class="form-control" value="{{$setting->sidebar_description}}">
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
                        <!-- Sidebar Header -->


                        <!-- Typed text section -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-dark">{{clean( trans('niva-backend.footer_typed_text_section') , array('Attr.EnableID' => true))}}</h6>
                            </div>
                            <div class="card-body">
                                <form action="{{route('headerfooter-setting.update', $setting->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.typed_title') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="typed_title" class="form-control" value="{{$setting->typed_title}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.typed_text') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="typed_text" class="form-control" value="{{$setting->typed_text}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.button_text') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="typed_buttontext" class="form-control" value="{{$setting->typed_buttontext}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.button_link') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="typed_buttonlink" class="form-control" value="{{$setting->typed_buttonlink}}">
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
                        <!-- Typed text section -->

                        <!-- Footer column 1 -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-dark">{{clean( trans('niva-backend.footer_col_1') , array('Attr.EnableID' => true))}}</h6>
                            </div>
                            <div class="card-body">
                                <form action="{{route('headerfooter-setting.update', $setting->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.subtitle') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="footer_col1_subtitle" class="form-control" value="{{$setting->footer_col1_subtitle}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.title') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="footer_col1_title" class="form-control" value="{{$setting->footer_col1_title}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.button_text') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="footer_col1_buttontext" class="form-control" value="{{$setting->footer_col1_buttontext}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.button_link') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="footer_col1_buttonlink" class="form-control" value="{{$setting->footer_col1_buttonlink}}">
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
                        <!-- Footer column 1 -->

                        <!-- Footer column 2 -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-dark">{{clean( trans('niva-backend.footer_col_2') , array('Attr.EnableID' => true))}}</h6>
                            </div>
                            <div class="card-body">
                                <form action="{{route('headerfooter-setting.update', $setting->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.title') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="footer_col2_title1" class="form-control" value="{{$setting->footer_col2_title1}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.title') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="footer_col2_title2" class="form-control" value="{{$setting->footer_col2_title2}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.description') , array('Attr.EnableID' => true))}}</strong>
                                                <textarea name="footer_col2_html1" class="form-control" rows="6">{{$setting->footer_col2_html1}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.description') , array('Attr.EnableID' => true))}}</strong>
                                                <textarea name="footer_col2_html2" class="form-control" rows="6">{{$setting->footer_col2_html2}}</textarea>
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
                        <!-- Footer column 2 -->


                        <!-- Copyright text -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-dark">{{clean( trans('niva-backend.copyright_text_title') , array('Attr.EnableID' => true))}}</h6>
                            </div>
                            <div class="card-body">
                                <form action="{{route('headerfooter-setting.update', $setting->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.copyright_text_title') , array('Attr.EnableID' => true))}}</strong>
                                        <textarea name="footer_copyright" class="form-control" rows="6">{{$setting->footer_copyright}}</textarea>
                                    </div>


                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                                            <button type="submit" class="btn btn-primary">{{clean( trans('niva-backend.update') , array('Attr.EnableID' => true))}}</button>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                        <!-- Copyright text -->

                		
                	</div>
                </div>



</div>
<!-- /.container-fluid -->




@endsection