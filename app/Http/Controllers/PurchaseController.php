<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;
use App\Models\Purchase;

class PurchaseController extends Controller
{
    public function index(Request $request)
    {
        $user = User::find($request->input('user'));
        $item = Item::find($request->input('item'));

        return view('purchases.index', compact(['user', 'item']));
    }

    public function store(User $user, Item $item)
    {
        Purchase::create([
            'user_id' => $user->id,
            'item_id' => $item->id
        ]);

        return redirect()->route('items.index')->with('flash', '「'.$item->name.'」を購入しました。');
    }
}
