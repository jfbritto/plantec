$(document).ready(function () {

    // CARREGAR DADOS NA TELA
    loadAll();

    // LISTAR DADOS DO CLIENTE
    function loadClient()
    {
        Swal.queue([
            {
                title: "Carregando...",
                allowOutsideClick: false,
                allowEscapeKey: false,
                onOpen: () => {
                    Swal.showLoading();
                    $.get(window.location.origin + "/clientes/encontrar", {
                        id:$("#id_usr").val()
                    })
                        .then(function (data) {
                            if (data.status == "success") {

                                Swal.close();

                                if(data.data.length > 0){

                                    let item = data.data[0];
                                    $(".name_user").html(item.name);

                                    // CARREGAR INFORMAÇÕES NA TELA
                                    $("#name").html(item.name);
                                    $("#email").html(item.email);
                                    $("#birth").html(dateFormat(item.birth));
                                    $("#cpf").html(item.cpf);
                                    $("#rg").html(item.rg);
                                    $("#civil_status").html(item.civil_status);
                                    $("#profession").html(item.profession);
                                    $("#zip_code").html(item.zip_code);
                                    $("#address").html(`${item.address} ${item.address_number}, ${item.complement}. ${item.neighborhood}, ${item.city} - ${item.uf}`);

                                    // CARREGAR INFORMAÇÕES NO MODAL
                                    $("#name_edit").val(item.name);
                                    $("#email_edit").val(item.email);
                                    $("#birth_edit").val(item.birth);
                                    $("#cpf_edit").val(item.cpf);
                                    $("#rg_edit").val(item.rg);
                                    $("#civil_status_edit").val(item.civil_status).change();
                                    $("#profession_edit").val(item.profession);
                                    $("#zip_code_edit").val(item.zip_code);
                                    $("#uf_edit").val(item.uf);
                                    $("#city_edit").val(item.city);
                                    $("#neighborhood_edit").val(item.neighborhood);
                                    $("#address_edit").val(item.address);
                                    $("#address_number_edit").val(item.address_number);
                                    $("#complement_edit").val(item.complement);
                                    $("#start_date_edit").val(item.start_date);
                                    $("#health_plan_edit").val(item.health_plan);
                                    $("#how_met_edit").val(item.how_met).change();

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

    // LISTAR TELEFONES
    function loadPhones()
    {
        Swal.queue([
            {
                title: "Carregando...",
                allowOutsideClick: false,
                allowEscapeKey: false,
                onOpen: () => {
                    Swal.showLoading();
                    $.get(window.location.origin + "/telefones/listar", {
                        id_user:$("#id_usr").val()
                    })
                        .then(function (data) {
                            if (data.status == "success") {

                                Swal.close();

                                $("#box-phones-registered").html(``);
                                $("#box-phones").html(``);

                                if(data.data.length > 0){

                                    data.data.forEach(item => { 
                                        $("#box-phones-registered").append(`
                                            <div class="col-sm-3">
                                                <div class="alert alert-light">
                                                    <span data-type="phone">${item.number}</span>
                                                </div>
                                            </div>
                                        `);

                                        let random = Math.floor(Math.random() * 100000);
    
                                        $("#box-phones").append(`
                                            <div class="col-sm-3 random${random}">
                                                <div class="alert alert-light">
                                                    <span class="phone_add" data-type="phone">${item.number}</span>
                                                    <button type="button" class="close close-alert" data-class_alert="random${random}" >
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            </div>
                                        `);

                                    });


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

    // LISTAR VENDAS
    function loadSales()
    {
        Swal.queue([
            {
                title: "Carregando...",
                allowOutsideClick: false,
                allowEscapeKey: false,
                onOpen: () => {
                    Swal.showLoading();
                    $.get(window.location.origin + "/vendas/listar-por-cliente", {
                        id_client:$("#id_usr").val()
                    })
                        .then(function (data) {
                            if (data.status == "success") {

                                Swal.close();
                                $("#list-sales").html(``);

                                if(data.data.length > 0){
                                    
                                    data.data.forEach(item => {

                                        $("#list-sales").append(`
                                            <tr>
                                                <td class="align-middle">${item.specie_name}</td>
                                                <td class="align-middle">${item.quantity}</td>
                                                <td class="align-middle">R$ ${moneyFormat(item.price)}</td>
                                                <td class="align-middle" style="text-align: right">
                                                    <a title="Deletar" data-id="${item.id}" data-id_plantation="${item.id_plantation}" href="#" class="btn btn-danger delete-sale"><i class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        `);       
                                    });

                                }else{

                                    $("#list-sales").append(`
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

    
    // EDITAR CLIENTE
    $("#formEditClient").submit(function (e) {
        e.preventDefault();

        let phones = $(".phone_add");
        let phone_array = [];
        for (const key in phones) {
            if (Object.hasOwnProperty.call(phones, key)) {
                const element = $(phones[key]).data("type");
                if(element == "phone")
                    phone_array.push($(phones[key]).html())
            }
        }

        Swal.queue([
            {
                title: "Carregando...",
                allowOutsideClick: false,
                allowEscapeKey: false,
                onOpen: () => {
                    Swal.showLoading();
                    $.ajax({
                        url: window.location.origin + "/clientes/editar",
                        type: 'PUT',
                        data: {
                            id: $("#id_usr").val(),
                            name: $("#name_edit").val(),
                            email: $("#email_edit").val(),
                            birth: $("#birth_edit").val(),
                            cpf: $("#cpf_edit").val(),
                            rg: $("#rg_edit").val(),
                            civil_status: $("#civil_status_edit option:selected").val(),
                            profession: $("#profession_edit").val(),
                            zip_code: $("#zip_code_edit").val(),
                            uf: $("#uf_edit").val(),
                            city: $("#city_edit").val(),
                            neighborhood: $("#neighborhood_edit").val(),
                            address: $("#address_edit").val(),
                            address_number: $("#address_number_edit").val(),
                            complement: $("#complement_edit").val(),
                            phones:phone_array
                        }
                    })
                        .then(function (data) {
                            if (data.status == "success") {

                                $("#formEditClient").each(function () {
                                    this.reset();
                                });
                                
                                $("#modalEditClient").modal("hide");

                                showSuccess("Editado com sucesso!", null, loadAll)
                            } else if (data.status == "error") {
                                showError(data.message)
                            }
                        })
                        .catch();
                },
            },
        ]);
    });


    // "DELETAR" CLIENTE
    $("#delete-client").on("click", function(){
        
        let id = $("#id_usr").val();

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
                                    url: window.location.origin + "/clientes/deletar",
                                    type: 'DELETE',
                                    data: {id}
                                })
                                    .then(function (data) {
                                        if (data.status == "success") {
                                                        
                                            showSuccess("Deletado com sucesso!", null, redirect)
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

    // REDIRECIONAR APÓS DELETAR
    function redirect()
    {
        window.location.replace("/clientes");
    }

    // ADICIONAR TELEFONE
    $("#btn-add-phone").on("click", function(){

        let number = $("#phone_number").val();
        let random = Math.floor(Math.random() * 100000);

        $("#box-phones").append(`
            <div class="col-sm-3 random${random}">
                <div class="alert alert-light">
                    <span class="phone_add" data-type="phone">${number}</span>
                    <button type="button" class="close close-alert" data-class_alert="random${random}" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        `);

        $("#modalAddPhone").modal("hide");
        $("#phone_number").val("");

    });

    $("#box-phones").on("click", ".close-alert", function(){
        let class_alert = $(this).data("class_alert");
        $(`.${class_alert}`).remove()
    });


    // CARREGAR DADOS NA TELA
    function loadAll()
    {
        // listar dados do aluno
        loadClient();
        // listar telefones
        loadPhones();
        // listar vendas
        loadSales();
    }

});