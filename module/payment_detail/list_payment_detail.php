<section class="section-container">
    <!-- Page content-->

    <div class="content-wrapper">
        <div class="row">
            <!-- Article Content-->
            <div class="col-xl-12">
                <div class="clearfix">
                        <div class="float-right"><button class="btn btn-success" type="button" onclick=window.location.href="<?php MALink('payment_detail','form_add_payment_detail')?>"><em class="fas fa-plus fa-fw"></em>เพิ่มบัญชีธนาคาร</button></div>
                </div>
                <br><p class="lead"><em class="fa fa-university"> </em> [ จัดการข้อมูลบัญชีธนาคาร ] </p>
                <div class="card">

                    <div class="table-responsive">
                        <table class="table table-hover" id="data-table-list-payment-detail">
                            <thead>
                            <tr>
                                <th><strong><em class="fa fa-hashtag"> </em></strong></th>
                                <th><strong><em class="fa fa-address-card"><font color="white">_________________</font> </em></strong></th>
                                <th><strong><em class="fa fa-money-check"><font color="white">__________</font> </em></strong></th>
                                <th><strong><em class="fa fa-university"><font color="white">_____________</font> </em></strong></th>
                                <th class="text-right" style="width:130px"><strong><em class="fa fa-wrench"><font color="white">_______</font></em></strong></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $con=connect_db();

                                $sql1 = "SELECT * FROM tbl_payment_detail";

                            $result=mysqli_query($con,$sql1);

                            while ($row = mysqli_fetch_assoc($result)) {

                                extract($row);//ทำให้อยู่ในตัวแปรตามชื่อแอทริบิว
                                ?>
                                <tr>
                                    <td><?php echo $payment_detail_id;?></td>
                                    <td><?php echo $payment_detail_name;?></td>
                                    <td><?php echo $payment_detail_num;?></td>
                                    <td><?php echo $payment_detail_bank;?></td>
                                    <td class="text-right">
                                        <button class="btn btn-sm btn-secondary" type="button" onclick=window.location.href="index.php?module=payment_detail&action=form_edit_payment_detail&id=<?php echo $payment_detail_id; ?>"><em
                                                class="fas fa-pencil-alt"></em></button>
                                            <button class="btn btn-sm btn-danger delete_payment_detail" type="button" data-link="index.php?module=payment_detail&action=delete_payment_detail&id=<?php echo $payment_detail_id; ?>"><em
                                                    class="fas fa-trash-alt"></em></button>
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
        <p><em class="fa fa-hashtag"> </em> = รหัสบัญชี</p>
        <p><em class="fa fa-address-card"> </em> = ชื่อเจ้าของบัญชี</p>
        <p><em class="fa fa-money-check"> </em> = เลขที่บัญชี</p>
        <p><em class="fa fa-university"> </em> = ชื่อธนาคาร</p>
        <p><em class="fa fa-wrench"></em> = จัดการข้อมูล</p>

    </div>
</section><!-- Page footer-->