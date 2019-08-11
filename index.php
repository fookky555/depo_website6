<?php
    ob_start();
    include "function/function.php";
?>
<!DOCTYPE html>
<html lang="en">
<font size="3">
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
    <link rel="stylesheet" href="vendor/dropify-master/dist/css/dropify.css">
   <link rel="stylesheet" href="css/bootstrap.css" id="bscss"><!-- =============== APP STYLES ===============-->
   <link rel="stylesheet" href="css/app.css" id="maincss">
    <link rel="stylesheet" href="vendor/bootstrap-slider/dist/css/bootstrap-slider.css"><!-- CHOSEN-->
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css">

</head>

<body>
<?php if(empty($_GET['module']) || $_GET['module'] == "register" || $_GET['module'] == "login" || $_GET['module'] == "no_login_deposit" || $_GET['module'] == "no_login_work" || $_GET['module'] == "no_login_news" || $_GET['module'] == "no_password"){//แถบด้านบนตอนไม่ได้ล็อคอิน ?>
<header class="topnavbar-wrapper">
    <!-- START Top Navbar-->
    <nav class="navbar topnavbar navbar-expand-lg navbar-light">
        <!-- START navbar header-->
        <div class="navbar-header"><a class="navbar-brand">

            </a>
        </div>
        <ul class="navbar-nav mr-auto flex-row">
            <li class="nav-item">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#topnavbar"><span class="navbar-toggler-icon"></span></button></div><!-- END navbar header-->
        <!-- START Nav wrapper-->
            </li>
        </ul>
        <div class="navbar-collapse collapse" id="topnavbar">
            <!-- START Left navbar-->

            <?php top_menu_active(); ?>
        </div><!-- END Nav wrapper-->

    </nav><!-- END Top Navbar-->

</header><!-- offsidebar-->
<?php } ?>

