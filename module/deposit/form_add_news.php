<section class="section-container">
    <!-- Page content-->
    <div class="content-wrapper">
        <p class="lead"><em class="fa fa-plus-circle"></em> [ เพิ่มข้อมูลข่าวประชาสัมพันธ์ ] </p>
        <div class="card card-default">
            <div class="card-body">
                <form class="form-horizontal" method="post" action="<?php MALink("deposit","add_news") ?>">

                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-hashtag"></em>&nbsp<b> รหัสรถฝาก</b></label>
                            <div class="col-md-10"><input class="form-control" name="deposit_id" type="text" value="<?php echo $_GET['id'];?>" disabled></div>
                        </div>

                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"> <em class="fa fa-comment"></em>&nbsp<b> หัวข้อข่าวประชาสัมพันธ์</b></label>
                            <div class="col-md-10"><input class="form-control" name="news_head" type="text" PLACEHOLDER="ระบุหัวข้อข่าวประชาสัมพันธ์.." required></div>
                        </div>

                    </fieldset>
                    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                    <div class="clearfix">
                        <div class="float-left">
                            <button class="btn btn-danger" type="button" onclick=window.location.href="index.php?module=deposit&action=search_from_deposit&from=news">
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