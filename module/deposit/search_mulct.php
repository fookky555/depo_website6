<section class="section-container">
    <!-- Page content-->

    <div class="content-wrapper">
        <div class="row">
            <!-- Article Content-->
            <div class="col-xl-12">
                <div class="clearfix">
                    <div class="float-right"><button class="btn btn-info" type="button" onclick=window.location.href="index.php?module=deposit&action=search_from_deposit&from=mulct"><em class="fas fa-plus"></em>  เพิ่มค่าปรับ</button></div>
                </div>
                <p class="lead"> [ ข้อมูลค่าปรับของร้าน ] </p>
                <div class="card">

                    <div class="table-responsive">
                        <table class="table table-hover" id="data-table-search_mulct">
                            <thead>
                            <tr>
                                <th><strong>รหัสฝากรถ</strong></th>
                                <th><strong>สาเหตุ</strong></th>
                                <th><strong>จำนวนเงิน</strong></th>
                                <th><strong>วันบันทึกข้อมูล</strong></th>
                                <th><strong>ผู้บันทึกข้อมูล</strong></th>
                                <th><strong>รายละเอียดเพิ่มเติม</strong></th>
                                <th class="text-right" style="width:130px"><strong>จัดการข้อมูล</strong></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $con=connect_db();

                            $sql1="SELECT * FROM tbl_mulct WHERE work_id='$_SESSION[work_id]'";//ต้องเปลี่ยน WHERE

                            $result1=mysqli_query($con,$sql1);

                            while ($row = mysqli_fetch_assoc($result1)) {

                                extract($row);//ทำให้อยู่ในตัวแปรตามชื่อแอทริบิว

                                $sql2="SELECT user_username FROM tbl_user WHERE user_id='$user_id'";//ต้องเปลี่ยน WHERE
                                $result2=mysqli_query($con,$sql2);
                                list($username)=mysqli_fetch_row($result2);
                                ?>
                                <tr>
                                    <td><?php echo $deposit_id;?></td>
                                    <td><?php echo $mulct_list;?></td>
                                    <td><?php echo $mulct_price;?></td>
                                    <td><?php echo $mulct_date;?></td>
                                    <td><?php echo $username;?></td>
                                    <td><?php echo $mulct_note;?></td>


                                    <td class="text-center">

                                        <button class="btn btn-sm btn-warning" type="button" onclick=window.location.href="index.php?module=deposit&action=form_edit_mulct&id=<?php echo $mulct_id; ?>"><em
                                                class="fas fa-pen"></em></button>



                                        <button class="btn btn-sm btn-danger delete_mulct"  type="button" data-link="index.php?module=deposit&action=delete_mulct&id=<?php echo $mulct_id; ?>"><em
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
        <div class="float-left"><button class="btn btn-danger" type="button" onclick=window.location.href="<?php MALink('deposit','list_deposit')?>"><em class="fas fa-arrow-left"></em> กลับ</button></div>

    </div>
</section><!-- Page footer-->