@extends('header')

@section('content')
    <form class="createForm" action="{{ route('create') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="formGroupExampleInput">Название жанра</label>
            <input name="title" value="" type="text" class="form-control" id="formGroupExampleInput" placeholder="Название жанра" required pattern="[А-Яа-яёЁ\s]+">
        </div>
        <button name="type" value="genres" type="submit" class="btn btn-primary submit">Подтвердить</button>
    </form>
@endsection