
<?php
echo "<p align='center'><img src='img\loading.png'></p>";
if(!empty($_POST['work_payment_date']&&$_POST['work_payment_time']&&$_POST['payment_detail_id'])) {
    $work_payment_date = $_POST['work_payment_date'];
    $work_payment_time = $_POST['work_payment_time'];
    $payment_detail_id=$_POST['payment_detail_id'];

    $con = connect_db();
    $work_id=$_SESSION['work_id'];//ต้องเปลี่ยน WHERE

    $sql2="INSERT INTO
tbl_work_payment (work_id,work_payment_date,work_payment_time,payment_detail_id)
VALUES ('$work_id','$work_payment_date','$work_payment_time','$payment_detail_id')";

    mysqli_query($con, $sql2)or die("ไปดูให้ดีๆดิผิดตรงไหน : 1 ".mysqli_error($con));
    echo "<label  id='result' data-id='1'></label>";

}else{
    echo "<label id='result' data-id='0'></label>";
}
