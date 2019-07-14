
<?php
echo "<p align='center'><img src='img\loading.png'></p>";
if(!empty($_POST['car_type_name']&&$_POST['car_type_deposit_price']&&$_POST['car_type_1month_deposit_price']&&$_POST['car_type_3month_deposit_price']&&$_POST['car_type_6month_deposit_price']&&$_POST['car_type_1year_deposit_price']&&$_POST['car_type_wash_price'])) {

    $car_type_name = $_POST['car_type_name'];
    $car_type_deposit_price = $_POST['car_type_deposit_price'];
    $car_type_1month_deposit_price = $_POST['car_type_1month_deposit_price'];
    $car_type_3month_deposit_price = $_POST['car_type_3month_deposit_price'];
    $car_type_6month_deposit_price = $_POST['car_type_6month_deposit_price'];
    $car_type_1year_deposit_price = $_POST['car_type_1year_deposit_price'];
    $car_type_wash_price = $_POST['car_type_wash_price'];
    $con = connect_db();

    $sql1 = "SELECT work_id FROM tbl_user WHERE user_username=1";//ต้องเปลี่ยน WHERE

    $result = mysqli_query($con, $sql1);

    list($work_id) = mysqli_fetch_row($result);

    $sql = "INSERT INTO 
tbl_car_type (car_type_name,car_type_deposit_price,car_type_wash_price,car_type_1month_deposit_price,car_type_3month_deposit_price,car_type_6month_deposit_price,car_type_1year_deposit_price,work_id)
VALUES ('$car_type_name',$car_type_deposit_price,$car_type_wash_price,$car_type_1month_deposit_price,$car_type_3month_deposit_price,$car_type_6month_deposit_price,$car_type_1year_deposit_price,$work_id)";

    mysqli_query($con, "UPDATE tbl_car_type SET 
    car_type_name='$_POST[car_type_name]',
    car_type_deposit_price='$_POST[car_type_deposit_price]',
    car_type_wash_price='$_POST[car_type_wash_price]',
    car_type_1month_deposit_price='$_POST[car_type_1month_deposit_price]',
    car_type_3month_deposit_price='$_POST[car_type_3month_deposit_price]',
    car_type_6month_deposit_price='$_POST[car_type_6month_deposit_price]',
    car_type_1year_deposit_price='$_POST[car_type_1year_deposit_price]' WHERE car_type_id='$_POST[car_type_id]'");
    echo "<label id='result' data-id='1'></label>";
}else{
    echo "<label id='result' data-id='0'></label>";
}


//header("Location:index.php?module=car_type&action=list_car_type");

