<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
<style>
    h3{
        margin-left: 40%;
        padding-top: 20px;
    }
    .stat-button {
            background-color: #003366;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
    }
    .stat-card {
            border-radius: 8px;
            padding: 20px;
            background: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
    .form-check-label {
            font-size: 1.1rem;
            margin-right: 20px;
        }
    .form-control, .btn-primary {         
            border-radius: 6px;
        }
    .btn-primary {
            width: 250px !important;
            background-color: #003366 !important;
            border: none !important;
        }
    .btn-primary:hover {
            background-color: #00A366 !important;
        }
    .table{
            box-sizing: border-box;
            table-layout: fixed;
            text-align: center;
            display: none;
    }
</style>
</html>

@extends('layouts.app')

@section('title', 'Thống kê')

@section('content')
<h3 class="text-center m-4">Thống kê đề tài, tiến độ điểm số</h3>
<div class="container mt-4">
    <div class="card p-4 shadow-sm">
        <h5 class="fw-bold">Tiêu chí thống kê</h5>
        <div class="d-flex flex-wrap align-items-center gap-3 mt-3">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="criteria" id="student">
                <label class="form-check-label" for="student">
                    Theo sinh viên
                </label>
            </div>
            <div class="form-check mx-3">
                <input class="form-check-input" type="radio" name="criteria" id="teacher">
                <label class="form-check-label" for="teacher">
                    Theo giảng viên hướng dẫn
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="criteria" id="topic">
                <label class="form-check-label" for="topic">
                    Theo đề tài
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="criteria" id="topic">
                <label class="form-check-label" for="topic">
                    Theo khoá học
                </label>
            </div>
            <div class="mt-3 d-flex">
                <select class="form-select me-2" id="select-criteria">
                    <option selected disabled>-- Chọn tiêu chí tìm kiếm --</option>
                    <option value="option1">Mã số</option>
                    <option value="option2">Tên</option>
                    <option value="option3">Ngày bắt đầu</option>
                    <option value="option4">Ngày kết thúc</option>
            </div>
            <input type="text" class="form-control ms-2" placeholder="Từ khóa tìm kiếm..." id="search-input">
            <button type="button" class="btn btn-primary ms-2" id="search-btn">Thống kê</button>
        </div>
    </div>
</div>
<div class="table-container">
<table class="table">
    <thead class="table-secondary">
        <tr>
            <th>Mã</th>
            <th>Họ và tên</th>
            <th>Lớp</th>
            <th>Đề tài</th>
            <th>Giảng viên</th>
            <th>Tiến độ</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sinhviens as $sinhvien)
            <tr>
                <td>{{ $sinhvien->ma_sv }}</td>
                <td>{{ $sinhvien->ho_ten }}</td>
                <td>{{ $sinhvien->lop }}</td>
                <td>{{ optional($sinhvien->doAn)->tieu_de ?? 'Chưa có' }}</td>
                <td>{{ optional($sinhvien->giangVien)->ho_ten ?? 'Chưa có giảng viên' }}</td>
                <td class="{{ optional($sinhvien->doAn)->trang_thai == 'Hoàn thành' ? 'text-success' : 'text-danger' }}">
                    {{ optional($sinhvien->doAn)->trang_thai ?? 'Chưa hoàn thành' }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
<script>
document.addEventListener("DOMContentLoaded", function () {
    let table = document.querySelector(".table");
    let radioButtons = document.querySelectorAll('input[name="filter"]');
    let searchInput = document.getElementById("search-input");
    let searchBtn = document.getElementById("search-btn");
    let tableContainer = document.querySelector(".table");

    // Mặc định ẩn bảng khi tải trang
    tableContainer.style.display = "none";

    radioButtons.forEach(radio => {
        radio.addEventListener("change", function () {
            if (this.id === "student") {
                searchInput.placeholder = "Nhập mã sinh viên...";
            } else if (this.id === "teacher") {
                searchInput.placeholder = "Nhập tên giảng viên...";
            } else if (this.id === "topic") {
                searchInput.placeholder = "Nhập tên đề tài...";
            } else if (this.id === "course") {
                searchInput.placeholder = "Nhập khóa học...";
            }
        });
    });

    searchBtn.addEventListener("click", function () {
        let keyword = searchInput.value.trim().toLowerCase();
        let selectedValue = document.querySelector('input[name="criteria"]:checked');

        if (!selectedValue) {
            alert("Vui lòng chọn tiêu chí thống kê!");
            return;
        }

        if (keyword === "") {
            alert("Vui lòng nhập từ khóa tìm kiếm...");
            return;
        }

        let tableBody = document.querySelector("tbody");
        let rows = document.querySelectorAll("tbody tr");
        let found = false;

        rows.forEach(row => {
            let columns = row.getElementsByTagName("td");
            let matchFound = false;
            if (selectedValue.id === "student" && rows[0]) {
                found = rows[0].textContent.includes(keyword);
            } else if (selectedValue === "teacher" && rows[4]) {
                found = rows[4].textContent.includes(keyword);
            } else if (selectedValue === "topic" && rows[3]) {
                found = rows[3].textContent.includes(keyword);
            } else if (selectedValue === "course" && rows[2]) {
                found = rows[2].textContent.includes(keyword);
            }

            rows.forEach(row => row.style.display = "none");

            if (found) {
                table.classList.remove("hidden");
                rows.forEach(row => {
                    if (row.textContent.includes(keyword)) {
                        row.style.display = "";
                    } else {
                        row.style.display = "none";
                    }
                });
            } else {
                table.classList.add("hidden");
            }
        });
});
</script>
