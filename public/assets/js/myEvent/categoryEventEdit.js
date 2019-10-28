$("body").on("click", ".edit", function() {
    let name = $(this).text();
    let id = $(this).data("value");
    let active = $(this).data("active");
    if (active == 1) {
        $("#editActive").prop("checked", true);
    }
    $("#editName").val(name.trim());

    $("#editForm").attr("action", "/event/category/" + id);
});
