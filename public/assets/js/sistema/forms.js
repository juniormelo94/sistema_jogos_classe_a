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

// Exportar funções
export { errosFormularioCampos };