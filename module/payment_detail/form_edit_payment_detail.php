<section class="section-container">
    <div class="content-wrapper">
        <div class="card card-default">
            <div class="card-header"><p class="lead">แก้ไขข้อมูลบัญชีธนาคาร</p>
                <form class="form-horizontal" method="post" action=<?php MALink('payment_detail','edit_payment_detail') ?>>
                <?php
                $con=connect_db();
                $sql="SELECT * FROM tbl_payment_detail WHERE payment_detail_id='$_GET[id]' ";
                $result=mysqli_query($con,$sql);
                $row = mysqli_fetch_assoc($result);
                extract($row);
                    ?>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-address-card"></em>&nbsp<b> บัญชี</b></label>
                            <div class="col-md-10"><input class="form-control" name="payment_detail_id" type="text" value="<?php echo $payment_detail_id; ?>" disabled></div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-university"></em>&nbsp<b> ธนาคาร</b></label>
                            <div class="col-md-10"><input class="form-control" name="payment_detail_bank" type="text" value="<?php echo $payment_detail_bank; ?>"></div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"> <em class="fa fa-user"></em>&nbsp<b> ชื่อเจ้าของบัญชี</b></label>
                            <div class="col-md-10"><input class="form-control" name="payment_detail_name" type="text" value="<?php echo $payment_detail_name; ?>"></div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-hashtag"></em>&nbsp<b> เลขบัญชี</b></label>
                            <div class="col-md-10"><input class="form-control" name="payment_detail_num" type="text" value="<?php echo $payment_detail_num; ?>"></div>
                        </div>
                    </fieldset>
                    <input type="hidden" name="payment_detail_id" value="<?php echo $payment_detail_id; ?>">
                    <div class="clearfix">
                    <div class="float-left">
                        <button class="btn btn-danger" type="button" onclick=window.location.href="<?php MALink('payment_detail','list_payment_detail')?>">
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