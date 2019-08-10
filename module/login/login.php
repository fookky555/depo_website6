
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
<?php
$result="";
if(isset($_POST['username'])&&isset($_POST['password'])){
    $result=do_Login($_POST['username'],$_POST['password']);

}

?>



<div class="wrapper">
    <div class="block-center mt-4 wd-xl">
        <!-- START card-->
        <div class="card card-flat">
            <div class="card-header text-center bg-dark"><a href="#"><img class="block-center rounded" src="img/logo.png" alt="Image"></a></div>
            <div class="card-body">
                <p class="text-center py-2"><b>เข้าสู่ระบบร้านรับฝากรถ</b></p>
                <form class="mb-3" id="loginForm" method="post" novalidate>
                    <div class="form-group">
                        <div class="input-group with-focus"><input class="form-control border-right-0" name="username" type="text" placeholder="ชื่อผู้ใช้" autocomplete="off" required>
                            <div class="input-group-append"><span class="input-group-text text-muted bg-transparent border-left-0"><em class="fa fa-envelope"></em></span></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group with-focus"><input class="form-control border-right-0" name="password" type="password" placeholder="รหัสผ่าน" required>
                            <div class="input-group-append"><span class="input-group-text text-muted bg-transparent border-left-0"><em class="fa fa-lock"></em></span></div>
                        </div>
                    </div>
                    <div class="clearfix">

                        <label class="error" align="center" style="color:red;"><?php echo $result; ?></label>
                    </div><button class="btn btn-block btn-primary mt-3" type="submit"> <em class="fa fa-sign-in-alt"> </em> <b> เข้าสู่ระบบ</b></button>
                    <a class="btn btn-block btn-secondary" href="index.php?module=no_password&action=no_password">ลืมรหัสผ่าน <em class="fa fa-question"></em> </a>
                </form>
                <p class="pt-3 text-center">ต้องการลงทะเบียนร้านรับฝากรถ?</p><a class="btn btn-block btn-warning" href="index.php?module=register&action=registerForm"> <em class="fa fa-store-alt"> </em> ลงทะเบียน</a>
            </div>
        </div><!-- END card-->
    </div>
</div><!-- =============== VENDOR SCRIPTS ===============-->
<!-- MODERNIZR-->
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