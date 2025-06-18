<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

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
            'images' => 'required|array|min:4',
            'images.*' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
    
        // 1. Tạo phòng
        $room = Room::create([
            'name' => $request->name,
            'city' => $request->city,
            'price' => $request->price,
            'describe' => $request->describe,
            'image_path' => '', // Tạm
        ]);
    
        $images = $request->file('images');
    
        // 2. Ảnh đầu tiên → bảng rooms
        $firstImage = $images[0];
        $firstFilename = 'images/home' . $room->id . '.' . $firstImage->getClientOriginalExtension();
        $firstImage->move(public_path('images'), basename($firstFilename));
        $room->image_path = $firstFilename;
        $room->save();
    
        // 3. Các ảnh còn lại → bảng room_images
        foreach (array_slice($images, 1) as $index => $image) {
            $filename = 'images/phong' . $room->id . '_' . ($index + 2) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), basename($filename));
    
            DB::table('room_images')->insert([
                'room_id' => $room->id,
                'image_path' => $filename,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    
        return redirect()->route('admin.quanly.index')->with('success', 'Đã thêm phòng và ảnh thành công.');
    }
    
    
    // Giao diện sửa phòng
    public function edit($id)
    {
        $room = Room::findOrFail($id);
        $otherImages = DB::table('room_images')->where('room_id', $id)->get();
    
        return view('admin.edit', compact('room', 'otherImages'));
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
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif',
        'other_images.*' => 'nullable|image|mimes:jpg,jpeg,png,gif',
    ]);

    // Ảnh chính
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

    // Cập nhật ảnh phụ
    if ($request->hasFile('other_images')) {
        foreach ($request->file('other_images') as $id => $imageFile) {
            if ($imageFile) {
                $roomImage = DB::table('room_images')->where('id', $id)->first();
                if ($roomImage && file_exists(public_path($roomImage->image_path))) {
                    unlink(public_path($roomImage->image_path));
                }
                $filename = 'images/phong' . $room->id . '_' . $id . '.' . $imageFile->getClientOriginalExtension();
                $imageFile->move(public_path('images'), basename($filename));
                DB::table('room_images')->where('id', $id)->update([
                    'image_path' => $filename,
                    'updated_at' => now()
                ]);
            }
        }
    }

    return redirect()->route('admin.quanly.index')->with('success', 'Cập nhật phòng thành công.');
}



    // Xử lý xoá phòng
    public function destroy($id)
    {
        $room = Room::findOrFail($id);

        if ($room->image_path && file_exists(public_path($room->image_path))) {
            unlink(public_path($room->image_path));
        }

        $room->delete();
        return redirect()->route('admin.quanly.index')->with('success', 'Xoá phòng thành công.');
    }
}