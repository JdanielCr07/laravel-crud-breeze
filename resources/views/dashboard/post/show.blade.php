@extends('Dashboard.post.layout')

@section('content')
    <h1>{{ $post->title }}</h1>
        
    <p>{{ $post->description }}</p>
    
    <p>{{ $post->posted }}</p>

    <div>{{ $post->content }}</div>

    
@endsection