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

    window.autoResize =function autoResize(textarea) {
        textarea.style.height = "auto"; // Reset chiều cao trước
        textarea.style.height = textarea.scrollHeight + "px"; // Đặt chiều cao theo nội dung
    }

    window.submitEditDoAnForm = function submitEditDoAnForm(id) {
        document.getElementById('editForm' + id).submit();
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
});
