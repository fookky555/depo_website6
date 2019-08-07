<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Bootstrap Admin App">
    <meta name="keywords" content="app, responsive, jquery, bootstrap, dashboard, admin">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <title>Angle - Bootstrap Admin Template</title><!-- =============== VENDOR STYLES ===============-->
    <!-- FONT AWESOME-->
    <link rel="stylesheet" href="vendor/@fortawesome/fontawesome-free/css/brands.css">
    <link rel="stylesheet" href="vendor/@fortawesome/fontawesome-free/css/regular.css">
    <link rel="stylesheet" href="vendor/@fortawesome/fontawesome-free/css/solid.css">
    <link rel="stylesheet" href="vendor/@fortawesome/fontawesome-free/css/fontawesome.css"><!-- SIMPLE LINE ICONS-->
    <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css"><!-- =============== BOOTSTRAP STYLES ===============-->
    <link rel="stylesheet" href="css/bootstrap.css" id="bscss"><!-- =============== APP STYLES ===============-->
    <link rel="stylesheet" href="css/app.css" id="maincss">
</head>
<body>
<section class="section-container">
    <!-- Page content-->

    <div class="content-wrapper">
        <div class="row">
            <!-- Article Content-->
            <div class="col-xl-11">
                <p class="lead"> <em class="fa fa-motorcycle"> </em> [ ค้นหาข้อมูลฝากรถ ] </p>
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-hover" id="data-table-no_login_search_deposit">
                            <thead>
                            <tr>
                                <th><strong><em class="fa fa-hashtag"></em></strong></th>
                                <th><strong><em class="fa fa-car"></em></strong></th>
                                <th><strong><em class="fa fa-sign"><font color="white">________</font></em></strong></th>

                                <th><strong><em class="fa fa-calendar-check"><font color="white">_</font> </em> </strong> </th>
                                <th><strong><em class="fa fa-motorcycle"><font color="white">_______</font></em></strong></th>
                                <th><strong><em class="fa fa-calendar"><font color="white">_____________</font></em></strong></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $con=connect_db();
                            $sql1="SELECT * FROM tbl_deposit WHERE work_id='$_POST[work_id]'";//ต้องเปลี่ยน WHERE

                            $result1=mysqli_query($con,$sql1);

                            while ($row = mysqli_fetch_assoc($result1)) {

                                extract($row);//ทำให้อยู่ในตัวแปรตามชื่อแอทริบิว
                                $sql2="SELECT car_type_name FROM tbl_car_type WHERE car_type_id='$car_type_id'";//ต้องเปลี่ยน WHERE
                                $result2=mysqli_query($con,$sql2);
                                list($car_type_name)=mysqli_fetch_row($result2);

                                $sql2="SELECT work_name FROM tbl_work WHERE work_id='$_POST[work_id]'";//ต้องเปลี่ยน WHERE
                                $result2=mysqli_query($con,$sql2);
                                list($work_name)=mysqli_fetch_row($result2);

                                $date = new DateTime($deposit_date);
                                $now = new DateTime();

                                ?>
                                <tr>
                                    <td><?php echo $deposit_id;?></td>
                                    <td><?php echo $deposit_plate_id;?></td>
                                    <td><?php echo $work_name;?></td>


                                    <td><?php  echo $date->diff($now)->format("%d วัน"); ?></td>
                                    <td><?php echo $car_type_name;?></td>
                                    <td><?php echo $deposit_date;?></td>

                                </tr>

                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <p> <em class="fa fa-hashtag"> </em> = รหัสข้อมูลฝากรถ</p>
                <p> <em class="fa fa-car"> </em> = ป้ายทะเบียนรถ</p>
                <p> <em class="fa fa-sign"> </em> = ชื่อร้านที่ฝาก</p>
                <p> <em class="fa fa-calendar-check"> </em> = จำนวนวันที่ฝาก</p>
                <p> <em class="fa fa-motorcycle"> </em> = ประเภทของรถ</p>
                <p> <em class="fa fa-calendar"> </em> = วันที่ฝาก</p>
                <div class="float-left">
                    <button class="btn btn-danger" type="button" onclick=window.location.href="<?php MALink('no_login_deposit','choose_search')?>">
                        <em class="fa fa-caret-left fa-fw" ></em>กลับ</button>
                </div>
            </div><!-- Article sidebar-->

</section><!-- Page footer-->



<script src="vendor/modernizr/modernizr.custom.js"></script><!-- STORAGE API-->
<script src="vendor/js-storage/js.storage.js"></script><!-- i18next-->
<script src="vendor/i18next/i18next.js"></script>
<script src="vendor/i18next-xhr-backend/i18nextXHRBackend.js"></script><!-- JQUERY-->
<script src="vendor/jquery/dist/jquery.js"></script><!-- BOOTSTRAP-->
<script src="vendor/popper.js/dist/umd/popper.js"></script>
<script src="vendor/bootstrap/dist/js/bootstrap.js"></script><!-- PARSLEY-->
<script src="vendor/parsleyjs/dist/parsley.js"></script><!-- =============== APP SCRIPTS ===============-->
<script src="js/app.js"></script>
</body>
</html>
