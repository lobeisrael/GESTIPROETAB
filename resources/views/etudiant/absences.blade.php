@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />
<style>
    .abs-title {
        background: #fff;
        padding: 15px;
        border-radius: 8px;
        font-size: 1.5rem;
        font-weight: bold;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        margin-bottom: 25px;
    }

    .abs-title i {
        margin-right: 10px;
        color: #ff0000;
    }

    .total-heures {

        color: white;
        padding: 10px 18px;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: bold;
        box-shadow: 0 3px 6px rgba(0,0,0,0.1);
    }

    .badge.justifie {
        background-color: #28a745;
    }

    .badge.non-justifie {
        background-color: #dc3545;
    }

    .chart-container {
        max-width: 500px;
        margin: 0 auto 40px auto;
        background: #fff;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.07);
    }

    .chart-container h5 {
        text-align: center;
        margin-bottom: 15px;
        font-weight: bold;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background-color: #0d6efd !important;
        color: #fff !important;
        border: none !important;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb bg-white shadow-sm rounded px-4 py-2 align-items-center">
            <li class="breadcrumb-item text-muted">
                <i class="fa fa-home text-primary me-2"></i> Menu Etudiant
            </li>
            <li class="mx-2 text-secondary">›</li>
            <li class="breadcrumb-item">
                <a href="{{ route('etudiant.enfants') }}" class="text-dark">Mon espace</a>
            </li>
            <li class="mx-2 text-secondary">›</li>
            <li class="breadcrumb-item">
                <a href="{{ route('etudiant.enfant.suivi', ['id' => 1]) }}" class="text-dark">Suivi de l'enfant</a>
            </li>
            <li class="mx-2 text-secondary">›</li>
            <li class="breadcrumb-item active text-primary font-weight-bold">Absences</li>
        </ol>
    </nav>

    <!-- Titre + Total -->
    <div class="abs-title">
        <span><i class="fas fa-user-clock"></i> Récapitulatif des Absences</span>
        <div class="total-heures gradient-4">Total : 14h d'absence</div>
    </div>
    <!-- Tableau -->
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle text-center" id="absencesTable">
                    <thead class="table-primary">
                        <tr>
                            <th>Date</th>
                            <th>Matière</th>
                            <th>Tranche horaire</th>
                            <th>Justification</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach($absences as $absence) --}}
                        <tr>
                            <td>03/05/2025</td>
                            <td><strong>Mathématiques</strong></td>
                            <td>08h30 – 09h30</td>
                            <td><span class="badge non-justifie text-white">Non</span></td>
                        </tr>
                        <tr>
                            <td>12/04/2025</td>
                            <td><strong>SVT</strong></td>
                            <td>10h30 – 11h30</td>
                            <td><span class="badge justifie text-white">oui</span></td>
                        </tr>
                        {{-- @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Graphique -->
    <div class="chart-container">
        <h5>Répartition des absences par matière</h5>
        <canvas id="pieAbsences"></canvas>
    </div>

</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    const ctx = document.getElementById('pieAbsences').getContext('2d');
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Mathématiques', 'Français', 'SVT', 'Physique', 'Anglais'],
            datasets: [{
                data: [4, 3, 2, 3, 2],
                backgroundColor: ['#007bff', '#28a745', '#20c997', '#6610f2', '#6f42c1']
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { position: 'bottom' } }
        }
    });

    $(document).ready(function () {
        $('#absencesTable').DataTable({
            pageLength: 10,
            lengthMenu: [5, 10, 25, 50],
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json"
            }
        });
    });
</script>
@endsection
