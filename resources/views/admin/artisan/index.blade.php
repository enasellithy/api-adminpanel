@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    <div class="container">

        <div>
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="row">
            <div class="col-md-8">
                {!! Form::open(['url'=>'admin/artisan/add','class'=>'form-horizontal']) !!}
                    <div class="form-group">
                        <div class="form-line">
                            <label for="">Command</label>
                            <input type="text" name="name" id="name" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            {!! Form::select('command' , name()  , ['class' => 'form-control'] ) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="submit" value="Go" class="btn btn-info"/>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('select').select2();
        });
    </script>
@stop