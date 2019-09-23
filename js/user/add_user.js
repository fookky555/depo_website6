$(document).ready(function () {
    var result= $("#result").data("id");
    console.log(result);
    if(result == 1){

        swal({
            title: 'สำเร็จ!',
            text: 'เพิ่มข้อมูลเรียบร้อยแล้ว',
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
    }else if(result == 66){
        swal({
            title: 'Username หรือ Password สั้นเกินไป',
            text: 'ชื่อผู้ใช้ และ รหัสผ่านต้องมีความยาวตั้งแต่ 6 ตัวอักษรขึ้นไป',
            icon: 'error'
        }).then(function() {
            window.location.href='index.php?module=user&action=form_add_user';
        });
    }else if(result == 2){
        swal({
            title: 'ชื่อผู้ใช้งานถูกใช้แล้ว',
            text: 'กรุณาใช้ชื่อผู้ใช้งานอื่น',
            icon: 'error'
        }).then(function() {
            window.location.href='index.php?module=user&action=form_Add_user';
        });
    }else if(result == 33){
        swal({
            title: 'Username หรือ Password ไม่ถูกต้อง',
            text: 'Username และ Password ต้องเป็นภาษาอังกฤษเท่านั้น',
            icon: 'error'
        }).then(function() {
            window.location.href='index.php?module=user&action=form_Add_user';
        });
    }
});




