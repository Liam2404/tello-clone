<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Store a newly created card in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'board_id' => 'required|exists:boards,id',
        ]);

        // Create the card
        $card = Card::create($request->all());

        // Return JSON response
        return response()->json($card);
    }

    /**
     * Update the specified card in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Card $card)
    {
        // Validate the request
        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|nullable|string',
            'board_id' => 'sometimes|required|exists:boards,id',
        ]);

        // Update the card
        $card->update($request->all());

        // Return JSON response
        return response()->json($card);
    }

    /**
     * Remove the specified card from storage.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Card $card)
    {
        // Delete the card
        $card->delete();

        // Return JSON response
        return response()->json(['message' => 'Card deleted']);
    }

    /**
     * Move the specified card to a different list or position.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\JsonResponse
     */
    public function move(Request $request, Card $card)
    {
        // Validate the request
        $request->validate([
            'list_id' => 'required|exists:lists,id',
            'position' => 'required|integer',
        ]);

        // Update the card's list and position
        $card->update([
            'list_id' => $request->list_id,
            'position' => $request->position
        ]);

        // Return JSON response
        return response()->json($card);
    }
}
