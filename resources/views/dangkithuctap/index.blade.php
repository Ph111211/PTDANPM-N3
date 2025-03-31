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

    .table {
        box-sizing: border-box;
        table-layout: fixed;
        text-align: center;
    }

    h3 {
        margin-left: 40%;
        padding-top: 20px;
    }

    #plus {
        background-color: white;
        color: white;
        padding: 7px 20px 7px 5px;
    }
</style>
</html>

@extends('layouts.sinhvien')

@section('title', 'Đăng kí thực tập')

@section('content')
    <h3 class="text-center m-5">Đăng kí thực tập</h3>

    <form action="{{ route('dangkithuctap.store') }}" method="POST" class="container">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tên sinh viên</label>
            <input type="text" class="form-control" id="ho_ten" name="ho_ten" placeholder="Nhập tên sinh viên">

        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tên doanh nghiệp</label>
            <input type="text" class="form-control" id="tendn" name="ten_dn" placeholder="Nhập tên doanh nghiệp">

        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Vị trí mong muốn</label>
            <input type="text" class="form-control" id="vi_tri" name="vi_tri" placeholder="Nhập vị trí mong muốn">

        </div>

        <div class="d-flex justify-content-around">
            <button type="cancel" class="btn btn-primary btn-danger">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x"
                     viewBox="0 0 16 16">
                    <path
                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                </svg>
                Hủy
            </button>
            <button type="submit" class="btn btn-primary btn-success" id="submit-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy"
                     viewBox="0 0 16 16">
                    <path d="M11 2H9v3h2z"/>
                    <path
                        d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z"/>
                </svg>
                Lưu
            </button>
        </div>

    </form>

@endsection

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.querySelector("form");
        const submitBtn = document.getElementById("submit-btn"); // dùng id ở đây

        submitBtn.addEventListener("click", function (event) {
            event.preventDefault();

            let isValid = true;

            // Lấy input
            const hoTen = document.getElementById("ho_ten");
            const tenDn = document.getElementById("tendn");
            const viTri = document.getElementById("vi_tri");

            // Xóa lỗi cũ
            document.querySelectorAll(".error-message").forEach(el => el.remove());

            function checkError(input, message) {
                if (input.value.trim() === "") {
                    isValid = false;
                    input.classList.add("is-invalid");

                    const error = document.createElement("div");
                    error.classList.add("error-message", "text-danger", "mt-1");
                    error.textContent = message;

                    input.parentNode.appendChild(error);
                } else {
                    input.classList.remove("is-invalid");
                }
            }

            checkError(hoTen, "Vui lòng nhập tên sinh viên.");
            checkError(tenDn, "Vui lòng nhập tên doanh nghiệp.");
            checkError(viTri, "Vui lòng nhập vị trí mong muốn.");

            if (isValid) {
                form.submit();
            }
        });
    });</script>
