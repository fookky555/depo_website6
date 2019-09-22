$(document).ready(function () {
    var result= $("#result").data("id");
    var deposit_id= $("#deposit_id").data("id");
    var deposit_plate_id= $("#deposit_plate_id").data("id");
    var deposit_type= $("#deposit_type").data("id");
    var deposit_pickup_date= $("#deposit_pickup_date").data("id");
    var car_type_id= $("#car_type_id").data("id");
    var img_name= $("#img_name").data("id");
    console.log(result);
    if(result == 1){

        swal({
            title: 'รหัสฝากรถ #'+deposit_id,
            text: 'บันทึกข้อมูลรถ ['+deposit_plate_id+'] เรียบร้อย!',
            icon: 'success'
        }).then(function() {
            window.location.href='index.php?module=deposit&action=show_deposit&id='+deposit_id;
        });
    }else if(result==0) {
        swal({
            title: 'ผิดพลาด!',
            text: 'กรุณาตรวจสอบข้อมูลให้ถูกต้องและครบถ้วน',
            icon: 'error'
        }).then(function() {
            window.location.href='index.php?module=deposit&action=form_add_deposit';
        });
    }else if(result==2) {
        swal({
            title: 'ข้อมูลทะเบียนรถไม่ถูกต้อง!',
            text: 'กรุณาตรวจสอบข้อมูลให้ถูกต้องและครบถ้วน',
            icon: 'error'
        }).then(function() {
            window.location.href='index.php?module=deposit&action=form_add_deposit&id='+result+'&deposit_plate_id='+deposit_plate_id+'&deposit_type='+deposit_type+'&deposit_pickup_date='+deposit_pickup_date+'&car_type_id='+car_type_id+'&img_name='+img_name;
        });
    }else if(result==99) {
        swal({
            title: 'ไม่มีประเภทของการฝากนี้!',
            text: 'ร้านของคุณไม่มีประเภทการฝากชนิดนี้',
            icon: 'error'
        }).then(function() {
            window.location.href='index.php?module=deposit&action=form_add_deposit&id='+result+'&deposit_plate_id='+deposit_plate_id+'&deposit_type='+deposit_type+'&deposit_pickup_date='+deposit_pickup_date+'&car_type_id='+car_type_id+'&img_name='+img_name;
        });
    }
});




