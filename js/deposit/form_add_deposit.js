$(document).ready(function () {
    //$('.dropify').dropify();

    $('.dropify').dropify({
        messages: {
            'default': 'ลากและวาง หรือกดเพื่อเพิ่มไฟล์',
            'replace': 'ลากและวาง หรือกดเพื่อเพิ่มไฟล์',
            'remove':  'นำไฟล์ออก',
            'error':   'เกิดข้อผิดพลาด !'
        }
    });
    
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

});