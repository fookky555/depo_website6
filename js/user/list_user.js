$(document).ready(function(){
    $('#data-table-list-user').DataTable({
    });
    $('.delete_user').on('click', function(e) {
        e.preventDefault();
        swal({
            title: 'ต้องการลบข้อมูลใช่หรือไม่?',
            text: 'ข้อมูลไม่สามารถนำกลับมาได้',
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
});