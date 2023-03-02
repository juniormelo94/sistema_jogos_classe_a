<!-- Form Pessoa Modal -->
<div class="portfolio-modal modal fade" id="modalAdminFormPessoas" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-bs-dismiss="modal"><img src="{{ asset('assets/image/image-default/close-icon.svg') }}" alt="Close modal" /></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project details-->
                            <h3 class="text-uppercase">Participante</h3>

                            <!-- Form Criar ou Editar Pessoa -->
                            {!! Form::open(['route' => 'criareditarpessoa', 'id' => 'adminFormPessoas']) !!} 

                                <!-- Form Pessoa -->
                                <div class="form-row">

                                  {{ Form::hidden('id', '', ['id' => 'id']) }}

                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                      {!! Form::text('nome_completo', null, ['class' => 'form-control', 'placeholder' => 'NOME COMPLETO', 'required']) !!}
                                  </div>

                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                      {!! Form::text('nome', null, ['class' => 'form-control', 'placeholder' => 'NOME', 'required']) !!}
                                  </div>

                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                      {!! Form::text('sobrenome', null, ['class' => 'form-control', 'placeholder' => 'SOBRENOME', 'required']) !!}
                                  </div>

                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                      {!! Form::text('cpf', null, ['class' => 'form-control mask-cpf', 'placeholder' => 'CPF', 'required']) !!}
                                  </div>

                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                      {!! Form::text('data_nasc', null, ['class' => 'form-control mask-data', 'placeholder' => 'DATA DE NASCIMENTO', 'required']) !!}
                                  </div>

                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                      {!! Form::select('sexo', ['' => 'SEXO', 'Masculino' => 'Masculino', 'Feminino' => 'Feminino'], null, ['class' => 'form-control selectpicker show-tick', 'id' => 'sexo', 'required']) !!}
                                  </div>

                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                      {!! Form::text('celular', null, ['class' => 'form-control mask-celular', 'placeholder' => 'CELULAR', 'required']) !!}
                                  </div>

                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                      {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'E-MAIL']) !!}
                                  </div>

                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                      {!! Form::text('idade', null, ['class' => 'form-control mask-idade', 'placeholder' => 'IDADE', 'maxlength' => '2', 'required']) !!}
                                  </div>

<!--                                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                      {!! Form::file('img', null, ['placeholder' => 'IMAGEM', 'class' => 'form-control']) !!}
                                  </div> -->

                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                      {!! Form::select('funcao', $funcoes, null, ['class' => 'form-control selectpicker', 'id' => 'funcao', 'required']) !!}
                                  </div>

                                  @if(Session::get('funcao') == 'Admin Geral - Atleta')
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                        {!! Form::select('delegacoes_id', $delegacoes, null, ['class' => 'form-control selectpicker', 'id' => 'delegacoes_id', 'required']) !!}
                                    </div>
                                  @else()
                                    {{ Form::hidden('delegacoes_id', Session::get('delegacoes_id'), ['id' => 'delegacoes_id']) }}
                                  @endif()

                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                      {!! Form::select('status', ['' => 'STATUS', '1' => 'Ativo', '0' => 'Inativo'], null, ['class' => 'form-control selectpicker show-tick', 'id' => 'status', 'required']) !!}
                                  </div>

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