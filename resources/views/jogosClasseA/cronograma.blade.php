<!-- Incluindo header da página. -->
@include('jogosClasseA.template.header')
<!-- Incluindo navbar da página. -->
@include('jogosClasseA.template.navbar')

        <style type="text/css">
            @media (max-width: 445px){
                .tema-cronograma{
                    font-size: 2.25rem !important;
                }
            }

            @media (max-width: 320px){
                .tema-cronograma{
                    font-size: 2rem !important;
                }
            }
        </style>

        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Vejamos o nosso</div>
                <div class="masthead-heading text-uppercase tema-cronograma">Cronograma</div>
            </div>
        </header>
        <!-- Antes do evento -->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Antes do evento</h2>
                    <h3 class="section-subheading text-muted">Expõe um calendário com datas e detalhamentos do que ira acontecer antes do evento.</h3>
                </div>
                <ul class="timeline">
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{ asset('assets/image/antes_do_evento/pre_inscricoes.jpg') }}" alt="Pré-inscrições" /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>01 à 16/07/2022</h4>
                                <h4 class="subheading text-warning">Pré-inscrições</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">É uma inscrição prévia na qual não envolve pagamento, mas tem como objetivo dar aos realizadores do evento uma previsão quantitativa de participantes!</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{ asset('assets/image/antes_do_evento/faze_de_analise.jpg') }}" alt="Faze de Analise" /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>17/07/2022</h4>
                                <h4 class="subheading text-warning">Fase de Análise</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Com as informações obtidas nas pré-inscrições, agora a nossa equipe irá analisar e tomar decisões calculistas e determinantes para o evento!</p></div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{ asset('assets/image/antes_do_evento/inscricoes.jpg') }}" alt="Inscrições" /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>18 à 31/07/2022</h4>
                                <h4 class="subheading text-warning">Inscrições</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Nessa etapa é feita a confirmação de inscrição com o repasse de dados pessoais para registro e também o pagamento do valor estipulado, garantindo a participação do atleta do evento!</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{ asset('assets/image/antes_do_evento/organizacao_da_estrutura.jpg') }}" alt="Organização da Estrutura" /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>01 e 31/08/2022</h4>
                                <h4 class="subheading text-warning">Organização da Estrutura</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Após o período de inscrições, a equipe organizadora do evento terá basicamente um mês para preparar a estrutura necessária que receberá os esportes e seus respectivos participantes!</p></div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{ asset('assets/image/antes_do_evento/realizacao_do_evento.jpg') }}" alt="Realização do Evento" /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>03 e 04/09/2022</h4>
                                <h4 class="subheading text-warning">Realização do Evento</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Enfim, na última fase acontecerá o grande dia. Onde se vibra com cada lance e se comemora com cada ponto obtido.</p></div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!-- No evento -->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">No evento</h2>
                    <h3 class="section-subheading text-muted">Expõe um cronograma com horários e detalhamentos do que ira acontecer no evento.</h3>
                </div>
                <ul class="timeline">
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{ asset('assets/image/no_evento/abertura.jpg') }}" alt="Abertura" /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Sábado 14h</h4>
                                <h4 class="subheading text-warning">Abertura</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">A programação de abertura será onde buscaremos, antes de mais nada, as bençãos e a presença de nosso Deus entre nós.</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{ asset('assets/image/no_evento/1_turno_jogos.jpg') }}" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Sábado 19h</h4>
                                <h4 class="subheading text-warning">1º Turno de Jogos</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">
                                    Nesse turno teremos os seguintes esportes:<br>
                                    <b>*Futsal</b><br>
                                    <b>*Sinuca</b><br>
                                    <b>*Dama</b><br>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{ asset('assets/image/no_evento/dejejum.jpg') }}" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Domingo 6h</h4>
                                <h4 class="subheading text-warning">Dejejum</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">
                                    Momento de refeição dos participantes.
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{ asset('assets/image/no_evento/2_turno_jogos.jpg') }}" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Domingo 7h</h4>
                                <h4 class="subheading text-warning">2º Turno de Jogos</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">
                                    Nesse turno teremos os seguintes esportes:<br>
                                    <b>*Vôlei de Praia</b><br>
                                    <b>*Tênis de Mesa</b><br>
                                    <b>*Xadrez</b><br>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{ asset('assets/image/no_evento/almoco.jpg') }}" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Domingo 12h</h4>
                                <h4 class="subheading text-warning">Almoço</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">
                                    Momento de refeição dos participantes.
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{ asset('assets/image/no_evento/3_turno_jogos.jpg') }}" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Domingo 13h</h4>
                                <h4 class="subheading text-warning">3º Turno de Jogos</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">
                                    Nesse turno teremos os seguintes esportes:<br>
                                    <b>*Polo Aquático</b><br>
                                    <b>*Pebolim</b><br>
                                    <b>*Dominó</b><br>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{ asset('assets/image/no_evento/encerramento.jpg') }}" alt="Encerramento" /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Domingo 16h</h4>
                                <h4 class="subheading text-warning">Encerramento</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">A programação de encerramento será o momento de agradecimentos e entrega de premiações aos atletas e participantes do evento.</p></div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        
<!-- Incluindo footer da página. -->
@include('jogosClasseA.template.footer')