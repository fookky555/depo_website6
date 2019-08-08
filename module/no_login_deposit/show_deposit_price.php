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
    <div class="col-xl-11">
        <br><p class="lead"><em class="fa fa-money-check"> </em> [ แสดงข้อมูลค่าบริการ รหัส <?php echo $_GET['id']; ?> ] </p>
        <div class="card card-default">
            <?php
            $p1=(float)cal_price($_GET['deposit_type'],$_GET['car_type_id'],$_GET['days']);
            $p2=(float)cal_mulct($_GET['id']);
            $p3=(float)cal_wash($_GET['id'],$_GET['car_type_id']);
            ?>
            <div class="card-body">
                <form>

                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-calendar-check"></em>&nbsp<b> ค่าบริการฝากรถ: </b> <div class="float-right"><?php echo $p1; ?> บาท</div></label>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-tint"></em>&nbsp<b> ค่าบริการล้างรถ: </b> <div class="float-right"><?php echo $p3; ?> บาท</div></label>
                        </div>
                    </fieldset>

                    <?php
                    $con=connect_db();
                    $sql1="SELECT * FROM tbl_mulct WHERE deposit_id='$_GET[id]'";//ต้องเปลี่ยน WHERE
                    $result1=mysqli_query($con,$sql1);
                    while ($row = mysqli_fetch_assoc($result1)) {
                        extract($row);//ทำให้อยู่ในตัวแปรตามชื่อแอทริบิว
                        ?>
                        <fieldset>
                            <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-exclamation-circle"></em>&nbsp<b> หมายเหตุค่าปรับ: </b> <div class="float-right"><?php echo $mulct_list; ?></div></label>
                            </div>
                            <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-money-bill"></em>&nbsp<b> จำนวนเงิน: </b> <div class="float-right"><?php echo $mulct_price; ?> บาท</div></label>
                            </div>
                        </fieldset>
                    <?php } ?>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-check"></em>&nbsp<b> ยอดที่ต้องชำระทั้งหมด: </b> <div class="float-right"><b><?php echo $p1+$p2+$p3; ?> บาท</b></div></label>
                        </div>
                    </fieldset>
                    <div class="float-left">
                        <button class="btn btn-danger" type="button" onclick=window.location.href="index.php?module=no_login_deposit&action=show_deposit&id=<?php echo $_GET['id']; ?>">
                            <em class="fa fa-caret-left fa-fw" ></em>กลับ</button>
                    </div>

            </div>


            <div>

            </div>

            <div class="clearfix">
            </div>
            </form>
        </div>
    </div><!-- END card-->
    </div>
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