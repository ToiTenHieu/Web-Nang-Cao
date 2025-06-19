@extends('admin')

@section('content')
<style>
    h1 {
        color: #2c3e50;
        margin-bottom: 20px;
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

    .badge-role {
        padding: 5px 10px;
        border-radius: 5px;
        font-weight: bold;
        color: white;
    }

    .badge-admin {
        background-color: #27ae60;
    }

    .badge-user {
        background-color: #3498db;
    }

    .badge-unknown {
        background-color: #7f8c8d;
    }
</style>
<h1 class="text-center">👥 Quản lý người dùng</h1>

<table>
<thead>
    <tr>
        <th>#</th>
        <th>Tên</th>
        <th>Email</th>
        <th>Vai trò</th>
        <th>SĐT</th>
        <th>Địa chỉ</th>
        <th>Ngày sinh</th>
        <th>Ngày tạo</th>
        <th>Đã xác minh</th>
        <th>Hành động</th>
    </tr>
</thead>
<tbody>
    @foreach ($users as $user)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
            <span class="badge-role 
                {{ $user->role === 'admin' ? 'badge-admin' : ($user->role === 'user' ? 'badge-user' : 'badge-unknown') }}">
                {{ $user->role ?? 'Không rõ' }}
            </span>
        </td>
        <td>{{ $user->phone ?? '-' }}</td>
        <td>{{ $user->address ?? '-' }}</td>
        <td>{{ $user->dob ? \Carbon\Carbon::parse($user->dob)->format('d/m/Y') : '-' }}</td>
        <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
        <td>{{ $user->email_verified_at ? '✔️' : '❌' }}</td>
        <td>
            <form action="{{ route('admin.nguoidung.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xoá người dùng này?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Xoá</button>
            </form>
        </td>
    </tr>
    @endforeach
</tbody>
</table>

@endsection
