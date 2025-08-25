@extends('layouts.app')

@section('styles')
<style>
<style>
    .card-hover {
        cursor: pointer;
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }
    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.2);
    }

    .info-teacher {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 50%, #ec4899 100%);
        border-radius: 15px;
        padding: 2rem;
        color: white;
        margin-bottom: 2rem;
        box-shadow: 0 10px 25px rgba(79, 70, 229, 0.3);
    }

    .info-teacher img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        border: 4px solid rgba(255, 255, 255, 0.4);
        object-fit: cover;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }

    .classe-card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0,0,0,0.12);
        transition: all 0.3s ease;
    }

    .classe-header {
        background: linear-gradient(135deg, #06b6d4 0%, #3b82f6 50%, #8b5cf6 100%);
        color: white;
        padding: 1.5rem;
        position: relative;
    }

    .classe-header::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, rgba(255,255,255,0.6), rgba(255,255,255,0.2));
    }

    .niveau-badge {
        background: linear-gradient(135deg, #f59e0b 0%, #ef4444 100%);
        border: 2px solid rgba(255,255,255,0.3);
        color: white;
        border-radius: 20px;
        padding: 0.3rem 0.8rem;
        font-size: 0.8rem;
        font-weight: 600;
        box-shadow: 0 3px 10px rgba(239, 68, 68, 0.3);
    }

    .stats-item {
        text-align: center;
        padding: 1rem 0;
    }

    .stats-number {
        font-size: 2rem;
        font-weight: bold;
        background: linear-gradient(135deg, #06b6d4, #8b5cf6);
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .stats-label {
        font-size: 0.9rem;
        color: #6b7280;
        margin-top: 0.5rem;
    }

    .action-btn {
        border-radius: 25px;
        padding: 0.5rem 1.5rem;
        font-size: 0.9rem;
        font-weight: 600;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-view {
        background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 50%, #d946ef 100%);
        border: none;
        color: white;
        box-shadow: 0 4px 15px rgba(99, 102, 241, 0.4);
    }

    .btn-view:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(99, 102, 241, 0.6);
        color: white;
    }

    .btn-manage {
        background: linear-gradient(135deg, #ec4899 0%, #ef4444 50%, #f97316 100%);
        border: none;
        color: white;
        box-shadow: 0 4px 15px rgba(236, 72, 153, 0.4);
    }

    .btn-manage:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(236, 72, 153, 0.6);
        color: white;
    }

    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        color: #6b7280;
    }

    .empty-state i {
        font-size: 4rem;
        margin-bottom: 1rem;
        background: linear-gradient(135deg, #06b6d4, #8b5cf6);
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .filter-card {
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        margin-bottom: 2rem;
        padding: 1.5rem;
        border: 1px solid rgba(99, 102, 241, 0.1);
    }

    .search-input {
        border-radius: 25px;
        border: 2px solid #e2e8f0;
        padding: 0.75rem 1.5rem;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .search-input:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 0.3rem rgba(99, 102, 241, 0.25);
        transform: translateY(-1px);
    }

    .matiere-tag {
        background: linear-gradient(135deg, #f472b6 0%, #ec4899 50%, #be185d 100%);
        color: white;
        padding: 0.3rem 0.9rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        margin: 0.2rem;
        display: inline-block;
        box-shadow: 0 3px 10px rgba(236, 72, 153, 0.3);
        text-shadow: 0 1px 2px rgba(0,0,0,0.2);
    }

    /* Améliorations pour les actions rapides */
    .btn-outline-primary {
        border: 2px solid #6366f1;
        color: #6366f1;
        font-weight: 600;
    }

    .btn-outline-primary:hover {
        background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
        border-color: #6366f1;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(99, 102, 241, 0.4);
    }

    .btn-outline-success {
        border: 2px solid #10b981;
        color: #10b981;
        font-weight: 600;
    }

    .btn-outline-success:hover {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        border-color: #10b981;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(16, 185, 129, 0.4);
    }

    .btn-outline-info {
        border: 2px solid #06b6d4;
        color: #06b6d4;
        font-weight: 600;
    }

    .btn-outline-info:hover {
        background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
        border-color: #06b6d4;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(6, 182, 212, 0.4);
    }

    .btn-outline-warning {
        border: 2px solid #f59e0b;
        color: #f59e0b;
        font-weight: 600;
    }

    .btn-outline-warning:hover {
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
        border-color: #f59e0b;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(245, 158, 11, 0.4);
    }

    /* Breadcrumb amélioré */
    .breadcrumb {
        background: linear-gradient(135deg, #ffffff 0%, #f1f5f9 100%);
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        border: 1px solid rgba(99, 102, 241, 0.1);
    }

    .text-primary {
        color: #6366f1 !important;
    }

    /* Animations supplémentaires */
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }

    .stats-number:hover {
        animation: pulse 0.6s ease-in-out;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb bg-white shadow-sm rounded px-4 py-2 align-items-center">
            <li class="breadcrumb-item d-flex align-items-center text-muted mb-0">
                <a href="{{ route('enseignant.dashboard') }}"><i class="fa fa-home mr-2 text-primary"></i></a> Espace Enseignant
            </li>
            <li class="mx-2 text-secondary">›</li>
            <li class="breadcrumb-item active text-primary font-weight-bold mb-0" aria-current="page">
                Gestion des Classes
            </li>
        </ol>
    </nav>

    <!-- Filtres et Recherche -->
    <div class="filter-card">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-0">
                    <input type="text" class="form-control search-input" id="searchClasses" placeholder=" Rechercher une classe...">
                </div>
            </div>
            <div class="col-md-3">
                <select class="form-control search-input" id="filterNiveau">
                    <option value="">Tous les niveaux</option>
                    <option value="6ème">6ème</option>
                    <option value="5ème">5ème</option>
                    <option value="4ème">4ème</option>
                    <option value="3ème">3ème</option>
                    <option value="2nde">2nde</option>
                    <option value="1ère">1ère</option>
                    <option value="Terminale">Terminale</option>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-control search-input" id="filterMatiere">
                    <option value="">Toutes les matières</option>
                    @if(isset($matieres))
                        @foreach($matieres as $matiere)
                            <option value="{{ $matiere->id }}">{{ $matiere->nom }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
    </div>

    <!-- Liste des Classes -->
    <div class="row" id="classesList">
        @forelse($classes ?? [] as $classe)
            <div class="col-lg-6 col-xl-4 mb-4 classe-item"
                 data-niveau="{{ $classe->niveau }}"
                 data-nom="{{ strtolower($classe->nom) }}"
                 data-matiere="{{ $classe->matiere_id ?? '' }}">
                <div class="card classe-card card-hover">
                    <div class="classe-header">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="mb-0">{{ $classe->nom }}</h5>
                            <span class="niveau-badge">{{ $classe->niveau }}</span>
                        </div>
                        <p class="mb-0 opacity-75">
                            <i class="fa fa-users mr-1"></i>
                            {{ $classe->eleves_count ?? 0 }} élèves
                        </p>
                    </div>

                    <div class="card-body">
                        <!-- Matières enseignées dans cette classe -->
                        <div class="mb-3">
                            <small class="text-muted">Matières :</small><br>
                            @if(isset($classe->matieres) && $classe->matieres->count() > 0)
                                @foreach($classe->matieres as $matiere)
                                    <span class="matiere-tag">{{ $matiere->nom }}</span>
                                @endforeach
                            @else
                                <span class="matiere-tag">Aucune matière assignée</span>
                            @endif
                        </div>

                        <!-- Statistiques -->
                        <div class="row text-center mb-3">
                            <div class="col-4">
                                <div class="stats-item">
                                    <div class="stats-number small">{{ $classe->cours_count ?? 0 }}</div>
                                    <div class="stats-label">Cours</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stats-item">
                                    <div class="stats-number small">{{ $classe->devoirs_count ?? 0 }}</div>
                                    <div class="stats-label">Devoirs</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stats-item">
                                    <div class="stats-number small">{{ $classe->notes_moyennes ?? '-' }}</div>
                                    <div class="stats-label">Moyenne</div>
                                </div>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('enseignant.classes.show', $classe->id) }}" class="btn btn-manage action-btn flex-fill">
                                <i class="fa fa-cog mr-1"></i> Gérer
                            </a>
                        </div>

                        <!-- Dernière activité -->
                        <div class="mt-3 pt-3 border-top">
                            <small class="text-muted">
                                <i class="fa fa-clock mr-1"></i>
                                Dernière activité:
                                {{ isset($classe->derniere_activite) ? $classe->derniere_activite->diffForHumans() : 'Aucune activité' }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="card classe-card">
                    <div class="card-body empty-state">
                        <i class="fa fa-chalkboard"></i>
                        <h4>Aucune classe assignée</h4>
                        <p>Vous n'avez actuellement aucune classe assignée. Contactez l'administration pour obtenir vos affectations.</p>
                        <a href="{{ route('enseignant.dashboard') }}" class="btn btn-primary action-btn mt-3">
                            <i class="fa fa-arrow-left mr-1"></i> Retour au tableau de bord
                        </a>
                    </div>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Message si aucun résultat après filtrage -->
    <div class="row" id="noResults" style="display: none;">
        <div class="col-12">
            <div class="card classe-card">
                <div class="card-body empty-state">
                    <i class="fa fa-search"></i>
                    <h4>Aucun résultat</h4>
                    <p>Aucune classe ne correspond à vos critères de recherche.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Éléments de filtrage
    const searchInput = document.getElementById('searchClasses');
    const niveauFilter = document.getElementById('filterNiveau');
    const matiereFilter = document.getElementById('filterMatiere');
    const classeItems = document.querySelectorAll('.classe-item');
    const noResultsDiv = document.getElementById('noResults');

    // Fonction de filtrage
    function filterClasses() {
        const searchTerm = searchInput.value.toLowerCase();
        const selectedNiveau = niveauFilter.value;
        const selectedMatiere = matiereFilter.value;
        let visibleCount = 0;

        classeItems.forEach(item => {
            const nom = item.getAttribute('data-nom');
            const niveau = item.getAttribute('data-niveau');
            const matiere = item.getAttribute('data-matiere');

            const matchesSearch = nom.includes(searchTerm);
            const matchesNiveau = !selectedNiveau || niveau === selectedNiveau;
            const matchesMatiere = !selectedMatiere || matiere === selectedMatiere;

            if (matchesSearch && matchesNiveau && matchesMatiere) {
                item.style.display = 'block';
                visibleCount++;
            } else {
                item.style.display = 'none';
            }
        });

        // Afficher/masquer le message "aucun résultat"
        if (visibleCount === 0 && classeItems.length > 0) {
            noResultsDiv.style.display = 'block';
        } else {
            noResultsDiv.style.display = 'none';
        }
    }

    // Écouteurs d'événements
    searchInput.addEventListener('input', filterClasses);
    niveauFilter.addEventListener('change', filterClasses);
    matiereFilter.addEventListener('change', filterClasses);

    // Animation des cartes au chargement
    classeItems.forEach((item, index) => {
        item.style.opacity = '0';
        item.style.transform = 'translateY(20px)';

        setTimeout(() => {
            item.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            item.style.opacity = '1';
            item.style.transform = 'translateY(0)';
        }, index * 100);
    });

    // Messages de confirmation
    window.showSuccess = function(message) {
        // Vous pouvez utiliser votre système de notifications préféré
        alert(message); // Remplacez par votre système de notifications
    };

    // Gestion des erreurs AJAX
    window.showError = function(message) {
        alert('Erreur: ' + message); // Remplacez par votre système de notifications
    };
});
</script>
@endsection
