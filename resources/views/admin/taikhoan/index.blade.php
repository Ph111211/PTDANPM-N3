<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Quản lý tài khoản</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div>
                <div class="row mb-3">
                    <div class="row mb-3 d-flex justify-content-between align-items-center">
                        <h1 class="fw-bold text-center" style="color: #000000">Quản lý tài khoản</h1>
                    </div>

                    <div class="col-md-6">
                        <!-- Nút mở modal thêm tài khoản -->
                        <button type="button" class="btn btn-sm edit-btn btn-create" data-bs-toggle="modal" data-bs-target="#addUserModal" style="background-color: #003C75; color: white;">
                            <i class="material-icons" style="vertical-align: middle; line-height: 1;">&#xE145;</i>
                            Tạo tài khoản mới
                        </button>

                        <!-- Modal thêm tài khoản -->
                        <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <h5 class="modal-title text-center fw-bold" style="color: #000000" id="addUserModalLabel">Tạo tài khoản mới</h5>
                                        <form id="createUserForm" action="{{ route('taikhoan.store') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label class="fw-bold mt-3" for="ho_ten">
                                                    Họ và tên
                                                    <i class="bi bi-asterisk text-danger small-icon"></i>
                                                </label>
                                                <input type="text" class="form-control" style="background: #E7E9EE" id="ho_ten" name="ho_ten" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="fw-bold mt-3" for="email">
                                                    Email
                                                    <i class="bi bi-asterisk text-danger small-icon"></i>
                                                </label>
                                                <input type="email" class="form-control small-text-input" style="background: #E7E9EE" id="email" name="email" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="fw-bold mt-3" for="vai_tro">
                                                    Vai trò
                                                    <i class="bi bi-asterisk text-danger small-icon"></i>
                                                </label>
                                                <select name="vai_tro" class="form-control " style="background: #E7E9EE" >
                                                    <option value="Giảng viên">Giảng viên</option>
                                                    <option value="Sinh viên">Sinh viên</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="fw-bold mt-3" for="sdt">
                                                    Số điện thoại
                                                    <i class="bi bi-asterisk text-danger small-icon"></i>
                                                </label>
                                                <input type="tel" class="form-control small-text-input" style="background: #E7E9EE"  id="sdt" name="sdt" required>
                                            </div>

                                            <div class="form-group">
                                                <label class="fw-bold mt-3" for="ma">
                                                    Mã người dùng
                                                    <i class="bi bi-asterisk text-danger small-icon"></i>
                                                </label>
                                                <input type="text" class="form-control small-text-input" style="background: #E7E9EE"  id="ma" name="ma" required>
                                            </div>

                                            <div class="form-group">
                                                <label class="fw-bold mt-3" for="mat_khau">
                                                    Mật khẩu
                                                    <i class="bi bi-asterisk text-danger small-icon"></i>
                                                </label>
                                                <input type="password" class="form-control" style="background: #E7E9EE"  id="mat_khau" name="mat_khau" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="fw-bold mt-3" for="password_confirmation">
                                                    Xác nhận mật khẩu
                                                    <i class="bi bi-asterisk text-danger small-icon"></i>
                                                </label>
                                                <input type="password" class="form-control" style="background: #E7E9EE"  id="password_confirmation" name="password_confirmation" required>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-between mb-5">
                                                <button type="button" class="btn btn-outline-danger px-5 small-text-input" data-bs-dismiss="modal">Hủy</button>
                                                <button type="button" class="btn style-button px-5 small-text-input" onclick="validateForm()">Tạo</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Xác Nhận Thêm -->
                        <div class="modal fade" id="confirmAddModal" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body text-center">
                                        <p class="fw-bold">Bạn có chắc chắn muốn thêm tài khoản không?</p>
                                        <button type="button" class="btn style-button px-4 mr-3" onclick="submitCreateForm()">Có</button>
                                        <button type="button" class="btn style-button" data-bs-dismiss="modal">Không</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th  style="background: #E7E9EE;color: #000000">Mã</th>
                    <th  style="background: #E7E9EE;color: #000000">Họ tên</th>
                    <th  style="background: #E7E9EE;color: #000000">Email</th>
                    <th  style="background: #E7E9EE;color: #000000">Vai trò</th>
                    <th  style="background: #E7E9EE;color: #000000">Số điện thoại</th>
                    <th  style="background: #E7E9EE;color: #000000">Hành động</th>

                </tr>
                </thead>
                <tbody>
                @foreach ($taikhoans as $tk)
                    <tr>
                        <td>{{ $tk->ma }}</td>
                        <td>{{ $tk->ho_ten }}</td>
                        <td>{{ $tk->email }}</td>
                        <td>{{ $tk->vai_tro }}</td>
                        <td>{{ $tk->sdt }}</td>

                        <td>
                            <button type="button" class="btn btn-sm edit-btn" style="background: #87CEEB" data-id="{{ $tk->id }}">
                                <i class="bi bi-pencil-square"></i>
                            </button>

                            <!-- Modal Sửa Người Dùng -->
                            <div class="modal fade" id="editUserModal{{ $tk->id }}" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <h5 class="modal-title text-center fw-bold" id="editUserModalLabel">Sửa người dùng</h5>

                                            <form id="editForm{{ $tk->id }}" action="{{ route('taikhoan.update', $tk->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <div class="form-group">
                                                    <label class="fw-bold mt-3" for="ma">Mã</label>
                                                    <input type="text" class="form-control small-text-input" id="ma" name="ma" value="{{ $tk->ma }}" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label class="fw-bold mt-3" for="name">Họ và tên</label>
                                                    <input type="text" class="form-control" id="name" name="ho_ten" value="{{ $tk->ho_ten }}" required>
                                                </div>

                                                <div class="form-group">
                                                    <label class="fw-bold mt-3" for="email">Email</label>
                                                    <input type="email" class="form-control small-text-input" id="email" name="email" value="{{ $tk->email }}" required>
                                                </div>

                                                <div class="form-group">
                                                    <label class="fw-bold mt-3" for="role">Vai trò</label>
                                                    <select name="vai_tro" class="form-control">
                                                        <option value="Giảng viên" {{ $tk->vai_tro == 'Giảng viên' ? 'selected' : '' }}>Giảng viên</option>
                                                        <option value="Sinh viên" {{ $tk->vai_tro == 'Sinh viên' ? 'selected' : '' }}>Sinh viên</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label class="fw-bold mt-3" for="phone">Số điện thoại</label>
                                                    <input type="tel" class="form-control small-text-input" id="phone" name="sdt" value="{{ $tk->sdt }}" required>
                                                </div>

                                                <div class="modal-footer d-flex justify-content-between mb-5">
                                                    <button type="button" class="btn btn-outline-danger px-5 small-text-input" data-bs-dismiss="modal">Hủy</button>
                                                    <!-- Button mở modal xác nhận -->
                                                    <button type="button" class="btn style-button px-5 small-text-input " data-bs-toggle="modal" data-bs-target="#confirmUpdateModal{{ $tk->id }} ">Cập nhật</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Xác Nhận Cập Nhật -->
                            <div class="modal fade" id="confirmUpdateModal{{ $tk->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body text-center">
                                            <p class="fw-bold">Bạn có chắc chắn muốn cập nhật thông tin không?</p>

                                            <!-- Nút xác nhận sẽ gọi JavaScript để submit form chỉnh sửa -->
                                            <button type="button" class="btn style-button px-4 mr-3" onclick="submitEditForm({{ $tk->id }})">Có</button>
                                            <button type="button" class="btn style-button" data-bs-dismiss="modal">Không</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Nút Xóa -->
                            <button type="button" class="btn btn-sm" style="background: #87CEEB" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $tk->id }}">
                                <i class="bi bi-trash-fill"></i>
                            </button>

                            <!-- Modal Xác nhận Xóa -->
                            <div class="modal fade" id="deleteModal{{ $tk->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body text-center">
                                            <p class="fw-bold">Bạn có chắc chắn muốn xóa không?</p>

                                            <!-- Form Xóa -->
                                            <form action="{{ route('taikhoan.destroy', $tk->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn style-button px-4 mr-3">Có</button>
                                                <button type="button" class="btn style-button" data-bs-dismiss="modal">Không</button>
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
            <div class="d-flex justify-content-center">
                {{ $taikhoans->links('pagination::bootstrap-4') }}
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

</div>
</body>
<script>
    var successMessage = "{{ session('success') }}";
</script>
<script src="{{ asset('js/scriptsAdmin.js') }}"></script>
</html>
