<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm đề tài</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .error-text { color: red; font-size: 14px; }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Thêm đề tài</h2>
    <form action="{{ route('giangvien/quanlydetai.store') }}" method="POST" class="p-4 border rounded shadow bg-white">
        @csrf

        <!-- Tên đề tài -->
        <div class="mb-3">
            <label class="form-label">Tên đề tài:</label>
            <input type="text" name="tieu_de" class="form-control @error('tieu_de') is-invalid @enderror" value="{{ old('tieu_de') }}" required>
            @error('tieu_de')
                <p class="error-text">* {{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Ngày mở:</label>
            <input type="date" name="thoi_gian_bat_dau" class="form-control @error('thoi_gian_bat_dau') is-invalid @enderror" value="{{ old('thoi_gian_bat_dau') }}" required>
            @error('thoi_gian_bat_dau')
                <p class="error-text">* {{ $message }}</p>
            @enderror
        </div>
        <!-- Ngày đóng -->
        <div class="mb-3">
            <label class="form-label">Ngày đóng:</label>
            <input type="date" name="thoi_gian_ket_thuc" class="form-control @error('thoi_gian_ket_thuc') is-invalid @enderror" value="{{ old('thoi_gian_ket_thuc') }}" required>
            @error('thoi_gian_ket_thuc')
                <p class="error-text">* {{ $message }}</p>
            @enderror
        </div>

        <!-- Mô tả -->
        <div class="mb-3">
            <label class="form-label">Mô tả:</label>
            <textarea name="mo_ta" class="form-control @error('mo_ta') is-invalid @enderror">{{ old('mo_ta') }}</textarea>
            @error('mo_ta')
                <p class="error-text">* {{ $message }}</p>
            @enderror
        </div>
        <!-- Trạng thái -->
        <div class="mb-3">
            <label class="form-label">Trạng thái:</label>
            <select name="trang_thai" class="form-select">
                <option value="Đang mở" {{ old('trang_thai') == 'Đang mở' ? 'selected' : '' }}>Đang mở</option>
                <option value="Đóng" {{ old('trang_thai') == 'Đóng' ? 'selected' : '' }}>Đóng</option>
            </select>
        </div>

        <!-- Nút Hủy và Lưu -->
        <div class="d-flex justify-content-between">
            <a href="{{ route('giangvien/quanlydetai.index') }}" class="btn btn-danger">
                <i class="bi bi-x-circle"></i> Hủy
            </a>
            <button type="submit" class="btn btn-success">
                <i class="bi bi-save"></i> Lưu
            </button>
        </div>
    </form>
</div>
</body>
</html>
