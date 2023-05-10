@extends('header')

@section('content')
    <form class="createForm" action="{{ route('update') }}" method="POST">
        @csrf
        <div class="form-group">
            <label style="margin-bottom: 10px" for="formGroupExampleInput">Читатель</label>
            <select name="reader_id" id="inputState" class="form-control">
                @foreach ($readers as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
            <label style="margin-top: 10px" for="formGroupExampleInput">Книга</label>
            <select name="book_id" id="inputState" class="form-control">
                @foreach ($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }} - {{ $book->author_name }} - {{ $book->genre_name }}</option>
                @endforeach
            </select>
        </div>
        <input type="hidden" name="id" value="{{ $story->id }}">
        <button name="type" value="story" type="submit" class="btn btn-primary submit">Подтвердить</button>
    </form>
@endsection