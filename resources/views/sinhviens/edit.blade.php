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
    <form action="{{ route('sinhviens.update', $sinhvien->ma_sv) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Họ và tên</label>
            <input type="text" name="ho_ten" class="form-control" value="{{ $sinhvien->ho_ten }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Lớp</label>
            <input type="text" name="lop" class="form-control" value="{{ $sinhvien->lop }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Đề tài</label>
            <input type="text" name="tieu_de" class="form-control" value="{{ optional($sinhvien->doAn)->tieu_de }}">
        </div>
        <div class="mb-3">
            <label for="ma_gv" class="form-label">Giảng Viên Hướng Dẫn<span class="text-danger">&nbsp;*</span></label>
            <select name="ma_gv" class="form-control">
                @foreach($giangViens as $gv)
                    <option value="{{ $gv->ma_gv }}">{{ $gv->ho_ten }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Trạng thái</label>
            <select name="trang_thai" class="form-select">
                <option value="Chưa hoàn thành" {{ optional($sinhvien->doAn)->trang_thai == 'Chưa hoàn thành' ? 'selected' : '' }}>Chưa hoàn thành</option>
                <option value="Hoàn thành" {{ optional($sinhvien->doAn)->trang_thai == 'Hoàn thành' ? 'selected' : '' }}>Hoàn thành</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('sinhviens.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
</body>