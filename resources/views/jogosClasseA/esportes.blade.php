<!-- Incluindo header da página. -->
@include('jogosClasseA.template.header')
<!-- Incluindo navbar da página. -->
@include('jogosClasseA.template.navbar')

        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Nossa área de</div>
                <div class="masthead-heading text-uppercase">Esportes</div>
            </div>
        </header>
        <!-- Esportes -->
        <section class="page-section bg-light" id="jogos">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Esportes</h2>
                    <h3 class="section-subheading text-muted">Esportes que estarão disponíveis no evento.</h3>
                </div>
                <div class="row">

                    @foreach($esportes as $esporte)
                        <div class="col-lg-4 col-sm-6 mb-4">
                            <!-- Portfolio item 1-->
                            <div class="portfolio-item">
                                <a class="portfolio-link" href='{{ route("esporte", $esporte->id) }}'>
                                    <div class="portfolio-hover">
                                        <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                    </div>
                                    <img class="img-fluid" src="{{ asset($esporte->img) }}" alt="{{ $esporte->nome }}" />
                                </a>
                                <div class="portfolio-caption">
                                    <div class="portfolio-caption-heading">
                                        {{ $esporte->nome }}
                                    </div>
                                    <div class="portfolio-caption-subheading text-muted">{{ $esporte->turno }} Turno de Jogos</div>
                                </div>
                            </div>
                        </div>
                    @endforeach()
                    
                </div>
            </div>
        </section>
        
<!-- Incluindo footer da página. -->
@include('jogosClasseA.template.footer')