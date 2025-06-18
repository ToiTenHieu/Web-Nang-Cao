@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Hoàn thiện hồ sơ cá nhân</h2>
    <form action="{{ route('profile.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="phone" class="form-label">Số điện thoại</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Địa chỉ</label>
            <input type="text" name="address" class="form-control" value="{{ old('address') }}">
        </div>

        <div class="mb-3">
            <label for="dob" class="form-label">Ngày sinh</label>
            <input type="date" name="dob" class="form-control" value="{{ old('dob') }}">
        </div>

        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
</div>
@endsection
