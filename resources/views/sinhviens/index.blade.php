@extends('layouts.app')

@section('title', 'Quản Lý Sinh Viên')

@section('content')
<h2 class="text-center mb-4">Danh Sách Sinh Viên</h2>

<table class="table table-bordered text-center align-center">
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
                <td>{{ optional($sinhvien->doAn)->de_tai ?? 'Chưa có' }}</td>
                <td>{{ optional($sinhvien->doAn->giangVien)->ho_ten ?? 'Chưa có' }}</td>
                <td class="{{ optional($sinhvien->doAn)->tien_do == 'Hoàn thành' ? 'text-success' : 'text-danger' }}">
                    {{ optional($sinhvien->doAn)->tien_do ?? 'Chưa cập nhật' }}
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