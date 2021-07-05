

@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{clean( trans('niva-backend.all_media') , array('Attr.EnableID' => true))}}</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{clean( trans('niva-backend.all_media') , array('Attr.EnableID' => true))}}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                 <a href="{{route('media.create')}}" class="btn btn-primary btn-back">{{clean( trans('niva-backend.upload_image') , array('Attr.EnableID' => true))}}</a>

                @if ($message = Session::get('user_success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>    
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
              

                <form action="{{route('delete.media')}}" method="post" class="form-inline">

                    {{csrf_field()}}

                    {{method_field('delete')}}


                    <div class="form-group">
                        <select name="checkBoxArray" id="" class="form-control">
                            <option value="">{{clean( trans('niva-backend.delete') , array('Attr.EnableID' => true))}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                       <input type="submit" name="delete_all" class="btn btn-primary">
                    </div>


                    <table class=" table table-bordered media-index" id="dataTable">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="options"></th>
                                <th>{{clean( trans('niva-backend.id') , array('Attr.EnableID' => true))}}</th>
                                <th>{{clean( trans('niva-backend.name') , array('Attr.EnableID' => true))}}</th>
                                <th>{{clean( trans('niva-backend.link') , array('Attr.EnableID' => true))}}</th>
                                <th>{{clean( trans('niva-backend.created') , array('Attr.EnableID' => true))}}</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th><input type="checkbox" id="options1"></th>
                                <th>{{clean( trans('niva-backend.id') , array('Attr.EnableID' => true))}}</th>
                                <th>{{clean( trans('niva-backend.name') , array('Attr.EnableID' => true))}}</th>
                                <th>{{clean( trans('niva-backend.link') , array('Attr.EnableID' => true))}}</th>
                                <th>{{clean( trans('niva-backend.created') , array('Attr.EnableID' => true))}}</th>
                            </tr>
                        </tfoot>
                        <tbody>


                        @foreach($photos as $photo)

                            <tr>
                                <td><input class="checkboxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td>
                                <td>{{$photo->id}}</td>
                                <td><img height="100" src="/public/images/media/{{$photo->file}}" alt=""></td>
                                <td>
                                    <script type="text/javascript">
                                    function copy_clip{{$photo->id}}() {
                                          var copyText = document.getElementById("copy-clip{{$photo->id}}");
                                          copyText.select();
                                          copyText.setSelectionRange(0, 99999);
                                          document.execCommand("copy");
                                          alert("Copied the text: " + copyText.value);
                                    }
                                    </script>
                                    <input type="text" name="url-clip" class="form-control" id="copy-clip{{$photo->id}}" value="{{url('/')}}/public/images/media/{{$photo->file}}" readonly="" >
                                    <a class="btn btn-primary" onclick="copy_clip{{$photo->id}}()">{{clean( trans('niva-backend.copy_url') , array('Attr.EnableID' => true))}}</a>
                                </td>
                                <td>{{$photo->created_at ? $photo->created_at : 'no date' }}</td>
                                <input type="hidden" name="photo" value="{{$photo->id}}">
                            </tr>

                        @endforeach

                        </tbody>
                    </table>

                </form>
                {!! $photos->render() !!}
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@stop

