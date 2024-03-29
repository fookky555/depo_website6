<section class="section-container">
    <!-- Page content-->
    <div class="content-wrapper">
        <div class="lead"><b><em class="fa fa-plus-square"></em> [ เพิ่มข้อมูลประเภทรถ ] </b></div><br>
        <div class="card card-default">
            <div class="card-body">
                <form class="form-horizontal" method="post" action="<?php MALink('car_type','add_car_type') ?>">

                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-car"></em>&nbsp<b> ประเภทรถ</b></label>
                            <div class="col-md-10"><input class="form-control" name="car_type_name" type="text" placeholder="ประเภทรถ" required></div>
                        </div>

                    <br>
                        <div class="form-group row"><label class="col-md-2 col-form-label"> <em class="fa fa-moon"></em>&nbsp<b> ค่าฝากรายวัน</b></label>
                            <div class="col-md-10"><input class="form-control" name="car_type_deposit_price" type="number" min="0" placeholder="ค่าฝากรายวัน" required></div>
                        </div>

                        <br>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-calendar"></em>&nbsp<b> ค่าฝาก 1 เดือน</b></label>
                            <div class="col-md-10"><input class="form-control" name="car_type_1month_deposit_price" type="number" min="0" placeholder="ค่าฝาก 1 เดือน (ถ้ามี)"></div>
                        </div>

                        <br>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-calendar"></em>&nbsp<b> ค่าฝาก 3 เดือน</b></label>
                            <div class="col-md-10"><input class="form-control" name="car_type_3month_deposit_price" type="number" min="0" placeholder="ค่าฝาก 3 เดือน (ถ้ามี)"></div>
                        </div>

                        <br>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-calendar"></em>&nbsp<b> ค่าฝาก 6 เดือน</b></label>
                            <div class="col-md-10"><input class="form-control" name="car_type_6month_deposit_price" type="number" min="0" placeholder="ค่าฝาก 6 เดือน (ถ้ามี)"></div>
                        </div>

                        <br>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-calendar"></em>&nbsp<b> ค่าฝาก 1 ปี</b></label>
                            <div class="col-md-10"><input class="form-control" name="car_type_1year_deposit_price" type="number" min="0" placeholder="ค่าฝาก 1 ปี (ถ้ามี)"></div>
                        </div>

                        <br>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-tint"></em>&nbsp<b> ค่าบริการล้างรถ</b></label>
                            <div class="col-md-10"><input class="form-control" name="car_type_wash_price" type="number" min="0" placeholder="ค่าบริการล้างรถ (ถ้ามี)"></div>
                        </div>

                    </fieldset>

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