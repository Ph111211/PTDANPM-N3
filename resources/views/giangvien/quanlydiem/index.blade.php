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
    #chamDiem, #suaDiem{
        background-color: #87CEEB70;
    }
</style>
</html>

@extends('layouts.giangvien')

@section('title', 'Quản Lí điểm')

@section('content')
    <h3 class="mb-3 pt-3">Danh sách điểm</h3>
@if(session('success'))
    <div class="alert alert-success mt-3">{{ session('success') }}</div>
@endif

<table class="table">
    <thead class="table-secondary">
        <tr>
            <th>Mã sinh viên</th>
            <th>Tên đề tài</th>
            <th>Trạng thái</th>
            <th>Tổng điểm</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($doans as $doan)
            <tr>
                <td>{{ $doan->ma_sv }}</td> 
                <td>{{ $doan->tieu_de }}</td> 
                <td>
                    @if ($doan->diem_so !== null)
                        <span>Đã chấm điểm</span>
                    @else
                        <span>Chưa hoàn thành</span>
                    @endif
                </td>
                <td>{{ $doan->diem_so ?? 'Chưa có' }}</td>
                <td>
                    @if ($doan->diem_so === null)
                        <button type="button" class="btn btn-sm my-3 text-warning border-warning" id="chamDiem" 
                            data-bs-toggle="modal" data-bs-target="#chamDiemModal" 
                            data-masv="{{ $doan->ma_sv }}" data-tendetai="{{ $doan->tieu_de }}">
                            Chấm điểm
                        </button>
                    @else
                        <button type="button" class="btn btn-sm my-3 text-success border-success" id="suaDiem" 
                            data-bs-toggle="modal" data-bs-target="#suaDiemModal" 
                            data-masv="{{ $doan->ma_sv }}" data-tendetai="{{ $doan->tieu_de }}">
                            Sửa điểm
                        </button>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{-- Modal Chấm điểm --}}
<div class="modal fade" id="chamDiemModal" tabindex="-1" aria-labelledby="chamDiemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="chamDiemModalLabel">Chấm điểm</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('giangvien/quanlydiem.chamdiem') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Mã sinh viên</label>
                        <input type="text" class="form-control" name="masv" id="masvChamDiem" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tên đề tài</label>
                        <input type="text" class="form-control" name="ten_de_tai" id="tenDeTaiChamDiem" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Điểm</label>
                        <input type="number" class="form-control" name="diem_so" min="0" max="10"  step="0.1" required>
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

{{-- Modal Sửa điểm --}}
<div class="modal fade" id="suaDiemModal" tabindex="-1" aria-labelledby="suaDiemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="suaDiemModalLabel">Sửa điểm</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('giangvien/quanlydiem.suadiem') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Mã sinh viên</label>
                        <input type="text" class="form-control" name="masv" id="masvSuaDiem" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tên đề tài</label>
                        <input type="text" class="form-control" name="ten_de_tai" id="tenDeTaiSuaDiem" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Điểm</label>
                        <input type="number" class="form-control" name="diem_so" min="0" max="10"  step="0.1" required>
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
                document.getElementById("masvChamDiem").value = this.getAttribute("data-masv");
                document.getElementById("tenDeTaiChamDiem").value = this.getAttribute("data-tendetai");
            });
        });

        document.querySelectorAll("#suaDiem").forEach(button => {
            button.addEventListener("click", function() {
                document.getElementById("masvSuaDiem").value = this.getAttribute("data-masv");
                document.getElementById("tenDeTaiSuaDiem").value = this.getAttribute("data-tendetai");
            });
        });
    });
</script>

@endsection
