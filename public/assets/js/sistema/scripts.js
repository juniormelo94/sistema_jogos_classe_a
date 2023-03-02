$( document ).ready(function() {
    // Mascaras.
    $(".mask-celular").mask('(00) 00000-0000');
    $(".mask-cpf").mask('000.000.000-00');
    $(".mask-idade").mask('00');
    $(".mask-data").mask('00/00/0000' , { reverse : true});

    // Iniciar selectpicker
    $('select').selectpicker();

    var url = window.location.href.toLowerCase();
    if (url.includes("admindelegacao")) {
        // Criar tabela pessoas delegação.
        listarPessoasDelegacao();
        // Criar html com os times da delegação.
        listarTimesDelegacao();
    }
});

// Verificar input idade da pessoa
$('#adminFormPessoas input[name=idade]').on('input',function(e){
    // Se a idade for maior que 9 ou estiver vazio.
    if($(this).val() > 9 || $(this).val() == ''){ 
        // Abilitar select.   
        $('#adminFormPessoas #funcao').next().prop('disabled', false);
        // Selecionar valor.
        $('#adminFormPessoas #funcao').selectpicker('val', '');
    } else{
        // Desabilitar select. 
        $('#adminFormPessoas #funcao').next().prop('disabled', true);
        // Selecionar valor.
        $('#adminFormPessoas #funcao').selectpicker('val', 'Participante - Criança');
    }
});

// Verificar select esportes do time
$('#modalAdminFormTimes #esportes_id').change(function() {
    // Se a categoria for estiver vazio.
    if($(this).val() == ''){
        // Inserir quantidade maxima de pessoas.
        $('#modalAdminFormTimes #qtd_pessoas_min').val('');
        // Inserir quantidade mínima de pessoas.
        $('#modalAdminFormTimes #qtd_pessoas_max').val('');
        // Desabilitar select.     
        $('#modalAdminFormTimes #categorias_id').prop('disabled', true);
        // Atualizar select.
        $('#modalAdminFormTimes #categorias_id').selectpicker('refresh');
        // Selecionar valor.
        $('#modalAdminFormTimes #categorias_id').selectpicker('val', '');
        // Remover todos os select pessoas_id.
        $('#modalAdminFormTimes .form-row .form-group-pessoas').remove();
    } else{
        // Url requisição.
        var url_ajax = '../getcategorias/'+ $(this).val();
        // Método requisição.
        var method_ajax = 'GET';
        // Requisição ajax padrão.
        var requisicaoAjaxPadrao = requestAjaxDefault(url_ajax, method_ajax);

        requisicaoAjaxPadrao
        .done(function(response){//Feito
            // Remover todos options no select categorias_id.
            $('#modalAdminFormTimes #categorias_id').children().remove();
            // Remover todos os select pessoas_id.
            $('#modalAdminFormTimes .form-row .form-group-pessoas').remove();
            // Inserir options no select categorias_id.
            $.each(response.data, function (id, categoria) {
                $('#modalAdminFormTimes #categorias_id').prepend($('<option>', { 
                    value: id,
                    text : categoria 
                }));
            });
            $('#modalAdminFormTimes #categorias_id').prepend($('<option>', { 
                value: '',
                text : 'CATEGORIA' 
            }));
            // Inserir quantidade maxima de pessoas.
            var qtd_pessoas_min = $('#modalAdminFormTimes #esportes_id option:selected').attr('data-qtd-min');
            $('#modalAdminFormTimes #qtd_pessoas_min').val(qtd_pessoas_min);
            // Inserir quantidade mínima de pessoas.
            var qtd_pessoas_max = $('#modalAdminFormTimes #esportes_id option:selected').attr('data-qtd-max');
            $('#modalAdminFormTimes #qtd_pessoas_max').val(qtd_pessoas_max);
            // Abilitar select. 
            $('#modalAdminFormTimes #categorias_id').prop('disabled', false);
            // Atualizar select.
            $('#modalAdminFormTimes #categorias_id').selectpicker('refresh');
            // Selecionar valor.
            $('#modalAdminFormTimes #categorias_id').selectpicker('val', '');
        })
        .fail(function (jqXHR, textStatus) {
            // Exibir modal de alerta erro.
            showModalAlertError({
                title: 'Ops',
                message: 'Tivemos um problema inesperado, tente novamente mais tarde!',
                buttons: {
                    ok: { active: true },
                    sim_nao: {
                        active: false,
                        onclick_btn_sim: "",
                    },
                },
            });
        });
    }
});

// Verificar select categorias do time
$('#modalAdminFormTimes #categorias_id').change(function() {
    // Verifique a categoria.
    var categoria = $('#modalAdminFormTimes #categorias_id option:selected').text();
    // Se a categoria for estiver vazio.
    if(categoria == 'CATEGORIA'){
        // Remover todos os select pessoas_id.
        $('#modalAdminFormTimes .form-row .form-group-pessoas').remove();
    } else{
        // Url requisição.
        var url_ajax = '../getpessoas/'+ categoria;
        // Método requisição.
        var method_ajax = 'GET';
        // Requisição ajax padrão.
        var requisicaoAjaxPadrao = requestAjaxDefault(url_ajax, method_ajax);

        requisicaoAjaxPadrao
        .done(function(response){//Feito
            // Remover todos os select pessoas_id.
            $('#modalAdminFormTimes .form-row .form-group-pessoas').remove();
            // Verificar quantidade maxima de pessoas.
            var qtd_pessoas_max = $('#modalAdminFormTimes #esportes_id option:selected').attr('data-qtd-max');

            for (var i = 1; i <= qtd_pessoas_max; i++) {
                // Criar select pessoas_id.
                $('#modalAdminFormTimes .form-row').append(
                    "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group form-group-pessoas'>"+
                      "<select name='pessoas_id[]' id='select-pessoas-"+ i +"' class='form-control selectpicker select-pessoas'>"+
                        "<option value=''>"+ i +"º ATLETA</option>"+
                      "</select>"+
                    "</div>"
                );

                // Inserir options no select categorias_id.
                $.each(response.data, function (id, data) {
                    $('#modalAdminFormTimes #select-pessoas-'+ i).append($('<option>', { 
                        value: data.id,
                        text : data.nome+' '+data.sobrenome
                    }));
                });

                // Atualizar select.
                $('#modalAdminFormTimes #select-pessoas-'+ i).selectpicker('refresh');
            }
        })
        .fail(function (jqXHR, textStatus) {
            // Exibir modal de alerta erro.
            showModalAlertError({
                title: 'Ops',
                message: 'Tivemos um problema inesperado, tente novamente mais tarde!',
                buttons: {
                    ok: { active: true },
                    sim_nao: {
                        active: false,
                        onclick_btn_sim: "",
                    },
                },
            });
        });
    }
});

