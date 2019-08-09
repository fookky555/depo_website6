<?php
$con=connect_db();

mysqli_query($con,"DELETE FROM tbl_bill WHERE bill_id='$_GET[id]'");


mysqli_close($con);
header("Location:index.php?module=bill&action=list_bill");
?>