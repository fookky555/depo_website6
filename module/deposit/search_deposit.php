<section class="section-container">
    <!-- Page content-->

    <div class="content-wrapper">
        <div class="row">
            <!-- Article Content-->
            <div class="col-xl-12">
                <div class="clearfix">
                        <div class="float-right"><button class="btn btn-info" type="button" onclick=window.location.href="<?php MALink('deposit','search_qrcode')?>"><em class="fas fa-qrcode"></em> ค้นหา QR code</button></div>
                </div>
                <p class="lead">ค้นหาข้อมูลฝากรถของร้าน</p>
                <div class="card">

                    <div class="table-responsive">
                        <table class="table table-hover" id="data-table-search_deposit">
                            <thead>
                            <tr>
                                <th><strong>รหัสฝากรถ</strong></th>
                                <th><strong>ป้ายทะเบียนรถ</strong></th>
                                <th><strong>วันที่ฝาก</strong></th>
                                <th><strong>ประเภทของรถ</strong></th>
                                <th><strong>รูปภาพ</strong></th>
                                <?php if($_SESSION['user_role']=="ผู้ดูแล"){ ?>
                                    <th class="text-right" style="width:130px"><strong>จัดการข้อมูล</strong></th>
                                <?php } ?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $con=connect_db();

                            $sql1="SELECT * FROM tbl_deposit WHERE work_id='$_SESSION[work_id]'";//ต้องเปลี่ยน WHERE

                            $result=mysqli_query($con,$sql1);

                            while ($row = mysqli_fetch_assoc($result)) {

                                extract($row);//ทำให้อยู่ในตัวแปรตามชื่อแอทริบิว
                                ?>
                                <tr>
                                    <td><?php echo $deposit_id;?></td>
                                    <td><?php echo $deposit_plate_id;?></td>
                                    <td><?php echo $deposit_date;?></td>
                                    <td><?php echo $car_type_id;?></td>
                                    <td><?php echo "รูป" ?></td>
                                    <?php if($_SESSION['user_role']=="ผู้ดูแล"){ ?>
                                        <td class="text-right">
                                            <button class="btn btn-sm btn-secondary" type="button" onclick=window.location.href="index.php?module=deposit&action=form_edit_deposit&id=<?php echo $deposit_id; ?>"><em
                                                    class="fas fa-pencil-alt"></em></button>
                                            <button class="btn btn-sm btn-danger delete_deposit"  type="button" data-link="index.php?module=deposit&action=&id=delete_deposit<?php echo $deposit_id; ?>"><em
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
        <div class="float-left"><button class="btn btn-danger" type="button" onclick=window.location.href="<?php MALink('deposit','list_deposit')?>"><em class="fas fa-arrow-left"></em> กลับ</button></div>

    </div>
</section><!-- Page footer-->