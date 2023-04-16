<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallerys;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        //
        $gallery = Gallerys::all();
        return view('admin.gallery.index', compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.gallery.create');
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
            'image' => 'required',
        ]);

        $image = $request->image;
        $image_new_name = time() . $image->getClientOriginalName();
        $image->move('uploads/gallery', $image_new_name);

        $gallery = Gallerys::create([
            'image' => 'uploads/gallery/' . $image_new_name,

        ]);
        $gallery->save();
        return redirect()->route('admin.gallery');
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
        $gallery = Gallerys::find($id);
        return view('admin.gallery.edit', compact('gallery'));
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

        $gallery = Gallerys::find($id);
        if ($request->hasFile('image')) {
            $image = $request->image;
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move('uploads/gallery', $image_new_name);
            $gallery->image = 'uploads/gallery' . $image_new_name;
        }
        $gallery->save();
        return redirect()->route('admin.gallery');
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
        $gallery = Gallerys::find($id);
        $gallery->delete();
        return redirect()->back();
    }
}
