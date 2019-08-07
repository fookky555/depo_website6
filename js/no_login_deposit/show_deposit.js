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

});