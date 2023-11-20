<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        // dd($category);
        return view('category.edit', compact('category'));
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
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->content = $request->input('content');
        $category->user_id = Auth::user()->id;
        $category->date_end = date("Y-m-d H:i:s");
        $request->session()->put("success", "Cập nhật thành công bài viết {$category->name}");
        $category->save();
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request , $id)
    {
        $category = Category::find($id);
        $category->delete();
        $request->session()->put("success", "Xóa thành công bài viết {$category->name}");
        return redirect()->route('category.index');
    }
    public function add_category_child(Request $request){
        $parent_id = $request->parent_id;
        $category = new Category();
        $category->name = $request->name;
        $category->user_id = Auth::user()->id;
        $category->alias = Str::slug($request->name);
        $category->date_end = date("Y-m-d H:i:s");
        $category->parent_id = $parent_id;
        $request->session()->put("success", "Cập nhật thành công bài viết {$category->name}");
        $category->save();
        return redirect()->back();
        //var_dump($_POST);
    }
}
