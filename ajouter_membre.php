<?php include("config/config.php"); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Gestion des membres - APRODEJ Guinée</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <style>
    .modal-header {
      background-color: #28a745;
      color: white;
    }
    .modal-header .btn-close {
      background-color: white;
    }
    .btn-custom {
      margin: 5px;
      padding: 10px 20px;
    }
    .other-function-field {
      margin-top: 10px;
      display: none;
    }
    .other-function-field.show {
      display: block;
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
    .member-photo {
      width: 50px;
      height: 50px;
      object-fit: cover;
      border-radius: 50%;
    }
    .table th {
      background-color: #28a745;
      color: white;
    }
  </style>
</head>
<body class="bg-light">

<div class="container py-4">
  <!-- Onglets de navigation -->
  <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="add-tab" data-bs-toggle="tab" data-bs-target="#add" type="button" role="tab">
        <i class="fas fa-user-plus"></i> Ajouter un membre
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="list-tab" data-bs-toggle="tab" data-bs-target="#list" type="button" role="tab">
        <i class="fas fa-list"></i> Liste des membres
      </button>
    </li>
  </ul>

  <div class="tab-content">
    <!-- Onglet AJOUTER -->
    <div class="tab-pane fade show active" id="add" role="tabpanel">
      <div class="card shadow p-4">
        <h3 class="text-center mb-4 text-success">Formulaire d'inscription d'un membre</h3>
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label">Prénom :</label>
              <input type="text" name="prenom" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Nom :</label>
              <input type="text" name="nom" class="form-control" required>
            </div>
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

          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label">Ville de service :</label>
              <input type="text" name="ville_service" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Date d'embauche :</label>
              <input type="date" name="date_embauche" class="form-control" required>
            </div>
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

          <button type="submit" name="ajouter" class="btn btn-success w-100">Enregistrer le membre</button>
        </form>
      </div>
    </div>

    <!-- Onglet LISTE DES MEMBRES -->
    <div class="tab-pane fade" id="list" role="tabpanel">
      <div class="card shadow p-4">
        <h3 class="text-center mb-4 text-primary">Liste des membres</h3>
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
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
                    <i class="fas fa-edit"></i> Modifier
                  </button>
                  <button type="button" class="btn btn-sm btn-delete" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $employe['id'] ?>">
                    <i class="fas fa-trash"></i> Supprimer
                  </button>
                  <button type="button" class="btn btn-sm btn-view" data-bs-toggle="modal" data-bs-target="#viewModal<?= $employe['id'] ?>">
                    <i class="fas fa-eye"></i> Voir
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
                    <form action="" method="POST" enctype="multipart/form-data">
                      <div class="modal-body">
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
                        <button type="submit" name="modifier" class="btn btn-warning">Enregistrer les modifications</button>
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
                      <h5 class="modal-title"><i class="fas fa-trash"></i> Confirmer la suppression</h5>
                      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                      <p>Êtes-vous sûr de vouloir supprimer le membre <strong><?= htmlspecialchars($employe['prenom']) . ' ' . htmlspecialchars($employe['nom']) ?></strong> ?</p>
                      <p class="text-danger">Cette action est irréversible !</p>
                    </div>
                    <div class="modal-footer">
                      <form action="" method="POST">
                        <input type="hidden" name="delete_id" value="<?= $employe['id'] ?>">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" name="supprimer" class="btn btn-danger">Supprimer</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

              <!-- MODAL VOIR DÉTAILS -->
              <div class="modal fade" id="viewModal<?= $employe['id'] ?>" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                      <h5 class="modal-title"><i class="fas fa-user"></i> Détails du membre</h5>
                      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body text-center">
                      <img src="<?= $photo ?>" style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%; margin-bottom: 15px;">
                      <h4><?= htmlspecialchars($employe['prenom']) . ' ' . htmlspecialchars($employe['nom']) ?></h4>
                      <p><strong>Fonction :</strong> <?= htmlspecialchars($employe['fonction']) ?></p>
                      <p><strong>Ville :</strong> <?= htmlspecialchars($employe['ville_service']) ?></p>
                      <p><strong>Date d'embauche :</strong> <?= date('d/m/Y', strtotime($employe['date_embauche'])) ?></p>
                      <p><strong>Statut :</strong> <span class="<?= $statut_badge ?>"><?= ucfirst($employe['statut']) ?></span></p>
                      <p><strong>Membre fondateur :</strong> <?= $employe['membre_fondateur'] ? 'Oui' : 'Non' ?></p>
                      <p><strong>Membre adhérent :</strong> <?= $employe['membre_adherent'] ? 'Oui' : 'Non' ?></p>
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
</div>

<?php
// TRAITEMENT AJOUT
if (isset($_POST['ajouter'])) {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $fonction = $_POST['fonction'];
    if ($fonction == 'autre') {
        $fonction = !empty($_POST['autre_fonction']) ? $_POST['autre_fonction'] : 'Autre fonction non précisée';
    }
    $ville_service = $_POST['ville_service'];
    $date_embauche = $_POST['date_embauche'];
    $membre_fondateur = isset($_POST['membre_fondateur']) ? 1 : 0;
    $membre_adherent = isset($_POST['membre_adherent']) ? 1 : 0;
    $statut = $_POST['statut'];
    $photo_path = 'images/default.png';
    
    $upload_dir = 'images/';
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }
    
    if (!empty($_FILES['photo']['name'])) {
        $clean_name = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', basename($_FILES['photo']['name']));
        $target = $upload_dir . $clean_name;
        if ($_FILES['photo']['error'] === UPLOAD_ERR_OK && move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
            $photo_path = $target;
        }
    }
    
    try {
        $sql = "INSERT INTO employes (prenom, nom, fonction, membre_fondateur, membre_adherent, ville_service, date_embauche, statut, photo)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$prenom, $nom, $fonction, $membre_fondateur, $membre_adherent, $ville_service, $date_embauche, $statut, $photo_path]);
        echo '<script>alert("Membre ajouté avec succès !"); window.location.href = window.location.pathname + "?page=equipe&tab=list";</script>';
    } catch (PDOException $e) {
        echo '<div class="alert alert-danger">Erreur : ' . $e->getMessage() . '</div>';
    }
}

