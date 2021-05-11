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
                    $("#tot-species").html(data.data.species);
                    $("#tot-plantations").html(data.data.plantations);
                    $("#tot-sales").html(data.data.sales);

                } else if (data.status == "error") {
                    showError(data.message)
                }
            })
            .catch();

    }

    $(".link-clients").on("click", function(){
        window.location.href = "/clientes";
    })

    $(".link-species").on("click", function(){
        window.location.href = "/especies";
    })

    $(".link-plantations").on("click", function(){
        window.location.href = "/planteis";
    })

    $(".link-sales").on("click", function(){
        window.location.href = "/vendas";
    })


});