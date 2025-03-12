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
        DB::table('giang_vien')->insert([
            ['ma_gv' => 101, 'ho_ten' => 'Nguyễn Văn An', 'khoa' => 'Công nghệ thông tin', 'sdt' => '0912345678', 'email' => 'nguyenvana@university.edu', 'so_luong_sinh_vien_huong_dan' => 5],
            ['ma_gv' => 201, 'ho_ten' => 'Trần Thị Bắc', 'khoa' => 'Khoa học dữ liệu', 'sdt' => '0923456789', 'email' => 'tranthib@university.edu', 'so_luong_sinh_vien_huong_dan' => 3],
            ['ma_gv' => 304, 'ho_ten' => 'Lê Văn Cao', 'khoa' => 'An toàn thông tin', 'sdt' => '0934567890', 'email' => 'levanc@university.edu', 'so_luong_sinh_vien_huong_dan' => 4],
            ['ma_gv' => 403, 'ho_ten' => 'Phạm Minh Dương', 'khoa' => 'Trí tuệ nhân tạo', 'sdt' => '0945678901', 'email' => 'phamminhd@university.edu', 'so_luong_sinh_vien_huong_dan' => 6],
            ['ma_gv' => 522, 'ho_ten' => 'Hoàng Thu Hoa', 'khoa' => 'Kỹ thuật phần mềm', 'sdt' => '0956789012', 'email' => 'hoangthue@university.edu', 'so_luong_sinh_vien_huong_dan' => 2],
            ['ma_gv' => 611, 'ho_ten' => 'Đặng Quốc Đăng', 'khoa' => 'Hệ thống thông tin', 'sdt' => '0967890123', 'email' => 'dangquocf@university.edu', 'so_luong_sinh_vien_huong_dan' => 7],
            ['ma_gv' => 723, 'ho_ten' => 'Vũ Hải Giang', 'khoa' => 'Khoa học máy tính', 'sdt' => '0978901234', 'email' => 'vuhai@university.edu', 'so_luong_sinh_vien_huong_dan' => 3],
            ['ma_gv' => 821, 'ho_ten' => 'Bùi Thanh Huyền', 'khoa' => 'Mạng máy tính', 'sdt' => '0989012345', 'email' => 'buithanhh@university.edu', 'so_luong_sinh_vien_huong_dan' => 8],
        ]);
    
        DB::table('doanh_nghiep')->insert([
            ['ma_dn' => 'DN001', 'ten_dn' => 'Công ty An Bình', 'dia_chi' => '123 Nguyễn Trãi, Hà Nội', 'sdt' => '0911222333', 'email' => 'contact@abc.com', 'nguoi_lien_he' => 'Nguyễn Văn An', 'so_luong_sinh_vien_tiep' => 10],
            ['ma_dn' => 'DN002', 'ten_dn' => 'Công ty XYZ', 'dia_chi' => '456 Lê Lợi, TP.HCM', 'sdt' => '0922333444', 'email' => 'contact@xyz.com', 'nguoi_lien_he' => 'Trần Thị Bắc', 'so_luong_sinh_vien_tiep' => 15],
            ['ma_dn' => 'DN003', 'ten_dn' => 'Công ty 123', 'dia_chi' => '789 Hoàng Hoa Thám, Đà Nẵng', 'sdt' => '0933444555', 'email' => 'contact@123.com', 'nguoi_lien_he' => 'Lê Văn Cao', 'so_luong_sinh_vien_tiep' => 8],
            ['ma_dn' => 'DN004', 'ten_dn' => 'Công ty Công Nghệ Mới', 'dia_chi' => '101 Mai Chí Thọ, Cần Thơ', 'sdt' => '0944555666', 'email' => 'contact@newtech.com', 'nguoi_lien_he' => 'Phạm Minh Dương', 'so_luong_sinh_vien_tiep' => 12],
            ['ma_dn' => 'DN005', 'ten_dn' => 'Công ty AI Việt', 'dia_chi' => '303 Phạm Văn Đồng, Hải Phòng', 'sdt' => '0955666777', 'email' => 'contact@aiviet.com', 'nguoi_lien_he' => 'Hoàng Thu Hoa', 'so_luong_sinh_vien_tiep' => 20],
        ]);
        DB::table('sinh_vien')->insert([
            ['ma_sv' => '22511001', 'ho_ten' => 'Phan Minh Khôi', 'ngay_sinh' => '2002-05-10', 'gioi_tinh' => 'Nam', 'lop' => '64KTPM1', 'sdt' => '0911222333', 'email' => 'pmk@example.com', 'dia_chi' => 'Hà Nội', 'ma_gv' => '101', 'ma_dn' => 'DN001'],
            ['ma_sv' => '22511002', 'ho_ten' => 'Nguyễn Thảo Vy', 'ngay_sinh' => '2001-11-15', 'gioi_tinh' => 'Nữ', 'lop' => '64KTPM2', 'sdt' => '0922333444', 'email' => 'ntv@example.com', 'dia_chi' => 'TP.HCM', 'ma_gv' => '201', 'ma_dn' => 'DN002'],
            ['ma_sv' => '22511003', 'ho_ten' => 'Trần Hữu Phước', 'ngay_sinh' => '2002-02-20', 'gioi_tinh' => 'Nam', 'lop' => '64KTPM1', 'sdt' => '0933444555', 'email' => 'thp@example.com', 'dia_chi' => 'Đà Nẵng', 'ma_gv' => '304', 'ma_dn' => 'DN003'],
            ['ma_sv' => '22511004', 'ho_ten' => 'Lê Quỳnh Anh', 'ngay_sinh' => '2001-08-25', 'gioi_tinh' => 'Nữ', 'lop' => '64KTPM2', 'sdt' => '0944555666', 'email' => 'lqa@example.com', 'dia_chi' => 'Cần Thơ', 'ma_gv' => '403', 'ma_dn' => 'DN004'],
            ['ma_sv' => '22511005', 'ho_ten' => 'Vũ Đình Bảo', 'ngay_sinh' => '2002-07-30', 'gioi_tinh' => 'Nam', 'lop' => '64KTPM3', 'sdt' => '0955666777', 'email' => 'vdb@example.com', 'dia_chi' => 'Hải Phòng', 'ma_gv' => '201', 'ma_dn' => NULL],
        ]);

        DB::table('do_an')->insert([
            [
                'ma_do_an' => 'DA001',
                'tieu_de' => 'Hệ thống quản lý sinh viên',
                'mo_ta' => 'Phát triển hệ thống quản lý sinh viên bằng Laravel',
                'thoi_gian_bat_dau' => '2024-01-10',
                'thoi_gian_ket_thuc' => '2024-06-15',
                'ma_sv' => '22511001',
                'ma_gv' => '101',
                'ma_dn' => 'DN001',
                'trang_thai' => 'Chưa hoàn thành',
                'diem_so' => null,
            ],
            [
                'ma_do_an' => 'DA002',
                'tieu_de' => 'Website thương mại điện tử',
                'mo_ta' => 'Xây dựng trang web bán hàng với PHP & MySQL',
                'thoi_gian_bat_dau' => '2024-02-01',
                'thoi_gian_ket_thuc' => '2024-07-01',
                'ma_sv' => '22511002',
                'ma_gv' => '201',
                'ma_dn' => 'DN002',
                'trang_thai' => 'Chưa hoàn thành',
                'diem_so' => null,
            ],
            [
                'ma_do_an' => 'DA003',
                'tieu_de' => 'Ứng dụng quản lý công việc',
                'mo_ta' => 'Phát triển app quản lý công việc trên nền tảng web',
                'thoi_gian_bat_dau' => '2024-03-01',
                'thoi_gian_ket_thuc' => '2024-08-01',
                'ma_sv' => '22511003',
                'ma_gv' => '101',
                'ma_dn' => 'DN003',
                'trang_thai' => 'Hoàn thành',
                'diem_so' => 8.5,
            ],
            [
                'ma_do_an' => 'DA004',
                'tieu_de' => 'Hệ thống đặt phòng khách sạn',
                'mo_ta' => 'Thiết kế hệ thống đặt phòng khách sạn trực tuyến',
                'thoi_gian_bat_dau' => '2024-04-10',
                'thoi_gian_ket_thuc' => '2024-09-10',
                'ma_sv' => '22511004',
                'ma_gv' => '304',
                'ma_dn' => 'DN004',
                'trang_thai' => 'Chưa hoàn thành',
                'diem_so' => null,
            ],
            [
                'ma_do_an' => 'DA005',
                'tieu_de' => 'Chatbot hỗ trợ khách hàng',
                'mo_ta' => 'Phát triển chatbot AI sử dụng Python',
                'thoi_gian_bat_dau' => '2024-05-01',
                'thoi_gian_ket_thuc' => '2024-10-01',
                'ma_sv' => '22511005',
                'ma_gv' => '403',
                'ma_dn' => 'DN005',
                'trang_thai' => 'Hoàn thành',
                'diem_so' => 9.0,
            ],
        ]);

    }
}
