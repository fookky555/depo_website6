<section class="section-container">
    <!-- Page content-->
    <div class="content-wrapper">

        <div class="card card-default">

            <div class="card-body">
                <p class="lead">ยืนยันการชำระเงิน (500 บาท ต่อเดือน)</p><br>
                <form class="form-horizontal" method="post" action=<?php MALink('work_payment','add_work_payment') ?>>

                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-money-bill"></em>&nbsp<b> จำนวนที่โอน</b></label>
                            <div class="col-md-10"><input class="form-control" name="work_payment_total" type="text" value="500" disabled></div>
                        </div>

                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-university"></em>&nbsp<b> บัญชีธนาคาร</b></label>
                            <div class="col-md-10"><select class="custom-select custom-select-sm" name="payment_detail_id">
                                    <?php
                                    $con=connect_db();
                                    $sql1="SELECT payment_detail_id, payment_detail_bank FROM tbl_payment_detail";
                                    $result1=mysqli_query($con,$sql1);
                                    $i=1;
                                    while(list($id,$bank)=mysqli_fetch_row($result1)){
                                        echo "<option value=$id>$bank (บัญชีที่ $i)</option>";
                                        $i++;
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"> <em class="fa fa-calendar"></em>&nbsp<b> วันที่โอน</b></label>
                            <div class="col-md-10"><input class="form-control" name="work_payment_date" type="date"></div>
                        </div>

                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-clock"></em>&nbsp<b> เวลาโอน</b></label>
                            <div class="col-md-10"><input class="form-control" name="work_payment_time" type="time"></div>
                        </div>

                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-file-image"></em>&nbsp<b> หลักฐานการโอน</b></label>
                            <div class="col-md-10"><input class="form-control" name="work_payment_pic" type="file"></div>
                        </div>

                    </fieldset>
                    <input type="hidden" name="work_id" value="<?php echo $_SESSION['work_id']; ?>">
                    <div class="clearfix">
                        <div class="float-left">
                            <button class="btn btn-danger" type="button" onclick=window.location.href="<?php MALink('work_payment','show_work_payment')?>">
                                <em class="fa fa-caret-left fa-fw" ></em>กลับ</button>
                        </div>

                        <div class="float-right">
                            <button class="btn btn-primary" type="submit">
                                <em class="fa fa-check fa-fw"></em>บันทึก</button>

                        </div>

                    </div>
                </form>
            </div>
        </div><!-- END card-->
    </div>
</section><!-- Page footer-->