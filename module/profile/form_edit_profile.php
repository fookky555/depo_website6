<section class="section-container">
    <!-- Page content-->
    <?php
    $con=connect_db();

    $sql1="SELECT * FROM tbl_user WHERE user_id='$_SESSION[user_id]'";//ต้องเปลี่ยน WHERE

    $result=mysqli_query($con,$sql1);

    list($user_id,$user_username,$user_password,$user_role,$user_name,$user_phone,$work_id)=mysqli_fetch_row($result);

    ?>
    <div class="content-wrapper">
        <div class="lead"><p><em class="fa fa-user-edit"> </em> [ แก้ไขข้อมูลผู้ใช้งานของตนเอง ] </p></div>
        <div class="card card-default">

            <div class="card-body">
                <form class="form-horizontal" method="post" action=<?php MALink('profile','edit_profile') ?>>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-user"></em>&nbsp<b> ชื่อผู้ใช้ *</b></label>
                            <div class="col-md-10"><input class="form-control" name="user_username" type="text" value="<?php echo $user_username ?>" required></div>
                        </div>

                        <br>
                        <div class="form-group row"><label class="col-md-2 col-form-label"> <em class="fa fa-lock"></em>&nbsp<b> รหัสผ่านเก่า (เปลี่ยนรหัส)</b></label>
                            <div class="col-md-10"><input class="form-control" name="user_password_old" type="password" placeholder="ระบุรหัสผ่านเก่า..."></div>
                        </div>
                        <br>
                        <div class="form-group row"><label class="col-md-2 col-form-label"> <em class="fa fa-lock"></em>&nbsp<b> รหัสผ่านใหม่</b></label>
                            <div class="col-md-10"><input class="form-control" name="user_password" type="password" placeholder="ระบุรหัสผ่านใหม่..."></div>
                        </div>

                        <br>
                        <div class="form-group row"> <label class="col-md-2 col-form-label"> <em class="fa fa-address-card"></em>&nbsp<b> ชื่อ-นามสกุล *</b></label>
                            <div class="col-md-10"><input class="form-control" name="user_name" type="text" value="<?php echo $user_name ?>" required></div>
                        </div>

                        <br>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-phone"></em>&nbsp<b> เบอร์โทรติดต่อ *</b></label>
                            <div class="col-md-10"><input class="form-control" name="user_phone" type="number" value="<?php echo $user_phone ?>" required></div>
                        </div>


                    <?php
                    if($_SESSION['user_role']=="ผู้ดูแลสูงสุด"){
                        ?>
                        <br>
                            <div class="form-group row"><label class="col-md-2 col-form-label"><b><font color="#32cd32">line</font>&nbsp ไลน์ไอดี</b></label>
                                <div class="col-md-10"><input class="form-control" name="line" type="text" value="<?php echo $work_id; ?>" required></div>
                            </div>
                        <?php
                    }
                    ?>
                    </fieldset>
                    <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                    <div class="clearfix">
                        <div class="float-left">
                            <button class="btn btn-danger" type="button" onclick=window.location.href="<?php MALink('profile','list_profile')?>">
                                <em class="fa fa-caret-left fa-fw" ></em>กลับ</button>
                        </div>
                        <div class="float-right">
                            <button class="btn btn-primary" type="submit">
                                <em class="fa fa-check fa-fw"></em>บันทึก</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>