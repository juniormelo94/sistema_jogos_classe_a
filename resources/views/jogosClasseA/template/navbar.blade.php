    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="{{route('/')}}">
                    Jogos Classe A
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('/')}}">
                                Inicio
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('galeria')}}">
                                Galeria
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('esportes')}}">
                                Esportes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('cronograma')}}">
                                Cronograma
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('inscricoes')}}">
                                Inscrições
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="modal" href="#modalAdminFormAcesso">
                                Admin
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>