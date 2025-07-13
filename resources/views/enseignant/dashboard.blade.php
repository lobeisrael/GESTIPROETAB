@extends('layouts.app')

@section('styles')
<!-- Ajoute ici tes styles pour les gradients si tu ne les as pas encore -->
<style>
    .card-hover {
        cursor: pointer;
        transition: transform 0.2s ease-in-out;
    }
    .card-hover:hover {
        transform: translateY(-5px);
    }

    .info-teacher {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 15px;
        padding: 2rem;
        color: white;
        margin-bottom: 2rem;
    }

    .info-teacher img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        border: 4px solid rgba(255, 255, 255, 0.3);
        object-fit: cover;
    }
</style>
@endsection

@section('content')

<div class="container-fluid">

    <!-- Breadcrumb / titre -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb bg-white shadow-sm rounded px-4 py-2 align-items-center">
            <li class="breadcrumb-item d-flex align-items-center text-muted mb-0">
                <a href="{{ route('enseignant.dashboard') }}"><i class="fa fa-home mr-2 text-primary"></i></a> Espace Enseignant
            </li>
            <li class="mx-2 text-secondary">›</li>
            <li class="breadcrumb-item active text-primary font-weight-bold mb-0" aria-current="page">
                Tableau de bord
            </li>
        </ol>
    </nav>

    <!-- Infos de l'enseignant -->
    <div class="info-teacher d-flex align-items-center mb-4">
        <img src="{{ asset('assets/images/user/teacher.png') }}" alt="Photo de profil" class="rounded-circle" width="100">
        <div class="ml-4">
            <h2 class="mb-2 font-weight-bold">Nom Prénom</h2>
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-1"><i class="fa fa-briefcase mr-2"></i><strong>Fonction :</strong> Enseignant</p>
                    <p class="mb-1"><i class="fa fa-envelope mr-2"></i><strong>Email :</strong> enseignant@ecole.ci</p>
                    <p class="mb-1"><i class="fa fa-phone mr-2"></i><strong>Téléphone :</strong> telephone ?? '+225 07 12 34 56 78</p>
                </div>
                <div class="col-md-6">
                    <p class="mb-1"><i class="fa fa-id-card mr-2"></i><strong>Matricule :</strong> ENS202400001</p>
                    <p class="mb-1"><i class="fa fa-calendar-alt mr-2"></i><strong>Date de recrutement :</strong> 15/09/2020</p>
                    <!-- Ajoute d'autres infos si besoin -->
                </div>
            </div>
        </div>
    </div>

    <!-- Cartes de navigation -->
    <div class="row">

        <!-- Mes Classes -->
        <div class="col-lg-4 col-md-6 mb-4">
            <a href="{{ route('enseignant.classes.index') }}">
                <div class="card gradient-1 card-hover">
                    <div class="card-body">
                        <h4 class="card-title text-white">Mes Classes</h4>
                        <p class="text-white mb-0">Gestion des classes & élèves</p>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                    </div>
                </div>
            </a>
        </div>

        <!-- Emploi du Temps -->
        <div class="col-lg-4 col-md-6 mb-4">
            <a href="{{ route('enseignant.emploi.index') }}">
                <div class="card gradient-2 card-hover">
                    <div class="card-body">
                        <h4 class="card-title text-white">Emploi du Temps</h4>
                        <p class="text-white mb-0">Vue hebdomadaire</p>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-calendar-alt"></i></span>
                    </div>
                </div>
            </a>
        </div>



        <!-- Demandes Administratives -->
        <div class="col-lg-4 col-md-6 mb-4">
            <a href="{{ route('enseignant.documents.index') }}">
                <div class="card gradient-3 card-hover">
                    <div class="card-body">
                        <h4 class="card-title text-white">Documents</h4>
                        <p class="text-white mb-0">Demandes & Historique</p>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-file-alt"></i></span>
                    </div>
                </div>
            </a>
        </div>

        <!-- Annonces -->
        <div class="col-lg-4 col-md-6 mb-4">
            <a href="{{ route('enseignant.annonces') }}">
                <div class="card gradient-4 card-hover">
                    <div class="card-body">
                        <h4 class="card-title text-white">Annonces</h4>
                        <p class="text-white mb-0">Messages de l'administration</p>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-bullhorn"></i></span>
                    </div>
                </div>
            </a>
        </div>

    </div>

</div>

@endsection

@section('scripts')
<!-- Si besoin, tes scripts spécifiques -->
@endsection
