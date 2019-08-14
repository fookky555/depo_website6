<section class="section-container">
    <!-- Page content-->
    <div class="content-wrapper">
        <p class="lead"><em class="fa fa-times-circle"></em> [ ยกเลิกการฝากรถ ] </p>
        <div class="card card-default">
            <div class="card-body">
                <form class="form-horizontal" method="post" action="<?php MALink("deposit","cancel_deposit") ?>">

                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-hashtag"></em>&nbsp<b> รหัสรถฝาก</b></label>
                            <div class="col-md-10"><input class="form-control" name="deposit_id" type="text" value="<?php echo $_GET['id'];?>" disabled></div>
                        </div>

                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"> <em class="fa fa-exclamation-circle"></em>&nbsp<b> หมายเหตุที่ยกเลิกการฝาก</b></label>
                            <div class="col-md-10"><input class="form-control" name="deposit_detail" type="text" PLACEHOLDER="ระบุหมายเหตุที่ยกเลิก.." required></div>
                        </div>

                    </fieldset>
                    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                    <div class="clearfix">
                        <div class="float-left">
                            <button class="btn btn-danger" type="button" onclick=window.location.href="index.php?module=deposit&action=search_deposit">
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