@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $board->title }}</h1>
        <p>{{ $board->description }}</p>

        @foreach ($board->listes as $liste)
            <h2>{{ $liste->title }}</h2>

            <div class="cards">
                @foreach ($liste->cards as $card)
                    <div class="card">
                        <h3>{{ $card->title }}</h3>
                        <p>{{ $card->description }}</p>
                    </div>
                @endforeach
            </div>
        @endforeach

        <h2>Ajouter une Nouvelle Carte</h2>

        <form action="{{ route('cards.store') }}" method="POST">
            @csrf
            <input type="hidden" name="board_id" value="{{ $board->id }}">
            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn">Créer une Carte</button>
        </form>
    </div>
@endsection
