<!-- Incluindo header da página. -->
@include('jogosClasseA.template.header')
<!-- Incluindo navbar da página. -->
@include('jogosClasseA.template.navbar')

        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Seja bem-vindo ao site dos</div>
                <div class="masthead-heading text-uppercase">Jogos Classe A</div>
            </div>
        </header>
        <!-- Nosso menu -->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Nosso menu</h2>
                    <h3 class="section-subheading text-muted">Explanando informações sobre o menu do site.</h3>
                </div>
                <div class="row text-center">
                    <div class="col-md-6 mb-4">
                        <a href="{{route('galeria')}}">                 
                            <span class="fa-stack fa-4x">
                                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                <i class="fas fa-camera fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                        <h4 class="my-3">Galeria</h4>
                        <p class="text-muted">A Galeria conte um conjunto de fotos que mostram a primeira edição dos Jogos Classe A. Momentos marcantes de disputas esportivas em jogos, premiações e registros de pessoas que participaram do evento.</p>
                    </div>
                    <div class="col-md-6 mb-4">
                        <a href="{{route('esportes')}}">
                            <span class="fa-stack fa-4x">
                                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                <i class="fas fa-table-tennis fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                        <h4 class="my-3">Esportes</h4>
                        <p class="text-muted">Aqui conheceremos os esportes que estarão disponíveis para serem competidos, regras para serem baixadas e lidas, tabelas de jogos, atletas, etc.</p>
                    </div>
                    <div class="col-md-6 mb-4">
                        <a href="{{route('cronograma')}}">  
                            <span class="fa-stack fa-4x">
                                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                <i class="fas fa-calendar-alt fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                        <h4 class="my-3">Cronograma</h4>
                        <p class="text-muted">Nosso cronograma serve para organizar as atividades, os prazos em uma única linha do tempo visual. Ou seja, é um instrumento de organização e planejamento do evento.</p>
                    </div>
                    <div class="col-md-6 mb-4">
                        <a href="{{route('inscricoes')}}">                           
                            <span class="fa-stack fa-4x">
                                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                <i class="fas fa-edit fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                        <h4 class="my-3">Inscrição</h4>
                        <p class="text-muted">Serão abordados os tipos inscrições disponíveis e um detalhamento sobre cada uma delas.</p>
                    </div>
                </div>
            </div>
        </section>
        
<!-- Incluindo footer da página. -->
@include('jogosClasseA.template.footer')