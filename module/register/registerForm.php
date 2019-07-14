<div class="wrapper">
    <div class="block-center mt-4 wd-xl">
        <!-- START card-->
        <div class="card card-flat">
            <div class="card-header text-center bg-dark"><a href="#"><img class="block-center" src="img/logo.png"
                                                                          alt="Image"></a></div>
            <div class="card-body">
                <p class="text-center py-2">ลงทะเบียนร้านฝากรถ</p>
                <form class="mb-3" id="registerForm" action="<?php MALink("register","register") ?>" method="post" >

                    <div class="form-group"><label class="text-muted" for="">กำหนดชื่อผู้ใช้</label>
                        <div class="input-group with-focus">
                            <input class="form-control border-right-0" type="text" name="user_username"
                                                                   placeholder="ชื่อผู้ใช้" autocomplete="off"
                                                                   required>
                            <div class="input-group-append"><span
                                        class="input-group-text text-muted bg-transparent border-left-0"><em
                                            class="fa fa-user"></em></span></div>
                        </div>
                    </div>
                    <div class="form-group"><label class="text-muted" for="user_password">กำหนดรหัสผ่าน</label>
                        <div class="input-group with-focus"><input class="form-control border-right-0"
                                                                   id="user_password" type="password" name="user_password"
                                                                   placeholder="รหัสผ่าน" autocomplete="off" required>
                            <div class="input-group-append"><span
                                        class="input-group-text text-muted bg-transparent border-left-0"><em
                                            class="fa fa-lock"></em></span></div>
                        </div>
                    </div>
                    <div class="form-group"><label class="text-muted" for="user_repassword">ยืนยันรหัสผ่าน</label>
                        <div class="input-group with-focus"><input class="form-control border-right-0"
                                                                   id="user_repassword" type="password"
                                                                   placeholder="ยืนยันรหัสผ่าน" autocomplete="off"
                                                                   required
                                                                   data-parsley-equalto="#user_password">
                            <div class="input-group-append"><span
                                        class="input-group-text text-muted bg-transparent border-left-0"><em
                                            class="fa fa-lock"></em></span></div>
                        </div>
                    </div>
                    <div class="form-group"><label class="text-muted" for="user_name">กำหนดชื่อและนามสกุล</label>
                        <div class="input-group with-focus"><input class="form-control border-right-0"
                                                                   id="user_name" type="text" name="user_name"
                                                                   placeholder="ชื่อและนามสกุล" autocomplete="off"
                                                                   required>
                            <div class="input-group-append"><span
                                        class="input-group-text text-muted bg-transparent border-left-0"><em
                                            class="fa fa-address-card"></em></span></div>
                        </div>
                    </div>
                    <div class="form-group"><label class="text-muted" for="user_phone">กำหนดเบอร์โทรศัพท์</label>
                        <div class="input-group with-focus"><input class="form-control border-right-0"
                                                                   id="user_phone" type="text" name="user_phone"
                                                                   placeholder="เบอร์โทรศัพท์" autocomplete="off"
                                                                   required>
                            <div class="input-group-append"><span
                                        class="input-group-text text-muted bg-transparent border-left-0"><em
                                            class="fa fa-phone"></em></span></div>
                        </div>
                    </div>
                    <div class="form-group"><label class="text-muted" for="work_name">กำหนดชื่อร้านฝากรถ</label>
                        <div class="input-group with-focus"><input class="form-control border-right-0"
                                                                   id="work_name" type="text" name="work_name"
                                                                   placeholder="ชื่อร้านฝากรถ" autocomplete="off"
                                                                   required>
                            <div class="input-group-append"><span
                                        class="input-group-text text-muted bg-transparent border-left-0"><em
                                            class="fa fa-sign"></em></span></div>
                        </div>
                    </div>

                    <button class="btn btn-block btn-primary mt-3" type="submit">ลงทะเบียน</button>
                </form>
                <p class="pt-3 text-center">ลงทะเบียนแล้ว?</p><a class="btn btn-block btn-secondary"
                                                                 href="index.php?module=login&action=login">เข้าสู่ระบบ</a>
            </div>
        </div><!-- END card-->
        <!--        <div class="p-3 text-center"><span class="mr-2">&copy;</span><span>2019</span><span class="mr-2">-</span><span>Angle</span><br><span>Bootstrap Admin Template</span>-->
        <!--        </div>-->
    </div>
</div>