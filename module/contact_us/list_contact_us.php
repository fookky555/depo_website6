<section class="section-container">
    <!-- Page content-->

    <div class="content-wrapper">
        <?php
        $con=connect_db();

        $sql1="SELECT * FROM tbl_user WHERE user_role='ผู้ดูแลสูงสุด' ORDER BY user_id DESC LIMIT 1";//ต้องเปลี่ยน WHERE

        $result=mysqli_query($con,$sql1);

        list($user_id,$user_username,$user_password,$user_role,$user_name,$user_phone,$work_id)=mysqli_fetch_row($result);

        ?>
        <p class="lead"><em class="icon-earphones-alt"> </em> [ ข้อมูลติดต่อผู้ดูแลเว็บไซต์ ] </p>
        <div class="card card-default">

            <div class="card-body">
                <br>
                <form class="form-horizontal">
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-address-card"></em>&nbsp<b> ชื่อ-นามสกุล</b></label>
                            <div class="col-md-10"><input class="form-control" name="user_name" type="text" value="<?php echo $user_name ?>" disabled></div>
                        </div>

                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-phone"></em>&nbsp<b> เบอร์โทรติดต่อ</b></label>
                            <div class="col-md-10"><input class="form-control" name="user_phone" type="text" value="<?php echo $user_phone ?>" disabled></div>
                        </div>

                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><b><font color="#32cd32">line</font>&nbsp ไลน์ไอดี</b></label>
                            <div class="col-md-10"><input class="form-control" name="user_phone" type="text" value="<?php echo $work_id; ?>" disabled></div>
                        </div>

                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</section><!-- Page footer-->