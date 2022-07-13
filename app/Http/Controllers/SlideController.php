<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
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
        $slides = Slide::orderBy('created_at', 'DESC')->get();

        return view('slide.index')->with('slides', $slides);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slide.create');
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
            'title' =>  'required',
            'sub_title' =>  'required',
            'details' =>  'required',
            'image' =>  'required|image',
        ]);

        $image = $request->image;
        $newimage = $image->getClientOriginalName();
        $image->move('uploads/slides', $newimage);


        Slide::create([
            'title' =>  $request->title,
            'sub_title' =>  $request->sub_title,
            'details' =>   $request->details,
            'image' =>  'uploads/slides/' . $newimage,
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
        $slide = Slide::find($id);
        return view('slide.edit')->with('slide', $slide);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $slide = Slide::find($id);
        $this->validate($request, [
            'title' =>  'required',
            'sub_title' =>  'required',
            'details' =>  'required',
        ]);


        if ($request->has('image')) {

            $image = $request->image;
            $newimage = $image->getClientOriginalName();
            $image->move('uploads/slides', $newimage);
            $slide->image = 'uploads/slides/' . $newimage;
        }

        $slide->title = $request->title;
        $slide->sub_title = $request->sub_title;
        $slide->details = $request->details;
        $slide->save();
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
        $slide = Slide::find($id);
        $slide->delete();
        return redirect()->back();
    }
}
