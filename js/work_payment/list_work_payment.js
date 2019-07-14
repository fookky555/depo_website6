$(document).ready(function(){

    $('#data-table-list-work-payment').DataTable({
    });


    $('.no_confirm_work_payment').on('click', function(e) {
        e.preventDefault();
        swal({
            title: 'ปฎิเสธการชำระเงินใช่หรือไม่?',
            text: 'ข้อมูลไม่สามารถแก้ไขได้',
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
    $('.confirm_work_payment').on('click', function(e) {
        e.preventDefault();
        swal({
            title: 'ยืนยันการชำระเงินใช่หรือไม่?',
            text: 'ข้อมูลไม่สามารถแก้ไขได้',
            icon: 'warning',
            buttons: {
                cancel: true,
                confirm: {
                    text: 'ยืนยัน',
                    value: true,
                    visible: true,
                    className: "bg-green",
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