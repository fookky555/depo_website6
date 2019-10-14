<section class="section-container">
    <!-- Page content-->

    <div class="content-wrapper">
        <div class="row">
            <!-- Article Content-->
            <div class="col-xl-12">
                <div class="clearfix">
                    <?php if($_SESSION['user_role']=="ผู้ดูแล"){ ?>
                    <div class="float-right"><button class="btn btn-primary" type="button" onclick=window.location.href="<?php MALink('car_type','form_Add_car_type')?>"><em class="fas fa-plus fa-fw"></em>เพิ่มประเภทรถ</button></div>
                    <?php } ?>
                </div>
                <BR>
                <p class="lead"><em class="fa fa-calculator"></em> [ อัตราค่าบริการตามประเภทของรถ <?php echo $_SESSION['work_name']; ?> ] </p>
                <div class="card">

                    <div class="table-responsive">
                        <table class="table table-hover" id="data-table-list-car-type">
                            <thead>
                            <tr bgcolor="cce6ff">
                                <th style="display:none;"></th>
                                <th><strong><em class="fa fa-car"><font color="cce6ff">________</font></em></strong></th>
                                <th><strong>Day</strong></th>
                                <th><strong>1Month</strong></th>
                                <th><strong>3Months</strong></th>
                                <th><strong>6Months</strong></th>
                                <th><strong>1Year</strong></th>
                                <th><strong><em class="fa fa-tint"></em></strong></th>
                                <?php if($_SESSION['user_role']=="ผู้ดูแล"){ ?>
                                <th class="text-right" style="width:130px"><strong><em class="fa fa-wrench"><font color="cce6ff">_______</font></em></strong></th>
                                <?php } ?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $con=connect_db();

                            $sql1="SELECT * FROM tbl_car_type WHERE work_id='$_SESSION[work_id]'";//ต้องเปลี่ยน WHERE

                            $result=mysqli_query($con,$sql1);
                            $numchk=0;
                            while ($row = mysqli_fetch_assoc($result)) {
                                $numchk++;
                                if($numchk%2){
                                    $tbl_cl="";
                                }else{
                                    $tbl_cl="f0f7ff";
                                }
                                extract($row);//ทำให้อยู่ในตัวแปรตามชื่อแอทริบิว
                                echo"<tr bgcolor=\"$tbl_cl\">";
                                ?>
                                <td style="display:none;"><?php echo $numchk; ?></td>
                                    <td><?php echo $car_type_name;?></td>
                                    <td><?php echo $car_type_deposit_price;?></td>
                                    <td><?php echo $car_type_1month_deposit_price;?></td>
                                    <td><?php echo $car_type_3month_deposit_price;?></td>
                                    <td><?php echo $car_type_6month_deposit_price?></td>
                                    <td><?php echo $car_type_1year_deposit_price?></td>
                                    <td><?php echo $car_type_wash_price?></td>
                                    <?php if($_SESSION['user_role']=="ผู้ดูแล"){ ?>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-warning" type="button" onclick=window.location.href="index.php?module=car_type&action=form_edit_car_type&id=<?php echo $car_type_id; ?>"><em
                                                class="fas fa-pencil-alt"></em></button>
                                        <button class="btn btn-sm btn-danger delete_car_type"  type="button" data-link="index.php?module=car_type&action=delete_car_type&id=<?php echo $car_type_id; ?>"><em
                                                class="fas fa-trash-alt"></em></button>
                                    </td>
                                    <?php } ?>
                                </tr>

                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- Article sidebar-->

        </div>
       <p><em class="fa fa-car"></em>  = ชื่อประเภทรถ</p>
        <p><b>Day</b> = ราคาฝากรายวัน</p>
      <p><b>1 Month</b> = ราคาฝาก 1 เดือน</p>
        <p><b>3 Months</b> = ราคาฝาก 3 เดือน</p>
        <p><b>6 Months</b> = ราคาฝาก 6 เดือน</p>
       <p><b>1 Year</b> = ราคาฝาก 1 ปี</p>
        <p><em class="fa fa-tint"></em> = ราคาบริการล้างรถ</p>
        <?php if($_SESSION['user_role']=="ผู้ดูแล"){ ?>
        <p><em class="fa fa-wrench"></em> = จัดการข้อมูล</p>
        <?php } ?>
    </div>
</section><!-- Page footer-->