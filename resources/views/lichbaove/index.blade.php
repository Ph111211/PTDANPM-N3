<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
        margin-left: 40%;
        padding-top: 20px;
    }
    #plus{
        background-color: #003C75;
        color: white;
        padding: 7px 20px 7px 5px;
    }
</style>
</html>

@extends('layouts.app')

@section('title', 'Quản Lí Sinh Viên')

@section('content')
<h3 class="text-center m-5">Lên lịch bảo vệ</h3>


<table class="table">
    <thead class="table-secondary">
        <tr>
            <th>Mã</th>
            <th>Họ và tên</th>
            <th>Lớp</th>
            <th>Đề tài</th>
            <th>Giảng viên</th>
            <th>Lên lịch</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $item['sinhvien']->user_id }}</td>
                <td>{{ $item['sinhvien']->ho_ten }}</td>
                <td>{{ $item['sinhvien']->lop }}</td>
                <td>{{ $item->tieu_de}}</td>
                <td>{{ $item['giangvien']->ho_ten ?? 'N/A' }}</td>
                <td>
                    <button type="button" class="btn btn-sm btn-info my-3 btn-add" data-toggle="modal" data-target="#addModal" data-giangvien='@json($item['sinhvien']->giangvien)'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                        </svg>
                    </button>

                    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-center w-100" id="addModalLabel">Lên lịch bảo vệ</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="POST">
                                        @csrf
                                        <div class="form-group text-left">
                                            <label for="ngay_gio"><strong>Ngày</strong></label>
                                            <input type="date" class="form-control" id="ngay_gio" name="ngay" required>
                                        </div>
                                        <div class="form-group text-left">    
                                            <label for="ngay_gio"><strong>Thời gian</strong></label>
                                            <input type="time" class="form-control" id="ngay_gio" name="gio" required>
                                        </div>
                                        <div class="form-group text-left">
                                            <label for="dia_diem"><strong>Địa điểm</strong></label>
                                            <input type="text" class="form-control" id="dia_diem" name="dia_diem" required>
                                        </div>
                                        <div class="form-group text-left">
                                            <label for="#"><strong>Hội đồng chấm thi</strong></label>
                                            <input type="text" class="form-control" id="khoa" name="khoa" required>
                                        </div>
                                        <div class="modal-footer justify-center ">
                                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>



@endsection

