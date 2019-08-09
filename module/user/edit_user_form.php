<section class="section-container">
    <!-- Page content-->
    <?php
    $con=connect_db();

    $sql1="SELECT * FROM tbl_user WHERE user_id='$_GET[id]'";//ต้องเปลี่ยน WHERE

    $result=mysqli_query($con,$sql1);

    list($user_id,$user_username,$user_password,$user_role,$user_name,$user_phone,$work_id)=mysqli_fetch_row($result);

    ?>
    <div class="content-wrapper">
        <p class="lead"><em class="fa fa-pen"> </em> [ แก้ไขข้อมูลผู้ใช้งาน ] </p>
        <div class="card card-default">
            <div class="card-body">
                <form class="form-horizontal" method="post" action=<?php MALink('user','edit_user') ?>>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-user"></em>&nbsp<b> ชื่อผู้ใช้</b></label>
                            <div class="col-md-10"><input class="form-control" name="user_username" type="text" value="<?php echo $user_username ?>" required></div>
                        </div>

                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"> <em class="fa fa-lock"></em>&nbsp<b> รหัสผ่านใหม่ (เปลี่ยนรหัส)</b></label>
                            <div class="col-md-10"><input class="form-control" name="user_password" type="text" placeholder="ระบุรหัสผ่านใหม่..."></div>
                        </div>

                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-address-card"></em>&nbsp<b> ชื่อและนามสกุล</b></label>
                            <div class="col-md-10"><input class="form-control" name="user_name" type="text" value="<?php echo $user_name ?>" required></div>
                        </div>

                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-phone"></em>&nbsp<b> เบอร์โทรติดต่อ</b></label>
                            <div class="col-md-10"><input class="form-control" name="user_phone" type="text" value="<?php echo $user_phone ?>" required></div>
                        </div>

                    </fieldset>
                    <?php if($_SESSION['user_role']=="ผู้ดูแล"){ ?>
                    <fieldset class="last-child">
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-id-card-alt"></em>&nbsp<b> ประเภทผู้ใช้</b></label>
                            <div class="col-md-10"><select class="custom-select custom-select-sm" name="user_role" required>
                                    <?php if($user_role=="พนักงาน") {
                                        echo"<option value=\"1\">ผู้ดูแล</option>";
                                    echo"<option value=\"2\" selected>พนักงาน</option>";
                                    echo"<option value=\"3\">ผู้ประกอบการ</option>";
                                    }else if($user_role=="ผู้ประกอบการ"){
                                        echo"<option value=\"1\">ผู้ดูแล</option>";
                                        echo"<option value=\"2\">พนักงาน</option>";
                                        echo"<option value=\"3\" selected>ผู้ประกอบการ</option>";
                                    }else{
                                        echo"<option value=\"1\" selected>ผู้ดูแล</option>";
                                        echo"<option value=\"2\">พนักงาน</option>";
                                        echo"<option value=\"3\">ผู้ประกอบการ</option>";
                                    }
                                        ?>
                                </select>
                            </div>
                        </div>
                    </fieldset>
                    <?php } ?>
                    <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                    <div class="clearfix">
                        <div class="float-left">
                            <button class="btn btn-danger" type="button" onclick=window.location.href="<?php MALink('user','list_user')?>">
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