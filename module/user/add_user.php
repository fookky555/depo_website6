
<?php
echo "<p align='center'><img src='img\loading.png'></p>";
if (!preg_match ('/[ก-๙เโแใไา]/', $_POST['user_username']) && !preg_match ('/[ก-๙เโแใไา]/', $_POST['user_password'])) {
    $con = connect_db();
    $result1 = mysqli_query($con, "SELECT user_username FROM tbl_user WHERE user_username='$_POST[user_username]'");
    list($username_check) = mysqli_fetch_row($result1);
    if (empty($username_check)) {
        if (strlen($_POST['user_username']) >= 6 && strlen($_POST['user_password']) >= 6) {
            include("function/Bcrypt.php");
            if (!empty($_POST['user_username'] or $_POST['user_password'] or $_POST['user_name'] or $_POST['user_phone'] or $_POST['user_role'])) {
                $user_username = $_POST['user_username'];
                $user_password = $_POST['user_password'];
                $user_name = $_POST['user_name'];
                $user_phone = $_POST['user_phone'];
                $user_role = $_POST['user_role'];
                $hash = Bcrypt::hashPassword($user_password);
//        echo $_POST['user_username'];
//        echo $_POST['user_role'];
                $work_id = $_SESSION['work_id'];//ต้องเปลี่ยน WHERE

                $sql2 = "INSERT INTO
tbl_user (user_username,user_password,user_role,user_name,user_phone,work_id)
VALUES ('$user_username','$hash','$user_role','$user_name','$user_phone','$work_id')";

                mysqli_query($con, $sql2) or die("ไปดูให้ดีๆดิผิดตรงไหน : 1 " . mysqli_error($con));
                echo "<label  id='result' data-id='1'></label>";

            } else {
                echo "<label id='result' data-id='0'></label>";

                echo "<label id='user_username' data-id='$_POST[user_username]'></label>";
                echo "<label id='user_password' data-id='$_POST[user_password]'></label>";
                echo "<label id='user_name' data-id='$_POST[user_name]'></label>";
                echo "<label id='user_phone' data-id='$_POST[user_phone]'></label>";
                echo "<label id='user_role' data-id='$_POST[user_role]'></label>";
            }
        } else {
            echo "<label  id='result' data-id='66'></label>";

            echo "<label id='user_username' data-id='$_POST[user_username]'></label>";
            echo "<label id='user_password' data-id='$_POST[user_password]'></label>";
            echo "<label id='user_name' data-id='$_POST[user_name]'></label>";
            echo "<label id='user_phone' data-id='$_POST[user_phone]'></label>";
            echo "<label id='user_role' data-id='$_POST[user_role]'></label>";
        }
    } else {
        echo "<label  id='result' data-id='2'></label>";

        echo "<label id='user_username' data-id='$_POST[user_username]'></label>";
        echo "<label id='user_password' data-id='$_POST[user_password]'></label>";
        echo "<label id='user_name' data-id='$_POST[user_name]'></label>";
        echo "<label id='user_phone' data-id='$_POST[user_phone]'></label>";
        echo "<label id='user_role' data-id='$_POST[user_role]'></label>";
    }
}else{
    echo "<label  id='result' data-id='33'></label>";

    echo "<label id='user_username' data-id='$_POST[user_username]'></label>";
    echo "<label id='user_password' data-id='$_POST[user_password]'></label>";
    echo "<label id='user_name' data-id='$_POST[user_name]'></label>";
    echo "<label id='user_phone' data-id='$_POST[user_phone]'></label>";
    echo "<label id='user_role' data-id='$_POST[user_role]'></label>";
}