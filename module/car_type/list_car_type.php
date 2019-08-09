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
                <p class="lead"><em class="fa fa-calculator"></em> [ อัตราค่าบริการตามประเภทของรถ ] </p>
                <div class="card">

                    <div class="table-responsive">
                        <table class="table table-hover" id="data-table-list-car-type">
                            <thead>
                            <tr>
                                <th><strong><em class="fa fa-car"><font color="white">________</font></em></strong></th>
                                <th><strong>Day</strong></th>
                                <th><strong>1Month</strong></th>
                                <th><strong>3Months</strong></th>
                                <th><strong>6Months</strong></th>
                                <th><strong>1Year</strong></th>
                                <th><strong><em class="fa fa-tint"></em></strong></th>
                                <?php if($_SESSION['user_role']=="ผู้ดูแล"){ ?>
                                <th class="text-right" style="width:130px"><strong><em class="fa fa-wrench"><font color="white">_______</font></em></strong></th>
                                <?php } ?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $con=connect_db();

                            $sql1="SELECT * FROM tbl_car_type WHERE work_id='$_SESSION[work_id]'";//ต้องเปลี่ยน WHERE

                            $result=mysqli_query($con,$sql1);

                            while ($row = mysqli_fetch_assoc($result)) {

                                extract($row);//ทำให้อยู่ในตัวแปรตามชื่อแอทริบิว
                                ?>
                                <tr>
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
       <p>Day = ราคาฝากรายวัน</p>
      <p>1Month = ราคาฝาก 1 เดือน</p>
        <p>3Months = ราคาฝาก 3 เดือน</p>
        <p>6Months = ราคาฝาก 6 เดือน</p>
       <p>1Year = ราคาฝาก 1 ปี</p>
        <p><em class="fa fa-tint"></em> = ราคาบริการล้างรถ</p>
        <?php if($_SESSION['user_role']=="ผู้ดูแล"){ ?>
        <p><em class="fa fa-wrench"></em> = จัดการข้อมูล</p>
        <?php } ?>
    </div>
</section><!-- Page footer-->