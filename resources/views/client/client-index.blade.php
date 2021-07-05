@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{clean( trans('niva-backend.all_clients') , array('Attr.EnableID' => true))}}</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{clean( trans('niva-backend.all_clients') , array('Attr.EnableID' => true))}}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <a href="{{route('about-setting.edit')}}" class="btn btn-primary btn-back">{{clean( trans('niva-backend.back_aboutpage') , array('Attr.EnableID' => true))}}</a>
                <a href="{{route('contact-setting.edit')}}" class="btn btn-primary btn-back">{{clean( trans('niva-backend.back_contact_page') , array('Attr.EnableID' => true))}}</a>
                <a href="{{route('client.create')}}" class="btn btn-primary btn-back">{{clean( trans('niva-backend.create') , array('Attr.EnableID' => true))}}</a>

                @if ($message = Session::get('client_success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>    
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
               

                <form action="{{route('delete.client')}}" method="POST" class="form-inline">
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
                            <th>{{clean( trans('niva-backend.company_name') , array('Attr.EnableID' => true))}}</th>
                            <th>{{clean( trans('niva-backend.company_link') , array('Attr.EnableID' => true))}}</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th><input type="checkbox" id="options1"></th>
                            <th>{{clean( trans('niva-backend.photo') , array('Attr.EnableID' => true))}}</th>
                            <th>{{clean( trans('niva-backend.company_name') , array('Attr.EnableID' => true))}}</th>
                            <th>{{clean( trans('niva-backend.company_link') , array('Attr.EnableID' => true))}}</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if($clients)
                            @foreach($clients as $client)
                                <tr>
                                    <td><input class="checkboxes" type="checkbox" name="checkbox_array[]" value="{{$client->id}}"></td>
                                    <td><img height="100" src="{{$client->photo ? '/public/images/media/' . $client->photo->file : '/public/img/200x200.png'}}" alt="">
                                    <p class="mb-0 mt-2"><a href="{{ route('client.edit', $client->id) }}">{{clean( trans('niva-backend.edit') , array('Attr.EnableID' => true))}}</a></p>
                                    </td>

                                    <td data-label="link">{{$client->company_name}}</td>
                                    <td data-label="link">{{$client->company_link}}</td>
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

@section('footer')
    <script>
        $(document).ready(function(){
            $('#options').click(function(){
                if(this.checked){
                    $('.checkboxes').each(function(){
                        this.checked = true;
                        jQuery('#options1').prop('checked', true);
                    });
                }else {
                    $('.checkboxes').each(function(){
                        this.checked = false;
                        jQuery('#options1').prop('checked', false);
                    });
                }
            });
            $('#options1').click(function(){
                if(this.checked){
                    $('.checkboxes').each(function(){
                        this.checked = true;
                        jQuery('#options').prop('checked', true);
                    });
                }else {
                    $('.checkboxes').each(function(){
                        this.checked = false;
                        jQuery('#options').prop('checked', false);
                    });
                }
            });
        });
    </script>
@stop
