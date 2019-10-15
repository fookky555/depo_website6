<?php
echo "<p align='center'><img src='img\loading.png'></p>";
$con=connect_db();
$sql1="SELECT COUNT(deposit_id) FROM tbl_deposit WHERE car_type_id='$_GET[id]'";//ต้องเปลี่ยน WHERE
$result=mysqli_query($con,$sql1);
list($check_delete)=mysqli_fetch_row($result);
if($check_delete=="0"){
    mysqli_query($con,"DELETE FROM tbl_car_type WHERE car_type_id='$_GET[id]'");
    mysqli_close($con);
    header("Location:index.php?module=car_type&action=list_car_type");
}else{
    echo "<label id='result' data-id='0'></label>";
    echo "<label id='check_delete' data-id='$check_delete'></label>";
}

?>