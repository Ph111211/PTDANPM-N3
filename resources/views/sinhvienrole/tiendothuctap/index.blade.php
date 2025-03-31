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
                            <td>{{ $it->nhiem_vu }}</td>
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
                    <div type="button" class="btn btn-sm edit-btn px-4 py-2" style="background: #28A745" data-id="{{ $it->ma_ket_qua }}">
                        <i class="bi bi-pencil-square text-white"></i>
                        <span style="color: #f5f6fa"> Cập nhật tiến độ</span>
                    </div>
                </div>

                <!-- Modal Show -->
                <div class="modal fade" id="editUserModal{{ $it->ma_ket_qua }}" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h5 class="modal-title text-center fw-bold" id="editUserModalLabel">
                                    Cập nhật tiến độ</h5>
                                <form action="{{ route('tiendothuctap', $it->ma_do_an) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label class="fw-bold mt-3 text-start d-block">Công việc đã thực hiện</label>
                                        <input type="text" class="form-control" name="nhiem_vu" value="{{ $it->nhiem_vu }}">
                                    </div>

                                    <div class="form-group">
                                        <label class="fw-bold mt-3 text-start d-block">Kết quả đạt được</label>
                                        <textarea class="form-control" name="mo_ta_nhiem_vu" rows="3">{{ $it->mo_ta_nhiem_vu }}</textarea>
                                    </div>

                                    <div class="modal-footer d-flex justify-content-between mb-3">
                                        <button type="button" class="btn btn-outline-danger px-5 small-text-input" data-bs-dismiss="modal">Hủy</button>
                                        <button type="submit" class="btn btn-success px-5 update-btn">Cập nhật thay đổi</button>
                                    </div>

                                </form>
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
<!-- Modal xác nhận cập nhật -->
<div class="modal fade" id="confirmUpdateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center shadow-lg" style="border-radius: 10px;">
            <div class="modal-body">
                <h4 class="fw-bold">Bạn có chắc chắn muốn cập nhật tiến độ?</h4>
                <button type="button" id="confirm-update-btn" class="btn style-button px-4 py-2">
                    Có
                </button>
                <button type="button" class="btn m-3 style-button py-2" data-bs-dismiss="modal">
                    Không
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    var successMessage = "{{ session('success') }}";

    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".update-btn").forEach(button => {
            button.addEventListener("click", function (event) {
                event.preventDefault(); // Ngăn chặn gửi form ngay lập tức
                let form = this.closest("form");
                let nhiemVu = form.querySelector("[name='nhiem_vu']");
                let moTaNhiemVu = form.querySelector("[name='mo_ta_nhiem_vu']");
                let editModal = this.closest(".modal"); // Modal cập nhật tiến độ
                let confirmModal = new bootstrap.Modal(document.getElementById('confirmUpdateModal'));
                let isValid = true;

                // Xóa thông báo lỗi trước khi kiểm tra
                form.querySelectorAll(".error-message").forEach(error => error.remove());

                // Hàm kiểm tra và hiển thị lỗi
                function checkField(input, message) {
                    if (input.value.trim() === "") {
                        isValid = false;
                        input.classList.add("is-invalid");

                        let errorElement = document.createElement("div");
                        errorElement.classList.add("error-message", "text-danger", "mt-1");
                        errorElement.innerHTML = message;

                        input.parentNode.appendChild(errorElement);
                    } else {
                        input.classList.remove("is-invalid");
                    }
                }

                // Kiểm tra các trường nhập
                checkField(nhiemVu, "Vui lòng nhập công việc đã thực hiện.");
                checkField(moTaNhiemVu, "Vui lòng nhập kết quả đạt được.");

                // Nếu dữ liệu không hợp lệ, dừng xử lý tiếp theo
                if (!isValid) return;

                // Đóng modal cập nhật trước khi hiển thị modal xác nhận
                let bootstrapEditModal = bootstrap.Modal.getInstance(editModal);
                bootstrapEditModal.hide();

                setTimeout(() => {
                    confirmModal.show();
                }, 300); // Thêm độ trễ để đảm bảo modal cũ đóng hoàn toàn

                // Khi người dùng nhấn OK trong modal xác nhận
                document.getElementById('confirm-update-btn').onclick = function () {
                    confirmModal.hide();
                    form.submit(); // Gửi form sau khi xác nhận
                };
            });
        });
    });
</script>

<script src="{{ asset('js/scriptsAdmin.js') }}"></script>
</html>
