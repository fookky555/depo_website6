<section class="section-container">
    <!-- Page content-->
    <?php
    $con=connect_db();

    $sql1="SELECT * FROM tbl_work WHERE work_id='$_SESSION[work_id]'";//ต้องเปลี่ยน WHERE

    $result=mysqli_query($con,$sql1);

    list($work_id,$work_name,$work_status,$work_contact_phone,$work_contact_name)=mysqli_fetch_row($result);

    ?>
    <div class="content-wrapper">
        <p class="lead"><em class="fa fa-store-alt"></em> [ ข้อมูลของร้าน ] </p>
        <div class="card card-default">
            <div class="card-header"></div>
            <div class="card-body">
                <form class="form-horizontal" method="post" action="">
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-hashtag">&nbsp รหัสร้าน</em></label>
                            <div class="col-md-10"><input class="form-control" name="work_name" type="text" value="<?php echo $work_id ?>" disabled></div>
                        </div>

                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-sign">&nbsp ชื่อร้าน</em></label>
                            <div class="col-md-10"><input class="form-control" name="work_name" type="text" value="<?php echo $work_name ?>" disabled></div>
                        </div>

                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"> <em class="fa fa-address-card">&nbsp ชื่อผู้ติดต่อร้าน</em></label>
                            <div class="col-md-10"><input class="form-control" name="work_contact_name" type="text" value="<?php echo $work_contact_name ?>" disabled></div>
                        </div>

                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-phone">&nbsp เบอร์ติดต่อร้าน</em></label>
                            <div class="col-md-10"><input class="form-control" name="work_contact_phone" type="text" value="<?php echo $work_contact_phone ?>" disabled></div>
                        </div>

                    </fieldset>
                    <?php
                    $status="";
                        if($work_status==0){
                            $status="ยังไม่ได้ชำระเงิน";
                        }else{
                            $status="ชำระเงินแล้ว";
                        }
                        ?>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-check"> สถานะการชำระเงิน</em></label>
                            <div class="col-md-10"><input class="form-control" name="work_contact_phone" type="text" value="<?php echo $status; ?>" disabled></div>
                        </div>

                    </fieldset>

                    <input type="hidden" name="work_id" value="<?php echo $work_id ?>">
                    <div class="clearfix">

                        <?php if($_SESSION['user_role']=="ผู้ดูแล"){ ?>
                        <div class="float-right">
                            <button class="btn btn-primary" type="button" onclick=window.location.href="index.php?module=work&action=form_edit_work">
                                <em class="fa fa-edit fa-fw"></em> แก้ไขช้อมูล</button>

                        </div>
                        <?php } ?>

                    </div>
                </form>
            </div>
        </div><!-- END card-->
    </div>
</section><!-- Page footer-->