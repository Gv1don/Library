@extends('header')

@section('content')
    <form class="createForm" action="{{ route('update') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="formGroupExampleInput">ФИО автора</label>
            <input name="name" value="{{ $author->name }}" type="text" class="form-control" id="formGroupExampleInput" placeholder="Фамилия И. О." required pattern="[А-ЯЁ][а-яё]+\s[А-ЯЁ]\.\s[А-ЯЁ]\." >
            <input type="hidden" name="id" value="{{ $author->id }}">
        </div>
        <button name="type" value="authors" type="submit" class="btn btn-primary submit">Подтвердить</button>
    </form>
@endsection