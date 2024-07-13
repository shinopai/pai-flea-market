<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use App\Models\SubCategory;
use App\Models\Item;
use App\Http\Requests\ItemRequest;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::orderBy('id', 'desc')->paginate(30);

        return view('items.index', compact('items'));
    }

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
        $categoryId = $request->input('category_id');
        $statusId = $request->input('status_id');

        $image = '';

        // 画像の処理
        if($request->hasFile('image') && $image->isValid()) {
            $imageName = $request->file('image')->getClientOriginalName();
            $image = $request->file('image')->storeAs('images/item', $imageName, 'public');
        } else {
            $image = null;
        }

        Item::create([
            'name' => $name,
            'introduction' => $introduction,
            'price' => $price,
            'image' => $image,
            'category_id' => $categoryId,
            'status_id' => $statusId
        ]);

        return redirect()->route('items.index')->with('flash', '新しい商品を登録しました。');
    }

    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }

    public function search(Request $request)
    {
        $searchCategory = $request->input('sc');
        $searchText = $request->input('st');

        $q = Item::query();

        if(!empty($searchCategory)) {
            $q->where('category_id', $searchCategory);
        }

        if(!empty($searchText)) {
            $q->where('name', 'LIKE', '%'.$searchText.'%')->orWhere('introduction', 'LIKE', '%'.$searchText.'%');
        }

        $items = $q->paginate(30);

        return view('items.search', compact('items'));
    }
}
