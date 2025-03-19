<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://127.0.0.1:8000/bootstrap/js/bootstrap.min.js">
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
        background-color: #003C75;
        color: white;
        padding: 7px 20px 7px 5px;
    }
</style>
</html>

@extends('layouts.giangvien')

@section('title', 'Quản Lý Sinh Viên')

@section('content')
<h3>Danh sách sinh viên</h3>
<a href="{{ route('sinhviens.create') }}" class="btn btn-sm my-4" id="plus">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="28" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
    </svg> &nbsp;Thêm sinh viên
</a>
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                <td id="detai_{{ $sinhvien->id }}">{{ $sinhvien->lop }}</td>
                <td>{{ $sinhvien->ngay_sinh }}</td>
                <td>
                    <form action="" method="POST" style="display:inline;">
                        @csrf
                        <button type="button" class="btn btn-sm btn-info my-3" 
                                onclick="xoaDeTai('{{ $sinhvien->id }}', '{{ $sinhvien->ho_ten }}')">
                            Hủy phân công
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div>{{ $sinhviens->links('pagination::bootstrap-5') }}</div>

@endsection
<script>
function xoaDeTai(id, hoTen) {
    if (confirm('Bạn có chắc chắn muốn hủy phân công ' + hoTen + ' khỏi đề tài này?')) {
        document.getElementById('detai_' + id).innerText = '';
    }
}
</script>

