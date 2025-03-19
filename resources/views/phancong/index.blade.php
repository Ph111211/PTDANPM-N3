<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Phân công giảng viên</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
@extends('layouts.app')

@section('title', 'Phân công giảng viên')

@section('content')
    <div class="container-xl">

        <div class="table-responsive">
            <div class="table-wrapper">
                <div>
                    <div class="row mb-3">
                        <div class="row mb-3 d-flex justify-content-between align-items-center">
                            <h1 class="fw-bold text-center" style="color: #000000">Phân công giảng viên</h1>
                        </div>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead class="table-secondary">
                    <tr>
                        <th>Mã SV</th>
                        <th>Họ và tên</th>
                        <th>Lớp</th>
                        <th>Đề tài</th>
                        <th>Giảng viên</th>
                        <th>Tiến độ</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($sinhvien as $it)
                        <tr>
                            <td class="center-td">{{ $it->user_id }}</td>
                            <td class="center-td">{{ $it->ho_ten }}</td>
                            <td class="center-td">{{ $it->lop }}</td>
                            <td class="center-td">{{ $it->doan ? $it->doan->tieu_de : 'Không có dữ liệu'  }}</td>
                            <td class="center-td">
                                @if ($it->giangvien)
                                    {{ $it->giangvien->ho_ten }}
                                @else
                                    <button type="button" class="btn btn-sm edit-btn btn-create align-items-center"
                                            data-bs-toggle="modal" data-bs-target="#listGiangVienModal"
                                            style="background-color: #87CEEB; color: black">
                                        <i class="material-icons" style="vertical-align : middle; line-height: 1;">&#xE145;</i>
                                    </button>
                                @endif
{{--                                <div class="modal fade" id="listGiangVienModal" tabindex="-1" aria-labelledby="listGiangVienModalLabel" aria-hidden="true">--}}
{{--                                        <div class="modal-dialog modal-lg"> <!-- Mở rộng modal -->--}}
{{--                                            <div class="modal-content">--}}
{{--                                                <div class="modal-header">--}}
{{--                                                    <h5 class="modal-title" id="listGiangVienModalLabel">Danh sách Giảng Viên</h5>--}}
{{--                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--                                                </div>--}}

{{--                                                <div class="modal-body">--}}
{{--                                                    <table class="table table-bordered">--}}
{{--                                                        <thead>--}}
{{--                                                        <tr>--}}
{{--                                                            <th>Mã Giảng Viên</th>--}}
{{--                                                            <th>Họ và Tên</th>--}}
{{--                                                            <th>Khoa</th>--}}
{{--                                                            <th>Số lượng SV hướng dẫn</th>--}}
{{--                                                            <th>Bộ môn</th>--}}
{{--                                                        </tr>--}}
{{--                                                        </thead>--}}
{{--                                                        <tbody>--}}
{{--                                                        @foreach ($giangviens as $gv)--}}
{{--                                                            <tr>--}}
{{--                                                                <td>{{ $gv->user_id }}</td>--}}
{{--                                                                <td>{{ $gv->ho_ten }}</td>--}}
{{--                                                                <td>{{ $gv->khoa }}</td>--}}
{{--                                                                <td>{{ $gv->so_luong_sinh_vien_huong_dan }}</td>--}}
{{--                                                                <td>{{ $gv->bo_mon }}</td>--}}
{{--                                                            </tr>--}}
{{--                                                        @endforeach--}}
{{--                                                        </tbody>--}}
{{--                                                    </table>--}}
{{--                                                </div>--}}

