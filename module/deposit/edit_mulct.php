
<?php
echo "<p align='center'><img src='img\loading.png'></p>";
if(!empty($_POST['mulct_list']&&$_POST['mulct_price'])) {
    $con = connect_db();
    mysqli_query($con, "UPDATE tbl_mulct SET 
    mulct_list='$_POST[mulct_list]',
    mulct_price='$_POST[mulct_price]',
    mulct_note='$_POST[mulct_note]',
    user_id='$_SESSION[user_id]' WHERE mulct_id='$_POST[id]'");
    echo "<label id='result' data-id='1'></label>";
}else{
    echo "<label id='result' data-id='0'></label>";
}
//header("Location:index.php?module=work&action=form_edit_work");