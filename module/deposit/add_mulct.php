<?php
echo "<p align='center'><img src='img\loading.png'></p>";
if(!empty($_POST['mulct_list'] or $_POST['mulct_price'])){


    $con = connect_db();
    $sql="INSERT INTO
tbl_mulct (deposit_id,mulct_list,mulct_price,mulct_note,user_id,work_id)
VALUES ('$_POST[id]','$_POST[mulct_list]','$_POST[mulct_price]','$_POST[mulct_note]','$_SESSION[user_id]','$_SESSION[work_id]')";
    mysqli_query($con, $sql)or die("SQL ERROR: ".mysqli_error($con));


    echo "<label  id='result' data-id='1'></label>";
}else{
    echo "<label  id='result' data-id='0'></label>";
}
?>