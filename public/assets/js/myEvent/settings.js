$("body").on("click", ".deleteAccount", function() {
    $("#removeAccount").val($(this).data("value"));
});
