<?php

namespace App\Http\Controllers;

use App\Models\Liste;
use App\Models\Board;
use Illuminate\Http\Request;

class ListeController extends Controller
{
    public function index($boardId)
    {
        $board = Board::findOrFail($boardId);
        $listes = Liste::where('board_id', $boardId)->get();

        return view('listes.index', compact('board', 'listes'));
    }

    public function create($boardId)
    {
        $board = Board::findOrFail($boardId);
        return view('listes.create', compact('board'));
    }

    public function store(Request $request, $boardId)
    {
        $board = Board::findOrFail($boardId);
        $request->validate([
            'title' => 'required',
        ]);

        $liste = new Liste([
            'title' => $request->get('title'),
            'board_id' => $board->id
        ]);

        $liste->save();

        return redirect()->route('boards.show', $board->id)->with('success', 'Liste créée avec succès');
    }
}
