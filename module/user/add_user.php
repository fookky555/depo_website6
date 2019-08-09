
<?php
echo "<p align='center'><img src='img\loading.png'></p>";
include ("function/Bcrypt.php");
if(!empty($_POST['user_username'] or $_POST['user_password'] or $_POST['user_name'] or $_POST['user_phone'] or $_POST['user_role'])) {
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];
    $user_name = $_POST['user_name'];
    $user_phone = $_POST['user_phone'];
    $user_role = $_POST['user_role'];
    $hash= Bcrypt::hashPassword($user_password);
    $con = connect_db();
    echo $_POST['user_username'];
    echo $_POST['user_role'];
    $work_id=$_SESSION['work_id'];//ต้องเปลี่ยน WHERE

    $sql2="INSERT INTO
tbl_user (user_username,user_password,user_role,user_name,user_phone,work_id)
VALUES ('$user_username','$hash','$user_role','$user_name','$user_phone','$work_id')";

    mysqli_query($con, $sql2)or die("ไปดูให้ดีๆดิผิดตรงไหน : 1 ".mysqli_error($con));
    echo "<label  id='result' data-id='1'></label>";

}else{
    echo "<label id='result' data-id='0'></label>";
}
