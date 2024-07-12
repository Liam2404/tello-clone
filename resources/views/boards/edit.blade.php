@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Board</h1>
        <form action="{{ route('boards.update', $board->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ $board->title }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control">{{ $board->description }}</textarea>
            </div>
            <button type="submit" class="btn">Update</button>
        </form>
    </div>
@endsection
