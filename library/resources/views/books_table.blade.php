<div class="headTable">
    <h2 class="tableName">Книги</h2>
    <form action="{{ route('create') }}" method="GET">
        @csrf
        <button name="type" value="books" type="submit" class="btn btn-primary" style="margin-top: 30px; max-height: 40px; max-width: 200px">+ Добавить книгу</button>
    </form>
</div>
<div class="table-responsive">
    <table class="table table-striped table-lg table-hover">
        <thead>
            <tr>
                <th class="text-center">Название</th>
                <th class="text-center">Автор</th>
                <th class="text-center">Жанр</th>
                <th class="text-center">В наличии</th>
                <th class="col-1 text-center">Инструменты</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($table as $row)
                <tr>
                    <td class="text-center">{{ $row->title }}</td>
                    <td class="text-center">{{ $row->author }}</td>
                    <td class="text-center">{{ $row->genre }}</td>
                    <td class="text-center">{{ $row->amount }}</td>
                    <td class="col-1">
                        <div class="dashboard">
                            <form action="{{ route('update') }}" method="GET">
                                @csrf
                                <button type="submit" value="{{ $row->id }}" class="btn btn-primary" name="id" value="{{ $row->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-joystick" viewBox="0 0 16 16">
                                        <path d="M10 2a2 2 0 0 1-1.5 1.937v5.087c.863.083 1.5.377 1.5.726 0 .414-.895.75-2 .75s-2-.336-2-.75c0-.35.637-.643 1.5-.726V3.937A2 2 0 1 1 10 2z"></path>
                                        <path d="M0 9.665v1.717a1 1 0 0 0 .553.894l6.553 3.277a2 2 0 0 0 1.788 0l6.553-3.277a1 1 0 0 0 .553-.894V9.665c0-.1-.06-.19-.152-.23L9.5 6.715v.993l5.227 2.178a.125.125 0 0 1 .001.23l-5.94 2.546a2 2 0 0 1-1.576 0l-5.94-2.546a.125.125 0 0 1 .001-.23L6.5 7.708l-.013-.988L.152 9.435a.25.25 0 0 0-.152.23z"></path>
                                    </svg>
                                </button>
                            </form>
                            <form action="{{ route('delete') }}" method="POST">
                                @csrf
                                <button type="submit" value="{{ $row->id }}" class="btn btn-outline-danger" name="id" value="{{ $row->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backspace-fill" viewBox="0 0 16 16">
                                        <path d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>