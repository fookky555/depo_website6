<?php
include "function/function.php";

?>
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


<!--<header class="topnavbar-wrapper">-->
<!--    <!-- START Top Navbar-->-->
<!--    <nav class="navbar topnavbar navbar-expand-lg navbar-light">-->
<!--        <!-- START navbar header-->-->
<!--        <div class="navbar-header"><a class="navbar-brand">-->
<!--                <div class="brand-logo"><img class="img-fluid" src="img/logo.png" alt="App Logo"></div>-->
<!--                <div class="brand-logo-collapsed"><img class="img-fluid" src="img/logo-single.png" alt="App Logo"></div>-->
<!--            </a><button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#topnavbar"><span class="navbar-toggler-icon"></span></button></div><!-- END navbar header-->-->
<!--        <!-- START Nav wrapper-->-->
<!--        <div class="navbar-collapse collapse" id="topnavbar">-->
<!--            <!-- START Left navbar-->-->
<!--            <ul class="nav navbar-nav mr-auto flex-column flex-lg-row">-->
<!--                <li class="nav-item"><a class="nav-link" href="#" title="ข้อมูลรับฝากรถ"><em class="icon-magnifier"></em> &nbsp ข้อมูลฝากรถ</a></li>-->
<!--                <li class="nav-item"><a class="nav-link" href="#" title="ข้อมูลร้านฝากรถ"><em class="icon-phone"></em> &nbsp ติดต่อร้านฝากรถ</a></li>-->
<!--                <li class="nav-item"><a class="nav-link" href="#" title="ข่าวประชาสัมพันธ์"><em class="icon-speech"></em> &nbsp ข่าวประชาสัมพันธ์</a></li>-->
<!--            </ul><!-- END Left navbar-->-->
<!--            <!-- START Right Navbar-->-->
<!--            <ul class="navbar-nav flex-row">-->
<!--                <!-- START lock screen-->-->
<!--                <li class="nav-item"><a class="nav-link" href="#" title="Login"><em class="icon-login"></em> &nbsp เข้าสู่ระบบ</a></li>-->
<!--            </ul><!-- END Right Navbar-->-->
<!--        </div><!-- END Nav wrapper-->-->
<!--    </nav><!-- END Top Navbar-->-->
<!--</header><!-- offsidebar-->-->


   <div class="wrapper">
      <div class="block-center mt-4 wd-xl">
         <!-- START card-->
         <div class="card card-flat">
            <div class="card-header text-center bg-dark"><a href="#"><img class="block-center rounded" src="img/logo.png" alt="Image"></a></div>
            <div class="card-body">
               <p class="text-center py-2">เข้าสู่ระบบร้านรับฝากรถ</p>
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
                  </div><button class="btn btn-block btn-primary mt-3" type="submit">เข้าสู่ระบบ</button>
               </form>
               <p class="pt-3 text-center">ต้องการลงทะเบียนร้านรับฝากรถ?</p><a class="btn btn-block btn-secondary" href="index.php?module=register&action=registerForm">ลงทะเบียน</a>
            </div>
         </div><!-- END card-->
         <div class="p-3 text-center"><span class="mr-2">&copy;</span><span>2019</span><span class="mr-2">-</span><span>Angle</span><br><span>Bootstrap Admin Template</span></div>
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