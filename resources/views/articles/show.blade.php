@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="card" style="width: 38rem;">
        <div class="card-body">
            <h3 class="card-title mb-3">{{ $article->title }}</h3>
            <h6 class="card-subtitle mb-2 text-muted">{{ $article->shortDesc }}</h6>
            <p class="card-text mt-3">{{ $article->desc }}</p>
            
            <div class="mt-3 d-flex align-items-center gap-2">
                <a href="{{ route('articles.edit', $article->id) }}" class="card-link">Edit</a>
                
                <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="d-inline m-0">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-link" type="submit">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection