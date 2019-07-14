<?php
$con=connect_db();

mysqli_query($con,"DELETE FROM tbl_work WHERE work_id='$_GET[work_id]'");
mysqli_query($con,"DELETE FROM tbl_user WHERE work_id='$_GET[work_id]'");
mysqli_query($con,"DELETE FROM tbl_work_payment WHERE work_id='$_GET[work_id]'");
mysqli_query($con,"DELETE FROM tbl_deposit WHERE work_id='$_GET[work_id]'");
mysqli_query($con,"DELETE FROM tbl_mulct WHERE work_id='$_GET[work_id]'");
mysqli_query($con,"DELETE FROM tbl_news WHERE work_id='$_GET[work_id]'");
mysqli_query($con,"DELETE FROM tbl_car_type WHERE work_id='$_GET[work_id]'");
mysqli_close($con);
header("Location:index.php?module=work&action=list_work_status");
?>