<?php
    include("function/Bcrypt.php");
    echo "<br><p align='center'><img src='img\loading.png'></p>";
    $con = connect_db();
if (!preg_match ('/[ก-๙เโแใไา]/', $_POST['user_username']) && !preg_match ('/[ก-๙เโแใไา]/', $_POST['user_password'])) {

    if (strlen($_POST['user_username']) >= 6 && strlen($_POST['user_password']) >= 6) {
        $result1 = mysqli_query($con, "SELECT user_username FROM tbl_user WHERE user_username='$_POST[user_username]'");
        list($username_check) = mysqli_fetch_row($result1);
        if (empty($username_check)) {

            if (!empty($_POST['user_username'] && $_POST['user_password'] && $_POST['user_name'] && $_POST['user_phone'] && $_POST['work_name'])) {

                //เช็คว่าข้อมูลซ้ำไหม
                $sql0 = "SELECT user_username FROM tbl_user WHERE user_username='$_POST[user_username]'";
                $result0 = mysqli_query($con, $sql0);
                list($check_username) = mysqli_fetch_row($result0);

                $user_username = $_POST['user_username'];
                $user_password = $_POST['user_password'];
                $user_name = $_POST['user_name'];
                $user_phone = $_POST['user_phone'];
                $work_name = $_POST['work_name'];

                $hash = Bcrypt::hashPassword($user_password);

                $sql = "INSERT INTO 
tbl_work (work_name,work_status,work_contact_phone,work_contact_name)
VALUES ('$work_name','0','$user_phone','$user_name') ";
                mysqli_query($con, $sql);

//SELECT fields FROM table ORDER BY id DESC LIMIT 1;

                $sql1 = "SELECT work_id FROM tbl_work ORDER BY work_id DESC LIMIT 1";

                $result = mysqli_query($con, $sql1);

//$work_id=my($result);
                list($work_id) = mysqli_fetch_row($result);


                $sql2 = "INSERT INTO
tbl_user (user_username,user_password,user_name,user_phone,work_id)
VALUES ('$user_username','$hash','$user_name','$user_phone','$work_id') ";

                mysqli_query($con, $sql2);
                $date_now = date("Y-m-d");
                $sql2 = "INSERT INTO
tbl_work_payment (work_id,work_payment_date,work_payment_confirm)
VALUES ('$work_id','$date_now','1') ";

                mysqli_query($con, $sql2);
                session_start();

                $_SESSION['user_username'] = $user_username;
                $_SESSION['work_id'] = $work_id;
                $_SESSION['work_name'] = $work_name;
                $_SESSION['user_name'] = $user_name;
                $_SESSION['user_role'] = "ผู้ดูแล";
                echo "<label  id='result' data-id='1'></label>";
            } else {
                echo "<label  id='result' data-id='0'></label>";
            }
        } else {
            echo "<label  id='result' data-id='2'></label>";
        }
    } else {
        echo "<label  id='result' data-id='66'></label>";
    }
}else{
    echo "<label  id='result' data-id='33'></label>";
}