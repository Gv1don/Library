@extends('header')

@section('content')
    <form class="createForm" action="{{ route('create') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="formGroupExampleInput">Название книги</label>
            <input name="name" value="" type="text" class="form-control" id="formGroupExampleInput" placeholder="Название книги" required>
            <label style="margin-top: 10px" for="formGroupExampleInput">Автор</label>
            <select name="author" id="inputState" class="form-control">
                @foreach ($authors as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
            <label style="margin-top: 10px" for="formGroupExampleInput">Жанр</label>
            <select name="genre" id="inputState" class="form-control">
                @foreach ($genres as $id => $title)
                    <option value="{{ $id }}">{{ $title }}</option>
                @endforeach
            </select>
            <label style="margin-top: 10px" for="formGroupExampleInput">Количество</label>
            <input name="amount" value="" type="text" class="form-control" id="formGroupExampleInput" placeholder="Количество книг" required pattern="[0-9]*">
        </div>
        <button name="type" value="books" type="submit" class="btn btn-primary submit">Подтвердить</button>
    </form>
@endsection