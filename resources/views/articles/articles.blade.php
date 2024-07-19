@extends('layouts.master')

@section('title')
    Articles
@endsection

@section('content')
    <h2>Articles</h2>

    {{-- @foreach ($articles as $article)
    <p>{{$article['title']}}</p>
    <p>{{$article['body']}}</p>

    @endforeach --}}

    {{-- @each('articles.index', $articles, 'article', 'articles.no-articles') --}}
{{--
    @if ($articles)
        @foreach ($articles as $article)
            @include('articles.index')
        @endforeach
    @else
        @include('articles.no-articles')
    @endif
@endsection --}}

@forelse ($articles  as $article)
    @include('partials.article')

@empty
    @include('partials.no-articles')
@endforelse

@endsection
