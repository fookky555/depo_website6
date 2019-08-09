<section class="section-container">
    <!-- Page content-->
    <?php
    $con=connect_db();

    $sql1="SELECT * FROM tbl_user WHERE user_id='$_SESSION[user_id]'";//ต้องเปลี่ยน WHERE

    $result=mysqli_query($con,$sql1);

    list($user_id,$user_username,$user_password,$user_role,$user_name,$user_phone,$work_id)=mysqli_fetch_row($result);

    ?>
    <div class="content-wrapper">
        <p class="lead"><em class="fa fa-chart-bar"> </em> [ สรุปสถิติจำนวนรถที่ฝากของร้าน ] </p>
        <div class="card card-default">

            <div class="card-body">






            </div>
        </div>
    </div>
</section>