
<?php
echo "<p align='center'><img src='img\loading.png'></p>";
if(!empty($_POST['mulct_list']&&$_POST['mulct_price'])) {


    $mulct_list = $_POST['mulct_list'];
    $mulct_price = $_POST['mulct_price'];
    $mulct_note = $_POST['mulct_note'];

    $con = connect_db();
    $user_id = 1;//พนัดงานคนที่เพิ่มข้อมูลคนปัจจุบัน
    $deposit_id = 1;//เอามาจากรหัสรับฝากรถที่คลิกเข้ามา

    $sql3 = "INSERT INTO
tbl_mulct (deposit_id,mulct_list,mulct_price,mulct_note,user_id)
VALUES ($deposit_id,'$mulct_list',$mulct_price,'$mulct_note',$user_id)";

    mysqli_query($con, $sql3);
    echo "<label id='result' data-id='1'></label>";
}else{
    echo "<label id='result' data-id='0'></label>";
}