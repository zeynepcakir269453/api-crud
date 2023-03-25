<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items =Item::all();
        return $items;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $item=new Item();
        $item->name = $request->name;
        $item->desc = $request->desc;
        $item->quantity = $request->quantity;

        $item->save();
        return response()->json(['message'=>'Eleman kaydedildi']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Item::find($id);
        return $item;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = Item::findOrFail($request->id);

        $item->name = $request->name;
        $item->desc = $request->desc;
        $item->quantity = $request->quantity;

        $item->save();
        return $item;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Item::destroy($id);
        return response()->json(['message'=>'Silme başarılı']);
    }
}
