<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đồ án</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Chi tiết đề tài</h2>
    <div class="p-4 border rounded shadow bg-white">
        <div class="mb-3">
            <label class="form-label">ID</label>
            <input type="text" class="form-control" value="{{ $doans->ma_do_an }}" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">Tên đồ án</label>
            <input type="text" class="form-control" value="{{ $doans->tieu_de }}" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">Ngày tạo</label>
            <input type="text" class="form-control" value="{{ date('d/m/Y', strtotime($doans->thoi_gian_bat_dau)) }}" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">Ngày đóng</label>
            <input type="text" class="form-control" value="{{ date('d/m/Y', strtotime($doans->thoi_gian_ket_thuc)) }}" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">Mô tả</label>
            <textarea class="form-control" readonly>{{ $doans->mo_ta }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Giảng viên phụ trách</label>
            <input type="text" class="form-control" value="{{ $doans->giangVien->ho_ten ?? 'Không có' }}" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">Trạng thái</label>
            <input type="text" class="form-control" value="{{ $doans->trang_thai }}" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">SL tối đa</label>
            <input type="text" class="form-control" value="10" readonly>
        </div>
        <div class="d-flex justify-content-end">
            <a href="{{ route('giangvien/quanlydetai.index') }}" class="btn btn-danger">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="mb-1">
                    <path d="M18 6L6 18" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M6 6L18 18" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>Thoát</a>
        </div>
    </div>
</div>
</body>
</html>
