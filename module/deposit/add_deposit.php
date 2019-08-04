<?php
echo "<p align='center'><img src='img\loading.png'></p>";
    if(!empty($_POST['deposit_type'] or $_POST['car_type_id'])){

        if(empty($_POST['deposit_wash'])){//เช็คว่า checkbox การล้างรถเป็นค่าว่างหรือไม่
            $_POST['deposit_wash']=0;
        }

        //รูปภาพ
        $shuffle_name=str_shuffle(date("dmYhis"));//สุ่มโดยใช้วันและเวลาปัจจุบัน

        $image_filename=$_FILES['deposit_pic']['name'];
        $image_tmp=$_FILES['deposit_pic']['tmp_name'];
        $image_filesize=$_FILES['deposit_pic']['size'];

        $image_exp=explode(".",$image_filename);
        $ext=end($image_exp);
        if($ext=='jpg' or $ext=='gif' or $ext=='png' or $ext=='jpeg' or $ext=='JPEG' or $ext=='PNG' or $ext=='JPG' or $ext=='GIF'){
            if($image_filesize<=1000000){
                if($image_filename!="deposit_default.jpg"){
                    $image_name="deposit_".$shuffle_name.".$ext";
                    copy($image_tmp,"img/deposit/$image_name");
                    resize_img($image_name,$ext,36,75);
                }else{
                    $image_name="";
                }
            }
        }

        $con = connect_db();
        $sql="INSERT INTO
tbl_deposit (car_type_id,deposit_plate_id,deposit_type,deposit_pic,deposit_wash,deposit_helmet,deposit_fuel,deposit_pickup_date,deposit_pickup_name,deposit_number,deposit_detail,user_id,work_id)
VALUES ('$_POST[car_type_id]','$_POST[deposit_plate_id]','$_POST[deposit_type]','$image_name','$_POST[deposit_wash]','$_POST[deposit_helmet]','$_POST[deposit_fuel]','$_POST[deposit_pickup_date]','$_POST[deposit_pickup_name]','$_POST[deposit_number]','$_POST[deposit_detail]',$_SESSION[user_id],$_SESSION[work_id])";

        mysqli_query($con, $sql)or die("ไปดูให้ดีๆดิผิดตรงไหน : 1 ".mysqli_error($con));
       // echo "<label  id='result' data-id='1'></label>";
    }else{



    }
?>