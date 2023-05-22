<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    // tạo mới 
    public function store(Request $request)
    {
        $slider = new Slider();

        $slider->title = $request->title;
        $slider->description = $request->description;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/slider/', $filename);
            $slider->image = 'uploads/slider/' . $filename;
        }

        $slider->status = $request->status == true ? '1' : '0';

        $slider->save();

        return redirect('admin/sliders')->with('message', 'Thêm slider thành công');
    }
    // hiển thị
    public function edit(Slider $slider)
    {

        return view('admin.sliders.edit', compact('slider'));
    }
    // update
    public function update(Request $request, $slider_id)
    {


        $slider = Slider::findOrFail($slider_id);
        $slider->title = $request->title;
        $slider->description = $request->description;

        if ($request->hasFile('image')) {
            $destination = $slider->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/slider/', $filename);
            $slider->image = 'uploads/slider/' . $filename;
        }

        $slider->status = $request->status == true ? '1' : '0';

        $slider->update();

        return redirect('admin/sliders')->with('message', 'Cập nhật slider thành công');
    }
    // xóa
    public function destroy($slider_id)
    {
        $slider = Slider::findOrFail($slider_id);
        $destination = $slider->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }

        $slider->delete();

        return redirect('admin/sliders')->with('message', 'Xóa slider thành công');
    }
}
