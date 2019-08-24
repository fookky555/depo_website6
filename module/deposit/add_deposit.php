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
        $size=getimagesize($_FILES['deposit_pic']['tmp_name']);
        $image_exp=explode(".",$image_filename);
        $ext=end($image_exp);
        if($ext=='jpg' or $ext=='gif' or $ext=='png' or $ext=='jpeg' or $ext=='JPEG' or $ext=='PNG' or $ext=='JPG' or $ext=='GIF'){
                if($image_filename!="deposit_default.jpg"){
                    $image_name="deposit_".$shuffle_name.".$ext";
                    copy($image_tmp,"img/deposit/$image_name");
                    resize_img2($image_name,$ext,$size);
                }
        }

        if($_POST['deposit_fuel']==0){
            $_POST['deposit_fuel']="";
        }


        $con = connect_db();
        $sql="INSERT INTO
tbl_deposit (car_type_id,deposit_plate_id,deposit_type,deposit_helmet,deposit_fuel,deposit_pickup_date,deposit_pickup_name,deposit_number,deposit_detail,user_id,work_id,deposit_pic)
VALUES ('$_POST[car_type_id]','$_POST[deposit_plate_id]','$_POST[deposit_type]','$_POST[deposit_helmet]','$_POST[deposit_fuel]','$_POST[deposit_pickup_date]','$_POST[deposit_pickup_name]','$_POST[deposit_number]','$_POST[deposit_detail]',$_SESSION[user_id],$_SESSION[work_id],'$image_name')";
        mysqli_query($con, $sql);

        $sql="SELECT deposit_id FROM tbl_deposit ORDER BY deposit_id DESC LIMIT 1";
        $result= mysqli_query($con, $sql);
        list($deposit_id)=mysqli_fetch_row($result); //ไอดีฝากรถล่าสุดที่เพิ่มเข้าไปที่จะล้างรถ
        if($_POST['deposit_wash']==1){


            $sql="INSERT INTO
tbl_wash (deposit_id,wash_status,work_id)
VALUES ('$deposit_id',0,'$_SESSION[work_id]')";

            mysqli_query($con, $sql);
        }
      echo "<label  id='result' data-id='1'></label>";
        echo "<label id='deposit_id' data-id='$deposit_id'></label>";
       echo "<label id='deposit_plate_id' data-id='$_POST[deposit_plate_id]'></label>";
    }else{
       echo "<label  id='result' data-id='0'></label>";
    }
?>