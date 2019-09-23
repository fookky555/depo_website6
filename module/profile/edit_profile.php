
<?php
echo "<p align='center'><img src='img\loading.png'></p>";
if (!preg_match ('/[ก-๙เโแใไา]/', $_POST['user_username'])) {
    include("function/Bcrypt.php");
    $con = connect_db();
    $result1 = mysqli_query($con, "SELECT user_username FROM tbl_user WHERE user_username='$_POST[user_username]'");
    list($username_check) = mysqli_fetch_row($result1);
    if (empty($username_check) || $username_check == $_SESSION['user_username']) {
        if (strlen($_POST['user_username']) >= 6) {
            if (!empty($_POST['line']) AND $_SESSION['user_role'] == "ผู้ดูแลสูงสุด") {
                $work_id = $_POST['line'];
            } else {
                $work_id = $_SESSION['work_id'];
            }
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
    user_phone='$_POST[user_phone]',
     work_id='$work_id' WHERE user_id='$_POST[user_id]'");
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
    user_phone='$_POST[user_phone]',
     work_id='$work_id' WHERE user_id='$_POST[user_id]'");
                echo "<label id='result' data-id='1'></label>";
            } else {
                echo "<label id='result' data-id='0'></label>";
            }
        } else {
            echo "<label id='result' data-id='66'></label>";
        }
    } else {
        echo "<label  id='result' data-id='22'></label>";
    }
}else{
    echo "<label  id='result' data-id='33'></label>";
}
//header("Location:index.php?module=user&action=list_user");