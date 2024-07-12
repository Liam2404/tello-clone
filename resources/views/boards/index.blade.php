@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Boards</h1>
        <a href="{{ route('boards.create') }}">Create Board</a>
        @foreach ($boards as $board)
            <div class="board">
                <h2>{{ $board->title }}</h2>
                <p>{{ $board->description }}</p>
                <a href="{{ route('boards.show', $board->id) }}">View Board</a>
            </div>
        @endforeach
    </div>
@endsection
