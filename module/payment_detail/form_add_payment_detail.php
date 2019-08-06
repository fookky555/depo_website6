<section class="section-container">
    <div class="content-wrapper">
        <div class="card card-default">
            <div class="card-header"><p class="lead"><em class="fa fa-university"> </em> [ เพิ่มข้อมูลบัญชีธนาคาร ] </p>
                <form class="form-horizontal" method="post" action=<?php MALink('payment_detail','add_payment_detail') ?>>
                    <?php
                    $con=connect_db();
                    $sql1="SELECT payment_detail_id FROM tbl_payment_detail ORDER BY payment_detail_id DESC LIMIT 1";

                    $result=mysqli_query($con,$sql1);

                    list($payment_detail_id)=mysqli_fetch_row($result);
                    ?>

                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-address-card"></em>&nbsp<b> บัญชี</b></label>
                            <div class="col-md-10"><input class="form-control" name="id" type="text" value="<?php echo $payment_detail_id+1; ?>" disabled></div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-university"></em>&nbsp<b> ธนาคาร</b></label>
                            <div class="col-md-10"><input class="form-control" name="payment_detail_bank" type="text" placeholder="ระบุธนาคาร"></div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"> <em class="fa fa-user"></em>&nbsp<b> ชื่อเจ้าของบัญชี</b></label>
                            <div class="col-md-10"><input class="form-control" name="payment_detail_name" type="text" placeholder="ระบุชื่อเจ้าของบัญชี"></div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-hashtag"></em>&nbsp<b> เลขบัญชี</b></label>
                            <div class="col-md-10"><input class="form-control" name="payment_detail_num" type="text" placeholder="ระบุเลขบัญชี"></div>
                        </div>
                    </fieldset>
                    <input type="hidden" name="payment_detail_id" value="<?php echo $payment_detail_id+1; ?>">
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