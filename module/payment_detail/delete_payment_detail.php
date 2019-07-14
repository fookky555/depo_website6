<?php
$con=connect_db();

mysqli_query($con,"DELETE FROM tbl_payment_detail WHERE payment_detail_id='$_GET[id]'");


mysqli_close($con);
header("Location:index.php?module=payment_detail&action=list_payment_detail");
?>