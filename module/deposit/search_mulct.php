<section class="section-container">
    <!-- Page content-->

    <div class="content-wrapper">
        <div class="row">
            <!-- Article Content-->
            <div class="col-xl-12">
                <div class="clearfix">
                    <div class="float-right"><button class="btn btn-danger" type="button" onclick=window.location.href="index.php?module=deposit&action=search_from_deposit&from=mulct"><em class="fas fa-plus"></em>  เพิ่มค่าปรับ</button></div>
                </div>
                <BR>
                <p class="lead"><em class="fa fa-money-bill"></em> [ ข้อมูลค่าปรับของร้าน ] </p>
                <div class="card">

                    <div class="table-responsive">
                        <table class="table table-hover" id="data-table-search_mulct">
                            <thead>
                            <tr bgcolor="cce6ff">
                                <th style="display:none;"></th>
                                <th><strong><em class="fa fa-hashtag"></em></strong></th>
                                <th><strong><em class="fa fa-exclamation-circle"><font color="cce6ff">_____________</font></em></strong></th>
                                <th><strong><em class="fa fa-money-bill"></em></strong></th>
                                <th><strong><em class="fa fa-calendar"><font color="cce6ff">_______</font></em></strong></th>
                                <th><strong><em class="fa fa-user-check"></em></strong></th>
                                <th><strong><em class="fa fa-book"><font color="cce6ff">_________________</font></em></strong></th>
                                <th class="text-right" style="width:130px"><strong><em class="fa fa-wrench"><font color="cce6ff">_______</font></em></strong></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $con=connect_db();
                            $sql1="SELECT * FROM tbl_mulct WHERE work_id='$_SESSION[work_id]'";//ต้องเปลี่ยน WHERE

                            $result1=mysqli_query($con,$sql1);
                            $numchk=0;
                            while ($row = mysqli_fetch_assoc($result1)) {
                                extract($row);//ทำให้อยู่ในตัวแปรตามชื่อแอทริบิว
                                $numchk++;
                                if($numchk%2){
                                    $tbl_cl="";
                                }else{
                                    $tbl_cl="f0f7ff";
                                }

                                $sql2="SELECT user_username FROM tbl_user WHERE user_id='$user_id'";//ต้องเปลี่ยน WHERE
                                $result2=mysqli_query($con,$sql2);
                                list($username)=mysqli_fetch_row($result2);
                                echo "<tr bgcolor=\"$tbl_cl\">";

                                ?><td style="display:none;"><?php echo $numchk; ?></td><?php

                                echo "<td onclick=\"href1(this.id)\" class='tclick' id='$deposit_id'>$deposit_id</td>";
                                echo "<td onclick=\"href1(this.id)\" class='tclick' id='$deposit_id'>$mulct_list</td>";
                                echo "<td onclick=\"href1(this.id)\" class='tclick' id='$deposit_id'>$mulct_price</td>";
                                echo "<td onclick=\"href1(this.id)\" class='tclick' id='$deposit_id'>$mulct_date</td>";
                                echo "<td onclick=\"href1(this.id)\" class='tclick' id='$deposit_id'>$username</td>";
                                echo "<td onclick=\"href1(this.id)\" class='tclick' id='$deposit_id'>$mulct_note</td>";

                                ?>
                                    <td class="text-center">

                                        <button class="btn btn-sm btn-warning" type="button" onclick=window.location.href="index.php?module=deposit&action=form_edit_mulct&id=<?php echo $mulct_id; ?>"><em
                                                class="fas fa-pen"></em></button>

                                        <?php if($_SESSION['user_role']=="ผู้ดูแล"){
                                            ?>
                                        <button class="btn btn-sm btn-danger delete_mulct"  type="button" data-link="index.php?module=deposit&action=delete_mulct&id=<?php echo $mulct_id; ?>"><em
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
            <p align="right">รหัสข้อมูลฝากรถ = <em class="fa fa-hashtag"> </em></p>
            <p align="right">วันที่บันทึกข้อมูล = <em class="fa fa-calendar"> </em></p>
            <p align="right">หมายเหตุค่าปรับ = <em class="fa fa-exclamation-circle"> </em></p>
            <p align="right">จำนวนค่าปรับ = <em class="fa fa-money-bill"> </em></p>
            <p align="right">ผู้บันทึกข้อมูล = <em class="fa fa-user-check"> </em></p></th>
            <p align="right">รายละเอียดเพิ่มเติม = <em class="fa fa-book"> </em></p></th>
            <p align="right">จัดการข้อมูล = <em class="fa fa-wrench"> </em></p>
        </div>
        <div class="float-left"><button class="btn btn-danger" type="button" onclick=window.location.href="<?php MALink('deposit','list_deposit')?>"><em class="fas fa-arrow-left"></em> กลับ</button></div>

    </div>
</section><!-- Page footer-->
<script>
    //var id =$("#link").data("id");

    $(".tclick").click(function (e) {
        window.location.href='index.php?module=deposit&action=show_deposit&from=mulct&id='+e.data("id");
    });

    // console.log(id);
    function href1(id) {
        window.location.href='index.php?module=deposit&action=show_deposit&from=mulct&id='+id;
    }

</script>