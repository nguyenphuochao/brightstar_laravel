<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slider.create');
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
        $slider = new Slider();
        $slider->user_id = Auth::user()->id;
        $slider->name = $request->input('name');
        $file = $request->file('image');
        $file->move(base_path('\public\img'), $file->getClientOriginalName());
        $slider->image = $request->file('image')->getClientOriginalName();
        $slider->date_start = date('Y-m-d H:i:s');
        $slider->save();
        $request->session()->put("success", "Thêm mới thành công {$slider->name}");
        return redirect()->route('slider.index');
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
        $slider = Slider::find($id);
        return view('slider.edit', compact('slider'));
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
        $request->validate(
            [
                'image' => 'mimes:jpeg,png,jpg,gif',
            ],
            [
                'image.mimes' => 'Vui lòng chọn ảnh đúng định dạng jpeg,png,jpg,gif'
            ]
        );
        $slider = Slider::find($id);
        $slider->user_id = Auth::user()->id;
        $slider->name = $request->input('name');
        $slider->date_end = date('Y-m-d H:i:s');;
        // Xử lí ảnh
        if ($request->file('image')) {
            $file = $request->file('image');
            $file->move(base_path('\public\img'), $file->getClientOriginalName());
            $slider->image = $request->file('image')->getClientOriginalName();
        }
        $request->session()->put("success", "Sửa thành công {$slider->name}");
        $slider->save();
        return redirect()->route('slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $slider = Slider::find($id);
        $slider->delete();
        $request->session()->put("success", "Xóa thành công {$slider->name}");
        return redirect()->route('slider.index');
    }
}
