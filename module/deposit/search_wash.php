<section class="section-container">
    <!-- Page content-->

    <div class="content-wrapper">
        <div class="row">
            <!-- Article Content-->
            <div class="col-xl-12">

                <p class="lead"> [ ข้อมูลการล้างรถของร้าน ] </p>
                <div class="card">

                    <div class="table-responsive">
                        <table class="table table-hover" id="data-table-search_wash">
                            <thead>
                            <tr>
                                <th><strong>รหัสฝากรถ</strong></th>
                                <th><strong>วันที่รับรถ</strong></th>
                                <th><strong>ประเภทของรถ</strong></th>
                                <th><strong>ผู้ล้างรถ</strong></th>
                                <th><strong>สถานะการล้างรถ</strong></th>
                                    <th class="text-right" style="width:130px"><strong>จัดการข้อมูล</strong></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $con=connect_db();

                            $sql1="SELECT * FROM tbl_wash WHERE work_id='$_SESSION[work_id]'";//ต้องเปลี่ยน WHERE

                            $result1=mysqli_query($con,$sql1);

                            while ($row = mysqli_fetch_assoc($result1)) {

                                extract($row);//ทำให้อยู่ในตัวแปรตามชื่อแอทริบิว
                                $sql="SELECT deposit_pickup_date,car_type_id FROM tbl_deposit WHERE deposit_id='$deposit_id'";//ต้องเปลี่ยน WHERE
                                $result=mysqli_query($con,$sql);
                                list($pickup_date,$car_type_id)=mysqli_fetch_row($result);

                                $sql2="SELECT car_type_name FROM tbl_car_type WHERE car_type_id='$car_type_id'";//ต้องเปลี่ยน WHERE
                                $result2=mysqli_query($con,$sql2);
                                list($car_name)=mysqli_fetch_row($result2);

                                $sql2="SELECT user_username FROM tbl_user WHERE user_id='$wash_user_id'";//ต้องเปลี่ยน WHERE
                                $result2=mysqli_query($con,$sql2);
                                list($username)=mysqli_fetch_row($result2);
                                ?>
                                <tr>
                                    <td><?php echo $deposit_id;?></td>
                                    <td><?php echo $pickup_date;?></td>
                                    <td><?php echo $car_name;?></td>
                                    <td><?php echo $username;?></td>

                                    <?php
                                        if($wash_status==0){
                                            echo "<td>ยังไม่ได้ล้าง</td>";
                                            ?>
                                    <td class="text-center">

                                        <button class="btn btn-sm btn-outline-info wash_deposit" type="button" data-link="index.php?module=deposit&action=update_wash_deposit&id=<?php echo $deposit_id; ?>&wash_status=<?php echo $wash_status; ?>"><em
                                                class="fas fa-tint"></em></button>
                                    <?php
                                        }else{
                                            echo "<td>ล้างรถแล้ว</td>";
                                            ?>
                                    <td class="text-center">

                                        <button class="btn btn-sm btn-info no_wash_deposit" type="button" data-link="index.php?module=deposit&action=update_wash_deposit&id=<?php echo $deposit_id; ?>&wash_status=<?php echo $wash_status; ?>"><em
                                                class="fas fa-tint"></em></button>
                                        <?php
                                        }
                                        if($_SESSION['user_role']=="ผู้ดูแล"){
                                        ?>



                                            <button class="btn btn-sm btn-danger delete_wash"  type="button" data-link="index.php?module=deposit&action=delete_wash&id=<?php echo $deposit_id; ?>"><em
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
        <div class="float-left"><button class="btn btn-danger" type="button" onclick=window.location.href="<?php MALink('deposit','list_deposit')?>"><em class="fas fa-arrow-left"></em> กลับ</button></div>

    </div>
</section><!-- Page footer-->