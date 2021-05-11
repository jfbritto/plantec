$(document).ready(function () {

    loadSales();

    // LISTAR ESPÉCIES
    function loadSales()
    {
        Swal.queue([
            {
                title: "Carregando...",
                allowOutsideClick: false,
                allowEscapeKey: false,
                onOpen: () => {
                    Swal.showLoading();
                    $.get(window.location.origin + "/vendas/listar", {
                        
                    })
                        .then(function (data) {
                            if (data.status == "success") {

                                Swal.close();
                                $("#list").html(``);

                                if(data.data.length > 0){
                                    
                                    data.data.forEach(item => {

                                        // <a title="Informações" data-id="${item.id}" data-description="${item.description}" href="#" class="btn btn-info info-sale"><i class="fas fa-info-circle"></i></a>

                                        $("#list").append(`
                                            <tr>
                                                <td class="align-middle">${item.client_name}</td>
                                                <td class="align-middle">${item.specie_name}</td>
                                                <td class="align-middle">${item.quantity}</td>
                                                <td class="align-middle">R$ ${moneyFormat(item.price)}</td>
                                                <td class="align-middle">${item.description}</td>
                                                <td class="align-middle">${item.status=='A'?`<span class="badge badge-warning">Pendente</span>`:`<span class="badge badge-success">Efetuado</span>`}</td>
                                                <td class="align-middle" style="text-align: right">
                                                    ${item.status=='A'?`<a title="Informar pagamento" data-id="${item.id}" href="#" class="btn btn-success pay-sale"><i class="fas fa-comment-dollar"></i></a>`:''}
                                                    <a title="Deletar" data-id="${item.id}" href="#" class="btn btn-danger delete-sale"><i class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        `);       
                                    });

                                }else{

                                    $("#list").append(`
                                        <tr>
                                            <td class="align-middle text-center" colspan="6">Nenhuma venda cadastrada</td>
                                        </tr>
                                    `);  
                                }

                            } else if (data.status == "error") {
                                showError(data.message)
                            }
                        })
                        .catch();
                },
            },
        ]);
    }


    // "DELETAR" VENDA
    $("#list").on("click", ".delete-sale", function(){
        
        let id = $(this).data('id');

        Swal.fire({
            title: 'Atenção!',
            text: "Deseja realmente deletar?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Sim',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Não'
            }).then((result) => {
                if (result.value) {

                    Swal.queue([
                        {
                            title: "Carregando...",
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            onOpen: () => {
                                Swal.showLoading();
                                $.ajax({
                                    url: window.location.origin + "/vendas/deletar",
                                    type: 'DELETE',
                                    data: {id}
                                })
                                    .then(function (data) {
                                        if (data.status == "success") {
                                                        
                                            showSuccess("Deletada com sucesso!", null, loadSales)
                                        } else if (data.status == "error") {
                                            showError(data.message)
                                        }
                                    })
                                    .catch();
                            },
                        },
                    ]);

                }
            })

    });

    // RECEBER VENDA
    $("#list").on("click", ".pay-sale", function(){
        
        let id = $(this).data('id');

        Swal.fire({
            title: 'Atenção!',
            text: "Confirma que o valor foi recebido?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Sim',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Não'
            }).then((result) => {
                if (result.value) {

                    Swal.queue([
                        {
                            title: "Carregando...",
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            onOpen: () => {
                                Swal.showLoading();
                                $.ajax({
                                    url: window.location.origin + "/vendas/receber",
                                    type: 'PUT',
                                    data: {id}
                                })
                                    .then(function (data) {
                                        if (data.status == "success") {
                                                        
                                            showSuccess("Recebimento efetuado com sucesso!", null, loadSales)
                                        } else if (data.status == "error") {
                                            showError(data.message)
                                        }
                                    })
                                    .catch();
                            },
                        },
                    ]);

                }
            })

    });

    // INFORMAÇÕES DA VENDA
    $("#list").on("click", ".info-sale", function(){
        
        let id = $(this).data('id');
        let description = $(this).data('description');

        $("#description").val(description)

        $("#modalInfo").modal("show")

    });
    

});