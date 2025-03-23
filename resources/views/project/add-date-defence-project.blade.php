@extends('layouts.app')

@section('content')
<div class="container " style="width:1000px;height:650px;">
    <h1 style="text-align: center;">Lên lịch bảo vệ</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mã</th>
                <th>Họ và tên</th>
                <th>Lớp</th>
                <th>Đề tài</th>
                <th>Giảng viên</th>
                <th>Lên lịch</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr>
            <td>{{ $project->code }}</td>
            <td>{{ $project->student_name }}</td>
            <td>{{ $project->class }}</td>
            <td>{{ $project->topic }}</td>
            <td>{{ $project->lecturer }}</td>
            <td><button class="btn btn-primary">+</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
@endsection