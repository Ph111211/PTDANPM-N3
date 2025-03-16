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
</head>
<body>
    
</body>
<style>
    
    .table{
    box-sizing: border-box;
    table-layout: fixed;
    text-align: center;
    }
    h3{
        margin-left: 40%;
        padding-top: 20px;
    }
    #plus{
        background-color: #003C75;
        color: white;
        padding: 7px 20px 7px 5px;
    }
</style>
</html>

@extends('layouts.app')

@section('title', 'Quản Lí Sinh Viên')

@section('content')
<h3 class="text-center m-5">Quản lí giảng viên</h3>

<button type="button" class="btn btn-sm my-4" id="plus" data-toggle="modal" data-target="#addModal">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="28" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
    </svg> &nbsp;Thêm 
</button>

@include('giangviens.createmodal')

<table class="table">
    <thead class="table-secondary">
        <tr>
            <th>Mã</th>
            <th>Họ và tên</th>
            <th>Email</th>
            <th>Khoa</th>
            <th>Số điện thoại</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>
@endsection