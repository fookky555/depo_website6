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

<div class="wrapper">
    <div class="block-center mt-4 wd-xl">
        <!-- START card-->
        <div class="card card-flat">
            <div class="card-header text-center bg-dark"><a href="#"><img class="block-center" src="img/logo.png"
                                                                          alt="Image"></a></div>
            <div class="card-body">
                <p class="text-center py-2">ลงทะเบียนร้านฝากรถ</p>
                <form class="mb-3" id="registerForm" action="<?php MALink("register","register") ?>" method="post" >
                    <?php if(isset($_GET['text'])) echo "<p class=\"text-left\"><font color='red'><h5>$_GET[text]</h5></font></p>"; ?>
                    <div class="form-group"><label class="text-muted" for="">กำหนดชื่อผู้ใช้</label>
                        <div class="input-group with-focus">
                            <input class="form-control border-right-0" type="text" name="user_username" value="<?php if(isset($_GET['user_username'])) echo $_GET['user_username']; ?>"
                                                                   placeholder="ชื่อผู้ใช้" autocomplete="off"
                                                                   required>
                            <div class="input-group-append"><span
                                        class="input-group-text text-muted bg-transparent border-left-0"><em
                                            class="fa fa-user"></em></span></div>
                        </div>
                    </div>
                    <div class="form-group"><label class="text-muted" for="user_password">กำหนดรหัสผ่าน</label>
                        <div class="input-group with-focus"><input class="form-control border-right-0"
                                                                   id="user_password" type="password" name="user_password"
                                                                   placeholder="รหัสผ่าน" autocomplete="off" required>
                            <div class="input-group-append"><span
                                        class="input-group-text text-muted bg-transparent border-left-0"><em
                                            class="fa fa-lock"></em></span></div>
                        </div>
                    </div>
                    <div class="form-group"><label class="text-muted" for="user_repassword">ยืนยันรหัสผ่าน</label>
                        <div class="input-group with-focus"><input class="form-control border-right-0"
                                                                   id="user_repassword" type="password"
                                                                   placeholder="ยืนยันรหัสผ่าน" autocomplete="off"
                                                                   required
                                                                   data-parsley-equalto="#user_password">
                            <div class="input-group-append"><span
                                        class="input-group-text text-muted bg-transparent border-left-0"><em
                                            class="fa fa-lock"></em></span></div>
                        </div>
                    </div>
                    <div class="form-group"><label class="text-muted" for="user_name">กำหนดชื่อและนามสกุล</label>
                        <div class="input-group with-focus"><input class="form-control border-right-0"
                                                                   id="user_name" type="text" name="user_name" value="<?php if(isset($_GET['user_name'])) echo $_GET['user_name']; ?>"
                                                                   placeholder="ชื่อและนามสกุล" autocomplete="off"
                                                                   required>
                            <div class="input-group-append"><span
                                        class="input-group-text text-muted bg-transparent border-left-0"><em
                                            class="fa fa-address-card"></em></span></div>
                        </div>
                    </div>
                    <div class="form-group"><label class="text-muted" for="user_phone">กำหนดเบอร์โทรศัพท์</label>
                        <div class="input-group with-focus"><input class="form-control border-right-0"
                                                                   id="user_phone" type="number" name="user_phone" value="<?php if(isset($_GET['user_phone'])) echo $_GET['user_phone']; ?>"
                                                                   placeholder="เบอร์โทรศัพท์" autocomplete="off"
                                                                   required>
                            <div class="input-group-append"><span
                                        class="input-group-text text-muted bg-transparent border-left-0"><em
                                            class="fa fa-phone"></em></span></div>
                        </div>
                    </div>
                    <div class="form-group"><label class="text-muted" for="work_name">กำหนดชื่อร้านฝากรถ</label>
                        <div class="input-group with-focus"><input class="form-control border-right-0"
                                                                   id="work_name" type="text" name="work_name" value="<?php if(isset($_GET['work_name'])) echo $_GET['work_name']; ?>"
                                                                   placeholder="ชื่อร้านฝากรถ" autocomplete="off"
                                                                   required>
                            <div class="input-group-append"><span
                                        class="input-group-text text-muted bg-transparent border-left-0"><em
                                            class="fa fa-sign"></em></span></div>
                        </div>
                    </div>

                    <button class="btn btn-block btn-warning mt-3" type="submit">ลงทะเบียน</button>
                </form>
                <p class="pt-3 text-center">ลงทะเบียนแล้ว?</p><a class="btn btn-block btn-primary"
                                                                 href="index.php?module=login&action=login">เข้าสู่ระบบ</a>
            </div>
        </div><!-- END card-->
        <!--        <div class="p-3 text-center"><span class="mr-2">&copy;</span><span>2019</span><span class="mr-2">-</span><span>Angle</span><br><span>Bootstrap Admin Template</span>-->
        <!--        </div>-->
    </div>
</div>

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