@extends('layouts.app')

@section('styles')
<style>
    .child-card {
        transition: all 0.3s ease;
        border: 1px solid #e3e6f0;
        border-radius: 15px;
        overflow: hidden;
        background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
    }

    .child-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        border-color: #4e73df;
    }

    .child-avatar {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 2rem;
        font-weight: bold;
        margin: 0 auto 15px auto;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    }

    .child-name {
        font-size: 1.25rem;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 8px;
    }

    .child-info {
        color: #6c757d;
        font-size: 0.9rem;
        margin-bottom: 20px;
    }

    .btn-suivi {
        background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
        border: none;
        border-radius: 25px;
        padding: 10px 25px;
        color: white;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-block;
    }

    .btn-suivi:hover {
        background: linear-gradient(135deg, #224abe 0%, #1e3a8a 100%);
        color: white;
        text-decoration: none;
        transform: scale(1.05);
    }

    .page-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 15px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .page-header h1 {
        color: white;
    }
    .stats-card {
        background: white;
        border-radius: 10px;
        padding: 1.5rem;
        text-align: center;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        border-left: 4px solid #4e73df;
    }

    .stats-number {
        font-size: 2rem;
        font-weight: bold;
        color: #4e73df;
    }

    .stats-label {
        color: #6c757d;
        font-size: 0.9rem;
    }

    .empty-state {
        text-align: center;
        padding: 3rem;
        color: #6c757d;
    }

    .empty-state i {
        font-size: 4rem;
        color: #dee2e6;
        margin-bottom: 1rem;
    }

    .badge-class {
        background: linear-gradient(135deg, #36b9cc 0%, #258fa3 100%);
        color: white;
        padding: 5px 12px;
        border-radius: 15px;
        font-size: 0.8rem;
        font-weight: 500;
    }

    .add-child-btn {
        background: linear-gradient(135deg, #1cc88a 0%, #13855c 100%);
        border: none;
        border-radius: 25px;
        color: white;
        padding: 12px 25px;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .add-child-btn:hover {
        background: linear-gradient(135deg, #13855c 0%, #0f6848 100%);
        color: white;
        text-decoration: none;
        transform: scale(1.05);
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb bg-white rounded px-4 py-2 align-items-center">
            <li class="breadcrumb-item d-flex align-items-center text-muted mb-0">
                <i class="fa fa-home mr-2 text-primary"></i>
                Menu Parent
            </li>
            <li class="mx-2 text-secondary">›</li>
            <li class="breadcrumb-item active text-primary font-weight-bold mb-0" aria-current="page">
                Suivi Scolaire
            </li>
        </ol>
    </nav>

    <!-- En-tête de la page -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="mb-2">
                    <i class="fas fa-users mr-3"></i>
                    Suivi Scolaire de vos Enfants
                </h1>
                <p class="mb-0 opacity-75">
                    Suivez les progrès académiques et les activités scolaires de chacun de vos enfants
                </p>
            </div>

        </div>
    </div>

    <!-- Statistiques -->
    <?php
    // Données factices pour la démonstration
    $enfants_demo = collect([
        (object)[
            'id' => 1,
            'prenom' => 'Sarah',
            'nom' => 'Dupont',
            'date_naissance' => '2010-05-15',
            'ecole' => 'École Primaire Les Tilleuls',
            'classe' => 'CM2',
            'statut' => 'actif',
            'derniere_connexion' => '2024-01-18 14:30:00'
        ],
        (object)[
            'id' => 2,
            'prenom' => 'Thomas',
            'nom' => 'Dupont',
            'date_naissance' => '2008-09-22',
            'ecole' => 'Collège Victor Hugo',
            'classe' => '4ème A',
            'statut' => 'actif',
            'derniere_connexion' => '2024-01-19 09:15:00'
        ],
        (object)[
            'id' => 3,
            'prenom' => 'Emma',
            'nom' => 'Dupont',
            'date_naissance' => '2012-03-08',
            'ecole' => 'École Primaire Les Tilleuls',
            'classe' => 'CE2',
            'statut' => 'actif',
            'derniere_connexion' => '2024-01-17 16:45:00'
        ]
    ]);
    ?>

        <!-- Liste des enfants -->
    @if($enfants_demo->count() > 0)
        <div class="row">
            @foreach($enfants_demo as $enfant)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card child-card h-100">
                        <div class="card-body text-center">
                            <!-- Avatar de l'enfant -->
                            <div class="child-avatar">
                                {{ strtoupper(substr($enfant->prenom, 0, 1)) }}{{ strtoupper(substr($enfant->nom, 0, 1)) }}
                            </div>

                            <!-- Informations de l'enfant -->
                            <h5 class="child-name">{{ $enfant->prenom }} {{ $enfant->nom }}</h5>

                            <div class="child-info mb-4">
                                <span class="badge-class">{{ $enfant->classe ?? 'Classe non définie' }}</span>
                            </div>

                            <!-- Bouton de suivi -->
                            <a href="{{ route('parent.enfant.suivi', ['id' => $enfant->id]) }}" class="btn-suivi">
                                <i class="fas fa-chart-line mr-2"></i>
                                Voir le suivi
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


    @else
        <!-- État vide -->
        <div class="card">
            <div class="card-body">
                <div class="empty-state">
                    <i class="fas fa-user-plus"></i>
                    <h4>Aucun enfant enregistré</h4>
                    <p class="mb-4">
                        Vous n'avez pas encore ajouté d'enfant à votre compte.
                        Commencez par ajouter un enfant pour pouvoir suivre ses progrès scolaires.
                    </p>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection


@section('scripts')
<script>
    // Animation des cartes au chargement
    $(document).ready(function() {
        $('.child-card').each(function(index) {
            $(this).css('opacity', '0').css('transform', 'translateY(20px)');
            $(this).delay(index * 100).animate({
                opacity: 1
            }, 500);

            setTimeout(() => {
                $(this).css('transform', 'translateY(0)');
            }, index * 100);
        });
    });

    // Confirmation avant suppression (si vous ajoutez cette fonctionnalité)
    function confirmerSuppression(nom) {
        return confirm(`Êtes-vous sûr de vouloir supprimer le suivi de ${nom} ?`);
    }

    // Mise à jour du statut en temps réel (optionnel)
    function mettreAJourStatut(enfantId, statut) {
        // Code pour mettre à jour le statut via AJAX
        $.ajax({
            url: `/parent/enfants/${enfantId}/statut`,
            method: 'PUT',
            data: {
                statut: statut,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                // Mettre à jour l'interface utilisateur
                location.reload();
            },
            error: function() {
                alert('Erreur lors de la mise à jour du statut');
            }
        });
    }
</script>
@endsection
