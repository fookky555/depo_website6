$(document).ready(function () {
    var result= $("#result").data("id");
    console.log(result);
    if(result == 1){

        swal({
            title: 'สำเร็จ!',
            text: 'เพิ่มข้อมูลเรียบร้อยแล้ว',
            icon: 'success'
        }).then(function() {
            window.location.href='index.php?module=mulct&action=form_add_mulct';//ต้องเปลี่ยน
        });
    }else {
        swal({
            title: 'ผิดพลาด!',
            text: 'กรุณาตรวจสอบข้อมูลให้ถูกต้องและครบถ้วน',
            icon: 'error'
        }).then(function() {
            window.location.href='index.php?module=mulct&action=form_add_mulct';
        });
    }
});




