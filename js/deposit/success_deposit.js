$(document).ready(function () {
    var result= $("#result").data("id");
    console.log(result);
    var deposit_id= $("#deposit_id").data("id");
    console.log(result);
    if(result == 0){

        swal({
            title: 'ดำเนินการต่อ?',
            text: 'ไม่สามารถกลับมาแก้ไขข้อมูลได้',
            icon: 'info',
            buttons: {
                cancel: {
                    text: 'ยกเลิก',
                    visible: true,
                    className: "bg-danger",
                    closeModal: true
                },
                confirm: {
                    text: 'ยืนยัน',
                    value: true,
                    visible: true,
                    className: "bg-success",
                    closeModal: true
                }
            }
        }).then(function(isConfirm) {
            if (isConfirm) {
                window.location.href='index.php?module=deposit&action=success_deposit&confirm=yes&id='+deposit_id;
            }else{
                window.location.href='index.php?module=deposit&action=show_deposit&id='+deposit_id;
            }
        });
    }
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
            window.location.href='index.php?module=deposit&action=list_deposit';
        });
    }
});




