@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-between">
            <h1>LISTA POST</h1>
            <div class="text-end">
                <a href=" {{route('admin.posts.create')}} " class="btn btn-success"><i class="fa-solid fa-plus mr-2"></i> Nuovo post</a>
            </div>
        </div>
        @if ($posts)
        <div class="col-12 d-flex flex-wrap p-0">
            @foreach($posts as $post)
            <div class="post card p-2 d-flex flex-column justify-content-between">
                <h4 class="card-title">{{$post->title}}</h4>
                <div class="d-flex justify-content-between">
                    <h6> Autore: <strong>@if($post->user) {{$post->user->name}} @else Anonimo @endif</strong></h6>
                    @if($post->category) <span class="badge bg-{{ $post->category->color }} align-self-center">{{$post->category->label}}</span> @endif
                </div>
                    <img src="{{$post->image}}" class="img-fluid" alt="{{$post->title}}">
                    <div class="text-center mt-2">
                        <a href="{{route('admin.posts.show', $post)}}" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass mr-2"></i>Apri post</a>
                  </div>
            </div>            
            @endforeach
        </div>
        @else
        <h3>Nessun Post</h3>
        @endif
    </div>
</div>

@endsection