<section class="section-container">
    <!-- Page content-->
    <div class="content-wrapper">
        <p class="lead"><em class="fa fa-address-card"> </em> [ ช่องทางการชำระเงินค่าบริการเว็ปไซต์ ] </p>
        <div class="card card-default">
            <br>
            <p class="lead" align="center">( <em class="fa fa-money-bill"></em> ค่าบริการเดือนละ 500 บาท )</p>
            <div class="card-header">
                <?php
                $con=connect_db();
                $sql="SELECT * FROM tbl_payment_detail";
                $result=mysqli_query($con,$sql);
                $i=0;
                while (list($payment_detail_id,$payment_detail_name,$payment_detail_num,$payment_detail_bank)=mysqli_fetch_row($result)) {
                    $i+=1;
                    echo "<p class='lead'> <em class=\"fa fa-chevron-left\"></em> บัญชีธนาคารที่ ",$i," <em class=\"fa fa-chevron-right\"></em> </p>";
                    ?>

                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-university"></em>&nbsp<b> ธนาคาร</b></label>
                            <div class="col-md-10"><input class="form-control" name="work_payment_total" type="text" value="<?php echo $payment_detail_bank; ?>" disabled></div>
                        </div>
                        <br>
                        <div class="form-group row"><label class="col-md-2 col-form-label"> <em class="fa fa-address-card"></em>&nbsp<b> ชื่อเจ้าของบัญชี</b></label>
                            <div class="col-md-10"><input class="form-control" name="work_payment_date" type="text" value="<?php echo $payment_detail_name; ?>" disabled></div>
                        </div>
                        <br>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-hashtag"></em>&nbsp<b> เลขบัญชี</b></label>
                            <div class="col-md-10"><input class="form-control" name="work_payment_time" type="text" value="<?php echo $payment_detail_num; ?>" disabled></div>
                        </div>
                        <br>
                        <div class="clearfix">

                            <div class="float-right">
                                <button class="btn btn-primary" type="button" onclick=window.location.href="index.php?module=work_payment&action=form_add_work_payment&id=<?php echo $payment_detail_id; ?>">
                                    <em class="fa fa-university fa-fw" ></em> เลือกบัญชีที่ <?php echo $i; ?><em class="fa fa-caret-right fa-fw" ></em></button>
                            </div>

                        </div>
                    </fieldset>
                <?php } ?>


            </div>

        </div><!-- END card-->
    </div>
</section><!-- Page footer-->