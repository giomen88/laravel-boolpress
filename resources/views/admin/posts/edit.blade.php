@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>MODIFICA POST</h1>
            <form action=" {{route('admin.posts.update', $post)}} " method="POST">
            @csrf
            @method('PUT')
            @include('includes.admin.form')
            <div class="form-group d-flex justify-content-between mt-5">
                <a href=" {{route('admin.posts.index')}} " class="btn btn-secondary"><i class="fa-solid fa-rotate-left mr-2"></i>Torna alla lista</a> 
                <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk mr-2"></i>Salva</button>
            </div>    
            </form>
        </div>
    </div>
</div>

@endsection