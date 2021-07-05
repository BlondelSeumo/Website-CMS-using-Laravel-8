@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{clean( trans('niva-backend.section_7_blog') , array('Attr.EnableID' => true))}}</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{clean( trans('niva-backend.section_7_blog') , array('Attr.EnableID' => true))}}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                
                <div class="row">
                    <div class="col-lg-6">
                        @if(Auth::user()->role->name == 'administrator')
                        <a href="{{route('home-setting.edit') . '?language=' . request()->input('language')}}" class="btn btn-primary btn-back">{{clean( trans('niva-backend.back_homepage') , array('Attr.EnableID' => true))}}</a>
                        <a href="{{route('blog-setting.edit') . '?language=' . request()->input('language')}}" class="btn btn-primary btn-back">{{clean( trans('niva-backend.back_blogpage') , array('Attr.EnableID' => true))}}</a>
                        @endif
                        <a href="{{route('post.create') . '?language=' . request()->input('language')}}" class="btn btn-primary btn-back">{{clean( trans('niva-backend.create_article') , array('Attr.EnableID' => true))}}</a>
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

                @if ($message = Session::get('post_success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>    
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
               

                <form action="{{route('delete.post')}}" method="POST" class="form-inline">
                @csrf
                @method('DELETE')
                <div class="form-group">
                    <select name="checkbox_array" id="" class="form-control">
                        <option value="">{{clean( trans('niva-backend.delete') , array('Attr.EnableID' => true))}}</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="submit" name="delete_all" class="btn btn-primary">
                </div>



                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="options"></th>
                            <th scope="col">{{clean( trans('niva-backend.id') , array('Attr.EnableID' => true))}}</th>
                            <th scope="col">{{clean( trans('niva-backend.photo') , array('Attr.EnableID' => true))}}</th>
                            <th scope="col">{{clean( trans('niva-backend.owner') , array('Attr.EnableID' => true))}}</th>
                            <th scope="col">{{clean( trans('niva-backend.title') , array('Attr.EnableID' => true))}}</th>
                            <th scope="col">{{clean( trans('niva-backend.category') , array('Attr.EnableID' => true))}}</th>
                            <th scope="col">{{clean( trans('niva-backend.body') , array('Attr.EnableID' => true))}}</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th><input type="checkbox" id="options1"></th>
                            <th scope="col">{{clean( trans('niva-backend.id') , array('Attr.EnableID' => true))}}</th>
                            <th scope="col">{{clean( trans('niva-backend.photo') , array('Attr.EnableID' => true))}}</th>
                            <th scope="col">{{clean( trans('niva-backend.owner') , array('Attr.EnableID' => true))}}</th>
                            <th scope="col">{{clean( trans('niva-backend.title') , array('Attr.EnableID' => true))}}</th>
                            <th scope="col">{{clean( trans('niva-backend.category') , array('Attr.EnableID' => true))}}</th>
                            <th scope="col">{{clean( trans('niva-backend.body') , array('Attr.EnableID' => true))}}</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if($posts)
                            @foreach($posts as $post)
                                <tr>
                                    <td><input class="checkboxes" type="checkbox" name="checkbox_array[]" value="{{$post->id}}"></td>
                                    <td data-label="ID">{{$post->id}}</td>
                                    <td data-label="Photo"><img height="50" src="{{$post->photo ? '/public/images/media/' . $post->photo->file : '/public/img/200x200.png'}}" alt=""><p class="mb-0 mt-2"><a href="{{ route('post.edit', $post->id) . '?language=' . request()->input('language')}}">{{clean( trans('niva-backend.edit') , array('Attr.EnableID' => true))}}</a></p></td>
                                    <td data-label="OWNER">{{$post->user->name}}</td>
                                    <td data-label="TITLE">{{$post->title}}</a></td>
                                    <td data-label="Category">{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
                                    <td class="body-post" data-label="BODY">{{$post->meta_description}}</td>
                                </tr>
                             @endforeach
                        @endif


                        
                    </tbody>
                </table>

                </form>

            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@stop

