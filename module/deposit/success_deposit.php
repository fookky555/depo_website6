<?php
echo "<p align='center'><img src='img\loading.png'></p>";
if(empty($_GET['confirm'])){
    echo "<label id='result' data-id='0'></label>";
    echo "<label id='deposit_id' data-id='$_GET[id]'></label>";
}else{
    $con=connect_db();
    $sql1="SELECT * FROM tbl_deposit WHERE deposit_id='$_GET[id]'";
    $result1=mysqli_query($con,$sql1);
    list($deposit_id,$car_type_id,$deposit_plate_id,$deposit_helmet,$deposit_number,$deposit_pickup_date,$deposit_date,$deposit_pic,$deposit_type,$user_id,$deposit_detail,$deposit_fuel,$deposit_pickup_name,$work_id)=mysqli_fetch_row($result1);
    $date = new DateTime($deposit_date);
    $now = new DateTime();
    $days=$date->diff($now)->format("%d");
    $p1=(float)cal_price($deposit_type,$car_type_id,$days);
    $p2=(float)cal_mulct($deposit_id);
    $p3=(float)cal_wash($deposit_id,$car_type_id);
    $p4=$p1+$p2+$p3;
    //$date_now=date("Y-m-d");
    $sql="INSERT INTO `tbl_bill`( `bill_deposit`, `bill_mulct`, `bill_wash`, `bill_total`, `user_id`, `work_id`) 
            VALUES ('$p1','$p2','$p3','$p4','$_SESSION[user_id]','$_SESSION[work_id]')";
    $result1=mysqli_query($con,$sql);
    mysqli_query($con,"DELETE FROM tbl_deposit WHERE deposit_id='$_GET[id]'");
    mysqli_query($con,"DELETE FROM tbl_mulct WHERE deposit_id='$_GET[id]'");
    mysqli_query($con,"DELETE FROM tbl_wash WHERE deposit_id='$_GET[id]'");
    mysqli_query($con,"DELETE FROM tbl_news WHERE deposit_id='$_GET[id]'");
    echo "<label id='result' data-id='1'></label>";
}