// Verificar select esportes do jogo
$('#buscar-jogos #esportes').change(function() {
    // Se a categoria for estiver vazio.
    if($(this).val() == ''){
        // Desabilitar select.     
        $('#buscar-jogos #categorias').prop('disabled', true);
        // Atualizar select.
        $('#buscar-jogos #categorias').selectpicker('refresh');
        // Selecionar valor.
        $('#buscar-jogos #categorias').selectpicker('val', '');
        // Desabilitar botão.     
        $('#buscar-jogos #btnBuscarJogos').prop('disabled', true);
        $('#btnModalAdminFormJogos').addClass('d-none');
        // Remover todos os cards.
        $('#cards-jogos').html('');
    } else{
        // Url requisição.
        var url_ajax = '../getcategorias/'+ $(this).val();
        // Método requisição.
        var method_ajax = 'GET';
        // Requisição ajax padrão.
        var requisicaoAjaxPadrao = requestAjaxDefault(url_ajax, method_ajax);

        requisicaoAjaxPadrao
        .done(function(response){//Feito
            // Remover todos options no select categorias_id.
            $('#buscar-jogos #categorias').children().remove();
            // Remover todos os select pessoas_id.
            // $('#modalAdminFormTimes .form-row .form-group-pessoas').remove();
            // Inserir options no select categorias_id.
            $.each(response.data, function (id, categoria) {
                $('#buscar-jogos #categorias').prepend($('<option>', { 
                    value: id,
                    text : categoria 
                }));
            });
            $('#buscar-jogos #categorias').prepend($('<option>', { 
                value: '',
                text : 'CATEGORIA' 
            }));
            // Abilitar select. 
            $('#buscar-jogos #categorias').prop('disabled', false);
            // Atualizar select.
            $('#buscar-jogos #categorias').selectpicker('refresh');
            // Selecionar valor.
            $('#buscar-jogos #categorias').selectpicker('val', '');
        })
        .fail(function (jqXHR, textStatus) {
            // Exibir modal de alerta erro.
            showModalAlertError({
                title: 'Ops',
                message: 'Tivemos um problema inesperado, tente novamente mais tarde!',
                buttons: {
                    ok: { active: true },
                    sim_nao: {
                        active: false,
                        onclick_btn_sim: "",
                    },
                },
            });
        });
    }
});

// Verificar select categorias do jogo
$('#buscar-jogos #categorias').change(function() {
    // Verifique a categoria.
    var categoria = $('#buscar-jogos #categorias option:selected').text();
    // Se a categoria for estiver vazio.
    if(categoria == 'CATEGORIA'){
        // Desabilitar botões.     
        $('#buscar-jogos #btnBuscarJogos').prop('disabled', true);
        $('#btnModalAdminFormJogos').addClass('d-none');
        // Remover todos os cards.
        $('#cards-jogos').html('');
    } else{
        // Abilitar botão.     
        $('#buscar-jogos #btnBuscarJogos').prop('disabled', false);
        $('#btnModalAdminFormJogos').addClass('d-none');
        // Remover todos os cards.
        $('#cards-jogos').html('');
    }
});

// Buscar os times por categoria.
$('#btnBuscarJogos').click(function() {
    // Verifique a categoria.
    var categoria = $('#buscar-jogos #categorias option:selected').val();
    // Se a categoria for estiver vazio.
    if(categoria == 'CATEGORIA'){
        // Remover todos os cards.
        $('#cards-jogos').html('');
        // Inserir valor no categorias_id.
        $('#modalAdminFormJogos #categorias_id').val('');
        // Remover todos os options do select.
        $('#modalAdminFormJogos #fase option').remove();
        $('#modalAdminFormJogos #placar_1 option').remove();
        $('#modalAdminFormJogos #times_1 option').remove();
        $('#modalAdminFormJogos #placar_2 option').remove();
        $('#modalAdminFormJogos #times_2 option').remove();
    } else{
        // Criar cards jogos.
        listarJogosCategorias();
        // Url requisição.
        var url_ajax = '../buscarjogostimes/'+ categoria;
        // Método requisição.
        var method_ajax = 'GET';
        // Requisição ajax padrão.
        var requisicaoAjaxPadrao = requestAjaxDefault(url_ajax, method_ajax);

        requisicaoAjaxPadrao
        .done(function(response){//Feito
            // Remover todos os options do select.
            $('#modalAdminFormJogos #fase option').remove();
            $('#modalAdminFormJogos #placar_1 option').remove();
            $('#modalAdminFormJogos #times_1 option').remove();
            $('#modalAdminFormJogos #placar_2 option').remove();
            $('#modalAdminFormJogos #times_2 option').remove();
            // Inserir valor no categorias_id.
            $('#modalAdminFormJogos #categorias_id').val(categoria);

            // Inserir options no select placar_1.
            $.each(response.data.fases, function (value, text) {
                $('#modalAdminFormJogos #fase').append($('<option>', { 
                    value: value,
                    text : text
                }));
            });
            $('#modalAdminFormJogos #fase').prepend($('<option>', { 
                value: '',
                text : 'FASE' 
            }));

            // Inserir options no select placar_1.
            $.each(response.data.placares, function (value, text) {
                $('#modalAdminFormJogos #placar_1').append($('<option>', { 
                    value: value,
                    text : text
                }));
            });
            $('#modalAdminFormJogos #placar_1').prepend($('<option>', { 
                value: 'WO',
                text : 'WO' 
            }));
            $('#modalAdminFormJogos #placar_1').prepend($('<option>', { 
                value: '',
                text : 'PLACAR 1º TIME' 
            }));

            // Inserir options no select times_1.
            $.each(response.data.times, function (key, data) {
                $('#modalAdminFormJogos #times_1').append($('<option>', { 
                    value: data.id,
                    text : 'Time Nº'+ data.id
                }));
            });
            for (var i = 1; i <= 15; i++) {
                $('#modalAdminFormJogos #times_1').append($('<option>', { 
                    value: 'Vencedor '+ i +'º Jogo',
                    text : 'Vencedor '+ i +'º Jogo'
                }));
            }
            for (var i = 1; i <= 15; i++) {
                $('#modalAdminFormJogos #times_1').append($('<option>', { 
                    value: 'Perdedor '+ i +'º Jogo',
                    text : 'Perdedor '+ i +'º Jogo'
                }));
            }
            $('#modalAdminFormJogos #times_1').prepend($('<option>', { 
                value: 'WO',
                text : 'WO' 
            }));
            $('#modalAdminFormJogos #times_1').prepend($('<option>', { 
                value: '',
                text : '1º TIME' 
            }));

            // Inserir options no select placar_2.
            $.each(response.data.placares, function (value, text) {
                $('#modalAdminFormJogos #placar_2').append($('<option>', { 
                    value: value,
                    text : text
                }));
            });
            $('#modalAdminFormJogos #placar_2').prepend($('<option>', { 
                value: 'WO',
                text : 'WO' 
            }));
            $('#modalAdminFormJogos #placar_2').prepend($('<option>', { 
                value: '',
                text : 'PLACAR 2º TIME' 
            }));

            // Inserir options no select times_2.
            $.each(response.data.times, function (key, data) {
                $('#modalAdminFormJogos #times_2').append($('<option>', { 
                    value: data.id,
                    text : 'Time Nº'+ data.id
                }));
            });
            for (var i = 1; i <= 15; i++) {
                $('#modalAdminFormJogos #times_2').append($('<option>', { 
                    value: 'Vencedor '+ i +'º Jogo',
                    text : 'Vencedor '+ i +'º Jogo'
                }));
            }
            for (var i = 1; i <= 15; i++) {
                $('#modalAdminFormJogos #times_2').append($('<option>', { 
                    value: 'Perdedor '+ i +'º Jogo',
                    text : 'Perdedor '+ i +'º Jogo'
                }));
            }
            $('#modalAdminFormJogos #times_2').prepend($('<option>', { 
                value: 'WO',
                text : 'WO' 
            }));
            $('#modalAdminFormJogos #times_2').prepend($('<option>', { 
                value: '',
                text : '2º TIME' 
            }));

            // Atualizar select.
            $('#modalAdminFormJogos #fase').selectpicker('refresh');
            $('#modalAdminFormJogos #placar_1').selectpicker('refresh');
            $('#modalAdminFormJogos #times_1').selectpicker('refresh');
            $('#modalAdminFormJogos #placar_2').selectpicker('refresh');
            $('#modalAdminFormJogos #times_2').selectpicker('refresh');
            // Selecionar valor.
            $('#modalAdminFormJogos #fase').selectpicker('val', '');
            $('#modalAdminFormJogos #placar_1').selectpicker('val', '');
            $('#modalAdminFormJogos #times_1').selectpicker('val', '');
            $('#modalAdminFormJogos #placar_2').selectpicker('val', '');
            $('#modalAdminFormJogos #times_2').selectpicker('val', '');
            // Abilitar botão. 
            $('#btnModalAdminFormJogos').removeClass('d-none');
        })
        .fail(function (jqXHR, textStatus) {
            // Exibir modal de alerta erro.
            showModalAlertError({
                title: 'Ops',
                message: 'Tivemos um problema inesperado, tente novamente mais tarde!',
                buttons: {
                    ok: { active: true },
                    sim_nao: {
                        active: false,
                        onclick_btn_sim: "",
                    },
                },
            });
        });
    }
});

