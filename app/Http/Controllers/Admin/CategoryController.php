<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Requests\CategoryFormRequest;

class CategoryController extends Controller
{
    //

    public function index()
    {

        return view('admin.category.index');
    }

    public function create()
    {
        return view('admin.category.create');
    }

    // tạo mới cate
    public function store(Request $request)
    {

        // $validateData = $request->rules();

        // $category = new Category();

        // $category->name = $validateData['name'];
        // $category->slug = Str::slug($validateData['slug']);
        // $category->description = $validateData['description'];


        // if ($request->hasFile('image')) {
        //     $file = $request->file('image');
        //     $ext = $file->getClientOriginalExtension();
        //     $filename = time() . '.' . $ext;

        //     $file->move('uploads/category/', $filename);

        //     $category->image = $filename;
        // }

        // $category->meta_title = $validateData['meta_title'];
        // $category->meta_keyword = $validateData['meta_keyword'];
        // $category->meta_description = $validateData['meta_description'];

        // $category->status = $request->status == true ? '1' : '0';
        // $category->save();

        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            $file->move('uploads/category/', $filename);

            $category->image = "uploads/category/" . $filename;
        }
        $category->description = $request->description;
        $category->meta_title = $request->meta_title;
        $category->meta_keyword = $request->meta_keyword;
        $category->meta_description = $request->meta_description;
        $category->status = $request->status == true ? '1' : '0';

        $category->save();

        return redirect('admin/category')->with('message', 'Thêm loại sản phẩm thành công');
    }

    // hiển thị cate cần update
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    // update cate 
    public function update(Request $request, $category)
    {
        $category = Category::findOrFail($category);


        $category->name = $request->name;
        $category->slug = $request->slug;

        if ($request->hasFile('image')) {

            $path = 'uploads/category/' . $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            $file->move('uploads/category/', $filename);

            $category->image = 'uploads/category/' . $filename;
        }
        $category->description = $request->description;
        $category->meta_title = $request->meta_title;
        $category->meta_keyword = $request->meta_keyword;
        $category->meta_description = $request->meta_description;
        $category->status = $request->status == true ? '1' : '0';

        $category->update();

        return redirect('admin/category')->with('message', 'Loại sản phẩm đã được cập nhật thành công');
    }
}
