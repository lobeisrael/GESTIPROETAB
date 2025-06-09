@extends('layouts.app')

@section('styles')
@endsection

@section('content')
            <div class="container-fluid">
                <!-- Breadcrumb / titre -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb bg-white rounded px-4 py-2 align-items-center">
                        <li class="breadcrumb-item d-flex align-items-center text-muted mb-0">
                            <i class="fa fa-home mr-2 text-primary"></i> Menu Parent
                        </li>
                        <li class="mx-2 text-secondary">›</li>
                        <li class="breadcrumb-item active text-primary font-weight-bold mb-0" aria-current="page">
                            Suivi des Enfants
                        </li>
                    </ol>
                </nav>
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="row">
                            <!-- Enfant 1 -->
                            <div class="col-md-4">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <img src="{{ asset('assets/images/user/1.png') }}" class="rounded-circle mb-3" width="80" height="80" alt="Photo enfant">
                                        <h5 class="card-title">Yasmine Koné</h5>
                                        <p class="text-muted">Classe : 6e A</p>
                                        <a href="{{ route('parent.enfant.suivi', ['id' => 1]) }}" class="btn btn-primary btn-sm mb-2 d-block">
                                            Suivi de l'enfant <i class="fa-solid fa-arrow-up-right-from-square ml-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Enfant 1 -->
                            <div class="col-md-4">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <img src="{{ asset('assets/images/user/1.png') }}" class="rounded-circle mb-3" width="80" height="80" alt="Photo enfant">
                                        <h5 class="card-title">Yasmine Koné</h5>
                                        <p class="text-muted">Classe : 6e A</p>
                                        <a href="{{ route('parent.enfant.suivi', ['id' => 1]) }}" class="btn btn-primary btn-sm mb-2 d-block">
                                            Suivi de l'enfant <i class="fa-solid fa-arrow-up-right-from-square ml-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Enfant 1 -->
                            <div class="col-md-4">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <img src="{{ asset('assets/images/user/1.png') }}" class="rounded-circle mb-3" width="80" height="80" alt="Photo enfant">
                                        <h5 class="card-title">Yasmine Koné</h5>
                                        <p class="text-muted">Classe : 6e A</p>
                                        <a href="{{ route('parent.enfant.suivi', ['id' => 1]) }}" class="btn btn-primary btn-sm mb-2 d-block">
                                            Suivi de l'enfant <i class="fa-solid fa-arrow-up-right-from-square ml-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Enfant 1 -->
                            <div class="col-md-4">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <img src="{{ asset('assets/images/user/1.png') }}" class="rounded-circle mb-3" width="80" height="80" alt="Photo enfant">
                                        <h5 class="card-title">Yasmine Koné</h5>
                                        <p class="text-muted">Classe : 6e A</p>
                                        <a href="{{ route('parent.enfant.suivi', ['id' => 1]) }}" class="btn btn-primary btn-sm mb-2 d-block">
                                            Suivi de l'enfant <i class="fa-solid fa-arrow-up-right-from-square ml-2"></i>
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