// Acesso Admin
$("#adminFormAcesso").submit(function(event){
    //prevent default action 
    event.preventDefault();
    // Pegue a url do formulário.
    var url_form = $(this).attr("action");
    // Pegue o método do formulário.
    var method_form = $(this).attr("method");
    // Pegue os dados do formulário.
    var data_form = $(this).serialize();
    // Pegue o id do formulário.
    var id_form = $(this).attr('id');
    // Desabilitar botão de enviar formulário.
    $('#' + id_form + ' button[type="submit"]').prop('disabled', true);

    // Enviar dados do formulário via ajax.
    var enviarFormularioAjax = submitAjaxForm(this, url_form, method_form, data_form);

    enviarFormularioAjax
    .done(function(response){//Feito
        // Status sucesso.
        if (response.status == 'success') {
            // Ocultar modal formulário pessoas
            $('#adminFormAcesso').modal('hide');

            setTimeout(function(){ 
                // Contagem regressiva para redirecionar a página.
                var _start = {property: 6};
                var _end = {property: 0};
                $(_start).animate(_end, {
                    duration: 6000,
                    step: function() {
                        $('#modalAlertSuccess .modal-body p').html('Você será redirecionado em <b>' + parseInt(this.property) + ' segundos</b>');        
                    }
                });
            }, 7000);

            setTimeout(function(){ 
                // Redirecionar para tela de admin.
                $(location).attr('href', response.url_redirect);
            }, 12000);
        }

        // Status aviso.
        if (response.status == 'warning') {
            // Abilitar botão de enviar formulário.
            $('#' + id_form + ' button[type="submit"]').prop('disabled', false);
        }
    });
});

// Criar editar pessoa
$("#adminFormPessoas").submit(function(event){
    //prevent default action 
    event.preventDefault();
    // Pegue a url do formulário.
    var url_form = $(this).attr("action");
    // Pegue o método do formulário.
    var method_form = $(this).attr("method");
    // Pegue os dados do formulário.
    var data_form = $(this).serialize();
    // Pegue o id do formulário.
    var id_form = $(this).attr('id');
    // Desabilitar botão de enviar formulário.
    $('#' + id_form + ' button[type="submit"]').prop('disabled', true);

    // Enviar dados do formulário via ajax.
    var enviarFormularioAjax = submitAjaxForm(this, url_form, method_form, data_form);

    enviarFormularioAjax
    .done(function(response){//Feito
        // Ocultar modal formulário pessoas
        $('#modalAdminFormPessoas').modal('hide');
        // Criar tabela pessoas.
        listarPessoasDelegacao();

        setTimeout(function(){ 
            // Ocultar modal de alerta de aviso.
            $('#modalAlertSuccess').modal('hide');
            // Abilitar botão de enviar formulário.
            $('#' + id_form + ' button[type="submit"]').prop('disabled', false);
        }, 7000);
    });
});

// Criar editar times
$("#adminFormTimes").submit(function(event){
    //prevent default action 
    event.preventDefault();
    // Pegue a url do formulário.
    var url_form = $(this).attr("action");
    // Pegue o método do formulário.
    var method_form = $(this).attr("method");
    // Pegue os dados do formulário.
    var data_form = $(this).serialize();
    // Pegue o id do formulário.
    var id_form = $(this).attr('id');
    // Desabilitar botão de enviar formulário.
    $('#' + id_form + ' button[type="submit"]').prop('disabled', true);

    // Enviar dados do formulário via ajax.
    var enviarFormularioAjax = submitAjaxForm(this, url_form, method_form, data_form);

    enviarFormularioAjax
    .done(function(response){//Feito
        // Ocultar modal formulário pessoas
        $('#modalAdminFormTimes').modal('hide');
        // Criar html com os times da delegação.
        listarTimesDelegacao();

        setTimeout(function(){ 
            // Ocultar modal de alerta de aviso.
            $('#modalAlertSuccess').modal('hide');
            // Abilitar botão de enviar formulário.
            $('#' + id_form + ' button[type="submit"]').prop('disabled', false);
        }, 7000);
    });
});

// Criar editar jogos
$("#adminFormJogos").submit(function(event){
    //prevent default action 
    event.preventDefault();
    // Pegue a url do formulário.
    var url_form = $(this).attr("action");
    // Pegue o método do formulário.
    var method_form = $(this).attr("method");
    // Pegue os dados do formulário.
    var data_form = $(this).serialize();
    // Pegue o id do formulário.
    var id_form = $(this).attr('id');
    // Desabilitar botão de enviar formulário.
    $('#' + id_form + ' button[type="submit"]').prop('disabled', true);

    // Enviar dados do formulário via ajax.
    var enviarFormularioAjax = submitAjaxForm(this, url_form, method_form, data_form);

    enviarFormularioAjax
    .done(function(response){//Feito
        // Ocultar modal formulário jogos
        $('#modalAdminFormJogos').modal('hide');
        // Criar cards jogos.
        listarJogosCategorias();

        setTimeout(function(){ 
            // Ocultar modal de alerta de aviso.
            $('#modalAlertSuccess').modal('hide');
            // Abilitar botão de enviar formulário.
            $('#' + id_form + ' button[type="submit"]').prop('disabled', false);
        }, 7000);
    });
});

// Criar editar medalha time
$("#adminFormMedalha").submit(function(event){
    //prevent default action 
    event.preventDefault();
    // Pegue a url do formulário.
    var url_form = $(this).attr("action");
    // Pegue o método do formulário.
    var method_form = $(this).attr("method");
    // Pegue os dados do formulário.
    var data_form = $(this).serialize();
    // Pegue o id do formulário.
    var id_form = $(this).attr('id');
    // Desabilitar botão de enviar formulário.
    $('#' + id_form + ' button[type="submit"]').prop('disabled', true);

    // Enviar dados do formulário via ajax.
    var enviarFormularioAjax = submitAjaxForm(this, url_form, method_form, data_form);

    enviarFormularioAjax
    .done(function(response){//Feito
        // Ocultar modal formulário pessoas
        $('#modalAdminFormMedalha').modal('hide');

        setTimeout(function(){ 
            // Ocultar modal de alerta de aviso.
            $('#modalAlertSuccess').modal('hide');
            // Abilitar botão de enviar formulário.
            $('#' + id_form + ' button[type="submit"]').prop('disabled', false);
        }, 7000);
    });
});

