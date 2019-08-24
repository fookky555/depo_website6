<?php
function MALink($module, $action){

    echo "index.php?module=$module&action=$action";
}

function GetModule($getmodule,$getaction){

    $module=$getmodule;
    $action=$getaction;

    $dataMA =array($module,$action);

    return $dataMA;
}
function connect_db(){
    $con=mysqli_connect("localhost","root","","main_db");
    if(!$con){
        $con=mysqli_connect("localhost:3306","depo_admin_db","Aekapop123","main_db");
    }
    mysqli_set_charset($con,"utf8");
    /*if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }else{
        echo "connect!!";
    }*/
    return $con;
}

function Goodjob($module,$action,$title,$text,$link){

    if(empty($title)){
        $title="Good job!";
    }
    if($text==1){
        $text="เพิ่มข้อมูลเสร็จสิ้น !";
    }elseif ($text==2){
        $text="ลบข้อมูลเสร็จสิ้น !";
    }elseif ($text==3){
        $text="แก้ไขข้อมูลเสร็จสิ้น !";
    }

    if(empty($link)){
        $link="index.php?module=$module&action=$action";
    }

    echo "<script type=\"text/javascript\">swal({
                            title: \"$title\",
                            text: \"$text\",
                            type: \"success\"
                            },
                            function(){
                            window.location='$link';
                            });
                  </script>";
}

