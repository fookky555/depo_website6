<?php
    ob_start();
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
   <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css"><!-- ANIMATE.CSS-->
   <link rel="stylesheet" href="vendor/animate.css/animate.css"><!-- WHIRL (spinners)-->
   <link rel="stylesheet" href="vendor/whirl/dist/whirl.css"><!-- =============== PAGE VENDOR STYLES ===============-->
    <link rel="stylesheet" href="vendor/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="vendor/datatables.net-keytable-bs/css/keyTable.bootstrap.css">
   <!-- =============== BOOTSTRAP STYLES ===============-->
   <link rel="stylesheet" href="css/bootstrap.css" id="bscss"><!-- =============== APP STYLES ===============-->
   <link rel="stylesheet" href="css/app.css" id="maincss">
</head>

<body>
<?php if(empty($_GET['module']) || $_GET['module'] == "register" || $_GET['module'] == "login"){//แถบด้านบนตอนไม่ได้ล็อคอิน ?>
<header class="topnavbar-wrapper">
    <!-- START Top Navbar-->
    <nav class="navbar topnavbar navbar-expand-lg navbar-light">
        <!-- START navbar header-->
        <div class="navbar-header"><a class="navbar-brand">
                <div class="brand-logo"><img class="img-fluid" src="img/logo.png" alt="App Logo"></div>
                <div class="brand-logo-collapsed"><img class="img-fluid" src="img/logo-single.png" alt="App Logo"></div>
            </a><button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#topnavbar"><span class="navbar-toggler-icon"></span></button></div><!-- END navbar header-->
        <!-- START Nav wrapper-->
        <div class="navbar-collapse collapse" id="topnavbar">
            <!-- START Left navbar-->
            <ul class="nav navbar-nav mr-auto flex-column flex-lg-row">
                <li class="nav-item"><a class="nav-link" href="#" title="ข้อมูลรับฝากรถ"><em class="icon-magnifier"></em> &nbsp ข้อมูลฝากรถ</a></li>
                <li class="nav-item"><a class="nav-link" href="#" title="ข้อมูลร้านฝากรถ"><em class="icon-phone"></em> &nbsp ติดต่อร้านฝากรถ</a></li>
                <li class="nav-item"><a class="nav-link" href="#" title="ข่าวประชาสัมพันธ์"><em class="icon-speech"></em> &nbsp ข่าวประชาสัมพันธ์</a></li>
            </ul><!-- END Left navbar-->
            <!-- START Right Navbar-->
            <ul class="navbar-nav flex-row">
                <!-- START lock screen-->
                <li class="nav-item"><a class="nav-link" href="index.php?module=login&action=login" title="Login"><em class="icon-login"></em> &nbsp เข้าสู่ระบบ</a></li>
            </ul><!-- END Right Navbar-->
        </div><!-- END Nav wrapper-->
    </nav><!-- END Top Navbar-->
</header><!-- offsidebar-->
<?php } ?>

<div class="wrapper">
    <!-- top navbar-->
    <header class="topnavbar-wrapper">
        <!-- START Top Navbar-->
        <?php if(!empty($_GET['module']) && $_GET['module'] != "register" && $_GET['module'] != "login"){ ?>
        <nav class="navbar topnavbar">
            <!-- START navbar header-->
            <div class="navbar-header"><a class="navbar-brand" href="#/">
                    <div class="brand-logo"><img class="img-fluid" src="img/logo.png" alt="App Logo"></div>
                    <div class="brand-logo-collapsed"><img class="img-fluid" src="img/logo-single.png" alt="App Logo">
                    </div>

                </a></div><!-- END navbar header-->
            <!-- START Left navbar-->

        </nav><!-- END Top Navbar-->
    </header><!-- sidebar-->
    <aside class="aside-container">
        <!-- START Sidebar (left)-->
        <div class="aside-inner">
            <?php include "include/navbar.php"; ?>
        </div><!-- END Sidebar (left)-->
    </aside><!-- offsidebar-->

    <?php
    }
       if(empty($_GET['module']) or empty($_GET['action'])){
           $dataMA=GetModule('login','login');

       }else{
           $dataMA=GetModule($_GET['module'],$_GET['action']);
       }

       require("module/$dataMA[0]/$dataMA[1].php");

       //เช็คว่าได้จ่ายเงินไหม

        if($_GET['module']!="register" && $_GET['module'] != "login" && !empty($_GET['module'])){
            check_pay();
            check_day();//เช็คว่าเหลืออีกกี่วันจะหมดอายุใช้งาน
        $con=connect_db();
        $sql="SELECT `work_status` FROM `tbl_work` WHERE `work_id`='$_SESSION[work_id]'";
        $result=mysqli_query($con,$sql)or die("ผิด=====");
        list($work_status)=mysqli_fetch_row($result);
        if ($work_status==0&&$_SESSION['user_role']=="ผู้ดูแล"&&$_GET['module']!="work_payment"&&$_GET['module']!="payment_detail"){
            echo "<label  id='result' data-id='3'></label>";


        }else if($work_status==0&&$_SESSION['user_role']=="พนักงาน"){

            echo "<label  id='result' data-id='4'></label>";

        }else if($work_status==0&&$_SESSION['user_role']=="ผู้ประกอบการ"){

            echo "<label  id='result' data-id='4'></label>";

        }
        }
       ?>


       <!-- Page footer-->
      <footer class="footer-container"><span>&copy; 2019 - Angle</span></footer>
   </div><!-- =============== VENDOR SCRIPTS ===============-->

   <!-- MODERNIZR-->
   <script src="vendor/modernizr/modernizr.custom.js"></script><!-- STORAGE API-->
   <script src="vendor/js-storage/js.storage.js"></script><!-- SCREENFULL-->
   <script src="vendor/screenfull/dist/screenfull.js"></script><!-- i18next-->
   <script src="vendor/i18next/i18next.js"></script>
   <script src="vendor/i18next-xhr-backend/i18nextXHRBackend.js"></script>
   <script src="vendor/jquery/dist/jquery.js"></script>
   <!-- =============== PAGE VENDOR SCRIPTS ===============-->
