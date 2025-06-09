@extends('layouts.app')

@section('styles')
<style>
    .edt-title {
        padding: 15px;
        border-radius: 5px;
        font-size: 1.5rem;
        font-weight: bold;
        display: flex;
        align-items: center;
        margin-bottom: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    .edt-title i {
        margin-right: 10px;
        color: #ffffff;
    }

    .edt-container {
        overflow-x: auto;
        margin-bottom: 30px;
    }

    .edt-table {
        background-color: #fff;
        border-collapse: collapse;
        width: 100%;
        min-width: 900px;
        box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }

    .edt-table th,
    .edt-table td {
        border: 1px solid #eaeaea;
        text-align: center;
        padding: 12px;
        vertical-align: middle;
    }



    .matiere {
        color: #fff;
        padding: 10px;
        border-radius: 6px;
        font-weight: bold;
        display: block;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .matiere-pause {
        color: #fff;
        padding: 10px;
        border-radius: 6px;
        font-weight: bold;
        display: block;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .matiere:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    .math       { background: #007bff; }
    .francais   { background: #28a745; }
    .svt        { background: #20c997; }
    .physique   { background: #6610f2; }
    .histoire   { background: #fd7e14; }
    .anglais    { background: #6f42c1; }
    .eps        { background: #dc3545; }
    .info       { background: #17a2b8; }
    .pause      {
        background: #f3f3f3;
        color: #6b6b6b;
        font-weight: normal;
    }

    /* Bandeau des légendes */
    .legend-container {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        margin-top: 20px;
    }

    .legend-item {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .legend-color {
        width: 20px;
        height: 20px;
        border-radius: 3px;
    }

    /* Responsive ajusté */
    @media (max-width: 768px) {
        .edt-title {
            font-size: 1.2rem;
            flex-wrap: wrap;
            justify-content: center;
            text-align: center;
        }

        .legend-container {
            justify-content: center;
        }
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Breadcrumb / titre -->
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
                  Emploie du temps
            </li>
        </ol>
    </nav>
    <!-- Titre -->
    <div class="edt-title gradient-2">
        <i class="fas fa-calendar-alt"></i> Emploi du Temps Hebdomadaire – Année 2024–2025
    </div>

    <!-- Tableau -->
    <div class="edt-container">
        <div class="button-dropdown">
            <div class="btn-group mb-1">
                <button type="button" class="btn gradient-2">Trimestre 1</button>
                <button type="button" class="btn gradient-1 dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"></button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Samaine 1</a>
                    <a class="dropdown-item" href="#">Samaine 2</a>
                    <a class="dropdown-item" href="#">Samaine 3</a>
                    <a class="dropdown-item" href="#">Samaine 4</a>
                    <a class="dropdown-item" href="#">Samaine 5</a>
                    <a class="dropdown-item" href="#">Samaine 6</a>
                    <a class="dropdown-item" href="#">Samaine 7</a>
                    <a class="dropdown-item" href="#">Samaine 8</a>
                    <a class="dropdown-item" href="#">Samaine 9</a>
                    <a class="dropdown-item" href="#">Samaine 10</a>
                    <a class="dropdown-item" href="#">Samaine 12</a>
                </div>
            </div>
            <div class="btn-group mb-1">
                <button type="button" class="btn gradient-2">Trimestre 2</button>
                <button type="button" class="btn gradient-1 dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"></button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Samaine 1</a>
                    <a class="dropdown-item" href="#">Samaine 2</a>
                    <a class="dropdown-item" href="#">Samaine 3</a>
                    <a class="dropdown-item" href="#">Samaine 4</a>
                    <a class="dropdown-item" href="#">Samaine 5</a>
                    <a class="dropdown-item" href="#">Samaine 6</a>
                    <a class="dropdown-item" href="#">Samaine 7</a>
                    <a class="dropdown-item" href="#">Samaine 8</a>
                    <a class="dropdown-item" href="#">Samaine 9</a>
                    <a class="dropdown-item" href="#">Samaine 10</a>
                    <a class="dropdown-item" href="#">Samaine 12</a>
                </div>
            </div>
            <div class="btn-group mb-1">
                <button type="button" class="btn gradient-2">Trimestre 3</button>
                <button type="button" class="btn gradient-1 dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"></button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Samaine 1</a>
                    <a class="dropdown-item" href="#">Samaine 2</a>
                    <a class="dropdown-item" href="#">Samaine 3</a>
                    <a class="dropdown-item" href="#">Samaine 4</a>
                    <a class="dropdown-item" href="#">Samaine 5</a>
                    <a class="dropdown-item" href="#">Samaine 6</a>
                    <a class="dropdown-item" href="#">Samaine 7</a>
                    <a class="dropdown-item" href="#">Samaine 8</a>
                    <a class="dropdown-item" href="#">Samaine 9</a>
                    <a class="dropdown-item" href="#">Samaine 10</a>
                    <a class="dropdown-item" href="#">Samaine 12</a>
                </div>
            </div>
        </div>
        <table class="edt-table">
            <thead class="gradient-1">
                <tr>
                    <th>Heure</th>
                    <th>Lundi</th>
                    <th>Mardi</th>
                    <th>Mercredi</th>
                    <th>Jeudi</th>
                    <th>Vendredi</th>
                    <th>Samedi</th>
                </tr>
            </thead>
            <tbody>
                <!-- MATINÉE -->
                <tr>
                    <td>07h30 - 08h30</td>
                    <td><span class="matiere math">Mathématiques</span></td>
                    <td><span class="matiere francais">Français</span></td>
                    <td><span class="matiere histoire">Histoire-Géo</span></td>
                    <td><span class="matiere svt">SVT</span></td>
                    <td><span class="matiere anglais">Anglais</span></td>
                    <td><span class="matiere eps">EPS</span></td>
                </tr>
                <tr>
                    <td>08h30 - 09h30</td>
                    <td><span class="matiere math">Mathématiques</span></td>
                    <td><span class="matiere francais">Français</span></td>
                    <td><span class="matiere physique">Physique</span></td>
                    <td><span class="matiere histoire">Histoire-Géo</span></td>
                    <td><span class="matiere info">Informatique</span></td>
                    <td><span class="matiere eps">EPS</span></td>
                </tr>
                <tr>
                    <td>09h30 - 10h30</td>
                    <td><span class="matiere info">Informatique</span></td>
                    <td><span class="matiere physique">Physique</span></td>
                    <td><span class="matiere svt">SVT</span></td>
                    <td><span class="matiere histoire">Histoire-Géo</span></td>
                    <td><span class="matiere anglais">Anglais</span></td>
                    <td><span class="matiere math">Mathématiques</span></td>
                </tr>
                <tr>
                    <td>10h30 - 11h30</td>
                    <td><span class="matiere histoire">Histoire-Géo</span></td>
                    <td><span class="matiere anglais">Anglais</span></td>
                    <td><span class="matiere math">Mathématiques</span></td>
                    <td><span class="matiere francais">Français</span></td>
                    <td><span class="matiere physique">Physique</span></td>
                    <td><span class="matiere svt">SVT</span></td>
                </tr>
                <tr>
                    <td>11h30 - 12h30</td>
                    <td><span class="matiere francais">Français</span></td>
                    <td><span class="matiere math">Mathématiques</span></td>
                    <td><span class="matiere anglais">Anglais</span></td>
                    <td><span class="matiere info">Informatique</span></td>
                    <td><span class="matiere svt">SVT</span></td>
                    <td><span class="matiere francais">Français</span></td>
                </tr>
                <!-- PAUSE MIDI -->
                <tr>
                    <td>12h30 - 14h00</td>
                    <td colspan="6"><span class="matiere-pause pause">Pause déjeuner</span></td>
                </tr>
                <!-- APRÈS-MIDI -->
                <tr>
                    <td>14h00 - 15h00</td>
                    <td><span class="matiere math">Mathématiques</span></td>
                    <td><span class="matiere svt">SVT</span></td>
                    <td><span class="matiere francais">Français</span></td>
                    <td><span class="matiere info">Informatique</span></td>
                    <td><span class="matiere histoire">Histoire-Géo</span></td>
                    <td><span class="matiere eps">EPS</span></td>
                </tr>
                <tr>
                    <td>15h00 - 16h00</td>
                    <td><span class="matiere physique">Physique</span></td>
                    <td><span class="matiere anglais">Anglais</span></td>
                    <td><span class="matiere math">Mathématiques</span></td>
                    <td><span class="matiere francais">Français</span></td>
                    <td><span class="matiere svt">SVT</span></td>
                    <td><span class="matiere info">Informatique</span></td>
                </tr>
                <tr>
                    <td>16h00 - 17h30</td>
                    <td colspan="6"><span class="matiere-pause pause">Activités, clubs, étude surveillée</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('scripts')
@endsection