// Exibir modal formulário pessoas
function showModalFormPessoas() {
    // Inserir valor do id da pessoa.
    $('#adminFormPessoas #id').val('');
    // Remover valores dos campos.
    $('#adminFormPessoas input[name=nome_completo]').val('');
    $('#adminFormPessoas input[name=nome]').val('');
    $('#adminFormPessoas input[name=sobrenome]').val('');
    $('#adminFormPessoas input[name=cpf]').val('');
    $('#adminFormPessoas input[name=data_nasc]').val('');
    $('#adminFormPessoas #sexo').selectpicker('val', '');
    $('#adminFormPessoas input[name=celular]').val('');
    $('#adminFormPessoas input[name=email]').val('');
    $('#adminFormPessoas input[name=idade]').val('');
    $('#adminFormPessoas #funcao').selectpicker('val', '');
    $('#adminFormPessoas #delegacoes_id').selectpicker('val', '');
    $('#adminFormPessoas #status').selectpicker('val', '');

    // Exibir modal formulário pessoas.
    $('#modalAdminFormPessoas').modal('show');
}

// Editar pessoa
function editarPessoa(id) {
    // Inserir valor do id da pessoa.
    $('#adminFormPessoas #id').val(id);
    // Url requisição.
    var url_ajax = '../visualizarpessoa/'+ id;
    // Método requisição.
    var method_ajax = 'GET';
    // Requisição ajax padrão.
    var requisicaoAjaxPadrao = requestAjaxDefault(url_ajax, method_ajax);

    requisicaoAjaxPadrao
    .done(function(response){//Feito
        // Inserir valores nos campos.
        $('#adminFormPessoas input[name=nome_completo]').val(response.data.nome_completo);
        $('#adminFormPessoas input[name=nome]').val(response.data.nome);
        $('#adminFormPessoas input[name=sobrenome]').val(response.data.sobrenome);
        $('#adminFormPessoas input[name=cpf]').val(response.data.cpf);
        $('#adminFormPessoas input[name=data_nasc]').val(response.data.data_nasc);
        $('#adminFormPessoas #sexo').selectpicker('val', response.data.sexo);
        $('#adminFormPessoas input[name=celular]').val(response.data.celular);
        $('#adminFormPessoas input[name=email]').val(response.data.email);
        $('#adminFormPessoas input[name=idade]').val(response.data.idade);
        $('#adminFormPessoas #funcao').selectpicker('val', response.data.funcao);
        $('#adminFormPessoas #delegacoes_id').selectpicker('val', response.data.delegacoes_id);
        $('#adminFormPessoas #status').selectpicker('val', response.data.status);

        // Exibir modal formulário pessoas.
        $('#modalAdminFormPessoas').modal('show');
    })
    .fail(function (jqXHR, textStatus) {
        // Exibir modal de alerta erro.
        showModalAlertError({
            title: 'Ops',
            message: jqXHR.responseJSON.message,
            buttons: {
                ok: { active: true },
                sim_nao: {
                    active: false,
                    onclick_btn_sim: "",
                },
            },
        });
    });
}

// Aviso deletar pessoa
function avisoDeletarPessoa(id) {          
    // Exibir modal de alerta aviso.
    showModalAlertWarning({
        title: 'Aviso',
        message: 'Tem certeza que deseja deletar esse participante e todos os dados referentes a ele',
        buttons: {
            ok: { active: false },
            sim_nao: {
                active: true,
                onclick_btn_sim: "deletarPessoa("+ id +");",
            },
        },
    });          
}

// Deletar pessoa
function deletarPessoa(id) {
    // Desabilitar botão sim da modal aviso.
    $('#btn-sim').prop('disabled', true);
    // Ocultar modal de alerta de aviso.
    $('#modalAlertWarning').modal('hide');
    // Exibir modal barra de progressão.
    showModalProgressBar();

    // Url requisição.
    var url_ajax = '../deletarpessoa/'+ id;
    // Método requisição.
    var method_ajax = 'GET';
    // Requisição ajax padrão.
    var requisicaoAjaxPadrao = requestAjaxDefault(url_ajax, method_ajax);

    requisicaoAjaxPadrao
    .done(function(response){//Feito
        // Criar tabela pessoas.
        listarPessoasDelegacao();

        setTimeout(function(){ 
            // Exibir modal de alerta sucesso.
            showModalAlertSuccess({
                title: response.title,
                message: response.message,
                buttons: {
                    ok: { active: false },
                    sim_nao: {
                        active: false,
                        onclick_btn_sim: "",
                    },
                },
            });
        }, 1600);

        setTimeout(function(){ 
            // Ocultar modal de alerta de sucesso.
            $('#modalAlertSuccess').modal('hide');
        }, 7000);
    })
    .fail(function (jqXHR, textStatus) {
        setTimeout(function(){ 
            // Exibir modal de alerta erro.
            showModalAlertError({
                title: 'Ops',
                message: jqXHR.responseJSON.message,
                buttons: {
                    ok: { active: true },
                    sim_nao: {
                        active: false,
                        onclick_btn_sim: "",
                    },
                },
            });
        }, 1600);
    })
    .always(function (){
        setTimeout(function(){ 
            // Abilitar botão sim da modal aviso.
            $('#btn-sim').prop('disabled', false);
            // Ocultar modal barra de progressão.
            hideModalProgressBar();
        }, 600);
    });
}

// Exibir modal formulário times
function showModalFormTimes() {
    // Remover valores dos campos.
    $('#modalAdminFormTimes #delegacoes_id').selectpicker('val', '');
    $('#modalAdminFormTimes #esportes_id').selectpicker('val', '');

    // Exibir modal formulário times.
    $('#modalAdminFormTimes').modal('show');
}

// Aviso deletar time
function avisoDeletarTime(id) {          
    // Exibir modal de alerta aviso.
    showModalAlertWarning({
        title: 'Aviso',
        message: 'Tem certeza que deseja deletar a participação nesse esporte',
        buttons: {
            ok: { active: false },
            sim_nao: {
                active: true,
                onclick_btn_sim: "deletarTime("+ id +");",
            },
        },
    });          
}

