<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
</body>
<style>
    
    .table{
    box-sizing: border-box;
    table-layout: fixed;
    text-align: center;
    }
    h3{ 
        padding-top: 20px;
    }
    #plus{
        background-color: #003C75F2;
        color: white;
        padding: 7px 20px 7px 5px;
    }
</style>
</html>

@extends('layouts.giangvien')

@section('title', 'Lịch nộp đồ án')

@section('content')
    <h3 class="text-center my-3">Lên lịch nộp đồ án</h3>
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<table class="table">
    <thead class="table-secondary">
        <tr>
            <th>Mã sinh viên</th>
            <th>Họ và tên</th>
            <th>Lớp</th>
            <th>Đề tài</th>
            <th>Thời gian nộp</th>
            <th>Sửa chữa</th>
        </tr>
    </thead>
    <tbody>
        @php $stt = 1; @endphp
        @foreach ($sinhviens as $sinhvien)
            <tr>
                <td>{{ $sinhvien->user_id }}</td>
                <td>{{ $sinhvien->ho_ten }}</td>
                <td>{{ $sinhvien->lop }}</td>
                <td>{{ optional($sinhvien->doAn)->tieu_de ?? 'Chưa có' }}</td>
                <td>{{ optional($sinhvien->doAN)->ngay_gio }}</td>
                <td>
                    <button type="button" class="btn btn-sm btn-info py-2 my-2" data-bs-toggle="modal" data-bs-target="#editModal{{ $sinhvien->user_id }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 20">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                        </svg>
                    </button>
                    <form action="{{ route('lichnop.destroy', $sinhvien->user_id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-info py-2 my-2" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="mb-1 me-1">
                            <path d="M18 6L6 18" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M6 6L18 18" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg></button>
                </form>
                </td>
            </tr>
            <div class="modal fade" id="editModal{{ $sinhvien->user_id }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Sửa lịch nộp</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('lichnop.update', $sinhvien->user_id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">Họ và tên</label>
                                <input type="text" name="ho_ten" value="{{ $sinhvien->ho_ten }}" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Lớp</label>
                                <input type="text" name="lop" value="{{ $sinhvien->lop }}" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Đề tài</label>
                                <textarea name="tieu_de" class="form-control">{{ optional($sinhvien->doAn)->tieu_de }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Thời gian nộp</label>
                                <input type="date" name="ngay_gio" value="{{ optional($sinhvien->doAn)->ngay_gio }}" class="form-control">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Lưu</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        @endforeach
    </tbody>
</table>

<button type="button" class="btn btn-sm my-4" data-bs-toggle="modal" data-bs-target="#themLichNopModal" id="plus">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="28" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
        </svg> &nbsp;Thêm lịch nộp
</button>

<div class="modal fade" id="themLichNopModal" tabindex="-1" aria-labelledby="themLichNopModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="themLichNopModalLabel">Lên lịch nộp đồ án</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('lichnop.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">ID</label>
                        <input type="text" name="ma_sv" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Họ và tên</label>
                        <input type="text" name="ho_ten" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Lớp</label>
                        <input type="text" name="lop" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Đề tài</label>
                        <textarea name="de_tai" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Thời gian nộp</label>
                        <input type="date" name="ngay_gio" class="form-control" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Thêm</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Thoát</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div>{{ $sinhviens->links('pagination::bootstrap-5') }}</div>
@endsection