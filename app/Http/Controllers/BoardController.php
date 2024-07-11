<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index()
    {
        $boards = Board::all();
        return view('boards.index', compact('boards'));
    }

    public function create()
    {
        return view('boards.create');
    }

    public function store(Request $request)
    {
        $board = Board::create($request->all());
        return redirect()->route('boards.index');
    }

    public function show($id)
    {
        $board = Board::find($id);
        return view('boards.show', compact('board'));
    }

    public function edit($id)
    {
        $board = Board::find($id);
        return view('boards.edit', compact('board'));
    }

    public function update(Request $request, $id)
    {
        $board = Board::find($id);
        $board->update($request->all());
        return redirect()->route('boards.index');
    }

    public function destroy($id)
    {
        $board = Board::find($id);
        $board->delete();
        return redirect()->route('boards.index');
    }
}
