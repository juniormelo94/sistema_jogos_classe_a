<!-- Incluindo header da página. -->
@include('jogosClasseA.template.header')
<!-- Incluindo navbar da página. -->
@include('jogosClasseA.template.navbar')

        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Detalhando as</div>
                <div class="masthead-heading text-uppercase">Inscrições</div>
            </div>
        </header>
        <!-- Informações -->
        <section class="page-section" id="services" style="padding-bottom: 0px;">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <div class="team-member" style="margin-bottom: 17px;">
                            <img class="mx-auto rounded-circle" src="{{ asset('assets/image/responsaveis/taylane.jpg') }}" alt="..." style="margin-top: -1px;width: 8rem;height: 8rem;" />
                        </div>
                        <h4>Taylane Silva</h4>
                        <p class="text-muted mb-1">Responsável Pelas Inscrições</p>
                        <a class="d-block mb-2" href="#">
                            <b>
                            (87)98172-7987
                            </b>
                        </a>
                        <a class="btn btn-dark btn-social mx-2 mb-3" href="https://wa.me/qr/BHTLBUUFUQBPG1" aria-label="Larry Parker Twitter Profile"><i class="fab fa-whatsapp"></i></a>
                        <a class="btn btn-dark btn-social mx-2 mb-3" href="https://www.instagram.com/tayllane_.silva/" aria-label="Larry Parker Facebook Profile"><i class="fab fa-instagram"></i></a>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
            </div>
        </section>
        <!-- Tipos de inscrições -->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Tipos de inscrições</h2>
                    <h3 class="section-subheading text-muted">Exibe os tipos de inscrições disponíveis e suas respectivas informações.</h3>
                </div>
                <div class="row text-center">
                    <div class="col-md-4 mb-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-user-alt fa-stack-1x fa-inverse" style="font-size: 50px; bottom: 40px;"></i>
                            <i class="fa fa-futbol fa-stack-1x fa-inverse" style="font-size: 25px; right: 60px; top: 50px;"></i>
                            <i class="fas fa-table-tennis fa-stack-1x fa-inverse" style="font-size: 25px; top: 60px;"></i>
                            <i class="fas fa-volleyball-ball fa-stack-1x fa-inverse" style="font-size: 25px; left: 60px; top: 50px;"></i>
                        </span>
                        <h4 class="my-3">Atletas</h4>
                        <p class="text-muted">
                            <b>R$ 30,00</b><br>
                            *10 anos acima.<br>
                            *3 esportes(1 por turno).<br>
                            *Refeições(Domingo).<br>
                            *Chácara(Ambiente e Piscina).<br>
                            *Seguro de vida.
                        </p>
                    </div>
                    <div class="col-md-4 mb-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-user-alt fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Participantes</h4>
                        <p class="text-muted">
                            <b>R$ 20,00</b><br>
                            *10 anos acima.<br>
                            *Refeições(Domingo).<br>
                            *Chácara(Ambiente e Piscina).<br>
                            *Seguro de vida.
                        </p>
                    </div>
                    <div class="col-md-4 mb-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa fa-child fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Crianças</h4>
                        <p class="text-muted">
                            <b>R$ 15,00</b><br>
                            *9 anos abaixo.<br>
                            *Refeições(Domingo).<br>
                            *Chácara(Piscina e brinquedos).<br>
                            *Seguro de vida.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        
<!-- Incluindo footer da página. -->
@include('jogosClasseA.template.footer')