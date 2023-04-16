<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        //
        $blog = Blogs::all();
        return view('admin.blog.index', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required',
        ]);

        $image = $request->image;
        $image_new_name = time() . $image->getClientOriginalName();
        $image->move('uploads/blog', $image_new_name);

        $blog = Blogs::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'image' => 'uploads/blog/' . $image_new_name,

        ]);
        $blog->save();
        return redirect()->route('admin.blog');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $blog = Blogs::find($id);
        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            "title" => "required",
            'description' => 'required',
        ]);
        $blog = Blogs::find($id);
        if ($request->hasFile('image')) {
            $image = $request->image;
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move('uploads/blog/', $image_new_name);
            $blog->image = 'uploads/blog/' . $image_new_name;
        }
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->price = $request->price;
        $blog->save();
        return redirect()->route('admin.blog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $blog = Blogs::find($id);
        $blog->delete();
        return redirect()->back();
    }
}
