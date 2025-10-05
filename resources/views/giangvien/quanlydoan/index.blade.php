<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>`
</head>
<body>
    
</body>
<style>
    
    .table{
    box-sizing: border-box;
    table-layout: fixed;
    text-align: center;
    }
    #chamDiem, #xemDoAn{
        background-color: #87CEEB70;
    }
</style>
</html>

@extends('layouts.giangvien')

@section('title', 'Quản Lý Đồ án')

@section('content')
<div class="d-flex mb-3 pt-3 justify-content-between">
    <h3>Thông tin đồ án</h3>
   <a href="{{ route('giangvien/quanlydoan.lichnop') }}" class="btn btn-primary">Lịch nộp đồ án</a>
</div>
@if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
@endif
<table class="table">
    <thead class="table-secondary">
        <tr>
            <th>Mã sinh viên</th>
            <th>Tên đồ án</th>
            <th>Trạng thái</th>
            <th>Xem đồ án</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($doans as $doan)
            <tr>
                <td>{{ $doan->ma_sv }}</td> 
                <td>{{ $doan->tieu_de }}</td> 
                <td>
                    <form action="{{ route('doan.capnhat') }}" method="POST">
                    @csrf
                    <input type="hidden" name="ma_sv" value="{{ $doan->ma_sv }}">
                        <select name="trang_thai" class="form-control" onchange="this.form.submit()">
                        <option value="Chưa hoàn thành" {{ optional($doan)->trang_thai == 'Chưa hoàn thành' ? 'selected' : '' }}>Chưa hoàn thành</option>
                            <option value="Chậm tiến độ" {{ optional($doan)->trang_thai == 'Chậm tiến độ' ? 'selected' : '' }}>Chậm tiến độ</option>
                            <option value="Cảnh cáo lần 1" {{ optional($doan)->trang_thai == 'Cảnh cáo lần 1' ? 'selected' : '' }}>Cảnh cáo lần 1</option>
                            <option value="Cảnh cáo lần 2" {{ optional($doan)->trang_thai == 'Cảnh cáo lần 2' ? 'selected' : '' }}>Cảnh cáo lần 2</option>
                            <option value="Đã chấm điểm" {{ optional($doan)->trang_thai == 'Đã chấm điểm' ? 'selected' : '' }}>Đã chấm điểm</option>
                            <option value="Hủy đồ án" {{ optional($doan)->trang_thai == 'Hủy đồ án' ? 'selected' : '' }}>Hủy đồ án</option>
                        </select>
                    </form>
                </td>
                <td>
                    <a href="{{ route('giangvien/quanlydoan.show', ['id' => $doan->ma_do_an])  }}" class="btn btn-sm my-3" id="xemDoAn">
                    Xem đồ án</a>
                </td>
                <td>
                    <button type="button" class="btn btn-sm my-3 text-warning border-warning" id="chamDiem" data-bs-toggle="modal" data-bs-target="#chamDiemModal" 
                        data-masv="{{ $doan->ma_sv }}" data-tendetai="{{ $doan->tieu_de }}">
                    Chấm điểm</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="modal fade" id="chamDiemModal" tabindex="-1" aria-labelledby="chamDiemModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="chamDiemModalLabel">Chấm điểm</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('giangvien/quanlydoan.chamdiem') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label class="form-label">Mã sinh viên</label>
            <input type="text" class="form-control" name="masv" id="masv" readonly>
          </div>
          <div class="mb-3">
            <label class="form-label">Tên đề tài</label>
            <input type="text" class="form-control" name="ten_de_tai" id="tenDeTai" readonly>
          </div>
          <div class="mb-3">
            <label class="form-label">Điểm</label>
            <input type="number" class="form-control" name="diem" min="0" max="10" required>
            <span class="text-danger d-none" id="error">* Điểm phải từ 0 đến 10!</span>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">❌ Hủy</button>
            <button type="submit" class="btn btn-success">💾 Lưu</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll("#chamDiem").forEach(button => {
            button.addEventListener("click", function() {
                document.getElementById("masv").value = this.getAttribute("data-masv");
                document.getElementById("tenDeTai").value = this.getAttribute("data-tendetai");
            });
        });
    });
</script>

@endsection