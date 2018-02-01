@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>News</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('admin/home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">News</li>
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
            <div class="col-lg-8 col-md-8">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Status</th>
                        <th scope="col">Date</th>
                        <th scope="col">Control</th>
                    </tr>
                    </thead>
                    <tbody>

                    @forelse($news as $new)
                        <tr>
                            <td>{{$new->title}}</td>
                            <td>{{$new->status}}</td>
                            <td>
                                {{date('M j, Y',strtotime($new->created_at))}}
                            </td>
                            <td>
                                <a href="{{url('admin/news/'.$new->id.'/edit')}}"
                                   class="btn btn-primary">Edit</a>
                                <a href="{{url('admin/news/'.$new->id.'/show')}}"
                                   class="btn btn-info">Show</a>
                                <a href="{{url('admin/news/'.$new->id.'/delete')}}"
                                   class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <th>No News</th>
                    @endforelse

                    </tbody>
                </table>
                {!! $news->links() !!}
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