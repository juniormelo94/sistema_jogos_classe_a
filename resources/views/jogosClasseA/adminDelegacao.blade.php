<!-- Incluindo header da página. -->
@include('jogosClasseA.template.header')
<!-- Incluindo navbar da página. -->
@include('jogosClasseA.template.navbar')

        <style type="text/css">
            @media (max-width: 500px){
                .tema-admin{
                    font-size: 2.25rem !important;
                }
            }

            @media (max-width: 380px){
                .tema-admin{
                    font-size: 2rem !important;
                }
            }

            @media (max-width: 320px){
                .tema-admin{
                    font-size: 1.5rem !important;
                }
            }
        </style>

        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Área do</div>
                <div class="masthead-heading text-uppercase tema-admin">
                    administrador
                    de
                    delegação
                </div>
            </div>
        </header>
        <!-- Participantes -->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase tema-admin">Participantes</h2>
                    <h3 class="section-subheading text-muted">Lista todos os participantes dessa delegação.</h3>
                </div>

                <!-- Table Times -->
                <table id="tabelaPessoasDelegacao" class="table table-bordered table-hover" style="width:100%">
                    <thead class="bg-primary">
                        <tr style="white-space: nowrap;">
                            <th>&nbsp;&nbsp;&nbsp;&nbsp;Ações&nbsp;&nbsp;&nbsp;&nbsp;</th>
                            <th>Nome Completo</th>
                            <th>Nascimento</th>
                            <th>CPF</th>
                            <th>Sexo</th>
                            <th>Idade</th>
                            <th>Inscrição</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody style="white-space: nowrap;">
             
                    </tbody>
                    <tfoot class="bg-primary">
                        <tr style="white-space: nowrap;">
                            <th>&nbsp;&nbsp;&nbsp;&nbsp;Ações&nbsp;&nbsp;&nbsp;&nbsp;</th>
                            <th>Nome Completo</th>
                            <th>Nascimento</th>
                            <th>CPF</th>
                            <th>Sexo</th>
                            <th>Idade</th>
                            <th>Inscrição</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </section>
        <!-- Times -->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase tema-admin">Cadastro nos esportes</h2>
                    <h3 class="section-subheading text-muted">Exibir todas as participações em esportes dessa delegação.</h3>
                </div>

                <button class="btn btn-warning mb-2" onclick="showModalFormTimes();">
                   Criar 
                </button>

                <!-- Cards Times -->
                <div class="form-row" id='cards-times'>


                </div>
            </div>
        </section>
        <!-- Jogos -->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase tema-admin">Jogos por esportes</h2>
                    <h3 class="section-subheading text-muted">Exibe todos os jogos por esportes.</h3>
                </div>


                <!-- Buscar Jogos -->
                <div class="form-row" id='buscar-jogos'>

                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group text-center mt-4">
                    <h5 class="text-uppercase">Buscar jogos</h5>
                  </div>

                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
                      <select name="esportes_id" id="esportes" class="form-control selectpicker" required>
                        <option value="">ESPORTE</option>

                        @foreach($esportes as $esporte)
                          <option value="{{ $esporte->id }}">{{ $esporte->turno }} Turno - {{ $esporte->nome }}</option>
                        @endforeach()

                      </select>
                  </div>

                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
                      <select name="categorias_id" id="categorias" class="form-control selectpicker" required disabled>
                        <option value="">CATEGORIA</option>
                      </select>
                  </div>

                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group">
                    <!-- Botão -->
                    <button class="btn btn-success btn-block" id="btnBuscarJogos" disabled>
                        Buscar
                    </button>
                  </div>

                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group text-center mt-4">
                    <h5 class="text-uppercase">Listar jogos</h5>
                  </div>

                </div>

                <button class="btn btn-warning mb-2 d-none" onclick="showModalFormJogo();" id="btnModalAdminFormJogos">
                   Criar 
                </button>

                <!-- Cards Jogos -->
                <div class="form-row" id='cards-jogos'>

                </div>
            </div>
        </section>

<!-- Incluindo Modals -->
@include('jogosClasseA.modal.adminFormJogos') 
@include('jogosClasseA.modal.adminFormMedalha') 
@include('jogosClasseA.modal.adminFormPessoas') 
@include('jogosClasseA.modal.adminFormTimes') 

        
<!-- Incluindo footer da página. -->
@include('jogosClasseA.template.footer')