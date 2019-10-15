<section class="section-container">
    <!-- Page content-->

    <div class="content-wrapper">
        <div class="row">
            <!-- Article Content-->
            <div class="col-xl-12">
                <div class="clearfix">
                </div>
                <BR>
                <p class="lead"><em class="fa fa-check"> </em> [ ข้อมูลชำระเงินการฝากรถ <?php echo $_SESSION['work_name']; ?> ] </p>
                <div class="card">

                    <div class="table-responsive">
                        <table class="table table-hover" id="data-table-list_bill">
                            <thead>
                            <tr bgcolor="cce6ff">
                                <th><strong><em class="fa fa-hashtag"> </em></strong></th>
                                <th><strong><em class="fa fa-calendar"><font color="cce6ff">_______</font></em></strong></th>
                                <th><strong><em class="fa fa-money-bill"></em></strong></th>
                                <th><strong><em class="fa fa-car"><font color="cce6ff">_________</font> </em></strong></th>
                                <th><strong><em class="fa fa-user"></em></strong></th>
                                <?php if($_SESSION['user_role']=="ผู้ดูแล"){ ?>
                                <th class="text-right" style="width:130px"><strong><em class="fa fa-wrench"><font color="cce6ff">_______</font> </em></strong></th>
                                <?php } ?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $con=connect_db();

                            $sql1="SELECT * FROM tbl_bill WHERE work_id='$_SESSION[work_id]'";//ต้องเปลี่ยน WHERE

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

                                $sql2="SELECT deposit_plate_id FROM tbl_deposit WHERE deposit_id='$deposit_id'";//ต้องเปลี่ยน WHERE
                                $result2=mysqli_query($con,$sql2);
                                list($deposit_plate_id)=mysqli_fetch_row($result2);

                                echo"<tr bgcolor=\"$tbl_cl\">";


                                echo "<td onclick=\"href1(this . id)\" class='tclick' id='$deposit_id'>$bill_id</td>";
                                echo "<td onclick=\"href1(this . id)\" class='tclick' id='$deposit_id'>$bill_date</td>";
                                echo "<td onclick=\"href1(this . id)\" class='tclick' id='$deposit_id'>$bill_total</td>";
                                echo "<td onclick=\"href1(this . id)\" class='tclick' id='$deposit_id'>$deposit_plate_id</td>";
                                echo "<td onclick=\"href1(this . id)\" class='tclick' id='$deposit_id'>$username</td>";

                            if($_SESSION['user_role']=="ผู้ดูแล") {
                                ?>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-warning" type="button"
                                            onclick=window.location.href="index.php?module=bill&action=form_edit_bill&id=<?php echo $bill_id; ?>">
                                        <em
                                                class="fas fa-pencil-alt"></em></button>
                                    <button class="btn btn-sm btn-danger delete_bill" type="button"
                                            data-link="index.php?module=bill&action=delete_bill&id=<?php echo $bill_id; ?>">
                                        <em
                                                class="fas fa-trash-alt"></em></button>
                                </td>
                                <?php
                                echo "<label class='link' ></label>";
                            }
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
        <div class="float-left">

        </div>
        <p><em class="fa fa-hashtag"> </em> = รหัสใบเสร็จชำระเงิน</p>
        <p><em class="fa fa-money-bill"></em> = ยอดชำระเงินทั้งหมด</p>
        <p><em class="fa fa-user"></em> = ผู้บันทึกข้อมูล</p>
        <p><em class="fa fa-calendar"></em> = วันที่ชำระเงิน</p>
        <p><em class="fa fa-car"></em> = ป้ายทะเบียนรถ</p>
        <p><em class="fa fa-wrench"></em> = จัดการข้อมูล</p>
    </div>
</section><!-- Page footer-->
<script>
    //var id =$("#link").data("id");

    $(".tclick").click(function (e) {
        window.location.href='index.php?module=deposit&action=show_deposit&id='+e.data("id");
    });

    // console.log(id);
    function href1(id) {
        window.location.href='index.php?module=deposit&action=show_deposit&id='+id;
    }

</script>