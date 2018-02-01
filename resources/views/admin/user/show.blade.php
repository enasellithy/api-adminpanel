@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Show {{$user->name}} User</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('admin/home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{url('admin/users')}}">Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User {{$user->name}}</li>
                    </ol>
                </nav>
            </div>

            <div class="col-lg-6 col-md-6">
                <a href="{{url('admin/users/create')}}" class="btn btn-info">Add User</a>
            </div>

        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Date</th>
                        <th scope="col">Control</th>
                    </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                {{date('M j, Y',strtotime($user->created_at))}}
                            </td>
                            <td>
                                <a href="{{url('admin/users/'.$user->id.'/edit')}}"
                                   class="btn btn-primary">Edit</a>
                                <a href="{{url('admin/users/'.$user->id.'/show')}}"
                                   class="btn btn-info">Show</a>
                                <a href="{{url('admin/users/'.$user->id.'/delete')}}"
                                   class="btn btn-danger">Delete</a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="css/sweetalert.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')
@stop