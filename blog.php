<?php include("config/config.php"); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>aprodejguinee.org</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=no">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    
    <style>
        /* ===== SEULEMENT AJOUT POUR FORCER LA MÊME TAILLE D'IMAGES DES ACTIVITÉS ===== */
        .card-img-top {
            width: 100%;
            height: 250px;
            object-fit: cover;
            object-position: center;
        }
        
        /* Ajustement pour les petits écrans */
        @media (max-width: 768px) {
            .card-img-top {
                height: 220px;
            }
        }
        
        @media (max-width: 576px) {
            .card-img-top {
                height: 200px;
            }
        }
    </style>
</head>

<body>
    
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block w-100">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>Labé, Guinée Conakry</small>
                    <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>+224 622 515 869</small>
                    <small class="text-light"><i class="fa fa-envelope-open me-2"></i> aprodejlabe2007@gmail.com </small>
                </div>
            </div>
            <div class="col-lg-4 text-lg-end text-center text-lg-end mb-4 mb-lg-0">
                <div class="text-lg-end text-center text-lg-end mb-6 mb-lg-0 align-items-end" style="height: 45px;">
                    <p style="color: aliceblue; text-align: center;">APRODEJ-GUINEE <br>l'ONG qui défend vos droits</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->        
    
    <!-- Navbar Start -->
    <div class="container-fluid position-relative p-0 w-100">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid px-2 px-md-4">
                <img src="img/logo.jpg" alt="logo aprodej" style="width: 55px; height: auto; border-radius: 10px;">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-label="Menu">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ms-auto py-2 py-lg-0">
                        <li class="nav-item"><a href="index.php" class="nav-link">Accueil</a></li>
                        <li class="nav-item"><a href="apropos.php" class="nav-link">Apropos</a></li>
                        <li class="nav-item"><a href="projets.php" class="nav-link">Projets</a></li>
                        <li class="nav-item"><a href="equipe.php" class="nav-link">Membres</a></li>
                        <li class="nav-item"><a href="blog.php" class="nav-link active">Activités</a></li>
                        <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn" style="font-size: 80px;">Nos activités</h1>
                    <a href="" class="h5 text-white">Actif 7/7</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="" class="h5 text-white">24H/24</a> 
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->
    
    <!-- Activities Start -->
    <div class="container">
        <div class="row g-4">
            <h1 class="fw-bold text-primary text-uppercase" style="text-align: center;">APRODEJ-GUINEE</h1>
            <h1 class="mb-0" style="text-align: center;">Nous défendons les enfants et les droits humains</h1>
            <h5 class="" style="text-align: center;"> 
                ASSOCIATION DE LA PROMOTION ET LE DÉVELOPPEMENT DE L'ENTREPREUNARIAT ET JEUNESSE
                ONG DE PROTECTION DES DROITS HUMAINS ET DE L'ENVIRONNEMENT
            </h5>
            <h1 class="mb-0 fw-bold text-primary text-uppercase" style="text-align: center;">Nos activités sur les terrains</h1>
            <?php
            try {
                $sql = "SELECT * FROM projets ORDER BY date_projet DESC";
                $stmt = $pdo->query($sql);

                if ($stmt->rowCount() > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $id = $row["id"];
                        echo '
                        <div class="col-lg-4 col-md-6">
                            <div class="card shadow-sm h-100 animate__animated animate__fadeInUp">
                                <img src="' . $row["image"] . '" class="card-img-top" alt="' . htmlspecialchars($row["titre"]) . '">
                                <div class="card-body">
                                    <h5 class="card-title">' . htmlspecialchars($row["titre"]) . '</h5>
                                    <p><strong>Lieu :</strong> ' . htmlspecialchars($row["lieu"]) . '</p>
                                    <p><strong>Date :</strong> ' . date("d/m/Y", strtotime($row["date_projet"])) . '</p>
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal' . $id . '">
                                        Voir détails
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="modal' . $id . '" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content animate__animated animate__zoomIn">
                                    <div class="modal-header">
                                        <h5 class="modal-title">' . htmlspecialchars($row["titre"]) . '</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="' . $row["image"] . '" class="img-fluid rounded mb-3" alt="">
                                        <p><strong>Lieu :</strong> ' . htmlspecialchars($row["lieu"]) . '</p>
                                        <p><strong>Date :</strong> ' . date("d/m/Y", strtotime($row["date_projet"])) . '</p>
                                        <hr>
                                        <p>' . nl2br(htmlspecialchars($row["description"])) . '</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ';
                    }
                } else {
                    echo "<p>Aucune activité trouvée.</p>";
                }
            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
            }
            ?>
        </div>
    </div>
    <!-- Activities End -->
    
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s w-100">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-4 col-md-6 footer-about">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-primary p-4">
                        <a href="index.php" class="navbar-brand">
                            <h3 class="m-0 text-white"><i class="fa fa-user-tie me-2"></i>APRODEJ-GUINEE</h3>
                        </a>
                         <p class="mt-3 mb-4">ASSOCIATION LA PROMOTION ET LE DÉVELOPPEMENT DE L’ENTREPREUNARIAT ET JEUNESSE ONG DE PROTECTION DES DROITS HUMAINS ET DE L’ENVIRONNEMENT.
                            <br> 
                             <br>
                           <em> Le soutien des enfants, jeunes et les personnes vulnerables</em></p>
                      
                    </div>
                </div>
                <div class="col-8">
                    <div class="row gx-5">
                        <div class="col-lg-5 col-md-12 pt-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Contact</h3>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-geo-alt text-primary me-2"></i>
                                <p class="mb-0">
                                    <a href="https://www.google.com/maps/place/ONG+APRODEJ/@11.315768,-12.2951546,17z/data=!4m14!1m7!3m6!1s0xefc3b73c592c1eb:0x2c3108ac467a4dc6!2sONG+APRODEJ!8m2!3d11.315768!4d-12.2902837!16s%2Fg%2F11sd73ngm0!3m5!1s0xefc3b73c592c1eb:0x2c3108ac467a4dc6!8m2!3d11.315768!4d-12.2902837!16s%2Fg%2F11sd73ngm0">Labé, Guinée Conakry</a></p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-envelope-open text-primary me-2"></i>
                                <p class="mb-0"> <a href="https://mail.google.com/mail/u/0/"> aprodejlabe2007@gmail.com</a> </p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-telephone text-primary me-2"></i>
                              <p class="mb-0"> +224 622 515 869</p>
                            </div>
                        
                            <div class="d-flex mt-4">
                                <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-primary btn-square me-2" href="https://www.facebook.com/profile.php?id=100063629130970&mibextid=ZbWKwL"><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                                <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Liens rapides</h3>
                            </div>
                            <div class="link-animated d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="index.php"><i class="bi bi-arrow-right text-primary me-2"></i>Accueil</a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Apropos</a>
                                <a class="text-light mb-2" href="apropos.php"><i class="bi bi-arrow-right text-primary me-2"></i>Nos Projets</a>
                                <a class="text-light mb-2" href="projets.php"><i class="bi bi-arrow-right text-primary me-2"></i>Notre Equipe</a>
                               
                                <a class="text-light" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Contactez-nous</a>
                            </div>
                        </div>
                       <div class="col-lg-3 col-md-12 pt-0 pt-lg-5 mb-5">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="text-light mb-0">Partenaires</h3>
                        </div>

                        <div class="row g-2 text-center">
                            <div class="col-6">
                                <img src="img/unicef.png" alt="UNICEF" class="img-fluid bg-white p-1 rounded">
                            </div>

                            <div class="col-6">
                                <img src="img/logo-union-europeenne.jpg" alt="Union Européenne" class="img-fluid bg-white p-1 rounded">
                            </div>

                            <div class="col-6">
                                <img src="img/logo_coop.4ba0e51e9185.png" alt="Coopération" class="img-fluid bg-white p-1 rounded">
                            </div>

                            <div class="col-6">
                                <img src="img/AFD.jfif" alt="AFD" class="img-fluid bg-white p-1 rounded">
                            </div>

                            <div class="col-6">
                                <img src="img/france.png" alt="France" class="img-fluid bg-white p-1 rounded">
                            </div>

                            <div class="col-6">
                                <img src="img/Expertise france.png" alt="Expertise France" class="img-fluid bg-white p-1 rounded">
                            </div>
                        </div>
                    </div>                 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-white w-100" style="background: #061429; ">
        <div class="container text-center">
            <div class="row justify-content-end">
                <div class="col-lg-8 col-md-6">
                    <div class="d-flex align-items-center justify-content-center" style="height: 75px;">
                        <p class="mb-0">&copy;2023 <a class="text-white border-bottom" href="index.php" style="font-size: 15px;">aprodejguinee.org</a>
						
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="index.html" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>