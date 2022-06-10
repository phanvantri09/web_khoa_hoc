<?php

namespace App\Http\Controllers;

use App\Models\Cate;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $pro =  Course::all();
        $cate =  Cate::all();
        return view("admin.course.index", compact('pro', 'cate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate =  Cate::all();
        return view("admin.course.add", compact('cate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'decription' => 'required',
            'link' => 'required',
            'teacher' => 'required',
            'image' => 'required',
            


        ]);
        $pro = new Course();
        $pro->name = $request->get('name');
        $pro->id_category = $request->get('cate_name');
        $pro->decription = $request->get('decription');
        $pro->link = $request->get('link');
        $pro->views = $request->get('views');
        $pro->teacher = $request->get('teacher');

        //add image
        $get_image = $request->image;
        $path = 'public/admin/uploads/product/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);
        $pro->image = $new_image;
        $pro->save();
        return redirect()->back()->with('massage', 'success');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cate =  Cate::orderBy('id', 'DESC')->get();
        $pro = Course::find($id);
        return view("admin.course.show", compact('pro', 'cate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cate =  Cate::all();
        $pro =  Course::find($id);
        return view("admin.course.edit", compact('cate','pro'));
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
     
        $request->validate([
            'name' => 'required',
            'decription' => 'required',
            'link' => 'required',
            'teacher' => 'required',
            'image' => 'required',
            


        ]);
        $pro = Course::find($id);
        $pro->name = $request->get('name');
        $pro->id_category = $request->get('cate_name');
        $pro->decription = $request->get('decription');
        $pro->link = $request->get('link');
        $pro->teacher = $request->get('teacher');
        //add image
        $get_image = $request->image;
        $path = 'public/admin/uploads/product/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);
        $pro->image = $new_image;
        $pro->save();
        return redirect()->back()->with('massage', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::find($id)->delete();
        return redirect()->back()->with('massge', 'success');
    }
}
