<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        //
        $class = Classes::all();
        return view('admin.class.index', compact('class'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.class.create');
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
            'subtitle' => 'required',
            'description' => 'required',
            'post' => 'required',
            'image' => 'required',
        ]);

        $image = $request->image;
        $image_new_name = time() . $image->getClientOriginalName();
        $image->move('uploads/class', $image_new_name);

        $class = Classes::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'post' => $request->post,
            'image' => 'uploads/class/' . $image_new_name,

        ]);
        $class->save();
        return redirect()->route('admin.class');
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
        $class = Classes::find($id);
        return view('admin.class.edit', compact('class'));
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
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
        ]);
        $class = Classes::find($id);
        if ($request->hasFile('image')) {
            $image = $request->image;
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move('uploads/class/', $image_new_name);
            $class->image = 'uploads/class/' . $image_new_name;
        }
        $class->title = $request->title;
        $class->subtitle = $request->subtitle;
        $class->description = $request->description;
        $class->post = $request->post;
        $class->save();
        return redirect()->route('admin.class');
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
        $class = Classes::find($id);
        $class->delete();
        return redirect()->back();
    }
}
