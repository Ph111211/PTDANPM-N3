@php
    $tieuDeMacDinh = [
        "Ứng dụng trí tuệ nhân tạo trong nhận diện khuôn mặt",
        "Xây dựng hệ thống quản lý sinh viên bằng Laravel",
        "Phát triển ứng dụng di động đặt vé xe khách",
        "Nghiên cứu và ứng dụng Blockchain trong quản lý chuỗi cung ứng",
        "Phát triển chatbot hỗ trợ khách hàng sử dụng AI"
    ];
@endphp

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <title>Đăng ký đề tài</title>
</head>
<body>

</body>

@extends('layouts.sinhvien')

@section('title', 'Đăng ký đề tài')

@section('content')
    <form class="m-lg-auto" style="width: 100%" action="{{ route('doan.store') }}" method="POST">
        @csrf <div class="d-grid justify-content-center align-items-center" style="height: 80vh; background: #f8f9fa;">
            <div class="card shadow p-4" style="width: 600px; border-radius: 10px;">
                <h4 class="fw-bold text-center">Đăng ký đề tài</h4>

                <div class="form-group mb-3">
                    <label for="tieu_de" class="fw-bold">Danh sách đề tài khả dụng</label>
                    <select class="form-control" name="tieu_de" id="tieu_de">
                        <option value="">-- Chọn đề tài đồ án --</option>
                        @foreach ($tieuDeMacDinh as $tieuDe)
                            <option value="{{ $tieuDe }}">{{ $tieuDe }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="giang_vien" class="fw-bold">Giảng viên hướng dẫn</label>
                    <select class="form-control" name="ma_gv" id="giang_vien">
                        <option value="">Giảng viên hướng dẫn khả dụng!</option>
                        @foreach($giangviens as $gv)
                            <option value="{{ $gv->user_id }}">{{ $gv->ho_ten }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="thoi_gian_thuc_tap" class="fw-bold">Thời gian thực tập</label>
                    <input type="date" class="form-control" id="thoi_gian_thuc_tap" name="thoi_gian_bat_dau">
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="reset" class="btn btn-danger px-4 d-flex align-items-center">
                        <i class="fas fa-times me-2"></i> Hủy
                    </button>

                    <button type="submit" class="btn btn-success px-4 d-flex align-items-center" onclick="submitCreateForm1()">
                        <i class="fas fa-save me-2"></i> Xác nhận đăng ký
                    </button>
                </div>

                <!-- Modal xác nhận trước khi nộp -->
                <div class="modal fade" id="confirmModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content text-center shadow-lg" style="border-radius: 10px;">
                            <div class="modal-body">
                                <h4 class="fw-bold">Bạn có chắc chắn muốn nộp báo cáo?</h4>
                                <button type="button" id="confirm-ok-btn" class="btn style-button px-4 py-2">
                                    <i class="bi bi-check-lg me-2"></i> OK
                                </button>
                                <button type="button" class="btn m-3 style-button px-4 py-2" data-bs-dismiss="modal">
                                    Hủy
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal thông báo đã nộp báo cáo -->
                <div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content text-center shadow-lg" style="border-radius: 10px;">
                            <div class="modal-body">
                                <h4 class="fw-bold text-success">Đăng ký đề tài thành công!</h4>
                                <button type="button" id="success-ok-btn" class="btn btn-success d-flex align-items-center justify-content-center mx-auto px-4 py-2"
                                        data-bs-dismiss="modal" aria-label="Close" style="border-radius: 8px;">
                                    <i class="bi bi-check-lg me-2"></i> OK
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>

@endsection
<script>
    function submitCreateForm1() {
        document.querySelector('form').submit(); // Submit form
    }
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelector("button[type='submit']").addEventListener("click", function (event) {
            event.preventDefault(); // Ngăn chặn submit ngay lập tức

            let isValid = true;

            // Lấy giá trị các trường
            let tieuDe = document.getElementById("tieu_de");
            let giangVien = document.getElementById("giang_vien");
            let thoiGian = document.getElementById("thoi_gian_thuc_tap");

            // Xóa thông báo lỗi cũ
            document.querySelectorAll(".error-message").forEach(e => e.remove());

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
            checkField(tieuDe, "Vui lòng chọn đề tài.");
            checkField(giangVien, "Vui lòng chọn giảng viên.");
            checkField(thoiGian, "Vui lòng nhập thời gian thực tập.");

            // Nếu hợp lệ, hiển thị modal xác nhận
            if (isValid) {
                // Hiển thị modal xác nhận trước khi nộp báo cáo
                let confirmModal = new bootstrap.Modal(document.getElementById('confirmModal'));
                confirmModal.show();

                document.getElementById('confirm-ok-btn').onclick = function () {
                    confirmModal.hide();

                    // Hiển thị modal thông báo thành công
                    let successModal = new bootstrap.Modal(document.getElementById('successModal'));
                    successModal.show();

                };
            }
        });
    });

</script>