// Deletar time
function deletarTime(id) {
    // Desabilitar botão sim da modal aviso.
    $('#btn-sim').prop('disabled', true);
    // Ocultar modal de alerta de aviso.
    $('#modalAlertWarning').modal('hide');
    // Exibir modal barra de progressão.
    showModalProgressBar();

    // Url requisição.
    var url_ajax = '../deletartime/'+ id;
    // Método requisição.
    var method_ajax = 'GET';
    // Requisição ajax padrão.
    var requisicaoAjaxPadrao = requestAjaxDefault(url_ajax, method_ajax);

    requisicaoAjaxPadrao
    .done(function(response){//Feito
        // Criar html com os times da delegação.
        listarTimesDelegacao();

        setTimeout(function(){ 
            // Exibir modal de alerta sucesso.
            showModalAlertSuccess({
                title: response.title,
                message: response.message,
                buttons: {
                    ok: { active: false },
                    sim_nao: {
                        active: false,
                        onclick_btn_sim: "",
                    },
                },
            });
        }, 1600);

        setTimeout(function(){ 
            // Ocultar modal de alerta de sucesso.
            $('#modalAlertSuccess').modal('hide');
        }, 7000);
    })
    .fail(function (jqXHR, textStatus) {
        setTimeout(function(){ 
            // Exibir modal de alerta erro.
            showModalAlertError({
                title: 'Ops',
                message: jqXHR.responseJSON.message,
                buttons: {
                    ok: { active: true },
                    sim_nao: {
                        active: false,
                        onclick_btn_sim: "",
                    },
                },
            });
        }, 1600);
    })
    .always(function (){
        setTimeout(function(){ 
            // Abilitar botão sim da modal aviso.
            $('#btn-sim').prop('disabled', false);
            // Ocultar modal barra de progressão.
            hideModalProgressBar();
        }, 600);
    });
}

// Exibir modal formulário jogo
function showModalFormJogo() {
    // Inserir valor do id da pessoa.
    $('#adminFormJogos #id').val('');
    // Remover valores dos campos.
    $('#adminFormJogos #fase').selectpicker('val', '');
    $('#adminFormJogos #times_1').selectpicker('val', '');
    $('#adminFormJogos #placar_1').selectpicker('val', '');
    $('#adminFormJogos #times_2').selectpicker('val', '');
    $('#adminFormJogos #placar_2').selectpicker('val', '');
    // Desabilitar botão. 
    $('#btnAvisoDeletarJogo').addClass('d-none');
    // Exibir modal formulário jogo.
    $('#modalAdminFormJogos').modal('show');
}

// Criar tabela pessoas delegação.
function listarPessoasDelegacao() {
    $('#tabelaPessoasDelegacao').DataTable().destroy();

    $('#tabelaPessoasDelegacao').DataTable({
        ajax: {
            url: '../listarpessoasdelegacao',
            method: 'GET',
        },
        dom: "Bfrtip",
        buttons: [
            {
                text: 'Criar',
                className: 'btn btn-warning mb-2',
                action: function ( e, dt, node, config ) {
                    showModalFormPessoas();
                }
            }
        ],
        language: languageTable(),
        searching: true,
        scrollX: true,
        columns: [
            { data: 'id', className: 'text-center',
                render:function (data, type, row) {
                    var btn_editar_deletar = "<a href='#' class='btn btn-warning px-1 py-1' onclick='editarPessoa("+ data +");'><span><i class='fas fa-pen fa-fw'></i></span></a><a href='#' class='ml-2 btn btn-warning px-1 py-1' onclick='avisoDeletarPessoa("+ data +");'><span><i class='fas fa-trash-alt fa-fw'></i></span></a>";
                    return btn_editar_deletar;
                }        
            },
            { data: 'nome_completo' },
            { data: 'data_nasc' },
            { data: 'cpf' },
            { data: 'sexo' },
            { data: 'idade' },
            { data: 'funcao' },
            { data: 'status', name: 'status', className: 'text-center',
                render:function (data, type, row) {
                    if ( data == '1' )
                        var status_pessoa = 'Ativo';
                    else {
                        var status_pessoa = 'Inativo';
                    }
                    return status_pessoa;
                } 
            },
        ],
    });
}

// Criar html com os times da delegação.
function listarTimesDelegacao() {
    // Url requisição.
    var url_ajax = '../listartimesdelegacao';
    // Método requisição.
    var method_ajax = 'GET';
    // Requisição ajax padrão.
    var requisicaoAjaxPadrao = requestAjaxDefault(url_ajax, method_ajax);

    requisicaoAjaxPadrao
    .done(function(response){//Feito
        // Remover todos os cards.
        $('#cards-times').html('');
        // Pegar todos os esportes.
        $.each(response.data, function (index, esporte) {
            // Pegar todas as categorias.
            if (esporte) {
                $.each(esporte.categorias, function (index, categoria) {
                    if (categoria) { 
                        if (categoria.times.length) {                     
                            // Criar titulos de esporte e categorias.
                            $('#cards-times').append(
                                "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group'>"+
                                    "<h3 class='mt-1'>"+
                                        esporte.nome +' - '+ categoria.tipo +' - '+ esporte.turno +' turno'+
                                    "</h3>"+
                                "</div>"
                            );
                        }             
                        // Pegar todos os times.
                        $.each(categoria.times, function (index, time) {
                            if (time) {
                                // Criar card dos times.
                                $('#cards-times').append(
                                    "<div class='col-lg-4 col-md-4 col-sm-6 col-xs-12 form-group rounded mb-4' id='card-time-id-"+ time.id +"' style='border: 3px solid #ffc800; border-bottom: 0px; border-right: 0px;'>"+
                                        "<div class='mt-1 mb-3'>"+
                                            "<b>Nº:</b> "+ time.id+
                                            "<a href='#' class='btn btn-warning px-1 py-1 float-right' onclick='avisoDeletarTime("+ time.id +");'>"+
                                                "<span>"+
                                                    "<i class='fas fa-trash-alt fa-fw'></i>"+
                                                "</span>"+
                                            "</a>"+
                                            "<a href='#' class='btn btn-warning px-1 py-1 mr-1 float-right' onclick='editarMedalhaTime("+ time.id +");'>"+
                                                "<span>"+
                                                    "<i class='fas fa-medal fa-fw'></i>"+
                                                "</span>"+
                                            "</a>"+
                                        "</div>"+
                                    "</div>"
                                ); 
                                // Pegar todas as pessoas do time.
                                $.each(time.times_pessoas, function (index, time_pessoa) {
                                    var n = index;
                                    n++;
                                    if (time_pessoa.pessoas) {                           
                                        // Criar todas as pessoas do time.
                                        $('#card-time-id-'+time.id).append(
                                            n +"º "+ time_pessoa.pessoas.nome +" "+ time_pessoa.pessoas.sobrenome +"<br>"
                                        );
                                    }
                                });
                            }
                        });
                    }
                });
            }
        });
    })
    .fail(function (jqXHR, textStatus) {
        // Exibir modal de alerta erro.
        showModalAlertError({
            title: 'Ops',
            message: 'Tivemos um problema inesperado, tente novamente mais tarde!',
            buttons: {
                ok: { active: true },
                sim_nao: {
                    active: false,
                    onclick_btn_sim: "",
                },
            },
        });
    });
}

