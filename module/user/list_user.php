<section class="section-container">
    <!-- Page content-->

    <div class="content-wrapper">
        <div class="row">
            <!-- Article Content-->
            <div class="col-xl-12">
                <div class="clearfix">
<?php if($_SESSION['user_role']=="ผู้ดูแล"){ ?>
                    <div class="float-right"><button class="btn btn-success" type="button" onclick=window.location.href="<?php MALink('user','form_Add_user')?>"><em class="fas fa-plus fa-fw"></em>เพิ่มผู้ใช้งาน</button></div>
                <?php }?>
                </div>
                <p class="lead">จัดการข้อมูลผู้ใช้งานของร้าน</p>
                <div class="card">

                    <div class="table-responsive">
                        <table class="table table-hover" id="data-table-list-user">
                            <thead>
                            <tr>
                                <th><strong>รหัสพนักงาน</strong></th>
                                <th><strong>ชื่อผู้ใช้</strong></th>
                                <th><strong>ตำแหน่ง</strong></th>
                                <th><strong>ชื่อ-นามสกุล</strong></th>
                                <th><strong>เบอร์โทร</strong></th>
                           <th class="text-right" style="width:130px"><strong>จัดการข้อมูล</strong></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $con=connect_db();

                            if($_SESSION['user_role']=="ผู้ดูแล") {
                                $sql1 = "SELECT * FROM tbl_user WHERE work_id='$_SESSION[work_id]' AND user_id!='$_SESSION[user_id]'";//ต้องเปลี่ยน WHERE
                            }else{
                                $sql1 = "SELECT * FROM tbl_user WHERE user_id='$_SESSION[user_id]'";
                            }
                            $result=mysqli_query($con,$sql1);

                            while ($row = mysqli_fetch_assoc($result)) {

                                extract($row);//ทำให้อยู่ในตัวแปรตามชื่อแอทริบิว
                                ?>
                                <tr>
                                    <td><?php echo $user_id;?></td>
                                    <td><?php echo $user_username;?></td>
                                    <td><?php echo $user_role;?></td>
                                    <td><?php echo $user_name;?></td>
                                    <td><?php echo $user_phone?></td>
                                    <td class="text-right">
                                        <button class="btn btn-sm btn-secondary" type="button" onclick=window.location.href="index.php?module=user&action=edit_user_form&id=<?php echo $user_id; ?>"><em
                                                        class="fas fa-pencil-alt"></em></button>
                                        <?php if($_SESSION['user_role']=="ผู้ดูแล"){ ?>
                                        <button class="btn btn-sm btn-danger delete_user" type="button" data-link="index.php?module=user&action=delete_user&id=<?php echo $user_id; ?>"><em
                                                class="fas fa-trash-alt"></em></button>
                                        <?php } ?>
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