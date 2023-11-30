$(document).ready(function () {
    // Client
    $(".detail_content_img img").addClass('img-fluid');
    $(".detail_content_img img").css('height','auto');
    // Admin
    $("#table_category").on('click', '#button_modal', function (e) {
        e.preventDefault();
        var id = $(this).val();
        var parent_id = $("#table_category #parent_id").val(id);
        console.log(parent_id);
    });
});
