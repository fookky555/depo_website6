$(document).ready(function(){
    $('.delete_bill').on('click', function(e) {
        e.preventDefault();
        swal({
            title: 'ต้องการลบข้อมูล?',
            text: 'คุณต้องการจะลบข้อมูลหรือไม่',
            icon: 'warning',
            buttons: {
                cancel: true,
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
    $('#data-table-list_bill').DataTable({
    });
});