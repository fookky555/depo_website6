$(document).ready(function(){





    $('.edit_work_status').on('click', function(e) {
        e.preventDefault();
        swal({
            title: 'แก้ไขสถานะของร้าน?',
            text: '',
            icon: 'warning',
            buttons: {
                cancel: {
                    text: 'ยกเลิก',
                    visible: true,
                    closeModal: true
                },
                confirm: {
                    text: 'ยืนยัน',
                    value: true,
                    visible: true,
                    className: "bg-warning",
                    closeModal: true
                }
            }
        }).then(function(isConfirm) {
            if (isConfirm) {
                window.location.href = $(e.currentTarget).data('link');
            }
        });

    });
    $('.delete_work').on('click', function(e) {
        e.preventDefault();
        swal({
            title: 'ต้องการลบข้อมูลของร้าน?',
            text: 'ข้อมูลทั้งหมดจะไม่สามารถนำกลับมาได้',
            icon: 'warning',
            buttons: {
                cancel: {
                    text: 'ยกเลิก',
                    visible: true,
                    closeModal: true
                },
                confirm: {
                    text: 'ยืนยัน',
                    value: true,
                    visible: true,
                    className: "bg-danger",
                    closeModal: true
                }
            }
        }).then(function(isConfirm) {
            if (isConfirm) {
                window.location.href = $(e.currentTarget).data('link');
            }
        });

    });

    $('#data-table-list-work-status').DataTable({
    });

});