<?php
$con=connect_db();
if($_GET['work_status']==1) {
    mysqli_query($con, "UPDATE tbl_work SET 
    work_status='0' WHERE work_id='$_GET[work_id]'");
}else{
    mysqli_query($con, "UPDATE tbl_work SET 
    work_status='1' WHERE work_id='$_GET[work_id]'");
}
mysqli_close($con);
header("Location:index.php?module=work&action=list_work_status");