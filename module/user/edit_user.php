
<?php
echo "<p align='center'><img src='img\loading.png'></p>";
if (!preg_match ('/[ก-๙เโแใไา]/', $_POST['user_username'])) {

    $con = connect_db();
    $result1 = mysqli_query($con, "SELECT user_id,user_username FROM tbl_user WHERE user_username='$_POST[user_username]'");
    list($id_check,$username_check) = mysqli_fetch_row($result1);
    if (empty($username_check) || $id_check==$_POST['user_id']) {
        if (strlen($_POST['user_username']) >= 6) {
            include("function/Bcrypt.php");

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
        } else {
            echo "<label id='result' data-id='66'></label>";
        }
    } else {
        echo "<label id='result' data-id='2'></label>";
    }
}else{
    echo "<label id='result' data-id='33'></label>";
}
//header("Location:index.php?module=user&action=list_user");