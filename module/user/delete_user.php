<?php
$con=connect_db();

mysqli_query($con,"DELETE FROM tbl_user WHERE user_id='$_GET[id]'");


mysqli_close($con);
header("Location:index.php?module=user&action=list_user");
?>