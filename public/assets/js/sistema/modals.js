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
        var btn_sim = '<button type="button" class="btn btn-success" onclick='+ infoButtons.sim_nao.onclick_btn_sim +'>Sim</button>';
        var btn_nao = '<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Não</button>';
        var btns = btn_sim + btn_nao; 
    } else {
        btns = '';
    }

    return btns; 
}

// Exportar funções
export { 
    showModalProgressBar, 
    hideModalProgressBar, 
    showModalAlertSuccess, 
    showModalAlertError, 
    showModalAlertWarning, 
    buttonsModalAlert 
};