<section class="section-container">
    <!-- Page content-->
    <div class="content-wrapper">
        <div class="lead"><b><em class="fa fa-user-plus"></em> [ เพิ่มข้อมูลผู้ใช้งานร้าน ] </b></div><br>
        <div class="card card-default">
            <div class="card-body">
                <form class="form-horizontal" method="post" action="<?php MALink('user','add_user') ?>">

                    <fieldset>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-user"></em>&nbsp<b> ชื่อผู้ใช้</b></label>
                            <div class="col-md-10"><input class="form-control" name="user_username" type="text" placeholder="ชื่อผู้ใช้" required></div>
                        </div>

                        <br>
                        <div class="form-group row"><label class="col-md-2 col-form-label"> <em class="fa fa-lock"></em>&nbsp<b> รหัสผ่าน</b></label>
                            <div class="col-md-10"><input class="form-control" name="user_password" type="text" placeholder="รหัสผ่าน" required></div>
                        </div>

                        <br>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-address-card"></em>&nbsp<b> ชื่อและนามสกุล</b></label>
                            <div class="col-md-10"><input class="form-control" name="user_name" type="text" placeholder="ชื่อและนามสกุล" required></div>
                        </div>

                        <br>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-phone"></em>&nbsp<b> เบอร์โทรศัพท์</b></label>
                            <div class="col-md-10"><input class="form-control" name="user_phone" type="number" placeholder="เบอร์โทรศัพท์" required></div>
                        </div>

                        <br>
                        <div class="form-group row"><label class="col-md-2 col-form-label"><em class="fa fa-id-card-alt"></em>&nbsp<b> ประเภทผู้ใช้</b></label>
                            <div class="col-md-10"><select class="custom-select custom-select-sm" name="user_role" required>
                                    <option value="">เลือกประเภทผู้ใช้งาน..</option>
                                    <option value="1">ผู้ดูแล</option>
                                    <option value="2">พนักงาน</option>
                                    <option value="3">ผู้ประกอบการ</option>
                                </select>


                            </div>
                        </div>


                    </fieldset>

                    <div class="clearfix">
                        <div class="float-left">
                            <button class="btn btn-danger" type="button" onclick=window.location.href="<?php MALink('user','list_user')?>">
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