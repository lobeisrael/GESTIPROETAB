@extends('layouts.app')

@section('styles')
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.4.0/css/fixedHeader.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.3.0/css/fixedColumns.bootstrap4.min.css">

<style>
    .notes-container {
        background:  #ffffff;
        border-radius: 15px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }

    .card-custom {
        border: none;
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        background: white;
        backdrop-filter: blur(10px);
    }

    .card-header-custom {
        background: linear-gradient(90deg, #4facfe 0%, #00f2fe 100%);
        color: white;
        border-radius: 15px 15px 0 0 !important;
        padding: 1.5rem;
        border: none;
    }

    .stats-card {
        background: linear-gradient(45deg, #ff6b6b, #ee5a52);
        color: white;
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 1rem;
        box-shadow: 0 4px 15px rgba(238, 90, 82, 0.3);
    }

    .stats-card.success {
        background: linear-gradient(45deg, #51cf66, #40c057);
        box-shadow: 0 4px 15px rgba(64, 192, 87, 0.3);
    }

    .stats-card.info {
        background: linear-gradient(45deg, #339af0, #228be6);
        box-shadow: 0 4px 15px rgba(34, 139, 230, 0.3);
    }

    .stats-card.warning {
        background: linear-gradient(45deg, #ffd43b, #fab005);
        box-shadow: 0 4px 15px rgba(250, 176, 5, 0.3);
    }

    #studentsTable {
        border-radius: 10px;
        overflow: hidden;
    }

    #studentsTable thead th {
        background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        font-weight: 600;
        text-align: center;
        vertical-align: middle;
        white-space: nowrap;
        position: sticky;
        top: 0;
        z-index: 10;
    }

    #studentsTable tbody td {
        text-align: center;
        vertical-align: middle;
        border-bottom: 1px solid #eee;
        padding: 12px 8px;
    }

    #studentsTable tbody tr:hover {
        background: linear-gradient(90deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
        transform: translateY(-1px);
        transition: all 0.3s ease;
    }

    .note-cell {
        font-weight: 600;
        border-radius: 6px;
        padding: 8px 12px;
        min-width: 60px;
        display: inline-block;
    }

    .note-excellent { background: #d4edda; color: #155724; }
    .note-good { background: #cce5ff; color: #004085; }
    .note-average { background: #fff3cd; color: #856404; }
    .note-poor { background: #f8d7da; color: #721c24; }

    .moyenne-cell {
        font-weight: bold;
        font-size: 1.1em;
        border-radius: 8px;
        padding: 10px 15px;
    }

    .student-info {
        text-align: left !important;
        min-width: 200px;
    }

    .student-name {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 2px;
    }

    .student-matricule {
        font-size: 0.9em;
        color: #7f8c8d;
        font-style: italic;
    }

    .dataTables_wrapper .dataTables_length select,
    .dataTables_wrapper .dataTables_filter input {
        border-radius: 8px;
        border: 2px solid #e9ecef;
        padding: 8px 12px;
    }

    .dataTables_wrapper .dataTables_length select:focus,
    .dataTables_wrapper .dataTables_filter input:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
    }

    .btn-gradient {
        background: linear-gradient(45deg, #667eea, #764ba2);
        border: none;
        color: white;
        border-radius: 8px;
        padding: 8px 16px;
        transition: all 0.3s ease;
    }

    .btn-gradient:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        color: white;
    }

    /* Responsive improvements */
    @media (max-width: 768px) {
        .notes-container {
            margin: 0 -15px;
            border-radius: 0;
        }

        .stats-card {
            margin-bottom: 0.5rem;
            padding: 1rem;
        }
    }

    /* DataTables custom scrollbar */
    .dataTables_scrollBody::-webkit-scrollbar {
        height: 8px;
    }

    .dataTables_scrollBody::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 4px;
    }

    .dataTables_scrollBody::-webkit-scrollbar-thumb {
        background: linear-gradient(90deg, #667eea, #764ba2);
        border-radius: 4px;
    }

    .dataTables_scrollBody::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(90deg, #5a6fd8, #6a4190);
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
                Gestion des Notes
            </li>
        </ol>
    </nav>

    <div class="notes-container">
        <!-- Statistiques rapides -->
        <div class="row mb-4">
            <div class="col-lg-3 col-md-6">
                <div class="stats-card info">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-users fa-2x mr-3"></i>
                        <div>
                            <h4 class="mb-0" id="totalStudents">0</h4>
                            <p class="mb-0">Total Étudiants</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stats-card success">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-chart-line fa-2x mr-3"></i>
                        <div>
                            <h4 class="mb-0" id="averageGrade">0</h4>
                            <p class="mb-0">Moyenne Classe</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stats-card warning">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-clipboard-list fa-2x mr-3"></i>
                        <div>
                            <h4 class="mb-0" id="totalEvaluations">0</h4>
                            <p class="mb-0">Évaluations</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stats-card">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-exclamation-triangle fa-2x mr-3"></i>
                        <div>
                            <h4 class="mb-0" id="studentsAtRisk">0</h4>
                            <p class="mb-0">En Difficulté</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tableau des notes -->
        <div class="card card-custom">
            <div class="card-header card-header-custom">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="mb-0"><i class="fas fa-table mr-2"></i>Tableau des Notes</h4>
                        <small>Suivi détaillé des performances étudiantes</small>
                    </div>
                    <div class="btn-group">
                        <button class="btn btn-light btn-sm" onclick="exportData('excel')">
                            <i class="fas fa-file-excel mr-1"></i>Excel
                        </button>
                        <button class="btn btn-light btn-sm" onclick="exportData('pdf')">
                            <i class="fas fa-file-pdf mr-1"></i>PDF
                        </button>
                        <button class="btn btn-light btn-sm" onclick="printTable()">
                            <i class="fas fa-print mr-1"></i>Imprimer
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table id="studentsTable" class="table table-hover mb-0" style="width:100%">
                        <thead>
                            <tr>
                                <th style="min-width: 200px;">Étudiant</th>
                                <th style="min-width: 80px;">Interro 1</th>
                                <th style="min-width: 80px;">Interro 2</th>
                                <th style="min-width: 80px;">Interro 3</th>
                                <th style="min-width: 80px;">Devoir 1</th>
                                <th style="min-width: 80px;">Devoir 2</th>
                                <th style="min-width: 80px;">Examen</th>
                                <th style="min-width: 100px;">Moyenne</th>
                                <th style="min-width: 80px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="studentsTableBody">
                            <!-- Les données seront injectées ici par JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal pour édition rapide -->
<div class="modal fade" id="editGradeModal" tabindex="-1" role="dialog" aria-labelledby="editGradeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="editGradeModalLabel">
                    <i class="fas fa-edit mr-2"></i>Modifier la Note
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editGradeForm">
                    <div class="form-group">
                        <label for="studentName">Étudiant</label>
                        <input type="text" class="form-control" id="studentName" readonly>
                    </div>
                    <div class="form-group">
                        <label for="evaluationType">Évaluation</label>
                        <input type="text" class="form-control" id="evaluationType" readonly>
                    </div>
                    <div class="form-group">
                        <label for="newGrade">Nouvelle Note (sur 20)</label>
                        <input type="number" class="form-control" id="newGrade" min="0" max="20" step="0.5" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-primary" onclick="saveGrade()">
                    <i class="fas fa-save mr-1"></i>Sauvegarder
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.4.0/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/4.3.0/js/dataTables.fixedColumns.min.js"></script>

<script>
$(document).ready(function() {
    // Données d'exemple (à remplacer par vos vraies données)
    const studentsData = [
        {
            nom: "KOUAME",
            prenom: "Jean",
            matricule: "ETU001",
            interro1: 15.5,
            interro2: 12.0,
            interro3: 18.5,
            devoir1: 14.0,
            devoir2: 16.5,
            examen: 13.5
        },
        {
            nom: "DIABATE",
            prenom: "Marie",
            matricule: "ETU002",
            interro1: 17.0,
            interro2: 15.5,
            interro3: 16.0,
            devoir1: 18.0,
            devoir2: 17.5,
            examen: 16.5
        },
        {
            nom: "TRAORE",
            prenom: "Ibrahim",
            matricule: "ETU003",
            interro1: 10.5,
            interro2: 8.0,
            interro3: 12.0,
            devoir1: 11.5,
            devoir2: 9.5,
            examen: 10.0
        },
        {
            nom: "KONE",
            prenom: "Fatou",
            matricule: "ETU004",
            interro1: 14.0,
            interro2: 16.5,
            interro3: 15.0,
            devoir1: 17.0,
            devoir2: 14.5,
            examen: 15.5
        },
        {
            nom: "OUATTARA",
            prenom: "Seydou",
            matricule: "ETU005",
            interro1: 13.5,
            interro2: 14.0,
            interro3: 11.5,
            devoir1: 12.0,
            devoir2: 15.0,
            examen: 14.0
        }
    ];

    // Fonction pour calculer la moyenne
    function calculateAverage(student) {
        const grades = [student.interro1, student.interro2, student.interro3,
                       student.devoir1, student.devoir2, student.examen];
        const validGrades = grades.filter(grade => grade !== null && grade !== undefined && grade !== '');
        return validGrades.length > 0 ? (validGrades.reduce((a, b) => a + b, 0) / validGrades.length).toFixed(2) : 0;
    }

    // Fonction pour styler les notes
    function styleGrade(grade) {
        if (grade === null || grade === undefined || grade === '') return '<span class="text-muted">-</span>';

        let className = '';
        if (grade >= 16) className = 'note-excellent';
        else if (grade >= 14) className = 'note-good';
        else if (grade >= 10) className = 'note-average';
        else className = 'note-poor';

        return `<span class="note-cell ${className}">${grade}</span>`;
    }

    // Fonction pour styler la moyenne
    function styleAverage(average) {
        let className = '';
        if (average >= 16) className = 'note-excellent';
        else if (average >= 14) className = 'note-good';
        else if (average >= 10) className = 'note-average';
        else className = 'note-poor';

        return `<span class="moyenne-cell ${className}">${average}/20</span>`;
    }

    // Préparer les données pour DataTables
    const tableData = studentsData.map((student, index) => {
        const moyenne = calculateAverage(student);
        return [
            `<div class="student-info">
                <div class="student-name">${student.nom} ${student.prenom}</div>
                <div class="student-matricule">${student.matricule}</div>
            </div>`,
            styleGrade(student.interro1),
            styleGrade(student.interro2),
            styleGrade(student.interro3),
            styleGrade(student.devoir1),
            styleGrade(student.devoir2),
            styleGrade(student.examen),
            styleAverage(moyenne),
            `<div class="btn-group btn-group-sm">
                <button class="btn btn-outline-primary btn-sm" onclick="editGrade(${index}, 'interro1')" title="Modifier">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-outline-info btn-sm" onclick="viewDetails(${index})" title="Détails">
                    <i class="fas fa-eye"></i>
                </button>
            </div>`
        ];
    });

    // Initialiser DataTables
    const table = $('#studentsTable').DataTable({
        data: tableData,
        responsive: true,
        scrollX: true,
        fixedHeader: true,
        fixedColumns: {
            leftColumns: 1
        },
        pageLength: 25,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/fr-FR.json'
        },
        dom: '<"row"<"col-sm-6"l><"col-sm-6"f>><"row"<"col-sm-12"t>><"row"<"col-sm-5"i><"col-sm-7"p>>',
        columnDefs: [
            { targets: [1,2,3,4,5,6,7], className: 'text-center' },
            { targets: 8, orderable: false, searchable: false }
        ],
        drawCallback: function() {
            updateStatistics();
        }
    });

    // Fonction pour mettre à jour les statistiques
    function updateStatistics() {
        const totalStudents = studentsData.length;
        const averages = studentsData.map(student => parseFloat(calculateAverage(student)));
        const classAverage = (averages.reduce((a, b) => a + b, 0) / averages.length).toFixed(1);
        const studentsAtRisk = averages.filter(avg => avg < 10).length;
        const totalEvaluations = 6; // 3 interros + 2 devoirs + 1 examen

        $('#totalStudents').text(totalStudents);
        $('#averageGrade').text(classAverage + '/20');
        $('#totalEvaluations').text(totalEvaluations);
        $('#studentsAtRisk').text(studentsAtRisk);
    }

    // Initialiser les statistiques
    updateStatistics();

    // Fonctions globales
    window.editGrade = function(studentIndex, evaluationType) {
        const student = studentsData[studentIndex];
        $('#studentName').val(`${student.nom} ${student.prenom}`);
        $('#evaluationType').val(evaluationType);
        $('#newGrade').val(student[evaluationType]);
        $('#editGradeModal').modal('show');

        // Stocker l'index pour la sauvegarde
        $('#editGradeModal').data('studentIndex', studentIndex);
        $('#editGradeModal').data('evaluationType', evaluationType);
    };

    window.viewDetails = function(studentIndex) {
        const student = studentsData[studentIndex];
        const moyenne = calculateAverage(student);

        const details = `
            <div class="alert alert-info">
                <h5><i class="fas fa-user mr-2"></i>${student.nom} ${student.prenom}</h5>
                <p><strong>Matricule:</strong> ${student.matricule}</p>
                <p><strong>Moyenne générale:</strong> ${moyenne}/20</p>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <h6>Interrogations:</h6>
                        <ul>
                            <li>Interro 1: ${student.interro1 || '-'}/20</li>
                            <li>Interro 2: ${student.interro2 || '-'}/20</li>
                            <li>Interro 3: ${student.interro3 || '-'}/20</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h6>Devoirs & Examen:</h6>
                        <ul>
                            <li>Devoir 1: ${student.devoir1 || '-'}/20</li>
                            <li>Devoir 2: ${student.devoir2 || '-'}/20</li>
                            <li>Examen: ${student.examen || '-'}/20</li>
                        </ul>
                    </div>
                </div>
            </div>
        `;

        // Utiliser une alerte Bootstrap ou un modal personnalisé
        if (confirm("Afficher les détails de l'étudiant ?")) {
            // Ici vous pourriez ouvrir un modal avec les détails
            console.log(details);
        }
    };

    window.saveGrade = function() {
        const studentIndex = $('#editGradeModal').data('studentIndex');
        const evaluationType = $('#editGradeModal').data('evaluationType');
        const newGrade = parseFloat($('#newGrade').val());

        if (newGrade >= 0 && newGrade <= 20) {
            studentsData[studentIndex][evaluationType] = newGrade;

            // Recalculer la moyenne
            const moyenne = calculateAverage(studentsData[studentIndex]);

            // Mettre à jour la ligne du tableau
            const student = studentsData[studentIndex];
            const newRowData = [
                `<div class="student-info">
                    <div class="student-name">${student.nom} ${student.prenom}</div>
                    <div class="student-matricule">${student.matricule}</div>
                </div>`,
                styleGrade(student.interro1),
                styleGrade(student.interro2),
                styleGrade(student.interro3),
                styleGrade(student.devoir1),
                styleGrade(student.devoir2),
                styleGrade(student.examen),
                styleAverage(moyenne),
                `<div class="btn-group btn-group-sm">
                    <button class="btn btn-outline-primary btn-sm" onclick="editGrade(${studentIndex}, 'interro1')" title="Modifier">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn btn-outline-info btn-sm" onclick="viewDetails(${studentIndex})" title="Détails">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>`
            ];

            table.row(studentIndex).data(newRowData).draw();
            $('#editGradeModal').modal('hide');
            updateStatistics();

            // Notification de succès
            showNotification('Note mise à jour avec succès!', 'success');
        } else {
            alert('La note doit être comprise entre 0 et 20');
        }
    };

    window.exportData = function(format) {
        // Fonction d'export (à implémenter selon vos besoins)
        showNotification(`Export ${format.toUpperCase()} en cours...`, 'info');
    };

    window.printTable = function() {
        window.print();
    };

    // Fonction de notification
    function showNotification(message, type) {
        const alertClass = type === 'success' ? 'alert-success' :
                          type === 'error' ? 'alert-danger' : 'alert-info';

        const notification = $(`
            <div class="alert ${alertClass} alert-dismissible fade show position-fixed"
                 style="top: 20px; right: 20px; z-index: 9999; min-width: 300px;">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                </button>
                ${message}
            </div>
        `);

        $('body').append(notification);

        setTimeout(() => {
            notification.alert('close');
        }, 3000);
    }
});
</script>
@endsection
