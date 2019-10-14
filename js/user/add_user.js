$(document).ready(function () {
    var result= $("#result").data("id");
    var user_username= $("#user_username").data("id");
    var user_password= $("#user_password").data("id");
    var user_name= $("#user_name").data("id");
    var user_phone= $("#user_phone").data("id");
    var user_role= $("#user_role").data("id");
    console.log(result);
    if(result == 1){

        swal({
            title: 'สำเร็จ!',
            text: 'เพิ่มข้อมูลเรียบร้อยแล้ว',
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
            window.location.href='index.php?module=user&action=form_Add_user&user_username='+user_username+'&user_password='+user_password+'&user_name='+user_name+'&user_phone='+user_phone+'&user_role='+user_role+'&text=กรุณาตรวจสอบข้อมูลให้ถูกต้องและครบถ้วน';
        });
    }else if(result == 66){
        swal({
            title: 'ชื่อผู้ใช้ หรือรหัสผ่าน สั้นเกินไป',
            text: 'ชื่อผู้ใช้ และรหัสผ่านต้องมีความยาวตั้งแต่ 6 ตัวอักษรขึ้นไป',
            icon: 'error',
            buttons: {
                confirm: {
                    text: 'รับทราบ',
                    visible: true,
                    closeModal: true
                }
            }
        }).then(function() {
            window.location.href='index.php?module=user&action=form_Add_user&user_username='+user_username+'&user_password='+user_password+'&user_name='+user_name+'&user_phone='+user_phone+'&user_role='+user_role+'&text=ชื่อผู้ใช้ และรหัสผ่านต้องมีความยาวตั้งแต่ 6 ตัวอักษรขึ้นไป';
        });
    }else if(result == 2){
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
            window.location.href='index.php?module=user&action=form_Add_user&user_username='+user_username+'&user_password='+user_password+'&user_name='+user_name+'&user_phone='+user_phone+'&user_role='+user_role+'&text=ชื่อผู้ใช้งานถูกใช้แล้ว กรุณาเปลี่ยน';
        });
    }else if(result == 33){
        swal({
            title: 'ชื่อผู้ใช้ หรือรหัสผ่าน ไม่ถูกต้อง',
            text: 'ชื่อผู้ใช้ และรหัสผ่าน ต้องเป็นภาษาอังกฤษเท่านั้น',
            icon: 'error',
            buttons: {
                confirm: {
                    text: 'รับทราบ',
                    visible: true,
                    closeModal: true
                }
            }
        }).then(function() {
            window.location.href='index.php?module=user&action=form_Add_user&user_username='+user_username+'&user_password='+user_password+'&user_name='+user_name+'&user_phone='+user_phone+'&user_role='+user_role+'&text=ชื่อผู้ใช้ และรหัสผ่าน ต้องเป็นภาษาอังกฤษเท่านั้น';
        });
    }
});




