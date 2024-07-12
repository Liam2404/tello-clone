@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Board</h1>
        <form action="{{ route('boards.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn">Create</button>
        </form>
    </div>
@endsection
