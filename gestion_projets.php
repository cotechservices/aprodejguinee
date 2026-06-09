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
    <title>Gestion des activités - APRODEJ Guinée</title>
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
        
        .navbar-top {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 25px;
        }
        
        .activity-img {
            width: 60px;
            height: 50px;
            object-fit: cover;
            border-radius: 5px;
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
        
        .card-header {
            background-color: white;
            border-bottom: 2px solid #06BBCC;
        }
        
        .table th {
            background-color: #06BBCC;
            color: white;
        }
        
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
            <a href="gestion_membres.php" class="nav-link">
                <i class="fas fa-users"></i> <span>Gestion des membres</span>
            </a>
            <a href="gestion_projets.php" class="nav-link active">
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
    
    <div class="main-content">
        <div class="navbar-top">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="fas fa-project-diagram text-primary me-2"></i>Gestion des activités / projets</h4>
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
        
       
            <!--Formulaire d'ajout -->
        
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white">
                        <h5 class="mb-0"><i class="fas fa-plus-circle text-success me-2"></i>Ajouter une nouvelle activité</h5>
                    </div>
                    <div class="card-body">
                        <form action="traitement_projets.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="action" value="add">
                            <div class="mb-3">
                                <label class="form-label">Titre de l'activité :</label>
                                <input type="text" name="titre" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Lieu :</label>
                                <input type="text" name="lieu" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Date :</label>
                                <input type="date" name="date_projet" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Image :</label>
                                <input type="file" name="image" class="form-control" accept="image/*" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description :</label>
                                <textarea name="description" class="form-control" rows="4" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-success w-100">
                                <i class="fas fa-save me-2"></i>Ajouter l'activité
                            </button>
                        </form>
                    </div>
                </div>
            
            <!--Liste des activités -->
            
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <h5 class="mb-0"><i class="fas fa-list me-2 text-primary"></i>Liste des activités</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
                            <table class="table table-bordered table-hover mb-0">
                                <thead class="position-sticky top-0" style="z-index: 10;">
                                    <tr class="table-primary">
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Titre</th>
                                        <th>Lieu</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM projets ORDER BY date_projet DESC";
                                    $stmt = $pdo->prepare($sql);
                                    $stmt->execute();
                                    $projets = $stmt->fetchAll();
                                    
                                    foreach ($projets as $projet):
                                    ?>
                                    <tr>
                                        <td><?= $projet['id'] ?></td>
                                        <td><img src="<?= $projet['image'] ?>" class="activity-img" alt="image"></td>
                                        <td><?= htmlspecialchars($projet['titre']) ?></td>
                                        <td><?= htmlspecialchars($projet['lieu']) ?></td>
                                        <td><?= date('d/m/Y', strtotime($projet['date_projet'])) ?></td>
                                        <td class="table-actions">
                                            <button type="button" class="btn btn-sm btn-edit" data-bs-toggle="modal" data-bs-target="#editModal<?= $projet['id'] ?>">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-delete" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $projet['id'] ?>">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-view" data-bs-toggle="modal" data-bs-target="#viewModal<?= $projet['id'] ?>">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <!-- MODAL MODIFIER -->
                                    <div class="modal fade" id="editModal<?= $projet['id'] ?>" tabindex="-1">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header bg-warning">
                                                    <h5 class="modal-title"><i class="fas fa-edit"></i> Modifier l'activité</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <form action="traitement_projets.php" method="POST" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="action" value="edit">
                                                        <input type="hidden" name="edit_id" value="<?= $projet['id'] ?>">
                                                        <div class="mb-3">
                                                            <label class="form-label">Titre :</label>
                                                            <input type="text" name="titre" class="form-control" value="<?= htmlspecialchars($projet['titre']) ?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Lieu :</label>
                                                            <input type="text" name="lieu" class="form-control" value="<?= htmlspecialchars($projet['lieu']) ?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Date :</label>
                                                            <input type="date" name="date_projet" class="form-control" value="<?= $projet['date_projet'] ?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Image actuelle :</label><br>
                                                            <img src="<?= $projet['image'] ?>" style="width: 100px; height: 80px; object-fit: cover; margin-bottom: 10px;">
                                                            <input type="file" name="image" class="form-control mt-2" accept="image/*">
                                                            <small class="text-muted">Laissez vide pour conserver l'image actuelle</small>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Description :</label>
                                                            <textarea name="description" class="form-control" rows="4" required><?= htmlspecialchars($projet['description']) ?></textarea>
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
                                    <div class="modal fade" id="deleteModal<?= $projet['id'] ?>" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger text-white">
                                                    <h5 class="modal-title"><i class="fas fa-trash"></i> Confirmation</h5>
                                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                                </div>
                                                <form action="traitement_projets.php" method="POST">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="action" value="delete">
                                                        <input type="hidden" name="delete_id" value="<?= $projet['id'] ?>">
                                                        <p>Supprimer l'activité :</p>
                                                        <p class="fw-bold">"<?= htmlspecialchars($projet['titre']) ?>"</p>
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
                                    <div class="modal fade" id="viewModal<?= $projet['id'] ?>" tabindex="-1">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header bg-info text-white">
                                                    <h5 class="modal-title"><i class="fas fa-eye"></i> Détails de l'activité</h5>
                                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="text-center mb-3">
                                                        <img src="<?= $projet['image'] ?>" class="img-fluid rounded" style="max-height: 300px; width: auto;">
                                                    </div>
                                                    <h4><?= htmlspecialchars($projet['titre']) ?></h4>
                                                    <p><strong><i class="fas fa-map-marker-alt me-2"></i>Lieu :</strong> <?= htmlspecialchars($projet['lieu']) ?></p>
                                                    <p><strong><i class="fas fa-calendar me-2"></i>Date :</strong> <?= date('d/m/Y', strtotime($projet['date_projet'])) ?></p>
                                                    <hr>
                                                    <p><strong>Description :</strong></p>
                                                    <p><?= nl2br(htmlspecialchars($projet['description'])) ?></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
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
</body>
</html>