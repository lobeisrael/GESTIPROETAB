@extends('layouts.app')

@section('styles')
<style>
    .payment-summary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 15px;
        padding: 2rem;
        margin-bottom: 2rem;
    }

    .summary-card {
        background: rgba(255,255,255,0.1);
        backdrop-filter: blur(10px);
        border-radius: 10px;
        padding: 1.5rem;
        border: 1px solid rgba(255,255,255,0.2);
        text-align: center;
    }

    .amount {
        font-family: 'Arial', sans-serif;
        font-weight: 700;
        font-size: 1.5rem;
    }

    .progress-section {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }

    .custom-progress {
        height: 20px;
        border-radius: 10px;
        background-color: #e9ecef;
    }

    .custom-progress .progress-bar {
        border-radius: 10px;
        background: linear-gradient(90deg, #28a745, #20c997);
        transition: width 0.6s ease;
    }

    .history-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }

    .payment-item {
        border-bottom: 1px solid #e9ecef;
        padding: 1.5rem;
        transition: background-color 0.3s ease;
    }

    .payment-item:last-child {
        border-bottom: none;
    }

    .payment-item:hover {
        background-color: #f8f9fa;
    }

    .status-badge {
        font-size: 0.75rem;
        font-weight: 600;
        padding: 0.4rem 0.8rem;
        border-radius: 15px;
        text-transform: uppercase;
    }

    .status-paid {
        background-color: #d4edda;
        color: #155724;
    }

    .status-pending {
        background-color: #fff3cd;
        color: #856404;
    }

    .status-overdue {
        background-color: #f8d7da;
        color: #721c24;
    }

    @media (max-width: 768px) {
        .payment-summary {
            padding: 1rem;
        }

        .summary-card {
            margin-bottom: 1rem;
        }

        .amount {
            font-size: 1.2rem;
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
            <li class="breadcrumb-item text-muted mb-0">
                Scolarite des Enfants
            </li>
            </a>
            <li class="mx-2 text-secondary">›</li>
            <li class="breadcrumb-item active text-primary font-weight-bold mb-0" aria-current="page">
                Fatou TRAORE - Paiements
            </li>
        </ol>
    </nav>

    <!-- Résumé des paiements -->
    <div class="payment-summary">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="d-flex align-items-center">
                    <div class="child-avatar mr-3" style="width: 60px; height: 60px; border-radius: 50%; background: linear-gradient(135deg, #667eea, #764ba2); display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem; font-weight: bold;">
                        FA
                    </div>
                    <div>
                        <h2 class="mb-1">Fatou TRAORE</h2>
                        <p class="mb-0 opacity-75">Classe de CE1 • Matricule: ETU2024002 • Année scolaire 2024-2025</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="summary-card">
                    <i class="fa fa-calculator fa-2x mb-3"></i>
                    <h4 class="amount">750 000 F</h4>
                    <p class="mb-0">Total Scolarité</p>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="summary-card">
                    <i class="fa fa-check-circle fa-2x mb-3"></i>
                    <h4 class="amount">450 000 F</h4>
                    <p class="mb-0">Déjà Versé</p>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="summary-card">
                    <i class="fa fa-clock fa-2x mb-3"></i>
                    <h4 class="amount">300 000 F</h4>
                    <p class="mb-0">Reste à Payer</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Barre de progression -->
    <div class="progress-section">
        <div class="row align-items-center">
            <div class="col-12">
                <h5 class="mb-3"><i class="fa fa-chart-line mr-2 text-primary"></i>Progression des Paiements</h5>
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Progression</span>
                    <span class="font-weight-bold text-primary">60% (450 000 F / 750 000 F)</span>
                </div>
                <div class="progress custom-progress">
                    <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                        60%
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <small class="text-muted">Montant payé: <strong>450 000 F</strong></small>
                    </div>
                    <div class="col-6 text-right">
                        <small class="text-muted">Reste: <strong>300 000 F</strong></small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Historique des paiements -->
    <div class="history-card">
        <div class="card-header bg-light">
            <h5 class="mb-0"><i class="fa fa-history mr-2 text-primary"></i>Historique des Paiements</h5>
        </div>
        <div class="card-body p-0">
            <!-- Paiement 1 -->
            <div class="payment-item">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h6 class="font-weight-bold mb-1">Frais d'inscription</h6>
                        <p class="text-muted mb-1 small">Référence: PAY-2024-001</p>
                        <small class="text-muted">15 septembre 2024</small>
                    </div>
                    <div class="col-md-3 text-center">
                        <span class="status-badge status-paid">Payé</span>
                    </div>
                    <div class="col-md-3 text-right">
                        <h5 class="amount text-success mb-0">150 000 F</h5>
                        <small class="text-muted">Mobile Money</small>
                    </div>
                </div>
            </div>

            <!-- Paiement 2 -->
            <div class="payment-item">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h6 class="font-weight-bold mb-1">Frais de scolarité - Octobre</h6>
                        <p class="text-muted mb-1 small">Référence: PAY-2024-002</p>
                        <small class="text-muted">28 octobre 2024</small>
                    </div>
                    <div class="col-md-3 text-center">
                        <span class="status-badge status-paid">Payé</span>
                    </div>
                    <div class="col-md-3 text-right">
                        <h5 class="amount text-success mb-0">100 000 F</h5>
                        <small class="text-muted">Virement bancaire</small>
                    </div>
                </div>
            </div>

            <!-- Paiement 3 -->
            <div class="payment-item">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h6 class="font-weight-bold mb-1">Frais de scolarité - Novembre</h6>
                        <p class="text-muted mb-1 small">Référence: PAY-2024-003</p>
                        <small class="text-muted">15 novembre 2024</small>
                    </div>
                    <div class="col-md-3 text-center">
                        <span class="status-badge status-paid">Payé</span>
                    </div>
                    <div class="col-md-3 text-right">
                        <h5 class="amount text-success mb-0">100 000 F</h5>
                        <small class="text-muted">Espèces</small>
                    </div>
                </div>
            </div>

            <!-- Paiement 4 -->
            <div class="payment-item">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h6 class="font-weight-bold mb-1">Frais activités extra-scolaires</h6>
                        <p class="text-muted mb-1 small">Référence: PAY-2024-004</p>
                        <small class="text-muted">05 décembre 2024</small>
                    </div>
                    <div class="col-md-3 text-center">
                        <span class="status-badge status-paid">Payé</span>
                    </div>
                    <div class="col-md-3 text-right">
                        <h5 class="amount text-success mb-0">100 000 F</h5>
                        <small class="text-muted">Mobile Money</small>
                    </div>
                </div>
            </div>

            <!-- Paiement en attente -->
            <div class="payment-item">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h6 class="font-weight-bold mb-1">Frais de scolarité - Décembre</h6>
                        <p class="text-muted mb-1 small">Référence: PAY-2024-005</p>
                        <small class="text-muted">Échéance: 30 décembre 2024</small>
                    </div>
                    <div class="col-md-3 text-center">
                        <span class="status-badge status-pending">En Attente</span>
                    </div>
                    <div class="col-md-3 text-right">
                        <h5 class="amount text-warning mb-0">150 000 F</h5>
                        <small class="text-muted">À payer</small>
                    </div>
                </div>
            </div>

            <!-- Paiement en retard -->
            <div class="payment-item">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h6 class="font-weight-bold mb-1">Frais cantine - Novembre</h6>
                        <p class="text-muted mb-1 small">Référence: PAY-2024-006</p>
                        <small class="text-danger">En retard depuis: 10 jours</small>
                    </div>
                    <div class="col-md-3 text-center">
                        <span class="status-badge status-overdue">En Retard</span>
                    </div>
                    <div class="col-md-3 text-right">
                        <h5 class="amount text-danger mb-0">50 000 F</h5>
                        <small class="text-danger">+ pénalité: 5 000 F</small>
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
        // Animation de la barre de progression au chargement
        setTimeout(function() {
            $('.progress-bar').css('width', '60%');
        }, 500);
    });
</script>
@endsection
