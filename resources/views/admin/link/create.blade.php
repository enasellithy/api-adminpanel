@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Create User</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('admin/home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{url('admin/link')}}">Link</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Link</li>
                    </ol>
                </nav>
            </div>

            <div class="col-lg-6 col-md-6">
                <a href="{{url('admin/link/create')}}" class="btn btn-info">Add Link</a>
            </div>

        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                {!! Form::open(['url' => 'admin/link/store', 'class'=>'form-horizontal']) !!}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                    <label for="link" class="col-md-4 control-label">Link</label>

                    <div class="col-md-6">
                        <input id="link" type="text" class="form-control" name="link" value="{{ old('link') }}" required autofocus>

                        @if ($errors->has('link'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('link') }}</strong>
                                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="group" class="col-md-4 control-label">Group</label>

                    <div class="col-md-6">
                        <select name="menu_id" class="form-control">
                            @foreach($menus as $menu)
                                <option value="{{$menu->id}}">{{$menu->name}}</option>
                            @endforeach
                        </select>
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