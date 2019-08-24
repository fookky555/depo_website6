$(document).ready(function(){
    $('#data-table-list-car-type').DataTable({
    });
    $('.delete_car_type').on('click', function(e) {
        e.preventDefault();
        swal({
            title: 'ต้องการลบข้อมูล?',
            text: 'ข้อมูลไม่สามารถนำกลับมาได้',
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