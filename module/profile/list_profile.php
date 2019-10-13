<section class="section-container">
    <!-- Page content-->
    <?php
    $con=connect_db();

    $sql1="SELECT * FROM tbl_user WHERE user_id='$_SESSION[user_id]'";//ต้องเปลี่ยน WHERE

    $result=mysqli_query($con,$sql1);

    list($user_id,$user_username,$user_password,$user_role,$user_name,$user_phone,$work_id)=mysqli_fetch_row($result);

    ?>
    <div class="content-wrapper">
        <p class="lead"><em class="fa fa-user"> </em> [ ข้อมูลผู้ใช้งานของตนเอง ] </p>
        <div class="card card-default">

            <div class="card-body">
                <form class="form-horizontal" method="post" action=<?php MALink('profile','edit_profile') ?>>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-hashtag"></em>&nbsp<b> รหัสผู้ใช้</b></label>
                            <div class="col-md-10"><input class="form-control" name="user_username" type="text" value="<?php echo $_SESSION['user_id'] ?> " disabled></div>
                        </div>

                        <br>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-user"></em>&nbsp<b> ชื่อผู้ใช้</b></label>
                            <div class="col-md-10"><input class="form-control" name="user_username" type="text" value="<?php echo $user_username ?>" disabled></div>
                        </div>

                        <br>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-id-card-alt"></em>&nbsp<b> ตำแหน่ง</b></label>
                            <div class="col-md-10"><input class="form-control" name="user_username" type="text" value="<?php echo $user_role ?>" disabled></div>
                        </div>

                        <br>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-address-card"></em>&nbsp<b> ชื่อ-นามสกุล</b></label>
                            <div class="col-md-10"><input class="form-control" name="user_name" type="text" value="<?php echo $user_name ?>" disabled></div>
                        </div>

                        <br>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-phone"></em>&nbsp<b> เบอร์โทรติดต่อ</b></label>
                            <div class="col-md-10"><input class="form-control" name="user_phone" type="text" value="<?php echo $user_phone ?>" disabled></div>
                        </div>
                    <?php
                    if($_SESSION['user_role']=="ผู้ดูแลสูงสุด"){
                        ?>
                        <br>
                            <div class="form-group row"><label class="col-md-2 col-form-label"><b><font color="#32cd32">line</font>&nbsp ไลน์ไอดี</b></label>
                                <div class="col-md-10"><input class="form-control" name="work_id" type="text" value="<?php echo $work_id; ?>" disabled></div>
                            </div>
                    <?php
                    }
                    ?>
                    </fieldset>
                    <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                    <div class="clearfix">
                        <div class="float-right">
                            <button class="btn btn-primary" type="button" onclick=window.location.href="index.php?module=profile&action=form_edit_profile">
                                <em class="fa fa-edit fa-fw"></em> แก้ไขช้อมูล</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</section>