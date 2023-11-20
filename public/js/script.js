

// Client

// Admin
$(document).ready(function () {
    $("#table_category").on('click', '#button_modal', function (e) {
        e.preventDefault();
        var id = $(this).val();
        var parent_id = $("#table_category #parent_id").val(id);
        console.log(parent_id);
    });
});
