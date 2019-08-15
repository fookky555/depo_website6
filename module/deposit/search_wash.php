<section class="section-container">
    <!-- Page content-->

    <div class="content-wrapper">
        <div class="row">
            <!-- Article Content-->
            <div class="col-xl-12">

                <p class="lead"><em class="fa fa-tint"></em> [ ข้อมูลการล้างรถของร้าน ] </p>
                <div class="card">

                    <div class="table-responsive">
                        <table class="table table-hover" id="data-table-search_wash">
                            <thead>
                            <tr>
                                <th bgcolor="#f8f8ff"><strong><em class="fa fa-hashtag"></em></strong></th>
                                <th><strong><em class="fa fa-calendar"><font color="white">________</font></em></strong></th>
                                <th bgcolor="#f8f8ff"><strong><em class="fa fa-motorcycle"><font color="white">______</font></em></strong></th>
                                <th><strong><em class="fa fa-user-check"></em></strong></th>
                                <th bgcolor="#f8f8ff"><strong><em class="fa fa-check-square"><font color="white">____</font></em></strong></th>
                                    <th class="text-right" style="width:130px"><strong><em class="fa fa-wrench"><font color="white">_______</font></em></strong></th>
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
                                    <td bgcolor="#f8f8ff"><?php echo $deposit_id;?></td>
                                    <td><?php echo $pickup_date;?></td>
                                    <td bgcolor="#f8f8ff"><?php echo $car_name;?></td>
                                    <td><?php echo $username;?></td>

                                    <?php
                                        if($wash_status==0){
                                            echo "<td bgcolor=\"#f8f8ff\">ไม่ได้ล้าง</td>";
                                            ?>
                                    <td class="text-center">

                                        <button class="btn btn-sm btn-outline-info wash_deposit" type="button" data-link="index.php?module=deposit&action=update_wash_deposit&id=<?php echo $deposit_id; ?>&wash_status=<?php echo $wash_status; ?>"><em
                                                class="fas fa-tint"></em></button>
                                    <?php
                                        }else{
                                            echo "<td bgcolor=\"#f8f8ff\">ล้างแล้ว</td>";
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
        <div class="float-right">
            <p align="right">รหัสฝากรถ = <em class="fa fa-hashtag"> </em></p>
            <p align="right">วันที่จะมารับรถ = <em class="fa fa-calendar"> </em></p>
            <p align="right">สถานะการล้างรถ = <em class="fa fa-check-square"> </em></p>
            <p align="right">ประเภทของรถ = <em class="fa fa-motorcycle"> </em></p>
            <p align="right">ผู้ทำการล้างรถ = <em class="fa fa-user-check"> </em></p></th>
            <p align="right">จัดการข้อมูล = <em class="fa fa-wrench"> </em></p>
        </div>
        <div class="float-left"><button class="btn btn-danger" type="button" onclick=window.location.href="<?php MALink('deposit','list_deposit')?>"><em class="fas fa-arrow-left"></em> กลับ</button></div>

    </div>
</section><!-- Page footer-->