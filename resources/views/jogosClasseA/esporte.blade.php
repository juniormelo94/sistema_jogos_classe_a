<!-- Incluindo header da página. -->
@include('jogosClasseA.template.header')
<!-- Incluindo navbar da página. -->
@include('jogosClasseA.template.navbar')

        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Agora vamos falar sobre</div>
                <div class="masthead-heading text-uppercase">{{ $esporte[0]->nome }}</div>
            </div>
        </header>
        <!-- Informações -->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Informações</h2>
                    <h3 class="section-subheading text-muted">Expõe informações essenciais para esse esporte.</h3>
                </div>
                <div class="row text-center">
                    <div class="col-md-4 mb-4">
                        @if(!empty($esporte[0]->img_responsavel))
                            <div class="team-member" style="margin-bottom: 17px;">
                                <img class="mx-auto rounded-circle" src="{{ asset($esporte[0]->img_responsavel) }}" alt="..." style="margin-top: -1px;width: 8rem;height: 8rem;" />
                            </div>
                        @else()
                            <span class="fa-stack fa-4x">
                                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                <i class="fas fa-user-tie fa-stack-1x fa-inverse"></i>
                            </span>
                        @endif()
                        <h4>{{ $esporte[0]->responsavel }}</h4>
                        <p class="text-muted mb-1">Responsável Pelo Esporte</p>
                        <a class="d-block mb-2" href="#!">
                            <b>
                            {{ $esporte[0]->celular_responsavel }}
                            </b>
                        </a>
                        @if(!empty($esporte[0]->url_whats_responsavel))
                            <a class="btn btn-dark btn-social mx-2 mb-3" href="{{ $esporte[0]->url_whats_responsavel }}" aria-label="Larry Parker Twitter Profile"><i class="fab fa-whatsapp"></i></a>
                        @endif()
                        @if(!empty($esporte[0]->url_insta_responsavel))
                            <a class="btn btn-dark btn-social mx-2 mb-3" href="{{ $esporte[0]->url_insta_responsavel }}" aria-label="Larry Parker Facebook Profile"><i class="fab fa-instagram"></i></a>
                        @endif()
                    </div>
                    <div class="col-md-4 mb-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-users fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Quantidade de Atletas</h4>
                        <p class="text-muted">Esse esporte será disputado 
                            <?php
                                $qtd_pessoas_min = $esporte[0]->qtd_pessoas_min;
                                $qtd_pessoas_max = $esporte[0]->qtd_pessoas_max;
                                switch ($qtd_pessoas_max) {
                                    case '1':
                                        echo 'por <b class="text-dark">Uma Pessoa</b>, que irá representar sua respectiva delegação(igreja).';
                                        break;
                                    case '2':
                                        echo 'por <b class="text-dark">Duplas</b>, que iram representar suas respectivas delegações(igrejas).';
                                        break;
                                    case '3':
                                        echo 'por <b class="text-dark">Trios</b>, que iram representar suas respectivas delegações(igrejas).';
                                        break;
                                    case '4':
                                        echo 'por <b class="text-dark">Quartetos</b>, que iram representar suas respectivas delegações(igrejas).';
                                        break;
                                    default:
                                        echo 'por <b class="text-dark">Times de ' . $qtd_pessoas_min .'-'. $qtd_pessoas_max. ' Pessoas</b>, que iram representar suas respectivas delegações(igrejas).';
                                        break;
                                }
                            ?>        
                        </p>
                    </div>
                    <div class="col-md-4 mb-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-book-open fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Regras</h4>
                        <p class="text-muted">As regras de um jogo são os elementos que definem sua coerência e estrutura. Apesar de um mesmo jogo poder ser praticado com variações.<br>
                            @if(!empty($esporte[0]->regras))
                                <a href="{{ asset($esporte[0]->regras) }}" download>
                                    <i style="font-size: 20px" class="fas fa-file-download"></i>
                                    <b>Baixar Regras Aqui!</b>
                                </a>
                            @else()
                                <i style="font-size: 20px" class="fas fa-file-download"></i>
                                <b>Regras Ainda Não Disponíveis!</b>
                            @endif()
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Times -->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase tema-admin">Cadastro esportivo</h2>
                    <h3 class="section-subheading text-muted">Exibe todos os atletas cadastrados nesse esporte.</h3>
                </div>

                <!-- Cards Times -->
                <div class="form-row">
                    @foreach($esporte[0]->categorias as $categoria)
                        @if(count($categoria->times))                          
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                <h3 class="mt-1">
                                    Categoria: {{ $categoria->tipo }}
                                </h3>
                            </div>
                            @foreach($categoria->times as $time)
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 form-group rounded mb-4" style="border: 3px solid #ffc800; border-bottom: 0px; border-right: 0px;">
                                    <div class="mt-1 mb-3">
                                        <b>Nº:</b> {{ $time->id }}
                                        @if($time->medalha)
                                            <i style="font-size: 21px; color: {{ $time->medalha }};" class="fas fa-medal mx-2"></i>
                                        @endif()     
                                        <br>                                               
                                        <b>{{ $time->delegacoes->nome }}</b>
                                    </div>
                                    @foreach($time->times_pessoas as $time_pessoa)
                                        {{ $loop->iteration }}º {{ $time_pessoa->pessoas->nome }} {{ $time_pessoa->pessoas->sobrenome }}<br>
                                    @endforeach()
                                </div>
                            @endforeach()
                        @endif()
                    @endforeach()
                </div>

            </div>
        </section>
              <!-- Jogos -->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase tema-admin">Jogos</h2>
                    <h3 class="section-subheading text-muted">Exibe todos os jogos por categorias.</h3>
                </div>

                <!-- Cards Jogos -->
                <div class="form-row" id='cards-jogos'>
                    @foreach($esporte[0]->categorias as $categoria)
                        @if(count($categoria->jogos))                          
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                <h3 class="mt-1">
                                    Categoria: {{ $categoria->tipo }}
                                </h3>
                            </div>
                            <?php $fase = 0; ?>
                            @foreach($categoria->jogos as $jogo)
                                @if($fase !== $jogo->fase)
                                    <?php $fase = $jogo->fase; ?>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                        <div class="text-center h5">
                                            @if(str_contains($jogo->fase, '3º Lugar') || str_contains($jogo->fase, 'Final'))
                                                <b> {{ $jogo->fase }} </b>
                                            @else()
                                                <b> {{ $jogo->fase }} ª Fase</b>
                                            @endif()
                                        </div>
                                   </div>
                                @endif()

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                    <div class="form-row" style="border: 3px solid #ffc800; border-radius: 10px;">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group mb-0">
                                            <div class="text-center">
                                                @if(str_contains($jogo->times_1, 'Vencedor') || str_contains($jogo->times_1, 'Perdedor') || str_contains($jogo->times_1, 'WO')) 
                                                    <p class="mt-2 mb-0"><b class="mt-2"> {{ $jogo->times_1 }} </b></p>
                                                @else()
                                                    <b>Nº:</b> {{ $jogo->times_1 }} <br>
                                                @endif()

                                                @if($jogo->time_1 == null)
                                                    
                                                @else()
                                                    <b>{{ $jogo->time_1->delegacoes->nome }}</b>
                                                @endif()
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group mb-0 bg-warning">
                                            <div class="text-center">
                                                <b> {{ $loop->iteration }}º Jogo</b><br>
                                                @if($jogo->placar_1 == null)
                                                    
                                                @else()
                                                    {{ $jogo->placar_1 }}
                                                @endif()
                                                <b> X </b>
                                                @if($jogo->placar_2 == null)
                                                    
                                                @else()
                                                    {{ $jogo->placar_2 }}
                                                @endif()
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group mb-0">
                                            <div class="text-center">
                                                @if(str_contains($jogo->times_2, 'Vencedor') || str_contains($jogo->times_2, 'Perdedor') || str_contains($jogo->times_2, 'WO')) 
                                                    <p class="mt-2 mb-0"><b class="mt-2"> {{ $jogo->times_2 }} </b></p>
                                                @else()
                                                    <b>Nº:</b> {{ $jogo->times_2 }} <br>
                                                @endif()

                                                @if($jogo->time_2 == null)
                                                    
                                                @else()
                                                    <b>{{ $jogo->time_2->delegacoes->nome }}</b>
                                                @endif()
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach()
                        @endif()
                    @endforeach()
                </div>
            </div>
        </section>
        <!-- Portfolio Grid-->
        <!-- <section class="page-section bg-light" id="jogos">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Esportes</h2>
                    <h3 class="section-subheading text-muted">Esportes que estarão disponíveis no evento.</h3>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6 mb-4">
                        
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="{{ asset('assets/image/image-default/portfolio/1.jpg') }}" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Threads</div>
                                <div class="portfolio-caption-subheading text-muted">Illustration</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                       
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal2">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="{{ asset('assets/image/image-default/portfolio/2.jpg') }}" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Explore</div>
                                <div class="portfolio-caption-subheading text-muted">Graphic Design</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal3">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="{{ asset('assets/image/image-default/portfolio/3.jpg') }}" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Finish</div>
                                <div class="portfolio-caption-subheading text-muted">Identity</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                        
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal4">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="{{ asset('assets/image/image-default/portfolio/4.jpg') }}" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Lines</div>
                                <div class="portfolio-caption-subheading text-muted">Branding</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4 mb-sm-0">
                        
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal5">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="{{ asset('assets/image/image-default/portfolio/5.jpg') }}" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Southwest</div>
                                <div class="portfolio-caption-subheading text-muted">Website Design</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal6">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="{{ asset('assets/image/image-default/portfolio/6.jpg') }}" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Window</div>
                                <div class="portfolio-caption-subheading text-muted">Photography</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        
<!-- Incluindo footer da página. -->
@include('jogosClasseA.template.footer')