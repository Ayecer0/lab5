@extends('layout')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Список статей</h2>

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-striped table-hover align-middle mb-0">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Title</th>
                    <th scope="col">shortDesc</th>
                    <th scope="col">Desc</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $article)
                <tr>
                    <th scope="row">{{ $article->datePublic ?? $article->created_at }}</th>

                    <td>
                        <a href="{{ route('articles.show', $article->id) }}">
                            {{ $article->title }}
                        </a>
                    </td>

                    <td>{{ $article->shortDesc }}</td>
                    <td>{{ $article->desc }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $articles->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection