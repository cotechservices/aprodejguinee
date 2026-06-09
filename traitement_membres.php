<?php
include("config/config.php");

// Vérifier si l'admin est connecté
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

$action = $_POST['action'] ?? '';

// AJOUTER
if ($action == 'add') {
    $prenom = trim($_POST['prenom']);
    $nom = trim($_POST['nom']);
    $fonction = $_POST['fonction'];
    if ($fonction == 'autre') {
        $fonction = !empty($_POST['autre_fonction']) ? $_POST['autre_fonction'] : 'Autre fonction';
    }
    $ville_service = trim($_POST['ville_service']);
    $date_embauche = $_POST['date_embauche'];
    $membre_fondateur = isset($_POST['membre_fondateur']) ? 1 : 0;
    $membre_adherent = isset($_POST['membre_adherent']) ? 1 : 0;
    $statut = $_POST['statut'];
    
    $photo_path = 'images/default.png';
    $upload_dir = 'images/';
    if (!file_exists($upload_dir)) mkdir($upload_dir, 0777, true);
    
    if (!empty($_FILES['photo']['name'])) {
        $clean_name = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', basename($_FILES['photo']['name']));
        $target = $upload_dir . $clean_name;
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
            $photo_path = $target;
        }
    }
    
    $sql = "INSERT INTO employes (prenom, nom, fonction, membre_fondateur, membre_adherent, ville_service, date_embauche, statut, photo)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$prenom, $nom, $fonction, $membre_fondateur, $membre_adherent, $ville_service, $date_embauche, $statut, $photo_path]);
    
    $_SESSION['success'] = "Membre ajouté avec succès !";
    header("Location: gestion_membres.php");
    exit();
}

// MODIFIER
elseif ($action == 'edit') {
    $id = $_POST['edit_id'];
    $prenom = trim($_POST['prenom']);
    $nom = trim($_POST['nom']);
    $fonction = trim($_POST['fonction']);
    $ville_service = trim($_POST['ville_service']);
    $date_embauche = $_POST['date_embauche'];
    $membre_fondateur = isset($_POST['membre_fondateur']) ? 1 : 0;
    $membre_adherent = isset($_POST['membre_adherent']) ? 1 : 0;
    $statut = $_POST['statut'];
    
    $stmt = $pdo->prepare("SELECT photo FROM employes WHERE id = ?");
    $stmt->execute([$id]);
    $old_photo = $stmt->fetchColumn();
    $photo_path = $old_photo;
    
    if (!empty($_FILES['photo']['name'])) {
        $upload_dir = 'images/';
        $clean_name = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', basename($_FILES['photo']['name']));
        $target = $upload_dir . $clean_name;
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
            $photo_path = $target;
            if ($old_photo && $old_photo != 'images/default.png' && file_exists($old_photo)) {
                unlink($old_photo);
            }
        }
    }
    
    $sql = "UPDATE employes SET prenom=?, nom=?, fonction=?, membre_fondateur=?, membre_adherent=?, ville_service=?, date_embauche=?, statut=?, photo=? WHERE id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$prenom, $nom, $fonction, $membre_fondateur, $membre_adherent, $ville_service, $date_embauche, $statut, $photo_path, $id]);
    
    $_SESSION['success'] = "Membre modifié avec succès !";
    header("Location: gestion_membres.php");
    exit();
}

// SUPPRIMER
elseif ($action == 'delete') {
    $id = $_POST['delete_id'];
    
    $stmt = $pdo->prepare("SELECT photo FROM employes WHERE id = ?");
    $stmt->execute([$id]);
    $photo = $stmt->fetchColumn();
    
    $stmt = $pdo->prepare("DELETE FROM employes WHERE id = ?");
    $stmt->execute([$id]);
    
    if ($photo && $photo != 'images/default.png' && file_exists($photo)) {
        unlink($photo);
    }
    
    $_SESSION['success'] = "Membre supprimé avec succès !";
    header("Location: gestion_membres.php");
    exit();
}

header("Location: gestion_membres.php");
?>