// TRAITEMENT MODIFICATION
if (isset($_POST['modifier'])) {
    $id = $_POST['edit_id'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $fonction = $_POST['fonction'];
    $ville_service = $_POST['ville_service'];
    $date_embauche = $_POST['date_embauche'];
    $membre_fondateur = isset($_POST['membre_fondateur']) ? 1 : 0;
    $membre_adherent = isset($_POST['membre_adherent']) ? 1 : 0;
    $statut = $_POST['statut'];
    
    // Récupérer l'ancienne photo
    $stmt = $pdo->prepare("SELECT photo FROM employes WHERE id = ?");
    $stmt->execute([$id]);
    $old_photo = $stmt->fetchColumn();
    $photo_path = $old_photo;
    
    if (!empty($_FILES['photo']['name'])) {
        $upload_dir = 'images/';
        $clean_name = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', basename($_FILES['photo']['name']));
        $target = $upload_dir . $clean_name;
        if ($_FILES['photo']['error'] === UPLOAD_ERR_OK && move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
            $photo_path = $target;
            // Supprimer l'ancienne photo si ce n'est pas default.png
            if ($old_photo && $old_photo != 'images/default.png' && file_exists($old_photo)) {
                unlink($old_photo);
            }
        }
    }
    
    try {
        $sql = "UPDATE employes SET prenom=?, nom=?, fonction=?, membre_fondateur=?, membre_adherent=?, ville_service=?, date_embauche=?, statut=?, photo=? WHERE id=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$prenom, $nom, $fonction, $membre_fondateur, $membre_adherent, $ville_service, $date_embauche, $statut, $photo_path, $id]);
        echo '<script>alert("Membre modifié avec succès !"); window.location.href = window.location.pathname + "?page=equipe&tab=list";</script>';
    } catch (PDOException $e) {
        echo '<div class="alert alert-danger">Erreur : ' . $e->getMessage() . '</div>';
    }
}

// TRAITEMENT SUPPRESSION
if (isset($_POST['supprimer'])) {
    $id = $_POST['delete_id'];
    
    // Récupérer la photo pour la supprimer
    $stmt = $pdo->prepare("SELECT photo FROM employes WHERE id = ?");
    $stmt->execute([$id]);
    $photo = $stmt->fetchColumn();
    
    try {
        $stmt = $pdo->prepare("DELETE FROM employes WHERE id = ?");
        $stmt->execute([$id]);
        
        // Supprimer la photo si ce n'est pas default.png
        if ($photo && $photo != 'images/default.png' && file_exists($photo)) {
            unlink($photo);
        }
        
        echo '<script>alert("Membre supprimé avec succès !"); window.location.href = window.location.pathname + "?page=equipe&tab=list";</script>';
    } catch (PDOException $e) {
        echo '<div class="alert alert-danger">Erreur : ' . $e->getMessage() . '</div>';
    }
}
?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Gérer l'affichage du champ "Autre fonction"
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
    
    // Ouvrir l'onglet Liste si spécifié dans l'URL
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('tab') === 'list') {
        const listTab = document.querySelector('#list-tab');
        if (listTab) {
            const tab = new bootstrap.Tab(listTab);
            tab.show();
        }
    }
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>