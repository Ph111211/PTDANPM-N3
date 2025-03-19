<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
</head>
<style>
    *{
        box-sizing: border-box;
    }
    body{
        background-color:  #1F38A3;
        margin: 0;
    }
    header{
        box-sizing: border-box;
        position: fixed;
        top:0;
        z-index: 1;
        width: 1476px;
        height: 225px;
        background: #FFFFFF;
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 2px;
        font-family: 'Segoe UI', Verdana, sans-serif;
    }
    .logo{
        position: absolute;
        width: 173.94px;
        height: 145px;
        left: 22px;
        top: 39px;
    }
    header p{
        position: absolute;
        width: 286px;
        height: 60px;
        left: 222px;
        top: 65px;
        font-style: normal;
        font-weight: 400;
        font-size: 25px;
        line-height: 30px;
        color: #181819;
    }
    .login-link{
        position: absolute;
        width: 112px;
        height: 60px;
        left: 1192px;
        margin-right: 20px;
        top: 83px;
        font-style: normal;
        font-weight: 400;
        font-size: 21px;
        line-height: 30px;
        color: #181819;
        text-decoration: none;
    }
    .logout{
        position: absolute;
        left: 1309px;
        top: 77px;
    }
    .menu{
        display:inline-flex;
        position: absolute;
        left: 220px;
        top: 190px;
        font-style: normal;
        font-weight: 400;
        font-size: 21px;
        line-height: 25px;
        list-style: none;
        color: #181819;
    }
    .menu li{
        margin-left: 30px;
    }
    .menu li a{
        color: #181819;
        text-decoration: none;
    }
    .search{
        display: flex;
        flex-direction: row;
        align-items: center;
        padding: 0px;
        gap: 4px;
        position: absolute;
        width: 360px;
        min-width: 360px;
        max-width: 720px;
        height: 56px;
        left: 850px;
        bottom: 4px;
        background: #ECE6F0;
        border-radius: 28px;
    }
    .search .search-content{
        display: flex;
        flex-direction: row;
        align-items: center;
        padding: 10px;
        margin-right: 40px;
        gap: 10px;
        border: none;
        font-style: normal;
        font-weight: 400;
        font-size: 15px;
        color: #181819;
        background: #ECE6F0;
    }
    .main .home-image{
        position:absolute;
        z-index: -1;
        width: 1043px;
        height: 587px;
        left: 200px;
        top: 190px;
    }
    .v-left{
    position: absolute;
    left: 69px;
    top: 429px;
    border: none;
    background-color:  #1F38A3;
    }
    .v-right{
    position: absolute;
    left: 1293px;
    top: 429px;
    border: none;
    background-color:  #1F38A3;
    }
    section{
        margin-top:880px;
    }
    .function,section p{
        width: 262px;
        height: 60px;
        margin-left: 69px;
        font-family: 'Segoe UI';
        font-style: normal;
        font-weight: 400;
        font-size: 24px;
        line-height: 30px;
        color: #FFFFFF;
        text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    }
    .card-content{
        display:flex;
    }
    .card1{
        margin-left: 90px;
    }
    .card1 img{
        width: 360px;
        height: 225px;
        border-radius: 85px;
    }
    .card1 p{
        text-align: center;
        font-weight: lighter;
        margin-top: 40px;
        margin-left: 50px;
    }
    .content{
        position: absolute;
        width: 1476px;
        height: 1045px;
        left: 0px;
        top: 1275px;
        background: rgba(205, 245, 249, 0.99);
    }
    .content .card_1{
        display:flex;
        margin-left: 15px;
        margin-top: 121px;
    }
    .content .card_1 img{
        width: 665px;
        height: 400px;
        
    }
    .content .card_1 p{
        position: absolute;
        width: 481px;
        height: 400px;
        left: 770px;
        top: 121px;
        font-family: 'Segoe UI';
        font-style: normal;
        font-weight: 400;
        font-size: 21px;
        line-height: 30px;
    }
    .content .card_2{
        display:flex;
        margin-left: 15px;
        margin-top: 121px;
    }
    .content .card_2 img{
        position: absolute;
        width: 576px;
        height: 407px;
        left: 850px;
        top: 625px;
    }
    .content .card_2 p{
        position: absolute;
        width: 495px;
        height: 265px;
        left: 59px;
        top: 694px;
        font-family: 'Segoe UI';
        font-style: normal;
        font-weight: 400;
        font-size: 21px;
        line-height: 30px;
    }
    .function{
        position: absolute;
        left: 0px;
        top: 2340px;
    }
    .card-function{
        margin-bottom: 30px;
        width: 1376px;
    }
    .card2{
        text-align: center;
        width: 25%;
    }
    .card2 p{
        text-align: center;
        font-weight: lighter;
        margin-top: 20px;
        white-space: nowrap;
    }
    footer{
        background: rgba(205, 245, 249, 0.99);
        position: absolute;
        top:2700px;
        width: 1476px;
        display: flex;
    }
    footer img{
        width: 550px;
    }
    .lien-he{
        padding-left: 200px;
    }
