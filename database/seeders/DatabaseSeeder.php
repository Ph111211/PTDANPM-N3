<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        $this->call([
//            UserSeeder::class,  // Giảng viên phải có trước để Sinh viên tham chiếu
//            GiangVienSeeder::class,  // Giảng viên phải có trước để Sinh viên tham chiếu
//            SinhVienSeeder::class,  // Giờ mới tạo Sinh viên
//            VanPhongKhoaSeeder::class,  // Giờ mới tạo Sinh viên
//            DoAnSeeder::class,
//            KetQuaThucTapSeeder::class
//        ]);


        DB::table('users')->insert([
            ['name' => 'Nguyễn Văn An', 'email' => 'phph111211@gmail.com', 'role' => 'admin','password' => bcrypt('123456')],
            ['name' => 'Trần Thị Bắc', 'email' => 'tranthib@university.edu', 'role' => 'giang_vien','password' => bcrypt('123456')],
            ['name' => 'Lê Văn Cao', 'email' => 'levanc@university.edu', 'role' => 'giang_vien','password' => bcrypt('123456')],
            ['name' => 'Phạm Minh Dương', 'email' => 'phamminhd@university.edu', 'role' => 'giang_vien','password' => bcrypt('123456')],
            ['name' => 'Hoàng Thu Hoa', 'email' => 'hoangthue@university.edu', 'role' => 'giang_vien','password' => bcrypt('123456')],
            ['name' => 'Đặng Quốc Đăng', 'email' => 'dangquocf@university.edu', 'role' => 'giang_vien','password' => bcrypt('123456')],
            ['name' => 'Vũ Hải Giang', 'email' => 'vuhai@university.edu', 'role' => 'giang_vien','password' => bcrypt('123456')],
            ['name' => 'Bùi Thanh Huyền', 'email' => 'buithanhh@university.edu', 'role' => 'giang_vien','password' => bcrypt('123456')],
            ['name' => 'Phan Minh Khôi', 'email' => 'pmk@example.com', 'role' => 'sinh_vien','password' => bcrypt('123456')],
            ['name' => 'Nguyễn Thảo Vy', 'email' => 'ntv@example.com', 'role' => 'sinh_vien','password' => bcrypt('123456')],
            ['name' => 'Trần Hữu Phước', 'email' => 'thp@example.com', 'role' => 'sinh_vien','password' => bcrypt('123456')],
            ['name' => 'Lê Quỳnh Anh', 'email' => 'lqa@example.com', 'role' => 'sinh_vien','password' => bcrypt('123456')],
            ['name' => 'Vũ Đình Bảo', 'email' => 'vdb@example.com', 'role' => 'sinh_vien','password' => bcrypt('123456')],
        ]);
        DB::table('giang_vien')->insert([

            ['user_id' => 2, 'ho_ten' => 'Trần Thị Bắc', 'khoa' => 'Khoa học dữ liệu', 'sdt' => '0923456789', 'email' => 'tranthib@university.edu', 'so_luong_sinh_vien_huong_dan' => 3],
            ['user_id' => 3, 'ho_ten' => 'Lê Văn Cao', 'khoa' => 'An toàn thông tin', 'sdt' => '0934567890', 'email' => 'levanc@university.edu', 'so_luong_sinh_vien_huong_dan' => 4],
            ['user_id' => 4, 'ho_ten' => 'Phạm Minh Dương', 'khoa' => 'Trí tuệ nhân tạo', 'sdt' => '0945678901', 'email' => 'phamminhd@university.edu', 'so_luong_sinh_vien_huong_dan' => 6],
            ['user_id' => 5, 'ho_ten' => 'Hoàng Thu Hoa', 'khoa' => 'Kỹ thuật phần mềm', 'sdt' => '0956789012', 'email' => 'hoangthue@university.edu', 'so_luong_sinh_vien_huong_dan' => 2],
            ['user_id' => 6, 'ho_ten' => 'Đặng Quốc Đăng', 'khoa' => 'Hệ thống thông tin', 'sdt' => '0967890123', 'email' => 'dangquocf@university.edu', 'so_luong_sinh_vien_huong_dan' => 7],
            ['user_id' => 7, 'ho_ten' => 'Vũ Hải Giang', 'khoa' => 'Khoa học máy tính', 'sdt' => '0978901234', 'email' => 'vuhai@university.edu', 'so_luong_sinh_vien_huong_dan' => 3],
            ['user_id' => 8, 'ho_ten' => 'Bùi Thanh Huyền', 'khoa' => 'Mạng máy tính', 'sdt' => '0989012345', 'email' => 'buithanhh@university.edu', 'so_luong_sinh_vien_huong_dan' => 8],
        ]);

        DB::table('sinh_vien')->insert([
            ['user_id' => 9, 'ho_ten' => 'Phan Minh Khôi', 'ngay_sinh' => '2002-05-10', 'gioi_tinh' => 'Nam', 'lop' => '64KTPM1', 'sdt' => '0911222333', 'email' => 'pmk@example.com', 'dia_chi' => 'Hà Nội'],
            ['user_id' => 10, 'ho_ten' => 'Nguyễn Thảo Vy', 'ngay_sinh' => '2001-11-15', 'gioi_tinh' => 'Nữ', 'lop' => '64KTPM2', 'sdt' => '0922333444', 'email' => 'ntv@example.com', 'dia_chi' => 'TP.HCM'],
            ['user_id' => 11, 'ho_ten' => 'Trần Hữu Phước', 'ngay_sinh' => '2002-02-20', 'gioi_tinh' => 'Nam', 'lop' => '64KTPM1', 'sdt' => '0933444555', 'email' => 'thp@example.com', 'dia_chi' => 'Đà Nẵng'],
            ['user_id' => 12, 'ho_ten' => 'Lê Quỳnh Anh', 'ngay_sinh' => '2001-08-25', 'gioi_tinh' => 'Nữ', 'lop' => '64KTPM2', 'sdt' => '0944555666', 'email' => 'lqa@example.com', 'dia_chi' => 'Cần Thơ'],
            ['user_id' => 13, 'ho_ten' => 'Vũ Đình Bảo', 'ngay_sinh' => '2002-07-30', 'gioi_tinh' => 'Nam', 'lop' => '64KTPM3', 'sdt' => '0955666777', 'email' => 'vdb@example.com', 'dia_chi' => 'Hải Phòng']
        ]);

        DB::table('do_an')->insert([
            [
                'ma_do_an' => '1',
                'tieu_de' => 'Hệ thống quản lý sinh viên',
                'mo_ta' => 'Phát triển hệ thống quản lý sinh viên bằng Laravel',
                'thoi_gian_bat_dau' => '2024-01-10',
                'thoi_gian_ket_thuc' => '2024-06-15',
                'ma_sv' => '10',
                'ma_gv' => null,
                'nhan_xet' => null,
                'ngay_gio' => null,
                'dia_diem' => '175 Tây Sơn',
                'file_noi_dung' => '',
                'trang_thai' => 'Chưa hoàn thành',
                'diem_so' => null,
            ],
            [
                'ma_do_an' => '2',
                'tieu_de' => 'Website thương mại điện tử',
                'mo_ta' => 'Xây dựng trang web bán hàng với PHP & MySQL',
                'thoi_gian_bat_dau' => '2024-02-01',
                'thoi_gian_ket_thuc' => '2024-07-01',
                'ma_sv' => '10',
                'ma_gv' => null,
                'nhan_xet' => null,
                'ngay_gio' => '2025-01-22',
                'dia_diem' => '175 Tây Sơn',
                'file_noi_dung' => '',
                'trang_thai' => 'Chưa hoàn thành',
                'diem_so' => null,
            ],
            [
                'ma_do_an' => '3',
                'tieu_de' => 'Ứng dụng quản lý công việc',
                'mo_ta' => 'Phát triển app quản lý công việc trên nền tảng web',
                'thoi_gian_bat_dau' => '2024-03-01',
                'thoi_gian_ket_thuc' => '2024-08-01',
                'ma_sv' => '11',
                'ma_gv' => null,
                'nhan_xet' => null,
                'ngay_gio' => '2025-01-22',
                'dia_diem' => '175 Tây Sơn',
                'file_noi_dung' => '',
                'trang_thai' => 'Hoàn thành',
                'diem_so' => 8.5,
            ],
            [
                'ma_do_an' => '4',
                'tieu_de' => 'Hệ thống đặt phòng khách sạn',
                'mo_ta' => 'Thiết kế hệ thống đặt phòng khách sạn trực tuyến',
                'thoi_gian_bat_dau' => '2024-04-10',
                'thoi_gian_ket_thuc' => '2024-09-10',
                'ma_sv' => '12',
                'ma_gv' => null,
                'nhan_xet' => null,
                'ngay_gio' => '2025-01-22',
                'dia_diem' => '175 Tây Sơn',
                'file_noi_dung' => '',
                'trang_thai' => 'Chưa hoàn thành',
                'diem_so' => null,
            ],
            [
                'ma_do_an' => '5',
                'tieu_de' => 'Chatbot hỗ trợ khách hàng',
                'mo_ta' => 'Phát triển chatbot AI sử dụng Python',
                'thoi_gian_bat_dau' => '2024-05-01',
                'thoi_gian_ket_thuc' => '2024-10-01',
                'ma_sv' => '13',
                'ma_gv' => null,
                'nhan_xet' => null,
                'ngay_gio' => '2025-01-22',
                'dia_diem' => '175 Tây Sơn',
                'file_noi_dung' => '',
                'trang_thai' => 'Hoàn thành',
                'diem_so' => 9.0,
            ],
        ]);
        DB::table('ket_qua_thuc_tap')->insert([
            [
                'ma_sv' => 9, // Phan Minh Khôi
                'ma_gv' => 2, // Trần Thị Bắc
                'diem_so' => 8.0,
                'nhan_xet_cua_giang_vien' => 'Sinh viên có tinh thần học hỏi, tiến bộ rõ rệt.',
                'nhan_xet_cua_doanh_nghiep' => 'Làm việc chăm chỉ, kỹ năng tốt.',
                'ten_dn' => 'Công ty ABC Tech',
                'vi_tri' => 'Hà Nội',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ma_sv' => 10, // Nguyễn Thảo Vy
                'ma_gv' => 3, // Lê Văn Cao
                'diem_so' => 9.0,
                'nhan_xet_cua_giang_vien' => 'Nắm vững chuyên môn, làm việc nhóm tốt.',
                'nhan_xet_cua_doanh_nghiep' => 'Chuyên nghiệp, thái độ tích cực.',
                'ten_dn' => 'CTCP Công nghệ số XYZ',
                'vi_tri' => 'TP.HCM',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ma_sv' => 11, // Trần Hữu Phước
                'ma_gv' => 4, // Phạm Minh Dương
                'diem_so' => 7.5,
                'nhan_xet_cua_giang_vien' => 'Cần cải thiện kỹ năng làm việc độc lập.',
                'nhan_xet_cua_doanh_nghiep' => 'Có cố gắng nhưng cần cải thiện.',
                'ten_dn' => 'Công ty TNHH TM DV OneSoft',
                'vi_tri' => 'Đà Nẵng',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ma_sv' => 12, // Lê Quỳnh Anh
                'ma_gv' => 5, // Hoàng Thu Hoa
                'diem_so' => 9.2,
                'nhan_xet_cua_giang_vien' => 'Thành thạo kỹ năng chuyên ngành.',
                'nhan_xet_cua_doanh_nghiep' => 'Xuất sắc, phù hợp với môi trường doanh nghiệp.',
                'ten_dn' => 'Tập đoàn FPT',
                'vi_tri' => 'Cần Thơ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ma_sv' => 13, // Vũ Đình Bảo
                'ma_gv' => 6, // Đặng Quốc Đăng
                'diem_so' => 8.7,
                'nhan_xet_cua_giang_vien' => 'Có tư duy logic tốt.',
                'nhan_xet_cua_doanh_nghiep' => 'Làm việc hiệu quả, sáng tạo.',
                'ten_dn' => 'VinTech Solutions',
                'vi_tri' => 'Hải Phòng',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        DB::table('do_an')->insert([
            [
                'ma_do_an' => 6,
                'tieu_de' => 'Ứng dụng quản lý thư viện',
                'mo_ta' => 'Xây dựng hệ thống quản lý mượn trả sách cho thư viện trường',
                'thoi_gian_bat_dau' => '2024-04-01',
                'thoi_gian_ket_thuc' => '2024-09-01',
                'ma_sv' => 11,
                'ma_gv' => 3,
                'nhan_xet' => null,
                'ngay_gio' => null,
                'dia_diem' => '175 Tây Sơn',
                'file_noi_dung' => '',
                'trang_thai' => 'Đang mở',
                'diem_so' => null,
                'nhiem_vu' => 'Phát triển backend',
                'mo_ta_nhiem_vu' => 'Xây dựng API và hệ thống xác thực người dùng',
            ],
            [
                'ma_do_an' => 7,
                'tieu_de' => 'Ứng dụng đặt đồ ăn online',
                'mo_ta' => 'Phát triển ứng dụng web/mobile cho phép đặt món ăn từ các nhà hàng địa phương',
                'thoi_gian_bat_dau' => '2024-06-01',
                'thoi_gian_ket_thuc' => '2024-11-01',
                'ma_sv' => 12,
                'ma_gv' => 4,
                'nhan_xet' => null,
                'ngay_gio' => null,
                'dia_diem' => '175 Tây Sơn',
                'file_noi_dung' => '',
                'trang_thai' => 'Chưa có đề tài',
                'diem_so' => null,
                'nhiem_vu' => 'Thiết kế giao diện',
                'mo_ta_nhiem_vu' => 'Thiết kế UI/UX cho phiên bản mobile',
            ],
            [
                'ma_do_an' => 8,
                'tieu_de' => 'Phần mềm hỗ trợ học lập trình',
                'mo_ta' => 'Một ứng dụng hướng dẫn học lập trình Python cho người mới bắt đầu',
                'thoi_gian_bat_dau' => '2024-07-01',
                'thoi_gian_ket_thuc' => '2024-12-01',
                'ma_sv' => 13,
                'ma_gv' => 2,
                'nhan_xet' => 'Tiến độ tốt, cần cải thiện phần giao diện',
                'ngay_gio' => '2025-01-15 10:00:00',
                'dia_diem' => 'Phòng 302 - Nhà A',
                'file_noi_dung' => '',
                'trang_thai' => 'Cảnh cáo lần 1',
                'diem_so' => 6.5,
                'nhiem_vu' => 'Viết tài liệu',
                'mo_ta_nhiem_vu' => 'Soạn thảo tài liệu hướng dẫn sử dụng',
            ]
        ]);

    }

}
