<section class="section-container">
    <!-- Page content-->
    <div class="content-wrapper">
        <br><p class="lead"><em class="fa fa-money-check"> </em> [ แสดงข้อมูลค่าบริการ รหัส <?php echo $_GET['id']; ?> ] </p>
        <div class="card card-default">
            <?php
            if($_GET['deposit_active']==1){
            $p1=(float)cal_price($_GET['deposit_type'],$_GET['car_type_id'],$_GET['days']);
            $p2=(float)cal_mulct($_GET['id']);
            $p3=(float)cal_wash($_GET['id'],$_GET['car_type_id']);
            ?>
            <div class="card-body">
                <form>

                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-calendar-check"></em>&nbsp<b> ค่าบริการฝากรถ: </b> <div class="float-right"><?php echo $p1; ?> บาท</div></label>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-tint"></em>&nbsp<b> ค่าบริการล้างรถ: </b> <div class="float-right"><?php echo $p3; ?> บาท</div></label>
                        </div>
                    </fieldset>

                    <?php
                    $con=connect_db();
                    $sql1="SELECT * FROM tbl_mulct WHERE deposit_id='$_GET[id]'";//ต้องเปลี่ยน WHERE
                    $result1=mysqli_query($con,$sql1);
                    while ($row = mysqli_fetch_assoc($result1)) {
                    extract($row);//ทำให้อยู่ในตัวแปรตามชื่อแอทริบิว
                    ?>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-exclamation-circle"></em>&nbsp<b> หมายเหตุค่าปรับ: </b> <div class="float-right"><?php echo $mulct_list; ?></div></label>
                        </div>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-money-bill"></em>&nbsp<b> จำนวนเงิน: </b> <div class="float-right"><?php echo $mulct_price; ?> บาท</div></label>
                        </div>
                    </fieldset>
                    <?php } ?>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-check"></em>&nbsp<b> ยอดที่ต้องชำระทั้งหมด: </b> <div class="float-right"><b><?php echo $p1+$p2+$p3; ?> บาท</b></div></label>
                        </div>
                    </fieldset>
                    <?php
                        }else{
                        $con=connect_db();
                        $sql="SELECT * FROM tbl_bill WHERE deposit_id='$_GET[id]'";
                        $result1=mysqli_query($con,$sql);
                        $row = mysqli_fetch_assoc($result1);
                        extract($row);
                    ?>
                    <div class="card-body">
                        <form>

                            <fieldset>
                                <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-calendar-check"></em>&nbsp<b> ค่าบริการฝากรถ: </b> <div class="float-right"><?php echo $bill_deposit; ?> บาท</div></label>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-tint"></em>&nbsp<b> ค่าบริการล้างรถ: </b> <div class="float-right"><?php echo $bill_wash; ?> บาท</div></label>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-exclamation-circle"></em>&nbsp<b> ค่าปรับ: </b> <div class="float-right"><?php echo $bill_mulct; ?> บาท</div></label>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-check"></em>&nbsp<b> ยอดชำระทั้งหมด: </b> <div class="float-right"><b><?php echo $bill_total; ?> บาท</b></div></label>
                                </div>
                            </fieldset>
                            <?php } ?>
                    <div class="float-left">
                        <button class="btn btn-danger" type="button" onclick=window.location.href="index.php?module=deposit&action=show_deposit&id=<?php echo $_GET['id']; ?>">
                            <em class="fa fa-caret-left fa-fw" ></em>กลับ</button>
                    </div>

                    </div>


                    <div>

                    </div>

                    <div class="clearfix">
                    </div>
                </form>
            </div>
            <?php
            $sql2="SELECT * FROM tbl_car_type WHERE car_type_id='$_GET[car_type_id]'";//ต้องเปลี่ยน WHERE
            $result2=mysqli_query($con,$sql2);
            $row = mysqli_fetch_assoc($result2);
            extract($row);
            echo " <p><em class='fa fa-motorcycle'></em> ประเภทของรถ: $car_type_name</p>";
            echo "<p><em class='fa fa-calendar'></em> ค่าฝากรายวัน: $car_type_deposit_price ฿</p>";
            echo "<p><em class='fa fa-calendar-alt'></em> ค่าฝาก 1 เดือน: $car_type_1month_deposit_price ฿</p>";
            echo  "<p><em class='fa fa-calendar-alt'></em> ค่าฝาก 3 เดือน: $car_type_3month_deposit_price ฿</p>";
            echo  "<p><em class='fa fa-calendar-alt'></em> ค่าฝาก 6 เดือน: $car_type_6month_deposit_price ฿</p>";
            echo  "<p><em class='fa fa-calendar-alt'></em> ค่าฝาก 1 ปี: $car_type_1year_deposit_price ฿</p>";
            ?>
        </div><!-- END card-->
    </div>
</section><!-- Page footer-->