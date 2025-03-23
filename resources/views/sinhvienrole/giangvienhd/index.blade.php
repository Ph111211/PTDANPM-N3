<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
</head>
<body>
</body>


@extends('layouts.sinhvien')

@section('title', 'Giảng viên hướng dẫn')

@section('content')
    <form class="m-lg-auto " style="width: 100%">

        <div class="d-grid justify-content-center align-items-center" style="height: 80vh; background: #f8f9fa;">
            <div class="card shadow p-4" style="width: 600px; border-radius: 10px;">
                <h4 class="fw-bold text-center">Chọn Giảng Viên Hướng Dẫn</h4>

                <div class="form-group mb-3">
                    <label for="giang_vien" class="fw-bold"> Danh sách giảng viên khả dụng</label>
                    <select class="form-control" name="giang_vien" id="giang_vien">
                        <option value="">Vui lòng chọn giảng viên!</option>
                        @foreach($giangviens as $gv)
                            <option value="{{ $gv->user_id }}" data-khoa="{{ $gv->khoa }}"
                                    data-so-luong="{{ $gv->so_luong_sinh_vien_huong_dan}}">{{ $gv->ho_ten }}</option>
                        @endforeach
                    </select>
                    <p class="error text-danger mt-1" style="display: none;">* Vui lòng chọn giảng viên!</p>
                </div>

                <div class="form-group mb-3">
                    <label for="chuyen_nganh" class="fw-bold">Chuyên ngành</label>
                    <input type="text" class="form-control" id="chuyen_nganh" placeholder="Chuyên ngành của giảng viên"
                           readonly>
                    <p class="error text-danger mt-1" style="display: none;">* Chuyên ngành không thể bỏ trống!</p>
                </div>

                <div class="form-group mb-3">
                    <label for="so_luong" class="fw-bold">Số lượng sinh viên đã nhận</label>
                    <input type="number" class="form-control" id="so_luong" placeholder="Số lượng sinh viên đã nhận"
                           readonly>
                    <p class="error text-danger mt-1" style="display: none;">* Số lượng sinh viên không thể bỏ
                        trống!</p>
                </div>

                <div class="form-group mb-3">
                    <label for="tieu_chi" class="fw-bold">Tiêu chí hướng dẫn</label>
                    <textarea class="form-control" id="tieu_chi"
                              placeholder="Tiêu chí hướng dẫn của giảng viên"></textarea>
                    <p class="error text-danger mt-1" style="display: none;">* Vui lòng điền đầy đủ tiêu chí hướng
                        dẫn!</p>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-danger px-4 d-flex align-items-center">
                        <i class="fas fa-times me-2"></i> Hủy
                    </button>
                    <button type="submit" class="btn btn-success px-4 d-flex align-items-center">
                        <i class="fas fa-save me-2"></i> Lưu
                    </button>

                    <!-- Modal thông báo lỗi -->
                    <div class="modal fade" id="errorModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content text-center shadow-lg" style="border-radius: 10px;">
                                <div class="modal-body">
                                    <h4 class="fw-bold text-danger">Giảng viên đã đạt giới hạn hướng dẫn 10 sinh viên!</h4>
                                    <button type="button" id="error-ok-btn" class="btn btn-danger px-4 py-2"
                                            data-bs-dismiss="modal" aria-label="Close">
                                        OK
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal thông báo thành công -->
                    <div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content text-center shadow-lg" style="border-radius: 10px;">
                                <div class="modal-body">
                                    <h4 class="fw-bold text-success">Lưu thành công!</h4>
                                    <button type="button" id="success-ok-btn" class="btn btn-success px-4 py-2"
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
        let giangVienSelect = document.getElementById('giang_vien');
        let chuyenNganhInput = document.getElementById('chuyen_nganh');
        let soLuongInput = document.getElementById('so_luong');
        let tieuChiInput = document.getElementById('tieu_chi');
        let saveButton = document.querySelector('.btn-success');

        // Khi chọn giảng viên, cập nhật thông tin
        giangVienSelect.addEventListener('change', function () {
            let selectedOption = this.options[this.selectedIndex];
            chuyenNganhInput.value = selectedOption.getAttribute('data-khoa') || "";
            soLuongInput.value = selectedOption.getAttribute('data-so-luong') || "";
        });

        saveButton.addEventListener('click', function (event) {
            event.preventDefault(); // Ngăn chặn submit form mặc định

            let selectedOption = giangVienSelect.options[giangVienSelect.selectedIndex];
            let giangVienId = parseInt(giangVienSelect.value); // Lấy ID giảng viên
            let soLuong = parseInt(selectedOption.getAttribute('data-so-luong') || "0");

            // Kiểm tra nếu chưa chọn giảng viên hoặc tiêu chí rỗng
            if (!giangVienId || !tieuChiInput.value) {
                alert("Vui lòng nhập đầy đủ thông tin!");
                return;
            }

            // Kiểm tra nếu số lượng > 10
            if (soLuong >= 10) {
                let errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                errorModal.show();
                return;
            }

            // Cập nhật số lượng sinh viên hướng dẫn (tăng 1)
            let newSoLuong = soLuong + 1;
            selectedOption.setAttribute('data-so-luong', newSoLuong);
            soLuongInput.value = newSoLuong;

            // Gửi request cập nhật vào database
            fetch(`{{ url('/capnhatgiangvien') }}/${giangVienId}`, {
                method: "PUT",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    so_luong: newSoLuong // Đảm bảo bạn gửi 'so_luong'
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        let successModal = new bootstrap.Modal(document.getElementById('successModal'));
                        successModal.show();

                        setTimeout(function () {
                            successModal.hide();
                            window.location.href = "{{ route('giangvienhd.index') }}";
                        }, 3000);
                    }
                });
        });

        document.getElementById('success-ok-btn').addEventListener('click', function () {
            window.location.href = "{{ route('giangvienhd.index') }}";
        });

        document.getElementById('error-ok-btn').addEventListener('click', function () {
            document.getElementById('errorModal').classList.remove('show');
        });
    });


</script>
