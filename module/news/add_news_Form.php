<div class="wrapper">
    <div class="block-center mt-4 wd-xl">
        <!-- START card-->
        <div class="card card-flat">
            <div class="card-header text-center bg-dark"><a href="#"><img class="block-center" src="img/logo.png"
                                                                          alt="Image"></a></div>
            <div class="card-body">
                <p class="text-center py-2">เพิ่มข้อมูลประชาสัมพันธ์</p>
                <form class="mb-3" id="registerForm" action="<?php MALink("news","add_news") ?>" method="post" >

                    <div class="form-group"><label class="text-muted" for="news_head">ระบุหัวข้อประชาสัมพันธ์</label>
                        <div class="input-group with-focus">
                            <input class="form-control border-right-0" type="text" name="news_head"
                                                                   placeholder="หัวข้อประชาสัมพันธ์" autocomplete="off"
                                                                   required>
                            <div class="input-group-append"><span
                                        class="input-group-text text-muted bg-transparent border-left-0"><em
                                            class="fa fa-user"></em></span></div>
                        </div>
                    </div>



                    <button class="btn btn-block btn-primary mt-3" type="submit">เพิ่มข้อมูล</button>
                </form>

            </div>
        </div><!-- END card-->
        <!--        <div class="p-3 text-center"><span class="mr-2">&copy;</span><span>2019</span><span class="mr-2">-</span><span>Angle</span><br><span>Bootstrap Admin Template</span>-->
        <!--        </div>-->
    </div>
</div>