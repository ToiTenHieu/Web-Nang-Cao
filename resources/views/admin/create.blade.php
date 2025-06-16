@extends('admin')

@section('content')
<style>
    h2 {
        color: #2c3e50;
        margin-bottom: 20px;
        font-size: 28px;
    }
    select {
    width: 100%;
    padding: 10px;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 14px;
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

    button[type="submit"] {
        background-color: #3498db;
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
        background-color: #2980b9;
        transform: translateY(-2px);
    }
</style>

<h2>Thêm phòng mới</h2>

<form method="POST" action="{{ route('phong.store') }}" enctype="multipart/form-data">
    @csrf
    <div>
        <label>Tên phòng:</label>
        <input type="text" name="name" required>
    </div>

    <div>
    <label>Thành phố:</label>
    <select name="city" required>
        <option value="">-- Chọn thành phố --</option>
        <option value="Hanoi">Hà Nội</option>
        <option value="HCM">TP.HCM</option>
        <option value="DaNang">Đà Nẵng</option>
        <option value="NhaTrang">Nha Trang</option>
        <option value="DaLat">Đà Lạt</option>
    </select>
</div>

    <div>
        <label>Giá:</label>
        <input type="number" name="price" required>
    </div>

    <div>
        <label>Mô tả:</label>
        <textarea name="describe" rows="3"></textarea>
    </div>

    <div>
        <label>Ảnh phòng:</label>
        <input type="file" name="image" accept="image/*" required>
    </div>

    <button type="submit">➕ Thêm phòng</button>
</form>
@endsection
