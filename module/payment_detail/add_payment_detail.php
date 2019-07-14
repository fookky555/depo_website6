
<?php
echo "<p align='center'><img src='img\loading.png'></p>";
if(!empty($_POST['payment_detail_id']&&$_POST['payment_detail_bank']&&$_POST['payment_detail_name']&&$_POST['payment_detail_num'])) {

    $con = connect_db();

    $sql2="INSERT INTO tbl_payment_detail (payment_detail_id,payment_detail_bank,payment_detail_name,payment_detail_num)
VALUES ('$_POST[payment_detail_id]','$_POST[payment_detail_bank]','$_POST[payment_detail_name]','$_POST[payment_detail_num]')";

    mysqli_query($con, $sql2)or die("ไปดูให้ดีๆดิผิดตรงไหน : 1 ".mysqli_error($con));
    echo "<label  id='result' data-id='1'></label>";

}else{
    echo "<label id='result' data-id='0'></label>";
}

?>