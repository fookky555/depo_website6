<?php
    session_start();
?>
<nav class="sidebar" data-sidebar-anyclick-close="">
    <!-- START sidebar nav-->
    <ul class="sidebar-nav">
        <!-- START user info-->
        <li class="has-user-block">
            <div  id="user-block">
                <div class="item user-block">
                    <!-- User picture-->
                    <div class="user-block-picture">
                        <div class="user-block-status"><img class="img-thumbnail rounded-circle" src="img/user/user.png" alt="Avatar" width="60" height="60">
                            <div class="circle bg-success circle-lg"></div>
                        </div>
                    </div><!-- Name and Job-->
                    <div class="user-block-info"><span class="user-block-name"><?php
                            echo $_SESSION['user_name']; ?></span><span class="user-block-role"><?php echo $_SESSION['user_role'],", ",$_SESSION['work_name']; ?></span></div>
                </div>
            </div>
        </li><!-- END user info-->
        <!-- Iterates over all sidebar items-->
<?php

    if($_SESSION['user_role']=="ผู้ดูแล"){
        ?>

        <hr>
        <li <?php echo menu_active($_GET['module'],"deposit"); ?>><a href="<?php MALink('deposit','list_deposit') ?>" title="Single View"><em class="fa fa-dot-circle"></em><span data-localize="sidebar.nav.SINGLEVIEW">ระบบรับฝาก</span></a></li>
        <li <?php echo menu_active($_GET['module'],"bill"); ?>><a href="<?php MALink('bill','list_bill') ?>" title="Single View"><em class="fa fa-check"></em><span data-localize="sidebar.nav.SINGLEVIEW">ข้อมูลชำระเงินฝากรถ</span></a></li>
        <li <?php echo menu_active($_GET['module'],"car_type"); ?>><a href="<?php MALink('car_type','list_car_type') ?>" title="Single View"><em class="fa fa-clock"></em><span data-localize="sidebar.nav.SINGLEVIEW">อัตราค่าบริการ</span></a></li>
        <li <?php echo menu_active($_GET['module'],"user"); ?>><a href="<?php MALink('user','list_user') ?>" title="Single View"><em class="fa fa-user"></em><span data-localize="sidebar.nav.SINGLEVIEW">ข้อมูลผู้ใช้ของร้าน</span></a></li>
        <li <?php echo menu_active($_GET['module'],"profile"); ?>><a href="<?php MALink('profile','list_profile') ?>" title="Single View"><em class="fa fa-user"></em><span data-localize="sidebar.nav.SINGLEVIEW">ข้อมูลผู้ใช้</span></a></li>
        <li <?php echo menu_active($_GET['module'],"work"); ?>><a href="<?php MALink('work','list_work') ?>" title="Single View"><em class="fa fa-bookmark"></em><span data-localize="sidebar.nav.SINGLEVIEW">ข้อมูลร้าน</span></a></li>
        <li <?php echo menu_active($_GET['module'],"payment_detail"); ?>><a href="<?php MALink('payment_detail','show_payment_detail') ?>" title="Single View"><em class="fa fa-address-card"></em><span data-localize="sidebar.nav.SINGLEVIEW">ช่องทางการชำระเงิน</span></a></li>
        <li <?php echo menu_active($_GET['module'],"work_payment"); ?>><a href="<?php MALink('work_payment','show_work_payment') ?>" title="Single View"><em class="fa fa-money-bill-alt"></em><span data-localize="sidebar.nav.SINGLEVIEW">ยืนยันการชำระเงิน</span></a></li>
        <li <?php echo menu_active($_GET['module'],"contact_us"); ?>><a href="<?php MALink('contact_us','list_contact_us') ?>" title="Single View"><em class="fa fa-phone"></em><span data-localize="sidebar.nav.SINGLEVIEW">ติดต่อผู้ดูแลเว็บไซต์</span></a></li>
        <hr>

        <?php
    }else if($_SESSION['user_role']=="พนักงาน"){
        ?>
        <hr>
        <li <?php echo menu_active($_GET['module'],"deposit"); ?>><a href="<?php MALink('deposit','list_deposit') ?>" title="Single View"><em class="fa fa-dot-circle"></em><span data-localize="sidebar.nav.SINGLEVIEW">ระบบรับฝาก</span></a></li>
        <li <?php echo menu_active($_GET['module'],"bill"); ?>><a href="<?php MALink('bill','list_bill') ?>" title="Single View"><em class="fa fa-check"></em><span data-localize="sidebar.nav.SINGLEVIEW">ข้อมูลชำระเงินฝากรถ</span></a></li>
        <li <?php echo menu_active($_GET['module'],"car_type"); ?>><a href="<?php MALink('car_type','list_car_type') ?>" title="Single View"><em class="fa fa-clock"></em><span data-localize="sidebar.nav.SINGLEVIEW">อัตราค่าบริการ</span></a></li>
        <li <?php echo menu_active($_GET['module'],"profile"); ?>><a href="<?php MALink('profile','list_profile') ?>" title="Single View"><em class="fa fa-user"></em><span data-localize="sidebar.nav.SINGLEVIEW">ข้อมูลผู้ใช้</span></a></li>
        <li <?php echo menu_active($_GET['module'],"work"); ?>><a href="<?php MALink('work','list_work') ?>" title="Single View"><em class="fa fa-bookmark"></em><span data-localize="sidebar.nav.SINGLEVIEW">ข้อมูลร้าน</span></a></li>
         <hr>
        <?php
    }else if($_SESSION['user_role']=="ผู้ประกอบการ"){//เปลี่ยน
        ?>
        <hr>
        <li <?php echo menu_active($_GET['module'],"volume_chart"); ?>><a href="<?php MALink('volume_chart','list_volume_chart') ?>" title="Single View"><em class="fa fa-chart-bar"></em><span data-localize="sidebar.nav.SINGLEVIEW">สถิติจำนวนรถฝาก</span></a></li>
        <li <?php echo menu_active($_GET['module'],"income_chart"); ?>><a href="<?php MALink('income_chart','list_income_chart') ?>" title="Single View"><em class="fa fa-chart-bar"></em><span data-localize="sidebar.nav.SINGLEVIEW">สถิติยอดรายได้</span></a></li>
        <li <?php echo menu_active($_GET['module'],"profile"); ?>><a href="<?php MALink('profile','list_profile') ?>" title="Single View"><em class="fa fa-user"></em><span data-localize="sidebar.nav.SINGLEVIEW">ข้อมูลผู้ใช้</span></a></li>
        <hr>
        <?php
    }else{//เปลี่ยน
        ?>
        <hr>
        <li <?php echo menu_active($_GET['module'],"work_payment"); ?>><a href="<?php MALink('work_payment','list_work_payment') ?>" title="Single View"><em class="fa fa-money-bill-alt"></em><span data-localize="sidebar.nav.SINGLEVIEW">การชำระเงิน</span></a></li>
        <li <?php echo menu_active($_GET['module'],"work"); ?>><a href="<?php MALink('work','list_work_status') ?>" title="Single View"><em class="fa fa-calendar-check"></em><span data-localize="sidebar.nav.SINGLEVIEW">สถานะชำระเงิน</span></a></li>
        <li <?php echo menu_active($_GET['module'],"payment_detail"); ?>><a href="<?php MALink('payment_detail','list_payment_detail') ?>" title="Single View"><em class="fa fa-address-card"></em><span data-localize="sidebar.nav.SINGLEVIEW">ข้อมูลบัญชีธนาคาร</span></a></li>
        <li <?php echo menu_active($_GET['module'],"profile"); ?>><a href="<?php MALink('profile','list_profile') ?>" title="Single View"><em class="fa fa-user"></em><span data-localize="sidebar.nav.SINGLEVIEW">ข้อมูลผู้ใช้</span></a></li>
        <hr>
        <?php
    }
?>
        <li><a href="" title="Single View" id="logout" data-link="index.php?module=logout&action=logout" ><em class="fa fa-arrow-alt-circle-left"></em><span data-localize="sidebar.nav.SINGLEVIEW">ออกจากระบบ</span></a></li>

        <!--        <li class=" "><a href="#submenu" title="Menu" data-toggle="collapse"><em class="icon-speedometer"></em><span data-localize="sidebar.nav.menu.MENU">ข้อมูลผู้ใช้งาน</span></a>-->
<!--            <ul class="sidebar-nav sidebar-subnav collapse" id="submenu">-->
<!--                <li class="sidebar-subnav-header">Menu</li>-->
<!--                <li class=" "><a href="submenu.html" title="Submenu"><span data-localize="sidebar.nav.menu.SUBMENU">Submenu</span></a></li>-->
<!--            </ul>-->
<!--        </li>-->
    </ul><!-- END sidebar nav-->
</nav>