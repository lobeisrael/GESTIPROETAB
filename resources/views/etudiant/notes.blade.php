@extends('layouts.app')

@section('styles')
<style>
    .notes-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #fff;
        padding: 15px 20px;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        margin-bottom: 20px;
        flex-wrap: wrap;
    }

    .filtre-select {
        background-color: #e9ecef;
        color: #212529;
        border: 1px solid #ced4da;
        border-radius: 6px;
        padding: 8px 14px;
        font-weight: 500;
    }

    .matiere-card {
        background: #fff;
        padding: 20px;
        margin-bottom: 25px;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .matiere-title {
        font-size: 1.3rem;
        font-weight: bold;
        color: #0d6efd;
        margin-bottom: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .badge-moyenne {
        background-color: #0d6efd;
        color: #fff;
        padding: 5px 10px;
        border-radius: 6px;
        font-size: 0.9rem;
    }

    .note-eleve {
        font-weight: bold;
        padding: 6px 10px;
        border-radius: 6px;
        color: #fff;
    }

    .note-eleve.vert { background-color: #28a745; }
    .note-eleve.orange { background-color: #ffc107; color: #000; }
    .note-eleve.rouge { background-color: #dc3545; }

    .chart-container {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.06);
        margin-bottom: 30px;
    }

    @media screen and (max-width: 768px) {
        .notes-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .matiere-title {
            flex-direction: column;
            align-items: flex-start;
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
                <i class="fa fa-home mr-2 text-primary"></i> Menu Parent
            </li>
            <li class="mx-2 text-secondary">›</li>
            <li class="breadcrumb-item d-flex align-items-center mb-0">
                <a href="{{ route('parent.enfants') }}" class="text-dark">
                     Suivi des Enfants
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
                  Notes
            </li>
        </ol>
    </nav>

    <!-- En-tête -->
    <div class="notes-header">
        <h4>Notes de l'élève : <span class="text-primary">Ali Traoré</span></h4>
        <div>
            <div class="button-dropdown">
                <div class="btn-group mb-1">
                    <button type="button" class="btn gradient-1 dropdown-toggle dropdown-toggle-split " data-toggle="dropdown"> 1er trimestre </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">1er trimestre</a>
                        <a class="dropdown-item" href="#">2ème trimestre</a>
                        <a class="dropdown-item" href="#">2ème trimestre</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Graphique global -->
    <div class="chart-container mb-4">
        <h5 class="text-center fw-bold mb-3">Moyenne par matière</h5>
        <canvas id="moyennesChart" height="100"></canvas>
    </div>

    <!-- Cartes matières -->
    @php
        $matieres = [
            ['nom' => 'Mathématiques', 'moyenne' => 12.8, 'notes' => [['Interro 1', '03/03/2025', 14, 20, 'Bon travail'], ['Contrôle continu', '15/03/2025', 11.5, 20, 'À approfondir'], ['Devoir maison', '22/03/2025', 8, 20, 'Peut mieux faire']]],
            ['nom' => 'SVT', 'moyenne' => 15.2, 'notes' => [['Contrôle', '05/03/2025', 16, 20, 'Excellent'], ['Interro', '18/03/2025', 14.5, 20, 'Très bien']]],
            ['nom' => 'Histoire-Géographie', 'moyenne' => 9.5, 'notes' => [['Devoir surveillé', '10/03/2025', 9.5, 20, 'Insuffisant']]],
        ];
    @endphp

    @foreach ($matieres as $matiere)
    <div class="matiere-card">
        <div class="matiere-title">
            <div>{{ $matiere['nom'] }}</div>
            <div class="badge-moyenne">Moyenne : {{ $matiere['moyenne'] }} / 20</div>
        </div>
        <table class="table table-bordered table-hover">
            <thead class="table-primary">
                <tr>
                    <th>Contrôle</th>
                    <th>Date</th>
                    <th>Note</th>
                    <th>Barème</th>
                    <th>Appréciation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($matiere['notes'] as $note)
                    @php
                        $val = $note[2];
                        $class = $val < 10 ? 'rouge' : ($val < 15 ? 'orange' : 'vert');
                    @endphp
                    <tr>
                        <td>{{ $note[0] }}</td>
                        <td>{{ $note[1] }}</td>
                        <td><span class="note-eleve {{ $class }}">{{ $note[2] }}</span></td>
                        <td>/{{ $note[3] }}</td>
                        <td>{{ $note[4] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endforeach

</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('moyennesChart').getContext('2d');
    const moyennesData = {
        labels: ['Mathématiques', 'SVT', 'Histoire-Géo'],
        datasets: [{
            label: 'Moyenne',
            data: [12.8, 15.2, 9.5],
            backgroundColor: ['#0d6efd', '#28a745', '#dc3545']
        }]
    };

    new Chart(ctx, {
        type: 'bar',
        data: moyennesData,
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 20
                }
            }
        }
    });
</script>
@endsection
