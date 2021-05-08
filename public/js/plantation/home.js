$(document).ready(function () {

    loadPlantations();
    loadSpecie();

    // LISTAR PLANTÉIS
    function loadPlantations()
    {
        Swal.queue([
            {
                title: "Carregando...",
                allowOutsideClick: false,
                allowEscapeKey: false,
                onOpen: () => {
                    Swal.showLoading();
                    $.get(window.location.origin + "/planteis/listar", {
                        
                    })
                        .then(function (data) {
                            if (data.status == "success") {

                                Swal.close();
                                $("#list").html(``);

                                if(data.data.length > 0){
                                    
                                    data.data.forEach(item => {

                                        $("#list").append(`
                                            <tr>
                                                <td class="align-middle">${item.specie_name}</td>
                                                <td class="align-middle">${item.quantity}</td>
                                                <td class="align-middle">${dateFormat(item.start_time)}</td>
                                                <td class="align-middle">${dateFormat(item.end_time)}</td>
                                                <td class="align-middle">${item.description}</td>
                                                <td class="align-middle" style="text-align: right">
                                                    <a title="Editar" data-id="${item.id}" data-id_specie="${item.id_specie}" data-quantity="${item.quantity}" data-start_time="${item.start_time}" data-end_time="${item.end_time}" data-status="${item.status}" data-description="${item.description}"  href="#" class="btn btn-warning edit-plantation"><i style="color: white" class="fas fa-edit"></i></a>
                                                    <a title="Deletar" data-id="${item.id}" href="#" class="btn btn-danger delete-plantation"><i class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        `);       
                                    });

                                }else{

                                    $("#list").append(`
                                        <tr>
                                            <td class="align-middle text-center" colspan="6">Nenhum plantel cadastrado</td>
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

    // LISTAR ESPÉCIES
    function loadSpecie()
    {
        Swal.queue([
            {
                title: "Carregando...",
                allowOutsideClick: false,
                allowEscapeKey: false,
                onOpen: () => {
                    Swal.showLoading();
                    $.get(window.location.origin + "/especies/listar", {
                        
                    })
                        .then(function (data) {
                            if (data.status == "success") {

                                Swal.close();

                                $("#id_specie").html(``);
                                $("#id_specie").html(`<option value="">-- Selecione --</option>`);

                                $("#id_specie_edit").html(``);
                                $("#id_specie_edit").html(`<option value="">-- Selecione --</option>`);

                                if(data.data.length > 0){

                                    data.data.forEach(item => { 
                                        $("#id_specie").append(`
                                            <option value="${item.id}">${item.name}</option>
                                        `)
                                        
                                        $("#id_specie_edit").append(`
                                            <option value="${item.id}">${item.name}</option>
                                        `)
                                    });

                                }

                                $("#id_specie").select2()
                                $("#id_specie_edit").select2()

                            } else if (data.status == "error") {
                                showError(data.message)
                            }
                        })
                        .catch();
                },
            },
        ]);
    }


    // CADASTRAR PLANTEL
    $("#formStorePlantation").submit(function (e) {
        e.preventDefault();

        Swal.queue([
            {
                title: "Carregando...",
                allowOutsideClick: false,
                allowEscapeKey: false,
                onOpen: () => {
                    Swal.showLoading();

                    $.post(window.location.origin + "/planteis/cadastrar", {
                        id_specie: $("#id_specie option:selected").val(),
                        quantity: $("#quantity").val(),
                        start_time: $("#start_time").val(),
                        end_time: $("#end_time").val(),
                        description: $("#description").val(),
                    })
                        .then(function (data) {
                            if (data.status == "success") {

                                $("#formStorePlantation").each(function () {
                                    this.reset();
                                });
                                
                                $("#modalStorePlantation").modal("hide");

                                showSuccess("Cadastro efetuado!", null, loadPlantations)
                            } else if (data.status == "error") {
                                showError(data.message)
                            }
                        })
                        .catch();

                },
            },
        ]);

    });


    // EDITAR ESPÉCIE
    $("#list").on("click", ".edit-plantation", function(){

        $("#id_edit").val($(this).data('id'));
        $("#id_specie_edit").val($(this).data('id_specie')).change();
        $("#quantity_edit").val($(this).data('quantity'));
        $("#start_time_edit").val($(this).data('start_time'));
        $("#end_time_edit").val($(this).data('end_time'));
        $("#description_edit").val($(this).data('description'));

        $("#modalEditPlantation").modal("show");
    });

    $("#formEditPlantation").submit(function (e) {
        e.preventDefault();

        Swal.queue([
            {
                title: "Carregando...",
                allowOutsideClick: false,
                allowEscapeKey: false,
                onOpen: () => {
                    Swal.showLoading();
                    $.ajax({
                        url: window.location.origin + "/planteis/editar", 
                        type: 'PUT',
                        data:{
                            id: $("#id_edit").val(),
                            id_specie: $("#id_specie_edit option:selected").val(),
                            quantity: $("#quantity_edit").val(),
                            start_time: $("#start_time_edit").val(),
                            end_time: $("#end_time_edit").val(),
                            description: $("#description_edit").val(),
                        }
                    })
                        .then(function (data) {
                            if (data.status == "success") {

                                $("#formEditPlantation").each(function () {
                                    this.reset();
                                });
                                
                                $("#modalEditPlantation").modal("hide");

                                showSuccess("Edição efetuada!", null, loadPlantations)
                            } else if (data.status == "error") {
                                showError(data.message)
                            }
                        })
                        .catch();
                },
            },
        ]);
    });


    // "DELETAR" PLANTÉL
    $("#list").on("click", ".delete-plantation", function(){
        
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
                                    url: window.location.origin + "/planteis/deletar",
                                    type: 'DELETE',
                                    data: {id}
                                })
                                    .then(function (data) {
                                        if (data.status == "success") {
                                                        
                                            showSuccess("Deletado com sucesso!", null, loadPlantations)
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
    

});