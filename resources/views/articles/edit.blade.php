@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Редактировать статью</h2>

    <form action="{{ route('articles.update', $article->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="datePublic">Date public</label>
            <input name="datePublic" type="date" class="form-control" id="datePublic" value="{{ $article->datePublic ?? $article->created_at }}">
        </div>

        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input name="title" type="text" class="form-control" id="title" value="{{ $article->title }}">
        </div>

        <div class="form-group mb-3">
            <label for="shortDesc">Short description</label> 
            <input name="shortDesc" type="text" class="form-control" id="shortDesc" value="{{ $article->shortDesc }}">
        </div>

        <div class="form-group mb-3">
            <label for="desc">Description</label> 
            <input name="desc" type="text" class="form-control" id="desc" value="{{ $article->desc }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection