<?php
include("config/config.php");

// Vérifier si l'admin est connecté
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

$admin_nom = htmlspecialchars($_SESSION['admin_prenom'] ?? '') . ' ' . htmlspecialchars($_SESSION['admin_nom'] ?? '');

// Statistiques
$stmt = $pdo->query("SELECT COUNT(*) as total FROM employes");
$totalEmployes = $stmt->fetch()['total'];

$stmt = $pdo->query("SELECT COUNT(*) as total FROM employes WHERE statut = 'actif'");
$totalActifs = $stmt->fetch()['total'];

$stmt = $pdo->query("SELECT COUNT(*) as total FROM employes WHERE statut = 'ancien'");
$totalAnciens = $stmt->fetch()['total'];

$stmt = $pdo->query("SELECT COUNT(*) as total FROM projets");
$totalProjets = $stmt->fetch()['total'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - APRODEJ Guinée</title>
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
            z-index: 1000;
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
            border-radius: 10px;
        }
        
        .main-content::-webkit-scrollbar-thumb {
            background: #06BBCC;
            border-radius: 10px;
        }
        
        .main-content::-webkit-scrollbar-thumb:hover {
            background: #0d9488;
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
        
        .card-header {
            background-color: white;
            border-bottom: 2px solid #06BBCC;
        }
        
        .table th {
            background-color: #06BBCC;
            color: white;
        }
        
        /* Responsive */
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
                padding: 15px;
            }
            .stat-card h2 {
                font-size: 1.5rem;
            }
            .stat-card h6 {
                font-size: 0.75rem;
            }
        }
        
        @media (max-width: 576px) {
            .stat-card {
                padding: 12px;
            }
            .stat-icon {
                width: 40px;
                height: 40px;
                font-size: 20px;
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
            <a href="dashboard.php" class="nav-link active">
                <i class="fas fa-tachometer-alt"></i> <span>Dashboard</span>
            </a>
            <a href="gestion_membres.php" class="nav-link">
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
                <h4 class="mb-0"><i class="fas fa-tachometer-alt text-primary me-2"></i>Tableau de bord</h4>
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
        
        <!-- Statistiques -->
        <div class="row g-4 mb-4">
            <div class="col-xl-3 col-md-6">
                <div class="stat-card d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="text-muted mb-1">Total membres</h6>
                        <h2 class="mb-0"><?= $totalEmployes ?></h2>
                    </div>
                    <div class="stat-icon bg-primary bg-opacity-10 text-primary">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="stat-card d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="text-muted mb-1">Membres actifs</h6>
                        <h2 class="mb-0 text-success"><?= $totalActifs ?></h2>
                    </div>
                    <div class="stat-icon bg-success bg-opacity-10 text-success">
                        <i class="fas fa-user-check"></i>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="stat-card d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="text-muted mb-1">Anciens mbres</h6>
                        <h2 class="mb-0 text-secondary"><?= $totalAnciens ?></h2>
                    </div>
                    <div class="stat-icon bg-secondary bg-opacity-10 text-secondary">
                        <i class="fas fa-user-clock"></i>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="stat-card d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="text-muted mb-1">Activités</h6>
                        <h2 class="mb-0 text-info"><?= $totalProjets ?></h2>
                    </div>
                    <div class="stat-icon bg-info bg-opacity-10 text-info">
                        <i class="fas fa-project-diagram"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Derniers membres ajoutés -->
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0"><i class="fas fa-history me-2 text-primary"></i>Derniers membres ajoutés</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-primary">
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Nom complet</th>
                                <th>Fonction</th>
                                <th>Ville</th>
                                <th>Statut</th>
                                <th>Date d'embauche</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stmt = $pdo->query("SELECT * FROM employes ORDER BY id DESC LIMIT 5");
                            while($row = $stmt->fetch()):
                                $photo = !empty($row['photo']) && file_exists($row['photo']) ? $row['photo'] : 'images/default.png';
                                if (!file_exists($photo)) $photo = 'images/default.png';
                            ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><img src="<?= $photo ?>" style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;"></td>
                                <td><?= htmlspecialchars($row['prenom']) ?> <?= htmlspecialchars($row['nom']) ?></td>
                                <td><?= htmlspecialchars($row['fonction']) ?></td>
                                <td><?= htmlspecialchars($row['ville_service']) ?></td>
                                <td><span class="badge <?= $row['statut'] == 'actif' ? 'bg-success' : 'bg-secondary' ?>"><?= ucfirst($row['statut']) ?></span></td>
                                <td><?= date('d/m/Y', strtotime($row['date_embauche'])) ?></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>