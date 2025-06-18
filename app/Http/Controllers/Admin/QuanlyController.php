<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class QuanlyController extends Controller
{
    // Hiển thị danh sách phòng
    public function index()
    {
        $rooms = Room::all();
        return view('admin.quanly', compact('rooms'));
    }

    // Giao diện thêm phòng
    public function create()
    {
        return view('admin.create');
    }

    // Xử lý thêm mới phòng
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'price' => 'required|numeric',
            'describe' => 'nullable',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif'
        ]);

        // Tạo bản ghi phòng trước để lấy ID
        $room = Room::create([
            'name' => $request->name,
            'city' => $request->city,
            'price' => $request->price,
            'describe' => $request->describe,
            'image_path' => '' // tạm thời để trống
        ]);

        // Đặt tên ảnh theo định dạng images/home<ID>.jpg
        $image = $request->file('image');
        $filename = 'images/home' . $room->id . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), basename($filename));

        // Cập nhật lại đường dẫn ảnh cho phòng
        $room->image_path = $filename;
        $room->save();

        return redirect()->route('quanly.index')->with('success', 'Đã thêm phòng thành công.');
    }

    // Giao diện sửa phòng
    public function edit($id)
    {
        $room = Room::findOrFail($id);
        return view('admin.edit', compact('room'));
    }

    // Xử lý cập nhật phòng
    
    public function update(Request $request, $id)
{
    $room = Room::findOrFail($id);

    $request->validate([
        'name' => 'required',
        'city' => 'required',
        'price' => 'required|numeric',
        'describe' => 'nullable',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif'
    ]);

    if ($request->hasFile('image')) {
        if ($room->image_path && file_exists(public_path($room->image_path))) {
            unlink(public_path($room->image_path));
        }

        $image = $request->file('image');
        $filename = 'images/home' . $room->id . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), basename($filename));
        $room->image_path = $filename;
    }

    // Cập nhật các thông tin còn lại
    $room->name = $request->name;
    $room->city = $request->city;
    $room->price = $request->price;
    $room->describe = $request->describe;

    $room->save();

    return redirect()->route('quanly.index')->with('success', 'Cập nhật phòng thành công.');
}


    // Xử lý xoá phòng
    public function destroy($id)
    {
        $room = Room::findOrFail($id);

        if ($room->image_path && file_exists(public_path($room->image_path))) {
            unlink(public_path($room->image_path));
        }

        $room->delete();
        return redirect()->route('quanly.index')->with('success', 'Xoá phòng thành công.');
    }
}