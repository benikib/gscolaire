<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GEST_ESCO - Publication des bulletins</title>
    <style>
        :root {
            --primary: #3498db;
            --primary-dark: #2980b9;
            --secondary: #2ecc71;
            --secondary-dark: #27ae60;
            --danger: #e74c3c;
            --warning: #f39c12;
            --light: #f8f9fa;
            --dark: #343a40;
            --gray: #6c757d;
            --light-gray: #e9ecef;
            --border-radius: 8px;
            --box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f7f9;
            color: #333;
            line-height: 1.6;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background: linear-gradient(to bottom, var(--primary), var(--primary-dark));
            color: white;
            padding: 20px 0;
            box-shadow: var(--box-shadow);
        }

        .logo {
            text-align: center;
            padding: 20px;
            font-size: 24px;
            font-weight: bold;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            margin-bottom: 20px;
        }

        .user-info {
            text-align: center;
            padding: 15px;
            margin-bottom: 20px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: var(--border-radius);
            margin: 0 15px 20px 15px;
        }

        .user-name {
            font-size: 16px;
            font-weight: 600;
        }

        .user-role {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.8);
            margin-top: 5px;
        }

        .menu {
            list-style: none;
        }

        .menu-item {
            padding: 15px 20px;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            border-left: 4px solid transparent;
        }

        .menu-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-left: 4px solid white;
        }

        .menu-item.active {
            background-color: rgba(255, 255, 255, 0.2);
            border-left: 4px solid white;
        }

        .menu-item i {
            margin-right: 12px;
            font-size: 18px;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 25px;
            overflow-y: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--light-gray);
        }

        .page-title {
            font-size: 28px;
            font-weight: 700;
            color: var(--dark);
        }

        .header-actions {
            display: flex;
            gap: 10px;
        }

        /* Cards */
        .card {
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            margin-bottom: 25px;
            overflow: hidden;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-header {
            padding: 18px 25px;
            background: linear-gradient(to right, var(--light), var(--light-gray));
            border-bottom: 1px solid var(--light-gray);
            font-weight: 600;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-body {
            padding: 25px;
        }

        /* Forms */
        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--dark);
        }

        select, input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
            font-size: 15px;
            transition: border-color 0.3s;
        }

        select:focus, input:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
        }

        /* Buttons */
        .btn {
            padding: 12px 20px;
            border: none;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-size: 15px;
            font-weight: 500;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn i {
            margin-right: 8px;
        }

        .btn-primary {
            background: linear-gradient(to right, var(--primary), var(--primary-dark));
            color: white;
        }

        .btn-primary:hover {
            background: linear-gradient(to right, var(--primary-dark), var(--primary));
            box-shadow: 0 4px 8px rgba(52, 152, 219, 0.3);
        }

        .btn-success {
            background: linear-gradient(to right, var(--secondary), var(--secondary-dark));
            color: white;
        }

        .btn-success:hover {
            background: linear-gradient(to right, var(--secondary-dark), var(--secondary));
            box-shadow: 0 4px 8px rgba(46, 204, 113, 0.3);
        }

        .btn-danger {
            background: linear-gradient(to right, var(--danger), #c0392b);
            color: white;
        }

        .btn-danger:hover {
            background: linear-gradient(to right, #c0392b, var(--danger));
            box-shadow: 0 4px 8px rgba(231, 76, 60, 0.3);
        }

        .btn:disabled {
            background: var(--light-gray);
            color: var(--gray);
            cursor: not-allowed;
            box-shadow: none;
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 15px 18px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }

        th {
            background-color: var(--light);
            font-weight: 600;
            color: var(--dark);
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        /* Alerts */
        .alert {
            padding: 16px 20px;
            border-radius: var(--border-radius);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        .alert i {
            margin-right: 12px;
            font-size: 20px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-info {
            background-color: #d1ecf1;
            color: #0c5460;
            border: 1px solid #bee5eb;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .alert-warning {
            background-color: #fff3cd;
            color: #856404;
            border: 1px solid #ffeaa7;
        }

        /* Status badges */
        .badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-success {
            background-color: #d4edda;
            color: #155724;
        }

        .badge-warning {
            background-color: #fff3cd;
            color: #856404;
        }

        .badge-secondary {
            background-color: #e2e3e5;
            color: #383d41;
        }

        .badge-info {
            background-color: #cce5ff;
            color: #004085;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            border-radius: var(--border-radius);
            width: 450px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .modal-header {
            padding: 18px 25px;
            background: linear-gradient(to right, var(--primary), var(--primary-dark));
            color: white;
            font-weight: 600;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-body {
            padding: 25px;
        }

        .modal-footer {
            padding: 18px 25px;
            background-color: var(--light);
            display: flex;
            justify-content: flex-end;
            gap: 12px;
        }

        /* Filter section */
        .filter-section {
            display: flex;
            gap: 20px;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }

        .filter-item {
            flex: 1;
            min-width: 200px;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .container {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                padding: 10px 0;
            }

            .main-content {
                padding: 20px;
            }

            .filter-section {
                flex-direction: column;
            }
        }

        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }

        /* Icons */
        .icon {
            display: inline-block;
            width: 20px;
            height: 20px;
            margin-right: 8px;
            vertical-align: middle;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            gap: 8px;
        }

        .pagination button {
            padding: 8px 14px;
            border: 1px solid #ddd;
            background-color: white;
            border-radius: var(--border-radius);
            cursor: pointer;
        }

        .pagination button.active {
            background-color: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        .pagination button:hover:not(.active) {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">GEST_ESCO</div>
            <div class="user-info">
                <div class="user-name">Marie France</div>
                <div class="user-role">Administrateur</div>
            </div>
            <ul class="menu">
                <li class="menu-item active">
                    <i>📊</i> Publication bulletins
                </li>
                <li class="menu-item">
                    <i>📝</i> Validation bulletins
                </li>
                <li class="menu-item">
                    <i>👥</i> Gestion des utilisateurs
                </li>
                <li class="menu-item">
                    <i>🏫</i> Gestion des classes
                </li>
                <li class="menu-item">
                    <i>📅</i> Périodes scolaires
                </li>
                <li class="menu-item">
                    <i>⚙️</i> Paramètres
                </li>
                <li class="menu-item">
                    <i>🚪</i> Déconnexion
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <h1 class="page-title">Publication des bulletins</h1>
                <div class="header-actions">
                    <button class="btn btn-primary" onclick="loadBulletins()">
                        <i>🔄</i> Actualiser
                    </button>
                </div>
            </div>

            <!-- Alertes -->
            <div id="alert-bulletin-publie" class="alert alert-success" style="display: none;">
                <i>✅</i>
                <div>
                    <strong>Succès :</strong> Bulletin publié avec succès. Les notifications ont été envoyées.
                </div>
            </div>

            <div id="alert-bulletin-non-valide" class="alert alert-danger" style="display: none;">
                <i>❌</i>
                <div>
                    <strong>Action impossible :</strong> Le bulletin doit d'abord être validé.
                </div>
            </div>

            <!-- Filtres -->
            <div class="card">
                <div class="card-header">Filtres de recherche</div>
                <div class="card-body">
                    <div class="filter-section">
                        <div class="filter-item">
                            <label for="filtre-classe">Classe</label>
                            <select id="filtre-classe">
                                <option value="all">Toutes les classes</option>
                                <!-- Les options de classe seront chargées dynamiquement -->
                            </select>
                        </div>

                        <div class="filter-item">
                            <label for="filtre-periode">Période scolaire</label>
                            <select id="filtre-periode">
                                <option value="all">Toutes les périodes</option>
                                <option value="1">Période 1</option>
                                <option value="2">Période 2</option>
                                <option value="3">Période 3</option>
                            </select>
                        </div>

                        <div class="filter-item">
                            <label for="filtre-statut">Statut</label>
                            <select id="filtre-statut">
                                <option value="all">Tous les statuts</option>
                                <option value="brouillon">Brouillon</option>
                                <option value="valide">Validé</option>
                                <option value="publie">Publié</option>
                            </select>
                        </div>
                    </div>

                    <button class="btn btn-primary" onclick="appliquerFiltres()">
                        <i>🔍</i> Appliquer les filtres
                    </button>
                </div>
            </div>

            <!-- Liste des bulletins -->
            <div class="card">
                <div class="card-header">
                    Liste des bulletins
                    <span class="badge badge-info" id="nombre-bulletins">0 bulletins</span>
                </div>
                <div class="card-body">
                    <table id="bulletins-table">
                        <thead>
                            <tr>
                                <th>Élève</th>
                                <th>Classe</th>
                                <th>Période</th>
                                <th>Statut</th>
                                <th>Date de génération</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Les données seront chargées dynamiquement ici -->
                        </tbody>
                    </table>
                    
                    <!-- Pagination -->
                    <div class="pagination" id="pagination">
                        <!-- La pagination sera générée dynamiquement -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de confirmation -->
    <div id="modal-confirmation" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span>Confirmation de publication</span>
                <span style="cursor: pointer;" onclick="fermerModal()">✖</span>
            </div>
            <div class="modal-body">
                <p>Êtes-vous sûr de vouloir publier le bulletin de <strong id="modal-eleve"></strong> (classe <strong id="modal-classe"></strong>) pour la période <strong id="modal-periode"></strong> ?</p>
                <p>Cette action enverra des notifications aux parents et rendra le bulletin accessible aux élèves.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" onclick="fermerModal()">Annuler</button>
                <button class="btn btn-success" onclick="confirmerPublication()">Confirmer</button>
            </div>
        </div>
    </div>

    <script>
        // Variables globales
        let bulletinSelectionne = null;
        let currentPage = 1;
        const itemsPerPage = 10;
        let allBulletins = [];
        let filteredBulletins = [];

        // Données simulées basées sur votre base de données
        const bulletinsData = [
            // Exemples de données basées sur votre structure
            { id: 'BUL001P1', periode: 1, date_generation: '2025-06-20 00:00:00', eleve_id: 'ELE001', statut_publication_id: 'brouillon', date_validation: null, date_publication: null, date_retrait: null },
            { id: 'BUL001P2', periode: 2, date_generation: '2025-07-20 00:00:00', eleve_id: 'ELE001', statut_publication_id: 'brouillon', date_validation: null, date_publication: null, date_retrait: null },
            { id: 'BUL001P3', periode: 3, date_generation: '2025-08-20 00:00:00', eleve_id: 'ELE001', statut_publication_id: 'brouillon', date_validation: null, date_publication: null, date_retrait: null },
            // Ajoutez d'autres données ici...
        ];

        // Données des élèves
        const elevesData = [
            { id: 'ELE001', classe_id: 'CL5B780', parent_id: 'PAR027' },
            { id: 'ELE002', classe_id: 'CL5D508', parent_id: 'PAR011' },
            { id: 'ELE003', classe_id: 'CLTC482', parent_id: 'PAR002' },
            // Ajoutez d'autres données ici...
        ];

        // Données des classes
        const classesData = [
            { id: 'CL6A327', nom: '6ème A' },
            { id: 'CL6B960', nom: '6ème B' },
            { id: 'CL6C163', nom: '6ème C' },
            { id: 'CL6D866', nom: '6ème D' },
            { id: 'CL5A148', nom: '5ème A' },
            { id: 'CL5B780', nom: '5ème B' },
            { id: 'CL5C532', nom: '5ème C' },
            { id: 'CL5D508', nom: '5ème D' },
            { id: 'CL4A322', nom: '4ème A' },
            { id: 'CL4B823', nom: '4ème B' },
            { id: 'CL4C745', nom: '4ème C' },
            { id: 'CL4D160', nom: '4ème D' },
            { id: 'CL3A956', nom: '3ème A' },
            { id: 'CL3B844', nom: '3ème B' },
            { id: 'CL3C927', nom: '3ème C' },
            { id: 'CL3D205', nom: '3ème D' },
            { id: 'CL2A266', nom: '2nde A' },
            { id: 'CL2B523', nom: '2nde B' },
            { id: 'CL2C265', nom: '2nde C' },
            { id: 'CL2D282', nom: '2nde D' },
            { id: 'CL1A739', nom: '1ère A' },
            { id: 'CL1B381', nom: '1ère B' },
            { id: 'CL1C314', nom: '1ère C' },
            { id: 'CL1D477', nom: '1ère D' },
            { id: 'CLTA811', nom: 'Terminale A' },
            { id: 'CLTB824', nom: 'Terminale B' },
            { id: 'CLTC482', nom: 'Terminale C' },
            { id: 'CLTD931', nom: 'Terminale D' }
        ];

        // Fonction pour charger les bulletins
        function loadBulletins() {
            // Simuler le chargement des données depuis l'API Laravel
            // Dans une application réelle, vous feriez une requête AJAX vers votre backend
            
            // Pour cet exemple, nous utilisons les données simulées
            allBulletins = bulletinsData;
            filteredBulletins = [...allBulletins];
            
            // Mettre à jour les filtres de classe
            updateClassFilter();
            
            // Afficher les bulletins
            displayBulletins();
        }

        // Mettre à jour le filtre des classes
        function updateClassFilter() {
            const classeFilter = document.getElementById('filtre-classe');
            
            // Vider les options existantes (sauf la première)
            while (classeFilter.options.length > 1) {
                classeFilter.remove(1);
            }
            
            // Ajouter les classes disponibles
            classesData.forEach(classe => {
                const option = document.createElement('option');
                option.value = classe.id;
                option.textContent = classe.nom;
                classeFilter.appendChild(option);
            });
        }

        // Afficher les bulletins avec pagination
        function displayBulletins() {
            const tableBody = document.querySelector('#bulletins-table tbody');
            const countElement = document.getElementById('nombre-bulletins');
            
            // Vider le tableau
            tableBody.innerHTML = '';
            
            // Mettre à jour le compteur
            countElement.textContent = `${filteredBulletins.length} bulletins`;
            
            // Calculer les éléments à afficher pour la page actuelle
            const startIndex = (currentPage - 1) * itemsPerPage;
            const endIndex = Math.min(startIndex + itemsPerPage, filteredBulletins.length);
            const currentItems = filteredBulletins.slice(startIndex, endIndex);
            
            // Remplir le tableau avec les données
            currentItems.forEach(bulletin => {
                const eleve = elevesData.find(e => e.id === bulletin.eleve_id) || {};
                const classe = classesData.find(c => c.id === eleve.classe_id) || {};
                
                const row = document.createElement('tr');
                
                // Déterminer le badge en fonction du statut
                let badgeClass = 'badge-secondary';
                let badgeText = 'Inconnu';
                
                if (bulletin.statut_publication_id === 'brouillon') {
                    badgeClass = 'badge-warning';
                    badgeText = 'Brouillon';
                } else if (bulletin.statut_publication_id === 'valide') {
                    badgeClass = 'badge-success';
                    badgeText = 'Validé';
                } else if (bulletin.statut_publication_id === 'publie') {
                    badgeClass = 'badge-info';
                    badgeText = 'Publié';
                }
                
                row.innerHTML = `
                    <td>${bulletin.eleve_id}</td>
                    <td>${classe.nom || 'N/A'}</td>
                    <td>Période ${bulletin.periode}</td>
                    <td><span class="badge ${badgeClass}">${badgeText}</span></td>
                    <td>${formatDate(bulletin.date_generation)}</td>
                    <td>
                        <button class="btn btn-success" ${bulletin.statut_publication_id !== 'valide' ? 'disabled' : ''} onclick="publierBulletin('${bulletin.id}', '${bulletin.eleve_id}', '${classe.nom || 'N/A'}', ${bulletin.periode})">
                            <i>📤</i> Publier
                        </button>
                        <button class="btn btn-primary">
                            <i>👁️</i> Voir
                        </button>
                    </td>
                `;
                
                tableBody.appendChild(row);
            });
            
            // Mettre à jour la pagination
            updatePagination();
        }

        // Mettre à jour la pagination
        function updatePagination() {
            const paginationElement = document.getElementById('pagination');
            const totalPages = Math.ceil(filteredBulletins.length / itemsPerPage);
            
            // Vider la pagination existante
            paginationElement.innerHTML = '';
            
            // Bouton Précédent
            const prevButton = document.createElement('button');
            prevButton.textContent = 'Précédent';
            prevButton.disabled = currentPage === 1;
            prevButton.onclick = () => {
                if (currentPage > 1) {
                    currentPage--;
                    displayBulletins();
                }
            };
            paginationElement.appendChild(prevButton);
            
            // Pages
            for (let i = 1; i <= totalPages; i++) {
                const pageButton = document.createElement('button');
                pageButton.textContent = i;
                pageButton.className = i === currentPage ? 'active' : '';
                pageButton.onclick = () => {
                    currentPage = i;
                    displayBulletins();
                };
                paginationElement.appendChild(pageButton);
            }
            
            // Bouton Suivant
            const nextButton = document.createElement('button');
            nextButton.textContent = 'Suivant';
            nextButton.disabled = currentPage === totalPages;
            nextButton.onclick = () => {
                if (currentPage < totalPages) {
                    currentPage++;
                    displayBulletins();
                }
            };
            paginationElement.appendChild(nextButton);
        }

        // Formater une date
        function formatDate(dateString) {
            if (!dateString) return '-';
            
            const date = new Date(dateString);
            return date.toLocaleDateString('fr-FR');
        }

        // Fonction pour appliquer les filtres
        function appliquerFiltres() {
            const classe = document.getElementById('filtre-classe').value;
            const periode = document.getElementById('filtre-periode').value;
            const statut = document.getElementById('filtre-statut').value;
            
            // Filtrer les bulletins
            filteredBulletins = allBulletins.filter(bulletin => {
                const eleve = elevesData.find(e => e.id === bulletin.eleve_id) || {};
                
                // Filtre par classe
                if (classe !== 'all' && eleve.classe_id !== classe) {
                    return false;
                }
                
                // Filtre par période
                if (periode !== 'all' && bulletin.periode != periode) {
                    return false;
                }
                
                // Filtre par statut
                if (statut !== 'all') {
                    if (statut === 'valide' && bulletin.statut_publication_id !== 'valide') {
                        return false;
                    }
                    if (statut === 'brouillon' && bulletin.statut_publication_id !== 'brouillon') {
                        return false;
                    }
                    if (statut === 'publie' && bulletin.statut_publication_id !== 'publie') {
                        return false;
                    }
                }
                
                return true;
            });
            
            // Réinitialiser la pagination
            currentPage = 1;
            
            // Afficher les bulletins filtrés
            displayBulletins();
        }

        // Fonction pour publier un bulletin
        function publierBulletin(bulletinId, eleveId, classe, periode) {
            bulletinSelectionne = { bulletinId, eleveId, classe, periode };

            // Mettre à jour le modal avec les informations du bulletin
            document.getElementById('modal-eleve').textContent = eleveId;
            document.getElementById('modal-classe').textContent = classe;
            document.getElementById('modal-periode').textContent = `Période ${periode}`;

            // Afficher le modal de confirmation
            document.getElementById('modal-confirmation').style.display = 'flex';
        }

        // Fonction pour confirmer la publication
        function confirmerPublication() {
            if (bulletinSelectionne) {
                // Simuler le processus de publication
                console.log(`Publication du bulletin: ${bulletinSelectionne.bulletinId}`);

                // Dans une application réelle, vous feriez une requête AJAX vers votre backend Laravel
                // pour mettre à jour le statut du bulletin
                
                // Fermer le modal
                fermerModal();

                // Afficher le message de confirmation
                const alert = document.getElementById('alert-bulletin-publie');
                alert.style.display = 'flex';
                alert.classList.add('fade-in');

                // Masquer le message après 5 secondes
                setTimeout(() => {
                    alert.style.display = 'none';
                }, 5000);

                // Recharger les bulletins pour refléter les changements
                setTimeout(loadBulletins, 1000);
            }
        }

        // Fonction pour fermer le modal
        function fermerModal() {
            document.getElementById('modal-confirmation').style.display = 'none';
        }

        // Fonction pour montrer une erreur de bulletin non validé
        function montrerErreur() {
            // Afficher le message d'erreur
            const alert = document.getElementById('alert-bulletin-non-valide');
            alert.style.display = 'flex';
            alert.classList.add('fade-in');

            // Masquer le message après 5 secondes
            setTimeout(() => {
                alert.style.display = 'none';
            }, 5000);
        }

        // Fermer le modal si on clique en dehors
        window.onclick = function(event) {
            const modal = document.getElementById('modal-confirmation');
            if (event.target === modal) {
                fermerModal();
            }
        };

        // Charger les bulletins au démarrage
        document.addEventListener('DOMContentLoaded', loadBulletins);
    </script>
</body>
</html>