// Criar html com os jogos da categoria.
function listarJogosCategorias() {
    // Verifique a categoria.
    var categoria = $('#buscar-jogos #categorias option:selected').val();
    // Url requisição.
    var url_ajax = '../buscarjogoscategoria/'+ categoria;
    // Método requisição.
    var method_ajax = 'GET';
    // Requisição ajax padrão.
    var requisicaoAjaxPadrao = requestAjaxDefault(url_ajax, method_ajax);

    requisicaoAjaxPadrao
    .done(function(response){//Feito
        // Remover todos os cards.
        $('#cards-jogos').html('');
        var fase = 0;
        // Pegar todos os jogos.
        $.each(response.data, function (index, jogo) {
            // var fase = fase == jogo.fase ? continue; : jogo.placar_2;
            var numero_jogo = 1 + index;
            var time_1 = jogo.times_1.includes('Vencedor') || jogo.times_1.includes('Perdedor') || jogo.times_1.includes('WO') ? "<p class='mt-2 mb-0'><b>"+ jogo.times_1 +"</b></p>" : "<b>Nº:</b>"+ jogo.times_1 +"<br>"; 
            var time_2 = jogo.times_2.includes('Vencedor') || jogo.times_2.includes('Perdedor') || jogo.times_2.includes('WO') ? "<p class='mt-2 mb-0'><b>"+ jogo.times_2 +"</b></p>" : "<b>Nº:</b>"+ jogo.times_2 +"<br>"; 
            var delegacao_1 = jogo.time_1 == null ? '' : "<b>"+ jogo.time_1.delegacoes.nome +"</b>"; 
            var delegacao_2 = jogo.time_2 == null ? '' : "<b>"+ jogo.time_2.delegacoes.nome +"</b>"; 
            var placar_1 = jogo.placar_1 == null ? '' : jogo.placar_1; 
            var placar_2 = jogo.placar_2 == null ? '' : jogo.placar_2;

            if (fase != jogo.fase) {
                fase = jogo.fase;
                $('#cards-jogos').append(
                    "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group'>"+
                        "<div class='text-center h5'>"+
                            (jogo.fase.includes('3º Lugar') || jogo.fase.includes('Final') ? "<b>"+ jogo.fase +"</b>" : "<b>"+ jogo.fase +"ª Fase</b>")+
                        "</div>"+
                    "</div>"
                );
            } 

            // Criar titulos de esporte e categorias.
            $('#cards-jogos').append(
                "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group'>"+
                    "<a href='#' onclick='editarJogo("+ jogo.id +");' style='color: #000; text-decoration: none;'>"+
                        "<div class='form-row' style='border: 3px solid #ffc800; border-radius: 10px;'>"+
                            "<div class='col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group mb-0'>"+
                                "<div class='text-center'>"+
                                    time_1+
                                    delegacao_1+
                                "</div>"+
                            "</div>"+
                            "<div class='col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group mb-0 bg-warning'>"+
                                "<div class='text-center'>"+
                                    "<b>"+ numero_jogo +"º Jogo</b><br>"+
                                    placar_1 +"<b> X </b>"+ placar_2+
                                "</div>"+
                            "</div>"+
                            "<div class='col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group mb-0'>"+
                                "<div class='text-center'>"+
                                    time_2+
                                    delegacao_2+
                                "</div>"+
                            "</div>"+
                        "</div>"+
                    "</a>"+
                "</div>"
            );
        });
    })
    .fail(function (jqXHR, textStatus) {
        // Exibir modal de alerta erro.
        showModalAlertError({
            title: 'Ops',
            message: 'Tivemos um problema inesperado, tente novamente mais tarde!',
            buttons: {
                ok: { active: true },
                sim_nao: {
                    active: false,
                    onclick_btn_sim: "",
                },
            },
        });
    });
}

// Editar pessoa
function editarJogo(id) {
    // Inserir valor do id da pessoa.
    $('#adminFormJogos #id').val(id);
    // Inserindo onclick no botão deletar.
    $('#btnAvisoDeletarJogo').attr('onclick', 'avisoDeletarJogo('+ id +');');
    // Url requisição.
    var url_ajax = '../visualizarjogo/'+ id;
    // Método requisição.
    var method_ajax = 'GET';
    // Requisição ajax padrão.
    var requisicaoAjaxPadrao = requestAjaxDefault(url_ajax, method_ajax);

    requisicaoAjaxPadrao
    .done(function(response){//Feito
        // Inserir valores nos campos.
        $('#adminFormJogos #fase').selectpicker('val', response.data.fase);
        $('#adminFormJogos #times_1').selectpicker('val', response.data.times_1);
        $('#adminFormJogos #placar_1').selectpicker('val', response.data.placar_1);
        $('#adminFormJogos #times_2').selectpicker('val', response.data.times_2);
        $('#adminFormJogos #placar_2').selectpicker('val', response.data.placar_2);
        // Abilitar botão. 
        $('#btnAvisoDeletarJogo').removeClass('d-none');
        // Exibir modal formulário jogos.
        $('#modalAdminFormJogos').modal('show');
    })
    .fail(function (jqXHR, textStatus) {
        // Exibir modal de alerta erro.
        showModalAlertError({
            title: 'Ops',
            message: jqXHR.responseJSON.message,
            buttons: {
                ok: { active: true },
                sim_nao: {
                    active: false,
                    onclick_btn_sim: "",
                },
            },
        });
    });
}

// Aviso deletar jogo
function avisoDeletarJogo(id) {          
    // Exibir modal de alerta aviso.
    showModalAlertWarning({
        title: 'Aviso',
        message: 'Tem certeza que deseja deletar esse jogo nesse esporte',
        buttons: {
            ok: { active: false },
            sim_nao: {
                active: true,
                onclick_btn_sim: "deletarJogo("+ id +");",
            },
        },
    });          
}

// Deletar jogo
function deletarJogo(id) {
    // Desabilitar botão sim da modal aviso.
    $('#btn-sim').prop('disabled', true);
    // Ocultar modal de alerta de aviso.
    $('#modalAlertWarning').modal('hide');
    // Exibir modal barra de progressão.
    showModalProgressBar();

    // Url requisição.
    var url_ajax = '../deletarjogo/'+ id;
    // Método requisição.
    var method_ajax = 'GET';
    // Requisição ajax padrão.
    var requisicaoAjaxPadrao = requestAjaxDefault(url_ajax, method_ajax);

    requisicaoAjaxPadrao
    .done(function(response){//Feito
        // Ocultar modal formulário jogos
        $('#modalAdminFormJogos').modal('hide');
        // Criar cards jogos.
        listarJogosCategorias();

        setTimeout(function(){ 
            // Exibir modal de alerta sucesso.
            showModalAlertSuccess({
                title: response.title,
                message: response.message,
                buttons: {
                    ok: { active: false },
                    sim_nao: {
                        active: false,
                        onclick_btn_sim: "",
                    },
                },
            });
        }, 1600);

        setTimeout(function(){ 
            // Ocultar modal de alerta de sucesso.
            $('#modalAlertSuccess').modal('hide');
        }, 7000);
    })
    .fail(function (jqXHR, textStatus) {
        setTimeout(function(){ 
            // Exibir modal de alerta erro.
            showModalAlertError({
                title: 'Ops',
                message: jqXHR.responseJSON.message,
                buttons: {
                    ok: { active: true },
                    sim_nao: {
                        active: false,
                        onclick_btn_sim: "",
                    },
                },
            });
        }, 1600);
    })
    .always(function (){
        setTimeout(function(){ 
            // Abilitar botão sim da modal aviso.
            $('#btn-sim').prop('disabled', false);
            // Ocultar modal barra de progressão.
            hideModalProgressBar();
        }, 600);
    });
}

