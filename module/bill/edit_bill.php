
<?php
echo "<p align='center'><img src='img\loading.png'></p>";
if(!empty($_POST['bill_deposit']&&$_POST['bill_wash']&&$_POST['bill_mulct'])) {
    $bill_total=$_POST['bill_deposit']+$_POST['bill_wash']+$_POST['bill_mulct'];
    $con = connect_db();
    mysqli_query($con, "UPDATE tbl_bill SET 
    bill_deposit='$_POST[bill_deposit]',
    bill_total='$bill_total',
    bill_wash='$_POST[bill_wash]',
    bill_mulct='$_POST[bill_mulct]',
    user_id='$_SESSION[user_id]' WHERE bill_id='$_POST[id]'");
    echo "<label id='result' data-id='1'></label>";
}else{
    //echo "<label id='result' data-id='0'></label>";
}
//header("Location:index.php?module=work&action=form_edit_work");