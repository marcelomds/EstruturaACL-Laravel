@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->description }}</p>
            <b>Autor: </b>{{ $post->user->name }}
        </div>
    </div>
@endsection
