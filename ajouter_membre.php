<?php include("config/config.php"); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Ajouter un membre - APRODEJ Guinée</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
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
  </style>
</head>
<body class="bg-light">

<div class="container py-4">
  <h2 class="text-center mb-4 text-success">Formulaire d'inscription d'un membre (<b>APRODEJGUINEE</b>)</h2>

  <div class="card shadow p-4">
    <form action="" method="POST" enctype="multipart/form-data">

      <!-- NOM & PRÉNOM -->
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

      <!-- FONCTION -->
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
        
        <!-- Champ pour saisir une autre fonction -->
        <div id="otherFunctionDiv" class="other-function-field">
          <label class="form-label">Précisez la fonction :</label>
          <input type="text" name="autre_fonction" id="autre_fonction" class="form-control" placeholder="Ex: Consultant, Stagiaire, etc.">
        </div>
      </div>

      <!-- VILLE + DATE D'EMBAUCHE -->
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

      <!-- CHECKBOXES -->
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

      <!-- PHOTO -->
      <div class="mb-3">
        <label class="form-label">Photo de profil :</label>
        <input type="file" name="photo" class="form-control" accept="image/*">
      </div>

      <!-- STATUT -->
      <div class="mb-3">
        <label class="form-label">Statut :</label>
        <select name="statut" class="form-select">
          <option value="actif">Actif</option>
          <option value="ancien">Ancien</option>
        </select>
      </div>

      <button type="submit" name="ajouter" class="btn btn-success w-100">Enregistrer le membre</button>
      <a href="equipe.php" class="btn btn-outline-secondary w-100 mt-2">Voir les membres</a>
    </form>
  </div>

  <?php
  // Variable pour savoir si l'insertion a réussi
  $insertion_reussie = false;
  $nom_membre = "";
  $prenom_membre = "";

  if (isset($_POST['ajouter'])) {
      $prenom = $_POST['prenom'];
      $nom = $_POST['nom'];
      $fonction = $_POST['fonction'];
      
      // Si "Autre" est sélectionné, utiliser la valeur du champ texte
      if ($fonction == 'autre') {
          $fonction = !empty($_POST['autre_fonction']) ? $_POST['autre_fonction'] : 'Autre fonction non précisée';
      }
      
      $ville_service = $_POST['ville_service'];
      $date_embauche = $_POST['date_embauche'];
      $membre_fondateur = isset($_POST['membre_fondateur']) ? 1 : 0;
      $membre_adherent = isset($_POST['membre_adherent']) ? 1 : 0;
      $statut = $_POST['statut'];

      // 📸 Gestion de la photo avec création du dossier si nécessaire
      $photo_path = 'images/default.png';
      
      // Vérifier si le dossier images existe, sinon le créer
      $upload_dir = 'images/';
      if (!file_exists($upload_dir)) {
          mkdir($upload_dir, 0777, true);
      }
      
      if (!empty($_FILES['photo']['name'])) {
          // Nettoyer le nom du fichier (enlever les espaces et caractères spéciaux)
          $original_name = basename($_FILES['photo']['name']);
          $file_extension = pathinfo($original_name, PATHINFO_EXTENSION);
          $clean_name = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $original_name);
          $target = $upload_dir . $clean_name;
          
          // Vérifier si le fichier a bien été uploadé
          if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
              if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
                  $photo_path = $target;
              }
          }
      }

      try {
          $sql = "INSERT INTO employes (prenom, nom, fonction, membre_fondateur, membre_adherent, ville_service, date_embauche, statut, photo)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
          $stmt = $pdo->prepare($sql);
          $stmt->execute([$prenom, $nom, $fonction, $membre_fondateur, $membre_adherent, $ville_service, $date_embauche, $statut, $photo_path]);
          
          // Succès de l'insertion
          $insertion_reussie = true;
          $nom_membre = $nom;
          $prenom_membre = $prenom;
      } catch (PDOException $e) {
          echo '<div class="alert alert-danger mt-3">Erreur : ' . $e->getMessage() . '</div>';
      }
  }
  ?>

  <!-- MODAL DE SUCCÈS APRÈS AJOUT -->
  <?php if ($insertion_reussie): ?>
  <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title" id="successModalLabel">✅ Membre ajouté avec succès !</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>
        <div class="modal-body text-center py-4">
          <div class="mb-3">
            <span style="font-size: 60px;">👤</span>
          </div>
          <p class="lead">Le membre <strong>"<?php echo htmlspecialchars($prenom_membre) . ' ' . htmlspecialchars($nom_membre); ?>"</strong> a été ajouté avec succès.</p>
          <p class="text-muted">Que souhaitez-vous faire maintenant ?</p>
        </div>
        <div class="modal-footer justify-content-center gap-3">
          <button type="button" class="btn btn-primary btn-lg btn-custom" id="btnAjouterEncore">
            Ajouter un autre membre
          </button>
          <button type="button" class="btn btn-success btn-lg btn-custom" id="btnVoirMembres">
            Voir les membres
          </button>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Afficher le modal automatiquement au chargement
    document.addEventListener('DOMContentLoaded', function() {
      var successModal = new bootstrap.Modal(document.getElementById('successModal'));
      successModal.show();
      
      // Bouton "Ajouter un autre membre" - recharge la page pour un nouveau formulaire vide
      document.getElementById('btnAjouterEncore').addEventListener('click', function() {
        window.location.href = window.location.pathname;
      });
      
      // Bouton "Voir les membres" - redirige vers la page equipe.php
      document.getElementById('btnVoirMembres').addEventListener('click', function() {
        window.location.href = 'equipe.php';
      });
    });
  </script>
  <?php endif; ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Script pour afficher/masquer le champ "Autre fonction" -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const fonctionSelect = document.getElementById('fonction');
    const otherFunctionDiv = document.getElementById('otherFunctionDiv');
    const autreFonctionInput = document.getElementById('autre_fonction');
    
    function toggleOtherFunctionField() {
        if (fonctionSelect.value === 'autre') {
            otherFunctionDiv.classList.add('show');
            autreFonctionInput.setAttribute('required', 'required');
        } else {
            otherFunctionDiv.classList.remove('show');
            autreFonctionInput.removeAttribute('required');
            autreFonctionInput.value = ''; // Vider le champ quand on change d'option
        }
    }
    
    // Écouter le changement de sélection
    fonctionSelect.addEventListener('change', toggleOtherFunctionField);
    
    // Vérifier au chargement si "Autre" est déjà sélectionné (utile après rechargement)
    toggleOtherFunctionField();
});
</script>

</body>
</html>