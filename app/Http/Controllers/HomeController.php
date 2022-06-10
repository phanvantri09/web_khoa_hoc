<?php

namespace App\Http\Controllers;

use App\Models\Cate;
use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $category = Cate::all();
        $data = Course::limit(5)->get();
        return view('user.pages.home', compact('data','category'));
    }
    public function detail($id)
    {
        $views = Course::find($id)->increment('views');
        $pro = Course::find($id);
        return view('user.pages.detail',compact('pro'));
    }
}
