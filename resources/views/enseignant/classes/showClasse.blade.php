@extends('layouts.app')

@section('styles')
<style>
    .gradient-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .gradient-success {
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
    }

    .gradient-warning {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    }

    .gradient-info {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    }

    .gradient-purple {
        background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
    }

    .gradient-orange {
        background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
    }

    .card-hover {
        transition: all 0.3s ease;
        border: none;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    .action-btn {
        border-radius: 25px;
        padding: 12px 25px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border: none;
        transition: all 0.3s ease;
        color: white;
        text-decoration: none;
        display: inline-block;
        min-width: 200px;
        text-align: center;
    }

    .action-btn:hover {
        transform: scale(1.05);
        color: white;
        text-decoration: none;
    }

    .stats-card {
        border-radius: 20px;
        padding: 25px;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .stats-card::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 100px;
        height: 100px;
        background: rgba(255,255,255,0.1);
        border-radius: 50%;
        transform: translate(30px, -30px);
    }

    .stats-number {
        font-size: 2.5rem;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .stats-label {
        font-size: 1rem;
        opacity: 0.9;
    }

    .class-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 20px;
        padding: 30px;
        color: white;
        margin-bottom: 30px;
        position: relative;
        overflow: hidden;
    }

    .class-header::before {
        content: '';
        position: absolute;
        top: -50px;
        right: -50px;
        width: 150px;
        height: 150px;
        background: rgba(255,255,255,0.1);
        border-radius: 50%;
    }

    .class-title {
        font-size: 2.5rem;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .class-subject {
        font-size: 1.2rem;
        opacity: 0.9;
    }

    .action-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        margin-top: 30px;
    }

    .action-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        text-align: center;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }

    .action-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    .action-icon {
        font-size: 3rem;
        margin-bottom: 15px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .action-title {
        font-size: 1.3rem;
        font-weight: bold;
        margin-bottom: 10px;
        color: #333;
    }

    .action-description {
        color: #666;
        margin-bottom: 20px;
        font-size: 0.95rem;
    }

    @media (max-width: 768px) {
        .class-title {
            font-size: 2rem;
        }

        .stats-number {
            font-size: 2rem;
        }

        .action-grid {
            grid-template-columns: 1fr;
        }

        .action-btn {
            min-width: 100%;
        }
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb bg-white shadow-sm rounded px-4 py-2 align-items-center">
            <li class="breadcrumb-item d-flex align-items-center text-muted mb-0">
                <a href="{{ route('enseignant.dashboard') }}"><i class="fa fa-home mr-2 text-primary"></i></a>
                Espace Enseignant
            </li>
            <li class="mx-2 text-secondary">›</li>
            <li class="breadcrumb-item d-flex align-items-center text-muted mb-0">
                <a href="{{ route('enseignant.classes.index') }}">
                Gestion des Classes</a>
            </li>
            <li class="mx-2 text-secondary">›</li>
            <li class="breadcrumb-item active text-primary font-weight-bold mb-0" aria-current="page">
                Gestion - {{ $classe->nom ?? '6e A' }}
            </li>
        </ol>
    </nav>

    <!-- Header de la classe -->
    <div class="class-header">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="class-title mb-2">{{ $classe->nom ?? '6e A' }}</h1>
                <p class="class-subject mb-0">
                    <i class="fa fa-book mr-2"></i>
                    {{ $classe->matiere ?? 'Mathématiques' }}
                </p>
            </div>
            <div class="col-md-4 text-md-right">
                <div class="d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                    <div class="text-center">
                        <div class="stats-number">{{ $classe->eleves_count ?? 28 }}</div>
                        <div class="stats-label">Élèves</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistiques rapides -->
    <div class="row mb-4">
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="stats-card gradient-success">
                <div class="stats-number">{{ $classe->devoirs_a_venir ?? 3 }}</div>
                <div class="stats-label">Devoirs à venir</div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="stats-card gradient-warning">
                <div class="stats-number">{{ $classe->copies_a_corriger ?? 15 }}</div>
                <div class="stats-label">Copies à corriger</div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="stats-card gradient-info">
                <div class="stats-number">{{ $classe->moyenne_classe ?? '14.2' }}</div>
                <div class="stats-label">Moyenne classe</div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="stats-card gradient-purple">
                <div class="stats-number">{{ $classe->taux_presence ?? '92' }}%</div>
                <div class="stats-label">Taux présence</div>
            </div>
        </div>
    </div>

    <!-- Actions principales -->
    <div class="action-grid">
        <!-- Voir les élèves -->
        <div class="action-card">
            <div class="action-icon">
                <i class="fa fa-users"></i>
            </div>
            <h3 class="action-title">Voir les élèves</h3>
            <p class="action-description">
                Consulter la liste complète des élèves avec leurs informations et performances
            </p>
            <a href="{{ route('enseignant.classes.listEleve', ['classe' => 1]) }}"
               class="action-btn gradient-primary">
                <i class="fa fa-eye mr-2"></i>Voir les élèves
            </a>
        </div>

        <!-- Saisir les notes -->
        <div class="action-card">
            <div class="action-icon">
                <i class="fa fa-edit"></i>
            </div>
            <h3 class="action-title">Saisir les notes</h3>
            <p class="action-description">
                Enregistrer et modifier les notes des devoirs et évaluations
            </p>
            <a href="#"
               class="action-btn gradient-success">
                <i class="fa fa-pencil-alt mr-2"></i>Saisir les notes
            </a>
        </div>

        <!-- Programmer un devoir -->
        <div class="action-card">
            <div class="action-icon">
                <i class="fa fa-calendar-plus"></i>
            </div>
            <h3 class="action-title">Programmer un devoir</h3>
            <p class="action-description">
                Créer et planifier de nouveaux devoirs ou interrogations
            </p>
            <a href="#"
               class="action-btn gradient-warning">
                <i class="fa fa-plus mr-2"></i>Nouveau devoir
            </a>
        </div>

        <!-- Téléverser copies -->
        <div class="action-card">
            <div class="action-icon">
                <i class="fa fa-upload"></i>
            </div>
            <h3 class="action-title">Copies corrigées</h3>
            <p class="action-description">
                Téléverser et distribuer les copies corrigées aux élèves
            </p>
            <a href="#"
               class="action-btn gradient-info">
                <i class="fa fa-cloud-upload-alt mr-2"></i>Téléverser copies
            </a>
        </div>
    </div>

    <!-- Actions secondaires -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card card-hover">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fa fa-cogs text-primary mr-2"></i>
                        Actions rapides
                    </h5>
                    <div class="row">
                        <div class="col-md-3 col-sm-6 mb-2">
                            <a href="#"
                               class="btn btn-outline-primary btn-sm btn-block">
                                <i class="fa fa-user-times mr-1"></i> Gérer absences
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-2">
                            <a href="#"
                               class="btn btn-outline-success btn-sm btn-block">
                                <i class="fa fa-file-alt mr-1"></i> Bulletins
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-2">
                            <a href="#"
                               class="btn btn-outline-warning btn-sm btn-block">
                                <i class="fa fa-calendar mr-1"></i> Planning cours
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-6 mb-2">
                            <a href="#"
                               class="btn btn-outline-info btn-sm btn-block">
                                <i class="fa fa-download mr-1"></i> Exporter données
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Animation d'entrée pour les cartes
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.action-card, .stats-card');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        });

        cards.forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'all 0.6s ease';
            observer.observe(card);
        });
    });

    // Effet de survol amélioré pour les boutons d'action
    document.querySelectorAll('.action-btn').forEach(btn => {
        btn.addEventListener('mouseenter', function() {
            this.style.boxShadow = '0 8px 25px rgba(0,0,0,0.2)';
        });

        btn.addEventListener('mouseleave', function() {
            this.style.boxShadow = 'none';
        });
    });
</script>
@endsection
