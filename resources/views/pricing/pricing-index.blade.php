@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{clean( trans('niva-backend.all_pricings') , array('Attr.EnableID' => true))}}</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{clean( trans('niva-backend.all_pricings') , array('Attr.EnableID' => true))}}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">


               <div class="row">
                    <div class="col-lg-6">
                        <a href="{{route('pricing.create') . '?language=' . request()->input('language')}}" class="btn btn-primary btn-back">{{clean( trans('niva-backend.create') , array('Attr.EnableID' => true))}}</a>
                        <a href="{{route('pricing-setting.edit') . '?language=' . request()->input('language')}}" class="btn btn-primary btn-back">{{clean( trans('niva-backend.back_pricingpage') , array('Attr.EnableID' => true))}}</a>
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


                @if ($message = Session::get('pricing_success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>    
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
               

                <form action="{{route('delete.pricing')}}" method="POST" class="form-inline">
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
                            <th>{{clean( trans('niva-backend.title') , array('Attr.EnableID' => true))}}</th>
                            <th>{{clean( trans('niva-backend.description') , array('Attr.EnableID' => true))}}</th>
                            <th>{{clean( trans('niva-backend.button_text') , array('Attr.EnableID' => true))}}</th>
                            <th>{{clean( trans('niva-backend.button_link') , array('Attr.EnableID' => true))}}</th>  
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th><input type="checkbox" id="options1"></th>
                            <th>{{clean( trans('niva-backend.title') , array('Attr.EnableID' => true))}}</th>
                            <th>{{clean( trans('niva-backend.description') , array('Attr.EnableID' => true))}}</th>
                            <th>{{clean( trans('niva-backend.button_text') , array('Attr.EnableID' => true))}}</th>
                            <th>{{clean( trans('niva-backend.button_link') , array('Attr.EnableID' => true))}}</th>  
                        </tr>
                    </tfoot>
                    <tbody>
                        @if($pricings)
                            @foreach($pricings as $pricing)
                                <tr>
                                    <td><input class="checkboxes" type="checkbox" name="checkbox_array[]" value="{{$pricing->id}}"></td>
                                    <td class="pricing-title-dash">{!!$pricing->title!!}
                                    <p class="mb-0 mt-2"><a href="{{ route('pricing.edit', $pricing->id)  . '?language=' . request()->input('language')}}">{{clean( trans('niva-backend.edit') , array('Attr.EnableID' => true))}}</a></p>
                                    </td>

                                    <td class="pricing-desc-dash" data-label="link">{!!$pricing->description!!}</td>
                                    <td data-label="link">{!!$pricing->button_text!!}</td>
                                    <td data-label="link">{{$pricing->button_link}}</td>
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

