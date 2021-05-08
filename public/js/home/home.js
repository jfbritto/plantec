$(document).ready(function () {

    loadAll();

    // LISTAR PLANOS
    function loadAll()
    {

        $.get(window.location.origin + "/home/all", {
            
        })
            .then(function (data) {
                if (data.status == "success") {

                    $("#tot-clients").html(data.data.clients);

                } else if (data.status == "error") {
                    showError(data.message)
                }
            })
            .catch();

    }

    $(".link-clients").on("click", function(){
        window.location.href = "/clientes";
    })


});