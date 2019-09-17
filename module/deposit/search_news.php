<section class="section-container">
    <!-- Page content-->

    <div class="content-wrapper">
        <div class="row">
            <!-- Article Content-->
            <div class="col-xl-12">
                <div class="clearfix">
                    <div class="float-right"><button class="btn btn-purple" type="button" onclick=window.location.href="index.php?module=deposit&action=search_from_deposit&from=news"><em class="fas fa-plus"></em>  เพิ่มข่าวประชาสัมพันธ์</button></div>
                </div>
                <BR>
                <p class="lead"><em class="fa fa-comment"></em> [ ข้อมูลข่าวประชาสัมพันธ์ของร้าน ] </p>
                <div class="card">

                    <div class="table-responsive">
                        <table class="table table-hover" id="data-table-search_news">
                            <thead>
                            <tr>
                                <th style="display:none;"></th>
                                <th><strong><em class="fa fa-hashtag"></em></strong></th>
                                <th><strong><em class="fa fa-comment-alt"><font color="white">________</font></em></strong></th>
                                <th><strong><em class="fa fa-user-check"></em></strong></th>
                                <th class="text-right" style="width:130px"><strong><em class="fa fa-wrench"><font color="white">_______</font></em></strong></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $con=connect_db();

                            $sql1="SELECT * FROM tbl_news WHERE work_id='$_SESSION[work_id]'";//ต้องเปลี่ยน WHERE

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

                                $sql2="SELECT user_username FROM tbl_user WHERE user_id='$user_id'";//ต้องเปลี่ยน WHERE
                                $result2=mysqli_query($con,$sql2);
                                list($username)=mysqli_fetch_row($result2);
                                echo "<tr>";
                                ?><td style="display:none;"><?php$numchk?></td><?php
                                echo "<td onclick=\"href1(this.id)\" class='tclick' id='$deposit_id' bgcolor=\"$tbl_cl\">$deposit_id</td>";
                                echo "<td onclick=\"href1(this.id)\" class='tclick' id='$deposit_id' bgcolor=\"$tbl_cl\">$news_head</td>";
                                echo "<td onclick=\"href1(this.id)\" class='tclick' id='$deposit_id' bgcolor=\"$tbl_cl\">$username</td>";

                                ?>
                                <td class="text-center" bgcolor="<?php echo $tbl_cl; ?>">

                                    <button class="btn btn-sm btn-warning" type="button" onclick=window.location.href="index.php?module=deposit&action=form_edit_news&id=<?php echo $news_id; ?>"><em
                                                class="fas fa-pen"></em></button>


                                    <?php if($_SESSION['user_role']=="ผู้ดูแล"){
                                        ?>
                                        <button class="btn btn-sm btn-danger delete_news"  type="button" data-link="index.php?module=deposit&action=delete_news&id=<?php echo $news_id; ?>"><em
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
            <p align="right">รหัสข่าวประชาสัมพันธ์ = <em class="fa fa-hashtag"> </em></p>
            <p align="right">หัวข้อข่าวประชาสัมพันธ์ = <em class="fa fa-comment-alt"> </em></p>
            <p align="right">ผู้บันทึกข้อมูล = <em class="fa fa-user-check"> </em></p>
            <p align="right">จัดการข้อมูล = <em class="fa fa-wrench"> </em></p>
        </div>
        <div class="float-left"><button class="btn btn-danger" type="button" onclick=window.location.href="<?php MALink('deposit','list_deposit')?>"><em class="fas fa-arrow-left"></em> กลับ</button></div>

    </div>
</section><!-- Page footer-->
<script>
    //var id =$("#link").data("id");

    $(".tclick").click(function (e) {
        window.location.href='index.php?module=deposit&action=show_deposit&from=news&id='+e.data("id");
    });

    // console.log(id);
    function href1(id) {
        window.location.href='index.php?module=deposit&action=show_deposit&from=news&id='+id;
    }

</script>