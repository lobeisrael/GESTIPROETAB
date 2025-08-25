@extends('layouts.app')

@section('styles')
<style>
    .bulletin-card {
        transition: all 0.3s ease;
        border: none;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .bulletin-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    .grade-badge {
        font-size: 1.1rem;
        font-weight: bold;
        padding: 8px 15px;
        border-radius: 25px;
    }

    .grade-excellent { background: linear-gradient(45deg, #28a745, #20c997); color: white; }
    .grade-good { background: linear-gradient(45deg, #17a2b8, #007bff); color: white; }
    .grade-average { background: linear-gradient(45deg, #ffc107, #fd7e14); color: white; }
    .grade-poor { background: linear-gradient(45deg, #dc3545, #e83e8c); color: white; }
    .grade-unavailable { background: linear-gradient(45deg, #6c757d, #495057); color: white; }

    .subject-row {
        border-left: 4px solid #007bff;
        background: #f8f9fa;
        margin-bottom: 5px;
        padding: 10px;
        border-radius: 0 8px 8px 0;
    }

    .trimester-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 15px 15px 0 0;
    }

    .student-info-card {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: white;
        border-radius: 15px;
    }

    .stats-card {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        color: white;
        border-radius: 15px;
    }

    .unavailable-content {
        background: linear-gradient(135deg, #bdc3c7 0%, #95a5a6 100%);
        color: white;
        text-align: center;
        padding: 60px 20px;
        border-radius: 15px;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb bg-white shadow-sm rounded px-4 py-2 align-items-center">
            <li class="breadcrumb-item d-flex align-items-center text-muted mb-0">
                <i class="fa fa-home mr-2 text-primary"></i> Menu Parent
            </li>
            <li class="mx-2 text-secondary">›</li>
            <li class="breadcrumb-item d-flex align-items-center mb-0">
                <a href="{{ route('parent.enfants') }}" class="text-dark">
                     Suivi Scolaire
                </a>
            </li>
            <li class="mx-2 text-secondary">›</li>
            <li class="breadcrumb-item d-flex align-items-center mb-0" aria-current="page">
                <a href="{{ route('parent.enfant.suivi', ['id' => 1]) }}" class="text-dark">
                 Suivi de l'enfant
                </a>
            </li>
            <li class="mx-2 text-secondary">›</li>
            <li class="breadcrumb-item active text-primary font-weight-bold mb-0" aria-current="page">
                 Bulletins de Notes
            </li>
        </ol>
    </nav>

    <!-- Informations de l'étudiant -->
    <div class="row mb-4">
        <div class="col-md-8">
            <div class="card student-info-card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-3 text-center">
                            <div class="rounded-circle bg-white d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                <i class="fa fa-user fa-2x text-primary"></i>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <h3 class="mb-1">KOUAME Marie Ange</h3>
                            <p class="mb-1"><i class="fa fa-graduation-cap mr-2"></i>Classe : 3ème A</p>
                            <p class="mb-1"><i class="fa fa-calendar mr-2"></i>Année Scolaire : 2024-2025</p>
                            <p class="mb-0"><i class="fa fa-id-badge mr-2"></i>Matricule : ETU2024001</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card stats-card">
                <div class="card-body text-center">
                    <h5 class="mb-3">Statistiques Générales</h5>
                    <div class="row">
                        <div class="col-6">
                            <h4 class="mb-1">14.5</h4>
                            <small>Moyenne Générale</small>
                        </div>
                        <div class="col-6">
                            <h4 class="mb-1">2/3</h4>
                            <small>Trimestres Validés</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bulletins par Trimestre -->
    <div class="row">
        <!-- Trimestre 1 -->
        <div class="col-lg-4 mb-4">
            <div class="card bulletin-card h-100">
                <div class="card-header trimester-header text-center py-3">
                    <h5 class="mb-0"><i class="fa fa-calendar-check mr-2"></i>1er Trimestre</h5>
                    <small>Septembre - Décembre 2024</small>
                </div>
                <div class="card-body">
                    <div class="text-center mb-3">
                        <span class="grade-badge grade-good">15.2/20</span>
                        <p class="text-muted mt-2 mb-0">Mention : Bien</p>
                    </div>

                    <div class="subjects-list">
                        <div class="subject-row">
                            <div class="d-flex justify-content-between align-items-center">
                                <span><i class="fa fa-book mr-2 text-primary"></i>Français</span>
                                <span class="badge badge-success">16/20</span>
                            </div>
                        </div>
                        <div class="subject-row">
                            <div class="d-flex justify-content-between align-items-center">
                                <span><i class="fa fa-calculator mr-2 text-primary"></i>Mathématiques</span>
                                <span class="badge badge-success">17/20</span>
                            </div>
                        </div>
                        <div class="subject-row">
                            <div class="d-flex justify-content-between align-items-center">
                                <span><i class="fa fa-flask mr-2 text-primary"></i>Sciences Physiques</span>
                                <span class="badge badge-primary">14/20</span>
                            </div>
                        </div>
                        <div class="subject-row">
                            <div class="d-flex justify-content-between align-items-center">
                                <span><i class="fa fa-leaf mr-2 text-primary"></i>SVT</span>
                                <span class="badge badge-primary">15/20</span>
                            </div>
                        </div>
                        <div class="subject-row">
                            <div class="d-flex justify-content-between align-items-center">
                                <span><i class="fa fa-leaf mr-2 text-primary"></i>SVT</span>
                                <span class="badge badge-primary">15/20</span>
                            </div>
                        </div>
                        <div class="subject-row">
                            <div class="d-flex justify-content-between align-items-center">
                                <span><i class="fa fa-leaf mr-2 text-primary"></i>SVT</span>
                                <span class="badge badge-primary">15/20</span>
                            </div>
                        </div>
                        <div class="subject-row">
                            <div class="d-flex justify-content-between align-items-center">
                                <span><i class="fa fa-globe mr-2 text-primary"></i>Histoire-Géo</span>
                                <span class="badge badge-primary">14.5/20</span>
                            </div>
                        </div>
                        <div class="subject-row">
                            <div class="d-flex justify-content-between align-items-center">
                                <span><i class="fa fa-language mr-2 text-primary"></i>Anglais</span>
                                <span class="badge badge-success">16.5/20</span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 pt-3 border-top">
                        <div class="d-flex justify-content-between">
                            <span class="text-muted">Rang:</span>
                            <span class="font-weight-bold">3ème/35</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="text-muted">Absences:</span>
                            <span class="font-weight-bold">2 jours</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light">
                    <small class="text-success"><i class="fa fa-check-circle mr-1"></i>Bulletin Disponible</small>
                    <button class="btn btn-primary btn-sm float-right">
                        <i class="fa fa-download mr-1"></i>Télécharger
                    </button>
                </div>
            </div>
        </div>

        <!-- Trimestre 2 -->
        <div class="col-lg-4 mb-4">
            <div class="card bulletin-card h-100">
                <div class="card-header trimester-header text-center py-3">
                    <h5 class="mb-0"><i class="fa fa-calendar-check mr-2"></i>2ème Trimestre</h5>
                    <small>Janvier - Mars 2025</small>
                </div>
                <div class="card-body">
                    <div class="text-center mb-3">
                        <span class="grade-badge grade-good">13.8/20</span>
                        <p class="text-muted mt-2 mb-0">Mention : Assez Bien</p>
                    </div>

                    <div class="subjects-list">
                        <div class="subject-row">
                            <div class="d-flex justify-content-between align-items-center">
                                <span><i class="fa fa-book mr-2 text-primary"></i>Français</span>
                                <span class="badge badge-primary">14/20</span>
                            </div>
                        </div>
                        <div class="subject-row">
                            <div class="d-flex justify-content-between align-items-center">
                                <span><i class="fa fa-calculator mr-2 text-primary"></i>Mathématiques</span>
                                <span class="badge badge-success">15.5/20</span>
                            </div>
                        </div>
                        <div class="subject-row">
                            <div class="d-flex justify-content-between align-items-center">
                                <span><i class="fa fa-flask mr-2 text-primary"></i>Sciences Physiques</span>
                                <span class="badge badge-warning">12/20</span>
                            </div>
                        </div>
                        <div class="subject-row">
                            <div class="d-flex justify-content-between align-items-center">
                                <span><i class="fa fa-leaf mr-2 text-primary"></i>SVT</span>
                                <span class="badge badge-primary">13.5/20</span>
                            </div>
                        </div>
                        <div class="subject-row">
                            <div class="d-flex justify-content-between align-items-center">
                                <span><i class="fa fa-globe mr-2 text-primary"></i>Histoire-Géo</span>
                                <span class="badge badge-primary">13/20</span>
                            </div>
                        </div>
                        <div class="subject-row">
                            <div class="d-flex justify-content-between align-items-center">
                                <span><i class="fa fa-language mr-2 text-primary"></i>Anglais</span>
                                <span class="badge badge-primary">14.5/20</span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 pt-3 border-top">
                        <div class="d-flex justify-content-between">
                            <span class="text-muted">Rang:</span>
                            <span class="font-weight-bold">8ème/35</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="text-muted">Absences:</span>
                            <span class="font-weight-bold">4 jours</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light">
                    <small class="text-success"><i class="fa fa-check-circle mr-1"></i>Bulletin Disponible</small>
                    <button class="btn btn-primary btn-sm float-right">
                        <i class="fa fa-download mr-1"></i>Télécharger
                    </button>
                </div>
            </div>
        </div>

        <!-- Trimestre 3 -->
        <div class="col-lg-4 mb-4">
            <div class="card bulletin-card h-100">
                <div class="card-header trimester-header text-center py-3">
                    <h5 class="mb-0"><i class="fa fa-calendar-times mr-2"></i>3ème Trimestre</h5>
                    <small>Avril - Juin 2025</small>
                </div>
                <div class="card-body">
                    <div class="unavailable-content">
                        <i class="fa fa-hourglass-half fa-3x mb-3 opacity-75"></i>
                        <h5 class="mb-3">Non Disponible</h5>
                        <p class="mb-0">Le trimestre n'est pas encore terminé.</p>
                        <small class="d-block mt-2">Bulletin disponible fin juin 2025</small>
                    </div>
                </div>
                <div class="card-footer bg-light">
                    <small class="text-muted"><i class="fa fa-clock mr-1"></i>En cours de trimestre</small>
                    <button class="btn btn-secondary btn-sm float-right" disabled>
                        <i class="fa fa-ban mr-1"></i>Indisponible
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Évolution des Notes -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fa fa-chart-line mr-2"></i>Évolution des Moyennes</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <canvas id="evolutionChart" style="height: 300px;"></canvas>
                        </div>
                        <div class="col-md-6">
                            <h6 class="mb-3">Observations du Conseil de Classe</h6>
                            <div class="alert alert-info">
                                <strong>1er Trimestre:</strong> Excellent travail, continuez ainsi. Élève sérieuse et appliquée.
                            </div>
                            <div class="alert alert-warning">
                                <strong>2ème Trimestre:</strong> Léger fléchissement en Sciences Physiques. Attention à maintenir l'effort.
                            </div>
                            <div class="alert alert-secondary">
                                <strong>3ème Trimestre:</strong> <em>Observations à venir...</em>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Graphique d'évolution des moyennes
    const ctx = document.getElementById('evolutionChart').getContext('2d');
    const evolutionChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['1er Trimestre', '2ème Trimestre', '3ème Trimestre'],
            datasets: [{
                label: 'Moyenne Générale',
                data: [15.2, 13.8, null],
                borderColor: '#007bff',
                backgroundColor: 'rgba(0, 123, 255, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.4,
                pointBackgroundColor: '#007bff',
                pointBorderColor: '#fff',
                pointBorderWidth: 2,
                pointRadius: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: false,
                    min: 10,
                    max: 20,
                    ticks: {
                        callback: function(value) {
                            return value + '/20';
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            if (context.parsed.y !== null) {
                                return 'Moyenne: ' + context.parsed.y + '/20';
                            }
                            return 'Non disponible';
                        }
                    }
                }
            }
        }
    });
</script>
@endsection
