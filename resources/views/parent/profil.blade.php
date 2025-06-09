@extends('layouts.app')

@section('styles')
@endsection

@section('content')
            <div class="container-fluid">
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb bg-white p-2">
                        <li class="breadcrumb-item">Menu Parent</li>
                        <span class="mx-2 text-muted">></span>
                        <li class="mb-0 text-primary" aria-current="page">Suivi des Enfants</li>
                    </ol>
                </nav>
                    <div class="col-lg-8 col-xl-9 mx-auto">
                        <!-- Informations des parents -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <!-- Père -->
                                    <div class="col-md-6 border-right">
                                        <h4 class="card-title mb-4"><i class="menu-icon fa fa-male mr-2"></i>Informations du Père</h4>

                                        <div class="form-group">
                                            <label><i class="menu-icon fa fa-user mr-2 text-primary"></i>Nom complet</label>
                                            <input type="text" class="form-control" value="Nom du père" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label><i class="menu-icon fa fa-phone mr-2 text-primary"></i>Téléphone</label>
                                            <input type="text" class="form-control" value="0123456789" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label><i class="menu-icon fa fa-envelope mr-2 text-primary"></i>Email</label>
                                            <input type="email" class="form-control" value="pere@email.com" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label><i class="menu-icon fa fa-briefcase mr-2 text-primary"></i>Profession</label>
                                            <input type="text" class="form-control" value="Profession du père" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label><i class="menu-icon fa fa-map-marker mr-2 text-primary"></i>Adresse</label>
                                            <textarea class="form-control" rows="2" readonly>Adresse du père</textarea>
                                        </div>
                                    </div>

                                    <!-- Mère -->
                                    <div class="col-md-6">
                                        <h4 class="card-title mb-4"><i class="menu-icon fa fa-female mr-2"></i>Informations de la Mère</h4>

                                        <div class="form-group">
                                            <label><i class="menu-icon fa fa-user mr-2 text-warning"></i>Nom complet</label>
                                            <input type="text" class="form-control" value="Nom de la mère" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label><i class="menu-icon fa fa-phone mr-2 text-warning"></i>Téléphone</label>
                                            <input type="text" class="form-control" value="0987654321" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label><i class="menu-icon fa fa-envelope mr-2 text-warning"></i>Email</label>
                                            <input type="email" class="form-control" value="mere@email.com" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label><i class="menu-icon fa fa-briefcase mr-2 text-warning"></i>Profession</label>
                                            <input type="text" class="form-control" value="Profession de la mère" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label><i class="menu-icon fa fa-map-marker mr-2 text-warning"></i>Adresse</label>
                                            <textarea class="form-control" rows="2" readonly>Adresse de la mère</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Réinitialisation du mot de passe -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <h4 class="card-title mb-4"><i class="menu-icon fa fa-lock mr-2 text-danger"></i>Réinitialiser le mot de passe</h4>
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label><i class="menu-icon fa fa-key mr-2"></i>Nouveau mot de passe</label>
                                            <input type="password" class="form-control" placeholder="Nouveau mot de passe">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label><i class="menu-icon fa fa-key mr-2"></i>Confirmer le mot de passe</label>
                                            <input type="password" class="form-control" placeholder="Confirmer le mot de passe">
                                        </div>
                                    </div>
                                    <button class="btn btn-warning"><i class="fa fa-refresh mr-1"></i>Changer le mot de passe</button>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
@endsection


@section('scripts')
@endsection
