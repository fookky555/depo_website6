
<?php
echo "<p align='center'><img src='img\loading.png'></p>";
$con = connect_db();
$result1 = mysqli_query($con, "SELECT work_name FROM tbl_work WHERE work_name='$_POST[work_name]'");
list($workname_check) = mysqli_fetch_row($result1);
if (empty($workname_check) || "ร้าน".$workname_check==$_SESSION['work_name']) {
    if (!empty($_POST['work_name'] && $_POST['work_contact_name'] && $_POST['work_contact_phone'])) {
        mysqli_query($con, "UPDATE tbl_work SET 
    work_name='$_POST[work_name]',
    work_contact_name='$_POST[work_contact_name]',
    work_contact_phone='$_POST[work_contact_phone]' WHERE work_id='$_POST[work_id]'");
        echo "<label id='result' data-id='1'></label>";
        $_SESSION['work_name']="ร้าน".$_POST['work_name'];
    } else {
        echo "<label id='result' data-id='0'></label>";
    }
}else{
    echo "<label id='result' data-id='2'></label>";
}

//header("Location:index.php?module=work&action=form_edit_work");