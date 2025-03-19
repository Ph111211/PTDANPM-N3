<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lịch </title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
@extends('layouts.app')

@section('title', 'Kết quả thực tập')

@section('content')
<div class="container-xl">

        <div class="table-responsive">
        <div class="table-wrapper">
            <div>
                <div class="row mb-3">
                    <div class="row mb-3 d-flex justify-content-between align-items-center">
                        <h1 class="fw-bold text-center" style="color: #000000">Kết quả thực tập</h1>
                    </div>
                </div>
            </div>
            <table class="table table-hover">
                <thead class="table-secondary">
                <tr>
                    <th>Mã SV</th>
                    <th>Họ và tên</th>
                    <th>Doanh nghiệp</th>
                    <th>Kết quả</th>
                    <th>Hành động</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

</div>
@endsection
</body>
<script>
    var successMessage = "{{ session('success') }}";
</script>
<script src="{{ asset('js/scriptsAdmin.js') }}"></script>
</html>
