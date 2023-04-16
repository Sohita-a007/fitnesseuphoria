<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorys;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    public function index()
    {
        $category = Categorys::all();
        return view('admin.category.index', compact('category'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category' => 'required',

        ]);


        $category = Categorys::create([
            'category' => $request->category,
            'slug' => Str::slug($request->category),
        ]);
        $category->save();
        return redirect()->route('admin.category')->with('message', ' Category added Successfully');
    }

    public function edit($id)
    {
        $category = Categorys::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "category" => "required",

        ]);
        $category = Categorys::find($id);
        $category->category = $request->category;

        $category->slug = Str::slug($request->category);
        $category->save();
        return redirect()->route('admin.category')->with('message', ' Category updated Successfully');
    }

    public function destroy($id)
    {
        $category = Categorys::find($id);
        $category->delete();
        return redirect()->back()->with('message', 'Category Deleted Successfully');;
    }
}
