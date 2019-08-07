<?php
echo "<p align='center'><img src='img\loading.png'></p>";
if(!empty($_POST['news_head'])){


    $con = connect_db();
    $sql="INSERT INTO
tbl_news (deposit_id,news_head,user_id,work_id)
VALUES ('$_POST[id]','$_POST[news_head]','$_SESSION[user_id]','$_SESSION[work_id]')";
    mysqli_query($con, $sql)or die("SQL ERROR: ".mysqli_error($con));


    echo "<label  id='result' data-id='1'></label>";
}else{
    echo "<label  id='result' data-id='0'></label>";
}
?>