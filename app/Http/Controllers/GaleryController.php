<?php

namespace App\Http\Controllers;

use App\Models\galery;
use Illuminate\Http\Request;

class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $galery = Galery::all();
        return view('admin.galery.index', compact('galery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.galery.create');
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
        $request->validate([
            'image' => 'required|image|max:2048',
        ]);
        $galeri = new Galery;
        // upload image / foto
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/destinasis/', $name);
            $destinasi->image = $name;
        }
        $destinasi->save();
        return redirect()->route('galery.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function show(galery $galery)
    {
        //
        $galery = Galery::findOrFail($id);
        return view('admin.$galery.show', compact('$galery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function edit(galery $galery)
    {
        //
        $galery = Galery::findOrFail($id);
        return view('admin.galery.edit', compact('galery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, galery $galery)
    {
        //
        $request->validate([
            'image' => 'required|image|max:2048',
        ]);
        $galeri = new Galeri;
        // upload image / foto
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/destinasis/', $name);
            $destinasi->image = $name;
        }
        $destinasi->save();
        return redirect()->route('galery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function destroy(galery $galery)
    {
        //
        $galery = galery::findOrFail($id);
        $galery->deleteImage();
        $galery->delete();
        return redirect()->route('galery.index');
    }
}