// Editar medalha time
function editarMedalhaTime(id) {
    // Inserir valor do id time.
    $('#adminFormMedalha #id').val(id);
    // Remover valores nos campos.
    $("#adminFormMedalha input[name='medalha']").prop('checked', false);
    // Url requisição.
    var url_ajax = '../buscarmedalhatime/'+ id;
    // Método requisição.
    var method_ajax = 'GET';
    // Requisição ajax padrão.
    var requisicaoAjaxPadrao = requestAjaxDefault(url_ajax, method_ajax);

    requisicaoAjaxPadrao
    .done(function(response){//Feito
        console.log(response.data[0]);
        // Inserir valores nos campos.
        $("#adminFormMedalha input[value='"+ response.data[0] +"']").prop('checked', true);
        // Exibir modal formulário medalha.
        $('#modalAdminFormMedalha').modal('show');
    })
    .fail(function (jqXHR, textStatus) {
        // Exibir modal de alerta erro.
        showModalAlertError({
            title: 'Ops',
            message: jqXHR.responseJSON.message,
            buttons: {
                ok: { active: true },
                sim_nao: {
                    active: false,
                    onclick_btn_sim: "",
                },
            },
        });
    });
}








// Forms --------------------------------------------------------------------------

// Inserir mensagens de erro nos campos do formulário.
function errosFormularioCampos(this_form, errors){  
    $.each(errors, function(campo, erros_campo){
        // Pegue o id do formulário.
        var id_form = $(this_form).attr('id');

        $.each(erros_campo, function(index, erro){
            // Inserir mensagem de erro no campo do formulário.
            $('#' + id_form + ' input[name='+ campo +']').parent().append(
                "<span class='invalid-feedback msg-erro-campo d-block mt-0' role='alert'>"+
                    "<strong>"+
                        erro+
                    "</strong>"+
                "</span>"
            );
        });
    });
}

// Modals --------------------------------------------------------------------------

// Exibir modal barra de progressão.
function showModalProgressBar(){
    // Remover scroll quando modal estiver aberta.
    $('body').addClass('overflow-hidden');
    // Exibir modal barra de progressão.
    $('#modalProgressBar').animate( { "opacity": "show", top:"0"}, 500);
    // Alterar tamanho e numeros da barra.
    var _start = {property: 0};
    var _end = {property: 50};
    $(_start).animate(_end, {
        duration: 500,
        step: function() {
        $('#modalProgressBar .progress-bar').css('width', this.property + "%");
        // $('#modalProgressBar .progress-bar').text( parseInt(this.property) + "%");        
        }
    });
}

// Ocultar modal barra de progressão.
function hideModalProgressBar(){
    // Alterar tamanho e numeros da barra.
    var _start = {property: 50};
    var _end = {property: 100};
    $(_start).animate(_end, {
        duration: 500,
        step: function() {
        $('#modalProgressBar .progress-bar').css('width', this.property + "%");
        // $('#modalProgressBar .progress-bar').text( parseInt(this.property) + "%");        
        }
    });
    setTimeout(function(){ 
        // Ocultar modal barra de progressão.
        $('#modalProgressBar').animate( { "opacity": "hide", top:"0"}, 150);
        // Remover scroll quando modal estiver aberta.
        $('body').removeClass('overflow-hidden');
        // Zerando barra de progressão.
        $('#modalProgressBar .progress-bar').css('width', "0%");
        // $('#modalProgressBar .progress-bar').text("0%");        
    }, 1000);
}

// Exibir modal de alerta sucesso.
function showModalAlertSuccess(conteudo){
    // Inserir o titulo da modal.
    $('#modalAlertSuccess .modal-title').text(conteudo.title);
    // Inserir mensagem na modal.
    $('#modalAlertSuccess .modal-body p').html(conteudo.message);
    // Inserir botões da modal.
    $('#modalAlertSuccess .modal-footer').html( buttonsModalAlert(conteudo.buttons) );
    // Exibir modal de alerta de aviso.
    $('#modalAlertSuccess').modal('show');
}

// Exibir modal de alerta erro.
function showModalAlertError(conteudo){
    // Inserir o titulo da modal.
    $('#modalAlertError .modal-title').text(conteudo.title);
    // Inserir mensagem na modal.
    $('#modalAlertError .modal-body p').html(conteudo.message);
    // Inserir botões da modal.
    $('#modalAlertError .modal-footer').html( buttonsModalAlert(conteudo.buttons) );
    // Exibir modal de alerta de aviso.
    $('#modalAlertError').modal('show');
}

// Exibir modal de alerta de aviso.
function showModalAlertWarning(conteudo){
    // Inserir o titulo da modal.
    $('#modalAlertWarning .modal-title').text(conteudo.title);
    // Inserir mensagem na modal.
    $('#modalAlertWarning .modal-body p').html(conteudo.message);
    // Inserir botões da modal.
    $('#modalAlertWarning .modal-footer').html( buttonsModalAlert(conteudo.buttons) );
    // Exibir modal de alerta de aviso.
    $('#modalAlertWarning').modal('show');
}

// String dos botões.
function buttonsModalAlert(infoButtons) {
    if (infoButtons.ok.active == true) {
        // String botão ok.
        btns = '<button type="button" class="btn btn-secondary pl-4 pr-4" data-bs-dismiss="modal">Ok</button>';
    } else if (infoButtons.sim_nao.active == true) {
        // String botões sim e não.
        var btn_sim = '<button type="button" class="btn btn-success" id="btn-sim" onclick='+ infoButtons.sim_nao.onclick_btn_sim +'>Sim</button>';
        var btn_nao = '<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Não</button>';
        var btns = btn_sim + btn_nao; 
    } else {
        btns = '';
    }

    return btns; 
}

// Table --------------------------------------------------------------------------

