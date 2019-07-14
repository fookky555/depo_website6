<?php
$con=connect_db();

mysqli_query($con,"DELETE FROM tbl_car_type WHERE car_type_id='$_GET[id]'");


mysqli_close($con);
header("Location:index.php?module=car_type&action=list_car_type");
?>