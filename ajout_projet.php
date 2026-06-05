<?php include("config/config.php"); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Aprodej - Gestion des activités</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>
    .modal-header {
      background-color: #061a3a;
      color: white;
    }
    .modal-header .btn-close {
      background-color: white;
    }
    .btn-custom {
      margin: 5px;
      padding: 10px 20px;
    }
  </style>
</head>
<body class="container py-5">

  <h2 class="mb-4 text-center mb-4 text-success">Ajouter une activité du projet en cours (<b>APRODEJGUINEE</b>)</h2>

  <?php
  // Variable pour savoir si l'insertion a réussi
  $insertion_reussie = false;
  $titre_ajoute = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $titre = $_POST["titre"];
      $lieu = $_POST["lieu"];
      $date_projet = $_POST["date_projet"];
      $description = $_POST["description"];

      // Upload de l'image
      $image = "";
      if (!empty($_FILES["image"]["name"])) {
          $target_dir = "uploads/";
          if (!is_dir($target_dir)) mkdir($target_dir);
          $image = $target_dir . time() . '_' . basename($_FILES["image"]["name"]);
          move_uploaded_file($_FILES["image"]["tmp_name"], $image);
      }

      // Insertion en BDD avec PDO
      $sql = "INSERT INTO projets (titre, image, lieu, date_projet, description) 
              VALUES (:titre, :image, :lieu, :date_projet, :description)";
      $stmt = $pdo->prepare($sql);

      if ($stmt->execute([
          ":titre" => $titre,
          ":image" => $image,
          ":lieu" => $lieu,
          ":date_projet" => $date_projet,
          ":description" => $description
      ])) {
          $insertion_reussie = true;
          $titre_ajoute = $titre;
      }
  }
  ?>

  <!-- MODAL DE SUCCÈS APRÈS AJOUT -->
  <?php if ($insertion_reussie): ?>
  <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title" id="successModalLabel">✅ Activité ajoutée avec succès !</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>
        <div class="modal-body text-center py-4">
          <div class="mb-3">
            <span style="font-size: 60px;"></span>
          </div>
          <p class="lead">L'activité <strong>"<?php echo htmlspecialchars($titre_ajoute); ?>"</strong> a été ajoutée avec succès.</p>
          <p class="text-muted">Que souhaitez-vous faire maintenant ?</p>
        </div>
        <div class="modal-footer justify-content-center gap-3">
          <button type="button" class="btn btn-primary btn-lg btn-custom" id="btnAjouterEncore">
            Ajouter une autre activité
          </button>
          <button type="button" class="btn btn-success btn-lg btn-custom" id="btnVoirActivites">
            Voir les activités
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
      
      // Bouton "Ajouter une autre activité" - recharge la page pour un nouveau formulaire vide
      document.getElementById('btnAjouterEncore').addEventListener('click', function() {
        window.location.href = window.location.pathname;
      });
      
      // Bouton "Voir les activités" - redirige vers la page des activités
      document.getElementById('btnVoirActivites').addEventListener('click', function() {
        window.location.href = 'blog.php';
      });
    });
  </script>
  <?php endif; ?>

  <form method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label class="form-label">Titre du projet</label>
      <input type="text" name="titre" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Image</label>
      <input type="file" name="image" class="form-control" accept="image/*" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Lieu</label>
      <input type="text" name="lieu" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Date</label>
      <input type="date" name="date_projet" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Description</label>
      <textarea name="description" class="form-control" rows="4" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Ajouter le projet</button>
    <a href="blog.php" class="btn btn-outline-secondary">Voir les activités</a>
  </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>