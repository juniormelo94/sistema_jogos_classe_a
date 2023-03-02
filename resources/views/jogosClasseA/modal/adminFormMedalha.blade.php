<!-- Form Times Modal -->
<div class="portfolio-modal modal fade" id="modalAdminFormMedalha" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-bs-dismiss="modal"><img src="{{ asset('assets/image/image-default/close-icon.svg') }}" alt="Close modal" /></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project details-->
                            <h3 class="text-uppercase">Medalha Time</h3>

                            <!-- Form Criar ou Editar Medalha -->
                            {!! Form::open(['route' => 'criareditarmedalhatime', 'id' => 'adminFormMedalha']) !!} 

                                <!-- Form Times -->
                                <div class="form-row">

                                  <input type="hidden" name="id" value="" id="id">

                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                      <input class="form-check-input" type="radio" name="medalha" id="exampleRadios1" value="#B8860B">
                                      <label class="form-check-label">
                                        Ouro
                                      </label>
                                      <br>
                                      <input class="form-check-input" type="radio" name="medalha" id="exampleRadios1" value="#808080">
                                      <label class="form-check-label">
                                        Prata
                                      </label>
                                      <br>
                                      <input class="form-check-input" type="radio" name="medalha" id="exampleRadios1" value="#800000">
                                      <label class="form-check-label">
                                        Bronze
                                      </label>
                                      <br>
                                      <input class="form-check-input" type="radio" name="medalha" id="exampleRadios1" value="">
                                      <label class="form-check-label">
                                        Não Medalhista
                                      </label>

                                  </div>

                                </div>

                                <!-- Botões -->
                                <div class="text-center mt-4">
                                   <button class="btn btn-danger" data-bs-dismiss="modal" type="button">
                                      Fechar
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