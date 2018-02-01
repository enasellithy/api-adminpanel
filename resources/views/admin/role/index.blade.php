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
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Role</li>
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
            <div class="col-lg-8 col-md-8">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Display Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Control</th>
                    </tr>
                    </thead>
                    <tbody>

                    @forelse($roles as $role)
                        <tr>
                            <td>{{$role->name}}</td>
                            <td>{{$role->display_name}}</td>
                            <td>{{$role->description}}</td>
                            <td>
                                <a href="{{url('admin/role/'.$role->id.'/edit')}}"
                                   class="btn btn-primary">Edit</a>
                            </td>
                        </tr>
                        @empty
                            <th>No Roles</th>
                        @endforelse

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
    @if (Session::has('sweet_alert.alert'))
        <script>
            swal({
                text: "{!! Session::get('sweet_alert.text') !!}",
                title: "{!! Session::get('sweet_alert.title') !!}",
                timer: {!! Session::get('sweet_alert.timer') !!},
                type: "{!! Session::get('sweet_alert.type') !!}",
                showConfirmButton: "{!! Session::get('sweet_alert.showConfirmButton') !!}",
                confirmButtonText: "{!! Session::get('sweet_alert.confirmButtonText') !!}",
                confirmButtonColor: "#AEDEF4"

                // more options
            });
        </script>
    @endif
    <script> console.log('Hi!'); </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')
@stop