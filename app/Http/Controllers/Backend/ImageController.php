<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::all();
        $data = [
            'images'=>$images
        ];
        return view('image.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('image.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'image' => 'required|mimes:jpeg,png,jpg,gif',
            ],
            [
                'image' => 'Vui lòng chọn ảnh',
                'image.mimes' => 'Vui lòng chọn ảnh đúng định dạng jpeg,png,jpg,gif'
            ]
        );
        $image = new Image();
        $image->user_id = Auth::user()->id;

        $file = $request->file('image');
        $file->move(public_path('uploads/images'), $file->getClientOriginalName());
        $image->image = $request->file('image')->getClientOriginalName();
        $image->name = $request->file('image')->getClientOriginalName();
        $image->date_start = date('Y-m-d H:i:s');
        $image->save();
        $request->session()->put("success", "Thêm mới thành công {$image->name}");
        return redirect()->route('image.index');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request , $id)
    {
        $image = Image::find($id);
        $image->delete();
        $request->session()->put("success", "Xóa thành công {$image->name}");
        return redirect()->route('image.index');
    }
}
