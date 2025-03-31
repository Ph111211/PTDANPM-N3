document.addEventListener("DOMContentLoaded", function () {
    // Hiển thị modal chỉnh sửa user khi nhấn nút edit
    $(".edit-btn").click(function () {
        var userId = $(this).data("id");
        console.log("Mở modal của user:", userId);
        $("#editUserModal" + userId).modal("show");
    });

    // Hiển thị modal khi có session success
    if (typeof successMessage !== "undefined" && successMessage) {
        $("#successModal").modal("show");
    }

    // Ẩn modal thành công sau 5 giây
    setTimeout(function () {
        var successModal = bootstrap.Modal.getInstance(document.getElementById("successModal"));
        if (successModal) {
            successModal.hide();
        }
    }, 5000);

    // Xác nhận gửi form chỉnh sửa
    window.submitEditForm = function (userId) {
        document.getElementById("editForm" + userId).submit();
    };

    window.autoResize = function autoResize(textarea) {
        textarea.style.height = "auto"; // Reset chiều cao trước
        textarea.style.height = textarea.scrollHeight + "px"; // Đặt chiều cao theo nội dung
    }

    window.submitEditDoAnForm = function submitEditDoAnForm(id) {
        document.getElementById('editForm' + id).submit();
    }
    window.submitEditPhanCong =function submitEditPhanCong(maDoAn) {
        document.getElementById('editForm' + maDoAn).submit();
    }
    // Xác nhận gửi form tạo user
    $("#confirmSubmit").click(function () {
        var modal = bootstrap.Modal.getInstance(document.getElementById("addConfirmModal"));
        modal.hide();

        setTimeout(function () {
            $("#createUserForm").submit();
        }, 300);
    });

    // Xác nhận form thêm tài khoản
    window.submitCreateForm = function () {
        var modal = bootstrap.Modal.getInstance(document.getElementById("confirmAddModal"));
        modal.hide();
        setTimeout(function () {
            document.getElementById("createUserForm").submit();
        }, 300);
    };

    // Kiểm tra hợp lệ form trước khi submit
    window.validateForm = function () {
        var form = document.getElementById("createUserForm");

        if (form.checkValidity()) {
            var addUserModal = bootstrap.Modal.getInstance(document.getElementById("addUserModal"));
            addUserModal.hide();

            setTimeout(() => {
                var confirmModal = new bootstrap.Modal(document.getElementById("confirmAddModal"));
                confirmModal.show();
            }, 300);
        } else {
            form.reportValidity();
        }
    };

    // window.assignGiangVien =
    //     function assignGiangVien(maDoAn, maGv) {
    //         fetch('{{ route("assign.giangvien") }}', {
    //             method: 'POST',
    //             headers: {
    //                 'Content-Type': 'application/json',
    //                 'X-CSRF-TOKEN': '{{ csrf_token() }}'
    //             },
    //             body: JSON.stringify({
    //                 ma_do_an: maDoAn,
    //                 ma_gv: maGv
    //             })
    //         })
    //             .then(response => response.json())
    //             .then(data => {
    //                 if (data.success) {
    //                     alert("Giảng viên đã được gán thành công!");
    //                     location.reload(); // Reload trang để cập nhật dữ liệu
    //                 } else {
    //                     alert("Lỗi! Không thể gán giảng viên.");
    //                 }
    //             })
    //             .catch(error => console.error('Lỗi:', error));
    //     }
});
