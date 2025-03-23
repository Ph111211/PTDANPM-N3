<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Issue</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    .form-control{
        background-color: #E7E9EE;
    }
</style>
<body>
<div class="container">
    <h2>Chỉnh sửa sinh viên</h2>
    <form action="{{ route('sinhviens.update', $sinhvien->user_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Họ và tên</label>
            <input type="text" name="ho_ten" class="form-control" value="{{ $sinhvien->ho_ten }}" required>
        </div>
        <div class="mb-3">
            <label for="ngay_sinh" class="form-label">Ngày Sinh<span class="text-danger">&nbsp;*</span></label>
            <input type="date" name="ngay_sinh" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Giới Tính<span class="text-danger">&nbsp;*</span></label>
            <select name="gioi_tinh" class="form-control" value="{{ $sinhvien->gioi_tinh }}"required>
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Lớp</label>
            <input type="text" name="lop" class="form-control" value="{{ $sinhvien->lop }}" required>
        </div>
        <div class="mb-3">
            <label for="sdt" class="form-label">Số Điện Thoại<span class="text-danger">&nbsp;*</span></label>
            <input type="text" name="sdt" class="form-control" value="{{ $sinhvien->sdtsdt }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email<span class="text-danger">&nbsp;*</span></label>
            <input type="email" name="email" class="form-control" value="{{ $sinhvien->email }}" required>
        </div>

        <div class="mb-3">
            <label for="dia_chi" class="form-label">Địa Chỉ<span class="text-danger">&nbsp;*</span></label>
            <textarea name="dia_chi" class="form-control" required></textarea>
        </div>
    
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('sinhviens.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
</body>