@extends('layouts.app')

@section('content')
    <div class="container">
        @forelse($posts as $post)
            @can('view_post', $post)
                <div>
                    <h2>{{ $post->title }}</h2>
                    <p>{{ $post->description }}</p>
                    <b>Autor: </b>{{ $post->user->name }}
                    <br>
                    <a href="{{ route('update', $post->id) }}">Editar</a>
                </div>
                <hr>
            @endcan
        @empty
            <p>Nenhum post cadastrado</p>
        @endforelse
    </div>
@endsection
