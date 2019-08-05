<section class="section-container">
    <!-- Page content-->
    <div class="content-wrapper">
        <p class="lead"> [ เพิ่มข้อมูลฝากรถ ] </p>
        <div class="card card-default">

            <div class="card-body">
                <form enctype="multipart/form-data" class="form-horizontal" method="post" action="<?php MALink('deposit','add_deposit') ?>">

                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-car"></em>&nbsp<b> ป้ายทะเบียนรถ</b></label>
                            <div class="col-md-10"><input class="form-control" name="deposit_plate_id" type="text" placeholder="ระบุป้ายทะเบียนรถ.." required></div>
                        </div>

                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-motorcycle"></em>&nbsp<b> ประเภทของรถ</b></label>
                            <div class="col-md-10"><select class="custom-select custom-select-sm" name="car_type_id">
                                    <option value="">เลือกประเภทของรถ..</option>
                                    <?php
                                    $con=connect_db();
                                    $sql1="SELECT car_type_id,car_type_name FROM tbl_car_type WHERE work_id='$_SESSION[work_id]'";
                                    $result1=mysqli_query($con,$sql1);
                                    while(list($car_type_id,$car_type_name)=mysqli_fetch_row($result1)){
                                        echo "<option value=$car_type_id>$car_type_name</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-money-bill"></em>&nbsp<b> ประเภทของการฝาก</b></label>
                            <div class="col-md-10"><select class="custom-select custom-select-sm" name="deposit_type">
                                    <option value="">เลือกประเภทของการฝาก..</option>
                                    <option value="1">ฝากรายวัน</option>
                                    <option value="2">ฝาก 1 เดือน</option>
                                    <option value="3">ฝาก 3 เดือน</option>
                                    <option value="4">ฝาก 6 เดือน</option>
                                    <option value="5">ฝาก 1 ปี</option>
                                </select>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-file-image"></em>&nbsp<b> รูปภาพผู้ฝาก</b></label>
                            <div class="col-md-10"><input type="file" class="dropify form-control" data-default-file="url_of_your_file" name="deposit_pic"  data-max-file-size="3M" data-allowed-file-extensions="jpg JPG jpeg JPEG  GIF gif png PNG"  required></div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"> <em class="fa fa-tint"></em>&nbsp<b> บริการล้างรถ</b></label>
                            <div class="col-md-10"><div class="checkbox c-checkbox"><label><input type="checkbox" value="1" name="deposit_wash" id="wash" onclick="show_pickup_date()"><span class="fa fa-check"></span></label> </div></div>
                        </div>
                   <div id="pickup_date" style="display: none"><br>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-calendar"></em>&nbsp<b> วันรับรถ (กรณีล้างรถ)</b></label>
                            <div class="col-md-10"><input class="form-control" name="deposit_pickup_date" type="date"></div>
                        </div>
                   </div>
                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"> <em class="fa fa-book"></em>&nbsp<b> รายละเอียดการฝาก</b></label>
                            <div class="col-md-10">
                                <button class="btn btn-warning" id="btnS" type="button" onclick="togglefunc()">
                                    <em class="fa fa-caret-left fa-pen" ></em> บันทึกรายละเอียด</button>
                            </div>
                        </div>
                    </fieldset>
<div id="detail_form" style="display: none">
    <fieldset>
        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-user-astronaut"></em>&nbsp<b> จำนวนหมวกกันน็อค</b></label>
            <div class="col-md-10"><input class="form-control" name="deposit_helmet" type="number" placeholder="(กรณีจักรยานยนต์)"></div>
        </div>

    </fieldset>
    <fieldset>
        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-gas-pump"></em>&nbsp<b> น้ำมันคงเหลือ (%)</b></label>
            <div class="col-md-10">
                <input class="slider slider-horizontal" data-ui-slider="" type="text" value="" data-slider-min="0" data-slider-max="100" data-slider-step="10" data-slider-value="10" data-slider-orientation="horizontal" name="deposit_fuel">
            </div>
        </div>

    </fieldset>
    <fieldset>
        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-phone"></em>&nbsp<b> เบอร์โทรติดต่อ</b></label>
            <div class="col-md-10"><input class="form-control" name="deposit_number" type="number" placeholder="ระบุเบอร์โทร.."></div>
        </div>
    </fieldset>
    <fieldset>
        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-user"></em>&nbsp<b> ผู้มารับแทน</b></label>
            <div class="col-md-10"><input class="form-control" name="deposit_pickup_name" type="text" placeholder="ระบุชื่อผู้มารับแทน.."></div>
        </div>
    </fieldset>
    <fieldset>
        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-file-alt"></em>&nbsp<b> รายละเอียดเพิ่มเติม</b></label>
            <div class="col-md-10"><textarea class="form-control" aria-label="With textarea" rows="4" name="deposit_detail" placeholder="ระบุรายละเอียดเพิ่มเติม.."></textarea></div>
        </div>
    </fieldset>

</div>

                    <div>

                    </div>
                    <div class="clearfix">
                        <div class="float-left">
                            <button class="btn btn-danger" type="button" onclick=window.location.href="<?php MALink('deposit','list_deposit')?>">
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
<script>
    function show_pickup_date() {
        var checkBox = document.getElementById("wash");
        var text = document.getElementById("pickup_date");
        if (checkBox.checked == true){
            text.style.display = "block";
        } else {
            text.style.display = "none";
        }
    }
</script>