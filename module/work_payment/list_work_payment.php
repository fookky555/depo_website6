<section class="section-container">
    <!-- Page content-->

    <div class="content-wrapper">
        <div class="row">
            <!-- Article Content-->
            <div class="col-xl-12">
                <div class="clearfix">
                </div>
                <p class="lead">ตรวจสอบการชำระเงิน</p>
                <div class="card">

                    <div class="table-responsive">
                        <table class="table table-hover" id="data-table-list-work-payment">
                            <thead>
                            <tr>
                                <th><strong>รหัสการชำระเงิน</strong></th>
                                <th><strong>รหัสร้านฝาก</strong></th>
                                <th><strong>วันที่ชำระเงิน</strong></th>
                                <th><strong>เวลาที่ชำระเงิน</strong></th>
                                <th><strong>บัญชีธนาคาร</strong></th>
                                <th><strong>หลักฐานชำระเงิน</strong></th>
                                <th class="text-right" style="width:140px"><strong>ยืนยันการชำระเงิน</strong></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $con=connect_db();

                            $sql1="SELECT * FROM tbl_work_payment WHERE work_payment_confirm=0";//ต้องเปลี่ยน WHERE

                            $result=mysqli_query($con,$sql1);

                            while ($row = mysqli_fetch_assoc($result)) {

                                extract($row);//ทำให้อยู่ในตัวแปรตามชื่อแอทริบิว
                                ?>
                                <tr>
                                    <td><?php echo $work_payment_id;?></td>
                                    <td><?php echo $work_id;?></td>
                                    <td><?php echo $work_payment_date;?></td>
                                    <td><?php echo $work_payment_time;?></td>
                                    <td><?php echo $payment_detail_id;?></td>
                                    <td>"รูป"</td>
                                        <td class="text-right">
                                            <button class="btn btn-sm btn-green confirm_work_payment" type="button" data-link="index.php?module=work_payment&action=confirm_work_payment&id=<?php echo $work_payment_id; ?>&work_id=<?php echo $work_id; ?>"><em
                                                    class="fas fa-check"></em></button>
                                            <button class="btn btn-sm btn-danger no_confirm_work_payment" type="button" data-link="index.php?module=work_payment&action=no_confirm_work_payment&id=<?php echo $work_payment_id; ?>"><em
                                                    class="fas fa-times"></em></button>
                                        </td>

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
    </div>
</section><!-- Page footer-->