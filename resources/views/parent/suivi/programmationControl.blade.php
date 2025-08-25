@extends('layouts.app')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.5/main.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
    #calendar {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        padding: 10px;
    }
    .fc-toolbar-title {
        font-size: 1.25rem;
        color: #343a40;
        font-weight: 600;
    }
    .modal-header {
    background: linear-gradient(to right, #0d6b7c, #185a9d);
    color: white;
    border-top-left-radius: 6px;
    border-top-right-radius: 6px;
    }

    .modal-title {
        font-weight: 600;
        font-size: 1.2rem;
        color: #ffffff
    }

    .modal-body {
        font-size: 0.95rem;
        line-height: 1.5;
    }

    .modal-footer button {
        border-radius: 4px;
        font-weight: 500;
    }

    /* Icônes dans le modal */
    .modal-body i {
        margin-right: 8px;
        color: #185a9d;
    }

</style>
@endsection

@section('content')
<div class="container-fluid">
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
                  calendrier des controles
            </li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4"><i class="fa-solid fa-calendar-days text-primary mr-2"></i> Calendrier des devoirs / contrôles</h4>
            <div id="calendar"></div>
        </div>
    </div>
</div>

<!-- Modal pour détails de l’événement -->
<div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="eventModalLabel"><i class="fa-solid fa-clipboard-list mr-2"></i>Détail de l'événement</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Fermer">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Matière :</strong> <span id="modalSubject"></span></p>
                <p><strong>Début :</strong> <span id="modalStart"></span></p>
                <p><strong>Fin :</strong> <span id="modalEnd"></span></p>
                <p><strong>Description :</strong> <span id="modalDescription"></span></p>
            </div>
        </div>
    </div>
</div>
@endsection



@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.5/main.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'fr',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        slotMinTime: "07:00:00",
        slotDuration: '00:30:00',

        events: [
            {
                title: 'Mathématiques',
                start: '2025-06-15T08:00:00',
                end: '2025-06-15T09:00:00',
                backgroundColor: '#0d6b7c',
                borderColor: '#0d6b7c',
                extendedProps: {
                    description: "Interrogation sur les fonctions affines"
                }
            },
            {
                title: 'SVT',
                start: '2025-06-17T10:30:00',
                end: '2025-06-17T12:00:00',
                backgroundColor: '#185a9d',
                borderColor: '#185a9d',
                extendedProps: {
                    description: "Devoir sur les cellules"
                }
            }
        ],

        eventClick: function(info) {
            // Affiche les données dans le modal
            document.getElementById('modalSubject').textContent = info.event.title;
            document.getElementById('modalStart').textContent = new Date(info.event.start).toLocaleString('fr-FR');
            document.getElementById('modalEnd').textContent = new Date(info.event.end).toLocaleString('fr-FR');
            document.getElementById('modalDescription').textContent = info.event.extendedProps.description || 'Non spécifié';

            // Affiche le modal Bootstrap
            $('#eventModal').modal('show');
        }
    });

    calendar.render();
});

</script>
@endsection

