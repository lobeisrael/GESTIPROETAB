@extends('layouts.app')

@section('styles')
@endsection

@section('content')
            <div class="container-fluid">
                <div class="d-flex align-items-center mb-4">
                    <h6 class="text-muted mb-0 mr-2">
                        <i class="icon-home menu-icon"></i> Menu Parent
                    </h6>
                    <span class="mx-2 text-muted">></span>
                    <h4 class="mb-0 text-primary">
                        Suivi des Enfants
                    </h4>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="row">
                            <!-- Enfant 1 -->
                            <div class="col-md-4">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <img src="images/avatar/1.png" class="rounded-circle mb-3" width="80" height="80" alt="Photo enfant">
                                        <h5 class="card-title">Yasmine Koné</h5>
                                        <p class="text-muted">Classe : 6e A</p>
                                        <p>Moyenne Générale : <strong>14.75</strong> / 20</p>
                                        <a href="#" class="btn btn-primary btn-sm mb-2 d-block">
                                            <i class="icon-notebook menu-icon"></i> Voir les bulletins
                                        </a>
                                        <a href="#" class="btn btn-info btn-sm mb-2 d-block">
                                            <i class="icon-doc menu-icon"></i> Copies scannées
                                        </a>
                                        <a href="#" class="btn btn-success btn-sm d-block">
                                            <i class="icon-trophy menu-icon"></i> Distinctions
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Enfant 2 -->
                            <div class="col-md-4">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <img src="images/avatar/2.png" class="rounded-circle mb-3" width="80" height="80" alt="Photo enfant">
                                        <h5 class="card-title">Ismaël Koné</h5>
                                        <p class="text-muted">Classe : CE2</p>
                                        <p>Moyenne Générale : <strong>16.20</strong> / 20</p>
                                        <a href="#" class="btn btn-primary btn-sm mb-2 d-block">
                                            <i class="icon-notebook menu-icon"></i> Voir les bulletins
                                        </a>
                                        <a href="#" class="btn btn-info btn-sm mb-2 d-block">
                                            <i class="icon-doc menu-icon"></i> Copies scannées
                                        </a>
                                        <a href="#" class="btn btn-success btn-sm d-block">
                                            <i class="icon-trophy menu-icon"></i> Distinctions
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Enfant 3 -->
                            <div class="col-md-4">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <img src="images/avatar/3.png" class="rounded-circle mb-3" width="80" height="80" alt="Photo enfant">
                                        <h5 class="card-title">Aminata Koné</h5>
                                        <p class="text-muted">Classe : Terminale C</p>
                                        <p>Moyenne Générale : <strong>17.10</strong> / 20</p>
                                        <a href="#" class="btn btn-primary btn-sm mb-2 d-block">
                                            <i class="icon-notebook menu-icon"></i> Voir les bulletins
                                        </a>
                                        <a href="#" class="btn btn-info btn-sm mb-2 d-block">
                                            <i class="icon-doc menu-icon"></i> Copies scannées
                                        </a>
                                        <a href="#" class="btn btn-success btn-sm d-block">
                                            <i class="icon-trophy menu-icon"></i> Distinctions
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end row -->
                    </div>
                </div>
            </div>

@endsection


@section('scripts')
@endsection
