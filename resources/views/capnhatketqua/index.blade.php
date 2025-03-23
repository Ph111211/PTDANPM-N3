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

@section('title', 'Cập nhật kết quả')

@section('content')
<div class="container-xl">

        <div class="table-responsive">
        <div class="table-wrapper">
            <div>
                <div class="row mb-3">
                    <div class="row mb-3 d-flex justify-content-between align-items-center">
                        <h1 class="fw-bold text-center" style="color: #000000">Cập nhật kết quả</h1>
                    </div>
                </div>
            </div>
            <table class="table table-hover">
                <thead class="table-secondary">
                <tr>
                    <th>Mã SV</th>
                    <th>Họ và tên</th>
                    <th>Tiêu đề</th>
                    <th>Hành động</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($ketquadoan as $it)
                    <tr>
                        <td>{{ $it->ma_sv }}</td>
                        <td>{{ $it->sinhvien ? $it->sinhvien->ho_ten : 'Không có dữ liệu' }}</td>
                        <td>{{ $it->tieu_de}}</td>
                        <td>
                            <div type="button" class="btn btn-sm edit-btn" style="background: #003C75" data-id="{{ $it->ma_do_an }}" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $it->ma_do_an }}">
                                <span style=" color: #ffffff"> Cập nhật kết quả </span>
                            </div>

                            <!-- Modal Sửa Người Dùng -->
                            <div class="modal fade" id="editUserModal{{ $it->ma_do_an }}" tabindex="-1"
                                 aria-labelledby="editUserModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <h5 class="modal-title text-center fw-bold" id="editUserModalLabel">Cập nhật kết quả</h5>
                                            <form id="editForm{{ $it->ma_do_an }}" action="{{ route('capnhatketqua', $it->ma_do_an) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <div class="form-group">
                                                    <label class="fw-bold mt-3 text-start d-block" for="ho_ten">Họ và tên</label>
                                                    <p class="text-start" style="border: 1px solid #ccc; padding: 5px; width: 100%;">
                                                        {{ $it->sinhvien->ho_ten }}
                                                    </p>
                                                </div>

                                                <div class="form-group">
                                                    <label class="fw-bold mt-3 text-start d-block" for="diem_so">Điểm</label>
                                                    <input type="text" class="form-control small-text-input" id="diem_so" name="diem_so" value="{{ $it->diem_so ?: null }}" placeholder="{{$it->diem_so ?: 'Chưa có điểm'}}" required>
                                                </div>

                                                <div class="form-group">
                                                    <label class="fw-bold mt-3 text-start d-block" for="nhan_xet">Nhận xét của giảng viên</label>
                                                    <textarea class="form-control small-text-input" id="nhan_xet" name="nhan_xet" rows="1" required oninput="autoResize(this)">{{ $it->nhan_xet }}</textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label class="fw-bold mt-3 text-start d-block" for="trang_thai">Trạng thái</label>
                                                    <select name="trang_thai" class="form-control">
                                                        <option value="Hoàn thành" {{ $it->trang_thai == 'Hoàn thành' ? 'selected' : '' }}>Hoàn thành</option>
                                                        <option value="Chưa hoàn thành" {{ $it->trang_thai == 'Chưa hoàn thành' ? 'selected' : '' }}>Chưa hoàn thành</option>
                                                    </select>
                                                </div>

                                                <div class="modal-footer d-flex justify-content-between mb-5">
                                                    <button type="submit" class="btn px-5 small-text-input style-button">Lưu kết quả</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Xác Nhận Cập Nhật -->
                            <div class="modal fade" id="confirmUpdateModal{{ $it->ma_do_an }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body text-center">
                                            <p class="fw-bold">Bạn có chắc chắn muốn cập nhật thông tin không?</p>

                                            <!-- Nút xác nhận sẽ gọi JavaScript để submit form chỉnh sửa -->
                                            <button type="button" class="btn style-button px-4 mr-3"
                                                    onclick="submitEditDoAnForm({{ $it->ma_do_an }})">Có
                                            </button>

                                            <button type="button" class="btn style-button" data-bs-dismiss="modal">
                                                Không
                                            </button>
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
