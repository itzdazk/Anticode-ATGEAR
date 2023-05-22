<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;

class ColorController extends Controller
{
    //

    public function index()
    {
        $colors = Color::all();
        return view('admin.colors.index', compact('colors'));
    }

    public function create()
    {
        return view('admin.colors.create');
    }

    // tạo màu
    public function store(Request $request)
    {

        $color = new Color();

        $color->name = $request->name;
        $color->code = $request->code;
        $color->status = $request->status == true ? '1' : '0';

        $color->save();
        return redirect('admin/colors')->with('message', 'Thêm màu thành công');
    }

    // hiển thị màu khi click edit
    public function edit(Color $color)
    {

        return view('admin.colors.edit', compact('color'));
    }

    // update màu
    public function update(Request $request, $color_id)
    {
        $color = Color::findOrFail($color_id);

        $color->name = $request->name;
        $color->code = $request->code;
        $color->status = $request->status == true ? '1' : '0';

        $color->update();

        return redirect('admin/colors')->with('message', 'Cập nhật màu thành công');
    }

    // xóa
    public function destroy($color_id)
    {
        $color = Color::findOrFail($color_id);
        $color->delete();

        return redirect('admin/colors')->with('message', 'Xóa màu thành công');
    }
}