<div class="wrapper">
    <!-- top navbar-->
    <header class="topnavbar-wrapper">
        <!-- START Top Navbar-->
        <?php if(!empty($_GET['module']) && $_GET['module'] != "register" && $_GET['module'] != "login" && $_GET['module'] != "no_login_deposit" && $_GET['module'] != "no_login_work" && $_GET['module'] != "no_login_news" && $_GET['module'] != "no_password"){ ?>
        <nav class="navbar topnavbar">
            <!-- START navbar header-->
            <div class="navbar-header"><a class="navbar-brand" href="#/">
                    <div class="brand-logo"><img class="img-fluid" src="img/logo.png" alt="App Logo"></div>
                    <div class="brand-logo-collapsed"><img class="img-fluid" src="img/logo-single.png" alt="App Logo">
                    </div>

                </a></div><!-- END navbar header-->
            <!-- START Left navbar-->
            <ul class="navbar-nav mr-auto flex-row">
                <li class="nav-item">
                    <a class="nav-link d-none d-md-block d-lg-block d-xl-block" href="#" data-trigger-resize="" data-toggle-state="aside-collapsed"><em class="fas fa-bars"></em></a><!-- Button to show/hide the sidebar on mobile. Visible on mobile only.--><a class="nav-link sidebar-toggle d-md-none" href="#" data-toggle-state="aside-toggled" data-no-persist="true"><em class="fas fa-bars"></em></a></li><!-- START User avatar toggle-->
                         </ul>
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

        if($dataMA[0]!="register" && $dataMA[0] != "login" && !empty($_GET['module']) && $dataMA[0]!="no_login_deposit" && $dataMA[0]!="no_login_work" && $dataMA[0]!="no_login_news" && $dataMA[0]!="no_password"){
            check_login();
            check_pay();
            check_day();//เช็คว่าเหลืออีกกี่วันจะหมดอายุใช้งาน
            check_delete();
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
<script src="vendor/dropify-master/dist/js/dropify.min.js"></script>
<script src="vendor/bootstrap-slider/dist/bootstrap-slider.js"></script>
   <!-- SWEET ALERT-->
<script src="vendor/sweetalert/dist/sweetalert.min.js"></script>
<script src="vendor/parsleyjs/dist/parsley.js"></script>
   <!-- =============== APP SCRIPTS ===============-->
<script src="js/<?php echo $dataMA[0];?>/<?php echo $dataMA[1];?>.js?p=<?php echo rand(10,100); ?>"></script>
   <!-- =============== APP SCRIPTS ===============-->
<!-- CHART.JS-->
<script src="vendor/chart.js/dist/Chart.js"></script>
<script src="js/app.js"> </script>

 <!-- =============== APP SCRIPTS ===============-->

    <script>
       <?php  if($dataMA[1] =='list_income_chart'){ ?>
            var labels = <?php echo json_encode($label);?>;
            var data =<?php echo json_encode($score); ?>;

            console.log(labels);
            console.log(data);
            var ctx =document.getElementById("myChart");
            var barOptions = {
                legend: {
                    display: false
                }
            };
            // var barctx = document.getElementById('chartjs-barchart').getContext('2d');
            // var barChart = new Chart(barctx, {
            //     data: barData,
            //     type: 'bar',
            //     options: barOptions
            // });
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        data: data,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: barOptions
            });
        <?php } ?>
       <?php  if($dataMA[1] =='list_volume_chart'){ ?>
       var labels = <?php echo json_encode($label);?>;
       var data =<?php echo json_encode($score); ?>;

       console.log(labels);
       console.log(data);
       var ctx =document.getElementById("myChart");
       var barOptions = {
           legend: {
               display: false
           }
       };
       // var barctx = document.getElementById('chartjs-barchart').getContext('2d');
       // var barChart = new Chart(barctx, {
       //     data: barData,
       //     type: 'bar',
       //     options: barOptions
       // });
       var ctx = document.getElementById('myChart').getContext('2d');
       var myChart = new Chart(ctx, {
           type: 'bar',
           data: {
               labels: labels,
               datasets: [{
                   data: data,
                   backgroundColor: [
                       'rgba(255, 99, 132, 0.2)',
                       'rgba(54, 162, 235, 0.2)',
                       'rgba(255, 206, 86, 0.2)',
                       'rgba(75, 192, 192, 0.2)',
                       'rgba(153, 102, 255, 0.2)',
                       'rgba(153, 102, 255, 0.2)',
                       'rgba(255, 99, 132, 0.2)',
                       'rgba(54, 162, 235, 0.2)',
                       'rgba(255, 206, 86, 0.2)',
                       'rgba(75, 192, 192, 0.2)',
                       'rgba(153, 102, 255, 0.2)',
                       'rgba(255, 159, 64, 0.2)'
                   ],
                   borderColor: [
                       'rgba(255, 99, 132, 0.2)',
                       'rgba(54, 162, 235, 0.2)',
                       'rgba(255, 206, 86, 0.2)',
                       'rgba(75, 192, 192, 0.2)',
                       'rgba(153, 102, 255, 0.2)',
                       'rgba(153, 102, 255, 0.2)',
                       'rgba(255, 99, 132, 0.2)',
                       'rgba(54, 162, 235, 0.2)',
                       'rgba(255, 206, 86, 0.2)',
                       'rgba(75, 192, 192, 0.2)',
                       'rgba(153, 102, 255, 0.2)',
                       'rgba(255, 159, 64, 0.2)'
                   ],
                   borderWidth: 1
               }]
           },
           options: barOptions
       });
       <?php } ?>
        $(document).ready(function(){
            $('[data-ui-slider]').slider();
            var day =$("#day").data("id");
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
                    text: 'เหลือระยะเวลาการใช้งานเพียง '+(30-day)+' วัน กรุณาชำระเงิน',
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
            if(result == 6){

                swal({
                    title: 'ไม่มีสิทธิ์ใช้งานระบบนี้',
                    text: 'กรุณา Login เพื่อเข้าใช้งาน',
                    icon: 'warning',
                    buttons: {
                        confirm: {
                            text: 'รับทราบ',
                            value: true,
                            visible: true,
                            className: "bg-danger",
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
        });

    </script>

</body>
</font>
</html>
