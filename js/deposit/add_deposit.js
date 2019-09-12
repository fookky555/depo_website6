$(document).ready(function () {
    var result= $("#result").data("id");
    var deposit_id= $("#deposit_id").data("id");
    var deposit_plate_id= $("#deposit_plate_id").data("id");
    console.log(result);
    if(result == 1){

        swal({
            title: 'รหัสฝากรถ #'+deposit_id,
            text: 'บันทึกข้อมูลรถ ['+deposit_plate_id+'] เรียบร้อย!',
            icon: 'success'
        }).then(function() {
            window.location.href='index.php?module=deposit&action=list_deposit';
        });
    }else if(result==0) {
        swal({
            title: 'ผิดพลาด!',
            text: 'กรุณาตรวจสอบข้อมูลให้ถูกต้องและครบถ้วน',
            icon: 'error'
        }).then(function() {
            window.location.href='index.php?module=deposit&action=form_add_deposit';
        });
    }else if(result==2) {
        swal({
            title: 'ข้อมูลทะเบียนรถไม่ถูกต้อง!',
            text: 'กรุณาตรวจสอบข้อมูลให้ถูกต้องและครบถ้วน',
            icon: 'error'
        }).then(function() {
            window.location.href='index.php?module=deposit&action=form_add_deposit';
        });
    }
});




