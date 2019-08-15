<section class="section-container">
    <!-- Page content-->

    <div class="content-wrapper">
        <div class="row">
            <!-- Article Content-->
            <div class="col-xl-12">
                <div class="clearfix">
                </div>
                <p class="lead"><em class="fa fa-money-check-alt"> </em> [ ตรวจสอบการชำระเงิน ] </p>
                <div class="card">

                    <div class="table-responsive">
                        <table class="table table-hover" id="data-table-list-work-payment">
                            <thead>
                            <tr>
                                <th><strong><em class="fa fa-hashtag"> </em></strong></th>
                                <th bgcolor="#f8f8ff"><strong><em class="fa fa-store-alt"> </em></strong></th>
                                <th><strong><em class="fa fa-calendar"><FONT COLOR="WHITE">_______</FONT> </em></strong></th>
                                <th bgcolor="#f8f8ff"><strong><em class="fa fa-clock"> </em></strong></th>
                                <th><strong><em class="fa fa-university"> </em></strong></th>
                                <th bgcolor="#f8f8ff"><strong><em class="fa fa-image"> </em></strong></th>
                                <th class="text-right" style="width:140px"><strong><em class="fa fa-check-square"><FONT COLOR="WHITE">______</FONT> </em></strong></th>
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
                                    <td bgcolor="#f8f8ff"><?php echo $work_id;?></td>
                                    <td><?php echo $work_payment_date;?></td>
                                    <td bgcolor="#f8f8ff"><?php echo $work_payment_time;?></td>
                                    <td><?php echo $payment_detail_id;?></td>

                                    <img  id="image_name" src="img/work_payment/<?php echo $work_payment_pic ;?>" style="display:none">
                                    <td bgcolor="#f8f8ff"><img src="img/work_payment/<?php echo $work_payment_pic; ?>" onclick="window.open(this.src)"  height="75" width="36"></td>
                                    <div id="myModal" class="modal">
                                        <span class="close">&time;</span>
                                        <img class="modal-content" id="">
                                        <div id="img/work_payment/<?php echo $work_payment_pic; ?>"></div>
                                    </div>

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
        <p><em class="fa fa-hashtag"> </em> = รหัสการชำระเงิน</p>
        <p><em class="fa fa-store-alt"> </em> = รหัสร้านฝาก</p>
       <p><em class="fa fa-calendar"> </em> = วันที่ชำระเงิน</p>
       <p><em class="fa fa-clock"> </em> = เวลาที่ชำระเงิน</p>
        <p><em class="fa fa-university"> </em> = บัญชีธนาคาร</p>
        <p><em class="fa fa-image"> </em> = หลักฐานการชำระเงิน</p>
       <p><em class="fa fa-check-square"> </em> = การดำเนินการ</p>
    </div>
</section><!-- Page footer-->