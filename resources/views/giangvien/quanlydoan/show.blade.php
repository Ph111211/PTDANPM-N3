<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/docx-preview@1.7.2/dist/docx-preview.min.js"></script>
</head>
<body>
    
</body>
<style>
    
    .content{
    box-sizing: border-box;
    table-layout: fixed;
    height: 750px;
    }
</style>
</html>

@extends('layouts.giangvien')

@section('title', 'Quản Lí Đồ án')

@section('content')
    <div class="content">
    <h6 class="pt-3 my-3">Đồ án: {{ $doans->tieu_de }}</h6>
    <div>
        <iframe src="https://docs.google.com/document/d/1pvRsGVHVdh7Ai85I3T1uXbCKyMjhWUGMLJIBWz1c2SM/preview" width="100%" height="530px"></iframe>
    </div>
    <div class="d-flex justify-content-between">
        <button type="button" class="btn btn-sm btn-info my-4 px-3" data-bs-toggle="modal" data-bs-target="#chamDiemModal" data-userid="{{ $doans->ma_do_an }}">
        Nhận xét</button>
        <a href="{{ route('giangvien/quanlydoan.index') }}" class="btn my-4 px-3"><< Trở về trang chủ quản lý đồ án</a>
    </div>
    </div>
@endsection