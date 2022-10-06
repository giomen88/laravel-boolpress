@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-4">{{$post->title}}</h1>
            <div class="row">
                <div class="col-3">
                    <img src="{{$post->image}}" class="img-fluid" alt="{{$post->title}}">
                </div>
                <div class="col-9">
                    @if($post->category) <span class="mb-3 badge bg-{{ $post->category->color }}">{{$post->category->label}}</span> 
                    @else <span>NESSUNA CATEGORIA</span> @endif
                    <p class="mt-3">{{$post->content}}</p>
                    <p><strong class="text-muted">Autore</strong></p>
                    <p><small class="text-muted"><strong>Ultima modifica</strong>  {{$post->updated_at}}</small></p>
                </div>
            </div>
            <div class="col-12 buttons d-flex justify-content-between mt-5 p-0">
                <div>
                <a href=" {{route('admin.posts.index')}} " class="btn btn-secondary"><i class="fa-solid fa-rotate-left mr-2"></i>Torna alla lista</a> 
                </div>
                <div class="d-flex">
                    <a href=" {{route('admin.posts.edit', $post)}} " class="btn btn-warning mr-2"><i class="fa-solid fa-pen mr-2"></i> Modifica</a>
                    <form action=" {{route('admin.posts.destroy', $post)}}" method="POST">
                     @csrf
                    @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can mr-2"></i> Cancella</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection