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
@endsection
