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

@section('title', 'Kết quả thực tập')

@section('content')
    <form class="m-lg-auto " style="width: 100%">

        <div class="d-grid justify-content-center align-items-center" style="height: 80vh; background: #f8f9fa;">
            <div class="card shadow p-4" style="width: 600px; border-radius: 10px;">
                <h4 class="fw-bold text-center">Kết quả thực tập</h4>

                <div class="form-group mb-3">
                    <label for="ket_qua_thuc_tap" class="fw-bold"> Danh sách kết quả khả dụng</label>
                    <select class="form-control" name="ket_qua_thuc_tap" id="ket_qua_thuc_tap">
                        <option value="">Chọn kết quả quả thực tập</option>
                        @foreach($ketquas as $gv)
                            <option value="{{ $gv->ma_ket_qua }}" data-nx_gv="{{ $gv->nhan_xet_cua_giang_vien }}"
                                    data-nx="{{ $gv->nhan_xet_cua_doanh_nghiep}} "
                                    data-ds="{{ $gv->diem_so}}">{{ $gv->ma_ket_qua }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="nhan_xet_dn" class="fw-bold">Kết quả đánh giá từ doanh nghiệp</label>
                    <textarea class="form-control" id="nhan_xet_dn" placeholder="Kết quả đánh giá từ doanh nghiệp"
                              readonly></textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="nhan_xet_gv" class="fw-bold">Kết quả đánh giá từ giảng viên</label>
                    <textarea class="form-control" id="nhan_xet_gv" placeholder="Kết quả đánh giá từ giảng viên"
                              readonly></textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="kq" class="fw-bold">Kết quả hoàn thành nhiệm vụ thực tập</label>
                    <input class="form-control" id="kq" placeholder="Kết quả hoàn thành nhiệm vụ thực tập"
                           readonly></input>
                </div>

                <div class="d-flex justify-content-between mt-4">

                    <button type="submit" id="save-btn" class="btn btn-success px-4 d-flex align-items-center">
                        <i class="fas fa-save me-2"></i> Tải về
                    </button>

                    <button type="submit" id="cancel-btn" class="btn btn-success px-4 d-flex align-items-center">
                        OK
                    </button>

                    <!-- Modal thông báo thành công -->
                    <div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content text-center shadow-lg" style="border-radius: 10px;">
                                <div class="modal-body">
                                    <h4 class="fw-bold">Tải thành công</h4>
                                    <button type="button" id="success-ok-btn"
                                            class="btn btn-success d-flex align-items-center justify-content-center mx-auto px-4 py-2"
                                            data-bs-dismiss="modal" aria-label="Close" style="border-radius: 8px;">
                                        <i class="bi bi-check-lg me-2"></i> OK
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal xác nhận tải file -->
                    <div class="modal fade" id="confirmModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content text-center shadow-lg" style="border-radius: 10px;">
                                <div class="modal-body">
                                    <h4 class="fw-bold">Bạn có chắc muốn tải file không?</h4>
                                    <button type="button" id="confirm-ok-btn" class="btn style-button px-4 py-2">
                                        Có
                                    </button>
                                    <button type="button" class="btn style-button m-3 px-4 py-2"
                                            data-bs-dismiss="modal">
                                        Không
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
        let selectedData = {};
        let selectedOption;

        document.getElementById('ket_qua_thuc_tap').addEventListener('change', function () {
            selectedOption = this.options[this.selectedIndex];

            // Lấy giá trị và gán mặc định nếu không có dữ liệu
            selectedData.nhanXetGV = selectedOption.getAttribute('data-nx_gv') || "";
            selectedData.nhanXetDN = selectedOption.getAttribute('data-nx') || "";
            selectedData.diemSo = selectedOption.getAttribute('data-ds') || "";

            document.getElementById('nhan_xet_gv').value = selectedData.nhanXetGV;
            document.getElementById('nhan_xet_dn').value = selectedData.nhanXetDN;

            // Cập nhật kết quả hoàn thành dựa trên điểm số
            if (selectedData.diemSo !== "") {
                let diem = parseFloat(selectedData.diemSo);
                if (!isNaN(diem)) {
                    document.getElementById('kq').value = diem > 5 ? "Hoàn thành" : "Chưa hoàn thành";
                } else {
                    document.getElementById('kq').value = "Dữ liệu không hợp lệ";
                }
            } else {
                document.getElementById('kq').value = "";
            }

            // Xóa các thông báo lỗi nếu có
            clearError('nhan_xet_gv');
            clearError('nhan_xet_dn');
            clearError('kq');
        });

        document.getElementById('save-btn').addEventListener('click', function (event) {
            event.preventDefault(); // Ngăn submit form mặc định
            let isValid = true;

            let nhanXetGV = document.getElementById('nhan_xet_gv').value.trim();
            let nhanXetDN = document.getElementById('nhan_xet_dn').value.trim();
            let kq = document.getElementById('kq').value.trim();

            // Xóa các thông báo lỗi cũ
            clearError('nhan_xet_gv');
            clearError('nhan_xet_dn');
            clearError('kq');

            // Kiểm tra dữ liệu có bị null/empty hay không
            if (!nhanXetGV) {
                showError('nhan_xet_gv', "Vui lòng chọn kết quả thực tập để lấy nhận xét của giảng viên!");
                isValid = false;
            }
            if (!nhanXetDN) {
                showError('nhan_xet_dn', "Vui lòng chọn kết quả thực tập để lấy nhận xét của doanh nghiệp!");
                isValid = false;
            }
            if (!kq) {
                showError('kq', "Vui lòng chọn kết quả thực tập để xác định kết quả hoàn thành!");
                isValid = false;
            }

            if (!isValid) return;

            // Hiển thị modal xác nhận trước khi tải file
            let confirmModal = new bootstrap.Modal(document.getElementById('confirmModal'));
            confirmModal.show();

            document.getElementById('confirm-ok-btn').onclick = function () {
                confirmModal.hide();
                downloadFile(nhanXetGV, nhanXetDN, kq);
            };
        });

        function downloadFile(nhanXetGV, nhanXetDN, kq) {
            let noiDung = `Nhận xét từ giảng viên: ${nhanXetGV}\nNhận xét từ doanh nghiệp: ${nhanXetDN}\nKết quả thực tập: ${kq}`;

            let blob = new Blob([noiDung], {type: "text/plain"});
            let link = document.createElement("a");
            link.href = URL.createObjectURL(blob);
            link.download = "KetQuaThucTap.txt";
            link.click();

            let successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();
        }

        document.getElementById('success-ok-btn').addEventListener('click', function () {
            window.location.href = "{{ route('ketquathuctapsv.index') }}";
        });

        document.getElementById('cancel-btn').addEventListener('click', function () {
            window.location.href = "{{ route('ketquathuctapsv.index') }}";
        });

        // Hàm hiển thị lỗi: tạo thông báo lỗi cho input tương ứng
        function showError(id, message) {
            let inputField = document.getElementById(id);
            let errorElement = document.createElement("div");
            errorElement.classList.add("text-danger", "mt-1", "error-message");
            errorElement.innerHTML = message;
            inputField.parentNode.appendChild(errorElement);
        }

        // Hàm xóa lỗi: xóa thông báo lỗi của input tương ứng
        function clearError(id) {
            let inputField = document.getElementById(id);
            let errorElement = inputField.parentNode.querySelector(".error-message");
            if (errorElement) {
                errorElement.remove();
            }
        }
    });


</script>
