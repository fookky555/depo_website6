$(document).ready(function(){

    $('#data-table-show-work-payment').DataTable({
    });


    function showImage() {
        var image = new Image();
        image.src = $('#image_name').attr('src');

        var w = window.open("",'_blank');
        w.document.write(image.outerHTML);
        w.document.close();
        //
        //     $('#myModal').style.display = "block";
        //     $('#myModal').src = $('#image_name').data('id');
        //     $('#myModal').modal('show');
        //
        //     var span = document.getElementsByClassName("close")[0];
        //     // When the user clicks on <span> (x), close the modal
        //     span.onclick = function () {
        //         modal.style.display = "none";
        //     }
        // }
    }
});