{{--                                                <div class="modal-footer">--}}
{{--                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                            </td>

                            <td class="center-td">{{ $it->doan ? $it->doan->trang_thai : 'Không có dữ liệu'  }}</td>
                            <td class="center-td">
                                <button type="button" class="btn btn-sm edit-btn" style="background: #87CEEB"
                                        data-id="{{ $it->user_id }}">
                                    <i class="bi bi-pencil-square"></i>
                                </button>

                                <!-- Modal Sửa Người Dùng -->
                                <div class="modal fade" id="editUserModal{{ $it->user_id }}" tabindex="-1"
                                     aria-labelledby="editUserModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <h5 class="modal-title text-center fw-bold" id="editUserModalLabel">Sửa
                                                    người dùng</h5>

                                                <form id="editForm{{ $it->user_id }}"
                                                      action="{{ route('phancong.update', $it->user_id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="form-group">
                                                        <label class="fw-bold mt-3 text-start d-block"
                                                               for="ma">Mã</label>
                                                        <input type="text" class="form-control small-text-input" id="ma"
                                                               name="ma" value="{{ $it->user_id }}" readonly>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="fw-bold mt-3 text-start  d-block" for="name">Họ và
                                                            tên</label>
                                                        <input type="text" class="form-control" id="name" name="ho_ten"
                                                               value="{{ $it->ho_ten }}" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="fw-bold mt-3 text-start  d-block" for="lop">Lớp</label>
                                                        <input type="text" class="form-control" id="lop" name="lop"
                                                               value="{{ $it->lop }}" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="fw-bold mt-3 text-start  d-block" for="dia_chi">Địa chỉ</label>
                                                        <input type="text" class="form-control" id="dia_chi" name="dia_chi"
                                                               value="{{ $it->dia_chi }}" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="fw-bold mt-3 text-start  d-block" for="email">Email</label>
                                                        <input type="email" class="form-control small-text-input"
                                                               id="email" name="email" value="{{ $it->email }}"
                                                               required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="fw-bold mt-3 text-start  d-block" for="phone">Số
                                                            điện thoại</label>
                                                        <input type="tel" class="form-control small-text-input"
                                                               id="phone" name="sdt" value="{{ $it->sdt }}" required>
                                                    </div>

                                                    <div class="modal-footer d-flex justify-content-between mb-5">
                                                        <button type="button"
                                                                class="btn btn-outline-danger px-5 small-text-input"
                                                                data-bs-dismiss="modal">Hủy
                                                        </button>
                                                        <!-- Button mở modal xác nhận -->
                                                        <button type="button"
                                                                class="btn px-5 small-text-input style-button"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#confirmUpdateModal{{ $it->user_id }}"
                                                        >Cập nhật
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Xác Nhận Cập Nhật -->
                                <div class="modal fade" id="confirmUpdateModal{{ $it->user_id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body text-center">
                                                <p class="fw-bold">Bạn có chắc chắn muốn cập nhật thông tin không?</p>

                                                <!-- Nút xác nhận sẽ gọi JavaScript để submit form chỉnh sửa -->
                                                <button type="button" class="btn style-button px-4 mr-3"
                                                        onclick="submitEditForm({{ $it->user_id }})">Có
                                                </button>
                                                <button type="button" class="btn style-button" data-bs-dismiss="modal">
                                                    Không
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Nút Xóa -->
                                <button type="button" class="btn btn-sm" style="background: #87CEEB"
                                        data-bs-toggle="modal" data-bs-target="#deleteModal{{ $it->user_id }}">
                                    <i class="bi bi-trash-fill"></i>
                                </button>

                                <!-- Modal Xác nhận Xóa -->
                                <div class="modal fade" id="deleteModal{{ $it->user_id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body text-center">
                                                <p class="fw-bold">Bạn có chắc chắn muốn xóa không?</p>

                                                <!-- Form Xóa -->
                                                <form action="{{ route('phancong.destroy', $it->user_id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn style-button px-4 mr-3">Có</button>
                                                    <button type="button" class="btn style-button"
                                                            data-bs-dismiss="modal">Không
                                                    </button>
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
            </div>
        </div>

        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-top">
                <div class="modal-content p-2">
                    <div class="modal-body alert text-center m-0 p-6 fw-bold" style="color: #2ca02c">
                        {{ session('success') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
</body>
<script>
    var successMessage = "{{ session('success') }}";
</script>
<script src="{{ asset('js/scriptsAdmin.js') }}"></script>
</html>
