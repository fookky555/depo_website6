<section class="section-container">
    <!-- Page content-->
    <div class="content-wrapper">
        <p class="lead"><em class="fa fa-plus-circle"></em> [ เพิ่มข้อมูลค่าปรับการฝากรถ ] </p>
        <div class="card card-default">
            <div class="card-body">
                <form class="form-horizontal" method="post" action="<?php MALink("deposit","add_mulct") ?>">
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-info"></em>&nbsp<b> สาเหตุค่าปรับ</b></label>
                            <div class="col-md-10"><input class="form-control" name="mulct_list" type="text" placeholder="ระบุสาเหตุค่าปรับ.." required></div>
                        </div>

                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"> <em class="fa fa-money-bill"></em>&nbsp<b> จำนวนเงิน</b></label>
                            <div class="col-md-10"><input class="form-control" name="mulct_price" type="number" placeholder="ระบุจำนวนเงิน.." required></div>
                        </div>

                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-file-alt"></em>&nbsp<b> รายละเอียดเพิ่มเติม</b></label>
                            <div class="col-md-10"><textarea class="form-control" aria-label="With textarea" rows="4" name="mulct_note" placeholder="ระบุรายละเอียดเพิ่มเติม..(ถ้ามี)"></textarea></div>
                        </div>
                    </fieldset>
                    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                    <div class="clearfix">
                        <div class="float-left">
                            <button class="btn btn-danger" type="button" onclick=window.location.href="index.php?module=deposit&action=search_from_deposit&from=mulct">
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