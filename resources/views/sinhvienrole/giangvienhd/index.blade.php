<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
</head>

@extends('layouts.sinhvien')

@section('title', 'Giảng viên hướng dẫn')

@section('content')
    <form action="{{ route('giangvienhd.updateSoLuong') }}" method="POST" class="m-lg-auto" style="width: 100%">
        @csrf <!-- Thêm token CSRF -->

        <div class="d-grid justify-content-center align-items-center" style="height: 80vh; background: #f8f9fa;">
            <div class="card shadow p-4" style="width: 600px; border-radius: 10px;">
                <h4 class="fw-bold text-center">Chọn Giảng Viên Hướng Dẫn</h4>

                <div class="form-group mb-3">
                    <label for="giang_vien" class="fw-bold">Danh sách giảng viên khả dụng</label>
                    <select class="form-control" name="giang_vien" id="giang_vien">
                        <option value="">Vui lòng chọn giảng viên!</option>
                        @foreach($giangviens as $gv)
                            <option value="{{ $gv->user_id }}"
                                    data-khoa="{{ $gv->khoa }}"
                                    data-so-luong="{{ $gv->so_luong_sinh_vien_huong_dan }}"
                                    data-email="{{ $gv->email }}">{{ $gv->ho_ten }}</option>
                        @endforeach
                    </select>
                    @error('giang_vien')
                    <p class="text-danger mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="chuyen_nganh" class="fw-bold">Chuyên ngành</label>
                    <input type="text" class="form-control" id="chuyen_nganh" placeholder="Chuyên ngành của giảng viên"
                           readonly>
                </div>
                <div class="form-group mb-3">
                    <label for="so_luong" class="fw-bold">Số lượng sinh viên đã nhận</label>
                    <input type="number" class="form-control" id="so_luong" placeholder="Số lượng sinh viên đã nhận"
                           readonly>
                </div>

                <div class="form-group mb-3">
                    <label for="email" class="fw-bold">Email</label>
                    <input class="form-control" id="email" placeholder="Email của giảng viên" readonly>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('giangvienhd.index') }}" class="btn btn-danger px-4 d-flex align-items-center">
                        <i class="fas fa-times me-2"></i> Hủy
                    </a>
                    <button type="submit" class="btn btn-success px-4 d-flex align-items-center">
                        <i class="fas fa-save me-2"></i> Lưu
                    </button>

                    <!-- Modal xác nhận -->
                    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmModalLabel">Xác nhận cập nhật</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Bạn có chắc chắn muốn cập nhật thông tin giảng viên hướng dẫn?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Không</button>
                                    <button type="button" class="btn btn-primary" id="confirm-ok-btn">Có</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-top">
                <div class="modal-content p-2">
                    <div class="modal-body alert text-center m-0 p-6 fw-bold" style="color: #2ca02c">
                        {{ session('success') }}
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- JavaScript để cập nhật thông tin khi chọn giảng viên -->
    <script>
        document.getElementById('giang_vien').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const khoa = selectedOption.getAttribute('data-khoa');
            const soLuong = selectedOption.getAttribute('data-so-luong');
            const email = selectedOption.getAttribute('data-email');

            document.getElementById('chuyen_nganh').value = khoa || '';
            document.getElementById('so_luong').value = soLuong || '';
            document.getElementById('email').value = email || '';
        });

        document.getElementById('confirm-ok-btn').addEventListener('click', function() {
            document.querySelector('form').submit(); // Gửi form sau khi xác nhận
        });
    </script>
@endsection
