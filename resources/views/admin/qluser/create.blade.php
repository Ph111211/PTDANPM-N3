<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initialscale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="/qltv/resources/views/bootstrap/css/bootstrap.css">
    <script src="/qltv/resources/views/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/qltv/resources/views/bootstrap/js/popper.min.js"></script>
    <!-- Liên kết Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Posts</title>
</head>
<body>


<h1 style="margin: 50px 50px">Thêm mới</h1>
<form action="{{ route('issues.store') }}" method="POST" style="margin: 50px 50px">
    @csrf <!--bảo vệ ứng dụng của bạn khỏi tấn công CSRF (Cross-Site Request Forgery0) bằng cách tạo một trường input ẩn với giá trị token-->
    <div class="form-group mb-3">
        <label for="owners_id" class="form-label">Chọn tên</label>
        <select class="form-control" id="owners_id" name="owners_id" required>
            <option value="">-- Chọn tên --</option>
            @foreach($owner as $it)
                <option value="{{ $it->id }}">{{ $it->name }} - {{ $it->address }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group mb-3">
        <label for="name" class="form-label">Tên thú cưng </label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group mb-3">
        <label for="species" class="form-label">Loài </label>
        <input type="text" class="form-control" id="species" name="species" required>
    </div>
    <div class="form-group mb-3">
        <label for="breed" class="form-label">Giống</label>
        <input type="text" class="form-control" id="breed" name="breed" required/>
    </div>

    <div class="form-group mb-3">
        <label for="age" class="form-label">Tuổi</label>
        <input type="text" class="form-control" id="age" name="age" required/>
    </div>

    <button type="submit" class="btn btn-primary">Thêm</button>
    <a href="{{ route('issues.index') }}" class="btn btn-secondary">Thoát</a>
</form>

</body>
