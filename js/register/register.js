$(document).ready(function () {
    var result= $("#result").data("id");
    var user_username= $("#user_username").data("id");
    var user_name= $("#user_name").data("id");
    var user_phone= $("#user_phone").data("id");
    var work_name= $("#work_name").data("id");
    console.log(result);
    if(result == 1){

        swal({
            title: 'สำเร็จ!',
            text: 'ลงทะเบียนเรียบร้อย',
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
            window.location.href='index.php?module=deposit&action=list_deposit';
        });
    }else if(result == 0) {
        swal({
            title: 'ผิดพลาด!',
            text: 'กรุณาตรวจสอบข้อมูลให้ถูกต้องและครบถ้วน',
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
            window.location.href='index.php?module=register&action=registerForm&user_username='+user_username+'&user_name='+user_name+'&user_phone='+user_phone+'&work_name='+work_name+'&text=กรุณาตรวจสอบข้อมูลให้ถูกต้องและครบถ้วน';
        });
    }else if(result == 2){
        swal({
            title: 'ชื่อผู้ใช้งานถูกใช้แล้ว',
            text: 'กรุณาใช้ชื่อผู้ใช้งานอื่น',
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
            window.location.href='index.php?module=register&action=registerForm&user_username='+user_username+'&user_name='+user_name+'&user_phone='+user_phone+'&work_name='+work_name+'&text=ชื่อผู้ใช้ถูกใช้ไปแล้ว กรุณาเปลี่ยน';
        });
    }else if(result == 66){
        swal({
            title: 'ชื่อผู้ใช้ หรือรหัสผ่าน สั้นเกินไป',
            text: 'ชื่อผู้ใช้ และ รหัสผ่านต้องมีความยาวตั้งแต่ 6 ตัวอักษรขึ้นไป',
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
            window.location.href='index.php?module=register&action=registerForm&user_username='+user_username+'&user_name='+user_name+'&user_phone='+user_phone+'&work_name='+work_name+'&text=ชื่อผู้ใช้ และ รหัสผ่านต้องมีความยาวตั้งแต่ 6 ตัวอักษรขึ้นไป';
        });
    }else if(result == 33){
        swal({
            title: 'ชื่อผู้ใช้ หรือรหัสผ่าน ไม่ถูกต้อง',
            text: 'ชื่อผู้ใช้ และรหัสผ่าน ต้องเป็นภาษาอังกฤษเท่านั้น',
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
            window.location.href='index.php?module=register&action=registerForm&user_username='+user_username+'&user_name='+user_name+'&user_phone='+user_phone+'&work_name='+work_name+'&text=ชื่อผู้ใช้ และรหัสผ่าน ต้องเป็นภาษาอังกฤษเท่านั้น';
        });
    }
});




