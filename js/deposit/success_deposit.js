$(document).ready(function () {
    var result= $("#result").data("id");
    console.log(result);
    var deposit_id= $("#deposit_id").data("id");
    console.log(result);
    if(result == 0){

        swal({
            title: 'ดำเนินการต่อหรือไม่?',
            text: 'ไม่สามารถกลับมาแก้ไขข้อมูลได้',
            icon: 'info',
            buttons: {
                cancel: true,
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
                window.location.href='index.php?module=deposit&action=success_deposit&confirm=yes';
            }else{
                window.location.href='index.php?module=deposit&action=show_deposit&id='+deposit_id;
            }
        });
    }
});




