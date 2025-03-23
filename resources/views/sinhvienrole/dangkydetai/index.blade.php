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
                        <option value="">Chọn giảng viên!</option>
                        @foreach($giangviens as $gv)
                            <option value="{{ $gv->user_id }}">{{ $gv->ho_ten }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="thoi_gian_thuc_tap" class="fw-bold">Thời gian thực tập</label>
                    <input type="date" class="form-control" id="thoi_gian_thuc_tap" name="thoi_gian_bat_dau">
                </div>

                <div class="form-group mb-3">
                    <label for="nhan_xet" class="fw-bold">Các yêu cầu khác</label>
                    <input class="form-control" name="nhan_xet" id="nhan_xet" placeholder="Các yêu cầu từ giảng viên">
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="reset" class="btn btn-danger px-4 d-flex align-items-center">
                        <i class="fas fa-times me-2"></i> Hủy
                    </button>

                    <button type="submit" class="btn btn-success px-4 d-flex align-items-center" onclick="submitCreateForm1()">
                        <i class="fas fa-save me-2"></i> Lưu
                    </button>
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
