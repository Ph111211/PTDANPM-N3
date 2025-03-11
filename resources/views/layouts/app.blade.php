<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
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
    .search{
        height: 46px;
        margin-left: 6%;
        margin-top: 10px;
        background: #D5D5D5;
        border-radius: 28px;
    }
    .search .search-content{
        display: flex;
        flex-direction: row;
        align-items: center;
        margin-right: 40px;
        padding-right: 20px;
        gap: 10px;
        border: none;
        font-style: normal;
        font-weight: 400;
        font-size: 15px;
        color: #181819;
        background: #D5D5D5;
    }
</style>
<body>
    <div class="menu">
        <div class="mx-4">
            <img src="storage/images/logo.png" alt="No image." class="logo">
            <a href="{{ route('trangchu') }}"><h2>Trang chủ</h2></a>
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
    <div class="top_bar d-flex">
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
        <form action="#" class="search d-flex">
            <a href="#"><svg width="45" height="45" viewBox="0 8 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_270_5602)">
                    <path d="M31.6 33L25.3 26.7C24.8 27.1 24.225 27.4167 23.575 27.65C22.925 27.8833 22.2333 28 21.5 28C19.6833 28 18.1458 27.3708 16.8875 26.1125C15.6292 24.8542 15 23.3167 15 21.5C15 19.6833 15.6292 18.1458 16.8875 16.8875C18.1458 15.6292 19.6833 15 21.5 15C23.3167 15 24.8542 15.6292 26.1125 16.8875C27.3708 18.1458 28 19.6833 28 21.5C28 22.2333 27.8833 22.925 27.65 23.575C27.4167 24.225 27.1 24.8 26.7 25.3L33 31.6L31.6 33ZM21.5 26C22.75 26 23.8125 25.5625 24.6875 24.6875C25.5625 23.8125 26 22.75 26 21.5C26 20.25 25.5625 19.1875 24.6875 18.3125C23.8125 17.4375 22.75 17 21.5 17C20.25 17 19.1875 17.4375 18.3125 18.3125C17.4375 19.1875 17 20.25 17 21.5C17 22.75 17.4375 23.8125 18.3125 24.6875C19.1875 25.5625 20.25 26 21.5 26Z" fill="#49454F"/>
                </g>
                <defs>
                    <clipPath id="clip0_270_5602">
                        <rect x="4" y="4" width="40" height="40" rx="20" fill="white"/>
                    </clipPath>
                </defs>
                </svg></a>
            <input type="text" class="search-content" placeholder="Search">
        </form>
        <a href="#" class="mx-4"><svg width="29" height="31" viewBox="0 0 29 31" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0277 5C7.73472 5 5.80843 6.72411 5.55522 9.00306L4.5 18.5H1.5C0.671573 18.5 0 19.1716 0 20V21.5C0 22.3284 0.671573 23 1.5 23H22.5C23.3284 23 24 22.3284 24 21.5V20C24 19.1716 23.3284 18.5 22.5 18.5H19.5L18.4448 9.00306C18.1916 6.72411 16.2653 5 13.9723 5H10.0277Z" fill="#4880FF"/>
            <rect opacity="0.3" x="9" y="24.5" width="6" height="6" rx="2.25" fill="#FF0000"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M21 16C25.4183 16 29 12.4183 29 8C29 3.58172 25.4183 0 21 0C16.5817 0 13 3.58172 13 8C13 12.4183 16.5817 16 21 16Z" fill="#F93C65"/>
            <path d="M20.912 12.12C20.216 12.12 19.62 11.956 19.124 11.628C18.636 11.292 18.264 10.812 18.008 10.188C17.752 9.564 17.624 8.808 17.624 7.92C17.624 6.96 17.768 6.148 18.056 5.484C18.344 4.812 18.76 4.3 19.304 3.948C19.848 3.596 20.5 3.42 21.26 3.42C21.556 3.42 21.852 3.46 22.148 3.54C22.452 3.612 22.736 3.72 23 3.864C23.272 4 23.512 4.168 23.72 4.368L23.216 5.52C22.92 5.248 22.604 5.048 22.268 4.92C21.932 4.784 21.588 4.716 21.236 4.716C20.892 4.716 20.584 4.78 20.312 4.908C20.048 5.028 19.824 5.212 19.64 5.46C19.456 5.7 19.316 6.004 19.22 6.372C19.132 6.732 19.088 7.152 19.088 7.632V8.532H18.944C19.008 8.124 19.14 7.776 19.34 7.488C19.548 7.192 19.812 6.968 20.132 6.816C20.452 6.656 20.808 6.576 21.2 6.576C21.688 6.576 22.12 6.692 22.496 6.924C22.872 7.156 23.168 7.476 23.384 7.884C23.6 8.292 23.708 8.76 23.708 9.288C23.708 9.832 23.588 10.32 23.348 10.752C23.116 11.176 22.788 11.512 22.364 11.76C21.948 12 21.464 12.12 20.912 12.12ZM20.828 10.896C21.116 10.896 21.368 10.832 21.584 10.704C21.808 10.576 21.98 10.396 22.1 10.164C22.22 9.924 22.28 9.652 22.28 9.348C22.28 9.036 22.22 8.764 22.1 8.532C21.98 8.3 21.808 8.12 21.584 7.992C21.368 7.856 21.116 7.788 20.828 7.788C20.54 7.788 20.288 7.856 20.072 7.992C19.856 8.12 19.684 8.3 19.556 8.532C19.436 8.764 19.376 9.036 19.376 9.348C19.376 9.652 19.436 9.924 19.556 10.164C19.684 10.396 19.856 10.576 20.072 10.704C20.288 10.832 20.54 10.896 20.828 10.896Z" fill="white"/>
        </svg></a>
        <img src="storage/images/english.png" alt="No image.">

    </div>
    <main>
    </main>
</body>
</html>