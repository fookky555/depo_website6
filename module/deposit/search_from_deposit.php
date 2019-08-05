<section class="section-container">
    <!-- Page content-->

    <div class="content-wrapper">
        <div class="row">
            <!-- Article Content-->
            <div class="col-xl-12">

                <p class="lead"> [ เลือกข้อมูลการฝากรถ ] </p>
                <div class="card">

                    <div class="table-responsive">
                        <table class="table table-hover" id="data-table-search_from_deposit">
                            <thead>
                            <tr>
                                <th><strong>รหัสฝากรถ</strong></th>
                                <th><strong>ป้ายทะเบียนรถ</strong></th>
                                <th><strong>วันที่ฝาก</strong></th>
                                <th><strong>จำนวนวันที่ฝาก</strong></th>
                                <th><strong>ประเภทของรถ</strong></th>
                                <th><strong>ผู้บันทึก</strong></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $con=connect_db();

                            $sql1="SELECT * FROM tbl_deposit WHERE work_id='$_SESSION[work_id]'";//ต้องเปลี่ยน WHERE

                            $result1=mysqli_query($con,$sql1);

                            while ($row = mysqli_fetch_assoc($result1)) {

                                extract($row);//ทำให้อยู่ในตัวแปรตามชื่อแอทริบิว
                                $sql="SELECT user_username FROM tbl_user WHERE user_id='$user_id'";//ต้องเปลี่ยน WHERE
                                $result=mysqli_query($con,$sql);
                                list($username)=mysqli_fetch_row($result);

                                $sql2="SELECT car_type_name FROM tbl_car_type WHERE car_type_id='$car_type_id'";//ต้องเปลี่ยน WHERE
                                $result2=mysqli_query($con,$sql2);
                                list($car_type_name)=mysqli_fetch_row($result2);
                                if($_GET['from']=="mulct"){
                                    echo"<tr onclick=\"href1()\">";
                                    echo "<label id='id' data-id='$deposit_id'></label>";
                                }else{
                                    echo"<tr onclick=\"href2()\">";
                                    echo "<label id='id' data-id='$deposit_id'></label>";
                                }
                                ?>

                                    <td><?php echo $deposit_id;?></td>
                                    <td><?php echo $deposit_plate_id;?></td>
                                    <td><?php echo $deposit_date;?></td>
                                    <td><?php echo "99 วัน";?></td>
                                    <td><?php echo $car_type_name;?></td>
                                    <td><?php echo $username; ?></td>
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
        <div class="float-left"><button class="btn btn-danger" type="button" onclick=window.location.href="<?php MALink('deposit','search_mulct')?>"><em class="fas fa-arrow-left"></em> กลับ</button></div>

    </div>
</section><!-- Page footer-->
<script>
    var id =$("#id").data("id");
    function href1() {
        window.location.href='index.php?module=deposit&action=form_add_mulct&id='+id;
    }
    function href2() {
        window.location.href='index.php?module=deposit&action=form_add_news&id='+id;
    }
</script>