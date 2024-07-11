@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $board->title }}</h1>
        <p>{{ $board->description }}</p>
        <a href="{{ route('boards.edit', $board->id) }}">Edit Board</a>

        <div>
            @foreach ($board->lists as $list)
                <div class="board-list" data-list-id="{{ $list->id }}">
                    <h3>{{ $list->title }}</h3>
                    <ul>
                        @foreach ($list->cards as $card)
                            <li data-card-id="{{ $card->id }}">{{ $card->title }}</li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
@endsection
