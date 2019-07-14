<?php
$con=connect_db();

mysqli_query($con, "UPDATE tbl_work_payment SET
    work_payment_confirm=1 WHERE work_payment_id='$_GET[id]'");

mysqli_query($con, "UPDATE tbl_work SET
    work_status=1 WHERE work_id='$_GET[work_id]'");
mysqli_close($con);
header("Location:index.php?module=work_payment&action=list_work_payment");
?>