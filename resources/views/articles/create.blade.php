@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Создать статью</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('articles.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="datePublic">Date public</label>
            <input name="datePublic" type="date" class="form-control" id="datePublic" value="{{ old('datePublic') }}">
        </div>

        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input name="title" type="text" class="form-control" id="title" value="{{ old('title') }}">
        </div>

        <div class="form-group mb-3">
            <label for="shortDesc">Short description</label>
            <input name="shortDesc" type="text" class="form-control" id="shortDesc" value="{{ old('shortDesc') }}">
        </div>

        <div class="form-group mb-3">
            <label for="desc">Description</label>
            <input name="desc" type="text" class="form-control" id="desc" value="{{ old('desc') }}">
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection