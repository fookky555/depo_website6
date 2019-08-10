<section class="section-container">
    <!-- Page content-->
    <div class="content-wrapper">
        <p class="lead"><em class="fa fa-pen"></em> [ แก้ไขข้อมูลชำระเงินการฝากรถ ] </p>
        <div class="card card-default">
            <div class="card-body">
                <form class="form-horizontal" method="post" action="<?php MALink("bill","edit_bill") ?>">
                    <?php
                    $con=connect_db();
                    $sql="SELECT * FROM tbl_bill WHERE bill_id='$_GET[id]'";
                    $result1=mysqli_query($con,$sql);
                    $row = mysqli_fetch_assoc($result1);
                    extract($row);
                    ?>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-calendar"></em>&nbsp<b> วันที่ฝากรถ</b></label>
                            <div class="col-md-10"><input class="form-control" name="bill_date" type="text" value="<?php echo $bill_date;?>" disabled></div>
                        </div>

                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"> <em class="fa fa-motorcycle"></em>&nbsp<b> ค่าบริการฝากรถ</b></label>
                            <div class="col-md-10"><input class="form-control" name="bill_deposit" type="number" value="<?php echo $bill_deposit;?>" required></div>
                        </div>

                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"> <em class="fa fa-tint"></em>&nbsp<b> ค่าบริการล้างรถ</b></label>
                            <div class="col-md-10"><input class="form-control" name="bill_wash" type="number" value="<?php echo $bill_wash;?>" required></div>
                        </div>

                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"> <em class="fa fa-exclamation-circle"></em>&nbsp<b> ค่าปรับ</b></label>
                            <div class="col-md-10"><input class="form-control" name="bill_mulct" type="number" value="<?php echo $bill_mulct;?>" required></div>
                        </div>

                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"> <em class="fa fa-money-bill"></em>&nbsp<b> ยอดชำระเงินทั้งหมด</b></label>
                            <div class="col-md-10"><input class="form-control" name="bill_total" type="number" value="<?php echo $bill_total;?>" disabled></div>
                        </div>

                    </fieldset>
                    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                    <div class="clearfix">
                        <div class="float-left">
                            <button class="btn btn-danger" type="button" onclick=window.location.href="<?php MALink('bill','list_bill')?>">
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