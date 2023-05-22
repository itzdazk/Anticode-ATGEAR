<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name, $slug, $status, $brand_id;

    // kiểm tra input
    public function rules()
    {
        return [
            'name' => 'required|string',
            'slug' => 'required|string',
            'status' => 'nullable'
        ];
    }

    // đặt lại input 
    public function resetInput()
    {
        $this->name = NULL;
        $this->slug = NULL;
        $this->status = NULL;
        $this->brand_id = NULL;
    }

    // Tạo mới 
    public function storeBrand()
    {
        $validatedData = $this->validate();
        Brand::create([
            'name' => $this->name,
            'slug' =>   Str::slug($this->slug),
            'status' => $this->status == true ? '1' : '0',
        ]);

        session()->flash('message', 'Thêm brand thành công');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    // đóng modal -> reset input
    public function closeModal()
    {
        $this->resetInput();
    }

    public function openModal()
    {

        $this->resetInput();
    }

    // Hiển thị sản phẩm tương ứng ( edit)
    public function editBrand(int $brand_id)
    {
        $this->brand_id = $brand_id;
        $brand = Brand::findOrFail($brand_id);
        $this->name =  $brand->name;
        $this->slug =   $brand->slug;
        $this->status =  $brand->status;
    }

    // cập nhật sản phẩm
    public function updateBrand()
    {

        $validatedData = $this->validate();
        Brand::findOrFail($this->brand_id)->update([
            'name' => $this->name,
            'slug' =>   Str::slug($this->slug),
            'status' => $this->status == true ? '1' : '0',
        ]);

        session()->flash('message', 'Cập nhật brand thành công');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    // xóa
    public function deleteBrand($brand_id)
    {
        Brand::findOrFail($brand_id)->delete();
        session()->flash('message', 'Xóa brand thành công');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    // hiển thị table brand sắp xếp theo id từ lớn -> nhỏ
    public function render()
    {

        $brands = Brand::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.brand.index', ['brands' => $brands])
            ->extends('layouts.admin')
            ->section('content');
    }
}
