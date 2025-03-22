<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa đề tài</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .error-text { color: red; font-size: 14px; }
        .form-label{
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Sửa đề tài</h2>
    <form action="{{ route('giangvien/quanlydetai.update', ['id' => $doans->ma_do_an]) }}" method="POST" class="p-4 border rounded shadow bg-white">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Tên đề tài:</label>
            <input type="text" name="tieu_de" class="form-control @error('tieu_de') is-invalid @enderror" value="{{ $doans->tieu_de }}" required>
            @error('tieu_de')
                <p class="error-text">* {{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Ngày mở:</label>
            <input type="date" name="thoi_gian_bat_dau" class="form-control @error('thoi_gian_bat_dau') is-invalid @enderror" value="{{ $doans->thoi_gian_bat_dau }}" required>
            @error('thoi_gian_bat_dau')
                <p class="error-text">* {{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Ngày đóng:</label>
            <input type="date" name="thoi_gian_ket_thuc" class="form-control @error('thoi_gian_ket_thuc') is-invalid @enderror" value="{{ $doans->thoi_gian_ket_thuc }}" required>
            @error('thoi_gian_ket_thuc')
                <p class="error-text">* {{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Mô tả:</label>
            <textarea name="mo_ta" class="form-control @error('mo_ta') is-invalid @enderror">{{ $doans->mo_ta }}</textarea>
            @error('mo_ta')
                <p class="error-text">* {{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Trạng thái:</label>
            <select name="trang_thai" class="form-select">
                <option value="Đang mở" {{ $doans->trang_thai == 'Đang mở' ? 'selected' : '' }}>Đang mở</option>
                <option value="Đóng" {{ $doans->trang_thai == 'Đóng' ? 'selected' : '' }}>Đóng</option>
            </select>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('giangvien/quanlydetai.index') }}" class="btn btn-danger"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="mb-1 me-1">
                    <path d="M18 6L6 18" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M6 6L18 18" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>Hủy</a>
            <button type="submit" class="btn btn-success">
                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg" class="mb-1 me-1">
                    <path d="M15.2898 3.50977C15.8174 3.51728 16.3206 3.73294 16.6898 4.10977L20.4898 7.90977C20.8667 8.27903 21.0823 8.78223 21.0898 9.30977V19.5098C21.0898 20.0402 20.8791 20.5489 20.5041 20.924C20.129 21.2991 19.6203 21.5098 19.0898 21.5098H5.08984C4.55941 21.5098 4.0507 21.2991 3.67563 20.924C3.30056 20.5489 3.08984 20.0402 3.08984 19.5098V5.50977C3.08984 4.97933 3.30056 4.47062 3.67563 4.09555C4.0507 3.72048 4.55941 3.50977 5.08984 3.50977H15.2898Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M17.0898 21.5098V14.5098C17.0898 14.2445 16.9845 13.9902 16.797 13.8027C16.6094 13.6151 16.3551 13.5098 16.0898 13.5098H8.08984C7.82463 13.5098 7.57027 13.6151 7.38274 13.8027C7.1952 13.9902 7.08984 14.2445 7.08984 14.5098V21.5098" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M7.08984 3.50977V7.50977C7.08984 7.77498 7.1952 8.02934 7.38274 8.21687C7.57027 8.40441 7.82463 8.50977 8.08984 8.50977H15.0898" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>Lưu</button>
        </div>
    </form>
</div>
</body>
</html>
