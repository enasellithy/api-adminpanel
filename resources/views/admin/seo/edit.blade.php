@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Create Seo</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('admin/home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{url('admin/seo')}}">Seo</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Seo</li>
                    </ol>
                </nav>
            </div>

            <div class="col-lg-6 col-md-6">
                <a href="{{url('admin/seo/create')}}" class="btn btn-info">Add Seo</a>
            </div>

        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                {!! Form::open(['url' => 'admin/seo/'.$seo->id.'/update', 'class'=>'form-horizontal']) !!}

                <div class="form-group{{ $errors->has('meta_name') ? ' has-error' : '' }}">
                    <label for="meta_name" class="col-md-4 control-label">Name</label>

                    <div class="col-md-6">
                        <input id="meta_name" value="{{$seo->meta_name}}" type="text" class="form-control" name="meta_name" value="{{ old('meta_name') }}" required autofocus>

                        @if ($errors->has('meta_name'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('meta_name') }}</strong>
                                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('meta_body') ? ' has-error' : '' }}">
                    <label for="meta_body" class="col-md-4 control-label">Content</label>

                    <div class="col-md-6">
                        <textarea rows="7" id="meta_body" class="form-control" name="meta_body" value="{{ old('meta_body') }}" required autofocus>
                            {{$seo->meta_body}}
                        </textarea>

                        @if ($errors->has('meta_body'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('meta_body') }}</strong>
                                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </div>
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
@stop