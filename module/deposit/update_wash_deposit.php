<?php
$con=connect_db();
if($_GET['wash_status']==0){
    mysqli_query($con, "UPDATE tbl_wash SET 
    wash_user_id='$_SESSION[user_id]',
    wash_status=1 WHERE deposit_id='$_GET[id]'");
}else{

    mysqli_query($con, "UPDATE tbl_wash SET 
    wash_user_id='',
    wash_status=0 WHERE deposit_id='$_GET[id]'");
}
header("Location:index.php?module=deposit&action=search_wash");