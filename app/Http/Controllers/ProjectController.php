<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
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
        $projects = Project::orderBy('created_at', 'DESC')->get();
        $categories = Category::all();
        return view('project.index')->with('projects', $projects)->with('categories', $categories);
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
            'image' =>  'required|image',
            'title' => 'required',
            'description' => 'required',
        ]);

        $image = $request->image;
        $newimage = $image->getClientOriginalName();
        $image->move('uploads/projects', $newimage);


        Project::create([
            'category_id' => $request->category_id,
            'image' =>  'uploads/projects/' . $newimage,
            'title' => $request->title,
            'description' => $request->description,
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
        $project = Project::find($id);
        $categories = Category::all();
        return view('project.edit')->with('project', $project)->with('categories', $categories);
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

        $project = Project::find($id);

        $this->validate($request, [
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        if ($request->has('image')) {

            $image = $request->image;
            $newimage = $image->getClientOriginalName();
            $image->move('uploads/projects', $newimage);
            $project->image = 'uploads/projects/' . $newimage;
        }
        $project->category_id = $request->category_id;
        $project->title = $request->title;
        $project->description = $request->description;
        $project->save();
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
        $project = Project::find($id);
        $project->delete();
        return redirect()->back();
    }
}
