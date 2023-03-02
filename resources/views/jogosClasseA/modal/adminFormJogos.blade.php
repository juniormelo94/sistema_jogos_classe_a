<!-- Form Times Modal -->
<div class="portfolio-modal modal fade" id="modalAdminFormJogos" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-bs-dismiss="modal"><img src="{{ asset('assets/image/image-default/close-icon.svg') }}" alt="Close modal" /></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project details-->
                            <h3 class="text-uppercase">Jogo Esportivo</h3>

                            <!-- Form Criar ou Editar Times -->
                            {!! Form::open(['route' => 'criareditarjogos', 'id' => 'adminFormJogos']) !!} 

                                <!-- Form Times -->
                                <div class="form-row">

                                  <input type="hidden" name="id" value="" id="id">

                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                      <select name="fase" id="fase" class="form-control selectpicker" required>
                                      </select>
                                  </div>

                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                      <select name="times_1" id="times_1" class="form-control selectpicker" required>
                                      </select>
                                  </div>

                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                      <select name="placar_1" id="placar_1" class="form-control selectpicker">
                                      </select>
                                  </div>

                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                      <select name="times_2" id="times_2" class="form-control selectpicker" required>
                                      </select>
                                  </div>

                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                      <select name="placar_2" id="placar_2" class="form-control selectpicker">
                                      </select>
                                  </div>

                                  <input type="hidden" name="categorias_id" id="categorias_id">

                                  <input type="hidden" name="status" value="1">

                                </div>

                                <!-- Botões -->
                                <div class="text-center">
                                   <button class="btn btn-danger" data-bs-dismiss="modal" type="button">
                                      Fechar
                                  </button>
                                  <button type="button" class="btn btn-warning d-none" id="btnAvisoDeletarJogo">
                                     Deletar 
                                  </button>
                                  {{ Form::button('Salvar', ['type' => 'submit', 'class' => 'btn btn-success'] )  }}
                                </div>

                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>