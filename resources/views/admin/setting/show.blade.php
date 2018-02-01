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
                        <li class="breadcrumb-item active" aria-current="page">{{$setting->name}}</li>
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
            <div class="col-lg-8 col-md-8">
                <table class="table table-striped">
                    <tbody>
                        <td>Name</td>
                        <th>{{$setting->name}}</th>
                    </tbody>
                    <tbody>
                    <td>Body</td>
                    @if($setting->type == 'image')
                        <th>
                            <img src="{{url($setting->body_setting)}}">
                        </th>
                    @else
                        <th>
                            {{$setting->body_setting}}
                        </th>
                    @endif
                    </tbody>
                    <tbody>
                    <td>Date</td>
                    <th>{{date('M j, Y h:ia',strtotime($setting->created_at))}}</th>
                    </tbody>
                    <tbody>
                    <td>Control</td>
                    <th>
                        <a href="{{url('admin/setting/'.$setting->id.'/edit')}}"
                           class="btn btn-primary">Edit</a>
                        <a href="{{url('admin/setting/'.$setting->id.'/delete')}}"
                           class="btn btn-danger">Delete</a>
                    </th>
                    </tbody>
                </table>
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