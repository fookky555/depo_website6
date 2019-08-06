<section class="section-container">
    <!-- Page content-->
    <div class="content-wrapper">
        <p class="lead"> [ แก้ไขข้อมูลข่าวประชาสัมพันธ์ ] </p>
        <div class="card card-default">
            <div class="card-body">
                <form class="form-horizontal" method="post" action="<?php MALink("deposit","edit_news") ?>">
                    <?php
                    $con=connect_db();
                    $sql="SELECT deposit_id,news_head FROM tbl_news WHERE news_id='$_GET[id]'";
                    list($deposit_id,$news_head)=mysqli_fetch_row(mysqli_query($con,$sql));
                    ?>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-hashtag"></em>&nbsp<b> รหัสรถฝาก</b></label>
                            <div class="col-md-10"><input class="form-control" name="deposit_id" type="text" value="<?php echo $deposit_id;?>" disabled></div>
                        </div>

                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"> <em class="fa fa-comment"></em>&nbsp<b> หัวข้อข่าวประชาสัมพันธ์</b></label>
                            <div class="col-md-10"><input class="form-control" name="news_head" type="text" value="<?php echo $news_head;?>"></div>
                        </div>

                    </fieldset>
                    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                    <div class="clearfix">
                        <div class="float-left">
                            <button class="btn btn-danger" type="button" onclick=window.location.href="<?php MALink('deposit','search_news')?>">
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