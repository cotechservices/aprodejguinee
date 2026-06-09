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
    $titre = trim($_POST['titre']);
    $lieu = trim($_POST['lieu']);
    $date_projet = $_POST['date_projet'];
    $description = trim($_POST['description']);
    
    // Créer le dossier uploads s'il n'existe pas
    $upload_dir = 'uploads/';
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }
    
    // Upload de l'image
    $image_path = '';
    if (!empty($_FILES['image']['name'])) {
        $clean_name = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', basename($_FILES['image']['name']));
        $target = $upload_dir . $clean_name;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $image_path = $target;
        }
    }
    
    if ($image_path) {
        $sql = "INSERT INTO projets (titre, image, lieu, date_projet, description) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$titre, $image_path, $lieu, $date_projet, $description]);
        
        $_SESSION['success'] = "Activité ajoutée avec succès !";
    } else {
        $_SESSION['error'] = "Erreur lors de l'upload de l'image.";
    }
    
    header("Location: gestion_projets.php");
    exit();
}

// MODIFIER
elseif ($action == 'edit') {
    $id = $_POST['edit_id'];
    $titre = trim($_POST['titre']);
    $lieu = trim($_POST['lieu']);
    $date_projet = $_POST['date_projet'];
    $description = trim($_POST['description']);
    
    // Récupérer l'ancienne image
    $stmt = $pdo->prepare("SELECT image FROM projets WHERE id = ?");
    $stmt->execute([$id]);
    $old_image = $stmt->fetchColumn();
    $image_path = $old_image;
    
    // Upload de la nouvelle image si fournie
    if (!empty($_FILES['image']['name'])) {
        $upload_dir = 'uploads/';
        $clean_name = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', basename($_FILES['image']['name']));
        $target = $upload_dir . $clean_name;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $image_path = $target;
            // Supprimer l'ancienne image
            if ($old_image && file_exists($old_image)) {
                unlink($old_image);
            }
        }
    }
    
    $sql = "UPDATE projets SET titre=?, image=?, lieu=?, date_projet=?, description=? WHERE id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$titre, $image_path, $lieu, $date_projet, $description, $id]);
    
    $_SESSION['success'] = "Activité modifiée avec succès !";
    header("Location: gestion_projets.php");
    exit();
}

// SUPPRIMER
elseif ($action == 'delete') {
    $id = $_POST['delete_id'];
    
    // Récupérer l'image avant suppression
    $stmt = $pdo->prepare("SELECT image FROM projets WHERE id = ?");
    $stmt->execute([$id]);
    $image = $stmt->fetchColumn();
    
    $stmt = $pdo->prepare("DELETE FROM projets WHERE id = ?");
    $stmt->execute([$id]);
    
    // Supprimer l'image
    if ($image && file_exists($image)) {
        unlink($image);
    }
    
    $_SESSION['success'] = "Activité supprimée avec succès !";
    header("Location: gestion_projets.php");
    exit();
}

header("Location: gestion_projets.php");
?>