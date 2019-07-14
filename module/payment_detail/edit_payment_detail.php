
<?php
echo "<p align='center'><img src='img\loading.png'></p>";
if(!empty($_POST['payment_detail_id']&&$_POST['payment_detail_bank']&&$_POST['payment_detail_name']&&$_POST['payment_detail_num'])) {

    $con = connect_db();


    mysqli_query($con, "UPDATE tbl_payment_detail SET 
    payment_detail_bank='$_POST[payment_detail_bank]',
    payment_detail_name='$_POST[payment_detail_name]',
    payment_detail_num='$_POST[payment_detail_num]' WHERE payment_detail_id='$_POST[payment_detail_id]'");
    echo "<label  id='result' data-id='1'></label>";

}else{
    echo "<label id='result' data-id='0'></label>";
}

?>