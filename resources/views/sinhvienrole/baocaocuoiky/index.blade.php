<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
</head>
<body>

</body>


@extends('layouts.sinhvien')

@section('title', 'Giảng viên hướng dẫn')

@section('content')
    <form class="m-lg-auto " style="width: 100%">

        <div class="d-grid justify-content-center align-items-center" style="height: 80vh; background: #f8f9fa;">
            <div class="card shadow p-4" style="width: 600px; border-radius: 10px;">
                <h4 class="fw-bold text-center">Báo cáo cuối kỳ</h4>

                <div class="form-group mb-3">
                    <label for="fileInput" class="fw-bold">Tải file từ máy tính</label>
                    <input type="file" class="form-control" id="fileInput" accept=".txt">
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" id ="cancel-btn  "class="btn btn-danger px-4 d-flex align-items-center">
                        <i class="fas fa-times me-2"></i> Hủy
                    </button>

                    <button type="submit" id="save-btn" class="btn btn-success px-4 d-flex align-items-center">
                        <i class="fas fa-save me-2"></i> Nộp báo cáo
                    </button>
                    <!-- Modal thông báo đã nộp báo cáo -->
                    <div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content text-center shadow-lg" style="border-radius: 10px;">
                                <div class="modal-body">
                                    <h4 class="fw-bold text-success">Nộp báo cáo thành công!</h4>
                                    <button type="button" id="success-ok-btn" class="btn btn-success d-flex align-items-center justify-content-center mx-auto px-4 py-2"
                                            data-bs-dismiss="modal" aria-label="Close" style="border-radius: 8px;">
                                        <i class="bi bi-check-lg me-2"></i> OK
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal cảnh báo khi chưa chọn file -->
                    <div class="modal fade" id="warningModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content text-center shadow-lg" style="border-radius: 10px;">
                                <div class="modal-body">
                                    <h4 class="fw-bold text-danger">Vui lòng chọn một tệp trước khi lưu!</h4>
                                    <button type="button" id="warning-ok-btn" class="btn btn-danger px-4 py-2"
                                            data-bs-dismiss="modal" aria-label="Close">
                                        OK
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>

@endsection
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById('save-btn').addEventListener('click', function (event) {
            event.preventDefault(); // Ngăn chặn submit form mặc định

            let fileInput = document.getElementById('fileInput');

            // Kiểm tra nếu người dùng chưa chọn file
            if (!fileInput.files.length) {
                let warningModal = new bootstrap.Modal(document.getElementById('warningModal'));
                warningModal.show();
                return;
            }

            // Hiển thị modal thông báo thành công
            let successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();

            // Chuyển hướng sau 5 giây
            setTimeout(function () {
                window.location.href = "{{ route('baocaocuoiky.index') }}";
            }, 5000);
        });

        // Xử lý khi nhấn nút Hủy
        document.getElementById('cancel-btn').addEventListener('click', function () {
            window.location.href = "{{ route('baocaocuoiky.index') }}";
        });
    });


</script>
