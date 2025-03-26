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
@extends('layouts.sinhvien')

@section('title', 'Kết quả thực tập')

@section('content')
    <div class="container-xl">

        <div class="table-responsive">
            <div class="table-wrapper">
                <div>
                    <div class="row mb-3">
                        <div class="row mb-3 d-flex justify-content-between align-items-center">
                            <h1 class="fw-bold text-center" style="color: #000000">Tiến độ thực tập</h1>
                        </div>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead class="table-secondary">
                    <tr>
                        <th>Mã</th>
                        <th>Họ và tên</th>
                        <th>Nhiệm vụ</th>
                        <th>Thời gian</th>
                        <th>Kết quả đạt được</th>
                        <th>Tiến độ thực tập</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($ketquas as $it)
                        <tr>
                            <td>{{ $it->ma_sv }}</td>
                            <td>{{ $it->sinhvien ? $it->sinhvien->ho_ten : 'Không có dữ liệu' }}</td>
                            <td>{{ $it->vi_tri }}</td>
                            <td class="w-50" >{{ $it->thoi_gian_bat_dau }} - {{ $it->thoi_gian_ket_thuc }}</td>
                            <td>
                                @if(isset($it->diem_so) && is_numeric($it->diem_so))
                                    {{ $it->diem_so * 10 }}%
                                @else
                                    Chưa có điểm
                                @endif
                            </td>

                            <td>
                                @if(isset($it->diem_so) && is_numeric($it->diem_so))
                                    <span
                                        class="{{ $it->diem_so > 7 }}">{{ $it->diem_so > 7 ? 'Hoàn thành' : 'Không hoàn thành' }}
                                    </span>
                                @else
                                    Chưa có điểm
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="text-end ">
                    <div type="button" class="btn btn-sm edit-btn px-4 py-2" style="background: #28A745"
                         data-id="{{ $it->ma_ket_qua }}">
                        <i class="bi bi-pencil-square text-white"></i>
                        <span style="color: #f5f6fa"> Cập nhật tiến độ</span>
                    </div>
                </div>


                <!-- Modal Show -->
                <div class="modal fade" id="editUserModal{{ $it->ma_ket_qua }}" tabindex="-1"
                     aria-labelledby="editUserModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h5 class="modal-title text-center fw-bold" id="editUserModalLabel">
                                    Thông tin người dùng</h5>

                                <div class="form-group">
                                    <label class="fw-bold mt-3 text-start d-block">Mã SV</label>
                                    <p class="text-start"
                                       style="border: 1px solid #ccc; padding: 5px; width: 100%;">
                                        {{ $it->ma_sv }}
                                    </p>

                                </div>

                                <div class="form-group">
                                    <label class="fw-bold mt-3 text-start d-block">Họ và tên</label>
                                    <p class="text-start"
                                       style="border: 1px solid #ccc; padding: 5px; width: 100%;">
                                        {{$it->sinhvien ? $it->sinhvien->ho_ten : 'Không có dữ liệu' }}</p>
                                </div>

                                <div class="form-group">
                                    <label class="fw-bold mt-3 text-start d-block">Doanh nghiệp</label>
                                    <p class="text-start"
                                       style="border: 1px solid #ccc; padding: 5px; width: 100%;">
                                        {{ $it->ten_dn}}</p>
                                </div>

                                <div class="form-group">
                                    <label class="fw-bold mt-3 text-start d-block">Điểm số</label>
                                    <p class="text-start"
                                       style="border: 1px solid #ccc; padding: 5px; width: 100%;">
                                        {{ $it->diem_so?:"Chưa có điểm" }}</p>
                                </div>

                                <div class="form-group">
                                    <label class="fw-bold mt-3 text-start d-block">Nhận xét của giảng
                                        viên</label>
                                    <p class="text-start"
                                       style="border: 1px solid #ccc; padding: 5px; width: 100%; word-wrap: break-word; white-space: normal;">
                                        {{ $it->nhan_xet_cua_giang_vien ?: 'Không có dữ liệu' }}
                                    </p>

                                </div>

                                <div class="modal-footer d-flex justify-content-between mb-3">
                                    <button type="button"
                                            class="btn btn-outline-danger px-5 small-text-input"
                                            data-bs-dismiss="modal">Đóng
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    {{ $ketquas->links('pagination::bootstrap-4') }}
                </div>
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
