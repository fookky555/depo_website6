<section class="section-container">
    <!-- Page content-->

    <div class="content-wrapper">
        <div class="row">
            <!-- Article Content-->
            <div class="col-xl-12">
                <div class="clearfix">
                </div>
                <BR>
                <p class="lead"><em class="fa fa-check"> </em> [ ข้อมูลชำระเงินการฝากรถของร้าน ] </p>
                <div class="card">

                    <div class="table-responsive">
                        <table class="table table-hover" id="data-table-list_bill">
                            <thead>
                            <tr>
                                <th><strong><em class="fa fa-hashtag"> </em></strong></th>
                                <th><strong><em class="fa fa-motorcycle"> </em></strong></th>
                                <th><strong><em class="fa fa-tint"> </em></strong></th>
                                <th><strong><em class="fa fa-exclamation-circle"> </em></strong></th>
                                <th><strong><em class="fa fa-money-bill"></em></strong></th>
                                <th><strong><em class="fa fa-user"></em></strong></th>
                                <th><strong><em class="fa fa-calendar"><font color="white">_______</font></em></strong></th>
                                <th class="text-right" style="width:130px"><strong><em class="fa fa-wrench"><font color="white">_______</font> </em></strong></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $con=connect_db();

                            $sql1="SELECT * FROM tbl_bill WHERE work_id='$_SESSION[work_id]'";//ต้องเปลี่ยน WHERE

                            $result1=mysqli_query($con,$sql1);

                            while ($row = mysqli_fetch_assoc($result1)) {

                                extract($row);//ทำให้อยู่ในตัวแปรตามชื่อแอทริบิว
                                $sql="SELECT user_username FROM tbl_user WHERE user_id='$user_id'";//ต้องเปลี่ยน WHERE
                                $result=mysqli_query($con,$sql);
                                list($username)=mysqli_fetch_row($result);

                                echo"<tr>";


                                echo "<td onclick=\"href1(this . id)\" class='tclick' id='$deposit_id'>$bill_id</td>";
                                echo "<td onclick=\"href1(this . id)\" class='tclick' id='$deposit_id'>$bill_deposit</td>";
                                echo "<td onclick=\"href1(this . id)\" class='tclick' id='$deposit_id'>$bill_wash</td>";
                                echo "<td onclick=\"href1(this . id)\" class='tclick' id='$deposit_id'>$bill_mulct</td>";
                                echo "<td onclick=\"href1(this . id)\" class='tclick' id='$deposit_id'>$bill_total</td>";
                                echo "<td onclick=\"href1(this . id)\" class='tclick' id='$deposit_id'>$username</td>";
                                echo "<td onclick=\"href1(this . id)\" class='tclick' id='$deposit_id'>$bill_date</td>";
                                ?>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-warning" type="button" onclick=window.location.href="index.php?module=bill&action=form_edit_bill&id=<?php echo $bill_id; ?>"><em
                                                class="fas fa-pencil-alt"></em></button>
                                        <button class="btn btn-sm btn-danger delete_bill"  type="button" data-link="index.php?module=bill&action=delete_bill&id=<?php echo $bill_id; ?>"><em
                                                class="fas fa-trash-alt"></em></button>
                                    </td>
                                <?php
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
        <div class="float-left">

        </div>
        <p><em class="fa fa-hashtag"> </em> = รหัสใบเสร็จชำระเงิน</p>
        <p><em class="fa fa-motorcycle"> </em> = ค่าบริการฝากรถ</p>
        <p><em class="fa fa-tint"> </em> = ค่าบริการล้างรถ</p>
        <p><em class="fa fa-exclamation-circle"> </em> = ค่าปรับ</p>
        <p><em class="fa fa-money-bill"></em> = ยอดชำระเงินทั้งหมด</p>
        <p><em class="fa fa-user"></em> = ผู้บันทึกข้อมูล</p>
        <p><em class="fa fa-calendar"></em> = วันที่ชำระเงิน</p>
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