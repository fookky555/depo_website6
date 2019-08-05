<?php
$con=connect_db();

mysqli_query($con,"DELETE FROM tbl_mulct WHERE mulct_id='$_GET[id]'");


mysqli_close($con);
header("Location:index.php?module=deposit&action=search_mulct");
?>