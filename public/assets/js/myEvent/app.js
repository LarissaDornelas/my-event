$(document).ready(function() {
    $("#orderTable").DataTable({
        bLengthChange: false,
        searching: false,

        language: {
            lengthMenu: "Mostrar _MENU_ itens por página",
            zeroRecords: "Não encontrado",
            info: "Mostrando página _PAGE_ de _PAGES_",
            infoEmpty: "Não há dados para visualizar",
            infoFiltered: "(filtrado de _MAX_ )",
            searching: "Pesquisar",

            paginate: {
                previous: "Anterior",
                next: "Próxima"
            }
        }
    });

    $("#alert")
        .fadeTo(2000, 500)
        .slideUp(500, function() {
            $("#alert").slideUp(500);
        });

    var buttons = document.getElementsByClassName("btn-card");

    Array.prototype.forEach.call(buttons, function(b) {
        b.addEventListener("click", createRipple);
    });

    function createRipple(e) {
        // alert('x');
        var circle = document.createElement("div");
        this.appendChild(circle);

        var d = Math.max(this.clientWidth, this.clientHeight);

        circle.style.width = circle.style.height = d + "px";

        var rect = this.getBoundingClientRect();
        circle.style.left = e.clientX - rect.left - d / 2 + "px";
        circle.style.top = e.clientY - rect.top - d / 2 + "px";
        circle.classList.add("ripple");

        setTimeout(function() {
            circle.remove();
        }, 500);
    }
});
