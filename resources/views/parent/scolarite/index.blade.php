@extends('layouts.app')

@section('styles')
<style>
    .children-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 15px;
        padding: 2rem;
        margin-bottom: 2rem;
    }

    .child-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        margin-bottom: 1.5rem;
        overflow: hidden;
    }

    .child-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 30px rgba(0,0,0,0.15);
    }

    .child-avatar {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: linear-gradient(135deg, #667eea, #764ba2);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 2rem;
        font-weight: bold;
        margin-right: 1.5rem;
    }

    .progress-mini {
        height: 8px;
        border-radius: 4px;
        background-color: #e9ecef;
        overflow: hidden;
    }

    .progress-mini .progress-bar {
        border-radius: 4px;
        transition: width 0.6s ease;
    }

    .progress-good {
        background: linear-gradient(90deg, #28a745, #20c997);
    }

    .progress-warning {
        background: linear-gradient(90deg, #ffc107, #fd7e14);
    }

    .progress-danger {
        background: linear-gradient(90deg, #dc3545, #e83e8c);
    }

    .status-indicator {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        display: inline-block;
        margin-right: 0.5rem;
    }

    .status-good { background-color: #28a745; }
    .status-warning { background-color: #ffc107; }
    .status-danger { background-color: #dc3545; }

    .btn-view-payments {
        background: linear-gradient(135deg, #667eea, #764ba2);
        border: none;
        border-radius: 25px;
        color: white;
        padding: 0.75rem 1.5rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-view-payments:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(102,126,234,0.4);
        color: white;
    }

    .info-item {
        display: flex;
        align-items: center;
        margin-bottom: 0.5rem;
    }

    .info-item i {
        width: 20px;
        margin-right: 0.5rem;
    }

    .summary-stats {
        background: rgba(255,255,255,0.1);
        backdrop-filter: blur(10px);
        border-radius: 10px;
        padding: 1.5rem;
        border: 1px solid rgba(255,255,255,0.2);
        text-align: center;
    }

    @media (max-width: 768px) {
        .child-avatar {
            width: 60px;
            height: 60px;
            font-size: 1.5rem;
            margin-right: 1rem;
            margin-bottom: 1rem;
        }

        .children-header {
            padding: 1rem;
        }

        .child-card .card-body {
            padding: 1rem;
        }
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
            <a href="{{ route('parent.scolarite') }}" class="text-decoration-none">
            <li class="breadcrumb-item active text-primary font-weight-bold mb-0">
                Scolarite des Enfants
            </li>
            </a>
        </ol>
    </nav>

    <!-- En-tête -->
    <div class="children-header">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h2 class="mb-1"><i class="fa fa-users mr-3"></i>Suivi des Paiements - Mes Enfants</h2>
                <p class="mb-0 opacity-75">Sélectionnez un enfant pour consulter ses paiements de scolarité</p>
            </div>
            <div class="col-md-4">
                <div class="summary-stats">
                    <h4 class="mb-1">3 Enfants</h4>
                    <small>Année scolaire 2024-2025</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Liste des enfants -->
    <div class="row">
        <!-- Enfant 1 -->
        <div class="col-lg-6 col-xl-4">
            <div class="child-card">
                <div class="card-body p-4">
                    <div class="d-flex align-items-start mb-3">
                        <div class="child-avatar">
                            AM
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="font-weight-bold mb-1">Amadou TRAORE</h5>
                            <div class="info-item">
                                <i class="fa fa-graduation-cap text-primary"></i>
                                <span class="text-muted">Classe de CM2</span>
                            </div>
                            <div class="info-item">
                                <i class="fa fa-calendar text-primary"></i>
                                <span class="text-muted">12 ans</span>
                            </div>
                            <div class="info-item">
                                <i class="fa fa-id-card text-primary"></i>
                                <span class="text-muted">Matricule: ETU2024001</span>
                            </div>
                        </div>
                    </div>

                    <!-- Statut des paiements -->
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-muted small">Progression des paiements</span>
                            <span class="font-weight-bold text-success">
                                <span class="status-indicator status-good"></span>85%
                            </span>
                        </div>
                        <div class="progress-mini">
                            <div class="progress-bar progress-good" style="width: 85%"></div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <small class="text-muted">Payé: <strong>680 000 F</strong></small>
                            </div>
                            <div class="col-6 text-right">
                                <small class="text-muted">Reste: <strong>120 000 F</strong></small>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <a href="{{ route('parent.scolariteshow') }}" class="btn btn-view-payments">
                            <i class="fa fa-eye mr-2"></i>Voir les Paiements
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enfant 2 -->
        <div class="col-lg-6 col-xl-4">
            <div class="child-card">
                <div class="card-body p-4">
                    <div class="d-flex align-items-start mb-3">
                        <div class="child-avatar">
                            FA
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="font-weight-bold mb-1">Fatou TRAORE</h5>
                            <div class="info-item">
                                <i class="fa fa-graduation-cap text-primary"></i>
                                <span class="text-muted">Classe de CE1</span>
                            </div>
                            <div class="info-item">
                                <i class="fa fa-calendar text-primary"></i>
                                <span class="text-muted">8 ans</span>
                            </div>
                            <div class="info-item">
                                <i class="fa fa-id-card text-primary"></i>
                                <span class="text-muted">Matricule: ETU2024002</span>
                            </div>
                        </div>
                    </div>

                    <!-- Statut des paiements -->
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-muted small">Progression des paiements</span>
                            <span class="font-weight-bold text-warning">
                                <span class="status-indicator status-warning"></span>60%
                            </span>
                        </div>
                        <div class="progress-mini">
                            <div class="progress-bar progress-warning" style="width: 60%"></div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <small class="text-muted">Payé: <strong>450 000 F</strong></small>
                            </div>
                            <div class="col-6 text-right">
                                <small class="text-muted">Reste: <strong>300 000 F</strong></small>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <a href="{{ route('parent.scolariteshow') }}" class="btn btn-view-payments">
                            <i class="fa fa-eye mr-2"></i>Voir les Paiements
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enfant 3 -->
        <div class="col-lg-6 col-xl-4">
            <div class="child-card">
                <div class="card-body p-4">
                    <div class="d-flex align-items-start mb-3">
                        <div class="child-avatar">
                            IB
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="font-weight-bold mb-1">Ibrahim TRAORE</h5>
                            <div class="info-item">
                                <i class="fa fa-graduation-cap text-primary"></i>
                                <span class="text-muted">Classe de 6ème</span>
                            </div>
                            <div class="info-item">
                                <i class="fa fa-calendar text-primary"></i>
                                <span class="text-muted">14 ans</span>
                            </div>
                            <div class="info-item">
                                <i class="fa fa-id-card text-primary"></i>
                                <span class="text-muted">Matricule: ETU2024003</span>
                            </div>
                        </div>
                    </div>

                    <!-- Statut des paiements -->
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-muted small">Progression des paiements</span>
                            <span class="font-weight-bold text-danger">
                                <span class="status-indicator status-danger"></span>35%
                            </span>
                        </div>
                        <div class="progress-mini">
                            <div class="progress-bar progress-danger" style="width: 35%"></div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <small class="text-muted">Payé: <strong>280 000 F</strong></small>
                            </div>
                            <div class="col-6 text-right">
                                <small class="text-danger">Reste: <strong>520 000 F</strong></small>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <a href="{{ route('parent.scolariteshow') }}" class="btn btn-view-payments">
                            <i class="fa fa-eye mr-2"></i>Voir les Paiements
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Résumé global (optionnel) -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="fa fa-chart-bar mr-2 text-primary"></i>Résumé Global</h5>
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <h4 class="text-primary">1 410 000 F</h4>
                            <small class="text-muted">Total Payé</small>
                        </div>
                        <div class="col-md-3 text-center">
                            <h4 class="text-warning">940 000 F</h4>
                            <small class="text-muted">Total Restant</small>
                        </div>
                        <div class="col-md-3 text-center">
                            <h4 class="text-info">2 350 000 F</h4>
                            <small class="text-muted">Total Scolarité</small>
                        </div>
                        <div class="col-md-3 text-center">
                            <h4 class="text-success">60%</h4>
                            <small class="text-muted">Progression Moyenne</small>
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
    $(document).ready(function() {
        // Animation des barres de progression au chargement
        setTimeout(function() {
            $('.progress-bar').each(function() {
                const width = $(this).css('width');
                $(this).css('width', '0').animate({
                    width: width
                }, 1000);
            });
        }, 300);
    });
</script>
@endsection
