@extends('header')

@section('content')
    <form class="createForm" action="{{ route('create') }}" method="POST">
        @csrf
        <div class="form-group" style="margin-bottom: 10px">
            <label for="formGroupExampleInput">ФИО</label>
            <input name="name" value="{{ $reader->name }}" type="text" class="form-control" id="formGroupExampleInput" placeholder="Фамилия И. О." required pattern="[А-ЯЁ][а-яё]+\s[А-ЯЁ]\.\s[А-ЯЁ]\." >
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Номер телефона</label>
            <input name="phone" value="{{ $reader->phone }}" type="text" class="form-control" id="formGroupExampleInput" placeholder="+70000000000" required pattern="^\+7\d{10}$" >
        </div>
        <button name="type" value="readers" type="submit" class="btn btn-primary submit">Подтвердить</button>
    </form>
@endsection