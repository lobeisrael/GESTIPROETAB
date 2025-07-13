@extends('layouts.app')

@section('styles')
<style>
    .announcement-card {
        transition: transform 0.2s ease-in-out;
        border-left: 4px solid #007bff;
    }
    .announcement-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .announcement-new {
        border-left-color: #28a745;
        background: linear-gradient(135deg, #f8fff9 0%, #ffffff 100%);
    }
    .announcement-urgent {
        border-left-color: #dc3545;
        background: linear-gradient(135deg, #fff8f8 0%, #ffffff 100%);
    }
    .announcement-info {
        border-left-color: #17a2b8;
        background: linear-gradient(135deg, #f8fcff 0%, #ffffff 100%);
    }
    .badge-new {
        animation: pulse 2s infinite;
    }
    @keyframes pulse {
        0% { opacity: 1; }
        50% { opacity: 0.5; }
        100% { opacity: 1; }
    }
    .announcement-date {
        font-size: 0.875rem;
        color: #6c757d;
    }
    .announcement-content {
        line-height: 1.6;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb bg-white rounded px-4 py-2 align-items-center">
            <li class="breadcrumb-item d-flex align-items-center text-muted mb-0">
                <i class="fa fa-home mr-2 text-primary"></i> Menu Parent
            </li>
            <li class="mx-2 text-secondary">›</li>
            <li class="breadcrumb-item active text-primary font-weight-bold mb-0" aria-current="page">
                 Annonces
            </li>
        </ol>
    </nav>

    <div class="col-lg-10 col-xl-11 mx-auto">
        <!-- En-tête avec statistiques -->
        <div class="row mb-4">
            <div class="col-md-8">
                <h2 class="mb-3">
                    <i class="fa fa-bullhorn mr-2 text-primary"></i>Annonces de l'Administration
                </h2>
                <p class="text-muted">Restez informé des dernières nouvelles et événements de l'école</p>
            </div>
            <div class="col-md-4">
                <div class="card bg-primary text-white">
                    <div class="card-body text-center">
                        <h5 class="card-title mb-1">
                            <i class="fa fa-bell mr-2"></i>3
                        </h5>
                        <p class="card-text mb-0">Nouvelles annonces</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions rapides -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h5 class="mb-1">
                            <i class="fa fa-history mr-2 text-info"></i>Historique des annonces
                        </h5>
                        <p class="text-muted mb-0">Consultez toutes les annonces de l'année scolaire</p>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="{{ route('etudiant.annonces.historique') }}" class="btn btn-info">
                            <i class="fa fa-list mr-2"></i>Voir l'historique
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filtres -->
        <div class="card mb-4">
            <div class="card-body py-3">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="btn-group" role="group" aria-label="Filtres">
                            <button type="button" class="btn btn-outline-primary active" onclick="filterAnnouncements('all')">
                                <i class="fa fa-list mr-1"></i>Toutes
                            </button>
                            <button type="button" class="btn btn-outline-success" onclick="filterAnnouncements('new')">
                                <i class="fa fa-star mr-1"></i>Nouvelles
                            </button>
                            <button type="button" class="btn btn-outline-danger" onclick="filterAnnouncements('urgent')">
                                <i class="fa fa-exclamation-triangle mr-1"></i>Urgentes
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <small class="text-muted">
                            <i class="fa fa-sync mr-1"></i>Dernière mise à jour : {{ date('d/m/Y à H:i') }}
                        </small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Annonces récentes -->
        <div class="row" id="announcements-container">
            <!-- Annonce urgente -->
            <div class="col-12 mb-4" data-type="urgent">
                <div class="card announcement-card announcement-urgent">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h5 class="card-title mb-1">
                                    <i class="fa fa-exclamation-triangle text-danger mr-2"></i>
                                    Réunion Parents-Professeurs - URGENT
                                    <span class="badge badge-danger ml-2">Urgent</span>
                                </h5>
                                <div class="announcement-date">
                                    <i class="fa fa-calendar mr-1"></i>Publié le 20 juin 2025 à 14:30
                                </div>
                            </div>
                            <div class="text-right">
                                <small class="text-muted">Administration</small>
                            </div>
                        </div>
                        <div class="announcement-content">
                            <p class="mb-3">
                                <strong>Chers parents,</strong><br>
                                Nous organisons une réunion exceptionnelle parents-professeurs le <strong>vendredi 25 juin 2025 à 16h00</strong>
                                en salle de conférence. Cette réunion portera sur les résultats du troisième trimestre et les orientations
                                pour la prochaine année scolaire.
                            </p>
                            <div class="alert alert-warning mb-3">
                                <i class="fa fa-info-circle mr-2"></i>
                                <strong>Important :</strong> Votre présence est vivement souhaitée.
                                Merci de confirmer votre participation avant le 23 juin.
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fa fa-clock text-muted mr-1"></i>
                                    <small class="text-muted">Date limite : 23/06/2025</small>
                                </div>
                                <div>
                                    <button class="btn btn-sm btn-outline-primary mr-2">
                                        <i class="fa fa-check mr-1"></i>Confirmer présence
                                    </button>
                                    <button class="btn btn-sm btn-outline-secondary">
                                        <i class="fa fa-download mr-1"></i>Télécharger
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Nouvelle annonce -->
            <div class="col-12 mb-4" data-type="new">
                <div class="card announcement-card announcement-new">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h5 class="card-title mb-1">
                                    <i class="fa fa-star text-success mr-2"></i>
                                    Sortie Éducative - Musée des Sciences
                                    <span class="badge badge-success badge-new ml-2">Nouveau</span>
                                </h5>
                                <div class="announcement-date">
                                    <i class="fa fa-calendar mr-1"></i>Publié le 22 juin 2025 à 09:15
                                </div>
                            </div>
                            <div class="text-right">
                                <small class="text-muted">Direction Pédagogique</small>
                            </div>
                        </div>
                        <div class="announcement-content">
                            <p class="mb-3">
                                Une sortie éducative au Musée des Sciences est organisée pour les classes de 5ème et 4ème
                                le <strong>mardi 2 juillet 2025</strong>. Cette sortie s'inscrit dans le cadre du programme
                                de sciences physiques et naturelles.
                            </p>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <small class="text-muted d-block"><i class="fa fa-money mr-1"></i><strong>Coût :</strong> 15 000 FCFA par élève</small>
                                    <small class="text-muted d-block"><i class="fa fa-clock mr-1"></i><strong>Horaire :</strong> 08h00 - 16h00</small>
                                </div>
                                <div class="col-md-6">
                                    <small class="text-muted d-block"><i class="fa fa-bus mr-1"></i><strong>Transport :</strong> Bus scolaire</small>
                                    <small class="text-muted d-block"><i class="fa fa-cutlery mr-1"></i><strong>Repas :</strong> Pique-nique fourni</small>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fa fa-calendar text-muted mr-1"></i>
                                    <small class="text-muted">Date limite d'inscription : 28/06/2025</small>
                                </div>
                                <div>
                                    <button class="btn btn-sm btn-success mr-2">
                                        <i class="fa fa-pencil mr-1"></i>S'inscrire
                                    </button>
                                    <button class="btn btn-sm btn-outline-secondary">
                                        <i class="fa fa-eye mr-1"></i>Détails
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Annonce informative -->
            <div class="col-12 mb-4" data-type="info">
                <div class="card announcement-card announcement-info">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h5 class="card-title mb-1">
                                    <i class="fa fa-info-circle text-info mr-2"></i>
                                    Nouvelle Plateforme d'Apprentissage en Ligne
                                    <span class="badge badge-info ml-2">Information</span>
                                </h5>
                                <div class="announcement-date">
                                    <i class="fa fa-calendar mr-1"></i>Publié le 21 juin 2025 à 11:45
                                </div>
                            </div>
                            <div class="text-right">
                                <small class="text-muted">Service Informatique</small>
                            </div>
                        </div>
                        <div class="announcement-content">
                            <p class="mb-3">
                                Nous avons le plaisir de vous annoncer le lancement de notre nouvelle plateforme d'apprentissage
                                en ligne qui permettra aux élèves d'accéder aux cours, exercices et ressources pédagogiques
                                depuis leur domicile.
                            </p>
                            <div class="alert alert-info mb-3">
                                <i class="fa fa-lightbulb-o mr-2"></i>
                                <strong>Astuce :</strong> Les identifiants de connexion seront communiqués via le carnet de liaison.
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fa fa-globe text-muted mr-1"></i>
                                    <small class="text-muted">Disponible dès le 1er juillet</small>
                                </div>
                                <div>
                                    <button class="btn btn-sm btn-outline-info mr-2">
                                        <i class="fa fa-question-circle mr-1"></i>Guide d'utilisation
                                    </button>
                                    <button class="btn btn-sm btn-outline-secondary">
                                        <i class="fa fa-share mr-1"></i>Partager
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Annonce normale -->
            <div class="col-12 mb-4" data-type="normal">
                <div class="card announcement-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h5 class="card-title mb-1">
                                    <i class="fa fa-calendar text-primary mr-2"></i>
                                    Calendrier des Examens du 3ème Trimestre
                                </h5>
                                <div class="announcement-date">
                                    <i class="fa fa-calendar mr-1"></i>Publié le 19 juin 2025 à 16:20
                                </div>
                            </div>
                            <div class="text-right">
                                <small class="text-muted">Service Examens</small>
                            </div>
                        </div>
                        <div class="announcement-content">
                            <p class="mb-3">
                                Le calendrier des examens du troisième trimestre est maintenant disponible.
                                Les épreuves commenceront le lundi 30 juin 2025 et se termineront le vendredi 4 juillet 2025.
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fa fa-users text-muted mr-1"></i>
                                    <small class="text-muted">Toutes les classes concernées</small>
                                </div>
                                <div>
                                    <button class="btn btn-sm btn-outline-primary mr-2">
                                        <i class="fa fa-calendar-o mr-1"></i>Voir calendrier
                                    </button>
                                    <button class="btn btn-sm btn-outline-secondary">
                                        <i class="fa fa-print mr-1"></i>Imprimer
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            <nav aria-label="Navigation des annonces">
                <ul class="pagination">
                    <li class="page-item disabled">
                        <span class="page-link"><i class="fa fa-chevron-left"></i></span>
                    </li>
                    <li class="page-item active">
                        <span class="page-link">1</span>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#"><i class="fa fa-chevron-right"></i></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Fonction de filtrage des annonces
    function filterAnnouncements(type) {
        const announcements = document.querySelectorAll('[data-type]');
        const buttons = document.querySelectorAll('.btn-group .btn');

        // Réinitialiser les boutons
        buttons.forEach(btn => btn.classList.remove('active'));
        event.target.classList.add('active');

        // Filtrer les annonces
        announcements.forEach(announcement => {
            if (type === 'all' || announcement.dataset.type === type) {
                announcement.style.display = 'block';
                announcement.style.animation = 'fadeIn 0.5s ease-in-out';
            } else {
                announcement.style.display = 'none';
            }
        });
    }

    // Animation d'apparition
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.announcement-card');
        cards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';

            setTimeout(() => {
                card.style.transition = 'opacity 0.6s ease-out, transform 0.6s ease-out';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, index * 100);
        });
    });

    // Marquer une annonce comme lue
    function markAsRead(announcementId) {
        // Logique pour marquer l'annonce comme lue
        console.log('Annonce marquée comme lue:', announcementId);
    }

    // Auto-refresh des annonces (toutes les 5 minutes)
    setInterval(function() {
        // Logique pour rafraîchir les annonces
        console.log('Vérification de nouvelles annonces...');
    }, 300000); // 5 minutes
</script>
@endsection
