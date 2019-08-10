<section class="section-container">
    <!-- Page content-->
    <?php
    $con=connect_db();

    if(!empty($_POST['car_type_id']) && !empty($_POST['deposit_type'])){
        $sql1="SELECT * FROM tbl_bill WHERE work_id='$_SESSION[work_id]' AND car_type_id='$_POST[car_type_id]' AND deposit_type='$_POST[deposit_type]'";//ต้องเปลี่ยน WHERE
    }elseif(!empty($_POST['car_type_id']) && empty($_POST['deposit_type'])){
        $sql1="SELECT * FROM tbl_bill WHERE work_id='$_SESSION[work_id]' AND car_type_id='$_POST[car_type_id]'";//ต้องเปลี่ยน WHERE
    }elseif(empty($_POST['car_type_id']) && !empty($_POST['deposit_type'])){
        $sql1="SELECT * FROM tbl_bill WHERE work_id='$_SESSION[work_id]' AND deposit_type='$_POST[deposit_type]'";//ต้องเปลี่ยน WHERE
    }else{
        $sql1="SELECT * FROM tbl_bill WHERE work_id='$_SESSION[work_id]'";//ต้องเปลี่ยน WHERE
    }

    $result=mysqli_query($con,$sql1);

    list($bill_id,$bill_date,$bill_deposit,$bill_wash,$bill_mulct,$bill_total,$user_id,$work_id,$car_type_id,$deposit_type,$deposit_date)=mysqli_fetch_row($result);

    ?>
    <div class="content-wrapper">
        <p class="lead"><em class="fa fa-chart-bar"> </em> [ สรุปสถิติจำนวนรถที่ฝากของร้าน ] </p>
        <div class="card card-default">

            <div class="card-body">
                <form enctype="multipart/form-data" class="form-horizontal" method="post" action="<?php MALink('volume_chart','list_volume_chart') ?>">

                <fieldset>
                    <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-motorcycle"></em>&nbsp<b> ประเภทของรถ</b></label>
                        <div class="col-md-10"><select class="custom-select custom-select-sm" name="car_type_id">
                                <option value="">ทั้งหมด</option>
                                <?php
                                $sql1="SELECT car_type_id,car_type_name FROM tbl_car_type WHERE work_id='$_SESSION[work_id]'";
                                $result1=mysqli_query($con,$sql1);
                                if(!empty($_POST['car_type_id'])) {
                                    while (list($car_id, $car_type_name) = mysqli_fetch_row($result1)) {
                                        if ($car_id == $_POST['car_type_id']) {
                                            echo "<option value=$car_id selected>$car_type_name</option>";
                                        } else {
                                            echo "<option value=$car_id>$car_type_name</option>";
                                        }
                                    }
                                }else{
                                    while (list($car_id, $car_type_name) = mysqli_fetch_row($result1)) {
                                            echo "<option value=$car_id>$car_type_name</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-money-bill"></em>&nbsp<b> ประเภทการฝาก</b></label>
                        <div class="col-md-10"><select class="custom-select custom-select-sm" name="deposit_type">
                                <?php
                                if(!empty($_POST['deposit_type'])) {
                                for($i=1;$i<=5;$i++){
                                    if($i==$_POST['deposit_type']){
                                        $check[$i]="selected";
                                    }
                                }
                                ?>
                                <option value="">ทั้งหมด</option>
                                <option value="1" <?php if(isset($check[1])) echo $check[1]; ?>>ฝากรายวัน</option>
                                <option value="2" <?php if(isset($check[2])) echo $check[2]; ?>>ฝาก 1 เดือน</option>
                                <option value="3" <?php if(isset($check[3])) echo $check[3]; ?>>ฝาก 3 เดือน</option>
                                <option value="4" <?php if(isset($check[4])) echo $check[4]; ?>>ฝาก 6 เดือน</option>
                                <option value="5" <?php if(isset($check[5])) echo $check[5]; ?>>ฝาก 1 ปี</option>
                                <?php }else{
                                    ?>
                                    <option value="">ทั้งหมด</option>
                                    <option value="1">ฝากรายวัน</option>
                                    <option value="2">ฝาก 1 เดือน</option>
                                    <option value="3">ฝาก 3 เดือน</option>
                                    <option value="4">ฝาก 6 เดือน</option>
                                    <option value="5">ฝาก 1 ปี</option>
                                <?php
                                } ?>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="col-md-0">

                        <button class="btn btn-block btn-primary mt-0" type="submit">
                            <em class="fa fa-calculator fa-fw"></em> ประมวลผล</button>
                    </div>
                </fieldset>
                    <fieldset>


                        

                    </fieldset>
                </form>


            </div>
        </div>
    </div>
</section>