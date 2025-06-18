@extends('admin')

@section('content')
<style>
    h2 {
        color: #2c3e50;
        margin-bottom: 20px;
        font-size: 28px;
    }

    form {
        max-width: 600px;
        background-color: #f9f9f9;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 8px 16px rgba(0,0,0,0.1);
    }

    form div {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 6px;
        font-weight: bold;
        color: #34495e;
    }

    input[type="text"],
    input[type="number"],
    textarea,
    select,
    input[type="file"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 14px;
        box-sizing: border-box;
    }

    textarea {
        resize: vertical;
    }

    img {
        margin: 10px 0;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0,0,0,0.1);
    }

    button[type="submit"] {
        background-color: #f39c12;
        color: white;
        padding: 12px 20px;
        font-size: 16px;
        font-weight: bold;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    button[type="submit"]:hover {
        background-color: #d68910;
        transform: translateY(-2px);
    }
</style>

<h2>Sửa thông tin phòng</h2>

<form method="POST" action="{{ route('admin.phong.update', $room->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div>
        <label>Tên phòng:</label>
        <input type="text" name="name" value="{{ $room->name }}" required>
    </div>

    <div>
        <label>Thành phố:</label>
        <select name="city" required>
            <option value="">-- Chọn thành phố --</option>
            <option value="Hanoi" {{ $room->city == 'Hanoi' ? 'selected' : '' }}>Hà Nội</option>
            <option value="HCM" {{ $room->city == 'TP.HCM' ? 'selected' : '' }}>TP.HCM</option>
            <option value="DaNang" {{ $room->city == 'Đà Nẵng' ? 'selected' : '' }}>Đà Nẵng</option>
            <option value="NhaTrang" {{ $room->city == 'Nha Trang' ? 'selected' : '' }}>Nha Trang</option>
            <option value="DaLat" {{ $room->city == 'Đà Lạt' ? 'selected' : '' }}>Đà Lạt</option>
        </select>
    </div>

    <div>
        <label>Giá:</label>
        <input type="number" name="price" value="{{ $room->price }}" required>
    </div>

    <div>
        <label>Mô tả:</label>
        <textarea name="describe" rows="3">{{ $room->describe }}</textarea>
    </div>

    <div>
        <label>Ảnh phòng hiện tại:</label><br>
        <img src="{{ asset($room->image_path) }}" width="150" alt="Ảnh phòng"><br>
        <label>Thay ảnh mới (nếu cần):</label>
        <input type="file" name="image" accept="image/*">
    </div>

    <button type="submit">📌 Cập nhật</button>
</form>
@endsection
