<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo e(asset('bootstrap/css/bootstrap.min.css')); ?>">
</head>
<style>
    .menu{
        position: absolute;    
        width:24%;
        margin-right: 76%;
        margin-top: 0%;
        margin-bottom: 0%;
    }
    .logo{
        width: 151.17px;
        height: 124.35px;
        margin-top: 16.71px;
    }
    .menu ul li,a{
        width: 100%;
        list-style: none;
        text-decoration: none;
        margin-top: 10px;
        display: grid;
        color: black;
        font-style: 'Segeo UI';
        font-weight: 600;
    }
    .top_bar{
        margin-left: 23.71%;
        margin-top: 0%;
    }
    main{
        margin-left: 24%;
        margin-top: 0;
        background-color: #F5F6FA;
    }
</style>
<body>
    <div class="menu">
        <div class="mx-4">
            <img src="storage/images/logo.png" alt="No image." class="logo">
            <a href="<?php echo e(route('trangchu')); ?>"><h2>Trang chủ</h2></a>
        </div>
    <ul>
        <li><a href="#">Quản lý tài khoản</a></li>
        <li><a href="#">Quản lý giảng viên</a></li>
        <li><a href="#">Quản lý sinh viên</a></li>
        <li><a href="#">Thống kê</a></li>
        <li><a href="#">Lên lịch bảo vệ đồ án</a></li>
        <li><a href="#">Cập nhật kết quả đồ án</a></li>
        <li><a href="#">Bảng điểm</a></li>
        <li><a href="#">Lưu trữ</a></li>
        <li><a href="#">Phân công giảng viên</a></li>
    </ul>
    <button type="button" class="m-5 bg-white">Logout
        <svg class="logout" width="25" height="25" viewBox="0 0 61 61" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M30.5 53.375V48.2917H48.2917V12.7083H30.5V7.625H48.2917C49.6896 7.625 50.8867 8.12317 
                51.883 9.1195C52.8794 10.1158 53.3767 11.3121 53.375 12.7083V48.2917C53.375 49.6896 52.8777 50.8867 51.883 
                51.883C50.8884 52.8794 49.6913 53.3767 48.2917 53.375H30.5ZM25.4167 43.2083L21.9219 39.5229L28.4031 
                33.0417H7.625V27.9583H28.4031L21.9219 21.4771L25.4167 17.7917L38.125 30.5L25.4167 43.2083Z" fill="#181819"/>
        </svg></button>
    </div>
    <div class="top_bar">
    <a href="#"><svg width="48" height="52" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g clip-path="url(#clip0_270_5595)">
            <path d="M15 30V28H33V30H15ZM15 25V23H33V25H15ZM15 20V18H33V20H15Z" fill="#49454F"/>
        </g>
        <defs>
            <clipPath id="clip0_270_5595">
                <rect x="4" y="4" width="40" height="40" rx="20" fill="white"/>
            </clipPath>
        </defs>
    </svg></a>
    </div>
    <main>
        aaa
    </main>
</body>
</html><?php /**PATH C:\php\PTDANPM-N3-main\resources\views/layouts/app.blade.php ENDPATH**/ ?>