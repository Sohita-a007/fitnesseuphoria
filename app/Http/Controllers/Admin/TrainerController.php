<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trainers;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function index()
    {
        //
        $trainer = Trainers::all();
        return view('admin.trainer.index', compact('trainer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.trainer.create');
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
            'name' => 'required',
            'description' => 'required',
            'post' => 'required',
            'image' => 'required',
            'fee' => 'required',
        ]);

        $image = $request->image;
        $image_new_name = time() . $image->getClientOriginalName();
        $image->move('frontend/img/team', $image_new_name);

        $trainer = Trainers::create([
            'name' => $request->name,
            'description' => $request->description,
            'post' => $request->post,
            'fee' => $request->fee,
            'image' => 'frontend/img/team/' . $image_new_name,

        ]);
        $trainer->save();
        return redirect()->route('admin.trainer');
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
        $trainer = Trainers::find($id);
        return view('admin.trainer.edit', compact('trainer'));
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
            "name" => "required",
            'description' => 'required',
            'fee' => 'required',
        ]);
        $trainer = Trainers::find($id);
        if ($request->hasFile('image')) {
            $image = $request->image;
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move('frontend/img/team', $image_new_name);
            $trainer->image = 'frontend/img/team' . $image_new_name;
        }
        $trainer->name = $request->name;
        $trainer->description = $request->description;
        $trainer->post = $request->post;
        $trainer->fee = $request->fee;
        $trainer->save();
        return redirect()->route('admin.trainer');
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
        $trainer = Trainers::find($id);
        $trainer->delete();
        return redirect()->back();
    }
}
