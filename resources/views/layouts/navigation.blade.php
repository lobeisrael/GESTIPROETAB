<!--**********************************
    Nav header start
***********************************-->
<div class="nav-header">
    <div class="brand-logo">
        <a href="#">
            <b class="logo-abbr"><img src="{{ asset('assets/images/logo.png') }}" alt="Logo"></b>
            <span class="logo-compact">GE</span>
            <span class="brand-title text-white font-weight-bold">
                GESTIETABPRO
            </span>
        </a>
    </div>
</div>
<!--**********************************
    Nav header end
***********************************-->

<!--**********************************
    Header start
***********************************-->
<div class="header">
    <div class="header-content clearfix">
        <div class="nav-control">
            <div class="hamburger">
                <span class="toggle-icon"><i class="icon-menu"></i></span>
            </div>
        </div>

        <div class="header-left">
            <div class="input-group icons">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3"><i class="mdi mdi-magnify"></i></span>
                </div>
                <input type="search" class="form-control" placeholder="Rechercher..." aria-label="Rechercher">
            </div>
        </div>

        <div class="header-right">
            <ul class="clearfix">

                {{-- Messages --}}
                <li class="icons dropdown">
                    <a href="#" data-toggle="dropdown">
                        <i class="mdi mdi-email-outline"></i>
                        <span class="badge badge-pill gradient-1">2</span>
                    </a>
                    <div class="drop-down dropdown-menu animated fadeIn">
                        <div class="dropdown-content-heading d-flex justify-content-between">
                            <span>Nouveaux messages</span>
                        </div>
                        <div class="dropdown-content-body">
                            <ul>
                                <li>
                                    <a href="#">
                                        <img class="float-left mr-3 avatar-img" src="{{ asset('assets/images/avatar/1.jpg') }}" alt="">
                                        <div class="notification-content">
                                            <div class="notification-heading">Mme Koffi (Parent)</div>
                                            <div class="notification-timestamp">Il y a 2 h</div>
                                            <div class="notification-text">Demande d’explication reçue...</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="float-left mr-3 avatar-img" src="{{ asset('assets/images/avatar/2.jpg') }}" alt="">
                                        <div class="notification-content">
                                            <div class="notification-heading">M. Traoré (Prof. Maths)</div>
                                            <div class="notification-timestamp">Aujourd’hui</div>
                                            <div class="notification-text">A soumis les notes de 3e A...</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>

                {{-- Notifications --}}
                <li class="icons dropdown">
                    <a href="#" data-toggle="dropdown">
                        <i class="mdi mdi-bell-outline"></i>
                        <span class="badge badge-pill gradient-2">3</span>
                    </a>
                    <div class="drop-down dropdown-menu animated fadeIn dropdown-notfication">
                        <div class="dropdown-content-heading d-flex justify-content-between">
                            <span>Notifications</span>
                        </div>
                        <div class="dropdown-content-body">
                            <ul>
                                <li>
                                    <a href="#">
                                        <span class="mr-3 avatar-icon bg-info"><i class="icon-info"></i></span>
                                        <div class="notification-content">
                                            <h6 class="notification-heading">Nouveaux bulletins disponibles</h6>
                                            <span class="notification-text">4e B, 3e A, Tle C</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="mr-3 avatar-icon bg-warning"><i class="icon-docs"></i></span>
                                        <div class="notification-content">
                                            <h6 class="notification-heading">Demande d’attestation</h6>
                                            <span class="notification-text">Élève : KOUADIO Marc</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>

                {{-- Langue --}}
                <li class="icons dropdown d-none d-md-flex">
                    <a href="#" class="log-user" data-toggle="dropdown">
                        <span>Français</span> <i class="fa fa-angle-down f-s-14"></i>
                    </a>
                    <div class="drop-down dropdown-language animated fadeIn dropdown-menu">
                        <div class="dropdown-content-body">
                            <ul>
                                <li><a href="#">Français</a></li>
                                <li><a href="#">Anglais</a></li>
                            </ul>
                        </div>
                    </div>
                </li>

                {{-- Utilisateur connecté --}}
                <li class="icons dropdown">
                    <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                        <span class="activity active"></span>
                        <img src="{{ asset('assets/images/user/1.png') }}" height="40" width="40" alt="">
                    </div>
                    <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                        <div class="dropdown-content-body">
                            <ul>
                                <li>
                                    <a href="#"><i class="icon-user"></i> <span>Mon Profil</span></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon-envelope-open"></i> <span>Messagerie</span> <div class="badge badge-pill gradient-1">3</div></a>
                                </li>
                                <hr class="my-2">
                                <li>
                                    <a href="#"><i class="icon-lock"></i> <span>Verrouiller</span></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon-key"></i> <span>Déconnexion</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</div>
<!--**********************************
    Header end
***********************************-->
