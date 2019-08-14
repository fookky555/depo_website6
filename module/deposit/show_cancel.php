

<section class="section-container">
    <!-- Page content-->
    <div class="content-wrapper">
        <?php
        $con=connect_db();
        $sql1="SELECT * FROM tbl_deposit WHERE deposit_id='$_GET[id]'";
        $result1=mysqli_query($con,$sql1);
        list($deposit_id,$car_type_id,$deposit_plate_id,$deposit_helmet,$deposit_number,$deposit_pickup_date,$deposit_date,$deposit_pic,$deposit_type,$user_id,$deposit_detail,$deposit_fuel,$deposit_pickup_name,$work_id,$deposit_active)=mysqli_fetch_row($result1);

        ?>
        <br><p class="lead"><em class="fa fa-money-check"> </em> [ แสดงข้อมูลฝากรถ รหัส <?php echo $_GET['id']; ?> ]</p>
        <div class="card card-default">
            <div class="card-body">
                <form>

                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-calendar-check"></em>&nbsp<b> วันและเวลาที่ฝาก: </b> <div class="float-right"><?php echo $deposit_date; ?></div></label>
                        </div>
                    </fieldset>
                    <?php

                    if($deposit_type==1){
                        $type_name="ฝากรายวัน";
                    }elseif ($deposit_type==2){
                        $type_name="ฝาก 1 เดือน";
                    }elseif ($deposit_type==3){
                        $type_name="ฝาก 3 เดือน";
                    }elseif ($deposit_type==4){
                        $type_name="ฝาก 6 เดือน";
                    }else{
                        $type_name="ฝาก 1 ปี";
                    }

                    ?>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-money-bill"></em>&nbsp<b> ประเภทของการฝาก: </b> <div class="float-right"><?php echo $type_name; ?></div></label>
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
                        <div class="form-group row"><label class="col-md-2 col-form-label"> <em class="fa fa-book"></em>&nbsp<b> รายละเอียดการฝาก</b></label>
                            <div class="col-md-10">
                                <button class="btn btn-warning" id="btnS" type="button" onclick="togglefunc()">
                                    <em class="fa fa-caret-left fa-search" ></em> แสดงรายละเอียด</button>
                            </div>
                        </div>
                    </fieldset>
                    <div id="detail_form" style="display: none">
                        <fieldset>
                            <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-car"></em>&nbsp<b> ป้ายทะเบียนรถ: </b> <div class="float-right"><?php echo $deposit_plate_id; ?></div></label>
                            </div>
                        </fieldset>

                        <?php
                        $sql1="SELECT car_type_id,car_type_name FROM tbl_car_type WHERE work_id='$work_id'";
                        $result1=mysqli_query($con,$sql1);
                        while(list($car_id,$car_type_name)=mysqli_fetch_row($result1)){
                            if($car_id==$car_type_id){
                                ?>
                                <fieldset>
                                    <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-motorcycle"></em>&nbsp<b> ประเภทของรถ: </b> <div class="float-right"><?php echo $car_type_name; ?></div></label>
                                    </div>
                                </fieldset>
                                <?php
                            }
                        }
                        $sql1="SELECT * FROM tbl_wash WHERE deposit_id='$_GET[id]'";
                        $result1=mysqli_query($con,$sql1);
                        list($check_wash)=mysqli_fetch_row($result1);
                        if(!empty($check_wash)){

                            ?>
                            <fieldset>
                                <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-tint"></em>&nbsp<b> บริการล้างรถ: </b> <div class="float-right">ใช้บริการ</div></label>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-calendar"></em>&nbsp<b> วันรับรถ(กรณีล้างรถ): </b> <div class="float-right"><?php echo $deposit_pickup_date; ?></div></label>
                                </div>
                            </fieldset>
                        <?php }else{
                            ?>
                            <fieldset>
                                <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-tint"></em>&nbsp<b> บริการล้างรถ: </b> <div class="float-right">ไม่ใช้บริการ</div></label>
                                </div>
                            </fieldset>
                        <?php }
                        if($deposit_helmet<=0){
                            ?>
                            <fieldset>
                                <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-user-astronaut"></em>&nbsp<b> จำนวนหมวกกันน็อค: </b> <div class="float-right"> ไม่มีหมวกกันน็อค</div></label>
                                </div>
                            </fieldset>
                            <?php
                        }else{
                            ?>
                            <fieldset>
                                <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-user-astronaut"></em>&nbsp<b> จำนวนหมวกกันน็อค: </b> <div class="float-right"><?php echo $deposit_helmet; ?> ใบ</div></label>
                                </div>
                            </fieldset>
                            <?php
                        }
                        if(!empty($deposit_fuel)){
                            ?>
                            <fieldset>
                                <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-gas-pump"></em>&nbsp<b> น้ำมันคงเหลือ: </b> <div class="float-right"><?php echo $deposit_fuel; ?> %</div></label>
                                </div>
                            </fieldset>

                        <?php }else{
                            ?>
                            <fieldset>
                                <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-gas-pump"></em>&nbsp<b> น้ำมันคงเหลือ: </b> <div class="float-right">ไม่ได้ระบุ</div></label>
                                </div>
                            </fieldset>
                            <?php
                        }
                        if(!empty($deposit_number)){
                            ?>
                            <fieldset>
                                <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-phone"></em>&nbsp<b> เบอร์โทรติดต่อ: </b> <div class="float-right"><?php echo $deposit_number; ?></div></label>
                                </div>
                            </fieldset>
                            <?php
                        }else{
                            ?>
                            <fieldset>
                                <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-phone"></em>&nbsp<b> เบอร์โทรติดต่อ: </b> <div class="float-right">ไม่ได้ระบุ</div></label>
                                </div>
                            </fieldset>
                            <?php
                        }
                        if(!empty($deposit_pickup_name)){
                            ?>
                            <fieldset>
                                <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-user"></em>&nbsp<b> ผู้มารับแทน: </b> <div class="float-right"><?php echo $deposit_pickup_name; ?></div></label>
                                </div>
                            </fieldset>
                            <?php
                        }else{
                            ?>
                            <fieldset>
                                <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-user"></em>&nbsp<b> ผู้มารับแทน: </b> <div class="float-right">ไม่ได้ระบุ</div></label>
                                </div>
                            </fieldset>
                            <?php
                        }
                        if(!empty($deposit_detail)){
                            ?>
                            <fieldset>
                                <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-file-alt"></em>&nbsp<b> รายละเอียดเพิ่มเติม: </b> <div class="float-right"><?php echo $deposit_detail; ?></div></label>
                                </div>
                            </fieldset>
                            <?php
                        }else{
                            ?>
                            <fieldset>
                                <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-file-alt"></em>&nbsp<b> รายละเอียดเพิ่มเติม: </b> <div class="float-right">ไม่ได้ระบุ</div></label>
                                </div>
                            </fieldset>
                            <?php
                        }
                        ?>

                    </div>
                    <div>

                    </div>
                    <div class="clearfix">
                        <div class="float-left">
                            <button class="btn btn-danger" type="button" onclick=window.location.href="index.php?module=deposit&action=search_cancel"><em class="fa fa-caret-left fa-fw" ></em>กลับ</button>
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
