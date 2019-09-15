<section class="section-container">
    <!-- Page content-->

    <div class="content-wrapper">
        <div class="row">
            <!-- Article Content-->
            <div class="col-xl-12">

                <p class="lead"><em class="fa fa-database"></em> [ เลือกข้อมูลการฝากรถ ] </p>
                <div class="card">

                    <div class="table-responsive">
                        <table class="table table-hover" id="data-table-search_from_deposit">
                            <thead>
                            <tr>
                                <th><strong><em class="fa fa-hashtag"> </em></strong></th>
                                <th><strong><em class="fa fa-car"><font color="white">______</font> </em></strong></th>
                                <th><strong><em class="fa fa-calendar"><font color="white">______________</font> </em></strong></th>
                                <th><strong><em class="fa fa-calendar-check"><font color="white">____</font> </em></strong></th>
                                <th><strong><em class="fa fa-motorcycle"><font color="white">______</font> </em></strong></th>
                                <th><strong><em class="fa fa-user-edit"> </em></strong></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $con=connect_db();

                            $sql1="SELECT * FROM tbl_deposit WHERE work_id='$_SESSION[work_id]' AND deposit_active=1";//ต้องเปลี่ยน WHERE

                            $result1=mysqli_query($con,$sql1);
                            $numchk=0;
                            while ($row = mysqli_fetch_assoc($result1)) {
                                $numchk++;
                                if($numchk%2){
                                    $tbl_cl="ghostwhite";
                                }else{
                                    $tbl_cl="";
                                }
                                extract($row);//ทำให้อยู่ในตัวแปรตามชื่อแอทริบิว
                                $sql="SELECT user_username FROM tbl_user WHERE user_id='$user_id'";//ต้องเปลี่ยน WHERE
                                $result=mysqli_query($con,$sql);
                                list($username)=mysqli_fetch_row($result);

                                $sql2="SELECT car_type_name FROM tbl_car_type WHERE car_type_id='$car_type_id'";//ต้องเปลี่ยน WHERE
                                $result2=mysqli_query($con,$sql2);
                                list($car_type_name)=mysqli_fetch_row($result2);
                                if($_GET['from']=="mulct"){
                                    echo"<tr onclick=\"href1(this.id)\" class='tclick' id='$deposit_id' bgcolor=\"$tbl_cl\">";
                                    echo "<label class='link' ></label>";
                                }else{
                                    echo"<tr onclick=\"href2(this.id)\" class='tclick' id='$deposit_id' bgcolor=\"$tbl_cl\">";
                                    echo "<label class='link' ></label>";
                                }

                                $date = new DateTime($deposit_date);
                                $now = new DateTime();
                                ?>

                                    <td><?php echo $deposit_id;?></td>
                                    <td><?php echo $deposit_plate_id;?></td>
                                    <td><?php echo $deposit_date;?></td>
                                <td><?php  echo $date->diff($now)->format("%a วัน"); ?></td>
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
        <div class="float-right">
            <p align="right">รหัสฝากรถ = <em class="fa fa-hashtag"> </em></p>
            <p align="right">ป้ายทะเบียนรถ = <em class="fa fa-car"> </em></p>
            <p align="right">วันที่ฝาก = <em class="fa fa-calendar"> </em></p>
            <p align="right">จำนวนวันที่ฝาก = <em class="fa fa-calendar-check"> </em></p>
            <p align="right">ประเภทของรถ = <em class="fa fa-motorcycle"> </em></p>
            <p align="right">ผู้บันทึกข้อมูล = <em class="fa fa-user-edit"> </em></p></th>
        </div>
        <?php
        if($_GET['from']=="mulct"){

            ?>
            <div class="float-left"><button class="btn btn-danger" type="button" onclick=window.location.href="<?php MALink('deposit','search_mulct')?>"><em class="fas fa-arrow-left"></em> กลับ</button></div>

            <?php
        }else{
            ?>
            <div class="float-left"><button class="btn btn-danger" type="button" onclick=window.location.href="<?php MALink('deposit','search_news')?>"><em class="fas fa-arrow-left"></em> กลับ</button></div>
            <?php
        }
        ?>

    </div>
</section><!-- Page footer-->
<script>
    //var id =$("#link").data("id");

    $(".tclick").click(function (e) {
        window.location.href='index.php?module=deposit&action=form_add_mulct&id='+e.data("id");
    });

    // console.log(id);
    function href1(id) {
        window.location.href='index.php?module=deposit&action=form_add_mulct&id='+id;
    }
    function href2(id) {
        window.location.href='index.php?module=deposit&action=form_add_news&id='+id;
    }

</script>