<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Phân công giảng viên</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
@extends('layouts.app')

@section('title', 'Phân công giảng viên')

@section('content')
    <div class="container-xl">

        <div class="table-responsive">
            <div class="table-wrapper">
                <div>
                    <div class="row mb-3">
                        <div class="row mb-3 d-flex justify-content-between align-items-center">
                            <h1 class="fw-bold text-center" style="color: #000000">Phân công giảng viên</h1>
                        </div>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead class="table-secondary">
                    <tr>
                        <th>Mã SV</th>
                        <th>Họ và tên</th>
                        <th>Lớp</th>
                        <th>Đề tài</th>
                        <th>Giảng viên</th>
                        <th>Tiến độ</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($doans as $it)
                        <tr>
                            <td class="center-td">{{ $it->ma_do_an}}</td>
                            <td class="center-td">{{ $it->sinhvien->ho_ten}}</td>
                            <td class="center-td">{{ $it->sinhvien->lop }}</td>
                            <td class="center-td">{{ $it->tieu_de}}</td>
                            <td class="center-td">{{ $it->user_id }}
                                @if ($it->giangvien)
                                    {{ $it->giangvien->ho_ten }}
                                @else
                                    <button type="button" class="btn btn-sm edit-btn btn-create align-items-center"
                                            data-bs-toggle="modal" data-bs-target="#listGiangVienModal_{{ $it->ma_do_an}}"
                                            style="background-color: #87CEEB; color: black">
                                        <i class="material-icons" style="vertical-align: middle; line-height: 1;">&#xE145;</i>
                                    </button>
                                @endif

                                <!-- Modal danh sách giảng viên -->
                                <div class="modal fade" id="listGiangVienModal_{{ $it->ma_do_an}}" tabindex="-1">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            </div>
                                            <div class="modal-body">
                                                <table class="table table-hover">
                                                    <thead class="table-secondary">
                                                    <tr>
                                                        <th>Mã Giảng Viên</th>
                                                        <th>Họ và Tên</th>
                                                        <th>Khoa</th>
                                                        <th>Số lượng sinh viên</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($giangviens as $gv)
                                                        <tr>
                                                            <td>{{ $gv->user_id }}</td>
                                                            <td>{{ $gv->ho_ten }}</td>
                                                            <td>{{ $gv->khoa }}</td>
                                                            <td>{{ $gv->so_luong_sinh_vien_huong_dan }}</td>
                                                            <td>
                                                                <button type="button" class="btn btn-primary"
                                                                        onclick="assignGiangVien('{{ $it->ma_do_an }}', '{{ $gv->user_id }}')">
                                                                    Chọn
                                                                </button>
                                                                <script>
                                                                    function assignGiangVien(maDoAn, maGv) {
                                                                       
                                                                        console.log("Đã nhấn nút chọn giảng viên!", maDoAn, maGv); // Kiểm tra xem hàm có chạy không
                                                                        fetch('{{ route("assign.giangvien") }}', {
                                                                            method: 'POST',
                                                                            headers: {
                                                                                'Content-Type': 'application/json',
                                                                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                                            },
                                                                            body: JSON.stringify({
                                                                                ma_do_an: maDoAn,
                                                                                ma_gv: maGv
                                                                            })
                                                                        })
                                                                            .then(response => response.json())
                                                                            .then(data => {
                                                                                console.log("Response từ server:", data); // Kiểm tra dữ liệu trả về
                                                                                if (data.success) {
                                                                                    alert("Giảng viên đã được gán thành công!");
                                                                                    location.reload();
                                                                                } else {
                                                                                    alert("Lỗi! Không thể gán giảng viên.");
                                                                                }
                                                                            })
                                                                            .catch(error => console.error('Lỗi:', error));

                                                                        
                                                                    }
                                                                </script>

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-danger px-5 small-text-input text-center " data-bs-dismiss="modal">Hủy</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="center-td">{{ $it->trang_thai}}</td>

                            
                            <td class="center-td">
                            <button type="button" class="btn btn-sm edit-btn" style="background: #87CEEB"
                                        data-bs-toggle="modal" data-bs-target="#editUserModal{{ $it->ma_do_an }}">
                                    <i class="bi bi-pencil-square"></i>
                            </button>


                                <div class="modal fade" id="editUserModal{{$it->ma_do_an}}" tabindex="-1"
                                     aria-labelledby="editUserModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <h5 class="modal-title text-center fw-bold" id="editUserModalLabel">
                                                    Sửa người dùng
                                                </h5>

                                                <form id="editForm{{$it->ma_do_an}}"
                                                      action="{{ route('phancong.update', $it->ma_do_an)}}" method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <input type="hidden" name="ma_do_an" value="{{ $it->ma_do_an }}"> <div class="form-group">
                                                        <label class="fw-bold mt-3 text-start d-block"
                                                               for="ma">Mã</label>
                                                        <input type="text" class="form-control small-text-input" id="ma"
                                                               name="ma" value="{{ $it->ma_do_an  }}" readonly>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="fw-bold mt-3 text-start  d-block" for="name">Họ và
                                                            tên</label>
                                                        <input type="text" class="form-control" id="name" name="ho_ten"
                                                               value="{{ $it->sinhvien->ho_ten }}" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="fw-bold mt-3 text-start  d-block" for="lop">Lớp</label>
                                                        <input type="text" class="form-control" id="lop" name="lop"
                                                               value="{{ $it->sinhvien->lop }}" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="fw-bold mt-3 text-start  d-block" for="dia_chi">Địa chỉ</label>
                                                        <input type="text" class="form-control" id="dia_chi" name="dia_diem"
                                                               value="{{ $it->dia_diem }}" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="fw-bold mt-3 text-start  d-block" for="tieu_de">Tiêu đề</label>
                                                        <input type="text" class="form-control small-text-input"
                                                               id="tieu_de" name="tieu_de" value="{{ $it->tieu_de }}"
                                                               required>
                                                    </div>

                                                    <div class="modal-footer d-flex justify-content-between mb-5">
                                                        <button type="button"
                                                                class="btn btn-outline-danger px-5 small-text-input"
                                                                data-bs-dismiss="modal">Hủy
                                                        </button>
                                                        <button type="button" class="btn px-5 small-text-input style-button"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#confirmUpdateModal{{ $it->ma_do_an }}">
                                                            Cập nhật
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="confirmUpdateModal{{ $it->ma_do_an }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body text-center">
                                                <p class="fw-bold">Bạn có chắc chắn muốn cập nhật thông tin không?</p>

                                                <button type="button" class="btn style-button px-4 mr-3" onclick="submitEditPhanCong({{ $it->ma_do_an }})">
                                                    Có
                                                </button>
                                                <button type="button" class="btn style-button" data-bs-dismiss="modal">
                                                    Không
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-sm" style="background: #87CEEB"
                                        data-bs-toggle="modal" data-bs-target="#deleteModal{{ $it->ma_do_an }}">
                                    <i class="bi bi-trash-fill"></i>
                                </button>

                                <div class="modal fade" id="deleteModal{{ $it->ma_do_an }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body text-center">
                                                <p class="fw-bold">Bạn có chắc chắn muốn xóa không?</p>

                                                <form action="{{ route('phancong.destroy', $it->ma_do_an ) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn style-button px-4 mr-3">Có</button>
                                                    <button type="button" class="btn style-button"
                                                            data-bs-dismiss="modal">Không
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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
    </div>
@endsection
</body>

<script>
    var successMessage = "{{ session('success') }}";
</script>

<script src="{{ asset('js/scriptsAdmin.js') }}"></script>
</html>
