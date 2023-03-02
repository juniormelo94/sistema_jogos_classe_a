<!-- Form Times Modal -->
<div class="portfolio-modal modal fade" id="modalAdminFormTimes" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-bs-dismiss="modal"><img src="{{ asset('assets/image/image-default/close-icon.svg') }}" alt="Close modal" /></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project details-->
                            <h3 class="text-uppercase">Cadastro Esportivo</h3>

                            <!-- Form Criar ou Editar Times -->
                            {!! Form::open(['route' => 'criareditartimes', 'id' => 'adminFormTimes']) !!} 

                                <!-- Form Times -->
                                <div class="form-row">

                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group text-center mt-4">
                                    <h5 class="text-uppercase">Esporte e categoria</h5>
                                  </div>

                                  @if(Session::get('funcao') == 'Admin Geral - Atleta')
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                        {!! Form::select('delegacoes_id', $delegacoes, null, ['class' => 'form-control selectpicker', 'id' => 'delegacoes_id', 'required']) !!}
                                    </div>
                                  @else()
                                    {{ Form::hidden('delegacoes_id', Session::get('delegacoes_id'), ['id' => 'delegacoes_id']) }}
                                  @endif()

                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                      <select name="esportes_id" id="esportes_id" class="form-control selectpicker" required>
                                        <option value="">ESPORTE</option>

                                        @foreach($esportes as $esporte)
                                          <option value="{{ $esporte->id }}" data-qtd-min="{{ $esporte->qtd_pessoas_min }}" data-qtd-max="{{ $esporte->qtd_pessoas_max }}">{{ $esporte->turno }} Turno - {{ $esporte->nome }}</option>
                                        @endforeach()

                                      </select>

                                      {{ Form::hidden('qtd_pessoas_min', '', ['id' => 'qtd_pessoas_min']) }}
                                      {{ Form::hidden('qtd_pessoas_max', '', ['id' => 'qtd_pessoas_max']) }}
                                  </div>

                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                      <select name="categorias_id" id="categorias_id" class="form-control selectpicker" required>
                                        <option value="">CATEGORIA</option>
                                      </select>
                                  </div>

                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group text-center">
                                    <h5 class="text-uppercase">Atleta(s)</h5>
                                  </div>

                                  <!-- Selects de atletas. -->

                                </div>

                                <!-- Botões -->
                                <div class="text-center">
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