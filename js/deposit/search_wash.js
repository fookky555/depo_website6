$(document).ready(function(){
    $('#data-table-search_wash').DataTable({
    });
    $('.wash_deposit').on('click', function(e) {
        e.preventDefault();
        swal({
            title: 'ทำการล้างรถ?',
            text: 'คุณต้องการจะล้างรถใช่หรือไม่',
            icon: 'info',
            buttons: {
                cancel: true,
                confirm: {
                    text: 'ยืนยัน',
                    value: true,
                    visible: true,
                    className: "bg-primary",
                    closeModal: true
                }
            }
        }).then(function(isConfirm) {
            if (isConfirm) {
                window.location.href = $(e.currentTarget).data('link');
            }
        });

    });
    $('.no_wash_deposit').on('click', function(e) {
        e.preventDefault();
        swal({
            title: 'ยกเลิกการล้างรถ?',
            text: 'คุณต้องการยกเลิกการล้างรถใช่หรือไม่',
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
    $('.delete_wash').on('click', function(e) {
        e.preventDefault();
        swal({
            title: 'ต้องการลบข้อมูล?',
            text: 'คุณต้องการจะลบข้อมูลการล้างรถหรือไม่',
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
});