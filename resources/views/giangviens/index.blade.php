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
<h3 class="text-center m-5">Quản lí giảng viên</h3>

<button type="button" class="btn btn-sm my-4" id="plus" data-toggle="modal" data-target="#addModal">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="28" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
    </svg> &nbsp;Thêm 
</button>

@include('giangviens.createmodal')

<table class="table">
    <thead class="table-secondary">
        <tr>
            <th>Mã</th>
            <th>Họ và tên</th>
            <th>Email</th>
            <th>Khoa</th>
            <th>Số điện thoại</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($giangviens as $giangvien)
            <tr>
                <td>{{ $giangvien->user_id }}</td> 
                <td>{{ $giangvien->ho_ten }}</td> 
                <td>{{ $giangvien->email }}</td> 
                <td>{{ $giangvien->khoa }}</td> 
                <td>{{ $giangvien->sdt }}</td> 
                <td>
                    <button type="button" class="btn btn-sm btn-info my-3 btn-view" data-giangvien='@json($giangvien)'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                        </svg>
                    </button>
                    <button type="button" class="btn btn-sm btn-info my-3 btn-edit" data-giangvien='@json($giangvien)'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a.5.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                        </svg>
                    </button>
                    <form action="/giangvien/{{$giangvien->user_id}}/xoa" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm  btn-info my-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 5h4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7H6v7a.5.5 0 0 1-1 0v-7z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1H14a1 1 0 0 1 1 1v1zM4.118 4 4 4.118V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.118L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                        </button>
                    </form>
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
                <h5 class="modal-title text-center" id="showModalLabel">Thông tin chi tiết</h5>
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
                        <input type="text" class="form-control" id="edit_ma_gv" name="ma_gv" >
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
                      
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

<script>
    $(document).ready(function() {
        $('.btn-view').on('click', function() {
            var giangvien = $(this).data('giangvien');
            $('#showModal #ma_gv').text(giangvien.user_id);
            $('#showModal #ho_ten').text(giangvien.ho_ten);
            $('#showModal #email').text(giangvien.email);
            $('#showModal #khoa').text(giangvien.khoa);
            $('#showModal #sdt').text(giangvien.sdt);
            $('#showModal').modal('show');
        });

        $('.btn-edit').on('click', function() {
            var giangvien = $(this).data('giangvien');
            $('#editForm').attr('action', '/giangvien/' + giangvien.user_id);
            $('#edit_ma_gv').val(giangvien.user_id);
            $('#edit_ho_ten').val(giangvien.ho_ten);
            $('#edit_email').val(giangvien.email);
            $('#edit_khoa').val(giangvien.khoa);
            $('#edit_sdt').val(giangvien.sdt);
            $('#editModal').modal('show');
        });
    });
</script>