<!-- data table -->
<script src="vendor/datatables.net/js/jquery.dataTables.js"></script>
<script src="vendor/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
<script src="vendor/datatables.net-buttons/js/dataTables.buttons.js"></script>
<script src="vendor/datatables.net-buttons-bs/js/buttons.bootstrap.js"></script>
<script src="vendor/datatables.net-buttons/js/buttons.colVis.js"></script>
<script src="vendor/datatables.net-buttons/js/buttons.flash.js"></script>
<script src="vendor/datatables.net-buttons/js/buttons.html5.js"></script>
<script src="vendor/datatables.net-buttons/js/buttons.print.js"></script>
<script src="vendor/datatables.net-keytable/js/dataTables.keyTable.js"></script>
<script src="vendor/datatables.net-responsive/js/dataTables.responsive.js"></script>
<script src="vendor/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
   <!-- SWEET ALERT-->
   <script src="vendor/sweetalert/dist/sweetalert.min.js"></script>
    <script src="vendor/parsleyjs/dist/parsley.js"></script><
   <!-- =============== APP SCRIPTS ===============-->
   <script src="js/<?php echo $dataMA[0];?>/<?php echo $dataMA[1];?>.js?p=<?php echo rand(10,100); ?>"></script>
   <!-- =============== APP SCRIPTS ===============-->
   <script src="js/app.js"> </script>
    <script>
        $(document).ready(function(){

            $('#logout').on('click', function(e) {
                e.preventDefault();
                swal({
                    title: 'ออกจากระบบ?',
                    text: 'คุณต้องการจะออกจากระบบใช่หรือไม่?',
                    icon: 'warning',
                    buttons: {
                        cancel: true,
                        confirm: {
                            text: 'ยืนยัน',
                            value: true,
                            visible: true,
                            className: "bg-danger",
                            closeModal: true
                        }
                    }
                }).then(function(isConfirm) {
                    if (isConfirm) {
                        window.location.href = $(e.currentTarget).data('link');
                    }
                });

            });
            var result= $("#result").data("id");
            console.log(result);
            if(result == 3){

                swal({
                    title: 'ยังไม่ได้ชำระเงินค่าใช้บริการ',
                    text: 'คุณต้องการจะไปหน้าชำระเงินหรือไม่?',
                    icon: 'warning',
                    buttons: {
                        cancel: true,
                        confirm: {
                            text: 'ยืนยัน',
                            value: true,
                            visible: true,
                            className: "bg-information",
                            closeModal: true
                        }
                    }
                }).then(function(isConfirm) {
                    if (isConfirm) {
                        window.location.href='index.php?module=payment_detail&action=show_payment_detail';
                    }else{
                        window.location.href='index.php?module=logout&action=logout';
                    }
                });
            }
            if(result == 4){

                swal({
                    title: 'ยังไม่ได้ชำระเงินค่าใช้บริการ',
                    text: 'กรุณาชำระค่าบริการเพื่อใช้งาน',
                    icon: 'warning',
                    buttons: {
                        confirm: {
                            text: 'รับทราบ',
                            value: true,
                            visible: true,
                            className: "bg-information",
                            closeModal: true
                        }
                    }
                }).then(function(isConfirm) {
                    if (isConfirm) {
                        window.location.href='index.php?module=logout&action=logout';
                    }else{
                        window.location.href='index.php?module=logout&action=logout';
                    }
                });
            }
            if(result == 5){

                swal({
                    title: 'อายุการใช้งานกำลังจะหมด',
                    text: 'เหลือระยะเวลาการใช้งานเพียง 99 วัน กรุณาชำระเงิน',
                    icon: 'warning',
                    buttons: {
                        confirm: {
                            text: 'รับทราบ',
                            value: true,
                            visible: true,
                            className: "bg-information",
                            closeModal: true
                        }
                    }
                });
            }


        });</script>

</body>

</html>
