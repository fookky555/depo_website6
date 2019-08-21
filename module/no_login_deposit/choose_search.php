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
    <div class="col-xl-11"><br>
        <p class="lead"><em class="fa fa-search"> </em> [ ค้นหาข้อมูลฝากรถ ] </p>
        <div class="card card-default">

            <div class="card-body">
                <form enctype="multipart/form-data" class="form-horizontal" method="post" action="<?php MALink('no_login_deposit','search_choose') ?>">
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-store-alt"></em>&nbsp<b> เลือกร้านที่ฝาก</b></label>
                            <div class="col-md-10"><select class="custom-select custom-select-sm" name="work_id">
                                    <?php
                                    $con=connect_db();
                                    $sql1="SELECT work_id,work_name FROM tbl_work";
                                    $result1=mysqli_query($con,$sql1);
                                    while(list($id,$name)=mysqli_fetch_row($result1)){
                                        echo "<option value=$id>$name</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div><br>
                        <div class="float-right">
                            <button class="btn btn-success" type="submit">
                                <em class="fa fa-search fa-fw"></em> ค้นหา</button>

                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="col-md-0">

                            <button class="btn btn-block btn-warning mt-0" type="button" onclick=window.location.href="index.php?module=no_login_deposit&action=search_deposit">
                                <em class="fa fa-search-plus fa-fw"></em> ค้นหาทั้งหมด</button>
                        </div>

                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</section>



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
