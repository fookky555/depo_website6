
<?php
echo "<p align='center'><img src='img\loading.png'></p>";
include ("function/Bcrypt.php");
if(strlen($_POST['user_username'])>=6) {
    $con = connect_db();
    if (!empty($_POST['user_password'] && $_POST['user_password_old'])) {
        if (!empty($_POST['user_username'] && $_POST['user_name'] && $_POST['user_phone'])) {
            $sql0 = mysqli_query($con, "SELECT user_password FROM tbl_user WHERE user_id='$_SESSION[user_id]'");
            list($user_pass) = mysqli_fetch_row($sql0);

            $hash = Bcrypt::checkPassword($_POST['user_password_old'], $user_pass);
            $new_hash = Bcrypt::hashPassword($_POST['user_password']);
            if ($hash) {
                mysqli_query($con, "UPDATE tbl_user SET 
    user_username='$_POST[user_username]',
    user_password='$new_hash',
    user_name='$_POST[user_name]',
    user_phone='$_POST[user_phone]' WHERE user_id='$_POST[user_id]'");
            } else {
                echo "<label id='result' data-id='2'></label>";
            }
            echo "<label id='result' data-id='1'></label>";
        } else {
            echo "<label id='result' data-id='0'></label>";
        }
    } else if (!empty($_POST['user_username'] && $_POST['user_name'] && $_POST['user_phone'])) {
        if (!empty($_POST['user_password'] || $_POST['user_password_old'])) {
            echo "<label id='result' data-id='0'></label>";
        }
        mysqli_query($con, "UPDATE tbl_user SET 
    user_username='$_POST[user_username]',
    user_name='$_POST[user_name]',
    user_phone='$_POST[user_phone]' WHERE user_id='$_POST[user_id]'");
        echo "<label id='result' data-id='1'></label>";
    } else {
        echo "<label id='result' data-id='0'></label>";
    }
}else{
    echo "<label id='result' data-id='66'></label>";
}
//header("Location:index.php?module=user&action=list_user");