$(document).ready(function () {
    $('.dropify').dropify();

    $("#btnS").click(function () {
        $("#detail_form").toggle();
    });
    function show_pickup_date() {
        var checkBox = document.getElementById("wash");
        var text = document.getElementById("pickup_date");
        if (checkBox.checked == true){
            text.style.display = "block";
        } else {
            text.style.display = "none";
        }
    }
    var result= $("#result").data("id");
    console.log(result);
    if(result == 0){

        swal({
            title: 'ไม่พบข้อมูล!',
            text: 'กรุณาตรวจสอบข้อมูลที่ค้นหาใหม่',
            icon: 'error'
        }).then(function() {
            window.location.href='index.php?module=deposit&action=search_deposit';
        });
    }
});