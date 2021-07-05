@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{clean( trans('niva-backend.all_languages') , array('Attr.EnableID' => true))}}</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{clean( trans('niva-backend.all_languages') , array('Attr.EnableID' => true))}}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">


                @if ($message = Session::get('language_success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>    
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                <div class="row">
                    <div class="col-lg-6">
                        <a href="{{route('language.create')}}" class="btn btn-primary btn-back">{{clean( trans('niva-backend.create_language') , array('Attr.EnableID' => true))}}</a>
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
               

                <form action="{{route('delete.language')}}" method="POST" class="form-inline">
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
                            <th>{{clean( trans('niva-backend.photo') , array('Attr.EnableID' => true))}}</th>
                            <th>{{clean( trans('niva-backend.name') , array('Attr.EnableID' => true))}}</th>
                            <th>{{clean( trans('niva-backend.code_lang') , array('Attr.EnableID' => true))}}</th>
                            <th>{{clean( trans('niva-backend.is_default') , array('Attr.EnableID' => true))}}</th>
                            <th>{{clean( trans('niva-backend.ltr_rtl') , array('Attr.EnableID' => true))}}</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th><input type="checkbox" id="options1"></th>
                            <th>{{clean( trans('niva-backend.photo') , array('Attr.EnableID' => true))}}</th>
                            <th>{{clean( trans('niva-backend.name') , array('Attr.EnableID' => true))}}</th>
                            <th>{{clean( trans('niva-backend.code_lang') , array('Attr.EnableID' => true))}}</th>
                            <th>{{clean( trans('niva-backend.is_default') , array('Attr.EnableID' => true))}}</th>
                            <th>{{clean( trans('niva-backend.ltr_rtl') , array('Attr.EnableID' => true))}}</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if($languages)
                            @foreach($languages->sortBy('id') as $language)
                                <tr>
                                    <td><input class="checkboxes" type="checkbox" name="checkbox_array[]" value="{{$language->id}}"></td>
                                    <td data-label="Photo"><img height="50" src="{{$language->photo ? '/public/images/media/' . $language->photo->file : '/public/img/200x200.png'}}" alt=""></td>
                                    <td class="language-name" data-label="Name">
                                        <div class="float-left-language-name">
                                            <p>{{$language->name}}</p>
                                            <a href="{{ route('language.edit', $language->id)}}">{{clean( trans('niva-backend.edit') , array('Attr.EnableID' => true))}}</a>
                                        </div>
                                    </td>
                                    <td class="language-link" data-label="link">{{$language->code}}</td>
                                    <td data-label="link">{{ $language->is_default == 1 ? 'Yes' : 'No'}} </td>
                                    
                                    <td data-label="link">{{ $language->rtl == 1 ? 'RTL' : 'LTR'}} </td>
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

