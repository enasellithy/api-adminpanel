@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Create News</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('admin/home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{url('admin/get/news')}}">News</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add News</li>
                    </ol>
                </nav>
            </div>

            <div class="col-lg-6 col-md-6">
                <a href="{{url('admin/news/create')}}" class="btn btn-info">Add News</a>
            </div>

        </div>
    </div>

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

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                {!! Form::open(['url' => 'admin/news/store', 'class'=>'form-horizontal']) !!}

                {!! Form::text('title',old('title'),['class'=>'form-contol','placeholder'=>'title']) !!}
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                {!! Form::textarea('des',old('des'),['class'=>'form-contol','placeholder'=>'des']) !!}
                {!! Form::textarea('content',old('content'),['class'=>'form-contol','placeholder'=>'content']) !!}
                {!! Form::select('status' , newsStatus()  , ['class' => 'form-control'] ) !!}
                {!! Form::submit('add',['class'=>'btn btn-info']) !!}

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