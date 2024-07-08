<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use App\Models\SubCategory;

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

    public function store()
    {

    }
}
