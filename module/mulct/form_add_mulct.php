<section class="section-container">
    <!-- Page content-->
    <div class="content-wrapper">
        <div class="card card-default">
            <div class="card-header"><b>เพิ่มข้อมูลค่าปรับ</b></div>
            <div class="card-body">
                <form class="form-horizontal" method="post" action="<?php MALink("mulct","add_mulct") ?>">

                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-user"></em></label>
                            <div class="col-md-10"><input class="form-control" name="mulct_list" type="text" placeholder="สาเหตุค่าปรับ"></div>
                        </div>

                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"> <em class="fa fa-lock"></em></label>
                            <div class="col-md-10"><input class="form-control" name="mulct_price" type="number" placeholder="ระบุจำนวนเงิน"></div>
                        </div>

                    </fieldset>
                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-address-card"></em></label>
                            <div class="col-md-10"><input class="form-control" name="mulct_note" type="text" placeholder="ระบุหมายเหตุเพิ่มเติ่ม(ถ้ามี)"></div>
                        </div>

                    </fieldset>

                    <div class="clearfix">
                        <div class="float-left">
                            <button class="btn btn-danger" type="button" onclick=window.location.href="">
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