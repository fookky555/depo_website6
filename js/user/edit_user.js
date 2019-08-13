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
    }else if(result==0){
        swal({
            title: 'ผิดพลาด!',
            text: 'กรุณาตรวจสอบข้อมูลให้ถูกต้องและครบถ้วน',
            icon: 'error'
        }).then(function() {
            window.location.href='index.php?module=user&action=list_user';
        });
    }else if(result==2){
        swal({
            title: 'ผิดพลาด!',
            text: 'รหัสไม่ตรงกัน!',
            icon: 'error'
        }).then(function() {
            window.location.href='index.php?module=user&action=list_user';
        });
    }else if(result == 66){
        swal({
            title: 'Username หรือ Password สั้นเกินไป',
            text: 'ชื่อผู้ใช้ และ รหัสผ่านต้องมีความยาวตั้งแต่ 6 ตัวอักษรขึ้นไป',
            icon: 'error'
        }).then(function() {
            window.location.href='index.php?module=user&action=list_user';
        });
    }
});




