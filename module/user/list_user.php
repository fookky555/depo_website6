<section class="section-container">
    <!-- Page content-->

    <div class="content-wrapper">
        <div class="row">
            <!-- Article Content-->
            <div class="col-xl-12">
                <div class="clearfix">
<?php if($_SESSION['user_role']=="ผู้ดูแล"){ ?>
                    <div class="float-right"><button class="btn btn-primary" type="button" onclick=window.location.href="<?php MALink('user','form_Add_user')?>"><em class="fas fa-plus fa-fw"></em>เพิ่มผู้ใช้งาน</button></div>
                <?php }?>
                </div>
                <BR>
                <p class="lead"><em class="fa fa-user-cog"></em> [ จัดการข้อมูลผู้ใช้งานของร้าน ] </p>
                <div class="card">

                    <div class="table-responsive">
                        <table class="table table-hover" id="data-table-list-user">
                            <thead>
                            <tr>
                                <th><strong><em class="fa fa-hashtag"></em></strong></th>
                                <th><strong><em class="fa fa-user"></em></strong></th>
                                <th><strong><em class="fa fa-id-card-alt"><font color="white">________</font></em></strong></th>
                                <th><strong><em class="fa fa-address-card"><font color="white">_________________</font></em></strong></th>
                                <th><strong><em class="fa fa-phone"></em></strong></th>
                           <th class="text-right" style="width:130px"><strong><em class="fa fa-wrench"><font color="white">_______</font></em></strong></th>
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
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-warning" type="button" onclick=window.location.href="index.php?module=user&action=edit_user_form&id=<?php echo $user_id; ?>"><em
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
        <p><em class="fa fa-hashtag"> </em> = รหัสข้อมูลพนักงาน</p>
        <p><em class="fa fa-user"></em> = ชื่อผู้ใช้งาน</p>
        <p><em class="fa fa-id-card-alt"> </em> = ประเภทบัญชีผู้ใช้</p>
        <p><em class="fa fa-address-card"> </em> = ชื่อ-นามสกุล</p>
        <p><em class="fa fa-phone"> </em> = เบอร์โทรติดต่อ</p>
        <?php if($_SESSION['user_role']=="ผู้ดูแล"){ ?>
        <p><em class="fa fa-wrench"></em> = จัดการข้อมูล</p>
        <?php } ?>
    </div>
</section><!-- Page footer-->