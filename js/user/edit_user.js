$(document).ready(function () {
    var result= $("#result").data("id");
    console.log(result);
    if(result == 1){

        swal({
            title: 'สำเร็จ!',
            text: 'แก้ไขข้อมูลเรียบร้อยแล้ว',
            icon: 'success',
            buttons: {
                confirm: {
                    text: 'ยืนยัน',
                    value: true,
                    visible: true,
                    className: "bg-success",
                    closeModal: true
                }
            }
        }).then(function() {
            window.location.href='index.php?module=user&action=list_user';
        });
    }else if(result==0){
        swal({
            title: 'ผิดพลาด!',
            text: 'กรุณาตรวจสอบข้อมูลให้ถูกต้องและครบถ้วน',
            icon: 'error',
            buttons: {
                confirm: {
                    text: 'รับทราบ',
                    visible: true,
                    closeModal: true
                }
            }
        }).then(function() {
            window.location.href='index.php?module=user&action=list_user';
        });
    }else if(result==2){
        swal({
            title: 'ชื่อผู้ใช้งานถูกใช้แล้ว',
            text: 'กรุณาใช้ชื่อผู้ใช้งานอื่น',
            icon: 'error',
            buttons: {
                confirm: {
                    text: 'รับทราบ',
                    visible: true,
                    closeModal: true
                }
            }
        }).then(function() {
            window.location.href='index.php?module=user&action=list_user';
        });
    }else if(result == 66){
        swal({
            title: 'Username หรือ Password สั้นเกินไป',
            text: 'ชื่อผู้ใช้ และ รหัสผ่านต้องมีความยาวตั้งแต่ 6 ตัวอักษรขึ้นไป',
            icon: 'error',
            buttons: {
                confirm: {
                    text: 'รับทราบ',
                    visible: true,
                    closeModal: true
                }
            }
        }).then(function() {
            window.location.href='index.php?module=user&action=list_user';
        });
    }else if(result == 33){
        swal({
            title: 'Username หรือ Password ไม่ถูกต้อง',
            text: 'Username และ Password ต้องเป็นภาษาอังกฤษเท่านั้น',
            icon: 'error',
            buttons: {
                confirm: {
                    text: 'รับทราบ',
                    visible: true,
                    closeModal: true
                }
            }
        }).then(function() {
            window.location.href='index.php?module=user&action=list_user';
        });
    }
});




