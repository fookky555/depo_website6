
<?php
echo "<p align='center'><img src='img\loading.png'></p>";
include ("function/Bcrypt.php");
if(!empty($_POST['user_username']&&$_POST['user_password']&&$_POST['user_name']&&$_POST['user_phone']&&$_POST['user_role'])) {
    $con = connect_db();
    $hash= Bcrypt::hashPassword($_POST['user_password']);
    mysqli_query($con, "UPDATE tbl_user SET 
    user_username='$_POST[user_username]',
    user_password='$hash',
    user_name='$_POST[user_name]',
    user_phone='$_POST[user_phone]',
    user_role='$_POST[user_role]'WHERE user_id='$_POST[user_id]'");
    echo "<label id='result' data-id='1'></label>";
}else{
    echo "<label id='result' data-id='0'></label>";
}
//header("Location:index.php?module=user&action=list_user");