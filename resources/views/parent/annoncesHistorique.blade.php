@extends('layouts.app')

@section('styles')
<style>
    /* Optimisation mobile */
    @media (max-width: 768px) {
        .container-fluid {
            padding-left: 10px;
            padding-right: 10px;
        }

        .breadcrumb {
            font-size: 0.875rem;
            padding: 8px 12px;
        }

        .card {
            margin-bottom: 15px;
            border-radius: 12px;
        }

        .card-body {
            padding: 15px;
        }

        .btn-sm {
            font-size: 0.8rem;
            padding: 4px 8px;
        }
    }

    /* Styles pour les annonces */
    .history-card {
        transition: all 0.3s ease;
        border-radius: 12px;
        overflow: hidden;
        position: relative;
    }

    .history-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .history-card.read {
        opacity: 0.8;
        background-color: #f8f9fa;
    }

    .history-card.unread {
        border-left: 4px solid #28a745;
        background: linear-gradient(135deg, #f8fff9 0%, #ffffff 100%);
    }

    .announcement-type {
        position: absolute;
        top: 10px;
        right: 10px;
        padding: 4px 8px;
        border-radius: 12px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .type-urgent { background: #dc3545; color: white; }
    .type-info { background: #17a2b8; color: white; }
    .type-event { background: #ffc107; color: #212529; }
    .type-normal { background: #6c757d; color: white; }

    .announcement-preview {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        line-height: 1.4;
        height: 2.8em;
    }

    .announcement-meta {
        font-size: 0.8rem;
        color: #6c757d;
    }

    .search-sticky {
        position: sticky;
        top: 0;
        z-index: 100;
        background: white;
        padding: 10px 0;
        border-bottom: 1px solid #dee2e6;
        margin-bottom: 20px;
    }

    .filter-chips {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-top: 10px;
    }

    .filter-chip {
        padding: 6px 12px;
        border-radius: 20px;
        border: 1px solid #dee2e6;
        background: white;
        font-size: 0.8rem;
        cursor: pointer;
        transition: all 0.2s;
    }

    .filter-chip.active {
        background: #007bff;
        color: white;
        border-color: #007bff;
    }

    .load-more-btn {
        width: 100%;
        padding: 15px;
        border-radius: 12px;
        background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
        border: none;
        color: white;
        font-weight: 600;
        transition: all 0.3s;
    }

    .load-more-btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0,123,255,0.3);
    }

    .stats-row {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 12px;
        padding: 15px;
        margin-bottom: 20px;
    }

    .stat-item {
        text-align: center;
        padding: 10px;
    }

    .stat-number {
        font-size: 1.5rem;
        font-weight: bold;
        color: #007bff;
    }

    .stat-label {
        font-size: 0.8rem;
        color: #6c757d;
        margin-top: 2px;
    }

    /* Animation de chargement */
    .loading-skeleton {
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 200% 100%;
        animation: loading 1.5s infinite;
    }

    @keyframes loading {
        0% { background-position: 200% 0; }
        100% { background-position: -200% 0; }
    }

    /* Modal pour détails */
    .modal-content {
        border-radius: 15px;
    }

    .modal-header {
        border-bottom: 1px solid #dee2e6;
        border-radius: 15px 15px 0 0;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb bg-white rounded px-3 py-2 align-items-center">
            <li class="breadcrumb-item d-flex align-items-center text-muted mb-0">
                <i class="fa fa-home mr-2 text-primary"></i> Menu Parent
            </li>
            <li class="mx-2 text-secondary">›</li>
            <a href="{{ route('parent.annonces') }}">
            <li class="breadcrumb-item d-flex align-items-center text-muted mb-0">
                    Annonces
            </li>
            </a>
            <li class="mx-2 text-secondary">›</li>
            <li class="breadcrumb-item active text-primary font-weight-bold mb-0" aria-current="page">
                Historique
            </li>
        </ol>
    </nav>

    <!-- En-tête avec statistiques -->
    <div class="stats-row">
        <div class="row">
            <div class="col-3">
                <div class="stat-item">
                    <div class="stat-number">24</div>
                    <div class="stat-label">Total</div>
                </div>
            </div>
            <div class="col-3">
                <div class="stat-item">
                    <div class="stat-number text-success">3</div>
                    <div class="stat-label">Non lues</div>
                </div>
            </div>
            <div class="col-3">
                <div class="stat-item">
                    <div class="stat-number text-danger">2</div>
                    <div class="stat-label">Urgentes</div>
                </div>
            </div>
            <div class="col-3">
                <div class="stat-item">
                    <div class="stat-number text-info">5</div>
                    <div class="stat-label">Ce mois</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Barre de recherche et filtres sticky -->
    <div class="search-sticky">
        <div class="row">
            <div class="col-12">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" placeholder="Rechercher dans les annonces..."
                           id="searchInput" onkeyup="searchAnnouncements()">
                </div>

                <!-- Filtres en chips -->
                <div class="filter-chips">
                    <div class="filter-chip active" onclick="filterByType('all')">
                        <i class="fa fa-list mr-1"></i>Toutes
                    </div>
                    <div class="filter-chip" onclick="filterByType('unread')">
                        <i class="fa fa-circle text-success mr-1"></i>Non lues
                    </div>
                    <div class="filter-chip" onclick="filterByType('urgent')">
                        <i class="fa fa-exclamation-triangle mr-1"></i>Urgentes
                    </div>
                    <div class="filter-chip" onclick="filterByType('event')">
                        <i class="fa fa-calendar mr-1"></i>Événements
                    </div>
                    <div class="filter-chip" onclick="filterByType('this-month')">
                        <i class="fa fa-clock-o mr-1"></i>Ce mois
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Liste des annonces -->
    <div id="announcements-list">
        <!-- Annonce non lue urgente -->
        <div class="card history-card unread" data-type="urgent" data-month="june" data-read="false">
            <div class="card-body">
                <div class="announcement-type type-urgent">Urgent</div>
                <h6 class="card-title mb-2 pr-5">
                    <i class="fa fa-exclamation-triangle text-danger mr-2"></i>
                    Réunion Parents-Professeurs Exceptionnelle
                </h6>
                <div class="announcement-preview mb-2">
                    Réunion exceptionnelle organisée le vendredi 25 juin à 16h00 pour discuter des résultats du troisième trimestre et des orientations...
                </div>
                <div class="announcement-meta mb-3">
                    <i class="fa fa-calendar mr-1"></i>20 juin 2025 •
                    <i class="fa fa-user mr-1"></i>Administration •
                    <i class="fa fa-eye mr-1"></i>Non lue
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">
                        <i class="fa fa-clock-o mr-1"></i>Il y a 2 jours
                    </small>
                    <div>
                        <button class="btn btn-sm btn-outline-primary mr-2" onclick="showAnnouncementModal(1)">
                            <i class="fa fa-eye mr-1"></i>Lire
                        </button>
                        <button class="btn btn-sm btn-outline-success" onclick="confirmPresence(1)">
                            <i class="fa fa-check mr-1"></i>Confirmer
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Annonce lue - événement -->
        <div class="card history-card read" data-type="event" data-month="june" data-read="true">
            <div class="card-body">
                <div class="announcement-type type-event">Événement</div>
                <h6 class="card-title mb-2 pr-5">
                    <i class="fa fa-star text-warning mr-2"></i>
                    Sortie Éducative - Musée des Sciences
                </h6>
                <div class="announcement-preview mb-2">
                    Sortie organisée pour les classes de 5ème et 4ème le mardi 2 juillet 2025. Visite du Musée des Sciences dans le cadre du programme...
                </div>
                <div class="announcement-meta mb-3">
                    <i class="fa fa-calendar mr-1"></i>21 juin 2025 •
                    <i class="fa fa-user mr-1"></i>Direction Pédagogique •
                    <i class="fa fa-check-circle text-success mr-1"></i>Lue
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">
                        <i class="fa fa-clock-o mr-1"></i>Il y a 1 jour
                    </small>
                    <div>
                        <button class="btn btn-sm btn-outline-primary mr-2" onclick="showAnnouncementModal(2)">
                            <i class="fa fa-eye mr-1"></i>Relire
                        </button>
                        <button class="btn btn-sm btn-outline-warning" onclick="registerForEvent(2)">
                            <i class="fa fa-pencil mr-1"></i>S'inscrire
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Annonce informative -->
        <div class="card history-card read" data-type="info" data-month="june" data-read="true">
            <div class="card-body">
                <div class="announcement-type type-info">Info</div>
                <h6 class="card-title mb-2 pr-5">
                    <i class="fa fa-info-circle text-info mr-2"></i>
                    Nouvelle Plateforme d'Apprentissage
                </h6>
                <div class="announcement-preview mb-2">
                    Lancement de notre nouvelle plateforme d'apprentissage en ligne permettant aux élèves d'accéder aux cours et ressources...
                </div>
                <div class="announcement-meta mb-3">
                    <i class="fa fa-calendar mr-1"></i>19 juin 2025 •
                    <i class="fa fa-user mr-1"></i>Service Informatique •
                    <i class="fa fa-check-circle text-success mr-1"></i>Lue
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">
                        <i class="fa fa-clock-o mr-1"></i>Il y a 3 jours
                    </small>
                    <div>
                        <button class="btn btn-sm btn-outline-primary mr-2" onclick="showAnnouncementModal(3)">
                            <i class="fa fa-eye mr-1"></i>Relire
                        </button>
                        <button class="btn btn-sm btn-outline-info" onclick="downloadGuide(3)">
                            <i class="fa fa-download mr-1"></i>Guide
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Annonce normale -->
        <div class="card history-card read" data-type="normal" data-month="june" data-read="true">
            <div class="card-body">
                <div class="announcement-type type-normal">Général</div>
                <h6 class="card-title mb-2 pr-5">
                    <i class="fa fa-calendar text-primary mr-2"></i>
                    Calendrier des Examens - 3ème Trimestre
                </h6>
                <div class="announcement-preview mb-2">
                    Le calendrier des examens du troisième trimestre est disponible. Les épreuves commenceront le lundi 30 juin...
                </div>
                <div class="announcement-meta mb-3">
                    <i class="fa fa-calendar mr-1"></i>18 juin 2025 •
                    <i class="fa fa-user mr-1"></i>Service Examens •
                    <i class="fa fa-check-circle text-success mr-1"></i>Lue
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">
                        <i class="fa fa-clock-o mr-1"></i>Il y a 4 jours
                    </small>
                    <div>
                        <button class="btn btn-sm btn-outline-primary mr-2" onclick="showAnnouncementModal(4)">
                            <i class="fa fa-eye mr-1"></i>Relire
                        </button>
                        <button class="btn btn-sm btn-outline-secondary" onclick="downloadCalendar(4)">
                            <i class="fa fa-calendar-o mr-1"></i>Calendrier
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Annonces plus anciennes -->
        <div class="card history-card read" data-type="normal" data-month="may" data-read="true">
            <div class="card-body">
                <div class="announcement-type type-normal">Général</div>
                <h6 class="card-title mb-2 pr-5">
                    <i class="fa fa-graduation-cap text-primary mr-2"></i>
                    Résultats du 2ème Trimestre
                </h6>
                <div class="announcement-preview mb-2">
                    Les bulletins de notes du deuxième trimestre sont maintenant disponibles sur la plateforme des parents...
                </div>
                <div class="announcement-meta mb-3">
                    <i class="fa fa-calendar mr-1"></i>28 mai 2025 •
                    <i class="fa fa-user mr-1"></i>Service Scolaire •
                    <i class="fa fa-check-circle text-success mr-1"></i>Lue
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">
                        <i class="fa fa-clock-o mr-1"></i>Il y a 3 semaines
                    </small>
                    <div>
                        <button class="btn btn-sm btn-outline-primary mr-2" onclick="showAnnouncementModal(5)">
                            <i class="fa fa-eye mr-1"></i>Relire
                        </button>
                        <button class="btn btn-sm btn-outline-success" onclick="viewGrades(5)">
                            <i class="fa fa-bar-chart mr-1"></i>Notes
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bouton Charger plus -->
    <div class="text-center mt-4">
        <button class="btn load-more-btn" onclick="loadMoreAnnouncements()">
            <i class="fa fa-plus mr-2"></i>Charger plus d'annonces
        </button>
    </div>

    <!-- Message vide -->
    <div id="no-results" class="text-center py-5" style="display: none;">
        <i class="fa fa-search fa-3x text-muted mb-3"></i>
        <h5 class="text-muted">Aucune annonce trouvée</h5>
        <p class="text-muted">Essayez de modifier vos critères de recherche</p>
    </div>
</div>

<!-- Modal pour détails de l'annonce -->
<div class="modal fade" id="announcementModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">
                    <i class="fa fa-bullhorn mr-2"></i>Détails de l'annonce
                </h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalContent">
                <!-- Contenu dynamique -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-primary" id="modalAction">Action</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Variables globales
    let currentFilter = 'all';
    let currentSearch = '';

    // Fonction de recherche
    function searchAnnouncements() {
        currentSearch = document.getElementById('searchInput').value.toLowerCase();
        applyFilters();
    }

    // Filtrage par type
    function filterByType(type) {
        currentFilter = type;

        // Mise à jour des chips
        document.querySelectorAll('.filter-chip').forEach(chip => {
            chip.classList.remove('active');
        });
        event.target.classList.add('active');

        applyFilters();
    }

    // Application des filtres
    function applyFilters() {
        const announcements = document.querySelectorAll('.history-card');
        let visibleCount = 0;

        announcements.forEach(card => {
            let show = true;

            // Filtre par type
            if (currentFilter === 'unread' && card.dataset.read === 'true') {
                show = false;
            } else if (currentFilter === 'urgent' && card.dataset.type !== 'urgent') {
                show = false;
            } else if (currentFilter === 'event' && card.dataset.type !== 'event') {
                show = false;
            } else if (currentFilter === 'this-month' && card.dataset.month !== 'june') {
                show = false;
            }

            // Filtre par recherche
            if (currentSearch && show) {
                const title = card.querySelector('.card-title').textContent.toLowerCase();
                const preview = card.querySelector('.announcement-preview').textContent.toLowerCase();
                if (!title.includes(currentSearch) && !preview.includes(currentSearch)) {
                    show = false;
                }
            }

            // Affichage
            if (show) {
                card.style.display = 'block';
                card.style.animation = 'fadeIn 0.3s ease-in-out';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        // Affichage du message "Aucun résultat"
        document.getElementById('no-results').style.display = visibleCount === 0 ? 'block' : 'none';
    }

    // Affichage des détails dans le modal
    function showAnnouncementModal(id) {
        const announcements = {
            1: {
                title: 'Réunion Parents-Professeurs Exceptionnelle',
                content: `
                    <div class="alert alert-danger">
                        <i class="fa fa-exclamation-triangle mr-2"></i>
                        <strong>Annonce urgente</strong>
                    </div>
                    <p><strong>Chers parents,</strong></p>
                    <p>Nous organisons une réunion exceptionnelle parents-professeurs le <strong>vendredi 25 juin 2025 à 16h00</strong> en salle de conférence.</p>
                    <p>Cette réunion portera sur :</p>
                    <ul>
                        <li>Les résultats du troisième trimestre</li>
                        <li>Les orientations pour la prochaine année scolaire</li>
                        <li>Les inscriptions pour les activités extrascolaires</li>
                    </ul>
                    <div class="alert alert-warning">
                        <strong>Important :</strong> Votre présence est vivement souhaitée. Merci de confirmer votre participation avant le 23 juin.
                    </div>
                `,
                action: 'Confirmer présence'
            },
            2: {
                title: 'Sortie Éducative - Musée des Sciences',
                content: `
                    <p>Une sortie éducative au Musée des Sciences est organisée pour les classes de 5ème et 4ème le <strong>mardi 2 juillet 2025</strong>.</p>
                    <h6>Détails pratiques :</h6>
                    <ul>
                        <li><strong>Coût :</strong> 15 000 FCFA par élève</li>
                        <li><strong>Horaire :</strong> 08h00 - 16h00</li>
                        <li><strong>Transport :</strong> Bus scolaire</li>
                        <li><strong>Repas :</strong> Pique-nique fourni</li>
                    </ul>
                    <p><strong>Date limite d'inscription :</strong> 28 juin 2025</p>
                `,
                action: 'S\'inscrire'
            }
        };

        const announcement = announcements[id];
        if (announcement) {
            document.getElementById('modalTitle').innerHTML = `<i class="fa fa-bullhorn mr-2"></i>${announcement.title}`;
            document.getElementById('modalContent').innerHTML = announcement.content;
            document.getElementById('modalAction').textContent = announcement.action;

            // Marquer comme lue
            markAsRead(id);

            $('#announcementModal').modal('show');
        }
    }

    // Marquer comme lue
    function markAsRead(id) {
        const card = document.querySelector(`[onclick*="${id}"]`).closest('.history-card');
        if (card && card.classList.contains('unread')) {
            card.classList.remove('unread');
            card.classList.add('read');
            card.dataset.read = 'true';

            // Mettre à jour le statut dans la card
            const meta = card.querySelector('.announcement-meta');
            meta.innerHTML = meta.innerHTML.replace('Non lue', '<i class="fa fa-check-circle text-success mr-1"></i>Lue');
        }
    }

    // Actions spécifiques
    function confirmPresence(id) {
        // Logique de confirmation de présence
        alert('Présence confirmée ! Vous recevrez un rappel par SMS.');
    }

    function registerForEvent(id) {
        // Logique d'inscription à un événement
        alert('Inscription en cours...');
    }

    function downloadGuide(id) {
        // Logique de téléchargement
        alert('Téléchargement du guide...');
    }

    function downloadCalendar(id) {
        // Logique de téléchargement du calendrier
        alert('Téléchargement du calendrier...');
    }

    function viewGrades(id) {
        // Redirection vers les notes
        alert('Redirection vers les notes...');
    }

    // Charger plus d'annonces
    function loadMoreAnnouncements() {
        const button = document.querySelector('.load-more-btn');
        button.innerHTML = '<i class="fa fa-spinner fa-spin mr-2"></i>Chargement...';

        setTimeout(() => {
            // Simuler le chargement
            button.innerHTML = '<i class="fa fa-plus mr-2"></i>Charger plus d\'annonces';
            alert('Plus d\'annonces chargées !');
        }, 1500);
    }

    // Animation d'entrée au chargement
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.history-card');
        cards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';

            setTimeout(() => {
                card.style.transition = 'opacity 0.4s ease-out, transform 0.4s ease-out';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, index * 100);
        });
    });

    // Pull to refresh pour mobile
    let startY = 0;
    let pullDistance = 0;

    document.addEventListener('touchstart', function(e) {
        if (window.scrollY === 0) {
            startY = e.touches[0].pageY;
        }
    });

    document.addEventListener('touchmove', function(e) {
        if (window.scrollY === 0 && startY < e.touches[0].pageY) {
            pullDistance = e.touches[0].pageY - startY;
            if (pullDistance > 100) {
                // Déclencher le refresh
                location.reload();
            }
        }
    });
</script>
@endsection
