import { 
    showModalProgressBar, 
    hideModalProgressBar, 
    showModalAlertSuccess, 
    showModalAlertError, 
    showModalAlertWarning, 
    buttonsModalAlert
} from './modals.js';

import { 
    errosFormularioCampos
} from './forms.js';

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

// Exportar funções
export { 
    requestAjaxDefault, 
    submitAjaxData, 
    submitAjaxForm 
};