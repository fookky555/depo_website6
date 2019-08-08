<section class="section-container">
    <!-- Page content-->
    <div class="col-xl-11">
        <br><p class="lead"><em class="fa fa-money-check"> </em> [ แสดงข้อมูลฝากรถ รหัส <?php echo $_GET['id']; ?> ] </p>
        <div class="card card-default">
            <?php
            $con=connect_db();
            $sql1="SELECT * FROM tbl_deposit WHERE deposit_id='$_GET[id]'";
            $result1=mysqli_query($con,$sql1);
            list($deposit_id,$car_type_id,$deposit_plate_id,$deposit_helmet,$deposit_number,$deposit_pickup_date,$deposit_date,$deposit_pic,$deposit_type,$user_id,$deposit_detail,$deposit_fuel,$deposit_pickup_name,$work_id)=mysqli_fetch_row($result1);
            $date = new DateTime($deposit_date);
            $now = new DateTime();
            $days=$date->diff($now)->format("%d");
            ?>
            <div class="card-body">
                <form>

                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-calendar-check"></em>&nbsp<b> จำนวนวันที่ฝาก</b></label>
                            <div class="col-md-10"><input class="form-control" name="deposit_plate_id" type="text" value="<?php echo $days; ?>" disabled></div>
                        </div>

                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-money-bill"></em>&nbsp<b> ประเภทของการฝาก</b></label>
                            <div class="col-md-10"><select class="custom-select custom-select-sm" name="deposit_type" disabled>
                                    <?php
                                    for($i=1;$i<=5;$i++){
                                        if($i==$deposit_type){
                                            $check[$i]="selected";
                                        }
                                    }
                                    ?>
                                    <option value="">เลือกประเภทของการฝาก..</option>
                                    <option value="1" <?php if(isset($check[1])) echo $check[1]; ?>>ฝากรายวัน</option>
                                    <option value="2" <?php if(isset($check[2])) echo $check[2]; ?>>ฝาก 1 เดือน</option>
                                    <option value="3" <?php if(isset($check[3])) echo $check[3]; ?>>ฝาก 3 เดือน</option>
                                    <option value="4" <?php if(isset($check[4])) echo $check[4]; ?>>ฝาก 6 เดือน</option>
                                    <option value="5" <?php if(isset($check[5])) echo $check[5]; ?>>ฝาก 1 ปี</option>
                                </select>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-file-image"></em>&nbsp<b> รูปภาพผู้ฝาก</b></label>
                            <div class="col-md-10">
                                <div class="col-xl-4">
                                    <!-- START card-->
                                    <div class="card"><img class="img-fluid ie-fix-flex" src="img/deposit/<?php echo $deposit_pic; ?>" alt="Image"></div><!-- END card-->
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-money-bill"></em>&nbsp<b> ค่าใช้บริการ</b></label>
                            <div class="col-md-10"><button class="btn btn-block btn-success mt-0" type="button" onclick=window.location.href="index.php?module=deposit&action=show_price">
                                    <font size="3"><b><?php cal_price($deposit_type,$car_type_id,$days)+cal_mulct($deposit_id)+cal_wash($deposit_id,$car_type_id); ?> </b>฿</font></button></div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"> <em class="fa fa-book"></em>&nbsp<b> รายละเอียดการฝาก</b></label>
                            <div class="col-md-10">
                                <button class="btn btn-warning" id="btnS" type="button" onclick="togglefunc()">
                                    <em class="fa fa-caret-left fa-search" ></em> แสดงรายละเอียด</button>
                            </div>
                        </div>
                    </fieldset>
                    <div id="detail_form" style="display: none">
                        <fieldset>
                            <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-car"></em>&nbsp<b> ป้ายทะเบียนรถ</b></label>
                                <div class="col-md-10"><input class="form-control" name="deposit_plate_id" type="text" value="<?php echo $deposit_plate_id; ?>" disabled></div>
                            </div>

                        </fieldset>
                        <fieldset>
                            <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-motorcycle"></em>&nbsp<b> ประเภทของรถ</b></label>
                                <div class="col-md-10"><select class="custom-select custom-select-sm" name="car_type_id" disabled>
                                        <option value="">เลือกประเภทของรถ..</option>
                                        <?php
                                        $sql1="SELECT car_type_id,car_type_name FROM tbl_car_type WHERE work_id='$work_id'";
                                        $result1=mysqli_query($con,$sql1);
                                        while(list($car_id,$car_type_name)=mysqli_fetch_row($result1)){
                                            if($car_id==$car_type_id){
                                                echo "<option value=$car_id selected>$car_type_name</option>";
                                            }else{
                                                echo "<option value=$car_id>$car_type_name</option>";
                                            }
                                        }
                                        //                                    $date = new DateTime($deposit_date);
                                        //                                    $now = new DateTime();
                                        //
                                        //                                    echo $date->diff($now)->format("%d days");
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                        <?php
                        $sql1="SELECT * FROM tbl_wash WHERE deposit_id='$_GET[id]'";
                        $result1=mysqli_query($con,$sql1);
                        list($check_wash)=mysqli_fetch_row($result1);
                        if(!empty($check_wash)){

                        ?>
                        <fieldset>
                            <div class="form-group row"><label class="col-md-2 col-form-label"> <em class="fa fa-tint"></em>&nbsp<b> บริการล้างรถ</b></label>
                                <div class="col-md-10"><div class="checkbox c-checkbox"><label><input type="checkbox" value="1" name="deposit_wash" id="wash" onclick="show_pickup_date()" checked disabled><span class="fa fa-check"></span></label> </div></div>
                            </div>
                            <?php }else{
                            ?>
                            <fieldset>
                                <div class="form-group row"><label class="col-md-2 col-form-label"> <em class="fa fa-tint"></em>&nbsp<b> บริการล้างรถ</b></label>
                                    <div class="col-md-10"><div class="checkbox c-checkbox"><label><input type="checkbox" value="1" name="deposit_wash" id="wash" onclick="show_pickup_date()" disabled><span class="fa fa-check"></span></label> </div></div>
                                </div>
                                <?php } ?>


                            </fieldset>
                            <fieldset>
                                <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-calendar"></em>&nbsp<b> วันรับรถ (กรณีล้างรถ)</b></label>
                                    <div class="col-md-10"><input class="form-control" name="deposit_pickup_date" type="date" value="<?php echo $deposit_pickup_date; ?>" disabled></div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-user-astronaut"></em>&nbsp<b> จำนวนหมวกกันน็อค</b></label>
                                    <div class="col-md-10"><input class="form-control" name="deposit_helmet" type="number" value="<?php echo $deposit_helmet; ?>" disabled></div>
                                </div>

                            </fieldset>
                            <fieldset>
                                <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-gas-pump"></em>&nbsp<b> น้ำมันคงเหลือ (%)</b></label>
                                    <div class="col-md-10">
                                        <input class="slider slider-horizontal" data-ui-slider="" type="text" value="" data-slider-min="0" data-slider-max="100" data-slider-step="10" data-slider-value="<?php echo $deposit_fuel; ?>" data-slider-orientation="horizontal" name="deposit_fuel" disabled>
                                    </div>
                                </div>

                            </fieldset>
                            <fieldset>
                                <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-phone"></em>&nbsp<b> เบอร์โทรติดต่อ</b></label>
                                    <div class="col-md-10"><input class="form-control" name="deposit_number" type="number" value="<?php echo $deposit_number; ?>" disabled></div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-user"></em>&nbsp<b> ผู้มารับแทน</b></label>
                                    <div class="col-md-10"><input class="form-control" name="deposit_pickup_name" type="text" value="<?php echo $deposit_pickup_name; ?>" disabled></div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-file-alt"></em>&nbsp<b> รายละเอียดเพิ่มเติม</b></label>
                                    <div class="col-md-10"><textarea class="form-control" aria-label="With textarea" rows="4" name="deposit_detail" disabled><?php echo $deposit_detail; ?>"</textarea></div>
                                </div>
                            </fieldset>

                    </div>
                    <input type="hidden" value="<?php echo $deposit_id; ?>" name="id">
                    <div>

                    </div>
                    <div class="clearfix">
                        <div class="float-left">
                            <button class="btn btn-danger" type="button" onclick=window.location.href="index.php?module=deposit&action=search_deposit">
                                <em class="fa fa-caret-left fa-fw" ></em>กลับ</button>
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