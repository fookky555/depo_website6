<section class="section-container">
    <!-- Page content-->
    <div class="content-wrapper">
        <div class="card card-default">
            <div class="card-header"><b>แก้ไขข้อมูลประเภทรถ</b></div>
            <div class="card-body">
                <form class="form-horizontal" method="post" action="<?php MALink('car_type','edit_car_type') ?>">
                    <?php
                    $con=connect_db();

                    $sql1="SELECT * FROM tbl_car_type WHERE car_type_id='$_GET[id]'";//ต้องเปลี่ยน WHERE

                    $result=mysqli_query($con,$sql1);

                    list($car_type_id,$car_type_name,$car_type_deposit_price,$car_type_wash_price,$car_type_1month_deposit_price,$car_type_3month_deposit_price,$car_type_6month_deposit_price,$car_type_1year_deposit_price,$work_id)=mysqli_fetch_row($result);

                    ?>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-car"></em>&nbsp<b> ประเภทรถ</b></label>
                            <div class="col-md-10"><input class="form-control" name="car_type_name" type="text" value="<?php echo $car_type_name;?>"></div>
                        </div>

                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"> <em class="fa fa-moon"></em>&nbsp<b> ค่าฝากรายวัน</b></label>
                            <div class="col-md-10"><input class="form-control" name="car_type_deposit_price" type="number" value="<?php echo $car_type_deposit_price;?>"></div>
                        </div>

                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-calendar"></em>&nbsp<b> ค่าฝาก1เดือน</b></label>
                            <div class="col-md-10"><input class="form-control" name="car_type_1month_deposit_price" type="number" value="<?php echo $car_type_1month_deposit_price;?>"></div>
                        </div>

                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-calendar"></em>&nbsp<b> ค่าฝาก3เดือน</b></label>
                            <div class="col-md-10"><input class="form-control" name="car_type_3month_deposit_price" type="number" value="<?php echo $car_type_3month_deposit_price;?>"></div>
                        </div>

                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-calendar"></em>&nbsp<b> ค่าฝาก6เดือน</b></label>
                            <div class="col-md-10"><input class="form-control" name="car_type_6month_deposit_price" type="number" value="<?php echo $car_type_6month_deposit_price;?>"></div>
                        </div>

                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-calendar"></em>&nbsp<b> ค่าฝาก1ปี</b></label>
                            <div class="col-md-10"><input class="form-control" name="car_type_1year_deposit_price" type="number" value="<?php echo $car_type_1year_deposit_price;?>"></div>
                        </div>

                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-tint"></em>&nbsp<b> ค่าบริการล้างรถ</b></label>
                            <div class="col-md-10"><input class="form-control" name="car_type_wash_price" type="number" value="<?php echo $car_type_wash_price;?>"></div>
                        </div>

                    </fieldset>
                    <input type="hidden" name="car_type_id" value="<?php echo $car_type_id; ?>">
                    <div class="clearfix">
                        <div class="float-left">
                            <button class="btn btn-danger" type="button" onclick=window.location.href="<?php MALink('car_type','list_car_type')?>">
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