@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{clean( trans('niva-backend.all_pages') , array('Attr.EnableID' => true))}}</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{clean( trans('niva-backend.all_pages') , array('Attr.EnableID' => true))}}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <div class="row">
                    <div class="col-lg-6">
                        <a href="{{route('page.create') . '?language=' . request()->input('language')}}" class="btn btn-primary btn-back">{{clean( trans('niva-backend.create_page') , array('Attr.EnableID' => true))}}</a>
                    </div>

                    <div class="col-lg-6 text-right">
                        @if (!empty($langs))
                            <select name="language" class="form-control language-control" onchange="window.location='{{url()->current() . '?language='}}'+this.value">
                                <option value="" selected disabled>{{clean( trans('niva-backend.select_language') , array('Attr.EnableID' => true))}}</option>
                                @foreach ($langs as $lang)
                                    <option value="{{$lang->code}}" {{$lang->code == request()->input('language') ? 'selected' : ''}}>{{$lang->name}}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>


    

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">{{clean( trans('niva-backend.title') , array('Attr.EnableID' => true))}}</th>
                            <th scope="col">{{clean( trans('niva-backend.link') , array('Attr.EnableID' => true))}}</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th scope="col">{{clean( trans('niva-backend.title') , array('Attr.EnableID' => true))}}</th>
                            <th scope="col">{{clean( trans('niva-backend.link') , array('Attr.EnableID' => true))}}</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td class="page-title" >{{$home->meta_title}}<p class="mb-0 mt-2"><a href="{{route('home-setting.edit') . '?language=' . request()->input('language')}}">{{clean( trans('niva-backend.edit') , array('Attr.EnableID' => true))}}</a></p></td>
                            <td class="page-url"><a target="_blank" href="{{URL::to('/')}}">{{URL::to('/')}}</a></td>

                            
                        </tr>
                        <tr>
                            <td class="page-title" >{{$about->meta_title}}<p class="mb-0 mt-2"><a href="{{route('about-setting.edit') . '?language=' . request()->input('language')}}">{{clean( trans('niva-backend.edit') , array('Attr.EnableID' => true))}}</a></p></td>
                            <td class="page-url"><a target="_blank" href="{{URL::to('/')}}/{{$about->slug}}">{{URL::to('/')}}/{{$about->slug}}</a></td>
                        </tr>
                        <tr>
                            <td class="page-title" >{{$portfolio->meta_title}}<p class="mb-0 mt-2"><a href="{{route('portfolio-setting.edit') . '?language=' . request()->input('language')}}">{{clean( trans('niva-backend.edit') , array('Attr.EnableID' => true))}}</a></p></td>
                            <td class="page-url"><a target="_blank" href="{{URL::to('/')}}/{{$portfolio->slug}}">{{URL::to('/')}}/{{$portfolio->slug}}</a></td>
                        </tr>
                        <tr>
                            <td class="page-title" >{{$pricing->meta_title}}<p class="mb-0 mt-2"><a href="{{route('pricing-setting.edit') . '?language=' . request()->input('language')}}">{{clean( trans('niva-backend.edit') , array('Attr.EnableID' => true))}}</a></p></td>
                            <td class="page-url"><a target="_blank" href="{{URL::to('/')}}/{{$pricing->slug}}">{{URL::to('/')}}/{{$pricing->slug}}</a></td>
                        </tr>
                        <tr>
                            <td class="page-title" >{{$blog->meta_title}}<p class="mb-0 mt-2"><a href="{{route('blog-setting.edit') . '?language=' . request()->input('language')}}">{{clean( trans('niva-backend.edit') , array('Attr.EnableID' => true))}}</a></p></td>
                            <td class="page-url"><a target="_blank" href="{{URL::to('/')}}/{{$blog->slug}}">{{URL::to('/')}}/{{$blog->slug}}</a></td>
                        </tr>
                        <tr>
                            <td class="page-title" >{{$contact->meta_title}}<p class="mb-0 mt-2"><a href="{{route('contact-setting.edit') . '?language=' . request()->input('language')}}">{{clean( trans('niva-backend.edit') , array('Attr.EnableID' => true))}}</a></p></td>
                            <td class="page-url"><a target="_blank" href="{{URL::to('/')}}/{{$contact->slug}}">{{URL::to('/')}}/{{$contact->slug}}</a></td>
                        </tr>
                        


                        
                    </tbody>
                </table>

       

            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@stop

