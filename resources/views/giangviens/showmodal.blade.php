
<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="showModalLabel">Thêm Giảng Viên</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('giangviens.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="ma_gv">Mã <span class="text-danger">&nbsp;*</span></label>
                        <input type="text" class="form-control" id="ma_gv" name="ma_gv" required>
                    </div>
                    <div class="form-group">
                        <label for="ho_ten">Họ và Tên<span class="text-danger">&nbsp;*</span></label>
                        <input type="text" class="form-control" id="ho_ten" name="ho_ten" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email<span class="text-danger">&nbsp;*</span></label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="khoa">Khoa<span class="text-danger">&nbsp;*</span></label>
                        <input type="text" class="form-control" id="khoa" name="khoa" required>
                    </div>
                    <div class="form-group">
                        <label for="sdt">Số Điện Thoại<span class="text-danger">&nbsp;*</span></label>
                        <input type="text" class="form-control" id="sdt" name="sdt" required>
                    </div>
                    <div class="modal-footer d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>