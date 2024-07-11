<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function store(Request $request)
    {
        $card = Card::create($request->all());
        return response()->json($card);
    }

    public function update(Request $request, Card $card)
    {
        $card->update($request->all());
        return response()->json($card);
    }

    public function destroy(Card $card)
    {
        $card->delete();
        return response()->json(['message' => 'Card deleted']);
    }

    public function move(Request $request, Card $card)
    {
        $card->update([
            'list_id' => $request->list_id,
            'position' => $request->position
        ]);

        return response()->json($card);
    }
}
