$("body").on("click", ".deleteProvider", function() {
    $("#removeProvider").val($(this).data("value"));
});

$("body").on("click", ".edit", function() {
    let id = $(this).data("value");
    let price = $(this).data("price");
    let paid = $(this).data("paid");
    let event = $(this).data("event");

    console.log(id, price, paid);
    if (paid == 1) {
        $("#editPaid").prop("checked", true);
    }

    $("#editValue").val(price);
    $("#editForm").attr("action", "/event/" + event + "/provider/" + id);
});
