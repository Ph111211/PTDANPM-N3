<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="http://127.0.0.1:8000/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('css/layout.css') }}">

        <script src="https://kit.fontawesome.com/18d4f96257.js" crossorigin="anonymous"></script>
    </head>

    <body>
        <div class="menu">
            <div class="mx-4">
                <img src="storage/images/logo.png" alt="No image." class="logo">
                <a href="#">
                    <h2>Trang chủ</h2>
                </a>
            </div>
            <ul>
                <li>
                    <a href="#">Quản lí sinh viên</a>
                </li>
                <li>
                    <a href="#">Quản lý đề tài</a>
                </li>
                <li>
                    <a href="#">Quản lý đồ án</a>
                </li>
                <li>
                    <a href="#">Kế hoạch thực hiện đồ án</a>
                </li>
                <li>
                    <a href="#">Quản lý điểm</a>
                </li>
                <hr>
                <li>
                    <a href="#">Q & A</a>
                </li>
                <li>
                    <a href="#">Sự kiện</a>
                </li>
                <li>
                    <a href="#">Quy Định</a>
                </li>
                <hr>
            </ul>
            <button type="button" style="width: 100%; margin: 0px !important; padding: 0px;" class="m-5 bg-white">
            <i class="fa-solid fa-power-off"></i>
            Logout  
            </button>
        </div>

        <div style="display: flex;width: 100%;flex-direction: column;">
            <div class="top_bar d-flex">
                <div class="d-flex">
                    <a href="#">
                        <svg width="48" height="52" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_270_5595)">
                                <path d="M15 30V28H33V30H15ZM15 25V23H33V25H15ZM15 20V18H33V20H15Z" fill="#49454F"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_270_5595">
                                    <rect x="4" y="4" width="40" height="40" rx="20" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                    <form action="#" class="search d-flex mx-3">
                        <a href="#">
                            <svg width="45" height="45" viewBox="0 12 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_270_5602)">
                                    <path d="M31.6 33L25.3 26.7C24.8 27.1 24.225 27.4167 23.575 27.65C22.925 27.8833 22.2333 28 21.5 28C19.6833 28 18.1458 27.3708 16.8875 26.1125C15.6292 24.8542 15 23.3167 15 21.5C15 19.6833 15.6292 18.1458 16.8875 16.8875C18.1458 15.6292 19.6833 15 21.5 15C23.3167 15 24.8542 15.6292 26.1125 16.8875C27.3708 18.1458 28 19.6833 28 21.5C28 22.2333 27.8833 22.925 27.65 23.575C27.4167 24.225 27.1 24.8 26.7 25.3L33 31.6L31.6 33ZM21.5 26C22.75 26 23.8125 25.5625 24.6875 24.6875C25.5625 23.8125 26 22.75 26 21.5C26 20.25 25.5625 19.1875 24.6875 18.3125C23.8125 17.4375 22.75 17 21.5 17C20.25 17 19.1875 17.4375 18.3125 18.3125C17.4375 19.1875 17 20.25 17 21.5C17 22.75 17.4375 23.8125 18.3125 24.6875C19.1875 25.5625 20.25 26 21.5 26Z" fill="#49454F"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_270_5602">
                                        <rect x="4" y="4" width="40" height="40" rx="20" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                        <input type="text" class="search-content" placeholder="Search">
                    </form>
                </div>
                <div class="d-flex" style="align-items: center; margin-right: 8px">
                    <a href="#" class="mx-4">
                        <svg width="29" height="31" viewBox="0 0 29 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0277 5C7.73472 5 5.80843 6.72411 5.55522 9.00306L4.5 18.5H1.5C0.671573 18.5 0 19.1716 0 20V21.5C0 22.3284 0.671573 23 1.5 23H22.5C23.3284 23 24 22.3284 24 21.5V20C24 19.1716 23.3284 18.5 22.5 18.5H19.5L18.4448 9.00306C18.1916 6.72411 16.2653 5 13.9723 5H10.0277Z" fill="#4880FF"/>
                            <rect opacity="0.3" x="9" y="24.5" width="6" height="6" rx="2.25" fill="#FF0000"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M21 16C25.4183 16 29 12.4183 29 8C29 3.58172 25.4183 0 21 0C16.5817 0 13 3.58172 13 8C13 12.4183 16.5817 16 21 16Z" fill="#F93C65"/>
                            <path d="M20.912 12.12C20.216 12.12 19.62 11.956 19.124 11.628C18.636 11.292 18.264 10.812 18.008 10.188C17.752 9.564 17.624 8.808 17.624 7.92C17.624 6.96 17.768 6.148 18.056 5.484C18.344 4.812 18.76 4.3 19.304 3.948C19.848 3.596 20.5 3.42 21.26 3.42C21.556 3.42 21.852 3.46 22.148 3.54C22.452 3.612 22.736 3.72 23 3.864C23.272 4 23.512 4.168 23.72 4.368L23.216 5.52C22.92 5.248 22.604 5.048 22.268 4.92C21.932 4.784 21.588 4.716 21.236 4.716C20.892 4.716 20.584 4.78 20.312 4.908C20.048 5.028 19.824 5.212 19.64 5.46C19.456 5.7 19.316 6.004 19.22 6.372C19.132 6.732 19.088 7.152 19.088 7.632V8.532H18.944C19.008 8.124 19.14 7.776 19.34 7.488C19.548 7.192 19.812 6.968 20.132 6.816C20.452 6.656 20.808 6.576 21.2 6.576C21.688 6.576 22.12 6.692 22.496 6.924C22.872 7.156 23.168 7.476 23.384 7.884C23.6 8.292 23.708 8.76 23.708 9.288C23.708 9.832 23.588 10.32 23.348 10.752C23.116 11.176 22.788 11.512 22.364 11.76C21.948 12 21.464 12.12 20.912 12.12ZM20.828 10.896C21.116 10.896 21.368 10.832 21.584 10.704C21.808 10.576 21.98 10.396 22.1 10.164C22.22 9.924 22.28 9.652 22.28 9.348C22.28 9.036 22.22 8.764 22.1 8.532C21.98 8.3 21.808 8.12 21.584 7.992C21.368 7.856 21.116 7.788 20.828 7.788C20.54 7.788 20.288 7.856 20.072 7.992C19.856 8.12 19.684 8.3 19.556 8.532C19.436 8.764 19.376 9.036 19.376 9.348C19.376 9.652 19.436 9.924 19.556 10.164C19.684 10.396 19.856 10.576 20.072 10.704C20.288 10.832 20.54 10.896 20.828 10.896Z" fill="white"/>
                        </svg>
                    </a>
                    <div class="d-flex">
                        <svg class="lang m-3" width="40" height="27" viewBox="0 0 40 27" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect width="40" height="27" rx="5" fill="#D8D8D8"/>
                            <mask id="mask0_510_3316" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="40" height="27">
                                <rect width="40" height="27" rx="5" fill="white"/>
                            </mask>
                            <g mask="url(#mask0_510_3316)">
                                <rect width="40" height="27" fill="url(#pattern0_510_3316)"/>
                            </g>
                            <defs>
                                <pattern id="pattern0_510_3316" patternContentUnits="objectBoundingBox" width="1" height="1">
                                    <use xlink:href="#image0_510_3316" transform="scale(0.0125 0.025)"/>
                                </pattern>
                                <image id="image0_510_3316" width="80" height="40" preserveAspectRatio="none" xlink:href="data:image/png;base64,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"/>
                            </defs>
                        </svg>
                        <select class="options border-0">
                            <!-- <option value="1">English</option> -->
                            <option value="2">Tiếng Việt</option>
                        </select>
                    </div>
                    <div class=d-flex>
                        <svg class="m-2" width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M22 44C34.1503 44 44 34.1503 44 22C44 9.84974 34.1503 0 22 0C9.84974 0 0 9.84974 0 22C0 34.1503 9.84974 44 22 44Z" fill="#D8D8D8"/>
                            <mask id="mask0_510_3307" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="44" height="44">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M22 44C34.1503 44 44 34.1503 44 22C44 9.84974 34.1503 0 22 0C9.84974 0 0 9.84974 0 22C0 34.1503 9.84974 44 22 44Z" fill="white"/>
                            </mask>
                            <g mask="url(#mask0_510_3307)">
                                <rect x="-2" y="-5" width="50" height="52" fill="url(#pattern0_510_3307)"/>
                            </g>
                            <defs>
                                <pattern id="pattern0_510_3307" patternContentUnits="objectBoundingBox" width="1" height="1">
                                    <use xlink:href="#image0_510_3307" transform="scale(0.000666667)"/>
                                </pattern>
                                
                            </defs>
                        </svg>
                        <select class="border-0 px-3">
                            <!-- <option value="1">Văn phòng khoa</option> -->
                            <option value="2">Giảng viên</option>
                            <!-- <option value="3">Sinh viên</option> -->
                        </select>
                    </div>
                </div>
            </div>
            <div class="container px-4" style="margin: 0px;max-width: none !important; width: 100%">
                @yield('content')
            </div>
        </div>
    </body>
</html>
