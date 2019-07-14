$(document).ready(function () {
    var result= $("#result").data("id");
    console.log(result);
    if(result == 1){

        swal({
            title: 'สำเร็จ!',
            text: 'แก้ไขข้อมูลเรียบร้อยแล้ว',
            icon: 'success'
        }).then(function() {
            window.location.href='index.php?module=user&action=list_user';
        });
    }else {
        swal({
            title: 'ผิดพลาด!',
            text: 'กรุณาตรวจสอบข้อมูลให้ถูกต้องและครบถ้วน',
            icon: 'error'
        }).then(function() {
            window.location.href='index.php?module=user&action=list_user';
        });
    }
});




