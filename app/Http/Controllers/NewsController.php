<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
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
        $news = News::orderBy('created_at', 'DESC')->get();
        $categories = Category::all();
        return view('news.index')->with('news', $news)->with('categories', $categories);
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
            'category_id' => 'required',
            'title' =>  'required',
            'details' =>  'required',
        ]);


        News::create([
            'category_id' => $request->category_id,
            'title' =>  $request->title,
            'details' =>  $request->details,
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
        $new = News::find($id);
        $categories = Category::all();
        return view('news.edit')->with('new', $new)->with('categories', $categories);
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

        $news = News::find($id);

        $this->validate($request, [
            'category_id' => 'required',
            'title' => 'required',
            'details' => 'required',
        ]);
        $news->category_id = $request->category_id;
        $news->title = $request->title;
        $news->details = $request->details;
        $news->save();
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
        $news = News::find($id);
        $news->delete();
        return redirect()->back();
    }
}
