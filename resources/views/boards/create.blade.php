@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Board</h1>
        <form action="{{ route('boards.store') }}" method="POST">
            @csrf
            <div>
                <label for="title">Title</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div>
                <label for="description">Description</label>
                <textarea id="description" name="description"></textarea>
            </div>
            <button type="submit">Create</button>
        </form>
    </div>
@endsection
