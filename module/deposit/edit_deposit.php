<?php
echo "<p align='center'><img src='img\loading.png'></p>";
if (preg_match('/[^a-z0-9_ก-๙เโแใไา]+/', $_POST['deposit_plate_id']) && strlen($_POST['deposit_plate_id']) >= 9 ) {
if(!empty($_POST['deposit_type'] or $_POST['car_type_id'])){

    if(empty($_POST['deposit_wash'])){//เช็คว่า checkbox การล้างรถเป็นค่าว่างหรือไม่
        $_POST['deposit_wash']=0;
    }
    if(!empty($_FILES['deposit_pic']['name'])){

        $image_url="img/deposit/$_POST[old_pic]";

        if(file_exists($image_url)){
            unlink($image_url);
        }
        $shuffle_name=str_shuffle(date("dmYhis"));//สุ่มโดยใช้วันและเวลาปัจจุบัน
        $image_filename=$_FILES['deposit_pic']['name'];
        $image_tmp=$_FILES['deposit_pic']['tmp_name'];
        $image_filesize=$_FILES['deposit_pic']['size'];
        $size=getimagesize($_FILES['deposit_pic']['tmp_name']);
        $image_exp=explode(".",$image_filename);
        $ext=end($image_exp);
        if($ext=='jpg' or $ext=='gif' or $ext=='png' or $ext=='jpeg' or $ext=='JPEG' or $ext=='PNG' or $ext=='JPG' or $ext=='GIF'){
                //echo "aaaaaaaaaaaaaaaaaaaaaaaaaaa";
                if($image_filename!="deposit_default.jpg"){
                    //echo "bbbbbbbbbbbbbbbbbbbbbbbbbbbb";
                    $image_name="deposit_".$shuffle_name.".$ext";
                    copy($image_tmp,"img/deposit/$image_name");
                   // resize_img($image_name,$ext,36,75,0);
                    resize_img2($image_name,$ext,$size);
            }else{
                    //echo "cccccccccccccccccccccccccccc";
                }
        }else{
            //echo "ddddddddddddddddddddddddddddddd";
        }
        $sql="UPDATE tbl_deposit SET 
    car_type_id='$_POST[car_type_id]',
    deposit_plate_id='$_POST[deposit_plate_id]',
    deposit_type='$_POST[deposit_type]',
    deposit_helmet='$_POST[deposit_helmet]',
    deposit_fuel='$_POST[deposit_fuel]',
     deposit_pickup_date='$_POST[deposit_pickup_date]',
     deposit_pickup_name='$_POST[deposit_pickup_name]',
     deposit_number='$_POST[deposit_number]',
      deposit_detail='$_POST[deposit_detail]',
      user_id='$_SESSION[user_id]',
       deposit_pic='$image_name' WHERE deposit_id='$_POST[id]'";

    }else{

        $sql="UPDATE tbl_deposit SET 
    car_type_id='$_POST[car_type_id]',
    deposit_plate_id='$_POST[deposit_plate_id]',
    deposit_type='$_POST[deposit_type]',
    deposit_helmet='$_POST[deposit_helmet]',
    deposit_fuel='$_POST[deposit_fuel]',
     deposit_pickup_date='$_POST[deposit_pickup_date]',
     deposit_pickup_name='$_POST[deposit_pickup_name]',
     deposit_number='$_POST[deposit_number]',
      deposit_detail='$_POST[deposit_detail]',
      user_id='$_SESSION[user_id]' WHERE deposit_id='$_POST[id]'";

    }
    $con = connect_db();
    mysqli_query($con, $sql);


    if($_POST['deposit_wash']==1){

        $sql="INSERT INTO
tbl_wash (deposit_id,wash_status,work_id)
VALUES ('$_POST[id]',0,$_SESSION[work_id])";


        mysqli_query($con, $sql);
    }else{
        mysqli_query($con, "DELETE FROM tbl_wash WHERE deposit_id='$_POST[id]'");
    }
    echo "<label  id='result' data-id='1'></label>";



}else{
    echo "<label  id='result' data-id='0'></label>";
}
}else{
    echo "<label  id='result' data-id='2'></label>";
}
?>