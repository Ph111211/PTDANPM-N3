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
    .head{
        justify-content: space-between;
    }
    #plus{
        background-color: #28A745;
        color: white;
        padding: 7px 20px 7px 5px;
    }
</style>
</html>

@extends('layouts.giangvien')

@section('title', 'Quản Lý Sinh Viên')

@section('content')
<div class="head d-flex">
    <h3>Danh sách sinh viên</h3>
    <a href="{{ route('giangvien/quanlysinhvien.create') }}" class="btn btn-sm my-4" id="plus">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="28" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
        </svg> &nbsp;Thêm sinh viên
    </a>
</div>
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
            <th>ID</th>
            <th>Mã sinh viên</th>
            <th>Họ và tên</th>
            <th>Đề tài</th>
            <th>Trạng thái</th>
            <th>Hủy phân công</th>
        </tr>
    </thead>
    <tbody>
        @php $stt = 1; @endphp
        @foreach ($sinhviens as $sinhvien)
            <tr>
                <td>{{ $stt++ }}</td>
                <td>{{ $sinhvien->user_id }}</td>
                <td>{{ $sinhvien->ho_ten }}</td>
                <td id="detai_{{ $sinhvien->user_id }}">{{ optional($sinhvien->doAn)->tieu_de ?? 'Chưa có' }}</td>
                <td>
                    <form action="{{ route('doan.capnhat') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $sinhvien->user_id }}">
                        <select name="trang_thai" class="form-control" onchange="this.form.submit()">
                            <option value="Chưa có đề tài" {{ optional($sinhvien->doAn)->trang_thai == null ? 'selected' : '' }}>Chưa có đề tài</option>
                            <option value="Chưa hoàn thành" {{ optional($sinhvien->doAn)->trang_thai == 'Chưa hoàn thành' ? 'selected' : '' }}>Chưa hoàn thành</option>
                            <option value="Hoàn thành" {{ optional($sinhvien->doAn)->trang_thai == 'Hoàn thành' ? 'selected' : '' }}>Hoàn thành</option>
                        </select>
                    </form>
                </td>
                <td>
                    <button type="button" class="btn btn-sm btn-info py-2" data-bs-toggle="modal" data-bs-target="#confirmModal{{ $sinhvien->user_id }}">
                        Hủy phân công
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@foreach ($sinhviens as $sinhvien)
        <div class="modal fade" id="confirmModal{{ $sinhvien->user_id }}" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('doan.huyPhanCong') }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $sinhvien->user_id }}">
                            <div class="modal-body text-center">
                                <p class="fw-bold">
                                    Bạn có chắc chắn muốn hủy phân công 
                                    <span class="text-danger">{{ $sinhvien->ho_ten }}</span> 
                                    khỏi đề tài 
                                    <span class="text-danger">{{ optional($sinhvien->doAn)->tieu_de ?? 'Không có' }}</span>?
                                </p>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                <button type="submit" class="btn btn-danger">Đồng ý</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
<div>{{ $sinhviens->links('pagination::bootstrap-5') }}</div>

@endsection


