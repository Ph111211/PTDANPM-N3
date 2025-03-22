<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
</body>

@extends('layouts.sinhvien')

@section('title', 'Kết quả thực tập')

@section('content')
    <form class="m-lg-auto " style="width: 100%">

        <div class="d-grid justify-content-center align-items-center" style="height: 80vh; background: #f8f9fa;">
            <div class="card shadow p-4" style="width: 600px; border-radius: 10px;">
                <h4 class="fw-bold text-center">Chọn Giảng Viên Hướng Dẫn</h4>

                <div class="form-group mb-3">
                    <label for="ket_qua_thuc_tap" class="fw-bold"> Danh sách giảng viên khả dụng</label>
                    <select class="form-control" name="ket_qua_thuc_tap" id="ket_qua_thuc_tap">
                        <option value="">Danh sách mã kết quả thực tập</option>
                        @foreach($ketquas as $gv)
                            <option value="{{ $gv->ma_ket_qua }}" data-nx_gv="{{ $gv->nhan_xet_cua_giang_vien }}"
                                    data-nx="{{ $gv->nhan_xet_cua_doanh_nghiep}} " data-ds="{{ $gv->diem_so}}">{{ $gv->ma_ket_qua }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="nhan_xet_dn" class="fw-bold">Kết quả đánh giá từ doanh nghiệp</label>
                    <textarea class="form-control" id="nhan_xet_dn" placeholder="Kết quả đánh giá từ doanh nghiệp" readonly></textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="nhan_xet_gv" class="fw-bold">Kết quả đánh giá từ giảng viên</label>
                    <textarea class="form-control" id="nhan_xet_gv" placeholder="Kết quả đánh giá từ giảng viên" readonly></textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="kq" class="fw-bold">Kết quả hoàn thành nhiệm vụ thực tập</label>
                    <input class="form-control" id="kq" placeholder="Kết quả hoàn thành nhiệm vụ thực tập" readonly></input>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" id ="cancel-btn" class="btn btn-danger px-4 d-flex align-items-center">
                        <i class="fas fa-times me-2"></i> Hủy
                    </button>

                    <button type="submit" id="save-btn" class="btn btn-success px-4 d-flex align-items-center">
                        <i class="fas fa-save me-2"></i> Lưu
                    </button>
                    <!-- Modal thông báo thành công -->
                    <div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content text-center shadow-lg" style="border-radius: 10px;">
                                <div class="modal-body">
                                    <h4 class="fw-bold">Tải thành công</h4>
                                    <button type="button" id="success-ok-btn" class="btn btn-success d-flex align-items-center justify-content-center mx-auto px-4 py-2"
                                            data-bs-dismiss="modal" aria-label="Close" style="border-radius: 8px;">
                                        <i class="bi bi-check-lg me-2"></i> OK
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById('ket_qua_thuc_tap').addEventListener('change', function () {
            let selectedOption = this.options[this.selectedIndex];

            let nhanXetGV = selectedOption.getAttribute('data-nx_gv');
            let nhanXetDN = selectedOption.getAttribute('data-nx');
            let diemSo = selectedOption.getAttribute('data-ds'); // Lấy điểm số từ option

            document.getElementById('nhan_xet_gv').value = nhanXetGV || "";
            document.getElementById('nhan_xet_dn').value = nhanXetDN || "";

            // Cập nhật kết quả thực tập dựa trên điểm số mà không cần ô input
            if (diemSo !== null && diemSo !== "") {
                let diem = parseFloat(diemSo);
                document.getElementById('kq').value = diem > 5 ? "Hoàn thành" : "Chưa hoàn thành";
            } else {
                document.getElementById('kq').value = "";
            }
        });

        document.getElementById('save-btn').addEventListener('click', function (event) {
            event.preventDefault(); // Ngăn chặn form submit mặc định

            // Lấy nội dung từ các ô nhập
            let nhanXetGV = document.getElementById('nhan_xet_gv').value;
            let nhanXetDN = document.getElementById('nhan_xet_dn').value;
            let ketQua = document.getElementById('kq').value;

            // Nội dung file text
            let noiDung = `Nhận xét từ giảng viên: ${nhanXetGV}\nNhận xét từ doanh nghiệp: ${nhanXetDN}\nKết quả thực tập: ${ketQua}`;

            // Tạo file .txt và tải về
            let blob = new Blob([noiDung], { type: "text/plain" });
            let link = document.createElement("a");
            link.href = URL.createObjectURL(blob);
            link.download = "KetQuaThucTap.txt";
            link.click();

            // Hiển thị modal thông báo thành công
            let successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();
            // Chuyển hướng sau khi đóng modal
            document.getElementById('success-ok-btn').addEventListener('click', function () {
                window.location.href = "{{ route('ketquathuctapsv.index') }}";
            });
        });

        document.getElementById('cancel-btn').addEventListener('click', function () {
            window.location.href = "{{ route('ketquathuctapsv.index') }}";
        });
    });
</script>
