@extends('admin')

@section('content')
<style>
    h2 {
        color: #2c3e50;
        margin-bottom: 20px;
    }
    .btn-add-room {
    display: inline-block;
    background-color: #3498db;
    color: white;
    padding: 10px 20px;
    font-weight: bold;
    font-size: 16px;
    border-radius: 8px;
    text-decoration: none;
    margin-bottom: 20px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

.btn-add-room:hover {
    background-color: #2980b9;
    transform: translateY(-2px);
    box-shadow: 0 6px 10px rgba(0,0,0,0.15);
}

    a[href*="phong.create"] {
        display: inline-block;
        background-color: #27ae60;
        color: white;
        padding: 10px 15px;
        text-decoration: none;
        border-radius: 5px;
        margin-bottom: 15px;
    }

    a[href*="phong.create"]:hover {
        background-color: #219150;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    table thead {
        background-color: #2980b9;
        color: white;
    }

    table th, table td {
        padding: 12px 15px;
        border: 1px solid #ddd;
        text-align: center;
        vertical-align: middle;
    }

    table tbody tr:hover {
        background-color: #f2f2f2;
    }

    td img {
        border-radius: 5px;
        max-height: 80px;
    }

    a[href*="edit"] {
        color: #2980b9;
        margin-right: 10px;
        text-decoration: none;
    }

    a[href*="edit"]:hover {
        text-decoration: underline;
    }

    form button {
        background-color: transparent;
        border: none;
        color: #e74c3c;
        cursor: pointer;
        font-size: 16px;
    }

    form button:hover {
        text-decoration: underline;
    }
    .table-description {
    max-height: 150px;
    overflow-y: auto;
    text-align: left;
    padding-right: 5px;
    white-space: pre-line;
}
</style>

<h2>Danh sách phòng</h2>

<a href="{{ route('admin.phong.create') }}" class="btn-add-room">
    ➕ Thêm phòng
</a>


<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên phòng</th>
            <th>Thành phố</th>
            <th>Giá</th>
            <th>Mô tả</th>
            <th>Ảnh</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rooms as $room)
        <tr>
            <td>{{ $room->id }}</td>
            <td>{{ $room->name }}</td>
            <td>{{ $room->city }}</td>
            <td>{{ number_format($room->price) }} đ</td>
            <td><div class="table-description">{{ $room->describe }}</div></td>
            <td><img src="{{ asset($room->image_path) }}" alt="Ảnh" width="100"></td>
            <td>
                <a href="{{ route('admin.phong.edit', $room->id) }}">✏️ Sửa</a>
                <form action="{{ route('admin.phong.destroy', $room->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Bạn có chắc muốn xoá?')" type="submit">🗑️ Xoá</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
