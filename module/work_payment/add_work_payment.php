
<?php
echo "<p align='center'><img src='img\loading.png'></p>";

if(!empty($_POST['work_payment_date']&&$_POST['work_payment_time']&&$_POST['payment_detail_id']&&$_FILES['work_payment_pic']['name'])) {
    $work_payment_date = $_POST['work_payment_date'];
    $work_payment_time = $_POST['work_payment_time'];
    $payment_detail_id=$_POST['payment_detail_id'];

    $shuffle_name=str_shuffle(date("dmYhis"));//สุ่มโดยใช้วันและเวลาปัจจุบัน

    //$image_filename=$shuffle_name."_".$_FILES['work_payment_pic']['name'];//ผสมชื่อที่สุ่มกับชื่อรูป
    $image_filename=$_FILES['work_payment_pic']['name'];
    $image_tmp=$_FILES['work_payment_pic']['tmp_name'];
    $image_filesize=$_FILES['work_payment_pic']['size'];

    $image_exp=explode(".",$image_filename);
    $ext=end($image_exp);
    if($ext=='jpg' or $ext=='gif' or $ext=='png' or $ext=='jpeg' or $ext=='JPEG' or $ext=='PNG' or $ext=='JPG' or $ext=='GIF'){
        if($image_filesize<=1000000){
            if($image_filename!="payment_default.jpg"){
                $image_name="payment_".$shuffle_name.".$ext";
                copy($image_tmp,"img/work_payment/$image_name");
                resize_img($image_name,$ext,36,75);
            }else{
                $image_name="payment_default.jpg";
            }
        }
    }




    $con = connect_db();
    $work_id=$_SESSION['work_id'];

    $sql2="INSERT INTO
tbl_work_payment (work_id,work_payment_date,work_payment_time,payment_detail_id,work_payment_pic)
VALUES ('$work_id','$work_payment_date','$work_payment_time','$payment_detail_id','$image_name')";

    mysqli_query($con, $sql2)or die("ไปดูให้ดีๆดิผิดตรงไหน : 1 ".mysqli_error($con));
    echo "<label  id='result' data-id='1'></label>";

}else{
    echo "<label id='result' data-id='0'></label>";
}
