<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Layer;
use App\Models\Layer2;
use App\Models\News;
use App\Models\Project;
use App\Models\Slide;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        Carbon::setLocale('ar');

        $projects = Category::orderBy('created_at', 'DESC')->with(['project' => function ($query) {
            $query->orderBy('id', 'DESC');
        }]);
        $projects = $projects->get();

        $news = Category::orderBy('created_at', 'DESC')->with(['news' => function ($query) {
            $query->orderBy('id', 'DESC');
        }]);
        $news = $news->get();
        // $firstProjects = Category::orderBy('created_at', 'DESC')->with(['project' => function ($query) {
        //     $query->orderBy('id', 'DESC');
        // }]);
        // $firstProjects = $firstProjects->take(1)->get();

        // $secondProjects = Category::orderBy('created_at', 'DESC')->with(['project' => function ($query) {
        //     $query->orderBy('id', 'DESC')->take(3);
        // }]);
        // $secondProjects = $secondProjects->skip(1)->take(1)->get();


        // $firstNews = Category::orderBy('created_at', 'DESC')->with(['news' => function ($query) {
        //     $query->orderBy('id', 'DESC')->take(3);
        // }]);
        // $firstNews = $firstNews->take(1)->get();

        // $secondNews = Category::orderBy('created_at', 'DESC')->with(['news' => function ($query) {
        //     $query->orderBy('id', 'DESC')->take(3);
        // }]);
        // $secondNews = $secondNews->skip(1)->take(1)->get();

        return view('index')->with('slides', Slide::orderBy('created_at', 'DESC')->take(3)->get())
            ->with('categories', Category::orderBy('created_at', 'DESC')->get())
            ->with('latestProjects', Project::orderBy('created_at', 'DESC')->get())
            ->with('projects', $projects)
            ->with('news', $projects)
            // ->with('firstProjects', $firstProjects[0])
            // ->with('secondProjects', $secondProjects[0])
            ->with('banners', Layer::orderBy('created_at', 'DESC')->get())
            ->with('latestNews', News::orderBy('created_at', 'DESC')->get())
            // ->with('firstNews', $firstNews[0])
            // ->with('secondNews', $secondNews[0])
            ->with('banners2', Layer2::orderBy('created_at', 'DESC')->take(4)->get());
    }
}
