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



@include('giangviens.createmodal')

<table class="table">
    <thead class="table-secondary">
        <tr>
            <th>Mã</th>
            <th>Họ và tên</th>
            <th>Lớp</th>
            <th>Đề tài</th>
            <th>Giảng viên</th>
            <th>Lên lịch</th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sinhviens as $sinhvien)    
            <tr>
                <td>{{ $sinhvien->user_id }}</td> 
                <td>{{ $sinhvien->ho_ten }}</td> 
                <td>{{ $sinhvien->lop }}</td> 
                <td>{{ $sinhvien->detai }}</td> 
                <td>{{ $giangvien->ho_ten }}</td> 
                <td>
                    <button type="button" class="btn btn-sm btn-info my-3 btn-view" data-giangvien='@json($giangvien)'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                          </svg>
                    </button>
                    
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal hiển thị thông tin giảng viên -->
<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="showModalLabel">Thông Tin Giảng Viên</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="ma_gv">Mã</label>
                    <p id="ma_gv"></p>
                </div>
                <div class="form-group">
                    <label for="ho_ten">Họ và Tên</label>
                    <p id="ho_ten"></p>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <p id="email"></p>
                </div>
                <div class="form-group">
                    <label for="khoa">Khoa</label>
                    <p id="khoa"></p>
                </div>
                <div class="form-group">
                    <label for="sdt">Số Điện Thoại</label>
                    <p id="sdt"></p>
                </div>
                <div class="modal-footer d-flex justify-content-end">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal chỉnh sửa thông tin giảng viên -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="editModalLabel">Chỉnh Sửa Thông Tin Giảng Viên</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST" action="">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="edit_ma_gv">Mã</label>
                        <input type="text" class="form-control" id="edit_ma_gv" name="ma_gv" readonly>
                    </div>
                    <div class="form-group">
                        <label for="edit_ho_ten">Họ và Tên</label>
                        <input type="text" class="form-control" id="edit_ho_ten" name="ho_ten">
                    </div>
                    <div class="form-group">
                        <label for="edit_email">Email</label>
                        <input type="email" class="form-control" id="edit_email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="edit_khoa">Khoa</label>
                        <input type="text" class="form-control" id="edit_khoa" name="khoa">
                    </div>
                    <div class="form-group">
                        <label for="edit_sdt">Số Điện Thoại</label>
                        <input type="text" class="form-control" id="edit_sdt" name="sdt">
                    </div>
                    <div class="modal-footer d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

