<!-- Incluindo header da página. -->
@include('jogosClasseA.template.header')
<!-- Incluindo navbar da página. -->
@include('jogosClasseA.template.navbar')

        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Abrindo a nossa</div>
                <div class="masthead-heading text-uppercase">Galeria</div>
            </div>
        </header>

        <!-- Galeria -->
        <section class="page-section" id="galeria">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase font-weight-bold">Jogos Classe A - 2015</h2>
                    <h3 class="section-subheading text-muted">Veja um pouco de como foi a primeira edição desse evento.</h3>
                </div>

                <style type="text/css">
                    body{
                        margin:0;
                        padding:0;
                    }
                    /* .container{
                        width:90%
                        margin:10px auto;
                    } */
                    .portfolio-menu{
                        text-align:center;
                    }
                    .portfolio-menu ul li{
                        display:inline-block;
                        margin:0;
                        list-style:none;
                        padding:10px 15px;
                        cursor:pointer;
                        -webkit-transition:all 05s ease;
                        -moz-transition:all 05s ease;
                        -ms-transition:all 05s ease;
                        -o-transition:all 05s ease;
                        transition:all .5s ease;
                    }

                    .portfolio-item{
                        /*width:100%;*/
                    }
                    .portfolio-item .item{
                        /*width:303px;*/
                        float:left;
                        margin-bottom:10px;
                    }
                </style>

                <div class="container">
                   <div class="row">
                      <div class="col-lg-12 text-center my-2">
                         <h4>Filtro</h4>
                      </div>
                   </div>
                   <div class="portfolio-menu mt-2 mb-4">
                      <ul>
                         <li class="btn btn-outline-dark active" data-filter="*">Tudo</li>
                         <li class="btn btn-outline-dark" data-filter=".medalhistas">Medalhistas</li>
                         <li class="btn btn-outline-dark" data-filter=".esportes">Esportes</li>
                      </ul>
                   </div>
                   <div class="portfolio-item row">

                      <div class="item col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/78.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light"> 
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/78.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item medalhistas col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/1.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light"> 
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/1.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/2.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light"> 
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/2.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item esportes col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/4.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/4.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/5.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/5.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item esportes col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/6.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/6.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item esportes col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/7.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/7.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/8.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/8.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item esportes col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/9.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/9.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item medalhistas col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/10.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/10.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item esportes col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/11.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/11.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item esportes col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/12.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/12.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item medalhistas col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/13.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/13.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/14.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/14.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item medalhistas col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/15.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/15.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item medalhistas col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/16.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/16.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/17.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/17.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item esportes col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/18.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/18.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item esportes col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/19.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/19.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item medalhistas col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/20.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/20.jpg') }}" alt="">
                         </a>
                      </div>

                      <div class="item esportes col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/21.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/21.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/22.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/22.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item esportes col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/23.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/23.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/24.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/24.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/25.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/25.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item esportes col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/26.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/26.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/27.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/27.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item esportes col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/28.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/28.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item medalhistas col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/29.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/29.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/30.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/30.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item esportes col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/31.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/31.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item medalhistas col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/32.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/32.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item medalhistas col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/33.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/33.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item esportes col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/34.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/34.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item esportes col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/35.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/35.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item esportes col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/36.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/36.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item medalhistas col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/37.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/37.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item medalhistas col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/38.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/38.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/39.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/39.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item medalhistas col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/40.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/40.jpg') }}" alt="">
                         </a>
                      </div>

                      <div class="item col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/41.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/41.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item medalhistas col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/42.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/42.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item medalhistas col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/43.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/43.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item medalhistas col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/44.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/44.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item esportes col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/45.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/45.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item esportes col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/46.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/46.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item esportes col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/47.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/47.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item medalhistas col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/48.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/48.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/49.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/49.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item esportes col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/50.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/50.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item medalhistas col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/51.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/51.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item esportes col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/52.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/52.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item esportes col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/53.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/53.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/54.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/54.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item medalhistas col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/55.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/55.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item esportes col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/56.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/56.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/57.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/57.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item medalhistas col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/58.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/58.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item medalhistas col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/59.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/59.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item medalhistas col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/60.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/60.jpg') }}" alt="">
                         </a>
                      </div>

                      <div class="item col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/61.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/61.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/62.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/62.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item medalhistas col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/63.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/63.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/64.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/64.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/65.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/65.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item medalhistas col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/66.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/66.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item esportes col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/67.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/67.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item esportes col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/69.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/69.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/70.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/70.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item medalhistas col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/71.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/71.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/72.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/72.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/73.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/73.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/74.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/74.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item esportes col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/75.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/75.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item esportes col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/76.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/76.jpg') }}" alt="">
                         </a>
                      </div>
                      <div class="item col-lg-3 col-md-4 col-6">
                         <a href="{{ asset('assets/image/fotos_2015/77.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                         <img class="img-fluid" src="{{ asset('assets/image/fotos_2015/77.jpg') }}" alt="">
                         </a>
                      </div>

                   </div>
                </div>

            </div>
        </section>
        
<!-- Incluindo footer da página. -->
@include('jogosClasseA.template.footer')