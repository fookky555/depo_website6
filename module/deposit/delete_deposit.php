<?php
$con=connect_db();

mysqli_query($con,"DELETE FROM tbl_deposit WHERE deposit_id='$_GET[id]'");


mysqli_close($con);
header("Location:index.php?module=deposit&action=search_deposit");
?>