<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GEST_ESCO - Consultation des bulletins</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #3498db;
            --secondary: #2c3e50;
            --accent: #e74c3c;
            --light: #ecf0f1;
            --success: #2ecc71;
            --warning: #f39c12;
            --text: #333;
            --border-radius: 8px;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f7fa;
            color: var(--text);
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 20px 0;
            box-shadow: var(--shadow);
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo i {
            font-size: 2rem;
        }

        .logo h1 {
            font-size: 1.8rem;
            font-weight: 600;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--light);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .main-content {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 20px;
            margin-top: 30px;
        }

        .sidebar {
            background-color: white;
            border-radius: var(--border-radius);
            padding: 20px;
            box-shadow: var(--shadow);
        }

        .children-list {
            list-style: none;
        }

        .children-list li {
            padding: 15px;
            margin-bottom: 10px;
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .children-list li:hover {
            background-color: var(--light);
        }

        .children-list li.active {
            background-color: var(--primary);
            color: white;
        }

        .children-list li i {
            font-size: 1.2rem;
        }

        .content {
            background-color: white;
            border-radius: var(--border-radius);
            padding: 20px;
            box-shadow: var(--shadow);
        }

        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .period-selector {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        select {
            padding: 10px;
            border-radius: var(--border-radius);
            border: 1px solid #ddd;
            background-color: white;
        }

        .btn {
            padding: 10px 15px;
            border: none;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background-color: #2980b9;
        }

        .bulletin-container {
            margin-top: 20px;
        }

        .bulletin-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .bulletin-header h2 {
            color: var(--secondary);
            margin-bottom: 5px;
        }

        .student-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }

        .info-card {
            background-color: var(--light);
            padding: 15px;
            border-radius: var(--border-radius);
        }

        .grades-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        .grades-table th, .grades-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .grades-table th {
            background-color: var(--secondary);
            color: white;
        }

        .grades-table tr:hover {
            background-color: #f9f9f9;
        }

        .summary {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .summary-card {
            background-color: white;
            padding: 20px;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            text-align: center;
        }

        .summary-card h3 {
            margin-bottom: 10px;
            color: var(--secondary);
        }

        .summary-card .value {
            font-size: 2rem;
            font-weight: bold;
            color: var(--primary);
        }

        .comments {
            background-color: var(--light);
            padding: 20px;
            border-radius: var(--border-radius);
            margin-bottom: 30px;
        }

        .comments h3 {
            margin-bottom: 15px;
            color: var(--secondary);
        }

        .comment {
            padding: 15px;
            background-color: white;
            border-radius: var(--border-radius);
            margin-bottom: 15px;
            box-shadow: var(--shadow);
        }

        .comment:last-child {
            margin-bottom: 0;
        }

        .comment .teacher {
            font-weight: bold;
            color: var(--primary);
        }

        .no-bulletin {
            text-align: center;
            padding: 40px;
            color: var(--accent);
        }

        .no-bulletin i {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .login-container {
            max-width: 400px;
            margin: 100px auto;
            background-color: white;
            padding: 30px;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 30px;
            color: var(--secondary);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
        }

        .login-btn {
            width: 100%;
            padding: 12px;
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-size: 1rem;
            font-weight: 500;
        }

        .login-btn:hover {
            background-color: #2980b9;
        }

        footer {
            text-align: center;
            margin-top: 50px;
            padding: 20px;
            color: #7f8c8d;
        }

        @media (max-width: 768px) {
            .main-content {
                grid-template-columns: 1fr;
            }

            .student-info, .summary {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Interface de connexion (visible par défaut) -->
    <div id="loginPage">
        <div class="login-container">
            <h2><i class="fas fa-graduation-cap"></i> GEST_ESCO</h2>
            <form id="loginForm">
                <div class="form-group">
                    <label for="email">Adresse email</label>
                    <input type="email" id="email" placeholder="Votre adresse email" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" placeholder="Votre mot de passe" required>
                </div>
                <button type="submit" class="login-btn">Se connecter</button>
            </form>
        </div>
    </div>

    <!-- Interface principale (cachée par défaut) -->
    <div id="mainPage" style="display: none;">
        <header>
            <div class="container header-content">
                <div class="logo">
                    <i class="fas fa-graduation-cap"></i>
                    <h1>GEST_ESCO</h1>
                </div>
                <div class="user-info">
                    <div class="user-avatar">PD</div>
                    <div>Parent Dupont <a href="#" id="logoutBtn" style="color: white; margin-left: 15px;"><i class="fas fa-sign-out-alt"></i></a></div>
                </div>
            </div>
        </header>

        <div class="container">
            <div class="main-content">
                <div class="sidebar">
                    <h3>Mes enfants</h3>
                    <ul class="children-list">
                        <li class="active" data-child="marie"><i class="fas fa-female"></i> Marie Dupont</li>
                        <li data-child="pierre"><i class="fas fa-male"></i> Pierre Dupont</li>
                    </ul>
                </div>

                <div class="content">
                    <div class="dashboard-header">
                        <h2>Bulletins scolaires</h2>
                        <div class="period-selector">
                            <select id="periodSelector">
                                <option value="trim1">Trimestre 1</option>
                                <option value="trim2">Trimestre 2</option>
                                <option value="trim3">Trimestre 3</option>
                            </select>
                            <button class="btn btn-primary" id="downloadBtn">
                                <i class="fas fa-download"></i> Télécharger
                            </button>
                        </div>
                    </div>

                    <div class="bulletin-container">
                        <div class="bulletin-header">
                            <h2>Bulletin Scolaire</h2>
                            <p>Trimestre 1 - Année scolaire 2023-2024</p>
                        </div>

                        <div class="student-info">
                            <div class="info-card">
                                <h3>Informations de l'élève</h3>
                                <p><strong>Nom:</strong> Marie Dupont</p>
                                <p><strong>Classe:</strong> CM2 A</p>
                                <p><strong>Date de naissance:</strong> 12/05/2013</p>
                            </div>
                            <div class="info-card">
                                <h3>Informations scolaires</h3>
                                <p><strong>École:</strong> École Primaire Les Lilas</p>
                                <p><strong>Enseignant:</strong> Mme. Martin</p>
                                <p><strong>Nombre d'absences:</strong> 2</p>
                            </div>
                        </div>

                        <table class="grades-table">
                            <thead>
                                <tr>
                                    <th>Matière</th>
                                    <th>Note</th>
                                    <th>Moyenne classe</th>
                                    <th>Appréciation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Mathématiques</td>
                                    <td>15/20</td>
                                    <td>12.5/20</td>
                                    <td>Très bon travail</td>
                                </tr>
                                <tr>
                                    <td>Français</td>
                                    <td>13/20</td>
                                    <td>11.8/20</td>
                                    <td>Peut mieux faire</td>
                                </tr>
                                <tr>
                                    <td>Histoire-Géographie</td>
                                    <td>16/20</td>
                                    <td>13.2/20</td>
                                    <td>Excellent</td>
                                </tr>
                                <tr>
                                    <td>Sciences</td>
                                    <td>14/20</td>
                                    <td>12.1/20</td>
                                    <td>Bon travail</td>
                                </tr>
                                <tr>
                                    <td>Anglais</td>
                                    <td>17/20</td>
                                    <td>14.3/20</td>
                                    <td>Très bonne participation</td>
                                </tr>
                                <tr>
                                    <td>Éducation physique</td>
                                    <td>15/20</td>
                                    <td>13.7/20</td>
                                    <td>Impliquée et active</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="summary">
                            <div class="summary-card">
                                <h3>Moyenne générale</h3>
                                <div class="value">15.0/20</div>
                            </div>
                            <div class="summary-card">
                                <h3>Rang dans la classe</h3>
                                <div class="value">5ème/28</div>
                            </div>
                            <div class="summary-card">
                                <h3>Appréciation générale</h3>
                                <div class="value">Bien</div>
                            </div>
                        </div>

                        <div class="comments">
                            <h3>Commentaires des enseignants</h3>
                            <div class="comment">
                                <p><span class="teacher">Mme. Martin (Professeur principal):</span> Marie est une élève appliquée et sérieuse. Elle participe activement en cours et fait preuve de curiosité intellectuelle. Continue ainsi !</p>
                            </div>
                            <div class="comment">
                                <p><span class="teacher">M. Durand (Mathématiques):</span> Excellents résultats en mathématiques. Marie a des facilités évidentes dans cette matière.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer>
            <p>GEST_ESCO &copy; 2023 - Développé par Ketsia</p>
        </footer>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Gestion de la connexion
            const loginForm = document.getElementById('loginForm');
            const loginPage = document.getElementById('loginPage');
            const mainPage = document.getElementById('mainPage');

            loginForm.addEventListener('submit', function(e) {
                e.preventDefault();
                // Simulation de connexion réussie
                loginPage.style.display = 'none';
                mainPage.style.display = 'block';
            });

            // Gestion de la déconnexion
            document.getElementById('logoutBtn').addEventListener('click', function(e) {
                e.preventDefault();
                loginPage.style.display = 'block';
                mainPage.style.display = 'none';
            });

            // Gestion du changement d'enfant
            const childrenItems = document.querySelectorAll('.children-list li');
            childrenItems.forEach(item => {
                item.addEventListener('click', function() {
                    childrenItems.forEach(i => i.classList.remove('active'));
                    this.classList.add('active');
                    // Ici, on rechargerait les données de l'enfant sélectionné
                });
            });

            // Gestion du téléchargement
            document.getElementById('downloadBtn').addEventListener('click', function() {
                alert('Fonctionnalité de téléchargement déclenchée. En production, cela téléchargerait le bulletin en PDF.');
            });

            // Gestion du changement de période
            document.getElementById('periodSelector').addEventListener('change', function() {
                // Ici, on rechargerait les données pour la période sélectionnée
                console.log('Période sélectionnée:', this.value);
            });
        });
    </script>
</body>
</html>