function do_Login($username,$password){
        /*
        session_start();
        $_SESSION['user_username']="rockrock";
        $_SESSION['work_id']=42;
        $_SESSION['user_name']="ร็อค ร็อค";
        $_SESSION['user_role']="ผู้ดูแล";
        header('Location: index.php?module=car_type&action=list_car_type');
        */
        include ("function/Bcrypt.php");
        $con=connect_db();

        $sql="SELECT * FROM `tbl_user` WHERE `user_username`='$username'";

        //echo $sql;
        $result=mysqli_query($con,$sql)or die("ผิด=====");

        //echo mysqli_num_rows($result);
        if(mysqli_num_rows($result) == 1){

                $row=mysqli_fetch_assoc($result);
                $dbPassword=$row['user_password'];
                $check=Bcrypt::checkPassword($password,$dbPassword);
                if($check){
                    session_start();
                    $_SESSION['user_id']=$row['user_id'];
                    $_SESSION['user_username']=$row['user_username'];
                    $_SESSION['work_id']=$row['work_id'];
                    $_SESSION['user_name']=$row['user_name'];
                    $_SESSION['user_role']=$row['user_role'];
                    $sql="SELECT `work_name` FROM `tbl_work` WHERE `work_id`='$row[work_id]'";
                    $result=mysqli_query($con,$sql)or die("ผิด=====");
                    list($work_name)=mysqli_fetch_row($result);
                    $_SESSION['work_name']=$work_name;
                    $_SESSION['alert_day']=0;

                    if($_SESSION['user_role']=="ผู้ประกอบการ"){
                        header('Location: index.php?module=volume_chart&action=list_volume_chart');
                    }else if($_SESSION['user_role']=="ผู้ดูแลสูงสุด"){
                        header('Location: index.php?module=work_payment&action=list_work_payment');
                    }else{
                        header('Location: index.php?module=deposit&action=list_deposit');
                    }
                }
        }
            return $errormsg ="ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";


}
function change_date($date_old){
    $date = strtotime($date_old);
    $thaimonth=array("มค.","กพ.","มีค.","เมย.","พค.","มิย.","กค.","สค.","กย.","ตค.","พย.","ธค.");
    if(empty($date_old)){
        return $thaiweek="ไม่ได้ชำระเงิน";
    }else{
        return $thaiweek=" ".date("j",$date)." ".$thaimonth[date("m",$date)-1]." ".(date("Y",$date)+543) ;

    }
}
function check_pay(){
    $con=connect_db();
    $sql1="SELECT work_payment_date FROM tbl_work_payment WHERE work_payment_confirm='1' AND work_id='$_SESSION[work_id]' ORDER BY work_payment_date DESC LIMIT 1";
    $result1=mysqli_query($con,$sql1);
    list($work_payment_date)=mysqli_fetch_row($result1);
    $today_date=date("Y-m-d");

    $date=new DateTime($work_payment_date);
    $now = new DateTime();
    $diff=$now->diff($date);
    if($diff->days >= 30){
        mysqli_query($con, "UPDATE tbl_work SET 
    work_status=0 WHERE work_id='$_SESSION[work_id]'");
    return false;
    }else{
        return true;
    }
}
function check_delete(){
    $con=connect_db();
    $sql1="SELECT work_payment_date FROM tbl_work_payment WHERE work_payment_confirm='1' AND work_id='$_SESSION[work_id]' ORDER BY work_payment_date DESC LIMIT 1";
    $result1=mysqli_query($con,$sql1);
    list($work_payment_date)=mysqli_fetch_row($result1);
    $today_date=date("Y-m-d");

    $date=new DateTime($work_payment_date);
    $now = new DateTime();
    $diff=$now->diff($date);
    if($diff->days >= 300){
        mysqli_query($con,"DELETE FROM tbl_work WHERE work_id='$_SESSION[work_id]'");
        mysqli_query($con,"DELETE FROM tbl_user WHERE work_id='$_SESSION[work_id]'");
        mysqli_query($con,"DELETE FROM tbl_work_payment WHERE work_id='$_SESSION[work_id]'");
        mysqli_query($con,"DELETE FROM tbl_deposit WHERE work_id='$_SESSION[work_id]'");
        mysqli_query($con,"DELETE FROM tbl_mulct WHERE work_id='$_SESSION[work_id]'");
        mysqli_query($con,"DELETE FROM tbl_news WHERE work_id='$_SESSION[work_id]'");
        mysqli_query($con,"DELETE FROM tbl_car_type WHERE work_id='$_SESSION[work_id]'");
    }
}

function check_day(){//เช็ควันที่เหลือของร้านในการใช้เว็ป
    if(isset($_SESSION['alert_day']) && $_SESSION['alert_day']==0) {
        $con = connect_db();
        $sql1 = "SELECT work_payment_date FROM tbl_work_payment WHERE work_payment_confirm='1' AND work_id=$_SESSION[work_id] ORDER BY work_payment_date DESC LIMIT 1";
        $result1 = mysqli_query($con, $sql1);
        list($work_payment_date) = mysqli_fetch_row($result1);

        $today_date = date("Y-m-d");
        $date = new DateTime($work_payment_date);
        $now = new DateTime();
        $diff = $now->diff($date);
//        echo "<pre>";
//        print_r($date);
//        echo "</pre>";
        if ($diff->days >= 23 && $diff->days < 30) {
            echo "<label  id='result' data-id='5'></label>";
            echo "<label  id='day' data-id='$diff->days'></label>";
            $_SESSION['alert_day'] = 1;
        }
    }
}
function resize_img($pic_name,$ext,$width,$height,$check){
    if($check==0){
        $images="img/deposit/$pic_name";
    }else{
        $images="img/work_payment/$pic_name";
    }
    $new_images="img/thumb_$pic_name";

    if($ext=="jpg"){$images_orig=ImageCreateFromJPEG($images);}
    elseif ($ext=="JPG"){$images_orig=ImageCreateFromJPEG($images);}
    elseif ($ext=="JPEG"){$images_orig=ImageCreateFromJPEG($images);}
    elseif ($ext=="jpeg"){$images_orig=ImageCreateFromJPEG($images);}
    elseif ($ext=="gif"){$images_orig=ImageCreateFromGIF($images);}
    elseif ($ext=="GIF"){$images_orig=ImageCreateFromGIF($images);}
    else{
        $images_orig=imageCreateFromPng($images);
    }

    $photoX=ImagesX($images_orig);
    $photoY=ImagesY($images_orig);
    $images_fin=ImageCreateTrueColor($width,$height);
    ImageCopyResampled($images_fin,$images_orig,0,0,0,0,$width+1,$height+1,$photoX,$photoY);
    ImageJPEG($images_fin,$new_images);
    ImageDestroy($images_orig);
    ImageDestroy($images_fin);
}
function resize_img2($pic_name,$ext,$size){
    $images="img/deposit/$pic_name";
    $new_images="img/deposit/$pic_name";
    $fix_width=600;
    $height=round($fix_width*$size[1]/$size[0]);
    if($ext=="jpg"){$images_orig=ImageCreateFromJPEG($images);}
    elseif ($ext=="JPG"){$images_orig=ImageCreateFromJPEG($images);}
    elseif ($ext=="JPEG"){$images_orig=ImageCreateFromJPEG($images);}
    elseif ($ext=="jpeg"){$images_orig=ImageCreateFromJPEG($images);}
    elseif ($ext=="gif"){$images_orig=ImageCreateFromGIF($images);}
    elseif ($ext=="GIF"){$images_orig=ImageCreateFromGIF($images);}
    else{
        $images_orig=imageCreateFromPng($images);
    }

    $photoX=ImagesX($images_orig);
    $photoY=ImagesY($images_orig);
    $images_fin=ImageCreateTrueColor($fix_width,$height);
    ImageCopyResampled($images_fin,$images_orig,0,0,0,0,$fix_width+1,$height+1,$photoX,$photoY);
    ImageJPEG($images_fin,$new_images);
    ImageDestroy($images_orig);
    ImageDestroy($images_fin);
}
function check_login(){
    if(!isset($_SESSION['user_role'])){
        echo "<label  id='result' data-id='6'></label>";
    }
}

function menu_active($module, $mActive){
    return ($module==$mActive) ? "class='active'":"";
}

function top_menu_active(){
    if(isset($_GET['module'])){
    if($_GET['module']=="no_login_deposit"){


echo"<ul class=\"nav navbar-nav mr-auto flex-column flex-lg-row\">
<li class=\"nav-item dropdown\">
    <a class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">ข้อมูลรับฝากรถ</a>
    <div class=\"dropdown-menu\">
      <a class=\"dropdown-item\" href=\"#\">Action</a>
      <a class=\"dropdown-item\" href=\"#\">Another action</a>
      <a class=\"dropdown-item\" href=\"#\">Something else here</a>
      <div class=\"dropdown-divider\"></div>
      <a class=\"dropdown-item\" href=\"#\">Separated link</a>
    </div>
  </li>
                <li class=\"nav-item\"><a class=\"nav-link\" href=\"index.php?module=no_login_deposit&action=choose_search\" title=\"ข้อมูลรับฝากรถ\"><b><em class=\"icon-magnifier\"></em> &nbsp ข้อมูลฝากรถ <em class=\"icon-arrow-left\"></em></b></a></li>
                <li class=\"nav-item\"><a class=\"nav-link\" href=\"index.php?module=no_login_work&action=search_work\" title=\"ข้อมูลร้านฝากรถ\"><em class=\"icon-phone\"></em> &nbsp ติดต่อร้านฝากรถ</a></li>
                <li class=\"nav-item\"><a class=\"nav-link\" href=\"index.php?module=no_login_news&action=search_news\" title=\"ข่าวประชาสัมพันธ์\"><em class=\"icon-speech\"></em> &nbsp ข่าวประชาสัมพันธ์</a></li>
                <li class=\"nav-item\"><a class=\"nav-link\" href=\"index.php?module=login&action=login\" title=\"Login\"><em class=\"icon-login\"></em> &nbsp ระบบร้านฝากรถ</a></li>

            </ul><!-- END Left navbar-->
            <!-- START Right Navbar-->
            <ul class=\"navbar-nav flex-row\">
                <!-- START lock screen-->
                        <li class=\"nav-item\"><a class=\"nav-link\"><div class=\"brand-logo\"><img class=\"img-fluid\" src=\"img/logo.png\" alt=\"App Logo\"></div> </a></li>

            </ul><!-- END Right Navbar-->";
    }else if($_GET['module']=="no_login_work"){
        echo"<ul class=\"nav navbar-nav mr-auto flex-column flex-lg-row\">
                <li class=\"nav-item\"><a class=\"nav-link\" href=\"index.php?module=no_login_deposit&action=choose_search\" title=\"ข้อมูลรับฝากรถ\"><em class=\"icon-magnifier\"></em> &nbsp ข้อมูลฝากรถ</a></li>
                <li class=\"nav-item\"><a class=\"nav-link\" href=\"index.php?module=no_login_work&action=search_work\" title=\"ข้อมูลร้านฝากรถ\"><em class=\"icon-phone\"></em><b> &nbsp ติดต่อร้านฝากรถ <em class=\"icon-arrow-left\"></em></b></a></li>
                <li class=\"nav-item\"><a class=\"nav-link\" href=\"index.php?module=no_login_news&action=search_news\" title=\"ข่าวประชาสัมพันธ์\"><em class=\"icon-speech\"></em> &nbsp ข่าวประชาสัมพันธ์</a></li>
                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"index.php?module=login&action=login\" title=\"Login\"><em class=\"icon-login\"></em> &nbsp ระบบร้านฝากรถ</a></li>

            </ul><!-- END Left navbar-->
            <!-- START Right Navbar-->
            <ul class=\"navbar-nav flex-row\">
                <!-- START lock screen-->
                        <li class=\"nav-item\"><a class=\"nav-link\"><div class=\"brand-logo\"><img class=\"img-fluid\" src=\"img/logo.png\" alt=\"App Logo\"></div> </a></li>
            </ul><!-- END Right Navbar-->";
    }else if($_GET['module']=="no_login_news"){
        echo"<ul class=\"nav navbar-nav mr-auto flex-column flex-lg-row\">
                <li class=\"nav-item\"><a class=\"nav-link\" href=\"index.php?module=no_login_deposit&action=choose_search\" title=\"ข้อมูลรับฝากรถ\"><em class=\"icon-magnifier\"></em> &nbsp ข้อมูลฝากรถ</a></li>
                <li class=\"nav-item\"><a class=\"nav-link\" href=\"index.php?module=no_login_work&action=search_work\" title=\"ข้อมูลร้านฝากรถ\"><em class=\"icon-phone\"></em> &nbsp ติดต่อร้านฝากรถ</a></li>
                <li class=\"nav-item\"><a class=\"nav-link\" href=\"index.php?module=no_login_news&action=search_news\" title=\"ข่าวประชาสัมพันธ์\"><em class=\"icon-speech\"></em><b> &nbsp ข่าวประชาสัมพันธ์ <em class=\"icon-arrow-left\"></em></b></a></li>
                          <li class=\"nav-item\"><a class=\"nav-link\" href=\"index.php?module=login&action=login\" title=\"Login\"><em class=\"icon-login\"></em> &nbsp ระบบร้านฝากรถ</a></li>

            </ul><!-- END Left navbar-->
            <!-- START Right Navbar-->
            <ul class=\"navbar-nav flex-row\">
                <!-- START lock screen-->
                        <li class=\"nav-item\"><a class=\"nav-link\"><div class=\"brand-logo\"><img class=\"img-fluid\" src=\"img/logo.png\" alt=\"App Logo\"></div> </a></li>
            </ul><!-- END Right Navbar-->";
    }else{
        echo"<ul class=\"nav navbar-nav mr-auto flex-column flex-lg-row\">
                <li class=\"nav-item\"><a class=\"nav-link\" href=\"index.php?module=no_login_deposit&action=choose_search\" title=\"ข้อมูลรับฝากรถ\"><em class=\"icon-magnifier\"></em> &nbsp ข้อมูลฝากรถ</a></li>
                <li class=\"nav-item\"><a class=\"nav-link\" href=\"index.php?module=no_login_work&action=search_work\" title=\"ข้อมูลร้านฝากรถ\"><em class=\"icon-phone\"></em> &nbsp ติดต่อร้านฝากรถ</a></li>
                <li class=\"nav-item\"><a class=\"nav-link\" href=\"index.php?module=no_login_news&action=search_news\" title=\"ข่าวประชาสัมพันธ์\"><em class=\"icon-speech\"></em> &nbsp ข่าวประชาสัมพันธ์</a></li>
                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"index.php?module=login&action=login\" title=\"Login\"><em class=\"icon-login\"></em><b> &nbsp ระบบร้านฝากรถ <em class=\"icon-arrow-left\"></em></b></a></li>

            </ul><!-- END Left navbar-->
            <!-- START Right Navbar-->
            <ul class=\"navbar-nav flex-row\">
                <!-- START lock screen-->
                        <li class=\"nav-item\"><a class=\"nav-link\"><div class=\"brand-logo\"><img class=\"img-fluid\" src=\"img/logo.png\" alt=\"App Logo\"></div> </a></li>
            </ul><!-- END Right Navbar-->";
    }
    }else{
        echo"<ul class=\"nav navbar-nav mr-auto flex-column flex-lg-row\">
                <li class=\"nav-item\"><a class=\"nav-link\" href=\"index.php?module=no_login_deposit&action=choose_search\" title=\"ข้อมูลรับฝากรถ\"><em class=\"icon-magnifier\"></em> &nbsp ข้อมูลฝากรถ</a></li>
                <li class=\"nav-item\"><a class=\"nav-link\" href=\"index.php?module=no_login_work&action=search_work\" title=\"ข้อมูลร้านฝากรถ\"><em class=\"icon-phone\"></em> &nbsp ติดต่อร้านฝากรถ</a></li>
                <li class=\"nav-item\"><a class=\"nav-link\" href=\"index.php?module=no_login_news&action=search_news\" title=\"ข่าวประชาสัมพันธ์\"><em class=\"icon-speech\"></em> &nbsp ข่าวประชาสัมพันธ์</a></li>
                <li class=\"nav-item\"><a class=\"nav-link\" href=\"index.php?module=login&action=login\" title=\"Login\"><em class=\"icon-login\"></em> &nbsp ระบบร้านฝากรถ</a></li>

            </ul><!-- END Left navbar-->
            <!-- START Right Navbar-->
            <ul class=\"navbar-nav flex-row\">
                <!-- START lock screen-->
                        <li class=\"nav-item\"><a class=\"nav-link\"><div class=\"brand-logo\"><img class=\"img-fluid\" src=\"img/logo.png\" alt=\"App Logo\"></div> </a></li>

            </ul><!-- END Right Navbar-->";
    }
}
function cal_price($deposit_type,$car_type_id,$days){
    if($deposit_type==1){
        $con = connect_db();
        $sql1 = "SELECT car_type_deposit_price FROM tbl_car_type WHERE car_type_id='$car_type_id'";
        $result1 = mysqli_query($con, $sql1);
        list($deposit_price) = mysqli_fetch_row($result1);
        $total_price=$deposit_price*$days;
    }elseif($deposit_type==2){
        $con = connect_db();
        $sql1 = "SELECT car_type_1month_deposit_price FROM tbl_car_type WHERE car_type_id='$car_type_id'";
        $result1 = mysqli_query($con, $sql1);
        list($deposit_price_buffet) = mysqli_fetch_row($result1);
        if($days>30){
            $sql1 = "SELECT car_type_deposit_price FROM tbl_car_type WHERE car_type_id='$car_type_id'";
            $result1 = mysqli_query($con, $sql1);
            list($deposit_price) = mysqli_fetch_row($result1);
            $total_price=$deposit_price_buffet+($deposit_price*$days);
        }else{
            $total_price=$deposit_price_buffet;
        }
    }elseif($deposit_type==3){
        $con = connect_db();
        $sql1 = "SELECT car_type_3month_deposit_price FROM tbl_car_type WHERE car_type_id='$car_type_id'";
        $result1 = mysqli_query($con, $sql1);
        list($deposit_price_buffet) = mysqli_fetch_row($result1);
        if($days>90){
            $sql1 = "SELECT car_type_deposit_price FROM tbl_car_type WHERE car_type_id='$car_type_id'";
            $result1 = mysqli_query($con, $sql1);
            list($deposit_price) = mysqli_fetch_row($result1);
            $total_price=$deposit_price_buffet+($deposit_price*$days);
        }else{
            $total_price=$deposit_price_buffet;
        }
    }elseif($deposit_type==4){
        $con = connect_db();
        $sql1 = "SELECT car_type_6month_deposit_price FROM tbl_car_type WHERE car_type_id='$car_type_id'";
        $result1 = mysqli_query($con, $sql1);
        list($deposit_price_buffet) = mysqli_fetch_row($result1);
        if($days>180){
            $sql1 = "SELECT car_type_deposit_price FROM tbl_car_type WHERE car_type_id='$car_type_id'";
            $result1 = mysqli_query($con, $sql1);
            list($deposit_price) = mysqli_fetch_row($result1);
            $total_price=$deposit_price_buffet+($deposit_price*$days);
        }else{
            $total_price=$deposit_price_buffet;
        }
    }else{
        $con = connect_db();
        $sql1 = "SELECT car_type_1year_deposit_price FROM tbl_car_type WHERE car_type_id='$car_type_id'";
        $result1 = mysqli_query($con, $sql1);
        list($deposit_price_buffet) = mysqli_fetch_row($result1);
        if($days>365){
            $sql1 = "SELECT car_type_deposit_price FROM tbl_car_type WHERE car_type_id='$car_type_id'";
            $result1 = mysqli_query($con, $sql1);
            list($deposit_price) = mysqli_fetch_row($result1);
            $total_price=$deposit_price_buffet+($deposit_price*$days);
        }else{
            $total_price=$deposit_price_buffet;
        }
    }
    return $total_price;
}
function cal_wash($deposit_id,$car_type_id){
    $total_price=0;
    $con = connect_db();
    $sql1 = "SELECT deposit_id FROM tbl_wash WHERE deposit_id='$deposit_id'";
    $result1 = mysqli_query($con, $sql1);
    if(list($wash) = mysqli_fetch_row($result1)){
        $sql1 = "SELECT car_type_wash_price FROM tbl_car_type WHERE car_type_id='$car_type_id'";
        $result2 = mysqli_query($con, $sql1);
        list($wash_price) = mysqli_fetch_row($result2);
        $total_price=$wash_price;
    }
    return $total_price;
}
function cal_mulct($deposit_id){
    $con = connect_db();
    $sql1 = "SELECT mulct_price FROM tbl_mulct WHERE deposit_id='$deposit_id'";
    $result1 = mysqli_query($con, $sql1);
    $total_price=0;
    while(list($mulct_price) = mysqli_fetch_row($result1)){
        $total_price+=$mulct_price;
    }
    return $total_price;
}
function do_Logout(){
    if(isset($_SESSION['user_id'])&&isset($_SESSION['user_username'])&&isset($_SESSION['work_id'])&&isset($_SESSION['user_name'])&&isset($_SESSION['user_role'])){
        unset($_SESSION['user_role']);
        unset($_SESSION['user_name']);
        unset($_SESSION['work_id']);
        unset($_SESSION['user_username']);
        unset($_SESSION['alert_day']);
        unset($_SESSION['work_name']);
        unset($_SESSION['user_id']);
        unset($_SESSION['work_name']);
        unset($_SESSION['alert_day']);
    }
    header('Location:index.php?module=login&action=login');
    exit;
}