$(document).ready(function () {
    var result= $("#result").data("id");
    console.log(result);
    if(result == 1){

        swal({
            title: 'สำเร็จ!',
            text: 'บันทึกข้อมูลเรียบร้อยแล้ว',
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
            window.location.href='index.php?module=deposit&action=search_deposit';
        });
    }else if(result==0) {
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
            window.location.href='index.php?module=deposit&action=search_deposit';
        });
    }else if(result==2) {
        swal({
            title: 'ข้อมูลทะเบียนรถไม่ถูกต้อง!',
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
            window.location.href='index.php?module=deposit&action=search_deposit';
        });
    }
});




