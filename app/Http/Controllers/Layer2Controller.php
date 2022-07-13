<?php

namespace App\Http\Controllers;

use App\Models\Layer2;
use Illuminate\Http\Request;

class Layer2Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $layers = Layer2::orderBy('created_at', 'DESC')->get();
        return view('layer2.index')->with('layers', $layers);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' =>  'required|image',
        ]);

        $image = $request->image;
        $newimage = $image->getClientOriginalName();
        $image->move('uploads/layers', $newimage);


        Layer2::create([
            'image' =>  'uploads/layers/' . $newimage,
        ]);
        return redirect()->back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $layer = Layer2::find($id);
        return view('layer2.edit')->with('layer', $layer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {

        $layer = Layer2::find($id);

        $this->validate($request, [
            'image' => 'required|image',
        ]);

        if ($request->has('image')) {

            $image = $request->image;
            $newimage = $image->getClientOriginalName();
            $image->move('uploads/layers', $newimage);
            $layer->image = 'uploads/layers/' . $newimage;
        }
        $layer->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $layer = Layer2::find($id);
        $layer->delete();
        return redirect()->back();
    }
}
