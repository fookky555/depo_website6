<?php
if(!empty($_POST['news_head'])) {
    echo "<p align='center'><img src='img\loading.png'></p>";

    $news_head = $_POST['news_head'];

    $con = connect_db();

    $sql1 = "SELECT work_id,user_id FROM tbl_user WHERE user_id='1'";//(ใช้user_idของคนที่ใช้งานปัจจุบัน)ต้องเปลี่ยน WHERE

    $result = mysqli_query($con, $sql1);

    list($work_id, $user_id) = mysqli_fetch_row($result);

    $deposit_id = 1;//เอามาจากรหัสรับฝากรถที่คลิกเข้ามา

    $sql3 = "INSERT INTO
tbl_news (user_id,deposit_id,news_head,work_id)
VALUES ($user_id,$deposit_id,'$news_head',$work_id)";

    mysqli_query($con, $sql3);
    echo "<label id='result' data-id='1'></label>";
}else{
    echo "<label id='result' data-id='0'></label>";
}