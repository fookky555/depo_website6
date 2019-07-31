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
    $con=mysqli_connect("localhost","root","","main_db")or die("เชื่อมต่อไม่ได้");
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

function check_day(){//เช็ควันที่เหลือของร้านในการใช้เว็ป
    if($_SESSION['alert_day']==0) {
        $con = connect_db();
        $sql1 = "SELECT work_payment_date FROM tbl_work_payment WHERE work_payment_confirm='1' AND work_id='$_SESSION[work_id]' ORDER BY work_payment_date DESC LIMIT 1";
        $result1 = mysqli_query($con, $sql1);
        list($work_payment_date) = mysqli_fetch_row($result1);
        $today_date = date("Y-m-d");

        $date = new DateTime($work_payment_date);
        $now = new DateTime();
        $diff = $now->diff($date);
        if ($diff->days >= 23 && $diff->days < 30) {

            echo "<label  id='result' data-id='5'></label>";
            echo "<label  id='day' data-id='$diff->days'></label>";
            $_SESSION['alert_day'] = 1;
        }
    }
}
function resize_img($pic_name,$ext,$width,$height){
    $images="img/work_payment/$pic_name";
    $new_images="img/thumb_$pic_name";

    if($ext=="jpg"){$images_orig=ImageCreateFromJPEG($images);}
    elseif ($ext=="JPG"){$images_orig=ImageCreateFromJPEG($images);}
    elseif ($ext=="JPEG"){$images_orig=ImageCreateFromJPEG($images);}
    elseif ($ext=="jpeg"){$images_orig=ImageCreateFromJPEG($images);}
    elseif ($ext=="png"){$images_orig=ImageCreateFromPNG($images);}
    elseif ($ext=="PNG"){$images_orig=ImageCreateFromPNG($images);}
    elseif ($ext=="gif"){$images_orig=ImageCreateFromGIF($images);}
    elseif ($ext=="GIF"){$images_orig=ImageCreateFromGIF($images);}

    $photoX=ImagesX($images_orig);
    $photoY=ImagesY($images_orig);
    $images_fin=ImageCreateTrueColor($width,$height);
    ImageCopyResampled($images_fin,$images_orig,0,0,0,0,$width+1,$height+1,$photoX,$photoY);
    ImageJPEG($images_fin,$new_images);
    ImageDestroy($images_orig);
    ImageDestroy($images_fin);
}

function do_Logout(){
    if(isset($_SESSION['user_username'])&&isset($_SESSION['work_id'])&&isset($_SESSION['user_name'])&&isset($_SESSION['user_role'])){
        unset($_SESSION['user_role']);
        unset($_SESSION['user_name']);
        unset($_SESSION['work_id']);
        unset($_SESSION['user_username']);
        unset($_SESSION['alert_day']);
        unset($_SESSION['work_name']);
    }
    header('Location:index.php?module=login&action=login');
    exit;
}
function menu_active($module, $mActive){
    return ($module==$mActive) ? "class='active'":"";
}