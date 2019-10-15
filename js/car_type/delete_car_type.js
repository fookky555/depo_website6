$(document).ready(function () {
    var result= $("#result").data("id");
    var check_delete= $("#check_delete").data("id");
    console.log(result);
    if(result == 0){

        swal({
            title: 'ข้อมูลถูกใช้อยู่!',
            text: 'ข้อมูลรถประเภทนี้ถูกใช้อยู่ '+check_delete+' ข้อมูล กรุณาแก้ไขก่อนทำการลบข้อมูล',
            icon: 'error',
            buttons: {
                confirm: {
                    text: 'รับทราบ',
                    value: true,
                    visible: true,
                    closeModal: true
                }
            }
        }).then(function() {
            window.location.href='index.php?module=car_type&action=list_car_type';
        });
    }
});




