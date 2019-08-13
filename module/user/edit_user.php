
<?php
echo "<p align='center'><img src='img\loading.png'></p>";
if(strlen($_POST['user_username'])>=6) {
    include("function/Bcrypt.php");
    $con = connect_db();
    if (!empty($_POST['user_password'])) {
        if (!empty($_POST['user_username'] && $_POST['user_name'] && $_POST['user_phone'])) {

            $new_hash = Bcrypt::hashPassword($_POST['user_password']);

            mysqli_query($con, "UPDATE tbl_user SET 
    user_username='$_POST[user_username]',
    user_password='$new_hash',
    user_name='$_POST[user_name]',
    user_phone='$_POST[user_phone]',
    user_role='$_POST[user_role]' WHERE user_id='$_POST[user_id]'");
            echo "<label id='result' data-id='1'></label>";
        } else {
            echo "<label id='result' data-id='0'></label>";
        }
    } else if (!empty($_POST['user_username'] && $_POST['user_name'] && $_POST['user_phone'] && $_POST['user_role']) && empty($_POST['user_password'])) {
        mysqli_query($con, "UPDATE tbl_user SET 
    user_username='$_POST[user_username]',
    user_name='$_POST[user_name]',
    user_phone='$_POST[user_phone]',
     user_role='$_POST[user_role]' WHERE user_id='$_POST[user_id]'");
        echo "<label id='result' data-id='1'></label>";
    } else {
        echo "<label id='result' data-id='0'></label>";
    }
}else{
    echo "<label id='result' data-id='66'></label>";
}
//header("Location:index.php?module=user&action=list_user");