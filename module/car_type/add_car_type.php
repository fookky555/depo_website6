
<?php
//var_dump($_POST);
echo "<p align='center'><img src='img\loading.png'></p>";
if(!empty($_POST['car_type_name']&&$_POST['car_type_deposit_price'])){
    $car_type_name=$_POST['car_type_name'];
    $car_type_deposit_price=$_POST['car_type_deposit_price'];
    $car_type_1month_deposit_price=$_POST['car_type_1month_deposit_price'];
    $car_type_3month_deposit_price=$_POST['car_type_3month_deposit_price'];
    $car_type_6month_deposit_price=$_POST['car_type_6month_deposit_price'];
    $car_type_1year_deposit_price=$_POST['car_type_1year_deposit_price'];
    $car_type_wash_price=$_POST['car_type_wash_price'];


$con=connect_db();

$work_id=$_SESSION['work_id'];

$sql="INSERT INTO 
tbl_car_type (car_type_name,car_type_deposit_price,car_type_wash_price,car_type_1month_deposit_price,car_type_3month_deposit_price,car_type_6month_deposit_price,car_type_1year_deposit_price,work_id)
VALUES ('$car_type_name','$car_type_deposit_price','$car_type_wash_price','$car_type_1month_deposit_price','$car_type_3month_deposit_price','$car_type_6month_deposit_price','$car_type_1year_deposit_price','$work_id')";

mysqli_query($con,$sql)or die ('บันทึกข้อมูลไม่ได้'. mysqli_error($con));
echo "<label  id='result' data-id='1'></label>";

}else{
    echo "<label id='result' data-id='0'></label>";
}