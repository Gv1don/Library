@extends('header')

@section('content')
    <nav class="site-header sticky-top py-1">
        <div class="container d-flex flex-column flex-md-row justify-content-between">
            <a class="py-2 d-none d-md-inline-block" href="{{ route('story') }}">История</a>
            <a class="py-2 d-none d-md-inline-block" href="{{ route('readers') }}">Читатели</a>
            <a class="py-2 d-none d-md-inline-block" href="{{ route('books') }}">Книги</a>
            <a class="py-2 d-none d-md-inline-block" href="{{ route('genres') }}">Жанры</a>
            <a class="py-2 d-none d-md-inline-block" href="{{ route('authors') }}">Авторы</a>
        </div>
    </nav>
    <main>
        @switch($type)
            @case('authors')
                @include('authors_table')
                @break
            @case('books')
                @include('books_table')
                @break
            @case('readers')
                @include('readers_table')
                @break
            @case('story')
                @include('story_table')
                @break
            @case('genres')
                @include('genres_table')
                @break
        @endswitch
    </main>

@endsection