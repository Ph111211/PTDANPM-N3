<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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

@section('title', 'Giảng viên hướng dẫn')

@section('content')
    <form class="m-lg-auto " style="width: 100%">

        <div class="d-grid justify-content-center align-items-center" style="height: 80vh; background: #f8f9fa;">
            <div class="card shadow p-4" style="width: 600px; border-radius: 10px;">
                <h4 class="fw-bold text-center">Đánh giá doanh nghiệp</h4>

                <div class="form-group mb-3">
                    <label for="ket_qua_thuc_tap" class="fw-bold"> Danh sách giảng viên khả dụng</label>
                    <select class="form-control" name="ket_qua_thuc_tap" id="ket_qua_thuc_tap">
                        <option value="">Danh sách sinh viên thực tập</option>
                        @foreach($ketquas as $gv)
                            <option value="{{ $gv->ma_sv }}" data-ten="{{ $gv->ten_dn }}"
                                    data-nx="{{ $gv->nhan_xet_cua_doanh_nghiep}}">{{ $gv->sinhvien->ho_ten }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="ten_dn" class="fw-bold">Tên doanh nghiệp</label>
                    <input type="text" class="form-control" id="ten_dn" placeholder="Tên doanh nghiệp"
                           readonly>
                </div>

                <div class="form-group mb-3">
                    <label for="nhan_xet" class="fw-bold">Nhận xét chi tiết</label>
                    <textarea class="form-control" id="nhan_xet" placeholder="Nhận xét chi tiết"></textarea>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" id ="cancel-btn  "class="btn btn-danger px-4 d-flex align-items-center">
                        <i class="fas fa-times me-2"></i> Hủy
                    </button>

                    <button type="submit" id="save-btn" class="btn btn-success px-4 d-flex align-items-center">
                        <i class="fas fa-save me-2"></i> Lưu
                    </button>
                    <!-- Modal thông báo tải thành công -->
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
                    <!-- Modal cảnh báo khi dữ liệu rỗng -->
                    <div class="modal fade" id="warningModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content text-center shadow-lg" style="border-radius: 10px;">
                                <div class="modal-body">
                                    <h4 class="fw-bold text-danger" id="warningMessage">Lỗi</h4>
                                    <button type="button" id="warning-ok-btn" class="btn btn-danger px-4 py-2"
                                            data-bs-dismiss="modal" aria-label="Close">
                                        OK
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
        let selectedOption;

        document.getElementById('ket_qua_thuc_tap').addEventListener('change', function () {
            selectedOption = this.options[this.selectedIndex];
            let doanhNghiep = selectedOption.getAttribute('data-ten');
            let nhanXet = selectedOption.getAttribute('data-nx');
            document.getElementById('ten_dn').value = doanhNghiep;
            document.getElementById('nhan_xet').value = nhanXet;
        });

        document.getElementById('save-btn').addEventListener('click', function (event) {
            event.preventDefault(); // Ngăn chặn submit form mặc định

            let tenDN = document.getElementById('ten_dn').value.trim();
            let nhanXet = document.getElementById('nhan_xet').value.trim();

            if (!tenDN) {
                showWarningModal("Vui lòng chọn kết quả thực tập để lấy tên doanh nghiệp!");
                return;
            }

            if (!nhanXet) {
                showWarningModal("Vui lòng nhập nhận xét chi tiết trước khi lưu!");
                return;
            }

            let noiDung = `Tên doanh nghiệp: ${tenDN}\nNhận xét chi tiết: ${nhanXet}`;

            let blob = new Blob([noiDung], { type: "text/plain" });
            let link = document.createElement("a");
            link.href = URL.createObjectURL(blob);
            link.download = "DanhGiaDoanhNghiep.txt";
            link.click();

            let successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();
        });

        document.getElementById('success-ok-btn').addEventListener('click', function () {
            window.location.href = "{{ route('danhgiatudoanhnghiep.index') }}";
        });

        document.getElementById('cancel-btn').addEventListener('click', function () {
            window.location.href = "{{ route('danhgiatudoanhnghiep.index') }}";
        });

        function showWarningModal(message) {
            document.getElementById('warningMessage').textContent = message;
            let warningModal = new bootstrap.Modal(document.getElementById('warningModal'));
            warningModal.show();
        }
    });
</script>
