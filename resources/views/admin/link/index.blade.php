@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Menu</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('admin/home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Link</li>
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
            <div class="col-lg-8 col-md-8">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Date</th>
                        <th scope="col">Control</th>
                    </tr>
                    </thead>
                    <tbody>

                    @forelse($links as $link)
                        <tr>
                            <td>{{$link->name}}</td>
                            <td>{{\App\Menu::find($link->menu_id)->name}}</td>
                            <td>
                                {{date('M j, Y',strtotime($link->created_at))}}
                            </td>
                            <td>
                                <a href="{{url('admin/link/'.$link->id.'/delete')}}"
                                   class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <th>No Link</th>
                    @endforelse

                    </tbody>
                </table>
                {!! $links->links() !!}
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