<section class="section-container">
    <!-- Page content-->

    <div class="content-wrapper">
        <div class="row">
            <!-- Article Content-->
            <div class="col-xl-12">
                <div class="clearfix">
                </div>
                <p class="lead"> [ ตรวจสอบสถานะการชำระเงิน ] </p>
                <div class="card">

                    <div class="table-responsive">
                        <table class="table table-hover" id="data-table-list-work-status">
                            <thead>
                            <tr>
                                <th><strong>รหัสร้าน</strong></th>
                                <th><strong>ชื่อร้าน</strong></th>
                                <th><strong>ชื่อผู้ติดต่อ</strong></th>
                                <th><strong>เบอร์โทร</strong></th>
                                <th><strong>ชำระเงินล่าสุด</strong></th>
                                <th><strong>สถานะชำระเงิน</strong></th>
                                <th class="text-right" style="width:140px"><strong>จัดการข้อมูล</strong></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $con=connect_db();

                            $sql1="SELECT * FROM tbl_work";

                            $result=mysqli_query($con,$sql1);

                            while ($row = mysqli_fetch_assoc($result)) {


                                extract($row);//ทำให้อยู่ในตัวแปรตามชื่อแอทริบิว
                                $sql="SELECT work_payment_date FROM tbl_work_payment WHERE work_payment_confirm='1' AND work_id='$work_id' ORDER BY work_payment_date DESC LIMIT 1";
                                $result1=mysqli_query($con,$sql);
                                list($work_payment_date)=mysqli_fetch_row($result1);
                                ?>
                                <tr>
                                    <td><?php echo $work_id;?></td>
                                    <td><?php echo $work_name;?></td>
                                    <td><?php echo $work_contact_name;?></td>
                                    <td><?php echo $work_contact_phone;?></td>

                                    <td><?php echo change_date($work_payment_date);?></td>

                                    <td><?php
                                            if($work_status==0){
                                                echo "ไม่ได้ชำระเงิน</td>";
                                                ?>
                                    <td class="text-right">
                                        <button class="btn btn-sm btn-outline-green edit_work_status" id="edit_work_status" onclick="EditWorkStatus(this)"  data-id="<?php echo $work_id;?>" type="button" data-link="index.php?module=work&action=edit_work_status&work_id=<?php echo $work_id; ?>&work_status=<?php echo $work_status; ?>"><em
                                                    class="fas fa-check"></em></button>

                                        <?php
                                            }else{
                                                echo "ชำระเงินเรียบร้อย</td>";
                                                ?>
                                    <td class="text-right">
                                        <button class="btn btn-sm btn-outline-danger edit_work_status" type="button" data-link="index.php?module=work&action=edit_work_status&work_id=<?php echo $work_id; ?>&work_status=<?php echo $work_status; ?>"><em
                                                    class="fas fa-times"></em></button>
                                            <?php
                                            }
                                        ?>
                                        <button class="btn btn-sm btn-danger delete_work" type="button" data-link="index.php?module=work&action=delete_work&work_id=<?php echo $work_id; ?>"><em
                                                    class="fas fa-trash"></em></button>
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