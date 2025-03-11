@extends('layouts.app')

@section('title', 'Quản Lý Sinh Viên')

@section('content')

<h2 class="text-center mb-4">Danh Sách Sinh Viên</h2>

<table class="table table-bordered text-center align-middle">
    <thead class="table-light">
        <tr>
            <th>Mã</th>
            <th>Họ và tên</th>
            <th>Lớp</th>
            <th>Đề tài</th>
            <th>Giảng viên</th>
            <th>Tiến độ</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sinhviens as $sinhvien)
            <tr>
                <td>{{ $sinhvien->ma_sv }}</td>
                <td>{{ $sinhvien->ho_ten }}</td>
                <td>{{ $sinhvien->lop }}</td>
                <td>{{ $sinhvien->de_tai }}</td>
                <td>{{ $sinhvien->giang_vien ?? 'Chưa có' }}</td>
                <td class="{{ $sinhvien->tien_do == 'Hoàn thành' ? 'status-complete' : 'status-incomplete' }}">
                    {{ $sinhvien->tien_do }}
                </td>
                <td>
                    <a href="{{ route('sinhvien.edit', $sinhvien->id) }}" class="btn btn-sm btn-primary">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('sinhvien.destroy', $sinhvien->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Xóa sinh viên này?')">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