</style>
<body>
    <header>
        <img src="{{ $logo }}" alt="No image." class="logo">
        <p> Trường đại học Thủy Lợi TLU</p>
        <a href="#" class="login-link">Đăng nhập</a>
        <a href="#"><svg class="logout" width="45" height="45" viewBox="0 0 61 61" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M30.5 53.375V48.2917H48.2917V12.7083H30.5V7.625H48.2917C49.6896 7.625 50.8867 8.12317 
                51.883 9.1195C52.8794 10.1158 53.3767 11.3121 53.375 12.7083V48.2917C53.375 49.6896 52.8777 50.8867 51.883 
                51.883C50.8884 52.8794 49.6913 53.3767 48.2917 53.375H30.5ZM25.4167 43.2083L21.9219 39.5229L28.4031 
                33.0417H7.625V27.9583H28.4031L21.9219 21.4771L25.4167 17.7917L38.125 30.5L25.4167 43.2083Z" fill="#181819"/>
        </svg></a>
        <ul class="menu">
            <li class="sub_menu"><a href="#">Giới thiệu</a></li>
            <li><a href="#">Tin tức & thông báo</a></li>
            <li><a href="#">Đào tạo</a></li>
            <li><a href="{{ route('sinhviens.index') }}">Sinh viên</a></li>
            <li><a href="#">Thực tập</a></li>
            <li><a href="#">Liên hệ</a></li>
            <form action="#" class="search">
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
                <input type="text" class="search-content" placeholder="Hinted search text">
                <a href="#"><svg width="48" height="52" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_270_5602)">
                    <path d="M31.6 33L25.3 26.7C24.8 27.1 24.225 27.4167 23.575 27.65C22.925 27.8833 22.2333 28 21.5 28C19.6833 28 18.1458 27.3708 16.8875 26.1125C15.6292 24.8542 15 23.3167 15 21.5C15 19.6833 15.6292 18.1458 16.8875 16.8875C18.1458 15.6292 19.6833 15 21.5 15C23.3167 15 24.8542 15.6292 26.1125 16.8875C27.3708 18.1458 28 19.6833 28 21.5C28 22.2333 27.8833 22.925 27.65 23.575C27.4167 24.225 27.1 24.8 26.7 25.3L33 31.6L31.6 33ZM21.5 26C22.75 26 23.8125 25.5625 24.6875 24.6875C25.5625 23.8125 26 22.75 26 21.5C26 20.25 25.5625 19.1875 24.6875 18.3125C23.8125 17.4375 22.75 17 21.5 17C20.25 17 19.1875 17.4375 18.3125 18.3125C17.4375 19.1875 17 20.25 17 21.5C17 22.75 17.4375 23.8125 18.3125 24.6875C19.1875 25.5625 20.25 26 21.5 26Z" fill="#49454F"/>
                </g>
                <defs>
                    <clipPath id="clip0_270_5602">
                        <rect x="4" y="4" width="40" height="40" rx="20" fill="white"/>
                    </clipPath>
                </defs>
                </svg></a>
            </form>
        </ul>
    </header>
    <div class="main">
        <button type="button" class="v-left">
            <svg width="68" height="111" viewBox="0 0 68 111" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M67.5 1L1 63.5L67.5 110.5" stroke="#EEEEEE"/>
            </svg>
        </button>
        <img src="storage/images/main_content.png" alt="No image." class="home-image">
        <button type="button" class="v-right">    
            <svg width="68" height="111" viewBox="0 0 69 111" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 110.5L67.5 48L1 1" stroke="#EEEEEE"/>
            </svg>
        </button>
    </div>
    <section>
            <p>* CÁC SỰ KIỆN NỔI BẬT: </p>
            <div class="card-content">
                <div class="card1">
                    <img src="storage/images/tchucday.png" alt="No image.">
                    <p>Tổ chức dạy học</p>
                </div>
                <div class="card1">
                    <img src="storage/images/tthao.png" alt="No image.">
                    <p>Thể thao Thủy lợi</p>
                </div>
                <div class="card1">
                    <img src="storage/images/letn.png" alt="No image.">
                    <p>Thông số tốt nghiệp</p>
                </div>
            </div>
    </section>
    <div class="content">
        <div class="card_1">
            <img src="storage/images/cthcm.png" alt="No image.">
                <p><strong>* Giới thiệu :</strong> 
                <br>Trường Đại học Thủy lợi (tiếng Anh: Thuyloi University) là trường đại học số 1 trong việc đào tạo nguồn nhân lực chất lượng cao, nghiên cứu khoa học, phát triển và chuyển giao công nghệ tiên tiến trong các ngành khoa học, kỹ thuật, kinh tế và quản lý, đặc biệt trong lĩnh vực thủy lợi, môi trường, phòng chống và giảm nhẹ thiên tai, ...</p>
        </div>
        <div class="card_2">
                <p>Học quân sự là khóa học mà bất cứ sinh viên nào cũng phải trải qua. Do đi học ở xa trường nên nhiều sinh viên bỡ ngỡ, thiếu kinh nghiệm. Dưới đây là kinh nghiệm đi học quân sự giúp bạn trải qua thời gian học tập trọn vẹn và vui vẻ nhất :
                    <br>+ Những thứ cần mang đi ?
                    <br>+ Những thứ không nên mang đi ?
                    <br>+ Những điều cần biết về khóa học quân sự ?
                    <br>+ Những gì sẽ được học tại khu quân sự ?</p>
                <img src="storage/images/dhtl.png" alt="No image.">
        </div>
    </div>
    <div class="function d-grid">
        <p>* CÁC CHỨC NĂNG CHÍNH:</>
        <div class="card-function d-flex col-md-4">
                <div class="card2">
                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-briefcase" viewBox="0 0 16 16">
                        <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5m1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0M1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5"/>
                    </svg></a>
                    <p>Quản lý người dùng</p>
                </div>
                <div class="card2">
                    <a href="{{ route('sinhviens.index') }}"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-briefcase" viewBox="0 0 16 16">
                        <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5m1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0M1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5"/>
                    </svg></a>
                    <p>Quản lý sinh viên</p>
                </div>
                <div class="card2">
                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-briefcase" viewBox="0 0 16 16">
                        <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5m1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0M1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5"/>
                    </svg></a>
                    <p>Quản lý giảng viên</p>
                </div>
                <div class="card2">
                    <a href="{{ route('thongke.index') }}"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-bar-chart-line-fill" viewBox="0 0 16 16">
                            <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1z"/>
                    </svg></a>
                    <p>Thống kê</p>
                </div>
        </div>
        <div class="card-function d-flex col-md-4">
                <div class="card2">
                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-briefcase" viewBox="0 0 16 16">
                        <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5m1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0M1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5"/>
                    </svg></a>
                    <p>Quản lý đề tài</p>
                </div>
                <div class="card2">
                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-calendar2-check" viewBox="0 0 16 16">
                        <path d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0"/>
                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z"/>
                        <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5z"/>
                    </svg></a>
                    <p>Lên lịch bảo vệ đồ án</p>
                </div>
                <div class="card2">
                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
                        <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022zm2.004.45a7 7 0 0 0-.985-.299l.219-.976q.576.129 1.126.342zm1.37.71a7 7 0 0 0-.439-.27l.493-.87a8 8 0 0 1 .979.654l-.615.789a7 7 0 0 0-.418-.302zm1.834 1.79a7 7 0 0 0-.653-.796l.724-.69q.406.429.747.91zm.744 1.352a7 7 0 0 0-.214-.468l.893-.45a8 8 0 0 1 .45 1.088l-.95.313a7 7 0 0 0-.179-.483m.53 2.507a7 7 0 0 0-.1-1.025l.985-.17q.1.58.116 1.17zm-.131 1.538q.05-.254.081-.51l.993.123a8 8 0 0 1-.23 1.155l-.964-.267q.069-.247.12-.501m-.952 2.379q.276-.436.486-.908l.914.405q-.24.54-.555 1.038zm-.964 1.205q.183-.183.35-.378l.758.653a8 8 0 0 1-.401.432z"/>
                        <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0z"/>
                        <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5"/>
                    </svg></a>
                    <p>Sự kiện</p>
                </div>
                <div class="card2">
                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                        <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                        <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                    </svg></a>
                    <p>Quy định</p>
                </div>
        </div>
    </div>
    <footer>
        <img src="storage/images/map.png" alt="No image.">
        <p class="m-5">TRƯỜNG ĐẠI HỌC THỦY LỢI
            <br>Địa chỉ: 175 Tây Sơn, Đống Đa, Hà Nội
            <br>Điện thoại: (024) 38522201
            <br>Fax: (024) 35633351
            <br>Email: phonghcth@tlu.edu.vn
        </p>
        <div class="lien-he m-5">
            <p class="text-center mb-4">LIÊN HỆ</p>
            <a href="#" class="me-5"><svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="black" class="bi bi-youtube" viewBox="0 0 16 16">
                    <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z"/>
            </svg></a>
            <a href ="#"><svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="black" class="bi bi-facebook" viewBox="0 0 16 16">
                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
            </svg></a>
        </div>
    </footer>
</body>
</html>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let images = [
            "storage/images/main_content.png",
            "storage/images/tlu.png",
            "storage/images/tthao.png",
            "storage/images/image.png"
        ];

        let currentIndex = 0;
        let imgElement = document.querySelector(".home-image");

        function changeImage(next = true) {
            currentIndex = next ? (currentIndex + 1) % images.length : (currentIndex - 1 + images.length) % images.length;
            imgElement.src = images[currentIndex];
        }

        document.querySelector(".v-right").addEventListener("click", function () {
            changeImage(true);
        });

        document.querySelector(".v-left").addEventListener("click", function () {
            changeImage(false);
        });

        // Tự động chuyển ảnh sau mỗi giây
        setInterval(() => changeImage(true), 8000);
    });
</script>
