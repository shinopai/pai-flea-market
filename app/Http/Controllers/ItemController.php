<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use App\Models\SubCategory;
use App\Models\Item;
use App\Http\Requests\ItemRequest;

class ItemController extends Controller
{
    public function create()
    {
        $statuses = Status::all();
        $categories = SubCategory::all();

        $ladies = $categories->where('category_id', 1);
        $mens = $categories->where('category_id', 2);
        $baby_kids = $categories->where('category_id', 3);
        $others = $categories->where('category_id', 4);

        return view('items.create', compact(['statuses', 'ladies', 'mens', 'baby_kids', 'others']));
    }

    public function store(ItemRequest $request)
    {
        $name = $request->input('name');
        $introduction = $request->input('introduction');
        $price = $request->input('price');
        $image = $request->file('image');
        $category_id = $request->input('category_id');
        $status_id = $request->input('status_id');

        // 画像の処理
        if($request->hasFile('image') && $image->isValid()) {
            $image = $image->getClientOriginalName();
        }

        Item::create([
            'name' => $name,
            'introduction' => $introduction,
            'price' => $price,
            'image' => $request->file('image')->storeAs('images/item', $image, 'public'),
            'category_id' => $category_id,
            'status_id' => $status_id
        ]);

        return redirect()->route('dashboard')->with('flash', '新しい商品を登録しました。');
    }
}
