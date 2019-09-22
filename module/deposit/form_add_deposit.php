<?php
    if(isset($_GET['id'])){
        $deposit_plate_id=$_GET['deposit_plate_id'];
        $car_type_id_error=$_GET['car_type_id'];
        $deposit_type=$_GET['deposit_type'];
        $pic=$_GET['img_name'];
        if(isset($_GET['deposit_pickup_date'])){
            $checked="checked";
            $deposit_pickup_date=$_GET['deposit_pickup_date'];
        }else{
            $checked="";
        }
        $req="";
}else{
        $deposit_plate_id="";
        $car_type_id="";
        $deposit_type="";
        $deposit_pickup_date="";
        $checked="";
        $pic="";
        $req="required";
    }
?>
<section class="section-container">
    <!-- Page content-->
    <div class="content-wrapper">
        <p class="lead"><em class="fa fa-plus-circle"> </em> [ เพิ่มข้อมูลฝากรถ ] </p>
        <div class="card card-default">

            <div class="card-body">
                <form enctype="multipart/form-data" class="form-horizontal" method="post" action="<?php MALink('deposit','add_deposit') ?>">
                    <input type="hidden" name="old_pic" value="<?php echo $pic; ?>">
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-user-edit"></em>&nbsp<b> ผู้บันทึกข้อมูล</b></label>
                            <div class="col-md-10"><input class="form-control" name="user" type="text" value="<?php echo $_SESSION['user_username']; ?>" disabled></div>
                        </div>

                    </fieldset>
                    <fieldset>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label"><em class="fa fa-car"></em>&nbsp<b> ป้ายทะเบียนรถ</b></label>
                            <div class="col-md-10"><input class="form-control" name="deposit_plate_id" type="text" value="<?php echo $deposit_plate_id; ?>" placeholder="ตัวอย่าง: 'กอ 69 เชียงใหม่'" required></div>
                        </div>
                        <div class="float-right">
                        <?php
                        if(isset($_GET['id']) && $_GET['id']==2){
                            echo "<font color='red'>&nbsp X &nbsp ข้อมูลป้ายทะเบียนรถไม่ถูกต้อง &nbsp</font>";
                        }
                        ?>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-motorcycle"></em>&nbsp<b> ประเภทของรถ</b></label>
                            <div class="col-md-10"><select class="custom-select custom-select-sm" name="car_type_id" required>
                                    <option value="">เลือกประเภทของรถ..</option>
                                    <?php


                                    $con=connect_db();
                                    $sql1="SELECT car_type_id,car_type_name FROM tbl_car_type WHERE work_id='$_SESSION[work_id]'";
                                    $result1=mysqli_query($con,$sql1);
                                    while(list($car_type_id,$car_type_name)=mysqli_fetch_row($result1)){
                                        if($car_type_id_error==$car_type_id){
                                            echo "<option value=$car_type_id selected>$car_type_name</option>";
                                        }else{
                                            echo "<option value=$car_type_id>$car_type_name</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-money-bill"></em>&nbsp<b> ประเภทของการฝาก</b></label>
                            <div class="col-md-10"><select class="custom-select custom-select-sm" name="deposit_type" required>
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
                        <div class="float-right">
                            <?php
                            if(isset($_GET['id']) && $_GET['id']==99){
                                echo "<font color='red'>&nbsp X &nbsp ไม่มีข้อมูลประเภทของการฝากนี้ &nbsp</font>";
                            }
                            ?>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-file-image"></em>&nbsp<b> รูปภาพผู้ฝาก</b></label>
                            <div class="col-md-10"><input type="file" class="dropify form-control" data-default-file="img/deposit/<?php echo $pic; ?>" name="deposit_pic"  data-max-file-size="100M" data-allowed-file-extensions="jpg JPG jpeg JPEG  GIF gif png PNG" <?php echo $req; ?>></div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"> <em
                                            class="fa fa-tint"></em>&nbsp<b> บริการล้างรถ</b></label>
                                <div class="col-md-10">
                                    <div class="checkbox c-checkbox"><label><input type="checkbox" value="1"
                                                                                   name="deposit_wash" id="wash"
                                                                                   onclick="show_pickup_date()" <?php echo $checked; ?>><span
                                                    class="fa fa-check"></span></label></div>
                                </div>
                            </div>

                   <div id="pickup_date" style="display: none"><br>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-calendar"></em>&nbsp<b> วันรับรถ (กรณีล้างรถ)</b></label>
                            <div class="col-md-10"><input class="form-control" name="deposit_pickup_date" type="date" value="<?php echo $deposit_pickup_date; ?>"></div>
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
                <input class="slider slider-horizontal" data-ui-slider="" type="text" value="" data-slider-min="0" data-slider-max="100" data-slider-step="10" data-slider-value="0" data-slider-orientation="horizontal" name="deposit_fuel">
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
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"> <em class="fa fa-check"></em>&nbsp<b> ตรวจสอบข้อมูล</b></label>
                            <div class="col-md-10"><div class="checkbox c-checkbox"><label><input type="checkbox" value="1" name="deposit_check" required><span class="fa fa-check"></span></label> </div></div>
                        </div>
                    </fieldset>

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