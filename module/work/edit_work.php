
<?php
echo "<p align='center'><img src='img\loading.png'></p>";
if(!empty($_POST['work_name']&&$_POST['work_contact_name']&&$_POST['work_contact_phone'])) {
    $con = connect_db();
    mysqli_query($con, "UPDATE tbl_work SET 
    work_name='$_POST[work_name]',
    work_contact_name='$_POST[work_contact_name]',
    work_contact_phone='$_POST[work_contact_phone]' WHERE work_id='$_POST[work_id]'");
    echo "<label id='result' data-id='1'></label>";
}else{
    echo "<label id='result' data-id='0'></label>";
}
//header("Location:index.php?module=work&action=form_edit_work");