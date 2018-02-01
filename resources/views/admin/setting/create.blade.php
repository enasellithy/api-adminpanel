@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Setting</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('admin/home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{url('admin/setting')}}">Setting</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Setting</li>
                    </ol>
                </nav>
            </div>

            <div class="col-lg-6 col-md-6">
                <a href="{{url('admin/setting/create')}}" class="btn btn-info">Add Setting</a>
            </div>

        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                {!! Form::open(['url' => 'admin/setting/store',
                'class'=>'form-horizontal','enctype' => 'multipart/form-data', 'files' => true]) !!}

                    <div class="form-group">
                        <div class="form-line">
                            <label for="">Name</label>
                            <input type="text" name="name" id="name" class="form-control"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="">
                            <label for="">{{ trans('setting.type') }}</label>
                            @php $type = isset($item) ? $item->type : null @endphp
                            {!! Form::select('type' , setting_type() , $type  , ['id' => 'setting_type'  , 'class' => 'form-control'] ) !!}
                        </div>
                    </div>

                    <div class="setting_content">
                        @if(isset($item))
                            @if($item->type == 'text')
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="body_setting" id="body" class="form-control" value="{{ $item->body_setting }}"/>
                                    </div>
                                </div>
                            @elseif($item->type == 'image')
                                <div class="form-group">
                                    <div class="form-line">
                                        <img src="{{ url('/'.env('UPLOAD_PATH').'/'.$item->body_setting) }}" class="img-responsive thumbnail" />
                                        <input type="file" name="body_setting">
                                    </div>
                                </div>
                            @elseif($item->type == 'textarea')
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea type="text" name="body_setting" id="body" class="form-control">{{ $item->body_setting }}</textarea>
                                    </div>
                                </div>
                            @endif
                        @else
                            @include('admin.setting.script.text')
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-default" >
                            <i class="material-icons">check_circle</i>
                            {{ trans('home.save') }}   {{ trans('setting.setting') }}
                        </button>
                    </div>


                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script>
        $('#setting_type').on('change' , function(){
            var value  = $(this).val();
            var content  = $('.setting_content');
            if(value == 'text'){
                content.html('@include('admin.setting.script.text')');
            }else if(value == 'image'){
                content.html('@include('admin.setting.script.image')');
            }else if(value == 'textarea'){
                content.html('@include('admin.setting.script.textarea')');
            }
        });
    </script>
@stop