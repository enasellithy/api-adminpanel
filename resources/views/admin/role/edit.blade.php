@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Roles</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('admin/role')}}">Role</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit {{$role->name}} Role</li>
                    </ol>
                </nav>
            </div>

            <div class="col-lg-6 col-md-6">
                <a href="{{url('admin/create')}}" class="btn btn-info">Add Role</a>
            </div>

        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                {!! Form::open(['url' => 'admin/role/'.$role->id.'/update', 'class'=>'form-horizontal']) !!}

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{$role->name}}" class="form-control" id="name">
                    </div>

                    <div class="form-group">
                        <label for="display_name">Display Name</label>
                        <input type="text" name="display_name" value="{{$role->display_name}}" class="form-control" id="display_name">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" value="{{$role->description}}" class="form-control" id="description">
                    </div>

                    <div class="input-group mb-3">
                        <h3>Permission</h3>
                        @foreach($permissions as $permission)
                        <div>
                            <input type="checkbox"
                                   {{in_array($permission->id,$role_permissions)?"checked":""}}
                                   name="permission[]"
                                   value="{{$permission->id}}">
                                {{$permission->name}}
                        </div>
                        @endforeach
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Save">
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