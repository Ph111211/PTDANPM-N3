<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, initial-scale=1.0">
    
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            background: #003C75;
        }
        .custom-container {
            width: 100%;
            height: 100%;
        }
    </style>
    <style>
        .custom-container {
            width: 1440px;
            height: 950px;
            position: relative;
            background: #003C75;
            overflow: hidden;
        }
        .custom-card {
            width: 650px;
            height: 731px;
            left: 400px;
            top: 80px;
            position: absolute;
            background: white;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            border-radius: 30px;
            outline: 1px black solid;
            outline-offset: -1px;
        }
        .custom-logo {
            width: 164px;
            height: 135px;
            left: 265px;
            top: 20px;
            position: absolute;
        }
        .custom-title {
            width: 953px;
            height: 60px;
            left: 112px;
            top: 177px;
            position: absolute;
            color: #003C75;
            font-size: 24px;
            font-family: Inter;
            font-weight: 400;
            word-wrap: break-word;
        }
        .custom-subtitle {
            width: 454px;
            height: 26px;
            left: 186px;
            top: 219px;
            position: absolute;
            color: black;
            font-size: 20px;
            font-family: Inter;
            font-weight: 400;
            word-wrap: break-word;
            text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        }
        .custom-input {
            width: 468px;
            height: 68px;
            left: 125px;
            position: absolute;
            background: #F0F0F0;
            overflow: hidden;
            border-radius: 10px;

        }
        .custom-input-text {
            width: 265px;
            height: 32px;
            left: 27px;
            top: 18px;
            position: absolute;
            opacity: 0.50;
            color: black;
            font-size: 25px;
            font-family: Inter;
            font-weight: 400;
            word-wrap: break-word;
        }
        .custom-button {
            width: 468px;
            height: 68px;
            left: 125px;
            top: 514px;
            position: absolute;
            background: #003C75;
            overflow: hidden;
            border-radius: 10px;
        }
        .custom-button-text {
            width: 222px;
            height: 32px;
            left: 122px;
            top: 18px;
            position: absolute;
            color: white;
            font-size: 25px;
            font-family: Inter;
            font-weight: 400;
            word-wrap: break-word;
        }
        .custom-forgot-password {
            width: 208px;
            height: 38px;
            left: 255px;
            top: 603px;
            position: absolute;
            color: black;
            font-size: 25px;
            font-family: Inter;
            font-weight: 400;
            word-wrap: break-word;
        }
        .custom-alert {
            background-color: #ff4d4d; /* Màu nền đỏ đậm */
            color: white; /* Màu chữ trắng */
            border: 1px solid #cc0000; /* Viền đỏ đậm */
            border-radius: 5px; /* Bo góc */
            padding: 10px; /* Khoảng cách bên trong */
            font-size: 18px; /* Kích thước chữ */
            text-align: center; /* Căn giữa nội dung */
            margin-top: 20px; /* Khoảng cách phía trên */
        }
    </style>
</head>
<body>
    <div class="custom-container">
        <div class="custom-card">
            <img class="custom-logo" src="{{ asset('images/logo.png') }}" />
            <div class="custom-title">
                <span>HỆ THỐNG QUẢN LÝ ĐỒ ÁN VÀ THỰC TẬP<br/></span>
                <span><br/></span>
            </div>
            <div class="custom-subtitle">TRƯỜNG ĐẠI HỌC THỦY LỢI</div>
            @if(session('error'))
                <div class="custom-alert">
                    {{ session('error') }}
                </div>
            @endif
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <input type="text" name="email" class="custom-input" style="top: 300px; font-size: 25px;" placeholder=" Email/Mã đăng nhập"/>
                <input type="password" name="password" class="custom-input" style="top: 400px; font-size: 25px;" placeholder="  Mật khẩu"/>
                
                <button type="submit" class="custom-button">
                    <span class="custom-button-text">
                    Đăng nhập
                    </span>
                </button>
            </form>
            <a href="{{ route('password.request') }}" class="custom-forgot-password">Quên mật khẩu?</a>
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>