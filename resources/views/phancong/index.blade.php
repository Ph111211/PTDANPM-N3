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
                            <td class="center-td">{{ $it->ma_sv }}</td>
                            <td class="center-td">{{ $it->ho_ten }}</td>
                            <td class="center-td">{{ $it->lop }}</td>
                            <td class="center-td">{{ $it->doan ? $it->doan->tieu_de : 'Không có dữ liệu'  }}</td>
                            <td class="center-td">
                                @if ($it->giangvien)
                                    {{ $it->giangvien->ho_ten }}
                                @else
                                    <button type="button" class="btn btn-sm edit-btn btn-create align-items-center"
                                            data-bs-toggle="modal" data-bs-target="#addUserModal"
                                            style="background-color: #87CEEB; color: black">
                                        <i class="material-icons" style="vertical-align : middle; line-height: 1;">&#xE145;</i>
                                    </button>
                                @endif
                            </td>
                            <td class="center-td">{{ $it->doan ? $it->doan->trang_thai : 'Không có dữ liệu'  }}</td>
                            <td class="center-td">
                                <button type="button" class="btn btn-sm edit-btn" style="background: #87CEEB"
                                        data-id="{{ $it->id }}">
                                    <i class="bi bi-pencil-square"></i>
                                </button>

                                <!-- Modal Sửa Người Dùng -->
                                <div class="modal fade" id="editUserModal{{ $it->id }}" tabindex="-1"
                                     aria-labelledby="editUserModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <h5 class="modal-title text-center fw-bold" id="editUserModalLabel">Sửa
                                                    người dùng</h5>

                                                <form id="editForm{{ $it->id }}"
                                                      action="{{ route('phancong.update', $it->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="form-group">
                                                        <label class="fw-bold mt-3 text-start d-block"
                                                               for="ma">Mã</label>
                                                        <input type="text" class="form-control small-text-input" id="ma"
                                                               name="ma" value="{{ $it->ma }}" readonly>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="fw-bold mt-3 text-start  d-block" for="name">Họ và
                                                            tên</label>
                                                        <input type="text" class="form-control" id="name" name="ho_ten"
                                                               value="{{ $it->ho_ten }}" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="fw-bold mt-3 text-start  d-block" for="email">Email</label>
                                                        <input type="email" class="form-control small-text-input"
                                                               id="email" name="email" value="{{ $it->email }}"
                                                               required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="fw-bold mt-3 text-start  d-block" for="role">Vai
                                                            trò</label>
                                                        <select name="vai_tro" class="form-control">
                                                            <option
                                                                value="Giảng viên" {{ $it->vai_tro == 'Giảng viên' ? 'selected' : '' }}>
                                                                Giảng viên
                                                            </option>
                                                            <option
                                                                value="Sinh viên" {{ $it->vai_tro == 'Sinh viên' ? 'selected' : '' }}>
                                                                Sinh viên
                                                            </option>
                                                        </select>
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
                                                                data-bs-target="#confirmUpdateModal{{ $it->id }}"
                                                        >Cập nhật
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Xác Nhận Cập Nhật -->
                                <div class="modal fade" id="confirmUpdateModal{{ $it->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body text-center">
                                                <p class="fw-bold">Bạn có chắc chắn muốn cập nhật thông tin không?</p>

                                                <!-- Nút xác nhận sẽ gọi JavaScript để submit form chỉnh sửa -->
                                                <button type="button" class="btn style-button px-4 mr-3"
                                                        onclick="submitEditForm({{ $it->id }})">Có
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
                                        data-bs-toggle="modal" data-bs-target="#deleteModal{{ $it->id }}">
                                    <i class="bi bi-trash-fill"></i>
                                </button>

                                <!-- Modal Xác nhận Xóa -->
                                <div class="modal fade" id="deleteModal{{ $it->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body text-center">
                                                <p class="fw-bold">Bạn có chắc chắn muốn xóa không?</p>

                                                <!-- Form Xóa -->
                                                <form action="{{ route('phancong.destroy', $it->id) }}" method="POST">
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

    </div>
@endsection
</body>
<script>
    var successMessage = "{{ session('success') }}";
</script>
<script src="{{ asset('js/scriptsAdmin.js') }}"></script>
</html>
