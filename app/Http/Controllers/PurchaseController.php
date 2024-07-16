<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;

class PurchaseController extends Controller
{
    public function index(Request $request)
    {
        $user = User::find($request->input('user'));
        $item = Item::find($request->input('item'));

        return view('purchases.index', compact(['user', 'item']));
    }
}
