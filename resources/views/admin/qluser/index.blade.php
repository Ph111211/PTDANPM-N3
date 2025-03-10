<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Quản lý người dùng</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <style>
        body {
            color: #566787;
            background: #f5f5f5;
            font-family: 'Varela Round', sans-serif;
            font-size: 13px;
        }
        .table-responsive {
            margin: 30px 0;
        }
        .table-wrapper {
            background: #fff;
            padding: 20px 25px;
            border-radius: 3px;
            min-width: 1000px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }
        .table-title {
            background: #f5f6fa;
            color: #000000;
            padding: 16px 30px;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
        }
        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }
        table.table td a.edit { color: #FFC107; }
        table.table td a.delete { color: #F44336; }
    </style>
</head>
<body>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Quản lý người dùng</h2>
                    </div>
                    <div class="col-sm-8 mt-3 text-left">
                      <span class="btn btn-success mr-3" style="background-color: #003C75">Danh sách</span>

                        <a href="{{ route('qluser.create') }}" class="btn" style="background-color: #003C75; color: white; ">
                            <i class="material-icons" style="vertical-align: middle; line-height: 1;">&#xE145;</i>
                            <span>Tạo tài khoản mói</span>
                        </a>
                    </div>
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                <tr style="background: #E7E9EE;color: #000000">
                    <th>Mã</th>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>Vai trò</th>
                    <th>Số điện thoại</th>
                    <th>Hành động</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($qlusers as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->ho_ten }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->vai_tro }}</td>
                        <td>{{ $user->so_dien_thoai }}</td>

                        <td>
                            <!-- Nút Sửa -->
                            <a href="{{ route('qluser.edit', $user->id) }}" class="btn btn-sm" style="background: #87CEEB">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            <!-- Nút Xóa -->
                            <button type="button" class="btn btn-sm" style="background: #87CEEB" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $user->id }}">
                                <i class="bi bi-trash-fill"></i>
                            </button>

                            <!-- Modal Xác nhận Xóa -->
                            <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Xác nhận xóa</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            Bạn có chắc chắn muốn xóa người dùng này không?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                            <form action="{{ route('qluser.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Xóa</button>
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
                {{ $qlusers->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
</body>
</html>
