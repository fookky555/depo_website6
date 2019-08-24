<section class="section-container">
    <!-- Page content-->

    <div class="content-wrapper">
        <div class="row">
            <!-- Article Content-->
            <div class="col-xl-12">
                <div class="clearfix">
                    <div class="float-right"><button class="btn btn-success" type="button" onclick=window.location.href="<?php MALink('work_payment','form_add_work_payment')?>"><em class="fas fa-plus fa-fw"></em> ยืนยันการชำระเงิน</button></div>
                </div>
                <BR>
                <p class="lead"><em class="fa fa-money-check-alt"></em> [ ประวัติการชำระเงิน <?php echo $_SESSION['work_name']; ?> ] </p>
                <div class="card">

                    <div class="table-responsive">
                        <table class="table table-hover" id="data-table-show-work-payment">
                            <thead>
                            <tr>
                                <th><strong><em class="fa fa-hashtag"></em></strong></th>
                                <th bgcolor="#f8f8ff"><strong><em class="fa fa-calendar"><font color="white">_______</font></em></strong></th>
                                <th><strong><em class="fa fa-clock"></em></strong></th>
                                <th bgcolor="#f8f8ff"><strong><em class="fa fa-university"></em></strong></th>
                                <th><strong><em class="fa fa-image"></em></strong></th>
                                <th class="text-right" style="width:140px" bgcolor="#f8f8ff"><strong><em class="fa fa-check-square"><font color="white">___________</font></em></strong></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $con=connect_db();

                            $sql1="SELECT * FROM tbl_work_payment WHERE work_id='$_SESSION[work_id]'";//ต้องเปลี่ยน WHERE

                            $result=mysqli_query($con,$sql1);

                            while ($row = mysqli_fetch_assoc($result)) {

                                extract($row);//ทำให้อยู่ในตัวแปรตามชื่อแอทริบิว
                                if($payment_detail_id==0 && empty($work_payment_pic)){
                                    continue;
                                }
                                ?>
                                <tr>
                                    <td><?php echo $work_payment_id;?></td>
                                    <td bgcolor="#f8f8ff"><?php echo $work_payment_date;?></td>
                                    <td><?php echo $work_payment_time;?></td>
                                    <td bgcolor="#f8f8ff"><?php echo $payment_detail_id;?></td>
                                    <img  id="image_name" src="img/work_payment/<?php echo $work_payment_pic ;?>" style="display:none">
                                    <td><img src="img/work_payment/<?php echo $work_payment_pic; ?>" onclick="window.open(this.src)"  height="75" width="36"></td>
                                    <div id="myModal" class="modal">
                                        <span class="close">&time;</span>
                                        <img class="modal-content" id="">
                                        <div id="img/work_payment/<?php echo $work_payment_pic; ?>"></div>
                                    </div>

                                    <td class="text-right" bgcolor="#f8f8ff">
                                    <?php if($work_payment_confirm==0){
                                        echo "<font color='black'>รอดำเนินการ</font>";
                                    }else if($work_payment_confirm==1){
                                        echo "<font color='green'>ชำระเงินเรียบร้อย</font>";
                                    }else{
                                        echo "<font color='red'>ชำระเงินล้มเหลว</font>";
                                    }
                                    ?>
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
        <p><em class="fa fa-calendar"> </em> = วันที่ชำระเงิน</p>
        <p><em class="fa fa-clock"> </em> = เวลาที่ชำระเงิน</p>
        <p><em class="fa fa-university"> </em> = บัญชีธนาคาร</p>
        <p><em class="fa fa-image"> </em> = หลักฐานการชำระเงิน</p>
        <p><em class="fa fa-check-square"> </em> = การดำเนินการ</p>
    </div>
</section><!-- Page footer-->