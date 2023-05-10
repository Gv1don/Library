@extends('header')

@section('content')
    <form class="createForm" action="{{ route('update') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="formGroupExampleInput">Название жанра</label>
            <input name="title" value="{{ $genre->title }}" type="text" class="form-control" id="formGroupExampleInput" placeholder="Название жанра" required pattern="[А-Яа-яёЁ\s]+">
            <input type="hidden" name="id" value="{{ $genre->id }}">
        </div>
        <button name="type" value="genres" type="submit" class="btn btn-primary submit">Подтвердить</button>
    </form>
@endsection