<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GEST_ESCO - Publication des bulletins</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #3b5998;
            --secondary-color: #8b9dc3;
            --accent-color: #dfe3ee;
            --success-color: #28a745;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar {
            background-color: var(--primary-color);
        }

        .sidebar {
            background-color: var(--secondary-color);
            min-height: calc(100vh - 56px);
            padding: 0;
        }

        .sidebar .nav-link {
            color: #fff;
            padding: 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar .nav-link:hover {
            background-color: var(--primary-color);
        }

        .sidebar .nav-link.active {
            background-color: var(--primary-color);
            font-weight: bold;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            border: none;
        }

        .status-badge {
            padding: 0.5em 0.8em;
            border-radius: 20px;
            font-size: 0.85em;
            font-weight: 500;
        }

        .status-brouillon {
            background-color: var(--warning-color);
            color: #000;
        }

        .status-valide {
            background-color: var(--success-color);
            color: #fff;
        }

        .status-publie {
            background-color: var(--primary-color);
            color: #fff;
        }

        .btn-publier {
            background-color: var(--success-color);
            border-color: var(--success-color);
            color: white;
        }

        .btn-publier:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .btn-publier:disabled {
            background-color: #c3c3c3;
            border-color: #c3c3c3;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(59, 89, 152, 0.05);
        }

        .notification-toast {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1050;
        }
    </style>
</head>
<body>
    <!-- Barre de navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="bi bi-journal-bookmark-fill me-2"></i>GEST_ESCO
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle me-1"></i> Administrateur
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Profil</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Paramètres</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right me-2"></i>Déconnexion</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar p-0">
                <nav class="nav flex-column">
                    <a class="nav-link" href="#"><i class="bi bi-speedometer2 me-2"></i> Tableau de bord</a>
                    <a class="nav-link" href="#"><i class="bi bi-people me-2"></i> Gestion des élèves</a>
                    <a class="nav-link" href="#"><i class="bi bi-person-badge me-2"></i> Gestion des enseignants</a>
                    <a class="nav-link" href="#"><i class="bi bi-journals me-2"></i> Gestion des classes</a>
                    <a class="nav-link active" href="#"><i class="bi bi-journal-text me-2"></i> Bulletins</a>
                    <a class="nav-link" href="#"><i class="bi bi-calendar-event me-2"></i> Emplois du temps</a>
                    <a class="nav-link" href="#"><i class="bi bi-clipboard-data me-2"></i> Statistiques</a>
                    <a class="nav-link" href="#"><i class="bi bi-gear me-2"></i> Paramètres système</a>
                </nav>
            </div>

            <!-- Contenu principal -->
            <div class="col-md-10 py-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2><i class="bi bi-journal-text me-2"></i>Gestion des bulletins</h2>
                    <div>
                        <select class="form-select me-2 d-inline-block w-auto">
                            <option selected>Période: T1</option>
                            <option>Période: T2</option>
                            <option>Période: T3</option>
                        </select>
                        <select class="form-select me-2 d-inline-block w-auto">
                            <option selected>Toutes les classes</option>
                            <option>6ème A</option>
                            <option>6ème B</option>
                            <option>5ème A</option>
                            <option>5ème B</option>
                            <option>4ème A</option>
                            <option>4ème B</option>
                            <option>3ème A</option>
                            <option>3ème B</option>
                        </select>
                    </div>
                </div>

                <!-- Alertes et informations -->
                <div class="alert alert-info">
                    <i class="bi bi-info-circle me-2"></i> Sélectionnez un bulletin validé pour le publier. Une fois publié, il sera visible par les parents et les élèves.
                </div>

                <!-- Tableau des bulletins -->
                <div class="card">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">Liste des bulletins</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Classe</th>
                                        <th>Période</th>
                                        <th>Enseignant</th>
                                        <th>Date de validation</th>
                                        <th>Statut</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>6ème A</td>
                                        <td>Trimestre 1</td>
                                        <td>M. Dupont</td>
                                        <td>15/10/2023</td>
                                        <td><span class="status-badge status-brouillon">Brouillon</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-secondary" disabled>
                                                <i class="bi bi-send me-1"></i>Publier
                                            </button>
                                            <button class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-eye me-1"></i>Voir
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6ème B</td>
                                        <td>Trimestre 1</td>
                                        <td>Mme. Martin</td>
                                        <td>16/10/2023</td>
                                        <td><span class="status-badge status-valide">Validé</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-publier" data-bs-toggle="modal" data-bs-target="#confirmationModal">
                                                <i class="bi bi-send me-1"></i>Publier
                                            </button>
                                            <button class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-eye me-1"></i>Voir
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5ème A</td>
                                        <td>Trimestre 1</td>
                                        <td>M. Leroy</td>
                                        <td>14/10/2023</td>
                                        <td><span class="status-badge status-publie">Publié</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-secondary" disabled>
                                                <i class="bi bi-send me-1"></i>Publié
                                            </button>
                                            <button class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-eye me-1"></i>Voir
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5ème B</td>
                                        <td>Trimestre 1</td>
                                        <td>Mme. Garcia</td>
                                        <td>17/10/2023</td>
                                        <td><span class="status-badge status-valide">Validé</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-publier" data-bs-toggle="modal" data-bs-target="#confirmationModal">
                                                <i class="bi bi-send me-1"></i>Publier
                                            </button>
                                            <button class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-eye me-1"></i>Voir
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4ème A</td>
                                        <td>Trimestre 1</td>
                                        <td>M. Petit</td>
                                        <td>13/10/2023</td>
                                        <td><span class="status-badge status-brouillon">Brouillon</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-secondary" disabled>
                                                <i class="bi bi-send me-1"></i>Publier
                                            </button>
                                            <button class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-eye me-1"></i>Voir
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Précédent</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Suivant</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <!-- Modal de confirmation -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Confirmation de publication</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Êtes-vous sûr de vouloir publier ce bulletin ?</p>
                    <div class="alert alert-warning">
                        <i class="bi bi-exclamation-triangle me-2"></i> Une fois publié, le bulletin sera visible par les parents et les élèves, et les notes ne pourront plus être modifiées.
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-publier" id="confirmPublish">
                        <i class="bi bi-send me-1"></i>Confirmer la publication
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast de notification -->
    <div class="notification-toast toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
        <div class="toast-header">
            <i class="bi bi-check-circle-fill text-success me-2"></i>
            <strong class="me-auto">GEST_ESCO</strong>
            <small>Maintenant</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Bulletin publié avec succès. Les notifications ont été envoyées.
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Gestion de la confirmation de publication
            const confirmPublishBtn = document.getElementById('confirmPublish');
            if (confirmPublishBtn) {
                confirmPublishBtn.addEventListener('click', function() {
                    // Fermer le modal
                    const modal = bootstrap.Modal.getInstance(document.getElementById('confirmationModal'));
                    modal.hide();

                    // Simuler le traitement
                    setTimeout(function() {
                        // Afficher le toast de confirmation
                        const toast = new bootstrap.Toast(document.querySelector('.notification-toast'));
                        toast.show();

                        // Mettre à jour le statut dans le tableau (simulation)
                        // En réalité, cela serait fait via une requête AJAX
                        const publishButtons = document.querySelectorAll('.btn-publier');
                        if (publishButtons.length > 0) {
                            publishButtons[0].classList.remove('btn-publier');
                            publishButtons[0].classList.add('btn-secondary');
                            publishButtons[0].innerHTML = '<i class="bi bi-send me-1"></i>Publié';
                            publishButtons[0].disabled = true;

                            // Mettre à jour le badge de statut
                            const statusBadge = publishButtons[0].closest('tr').querySelector('.status-badge');
                            statusBadge.classList.remove('status-valide');
                            statusBadge.classList.add('status-publie');
                            statusBadge.textContent = 'Publié';
                        }
                    }, 1000);
                });
            }

            // Gestion des boutons de publication désactivés
            const disabledPublishButtons = document.querySelectorAll('.btn-outline-secondary[disabled]');
            disabledPublishButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Afficher un message d'information
                    alert("Action impossible. Le bulletin doit d'abord être validé.");
                });
            });
        });
    </script>
</body>
</html>
