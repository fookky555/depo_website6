<?php
echo "<p align='center'><img src='img\loading.png'></p>";
    $con=connect_db();
    $sql="UPDATE tbl_deposit SET 
    deposit_active='2' ,
    deposit_detail ='$_POST[deposit_detail]',
    user_id = '$_SESSION[user_id]' WHERE deposit_id='$_POST[id]'";
    mysqli_query($con,$sql);

    mysqli_query($con,"DELETE FROM tbl_mulct WHERE deposit_id='$_POST[id]'");
    mysqli_query($con,"DELETE FROM tbl_wash WHERE deposit_id='$_POST[id]'");
    mysqli_query($con,"DELETE FROM tbl_news WHERE deposit_id='$_POST[id]'");
    echo "<label id='result' data-id='1'></label>";
