<?php include("config/config.php");

// Vérifier si l'admin est connecté
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

$admin_nom = htmlspecialchars($_SESSION['admin_prenom'] ?? '') . ' ' . htmlspecialchars($_SESSION['admin_nom'] ?? '');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des membres - APRODEJ Guinée</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background-color: #f8f9fa;
            overflow: hidden;
            height: 100vh;
        }
        
        /* Sidebar fixe - sans scroll */
        .sidebar {
            background: linear-gradient(135deg, #06BBCC 0%, #0d9488 100%);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 260px;
            color: white;
            overflow-y: hidden;
            display: flex;
            flex-direction: column;
        }
        
        .sidebar .nav {
            flex: 1;
            overflow-y: auto;
            padding-bottom: 20px;
        }
        
        .sidebar .nav::-webkit-scrollbar {
            width: 5px;
        }
        
        .sidebar .nav::-webkit-scrollbar-track {
            background: rgba(255,255,255,0.1);
        }
        
        .sidebar .nav::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.3);
            border-radius: 5px;
        }
        
        .sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 12px 20px;
            border-radius: 10px;
            margin: 5px 10px;
        }
        
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background: rgba(255,255,255,0.2);
            color: white;
        }
        
        .sidebar .nav-link i {
            margin-right: 10px;
            width: 25px;
        }
        
        /* Contenu principal - avec scroll uniquement pour le contenu */
        .main-content {
            margin-left: 260px;
            height: 100vh;
            overflow-y: auto;
            padding: 20px 30px;
        }
        
        .main-content::-webkit-scrollbar {
            width: 8px;
        }
        
        .main-content::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        
        .main-content::-webkit-scrollbar-thumb {
            background: #06BBCC;
            border-radius: 10px;
        }
        
        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
        }
        
        .navbar-top {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 25px;
        }
        
        .member-photo {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 50%;
        }
        
        .table-actions {
            white-space: nowrap;
        }
        
        .btn-edit {
            background-color: #ffc107;
            color: #000;
        }
        
        .btn-edit:hover {
            background-color: #e0a800;
            color: #000;
        }
        
        .btn-delete {
            background-color: #dc3545;
            color: white;
        }
        
        .btn-delete:hover {
            background-color: #c82333;
            color: white;
        }
        
        .btn-view {
            background-color: #17a2b8;
            color: white;
        }
        
        .btn-view:hover {
            background-color: #138496;
            color: white;
        }
        
        .other-function-field {
            margin-top: 10px;
            display: none;
        }
        
        .other-function-field.show {
            display: block;
        }
        
        .card-header {
            background-color: white;
            border-bottom: 2px solid #06BBCC;
        }
        
        .table th {
            background-color: #06BBCC;
            color: white;
        }
        
        /* Layout en deux colonnes pour la gestion des membres */
        .two-columns {
            display: flex;
            gap: 25px;
        }
        
        .column-left {
            flex: 1;
            min-width: 0;
        }
        
        .column-right {
            flex: 1.5;
            min-width: 0;
        }
        
        @media (max-width: 992px) {
            .two-columns {
                flex-direction: column;
            }
            .sidebar {
                width: 220px;
            }
            .main-content {
                margin-left: 220px;
            }
        }
        
        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
            }
            .sidebar .nav-link span:not(i) {
                display: none;
            }
            .sidebar .nav-link i {
                margin-right: 0;
            }
            .main-content {
                margin-left: 70px;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar fixe -->
    <div class="sidebar">
        <div class="text-center py-4">
            <img src="img/logo.jpg" alt="Logo" style="width: 70px; height: 70px; border-radius: 50%; object-fit: cover; border: 3px solid white;">
            <h5 class="mt-3">APRODEJ-GUINEE</h5>
            <small><?= $admin_nom ?></small>
        </div>
        <nav class="nav flex-column">
            <a href="dashboard.php" class="nav-link">
                <i class="fas fa-tachometer-alt"></i> <span>Dashboard</span>
            </a>
            <a href="gestion_membres.php" class="nav-link active">
                <i class="fas fa-users"></i> <span>Gestion des membres</span>
            </a>
            <a href="gestion_projets.php" class="nav-link">
                <i class="fas fa-project-diagram"></i> <span>Gestion des activités</span>
            </a>
            <a href="gestion_admins.php" class="nav-link">
                <i class="fas fa-user-shield"></i> <span>Administrateurs</span>
            </a>
            <a href="logout.php" class="nav-link mt-5">
                <i class="fas fa-sign-out-alt"></i> <span>Déconnexion</span>
            </a>
        </nav>
    </div>
    
    <!-- Contenu principal -->
    <div class="main-content">
        <div class="navbar-top">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="fas fa-users text-primary me-2"></i>Gestion des membres</h4>
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <i class="fas fa-user-circle me-2"></i> <?= htmlspecialchars($_SESSION['admin_username']) ?>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Mon profil</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="logout.php"><i class="fas fa-sign-out-alt me-2"></i>Déconnexion</a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- Messages flash -->
        <?php if(isset($_SESSION['success'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i> <?= $_SESSION['success'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>
        
        <?php if(isset($_SESSION['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle me-2"></i> <?= $_SESSION['error'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>
        
        <!-- Deux colonnes : formulaire à gauche, liste à droite -->
     
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white">
                        <h5 class="mb-0"><i class="fas fa-plus-circle text-success me-2"></i>Ajouter un nouveau membre</h5>
                    </div>
                    <div class="card-body">
                        <form action="traitement_membres.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="action" value="add">
                            <div class="mb-3">
                                <label class="form-label">Prénom :</label>
                                <input type="text" name="prenom" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nom :</label>
                                <input type="text" name="nom" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Fonction :</label>
                                <select name="fonction" id="fonction" class="form-select" required>
                                    <option value="">-- Sélectionnez une fonction --</option>
                                    <option value="Président">Président</option>
                                    <option value="Vice Président">Vice Président</option>
                                    <option value="Comptable Principal">Comptable Principal</option>
                                    <option value="Comptable Projet">Comptable Projet</option>
                                    <option value="Assistante Comptable">Assistante Comptable</option>
                                    <option value="Secrétaire Administrative">Secrétaire Administrative</option>
                                    <option value="Coordinateur Projet">Coordinateur Projet</option>
                                    <option value="Chargé de Suivi Evaluation">Chargé de Suivi Evaluation</option>
                                    <option value="Chargé de projets et programmes">Chargé de projets et programmes</option>
                                    <option value="Chargé de Partenariat">Chargé de Partenariat</option>
                                    <option value="Chargé de Communication">Chargé de Communication</option>
                                    <option value="Chargé de Genre">Chargé de Genre</option>
                                    <option value="Chargé de Formation">Chargé de Formation</option>
                                    <option value="Point Focal PEAS">Point Focal PEAS</option>
                                    <option value="Point Focal des Personnes Vulnérables">Point Focal des Personnes Vulnérables</option>
                                    <option value="Superviseurs">Superviseurs</option>
                                    <option value="Animateur">Animateur</option>
                                    <option value="Animatrice">Animatrice</option>
                                    <option value="Membre du Conseil d'Administration">Membre du Conseil d'Administration</option>
                                    <option value="Membre de l'ONG">Membre de l'ONG</option>
                                    <option value="Agent de Sécurité">Agent de Sécurité</option>
                                    <option value="Agent Technicien de Surface">Agent Technicien de Surface</option>
                                    <option value="autre">Autre (à préciser)</option>
                                </select>
                                <div id="otherFunctionDiv" class="other-function-field">
                                    <label class="form-label">Précisez la fonction :</label>
                                    <input type="text" name="autre_fonction" id="autre_fonction" class="form-control" placeholder="Ex: Consultant, Stagiaire, etc.">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ville de service :</label>
                                <input type="text" name="ville_service" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Date d'embauche :</label>
                                <input type="date" name="date_embauche" class="form-control" required>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="membre_fondateur" value="1" id="fondateur">
                                        <label class="form-check-label" for="fondateur">Membre fondateur</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="membre_adherent" value="1" id="adherent">
                                        <label class="form-check-label" for="adherent">Membre adhérent</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Photo de profil :</label>
                                <input type="file" name="photo" class="form-control" accept="image/*">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Statut :</label>
                                <select name="statut" class="form-select">
                                    <option value="actif">Actif</option>
                                    <option value="ancien">Ancien</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success w-100">
                                <i class="fas fa-save me-2"></i>Enregistrer le membre
                            </button>
                        </form>
                    </div>
                </div>
            
            <!-- Liste des membres -->
           
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <h5 class="mb-0"><i class="fas fa-list me-2 text-primary"></i>Liste des membres</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
                            <table class="table table-bordered table-hover mb-0">
                                <thead class="position-sticky top-0" style="z-index: 10;">
                                    <tr class="table-primary">
                                        <th>ID</th>
                                        <th>Photo</th>
                                        <th>Nom complet</th>
                                        <th>Fonction</th>
                                        <th>Ville</th>
                                        <th>Statut</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM employes ORDER BY id DESC";
                                    $stmt = $pdo->prepare($sql);
                                    $stmt->execute();
                                    $employes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    
                                    foreach ($employes as $employe):
                                        $photo = !empty($employe['photo']) && file_exists($employe['photo']) ? $employe['photo'] : 'images/default.png';
                                        if (!file_exists($photo)) $photo = 'images/default.png';
                                        $statut_badge = $employe['statut'] == 'actif' ? 'badge bg-success' : 'badge bg-secondary';
                                    ?>
                                    <tr>
                                        <td><?= $employe['id'] ?></td>
                                        <td><img src="<?= $photo ?>" class="member-photo" alt="photo"></td>
                                        <td><?= htmlspecialchars($employe['prenom']) . ' ' . htmlspecialchars($employe['nom']) ?></td>
                                        <td><?= htmlspecialchars($employe['fonction']) ?></td>
                                        <td><?= htmlspecialchars($employe['ville_service']) ?></td>
                                        <td><span class="<?= $statut_badge ?>"><?= ucfirst($employe['statut']) ?></span></td>
                                        <td class="table-actions">
                                            <button type="button" class="btn btn-sm btn-edit" data-bs-toggle="modal" data-bs-target="#editModal<?= $employe['id'] ?>">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-delete" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $employe['id'] ?>">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-view" data-bs-toggle="modal" data-bs-target="#viewModal<?= $employe['id'] ?>">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <!-- MODAL MODIFIER -->
                                    <div class="modal fade" id="editModal<?= $employe['id'] ?>" tabindex="-1">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header bg-warning">
                                                    <h5 class="modal-title"><i class="fas fa-edit"></i> Modifier le membre</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <form action="traitement_membres.php" method="POST" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="action" value="edit">
                                                        <input type="hidden" name="edit_id" value="<?= $employe['id'] ?>">
                                                        <div class="row mb-2">
                                                            <div class="col-md-6">
                                                                <label>Prénom :</label>
                                                                <input type="text" name="prenom" class="form-control" value="<?= htmlspecialchars($employe['prenom']) ?>" required>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>Nom :</label>
                                                                <input type="text" name="nom" class="form-control" value="<?= htmlspecialchars($employe['nom']) ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2">
                                                            <label>Fonction :</label>
                                                            <input type="text" name="fonction" class="form-control" value="<?= htmlspecialchars($employe['fonction']) ?>" required>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-md-6">
                                                                <label>Ville de service :</label>
                                                                <input type="text" name="ville_service" class="form-control" value="<?= htmlspecialchars($employe['ville_service']) ?>" required>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>Date d'embauche :</label>
                                                                <input type="date" name="date_embauche" class="form-control" value="<?= $employe['date_embauche'] ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-md-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="membre_fondateur" value="1" <?= $employe['membre_fondateur'] ? 'checked' : '' ?>>
                                                                    <label>Membre fondateur</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="membre_adherent" value="1" <?= $employe['membre_adherent'] ? 'checked' : '' ?>>
                                                                    <label>Membre adhérent</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2">
                                                            <label>Photo actuelle :</label><br>
                                                            <img src="<?= $photo ?>" style="width: 80px; height: 80px; object-fit: cover; border-radius: 10px;">
                                                            <input type="file" name="photo" class="form-control mt-2" accept="image/*">
                                                            <small class="text-muted">Laissez vide pour conserver la photo actuelle</small>
                                                        </div>
                                                        <div class="mb-2">
                                                            <label>Statut :</label>
                                                            <select name="statut" class="form-select">
                                                                <option value="actif" <?= $employe['statut'] == 'actif' ? 'selected' : '' ?>>Actif</option>
                                                                <option value="ancien" <?= $employe['statut'] == 'ancien' ? 'selected' : '' ?>>Ancien</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                        <button type="submit" class="btn btn-warning">Enregistrer</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- MODAL SUPPRIMER -->
                                    <div class="modal fade" id="deleteModal<?= $employe['id'] ?>" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger text-white">
                                                    <h5 class="modal-title"><i class="fas fa-trash"></i> Confirmation</h5>
                                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                                </div>
                                                <form action="traitement_membres.php" method="POST">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="action" value="delete">
                                                        <input type="hidden" name="delete_id" value="<?= $employe['id'] ?>">
                                                        <p>Supprimer <strong><?= htmlspecialchars($employe['prenom']) ?> <?= htmlspecialchars($employe['nom']) ?></strong> ?</p>
                                                        <p class="text-danger">Action irréversible !</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- MODAL VOIR -->
                                    <div class="modal fade" id="viewModal<?= $employe['id'] ?>" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-info text-white">
                                                    <h5 class="modal-title"><i class="fas fa-user"></i> Détails</h5>
                                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <img src="<?= $photo ?>" style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover;">
                                                    <h4 class="mt-3"><?= htmlspecialchars($employe['prenom']) ?> <?= htmlspecialchars($employe['nom']) ?></h4>
                                                    <p><strong>Fonction :</strong> <?= htmlspecialchars($employe['fonction']) ?></p>
                                                    <p><strong>Ville :</strong> <?= htmlspecialchars($employe['ville_service']) ?></p>
                                                    <p><strong>Date embauche :</strong> <?= date('d/m/Y', strtotime($employe['date_embauche'])) ?></p>
                                                    <p><strong>Statut :</strong> <span class="<?= $statut_badge ?>"><?= ucfirst($employe['statut']) ?></span></p>
                                                    <p><strong>Membre fondateur :</strong> <?= $employe['membre_fondateur'] ? 'Oui' : 'Non' ?></p>
                                                    <p><strong>Membre adhérent :</strong> <?= $employe['membre_adherent'] ? 'Oui' : 'Non' ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fonctionSelect = document.getElementById('fonction');
            const otherFunctionDiv = document.getElementById('otherFunctionDiv');
            const autreFonctionInput = document.getElementById('autre_fonction');
            
            function toggleOtherFunctionField() {
                if (fonctionSelect && fonctionSelect.value === 'autre') {
                    otherFunctionDiv.classList.add('show');
                    autreFonctionInput.setAttribute('required', 'required');
                } else if (fonctionSelect) {
                    otherFunctionDiv.classList.remove('show');
                    autreFonctionInput.removeAttribute('required');
                    autreFonctionInput.value = '';
                }
            }
            
            if (fonctionSelect) {
                fonctionSelect.addEventListener('change', toggleOtherFunctionField);
                toggleOtherFunctionField();
            }
        });
    </script>
</body>
</html>