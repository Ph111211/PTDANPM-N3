<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

@section('title', 'Quản Lý Giảng Viên')

@section('content')
<h3 class="text-center m-4">Quản lý giảng viên</h3>
<a href="#" class="btn btn-sm my-4" id="plus">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="28" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
    </svg> &nbsp;Thêm Giảng Viên
</a>
<table class="table">
    <thead class="table-secondary">
        <tr>
            <th>Mã</th>
            <th>Họ và tên</th>
            <th>Email</th>
            <th>Học vị</th>
            <th>Số điện thoại</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($giangviens as $giangvien)
            <tr>
                <td>{{ $giangvien->ma_gv }}</td>
                <td>{{ $giangvien->ho_ten }}</td>
                <td>{{ $giangvien->email }}</td>
                <td>{{ optional($giangvien->hocVi)->tieu_de ?? 'Chưa có' }}</td>
                <td>{{ $giangvien->email }}</td>
                <td>
                    <button type="button" class="btn btn-sm edit-btn" style="background: #87CEEB" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $giangvien->ma_gv }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                          </svg>
                    </button>
                    <button type="button" class="btn btn-sm edit-btn" style="background: #87CEEB" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $giangvien->ma_gv }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                        </svg>
                    </button>

                    <!-- Modal Sửa Người Dùng -->
                    <div class="modal fade" id="editUserModal{{ $giangvien->ma_gv }}" tabindex="-1" aria-labelledby="editUserModalLabel{{ $giangvien->ma_gv }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h5 class="modal-title text-center fw-bold" id="editUserModalLabel{{ $giangvien->ma_gv }}">Sửa người dùng</h5>

                                    <form id="editForm{{ $giangvien->ma_gv }}" action="{{ route('giangvien.update', $giangvien->ma_gv) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label class="fw-bold mt-3 text-start d-block" for="ma">Mã</label>
                                            <input type="text" class="form-control small-text-input" id="ma" name="ma" value="{{ $giangvien->ma_gv }}" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label class="fw-bold mt-3 text-start d-block" for="name">Họ và tên</label>
                                            <input type="text" class="form-control" id="name" name="ho_ten" value="{{ $giangvien->ho_ten }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label class="fw-bold mt-3 text-start d-block" for="email">Email</label>
                                            <input type="email" class="form-control small-text-input" id="email" name="email" value="{{ $giangvien->email }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label class="fw-bold mt-3 text-start d-block" for="role">Vai trò</label>
                                            <select name="vai_tro" class="form-control">
                                                <option value="Giảng viên" {{ $giangvien->vai_tro == 'Giảng viên' ? 'selected' : '' }}>Giảng viên</option>
                                                <option value="Sinh viên" {{ $giangvien->vai_tro == 'Sinh viên' ? 'selected' : '' }}>Sinh viên</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="fw-bold mt-3 text-start d-block" for="phone">Số điện thoại</label>
                                            <input type="tel" class="form-control small-text-input" id="phone" name="sdt" value="{{ $giangvien->sdt }}" required>
                                        </div>

                                        <div class="modal-footer d-flex justify-content-between mb-5">
                                            <button type="button" class="btn btn-outline-danger px-5 small-text-input" data-bs-dismiss="modal">Hủy</button>
                                            <button type="submit" class="btn px-5 small-text-input style-button">Cập nhật</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Nút Xóa -->
                    <button type="button" class="btn btn-sm" style="background: #87CEEB" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $giangvien->ma_gv }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                    </svg>
                    </button>

                    <!-- Modal Xác nhận Xóa -->
                    <div class="modal fade" id="deleteModal{{ $giangvien->ma_gv }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body text-center">
                                    <p class="fw-bold">Bạn có chắc chắn muốn xóa không?</p>

                                    <!-- Form Xóa -->
                                    <form action="{{ route('giangvien.destroy', $giangvien->ma_gv) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn style-button px-4 mr-3">Có</button>
                                        <button type="button" class="btn style-button" data-bs-dismiss="modal">Không</button>
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