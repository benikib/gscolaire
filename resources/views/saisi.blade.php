<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GEST_ESCO - Gestion Scolaire</title>
    <style>
        :root {
            --primary: #3498db;
            --secondary: #2ecc71;
            --danger: #e74c3c;
            --warning: #f39c12;
            --light: #f8f9fa;
            --dark: #343a40;
            --gray: #6c757d;
            --light-gray: #e9ecef;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            color: #333;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: var(--dark);
            color: white;
            padding: 20px 0;
        }

        .logo {
            text-align: center;
            padding: 20px;
            font-size: 24px;
            font-weight: bold;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 20px;
        }

        .user-info {
            text-align: center;
            padding: 10px;
            margin-bottom: 20px;
        }

        .user-role {
            font-size: 14px;
            color: #aaa;
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
        }

        .menu-item:hover {
            background-color: rgba(255,255,255,0.1);
        }

        .menu-item.active {
            background-color: var(--primary);
        }

        .menu-item i {
            margin-right: 10px;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 20px;
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
            font-size: 24px;
            font-weight: 600;
        }

        /* Cards */
        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 20px;
            overflow: hidden;
        }

        .card-header {
            padding: 15px 20px;
            background-color: var(--light);
            border-bottom: 1px solid var(--light-gray);
            font-weight: 600;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-body {
            padding: 20px;
        }

        /* Forms */
        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }

        select, input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        /* Buttons */
        .btn {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.3s;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background-color: #2980b9;
        }

        .btn-success {
            background-color: var(--secondary);
            color: white;
        }

        .btn-success:hover {
            background-color: #27ae60;
        }

        .btn-danger {
            background-color: var(--danger);
            color: white;
        }

        .btn-danger:hover {
            background-color: #c0392b;
        }

        .btn:disabled {
            background-color: var(--light-gray);
            color: var(--gray);
            cursor: not-allowed;
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: var(--light);
            font-weight: 600;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        input[type="number"] {
            width: 60px;
            text-align: center;
        }

        /* Alerts */
        .alert {
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
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

        /* Tabs */
        .tabs {
            display: flex;
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
        }

        .tab {
            padding: 10px 20px;
            cursor: pointer;
            border-bottom: 3px solid transparent;
        }

        .tab.active {
            border-bottom: 3px solid var(--primary);
            color: var(--primary);
            font-weight: 500;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        /* Status badges */
        .badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
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
    </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">GEST_ESCO</div>
            <div class="user-info">
                <div id="user-name">Angela</div>
                <div class="user-role" id="user-role">Enseignant</div>
            </div>
            <ul class="menu">
                <li class="menu-item" onclick="showTab('saisie-notes')">
                    <i>📝</i> Saisie des notes
                </li>
                <li class="menu-item" onclick="showTab('publier-bulletins')">
                    <i>📊</i> Publier bulletins
                </li>
                <li class="menu-item">
                    <i>👥</i> Gestion des élèves
                </li>
                <li class="menu-item">
                    <i>📅</i> Emploi du temps
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
                <h1 class="page-title" id="page-title">Saisie des notes</h1>
                <div>
                    <span id="current-date"></span>
                </div>
            </div>

            <!-- Tab: Saisie des notes -->
            <div id="saisie-notes" class="tab-content active">
                <div class="alert alert-info">
                    <strong>Information :</strong> Vous pouvez saisir les notes pour les matières et classes qui vous sont assignées.
                </div>

                <div class="card">
                    <div class="card-header">
                        Sélection de la classe et de la matière
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="matiere">Matière</label>
                            <select id="matiere">
                                <option value="">Sélectionnez une matière</option>
                                <option value="math">Mathématiques</option>
                                <option value="fr">Français</option>
                                <option value="hist">Histoire-Géographie</option>
                                <option value="svt">SVT</option>
                                <option value="phys">Physique-Chimie</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="classe">Classe</label>
                            <select id="classe">
                                <option value="">Sélectionnez une classe</option>
                                <option value="6A">6ème A</option>
                                <option value="5B">5ème B</option>
                                <option value="4C">4ème C</option>
                                <option value="3A">3ème A</option>
                            </select>
                        </div>

                        <button class="btn btn-primary" onclick="chargerEleves()">Charger la liste</button>
                    </div>
                </div>

                <div class="card" id="notes-card" style="display: none;">
                    <div class="card-header">
                        Saisie des notes - <span id="selected-classe-matiere"></span>
                        <div>
                            <span class="badge badge-warning" id="periode-ouverte">Période ouverte</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="alert-note-invalide" class="alert alert-danger" style="display: none;">
                            <strong>Erreur :</strong> La note de <span id="eleve-nom-error"></span> est invalide. Veuillez saisir une note numérique conforme au barème.
                        </div>

                        <table id="table-notes">
                            <thead>
                                <tr>
                                    <th>Élève</th>
                                    <th>Devoir 1 (/20)</th>
                                    <th>Devoir 2 (/20)</th>
                                    <th>Examen (/40)</th>
                                    <th>Moyenne</th>
                                </tr>
                            </thead>
                            <tbody id="eleves-list">
                                <!-- Les élèves seront ajoutés dynamiquement -->
                            </tbody>
                        </table>

                        <div style="margin-top: 20px; text-align: right;">
                            <button class="btn btn-success" onclick="enregistrerNotes()">Enregistrer les notes</button>
                        </div>
                    </div>
                </div>

                <div class="alert alert-success" id="confirmation-notes" style="display: none;">
                    <strong>Succès :</strong> Notes enregistrées avec succès.
                </div>
            </div>

            <!-- Tab: Publier bulletins -->
            <div id="publier-bulletins" class="tab-content">
                <div class="alert alert-info">
                    <strong>Information :</strong> Vous pouvez publier les bulletins validés. Les notifications seront envoyées automatiquement aux parents.
                </div>

                <div class="card">
                    <div class="card-header">
                        Liste des bulletins
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="filtre-classe">Filtrer par classe</label>
                            <select id="filtre-classe">
                                <option value="all">Toutes les classes</option>
                                <option value="6A">6ème A</option>
                                <option value="5B">5ème B</option>
                                <option value="4C">4ème C</option>
                                <option value="3A">3ème A</option>
                            </select>
                        </div>

                        <table>
                            <thead>
                                <tr>
                                    <th>Classe</th>
                                    <th>Période</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>6ème A</td>
                                    <td>Trimestre 1</td>
                                    <td><span class="badge badge-success">Validé</span></td>
                                    <td>
                                        <button class="btn btn-success" onclick="publierBulletin('6A', 'T1')">Publier</button>
                                        <button class="btn btn-primary">Voir</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5ème B</td>
                                    <td>Trimestre 1</td>
                                    <td><span class="badge badge-success">Validé</span></td>
                                    <td>
                                        <button class="btn btn-success" onclick="publierBulletin('5B', 'T1')">Publier</button>
                                        <button class="btn btn-primary">Voir</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4ème C</td>
                                    <td>Trimestre 1</td>
                                    <td><span class="badge badge-warning">Brouillon</span></td>
                                    <td>
                                        <button class="btn btn-success" disabled>Publier</button>
                                        <button class="btn btn-primary">Voir</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3ème A</td>
                                    <td>Trimestre 1</td>
                                    <td><span class="badge badge-secondary">Non validé</span></td>
                                    <td>
                                        <button class="btn btn-success" disabled>Publier</button>
                                        <button class="btn btn-primary">Voir</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div id="alert-bulletin-non-valide" class="alert alert-danger" style="display: none;">
                    <strong>Action impossible :</strong> Le bulletin doit d'abord être validé.
                </div>

                <div id="confirmation-publication" class="alert alert-success" style="display: none;">
                    <strong>Succès :</strong> Bulletin publié avec succès. Les notifications ont été envoyées.
                </div>
            </div>
        </div>
    </div>

    <script>
        // Afficher la date actuelle
        const now = new Date();
        document.getElementById('current-date').textContent = now.toLocaleDateString('fr-FR', {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });

        // Fonction pour changer d'onglet
        function showTab(tabId) {
            // Masquer tous les onglets
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.remove('active');
            });

            // Afficher l'onglet sélectionné
            document.getElementById(tabId).classList.add('active');

            // Mettre à jour le titre de la page
            if (tabId === 'saisie-notes') {
                document.getElementById('page-title').textContent = 'Saisie des notes';
                document.getElementById('user-role').textContent = 'Enseignant';
            } else if (tabId === 'publier-bulletins') {
                document.getElementById('page-title').textContent = 'Publication des bulletins';
                document.getElementById('user-role').textContent = 'Administrateur';
            }
        }

        // Fonction pour charger la liste des élèves
        function chargerEleves() {
            const matiere = document.getElementById('matiere').value;
            const classe = document.getElementById('classe').value;

            if (!matiere || !classe) {
                alert('Veuillez sélectionner une matière et une classe.');
                return;
            }

            // Afficher la section des notes
            document.getElementById('notes-card').style.display = 'block';
            document.getElementById('selected-classe-matiere').textContent = `${classe} - ${document.getElementById('matiere').options[document.getElementById('matiere').selectedIndex].text}`;

            // Simuler des données d'élèves
            const eleves = [
                { id: 1, nom: 'Dupont', prenom: 'Jean' },
                { id: 2, nom: 'Martin', prenom: 'Marie' },
                { id: 3, nom: 'Bernard', prenom: 'Pierre' },
                { id: 4, nom: 'Thomas', prenom: 'Sophie' },
                { id: 5, nom: 'Petit', prenom: 'Luc' }
            ];

            const tbody = document.getElementById('eleves-list');
            tbody.innerHTML = '';

            eleves.forEach(eleve => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${eleve.nom} ${eleve.prenom}</td>
                    <td><input type="number" min="0" max="20" step="0.5" id="d1-${eleve.id}" class="note-input"></td>
                    <td><input type="number" min="0" max="20" step="0.5" id="d2-${eleve.id}" class="note-input"></td>
                    <td><input type="number" min="0" max="40" step="0.5" id="ex-${eleve.id}" class="note-input"></td>
                    <td id="moy-${eleve.id}">-</td>
                `;
                tbody.appendChild(tr);
            });

            // Ajouter des écouteurs d'événements pour calculer la moyenne en temps réel
            document.querySelectorAll('.note-input').forEach(input => {
                input.addEventListener('change', calculerMoyenne);
            });
        }

        // Fonction pour calculer la moyenne d'un élève
        function calculerMoyenne() {
            const inputId = this.id;
            const eleveId = inputId.split('-')[1];

            const note1 = parseFloat(document.getElementById(`d1-${eleveId}`).value) || 0;
            const note2 = parseFloat(document.getElementById(`d2-${eleveId}`).value) || 0;
            const examen = parseFloat(document.getElementById(`ex-${eleveId}`).value) || 0;

            // Calcul de la moyenne (devoirs comptent pour 60%, examen pour 40%)
            const moyenne = (note1 * 0.2 + note2 * 0.2 + examen * 0.6) / 1; // Normalisation

            document.getElementById(`moy-${eleveId}`).textContent = moyenne.toFixed(2);
        }

        // Fonction pour enregistrer les notes
        function enregistrerNotes() {
            // Valider les notes
            let noteInvalide = false;
            let eleveInvalide = '';

            document.querySelectorAll('.note-input').forEach(input => {
                const value = parseFloat(input.value);
                const max = parseFloat(input.max);

                if (input.value && (isNaN(value) || value < 0 || value > max)) {
                    noteInvalide = true;
                    input.style.borderColor = 'red';

                    // Récupérer le nom de l'élève
                    const eleveId = input.id.split('-')[1];
                    const tr = input.closest('tr');
                    const nomEleve = tr.querySelector('td:first-child').textContent;
                    eleveInvalide = nomEleve;
                } else {
                    input.style.borderColor = '';
                }
            });

            if (noteInvalide) {
                document.getElementById('alert-note-invalide').style.display = 'block';
                document.getElementById('eleve-nom-error').textContent = eleveInvalide;
                return;
            }

            // Simuler l'enregistrement
            setTimeout(() => {
                document.getElementById('confirmation-notes').style.display = 'block';
                document.getElementById('alert-note-invalide').style.display = 'none';

                // Masquer le message après 5 secondes
                setTimeout(() => {
                    document.getElementById('confirmation-notes').style.display = 'none';
                }, 5000);
            }, 1000);
        }

        // Fonction pour publier un bulletin
        function publierBulletin(classe, periode) {
            // Vérifier si le bulletin est validé (simulation)
            if (classe === '4ème C' || classe === '3ème A') {
                document.getElementById('alert-bulletin-non-valide').style.display = 'block';

                // Masquer le message après 5 secondes
                setTimeout(() => {
                    document.getElementById('alert-bulletin-non-valide').style.display = 'none';
                }, 5000);
                return;
            }

            // Simuler la publication
            setTimeout(() => {
                document.getElementById('confirmation-publication').style.display = 'block';

                // Masquer le message après 5 secondes
                setTimeout(() => {
                    document.getElementById('confirmation-publication').style.display = 'none';
                }, 5000);
            }, 1000);
        }
    </script>
</body>
</html>
