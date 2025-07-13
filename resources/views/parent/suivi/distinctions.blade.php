@extends('layouts.app')

@section('styles')
<style>
    .honor-card {
        transition: all 0.3s ease;
        border: none;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .honor-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    .award-badge {
        font-size: 1.1rem;
        font-weight: bold;
        padding: 8px 15px;
        border-radius: 25px;
    }

    .award-excellence { background: linear-gradient(45deg, #FFD700, #FFA500); color: #333; }
    .award-honor { background: linear-gradient(45deg, #C0C0C0, #A9A9A9); color: #333; }
    .award-merit { background: linear-gradient(45deg, #CD7F32, #8B4513); color: white; }
    .award-encouragement { background: linear-gradient(45deg, #20c997, #17a2b8); color: white; }
    .award-unavailable { background: linear-gradient(45deg, #6c757d, #495057); color: white; }

    .award-item {
        border-left: 4px solid #FFD700;
        background: linear-gradient(135deg, #FFF9E6 0%, #FFF3CD 100%);
        margin-bottom: 10px;
        padding: 15px;
        border-radius: 0 10px 10px 0;
        position: relative;
        overflow: hidden;
    }

    .award-item::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 60px;
        height: 60px;
        background: linear-gradient(45deg, #FFD700, #FFA500);
        transform: rotate(45deg) translate(20px, -20px);
        opacity: 0.1;
    }

    .award-item.honor {
        border-left-color: #C0C0C0;
        background: linear-gradient(135deg, #F8F9FA 0%, #E9ECEF 100%);
    }

    .award-item.merit {
        border-left-color: #CD7F32;
        background: linear-gradient(135deg, #FDF2E9 0%, #FADBD8 100%);
    }

    .award-item.encouragement {
        border-left-color: #20c997;
        background: linear-gradient(135deg, #E8F5E8 0%, #D4EDDA 100%);
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

    .medal-icon {
        font-size: 2rem;
        margin-right: 10px;
    }

    .medal-gold { color: #FFD700; }
    .medal-silver { color: #C0C0C0; }
    .medal-bronze { color: #CD7F32; }
    .medal-green { color: #20c997; }

    .certificate-item {
        background: white;
        border: 2px dashed #ddd;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 15px;
        text-align: center;
        transition: all 0.3s ease;
    }

    .certificate-item:hover {
        border-color: #007bff;
        background: #f8f9ff;
    }

    .achievement-timeline {
        position: relative;
        padding-left: 30px;
    }

    .achievement-timeline::before {
        content: '';
        position: absolute;
        left: 15px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: linear-gradient(to bottom, #FFD700, #FFA500);
    }

    .timeline-item {
        position: relative;
        margin-bottom: 20px;
    }

    .timeline-item::before {
        content: '';
        position: absolute;
        left: -37px;
        top: 50%;
        transform: translateY(-50%);
        width: 12px;
        height: 12px;
        background: #FFD700;
        border-radius: 50%;
        border: 3px solid white;
        box-shadow: 0 0 0 3px #FFD700;
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
                     Suivi des Enfants
                </a>
            </li>
            <li class="mx-2 text-secondary">›</li>
            <li class="breadcrumb-item active text-primary font-weight-bold mb-0" aria-current="page">
                 Tableaux d'Honneur & Distinctions
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
                                <i class="fa fa-trophy fa-2x text-warning"></i>
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
                    <h5 class="mb-3">Statistiques Récompenses</h5>
                    <div class="row">
                        <div class="col-6">
                            <h4 class="mb-1">3</h4>
                            <small>Total Distinctions</small>
                        </div>
                        <div class="col-6">
                            <h4 class="mb-1">1</h4>
                            <small>Tableau d'Excellence</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tableaux d'Honneur par Trimestre -->
    <div class="row">
        <!-- Trimestre 1 -->
        <div class="col-lg-4 mb-4">
            <div class="card honor-card h-100">
                <div class="card-header trimester-header text-center py-3">
                    <h5 class="mb-0"><i class="fa fa-medal mr-2"></i>1er Trimestre</h5>
                    <small>Septembre - Décembre 2024</small>
                </div>
                <div class="card-body">
                    <div class="text-center mb-3">
                        <span class="award-badge award-excellence">
                            <i class="fa fa-trophy mr-1"></i>Tableau d'Excellence
                        </span>
                        <p class="text-muted mt-2 mb-0">Moyenne : 15.2/20</p>
                    </div>

                    <div class="awards-list">
                        <div class="award-item">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-trophy medal-icon medal-gold"></i>
                                <div>
                                    <h6 class="mb-1">Tableau d'Excellence</h6>
                                    <small class="text-muted">Moyenne générale ≥ 15/20</small>
                                </div>
                            </div>
                        </div>

                        <div class="award-item merit">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-award medal-icon medal-bronze"></i>
                                <div>
                                    <h6 class="mb-1">Prix d'Excellence en Mathématiques</h6>
                                    <small class="text-muted">Note : 17/20</small>
                                </div>
                            </div>
                        </div>

                        <div class="award-item encouragement">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-star medal-icon medal-green"></i>
                                <div>
                                    <h6 class="mb-1">Félicitations du Conseil</h6>
                                    <small class="text-muted">Comportement exemplaire</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light">
                    <small class="text-success"><i class="fa fa-check-circle mr-1"></i>Certificat Disponible</small>
                    <button class="btn btn-warning btn-sm float-right">
                        <i class="fa fa-download mr-1"></i>Télécharger
                    </button>
                </div>
            </div>
        </div>

        <!-- Trimestre 2 -->
        <div class="col-lg-4 mb-4">
            <div class="card honor-card h-100">
                <div class="card-header trimester-header text-center py-3">
                    <h5 class="mb-0"><i class="fa fa-medal mr-2"></i>2ème Trimestre</h5>
                    <small>Janvier - Mars 2025</small>
                </div>
                <div class="card-body">
                    <div class="text-center mb-3">
                        <span class="award-badge award-honor">
                            <i class="fa fa-medal mr-1"></i>Tableau d'Honneur
                        </span>
                        <p class="text-muted mt-2 mb-0">Moyenne : 13.8/20</p>
                    </div>

                    <div class="awards-list">
                        <div class="award-item honor">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-medal medal-icon medal-silver"></i>
                                <div>
                                    <h6 class="mb-1">Tableau d'Honneur</h6>
                                    <small class="text-muted">Moyenne générale ≥ 13/20</small>
                                </div>
                            </div>
                        </div>

                        <div class="award-item encouragement">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-thumbs-up medal-icon medal-green"></i>
                                <div>
                                    <h6 class="mb-1">Encouragements</h6>
                                    <small class="text-muted">Efforts soutenus</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light">
                    <small class="text-success"><i class="fa fa-check-circle mr-1"></i>Certificat Disponible</small>
                    <button class="btn btn-info btn-sm float-right">
                        <i class="fa fa-download mr-1"></i>Télécharger
                    </button>
                </div>
            </div>
        </div>

        <!-- Trimestre 3 -->
        <div class="col-lg-4 mb-4">
            <div class="card honor-card h-100">
                <div class="card-header trimester-header text-center py-3">
                    <h5 class="mb-0"><i class="fa fa-calendar-times mr-2"></i>3ème Trimestre</h5>
                    <small>Avril - Juin 2025</small>
                </div>
                <div class="card-body">
                    <div class="unavailable-content">
                        <i class="fa fa-hourglass-half fa-3x mb-3 opacity-75"></i>
                        <h5 class="mb-3">Non Disponible</h5>
                        <p class="mb-0">Le trimestre n'est pas encore terminé.</p>
                        <small class="d-block mt-2">Distinctions disponibles fin juin 2025</small>
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

    <!-- Historique des Récompenses -->
    <div class="row mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0"><i class="fa fa-history mr-2"></i>Historique des Distinctions</h5>
                </div>
                <div class="card-body">
                    <div class="achievement-timeline">
                        <div class="timeline-item">
                            <div class="card border-warning">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <h6 class="text-warning mb-1">
                                                <i class="fa fa-trophy mr-2"></i>Tableau d'Excellence
                                            </h6>
                                            <p class="mb-1">1er Trimestre 2024-2025</p>
                                            <small class="text-muted">Moyenne : 15.2/20 - Rang : 3ème/35</small>
                                        </div>
                                        <span class="badge badge-warning">Excellence</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <div class="card border-info">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <h6 class="text-info mb-1">
                                                <i class="fa fa-medal mr-2"></i>Tableau d'Honneur
                                            </h6>
                                            <p class="mb-1">2ème Trimestre 2024-2025</p>
                                            <small class="text-muted">Moyenne : 13.8/20 - Rang : 8ème/35</small>
                                        </div>
                                        <span class="badge badge-info">Honneur</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <div class="card border-success">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <h6 class="text-success mb-1">
                                                <i class="fa fa-award mr-2"></i>Prix d'Excellence en Mathématiques
                                            </h6>
                                            <p class="mb-1">1er Trimestre 2024-2025</p>
                                            <small class="text-muted">Note obtenue : 17/20</small>
                                        </div>
                                        <span class="badge badge-success">Matière</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0"><i class="fa fa-certificate mr-2"></i>Certificats</h5>
                </div>
                <div class="card-body">
                    <div class="certificate-item">
                        <i class="fa fa-file-pdf fa-2x text-danger mb-2"></i>
                        <h6>Certificat d'Excellence</h6>
                        <small class="text-muted">1er Trimestre</small>
                        <div class="mt-2">
                            <button class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-eye mr-1"></i>Voir
                            </button>
                            <button class="btn btn-sm btn-outline-success">
                                <i class="fa fa-download mr-1"></i>Télécharger
                            </button>
                        </div>
                    </div>

                    <div class="certificate-item">
                        <i class="fa fa-file-pdf fa-2x text-danger mb-2"></i>
                        <h6>Certificat d'Honneur</h6>
                        <small class="text-muted">2ème Trimestre</small>
                        <div class="mt-2">
                            <button class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-eye mr-1"></i>Voir
                            </button>
                            <button class="btn btn-sm btn-outline-success">
                                <i class="fa fa-download mr-1"></i>Télécharger
                            </button>
                        </div>
                    </div>

                    <div class="certificate-item" style="opacity: 0.5;">
                        <i class="fa fa-file fa-2x text-muted mb-2"></i>
                        <h6 class="text-muted">Certificat 3ème Trimestre</h6>
                        <small class="text-muted">Non disponible</small>
                        <div class="mt-2">
                            <button class="btn btn-sm btn-secondary" disabled>
                                <i class="fa fa-ban mr-1"></i>Indisponible
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Graphique des Performances -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fa fa-chart-bar mr-2"></i>Évolution des Distinctions</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <canvas id="performanceChart" style="height: 300px;"></canvas>
                        </div>
                        <div class="col-md-6">
                            <h6 class="mb-3">Critères d'Attribution</h6>
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fa fa-trophy text-warning mr-2"></i>
                                        <strong>Tableau d'Excellence</strong>
                                    </div>
                                    <small class="text-muted">Moyenne générale ≥ 15/20 et aucune note < 10/20</small>
                                </div>

                                <div class="col-12 mb-3">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fa fa-medal text-info mr-2"></i>
                                        <strong>Tableau d'Honneur</strong>
                                    </div>
                                    <small class="text-muted">Moyenne générale ≥ 13/20 et aucune note < 8/20</small>
                                </div>

                                <div class="col-12 mb-3">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fa fa-thumbs-up text-success mr-2"></i>
                                        <strong>Encouragements</strong>
                                    </div>
                                    <small class="text-muted">Efforts remarquables et progression notable</small>
                                </div>
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
    // Graphique des performances et distinctions
    const ctx = document.getElementById('performanceChart').getContext('2d');
    const performanceChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['1er Trimestre', '2ème Trimestre', '3ème Trimestre'],
            datasets: [
                {
                    label: 'Moyenne Générale',
                    data: [15.2, 13.8, null],
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                    type: 'line',
                    fill: false,
                    tension: 0.4,
                    yAxisID: 'y'
                },
                {
                    label: 'Niveau de Distinction',
                    data: [3, 2, null], // 3=Excellence, 2=Honneur, 1=Encouragement, 0=Aucune
                    backgroundColor: [
                        'rgba(255, 215, 0, 0.7)', // Gold for Excellence
                        'rgba(192, 192, 192, 0.7)', // Silver for Honor
                        'rgba(128, 128, 128, 0.3)' // Gray for unavailable
                    ],
                    borderColor: [
                        'rgba(255, 215, 0, 1)',
                        'rgba(192, 192, 192, 1)',
                        'rgba(128, 128, 128, 1)'
                    ],
                    borderWidth: 2,
                    yAxisID: 'y1'
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: {
                mode: 'index',
                intersect: false,
            },
            scales: {
                y: {
                    type: 'linear',
                    display: true,
                    position: 'left',
                    min: 10,
                    max: 20,
                    ticks: {
                        callback: function(value) {
                            return value + '/20';
                        }
                    },
                    title: {
                        display: true,
                        text: 'Moyenne Générale'
                    }
                },
                y1: {
                    type: 'linear',
                    display: true,
                    position: 'right',
                    min: 0,
                    max: 3,
                    ticks: {
                        stepSize: 1,
                        callback: function(value) {
                            const levels = ['Aucune', 'Encouragement', 'Honneur', 'Excellence'];
                            return levels[value] || '';
                        }
                    },
                    title: {
                        display: true,
                        text: 'Niveau de Distinction'
                    },
                    grid: {
                        drawOnChartArea: false,
                    },
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
                            if (context.datasetIndex === 0) {
                                return context.parsed.y !== null ?
                                    'Moyenne: ' + context.parsed.y + '/20' :
                                    'Moyenne: Non disponible';
                            } else {
                                const levels = ['Aucune', 'Encouragement', 'Honneur', 'Excellence'];
                                return context.parsed.y !== null ?
                                    'Distinction: ' + levels[context.parsed.y] :
                                    'Distinction: Non disponible';
                            }
                        }
                    }
                }
            }
        }
    });
</script>
@endsection
