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

@section('title', 'Giảng viên hướng dẫn')

@section('content')

    <form class="m-lg-auto " style="width: 100%" action="/capnhat-giangvien/{{ $giangvienhd->first()->ma_do_an ?? '' }}"
          method="POST">
          @csrf
          @method('PUT')

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
                    <input type="number" class="form-control" id="so_luong" placeholder="Số lượng sinh viên đã nhận" name="so_luong" value="{{$gv->so_luong_sinh_vien_huong_dan}}"                           readonly>
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
                </div>
            </div>
        </div>
    </form>

@endsection

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let selectedOption;

        document.getElementById('giang_vien').addEventListener('change', function () {
            selectedOption = this.options[this.selectedIndex];
            let khoa = selectedOption.getAttribute('data-khoa');
            let soLuong = parseInt(selectedOption.getAttribute('data-so-luong'));
            document.getElementById('chuyen_nganh').value = khoa;
            document.getElementById('so_luong').value = soLuong;
        });

        document.getElementById('save-btn').addEventListener('click', function () {
            if (!selectedOption) {
                alert("Vui lòng chọn giảng viên!");
                return;
            }

            let soLuong = parseInt(selectedOption.getAttribute('data-so-luong'));
            if (soLuong >= 10) {
                alert("Số lượng sinh viên đã đạt giới hạn (10)!");
                return;
            }

            soLuong++;
            document.getElementById('so_luong').value = soLuong;
            selectedOption.setAttribute('data-so-luong', soLuong);

            let selectedGV = document.getElementById('giang_vien').value;
            let chuyenNganh = document.getElementById('chuyen_nganh').value;

            // Kiểm tra các trường nhập liệu
            let errors = false;
            if (!selectedGV) {
                alert("Vui lòng chọn giảng viên!");
                errors = true;
            }
            if (!tieuChi) {
                document.querySelector('#tieu_chi + .error').style.display = 'block';
                errors = true;
            } else {
                document.querySelector('#tieu_chi + .error').style.display = 'none';
            }

            if (errors) return;

            fetch(`/capnhat-giangvien/{{ $giangvienhd->first()->ma_do_an ?? '' }}`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    giang_vien: selectedGV,
                    chuyen_nganh: chuyenNganh,
                    so_luong: soLuong,
                })
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    setTimeout(function () {
                        window.location.href = "{{ route('giangvienhd.index') }}";
                    }, 100);
                })
                .catch(error => {
                    console.error('Error:', error); // In lỗi ra console
                    alert("Lỗi khi cập nhật giảng viên: " + error.message);
                });
        });

        document.getElementById('cancel-btn').addEventListener('click', function () {
            window.location.href = "{{ route('giangvienhd.index') }}";
        });
    });

</script>
