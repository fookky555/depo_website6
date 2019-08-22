

<section class="section-container">
    <!-- Page content-->

    <div class="content-wrapper">
        <p class="lead"><em class="fa fa-dot-circle"> </em> [ ระบบรับฝากรถ <?php echo $_SESSION['work_name'];?> ] </p>
        <div class="card card-default">

            <div class="card-body">
                <br>
                <h2 align="center"><font color="#778899"> จำนวนรถที่ฝาก </font></h2>
                <table align="center">
                    <tr>
                <?php
                $con=connect_db();

                $sql1="SELECT car_type_id,car_type_name FROM tbl_car_type WHERE work_id='$_SESSION[work_id]'";//SELECT ชื่อประเภทและรหัสประเภทจากร้านเรา

                $result=mysqli_query($con,$sql1);
                $i=0;
                $color="";
                while(list($car_type_id,$car_type_name)=mysqli_fetch_row($result)){

                    $sql="SELECT COUNT(car_type_id) FROM tbl_deposit WHERE car_type_id='$car_type_id' AND deposit_active=1";//SELECT จำนวนรถแต่ละประเภทของร้านเราที่ฝาก
                    $res=mysqli_query($con,$sql);
                    list($deposit_volume)=mysqli_fetch_row($res);
                    if($i==0){
                        $color="info";
                    }else if($i==1){
                        $color="purple";
                    }else if($i==2){
                        $color="danger";
                    }else if($i==3){
                        $color="success";
                    }else{
                        $color="gray";
                    }
                    $i++;
                    ?>

                            <div class="card bg-<?php echo $color; ?>">
                                <div class="card-body text-center">
                                    <div class="text-lg m-0"><?php echo $deposit_volume; ?></div>
                                    <p><b><?php echo $car_type_name; ?></b></p>
                                    <div class="mb-3"></div>
                                </div>
                            </div>

<!--เว้นระยะห่างรหว่างประเภทรถ--> <td> &nbsp </td>
                        <?php } ?>
                    </tr>
                </table>
                <div align="center">
                    <button class="btn btn-labeled btn-outline-warning mb-2" type="button" onclick=window.location.href="<?php MALink('deposit','form_add_deposit')?>"><span class="btn-label"><i class="fa fa-plus"></i></span><b>ฝากรถ</b></button>
                    <button class="btn btn-labeled btn-outline-success mb-2" type="button" onclick=window.location.href="<?php MALink('deposit','search_deposit')?>"><span class="btn-label"><i class="fa fa-search"></i></span><b>ข้อมูลฝากรถ</b></button>
                </div>
                <hr>
                <div><!--ปุ่มด้านล่างสามปุ่ม-->
                    <ul>
                        <li>
                            <button class="btn btn-labeled btn-outline-info mb-2" type="button" onclick=window.location.href="<?php MALink('deposit','search_wash')?>"><span class="btn-label"><i class="fas fa-tint"></i></span><b><font color="white">____</font> ข้อมูลล้างรถ<font color="white">___</font></b></button>
                        </li>
                        <li>
                            <button class="btn btn-labeled btn-outline-purple mb-2" type="button" onclick=window.location.href="<?php MALink('deposit','search_news')?>"><span class="btn-label"><i class="fas fa-comment"></i></span><b>ข้อมูลประชาสัมพันธ์</b></button>
                        </li>
                        <li>
                            <button class="btn btn-labeled btn-outline-danger mb-2" type="button" onclick=window.location.href="<?php MALink('deposit','search_mulct')?>"><span class="btn-label"><i class="fas fa-money-bill"></i></span><b><font color="white">___</font>ข้อมูลค่าปรับ<font color="white">___</font></b></button>
                        </li>
                        <li>
                            <button class="btn btn-labeled btn-outline-dark mb-2" type="button" onclick=window.location.href="<?php MALink('deposit','search_cancel')?>"><span class="btn-label"><i class="fas fa-exclamation-circle"></i></span><b> การฝากที่ถูกยกเลิก</b></button>
                        </li>
                    </ul>
                </div>

                </div><!-- END card-->
            </div>
        </div>
    </div>
</section>