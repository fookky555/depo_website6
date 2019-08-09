<section class="section-container">
    <!-- Page content-->
    <div class="content-wrapper">
        <p class="lead"><em class="fa fa-pen"></em> [ แก้ไขข้อมูลค่าปรับการฝากรถ ] </p>
        <div class="card card-default">
            <div class="card-body">
                <form class="form-horizontal" method="post" action="<?php MALink("deposit","edit_mulct") ?>">
                    <?php
                    $con=connect_db();
                    $sql="SELECT mulct_list,mulct_price,mulct_note FROM tbl_mulct WHERE mulct_id='$_GET[id]'";
                    list($mulct_list,$mulct_price,$mulct_note)=mysqli_fetch_row(mysqli_query($con,$sql));
                    ?>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-info"></em>&nbsp<b> สาเหตุค่าปรับ</b></label>
                            <div class="col-md-10"><input class="form-control" name="mulct_list" type="text" value="<?php echo $mulct_list;?>" required></div>
                        </div>

                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"> <em class="fa fa-money-bill"></em>&nbsp<b> จำนวนเงิน</b></label>
                            <div class="col-md-10"><input class="form-control" name="mulct_price" type="number" value="<?php echo $mulct_price;?>" required></div>
                        </div>

                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-file-alt"></em>&nbsp<b> รายละเอียดเพิ่มเติม</b></label>
                            <div class="col-md-10"><textarea class="form-control" aria-label="With textarea" rows="4" name="mulct_note"><?php echo $mulct_note;?></textarea></div>
                        </div>
                    </fieldset>
                    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                    <div class="clearfix">
                        <div class="float-left">
                            <button class="btn btn-danger" type="button" onclick=window.location.href="<?php MALink('deposit','search_mulct')?>">
                                <em class="fa fa-caret-left fa-fw" ></em>กลับ</button>
                        </div>

                        <div class="float-right">
                            <button class="btn btn-primary" type="submit">
                                <em class="fa fa-check fa-fw"></em>บันทึก</button>

                        </div>

                    </div>
                </form>
            </div>
        </div><!-- END card-->
    </div>
</section><!-- Page footer-->