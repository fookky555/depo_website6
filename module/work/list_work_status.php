<section class="section-container">
    <!-- Page content-->

    <div class="content-wrapper">
        <div class="row">
            <!-- Article Content-->
            <div class="col-xl-12">
                <div class="clearfix">
                </div>
                <p class="lead"><em class="fa fa-money-bill"> </em> [ ตรวจสอบสถานะการชำระเงิน ] </p>
                <div class="card">

                    <div class="table-responsive">
                        <table class="table table-hover" id="data-table-list-work-status">
                            <thead>
                            <tr>
                                <th><strong><em class="fa fa-store-alt"> </em></strong></th>
                                <th><strong><em class="fa fa-sign"><font color="white">__________</font> </em></strong></th>
                                <th><strong><em class="fa fa-user"><font color="white">________________</font></em></strong></th>
                                <th><strong><em class="fa fa-phone"> </em></strong></th>
                                <th><strong><em class="fa fa-check-square"><font color="white">________</font> </em></strong></th>
                                <th class="text-right" style="width:140px"><strong><em class="fa fa-wrench"><font color="white">_______</font></em></strong></th>
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

                                    <td><?php
                                            if($work_status==0){
                                                echo "ไม่ได้ชำระเงิน</td>";
                                                ?>
                                    <td class="text-right">
                                        <button class="btn btn-sm btn-outline-green edit_work_status" id="edit_work_status" onclick="EditWorkStatus(this)"  data-id="<?php echo $work_id;?>" type="button" data-link="index.php?module=work&action=edit_work_status&work_id=<?php echo $work_id; ?>&work_status=<?php echo $work_status; ?>"><em
                                                    class="fas fa-check"></em></button>

                                        <?php
                                            }else{
                                                echo "ชำระเงินแล้ว</td>";
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
        <p><em class="fa fa-store-alt"> </em> = รหัสร้าน</p>
        <p><em class="fa fa-sign"> </em> = ชื่อร้าน</p>
        <p><em class="fa fa-user"></em> = ชื่อผู้ติดต่อ</p>
        <p><em class="fa fa-phone"> </em> = เบอร์ติดต่อ</p>
        <p><em class="fa fa-check-square"></em> = สถานะการชำระเงิน</p>
        <p><em class="fa fa-wrench"></em> = จัดการข้อมูล</p>

    </div>
</section><!-- Page footer-->