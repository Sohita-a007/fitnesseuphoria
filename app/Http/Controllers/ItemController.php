<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    //
    public function index(){
        $items= Item::all();
        // dd($items);
        return view('admin.items.index',compact('items'));

    }
    public function create(){
        return view('admin.items.create');
    }
}
