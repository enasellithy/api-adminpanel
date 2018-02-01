@extends('layouts.app')

@section('content')
    @forelse($news as $new)
        <h5>{{$new->title}}</h5>
        <a href="{{url($new->id.'/news')}}">Read</a>
    @empty
        No News
   @endforelse

{!! Form::open(['url'=>'upload/image','enctype'=>'multipart/form-data']) !!}
    <input type="file" name="image">
    <input type="submit" value="Save">
{!! Form::close() !!}

@endsection
