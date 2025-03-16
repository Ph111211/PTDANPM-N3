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

    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">

    <script src="https://kit.fontawesome.com/18d4f96257.js" crossorigin="anonymous"></script>
</head>
<body>
    
</body>
<style>
    
    .table{
        box-sizing: border-box;
        table-layout: fixed;
        text-align: center;
        width: 100%;
        border-collapse: collapse;
      
    }

    th, td {
            border: 1px solid #ccc;
            padding: 8px;
    }

    th {
            background-color: #87CEEB;
            font-weight: bold;
    }

    h3{
        margin-left: 40%;
        padding-top: 20px;
    }


    .table {
    width: 100%; 
    table-layout: auto;  
    border-collapse: collapse;  
}

    .table th, .table td {
        padding: 8px;
        border: 1px solid #ccc;
        vertical-align: middle;
        max-width: 200px;  
        overflow: hidden;
      
    }

    .dt_table_icon {
        border-radius: 4px;
        padding: 8px;
        background-color: #87CEEB;
    }

    .pagination {
        display: flex;
        justify-content: center;
        padding: 10px;
    }

    .pagination .page-item .page-link {
        padding: 10px 15px;
        margin: 0 5px;
        background-color: #007BFF;
        color: white;
        border-radius: 6px;
        border: none;
        transition: 0.3s;
    }

    .pagination .page-item .page-link:hover {
        background-color: #0056b3;
    }

    .pagination .active .page-link {
        background-color: #0056b3;
    }

</style>
</html>

@extends('layouts.app')

 

@section('content')
<div class ="flex_dis">
    <h3 class="text-center m-5" style="margin: 0px !important;padding: 0px;">Danh sách đề tài</h3>

    <button type="button" style="background-color: #01eb47;" class="btn btn-sm my-4" id="plus" data-toggle="modal" data-target="#addModal">
        <i style="padding: 8px 0px;" class="fa-solid fa-plus"></i>
        &nbsp;<span style="color: #fff">Thêm mới</span> 
    </button>
</div>



<table class="table">
    <thead class="table-secondary">
        <tr>
            <th>ID</th>
            <th>Tên Đề Tài</th>
            <th>Mô Tả</th>
            <th>SL Tối Đa</th>
            <th>SL Hiện Tại</th>
            <th>Trạng Thái</th>
            <th>Hành động</th>
            <th>Phân công</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($deTais as $deTai)
            <tr>
                <td >{{ $deTai->id }}</td>
                <td >{{ $deTai->ten_de_tai }}</td>
                <td >{{ $deTai->mo_ta }}</td>
                <td >{{ $deTai->so_luong_toi_da }}</td>
                <td >{{ $deTai->so_luong_hien_tai }}</td>
                <td >
                    
                        {{ $deTai->trang_thai }}
                    
                </td>
                <td >
                    <div style="display: flex;
                                width: 100%;
                                justify-content: space-evenly;" >
                        <div><i class="fa-solid fa-eye dt_table_icon"></i></div>
                        <div><i class="fa-solid fa-pen-to-square dt_table_icon"></i></div>
                        <div><i class="fa-solid fa-trash dt_table_icon"></i></div>
                    </div>
                </td>
                <td >
                    <div><i style="padding: 8px 32px;" class="fa-solid fa-plus dt_table_icon"></i></div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection