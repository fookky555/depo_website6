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
                            <tr bgcolor="cce6ff">
                                <th style="display:none;"></th>
                                <th><strong><em class="fa fa-hashtag"></em></strong></th>
                                <th><strong><em class="fa fa-calendar"><font color="cce6ff">________</font></em></strong></th>
                                <th><strong><em class="fa fa-motorcycle"><font color="cce6ff">______</font></em></strong></th>
                                <th><strong><em class="fa fa-user-check"></em></strong></th>
                                <th><strong><em class="fa fa-check-square"><font color="cce6ff">____</font></em></strong></th>
                                <th class="text-right" style="width:130px"><strong><em class="fa fa-wrench"><font color="cce6ff">_______</font></em></strong></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $con=connect_db();

                            $sql1="SELECT * FROM tbl_wash WHERE work_id='$_SESSION[work_id]'";//ต้องเปลี่ยน WHERE

                            $result1=mysqli_query($con,$sql1);
                            $numchk=1;
                            while ($row = mysqli_fetch_assoc($result1)) {
                                if($numchk%2){
                                    $tbl_cl="";
                                }else{
                                    $tbl_cl="f0f7ff";
                                }
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
                                echo "<tr>";
                                ?><td style="display:none;"><?php echo $numchk; ?></td><?php
                                echo "<td onclick=\"href1(this.id)\" class='tclick' id='$deposit_id' bgcolor=\"$tbl_cl\">$deposit_id</td>";
                                echo "<td onclick=\"href1(this.id)\" class='tclick' id='$deposit_id' bgcolor=\"$tbl_cl\">$pickup_date</td>";
                                echo "<td onclick=\"href1(this.id)\" class='tclick' id='$deposit_id' bgcolor=\"$tbl_cl\">$car_name</td>";
                                echo "<td onclick=\"href1(this.id)\" class='tclick' id='$deposit_id' bgcolor=\"$tbl_cl\">$username</td>";

                                ?>
                                    <?php
                                        if($wash_status==0){
                                            echo "<td onclick=\"href1(this . id)\" class='tclick' id='$deposit_id' bgcolor=\"$tbl_cl\">ไม่ได้ล้าง</td>";
                                            ?>
                                    <td class="text-center" bgcolor="<?php echo $tbl_cl; ?>">

                                        <button class="btn btn-sm btn-outline-info wash_deposit" type="button" data-link="index.php?module=deposit&action=update_wash_deposit&id=<?php echo $deposit_id; ?>&wash_status=<?php echo $wash_status; ?>"><em
                                                class="fas fa-tint"></em></button>
                                    <?php
                                        }else{
                                            echo "<td onclick=\"href1(this . id)\" class='tclick' id='$deposit_id' bgcolor=\"$tbl_cl\">ล้างแล้ว</td>";
                                            ?>
                                    <td class="text-center" bgcolor="<?php echo $tbl_cl; ?>">

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
                                $numchk++;
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
<script>
    //var id =$("#link").data("id");

    $(".tclick").click(function (e) {
        window.location.href='index.php?module=deposit&action=show_deposit&from=wash&id='+e.data("id");
    });

    // console.log(id);
    function href1(id) {
        window.location.href='index.php?module=deposit&action=show_deposit&from=wash&id='+id;
    }

</script>