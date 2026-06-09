<?php include("config/config.php"); 

// Vérifier si l'admin est connecté
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

$admin_nom = htmlspecialchars($_SESSION['admin_prenom'] ?? '') . ' ' . htmlspecialchars($_SESSION['admin_nom'] ?? '');
$is_super_admin = ($_SESSION['admin_role'] ?? '') == 'super_admin';

// Traitement ajout admin
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] == 'add' && $is_super_admin) {
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $nom = trim($_POST['nom']);
        $prenom = trim($_POST['prenom']);
        $role = $_POST['role'];
        
        try {
            $stmt = $pdo->prepare("INSERT INTO admins (username, email, password, nom, prenom, role) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$username, $email, $password, $nom, $prenom, $role]);
            $_SESSION['success'] = "Administrateur ajouté avec succès !";
        } catch (PDOException $e) {
            $_SESSION['error'] = "Erreur : " . $e->getMessage();
        }
        header("Location: gestion_admins.php");
        exit();
    }
    
    if ($_POST['action'] == 'delete' && $is_super_admin) {
        $id = $_POST['delete_id'];
        if ($id != $_SESSION['admin_id']) {
            $stmt = $pdo->prepare("DELETE FROM admins WHERE id = ?");
            $stmt->execute([$id]);
            $_SESSION['success'] = "Administrateur supprimé !";
        } else {
            $_SESSION['error'] = "Vous ne pouvez pas supprimer votre propre compte !";
        }
        header("Location: gestion_admins.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des administrateurs - APRODEJ Guinée</title>
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
        
        .btn-sm {
            padding: 5px 10px;
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
        }
        
        @media (max-width: 576px) {
            .main-content {
                padding: 10px;
            }
            .navbar-top {
                padding: 10px 15px;
            }
            .navbar-top h4 {
                font-size: 1rem;
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
            <a href="gestion_membres.php" class="nav-link">
                <i class="fas fa-users"></i> <span>Gestion des membres</span>
            </a>
            <a href="gestion_projets.php" class="nav-link">
                <i class="fas fa-project-diagram"></i> <span>Gestion des activités</span>
            </a>
            <a href="gestion_admins.php" class="nav-link active">
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
                <h4 class="mb-0"><i class="fas fa-user-shield text-primary me-2"></i>Gestion des administrateurs</h4>
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
        
        <!-- Formulaire d'ajout (visible uniquement pour super admin) -->
        <?php if($is_super_admin): ?>
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0"><i class="fas fa-plus-circle text-success me-2"></i>Ajouter un administrateur</h5>
            </div>
            <div class="card-body">
                <form method="POST">
                    <input type="hidden" name="action" value="add">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Nom :</label>
                            <input type="text" name="nom" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Prénom :</label>
                            <input type="text" name="prenom" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Nom d'utilisateur :</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email :</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Mot de passe :</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Rôle :</label>
                            <select name="role" class="form-select">
                                <option value="editeur">Éditeur</option>
                                <option value="admin">Admin</option>
                                <option value="super_admin">Super Admin</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save me-2"></i>Ajouter
                    </button>
                </form>
            </div>
        </div>
        <?php endif; ?>
        
        <!-- Liste des administrateurs -->
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0"><i class="fas fa-list me-2 text-primary"></i>Liste des administrateurs</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0">
                        <thead class="table-primary position-sticky top-0" style="z-index: 10;">
                            <tr>
                                <th>ID</th>
                                <th>Nom complet</th>
                                <th>Email</th>
                                <th>Rôle</th>
                                <th>Statut</th>
                                <th>Dernière connexion</th>
                                <?php if($is_super_admin): ?>
                                <th>Actions</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stmt = $pdo->query("SELECT * FROM admins ORDER BY id ASC");
                            while($admin = $stmt->fetch()):
                            ?>
                            <tr>
                                <td><?= $admin['id'] ?></td>
                                <td><?= htmlspecialchars($admin['prenom']) ?> <?= htmlspecialchars($admin['nom']) ?></td>
                                <td><?= htmlspecialchars($admin['email']) ?></td>
                                <td>
                                    <?php 
                                    $role_class = '';
                                    if($admin['role'] == 'super_admin') $role_class = 'bg-danger';
                                    elseif($admin['role'] == 'admin') $role_class = 'bg-warning';
                                    else $role_class = 'bg-info';
                                    ?>
                                    <span class="badge <?= $role_class ?>"><?= ucfirst($admin['role']) ?></span>
                                </td>
                                <td><span class="badge <?= $admin['statut'] == 'actif' ? 'bg-success' : 'bg-secondary' ?>"><?= $admin['statut'] ?></span></td>
                                <td><?= $admin['derniere_connexion'] ? date('d/m/Y H:i', strtotime($admin['derniere_connexion'])) : 'Jamais' ?></td>
                                <?php if($is_super_admin): ?>
                                <td class="text-center">
                                    <?php if($admin['id'] != $_SESSION['admin_id']): ?>
                                        <form method="POST" onsubmit="return confirm('Supprimer définitivement cet administrateur ?')" style="display: inline;">
                                            <input type="hidden" name="action" value="delete">
                                            <input type="hidden" name="delete_id" value="<?= $admin['id'] ?>">
                                            <button type="submit" class="btn btn-sm btn-danger" title="Supprimer">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    <?php else: ?>
                                        <span class="text-muted"><i class="fas fa-user-check"></i> Compte actuel</span>
                                    <?php endif; ?>
                                </td>
                                <?php endif; ?>
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