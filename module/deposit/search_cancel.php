<section class="section-container">
    <!-- Page content-->

    <div class="content-wrapper">
        <div class="row">
            <!-- Article Content-->
            <div class="col-xl-12">
                <BR>
                <p class="lead"><em class="fa fa-search"> </em> [ ค้นหาข้อมูลฝากรถที่ถูกยกเลิก ] </p>
                <div class="card">

                    <div class="table-responsive">
                        <table class="table table-hover" id="data-table-search_cancel">
                            <thead>
                            <tr bgcolor="cce6ff">
                                <th style="display:none;"></th>
                                <th><strong><em class="fa fa-exclamation-circle"><font color="cce6ff">____________</font></em></strong></th>
                                <th><strong><em class="fa fa-car"><font color="cce6ff">_________</font> </em></strong></th>
                                <th><strong><em class="fa fa-calendar"><font color="cce6ff">_________</font> </em></strong></th>
                                <th><strong><em class="fa fa-motorcycle"><font color="cce6ff">______</font> </em></strong></th>
                                <th><strong><em class="fa fa-user-edit"> </em></strong></th>
                                <?php if($_SESSION['user_role']=="ผู้ดูแล"){ ?>
                                    <th class="text-right" style="width:130px"><strong><em class="fa fa-wrench"><font color="cce6ff">___________</font> </em></strong></th>
                                <?php } ?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $con=connect_db();

                            $sql1="SELECT * FROM tbl_deposit WHERE work_id='$_SESSION[work_id]' AND deposit_active=2";//ต้องเปลี่ยน WHERE

                            $result1=mysqli_query($con,$sql1);
                            $numchk=0;
                            while ($row = mysqli_fetch_assoc($result1)) {
                                $numchk++;
                                if($numchk%2){
                                    $tbl_cl="";
                                }else{
                                    $tbl_cl="f0f7ff";
                                }
                                extract($row);//ทำให้อยู่ในตัวแปรตามชื่อแอทริบิว
                                $sql="SELECT user_username FROM tbl_user WHERE user_id='$user_id'";//ต้องเปลี่ยน WHERE
                                $result=mysqli_query($con,$sql);
                                list($username)=mysqli_fetch_row($result);

                                $sql2="SELECT car_type_name FROM tbl_car_type WHERE car_type_id='$car_type_id'";//ต้องเปลี่ยน WHERE
                                $result2=mysqli_query($con,$sql2);
                                list($car_type_name)=mysqli_fetch_row($result2);

                                //เช็ควันว่าฝากมากี่วันแล้ว
                                $date = new DateTime($deposit_date);
                                $now = new DateTime();
                                $days = $date->diff($now)->format('%a วัน');

                                echo"<tr bgcolor=\"$tbl_cl\">";

                                ?><td style="display:none;"><?php echo $numchk; ?></td><?php
                                echo "<td onclick=\"href1(this.id)\" class='tclick' id='$deposit_id'>$deposit_detail</td>";
                                echo "<td onclick=\"href1(this.id)\" class='tclick' id='$deposit_id'>$deposit_plate_id</td>";
                                echo "<td onclick=\"href1(this.id)\" class='tclick' id='$deposit_id'>$deposit_date</td>";
                                echo "<td onclick=\"href1(this.id)\" class='tclick' id='$deposit_id'>$car_type_name</td>";
                                echo "<td onclick=\"href1(this.id)\" class='tclick' id='$deposit_id'>$username</td>";


                                if($_SESSION['user_role']=="ผู้ดูแล"){ ?>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-danger delete_cancel"  type="button" data-link="index.php?module=deposit&action=delete_cancel&id=<?php echo $deposit_id; ?>"><em
                                                class="fas fa-trash-alt"></em></button>
                                    </td>
                                <?php }
                                echo "<label class='link' ></label>";
                                ?>
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
            <p align="right">จัดการข้อมูล = <em class="fa fa-wrench"> </em></p>
        </div>
        <div class="float-left"><button class="btn btn-danger" type="button" onclick=window.location.href="<?php MALink('deposit','list_deposit')?>"><em class="fas fa-arrow-left"></em> กลับ</button></div>



    </div>
</section><!-- Page footer-->
<script>
    //var id =$("#link").data("id");

    $(".tclick").click(function (e) {
        window.location.href='index.php?module=deposit&action=show_cancel&id='+e.data("id");
    });

    // console.log(id);
    function href1(id) {
        window.location.href='index.php?module=deposit&action=show_cancel&id='+id;
    }

</script>