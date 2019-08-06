
<?php
echo "<p align='center'><img src='img\loading.png'></p>";
if(!empty($_POST['news_head'])) {
    $con = connect_db();
    mysqli_query($con, "UPDATE tbl_news SET 
    news_head='$_POST[news_head]',
    user_id='$_SESSION[user_id]' WHERE news_id='$_POST[id]'");
    echo "<label id='result' data-id='1'></label>";
}else{
    echo "<label id='result' data-id='0'></label>";
}
//header("Location:index.php?module=work&action=form_edit_work");