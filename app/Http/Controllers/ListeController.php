<?php

namespace App\Http\Controllers;

use App\Models\BoardList;
use Illuminate\Http\Request;

class BoardListController extends Controller
{
    public function store(Request $request)
    {
        $list = BoardList::create($request->all());
        return response()->json($list);
    }

    public function update(Request $request, BoardList $list)
    {
        $list->update($request->all());
        return response()->json($list);
    }

    public function destroy(BoardList $list)
    {
        $list->delete();
        return response()->json(['message' => 'List deleted']);
    }
}
