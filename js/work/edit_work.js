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
            window.location.href='index.php?module=work&action=list_work';
        });
    }else if(result == 2){
        swal({
            title: 'ชื่อร้านถูกใช้แล้ว',
            text: 'กรุณาใช้ชื่อร้านอื่น',
            icon: 'error',
            buttons: {
                confirm: {
                    text: 'รับทราบ',
                    visible: true,
                    closeModal: true
                }
            }
        }).then(function() {
            window.location.href='index.php?module=work&action=list_work';
        });
    }else {
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
            window.location.href='index.php?module=work&action=form_edit_work';
        });
    }
});




