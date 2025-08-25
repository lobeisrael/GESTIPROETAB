<div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Gestion Scolaire</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-people menu-icon"></i> <span class="nav-text">Élèves</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="#">Liste des élèves</a></li>
                            <li><a href="#">Affectation / Réaffectation</a></li>
                            <li><a href="#">Non affectés</a></li>
                            <li><a href="#">Certificat de scolarité</a></li>
                            <li><a href="#">Attestation de fréquentation</a></li>
                            <li><a href="#">Redoublants</a></li>
                            <li><a href="#">Élèves exclus</a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-grid menu-icon"></i> <span class="nav-text">Classes</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="#">Liste des classes</a></li>
                            <li><a href="#">Affecter élèves à une classe</a></li>
                            <li><a href="#">Liste à imprimer (notes)</a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-user menu-icon"></i> <span class="nav-text">Personnel</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="#">Enseignants</a></li>
                            <li><a href="#">Administratif</a></li>
                            <li><a href="#">Certificat de travail</a></li>
                            <li><a href="#">Demande de permission</a></li>
                            <li><a href="#">Demande d'explication</a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-note menu-icon"></i> <span class="nav-text">Notes & Bulletins</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="#">Saisie des notes</a></li>
                            <li><a href="#">Bulletins avec photo</a></li>
                            <li><a href="#">Livret scolaire</a></li>
                            <li><a href="#">Export DSPS</a></li>
                            <li><a href="#">Export DOB</a></li>
                            <li><a href="#">Export DEEP</a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-doc menu-icon"></i> <span class="nav-text">Examens & Collantes</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="#">Examens blancs</a></li>
                            <li><a href="#">Éditeur de collantes</a></li>
                            <li><a href="#">Impression de collantes</a></li>
                            <li><a href="#">Liste alphabétique & moyennes</a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-trophy menu-icon"></i> <span class="nav-text">Distinctions</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="#">Tableau d'honneur</a></li>
                            <li><a href="#">Tableau d'excellence</a></li>
                            <li><a href="#">Majors de classe</a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-graph menu-icon"></i> <span class="nav-text">Statistiques</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="#">Par genre</a></li>
                            <li><a href="#">Par statut</a></li>
                            <li><a href="#">Par âge</a></li>
                            <li><a href="#">Par qualité</a></li>
                            <li><a href="#">Par nationalité</a></li>
                            <li><a href="#">Par LV2</a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-wallet menu-icon"></i> <span class="nav-text">Caisse & Finances</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="#">Caisse</a></li>
                            <li><a href="#">Paiements</a></li>
                            <li><a href="#">Historique</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Espace Enseignant</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-graduation menu-icon"></i> <span class="nav-text">Menu Enseignant</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('enseignant.dashboard') }}">Accueil</a></li>
                            <li><a href="{{ route('enseignant.classes.index') }}">Mes classes</a></li>
                            <li><a href="#">Emploie du temps</a></li>
                            <li><a href="#">Documents Admin</a></li>
                            <li><a href="#">Annonce Admin</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Espace Eleve</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-user menu-icon"></i>  <span class="nav-text">Menu Eleve</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('etudiant.monespace.suivi') }}"><i class="icon-note menu-icon"></i>Mon Espace</a></li>
                            <li><a href="{{ route('etudiant.annonces') }}"><i class="icon-bell"></i>Annonces</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Espace Parent</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-user menu-icon"></i>  <span class="nav-text">Menu Parent</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('parent.profil') }}"><i class="icon-note menu-icon"></i>Mon Profil</a></li>
                            <li><a href="{{ route('parent.enfants') }}"><i class="icon-people menu-icon"></i> Suivi Scolaire</a></li>
                            <li><a href="{{ route('parent.scolarite') }}"><i class="fas fa-wallet menu-icon"></i> Suivi des scolarites</a></li>
                            <li><a href="{{ route('parent.annonces') }}"><i class="icon-bell"></i> Informations Admin</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Espace Gestionnaire</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-user menu-icon"></i>  <span class="nav-text">Menu Gestionnaire</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('etudiant.monespace.suivi') }}"><i class="icon-note menu-icon"></i>Mon Espace</a></li>
                            <li><a href="{{ route('etudiant.annonces') }}"><i class="icon-bell"></i>Annonces</a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-settings menu-icon"></i> <span class="nav-text">Paramètres</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="#">Gestion des utilisateurs</a></li>
                            <li><a href="#">Rôles & accès</a></li>
                            <li><a href="#">Modèles de documents</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