function languageTable() {
    // Tradução da tabelas.
    var languageTable = {
        "emptyTable": "Nenhum registro encontrado",
        "info": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
        "infoEmpty": "Mostrando 0 até 0 de 0 registros",
        "infoFiltered": "(Filtrados de _MAX_ registros)",
        "infoThousands": ".",
        "loadingRecords": "Carregando...",
        "processing": "Processando...",
        "zeroRecords": "Nenhum registro encontrado",
        "search": "Pesquisar",
        "paginate": {
            "next": "Próximo",
            "previous": "Anterior",
            "first": "Primeiro",
            "last": "Último"
        },
        "aria": {
            "sortAscending": ": Ordenar colunas de forma ascendente",
            "sortDescending": ": Ordenar colunas de forma descendente"
        },
        "select": {
            "rows": {
                "_": "Selecionado %d linhas",
                "0": "Nenhuma linha selecionada",
                "1": "Selecionado 1 linha"
            },
            "1": "%d linha selecionada",
            "_": "%d linhas selecionadas",
            "cells": {
                "1": "1 célula selecionada",
                "_": "%d células selecionadas"
            },
            "columns": {
                "1": "1 coluna selecionada",
                "_": "%d colunas selecionadas"
            }
        },
        "buttons": {
            "copySuccess": {
                "1": "Uma linha copiada com sucesso",
                "_": "%d linhas copiadas com sucesso"
            },
            "collection": "Coleção  <span class=\"ui-button-icon-primary ui-icon ui-icon-triangle-1-s\"><\/span>",
            "colvis": "Visibilidade da Coluna",
            "colvisRestore": "Restaurar Visibilidade",
            "copy": "Copiar",
            "copyKeys": "Pressione ctrl ou u2318 + C para copiar os dados da tabela para a área de transferência do sistema. Para cancelar, clique nesta mensagem ou pressione Esc..",
            "copyTitle": "Copiar para a Área de Transferência",
            "csv": "CSV",
            "excel": "Excel",
            "pageLength": {
                "-1": "Mostrar todos os registros",
                "1": "Mostrar 1 registro",
                "_": "Mostrar %d registros"
            },
            "pdf": "PDF",
            "print": "Imprimir"
        },
        "autoFill": {
            "cancel": "Cancelar",
            "fill": "Preencher todas as células com",
            "fillHorizontal": "Preencher células horizontalmente",
            "fillVertical": "Preencher células verticalmente"
        },
        "lengthMenu": "Exibir _MENU_ resultados por página",
        "searchBuilder": {
            "add": "Adicionar Condição",
            "button": {
                "0": "Construtor de Pesquisa",
                "_": "Construtor de Pesquisa (%d)"
            },
            "clearAll": "Limpar Tudo",
            "condition": "Condição",
            "conditions": {
                "date": {
                    "after": "Depois",
                    "before": "Antes",
                    "between": "Entre",
                    "empty": "Vazio",
                    "equals": "Igual",
                    "not": "Não",
                    "notBetween": "Não Entre",
                    "notEmpty": "Não Vazio"
                },
                "moment": {
                    "after": "Depois",
                    "before": "Antes",
                    "between": "Entre",
                    "empty": "Vazio",
                    "equals": "Igual",
                    "not": "Não",
                    "notBetween": "Não Entre",
                    "notEmpty": "Não Vazio"
                },
                "number": {
                    "between": "Entre",
                    "empty": "Vazio",
                    "equals": "Igual",
                    "gt": "Maior Que",
                    "gte": "Maior ou Igual a",
                    "lt": "Menor Que",
                    "lte": "Menor ou Igual a",
                    "not": "Não",
                    "notBetween": "Não Entre",
                    "notEmpty": "Não Vazio"
                },
                "string": {
                    "contains": "Contém",
                    "empty": "Vazio",
                    "endsWith": "Termina Com",
                    "equals": "Igual",
                    "not": "Não",
                    "notEmpty": "Não Vazio",
                    "startsWith": "Começa Com"
                }
            },
            "data": "Data",
            "deleteTitle": "Excluir regra de filtragem",
            "logicAnd": "E",
            "logicOr": "Ou",
            "title": {
                "0": "Construtor de Pesquisa",
                "_": "Construtor de Pesquisa (%d)"
            },
            "value": "Valor"
        },
        "searchPanes": {
            "clearMessage": "Limpar Tudo",
            "collapse": {
                "0": "Painéis de Pesquisa",
                "_": "Painéis de Pesquisa (%d)"
            },
            "count": "{total}",
            "countFiltered": "{shown} ({total})",
            "emptyPanes": "Nenhum Painel de Pesquisa",
            "loadMessage": "Carregando Painéis de Pesquisa...",
            "title": "Filtros Ativos"
        },
        "searchPlaceholder": "Digite um termo para pesquisar",
        "thousands": "."
    };

    return languageTable;
}

// Ajax --------------------------------------------------------------------------

// Requisição ajax padrão.
function requestAjaxDefault(url_ajax, method_ajax) {
    return $.ajax({
        url : url_ajax,
        type : method_ajax,
    });
}

// Enviar dados via ajax.
function submitAjaxData(url_ajax, method_ajax, data_ajax) {
    return $.ajax({
        url : url_ajax,
        type : method_ajax,
        data : data_ajax,
    });
}

// Enviar dados do formulário via ajax.
function submitAjaxForm(this_form, url_form, method_form, data_form) {
    // Pegue o id do formulário.
    var id_form = $(this_form).attr('id');

    return $.ajax({
        url : url_form,
        type : method_form,
        data : data_form,
        beforeSend: function(){//Antes de enviar.
            // Remover todas as mensagens de erro dos campos.
            $('.msg-erro-campo').remove();
            // Exibir modal barra de progressão.
            showModalProgressBar();
        },
        success: function(response) {//Se for sucesso.
            // Status sucesso.
            if (response.status == 'success') {
                setTimeout(function(){ 
                    // Exibir modal de alerta sucesso.
                    showModalAlertSuccess({
                        title: response.title,
                        message: response.message,
                        buttons: {
                            ok: { active: false },
                            sim_nao: {
                                active: false,
                                onclick_btn_sim: "",
                            },
                        },
                    });
                }, 1600);
            }

            // Status aviso.
            if (response.status == 'warning') {
                setTimeout(function(){ 
                    // Exibir modal de alerta aviso.
                    showModalAlertWarning({
                        title: response.title,
                        message: response.message,
                        buttons: {
                            ok: { active: true },
                            sim_nao: {
                                active: false,
                                onclick_btn_sim: "",
                            },
                        },
                    });
                }, 1600);
            }
        },
        error: function(xhr,textStatus,thrownError) {//Se ocorrer um erro.
            setTimeout(function(){ 
                // Exibir modal de alerta erro.
                showModalAlertError({
                    title: xhr.responseJSON.title,
                    message: xhr.responseJSON.message,
                    buttons: {
                        ok: { active: true },
                        sim_nao: {
                            active: false,
                            onclick_btn_sim: "",
                        },
                    },
                });

                // Verifique se existe erros.
                if (xhr.responseJSON.errors) {
                    // Inserir mensagens de erro nos campos do formulário.
                    errosFormularioCampos(this_form, xhr.responseJSON.errors);
                }
                // Abilitar botão de enviar formulário.
                $('#' + id_form + ' button[type="submit"]').prop('disabled', false);
            }, 1600);
        },
        complete: function() {//Quando completar a chamada.
            setTimeout(function(){ 
                // Ocultar modal barra de progressão.
                hideModalProgressBar();
            }, 600);
        },
    });
}

// Enviar dados do formulário que tenha arquivo via ajax.
function submitAjaxFormWithFile(this_form, url_form, method_form) {
    // Pegue o id do formulário.
    var id_form = $(this_form).attr('id');

    return $.ajax({
        url : url_form,
        type : method_form,
        data : new FormData(this_form),
        processData: false,
        contentType: false,
        beforeSend: function(){//Antes de enviar.
            // Remover todas as mensagens de erro dos campos.
            $('.msg-erro-campo').remove();
            // Exibir modal barra de progressão.
            showModalProgressBar();
        },
        success: function(response) {//Se for sucesso.
            setTimeout(function(){ 
                // Exibir modal de alerta sucesso.
                showModalAlertSuccess({
                    title: response.title,
                    message: response.message,
                    buttons: {
                        ok: { active: false },
                        sim_nao: {
                            active: false,
                            onclick_btn_sim: "",
                        },
                    },
                });
            }, 1600);
        },
        error: function(xhr,textStatus,thrownError) {//Se ocorrer um erro.
            setTimeout(function(){ 
                // Exibir modal de alerta erro.
                showModalAlertError({
                    title: xhr.responseJSON.title,
                    message: xhr.responseJSON.message,
                    buttons: {
                        ok: { active: true },
                        sim_nao: {
                            active: false,
                            onclick_btn_sim: "",
                        },
                    },
                });

                // Verifique se existe erros.
                if (xhr.responseJSON.errors) {
                    // Inserir mensagens de erro nos campos do formulário.
                    errosFormularioCampos(this_form, xhr.responseJSON.errors);
                }
                // Abilitar botão de enviar formulário.
                $('#' + id_form + ' button[type="submit"]').prop('disabled', false);
            }, 1600);
        },
        complete: function() {//Quando completar a chamada.
            setTimeout(function(){ 
                // Ocultar modal barra de progressão.
                hideModalProgressBar();
            }, 600);
        },
    });
}