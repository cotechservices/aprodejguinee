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
        .team-img {
            width: 100%;
            height: 300px;
            overflow: hidden;
            background-color: #f0f0f0;
        }

        .team-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: top center; 
            transition: transform 0.3s ease;
        }

        .team-img img:hover {
            transform: scale(1.05);
        }
        .ancien-section {
            opacity: 0.8;
        }
        .badge-ancien {
            background-color: #6c757d;
            color: white;
            padding: 3px 8px;
            border-radius: 15px;
            font-size: 12px;
            display: inline-block;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block w-100">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>Labé et Boké</small>
                    <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>+224 622 515 869</small>
                    <small class="text-light"><i class="fa fa-envelope-open me-2"></i> aprodejlabe2007@gmail.com </small>
                </div>
            </div>
            <div class="col-lg-4 text-lg-end text-center text-lg-end mb-4 mb-lg-0">
                <div class="text-lg-end text-center text-lg-end mb-6 mb-lg-0 align-items-end" style="height: 45px;">
                    <p style="color: aliceblue; text-align: center; ">APRODEJ-GUINEE <br>l'ONG qui défend vos droits </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->        
    
    <!-- Navbar & Carousel Start -->
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
                        <li class="nav-item"><a href="equipe.php" class="nav-link active">Membres</a></li>
                        <li class="nav-item"><a href="blog.php" class="nav-link">Activités</a></li>
                        <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn" style="font-size: 80px;">Les membres</h1>
                    <a href="" class="h5 text-white">Actif 7/7</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="" class="h5 text-white">24H/24</a> 
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Team Start -->
    <div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="fw-bold text-primary text-uppercase" style="text-align: center;">APRODEJ-GUINEE</h1>
            <h1 class="mb-0" style="text-align: center;">Nous défendons les enfants et les droits humains</h1>
            <h5 style="text-align: center;"> 
                ASSOCIATION DE LA PROMOTION ET LE DÉVELOPPEMENT DE L'ENTREPREUNARIAT ET JEUNESSE
                ONG DE PROTECTION DES DROITS HUMAINS ET DE L'ENVIRONNEMENT
            </h5>
            
            <?php
            // Inclusion de la connexion à la base de données
            include("config/config.php");
            
            // Fonction pour afficher les membres par catégorie
            function displayMembers($pdo, $type, $title, $delay_start = 0.3, $show_ancien = false) {
                echo '<div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">';
                echo '<h3 class="mb-0">' . $title . '</h3>';
                echo '</div>';
                echo '<div class="row g-5">';
                
                $delay = $delay_start;
                $sql = "";
                
                if ($show_ancien) {
                    // Afficher les anciens membres
                    if ($type == 'fondateur') {
                        $sql = "SELECT * FROM employes WHERE membre_fondateur = 1 AND statut = 'ancien' ORDER BY id ASC";
                    } elseif ($type == 'adherent') {
                        $sql = "SELECT * FROM employes WHERE membre_adherent = 1 AND statut = 'ancien' ORDER BY id ASC";
                    } elseif ($type == 'employe') {
                        $sql = "SELECT * FROM employes WHERE membre_fondateur = 0 AND membre_adherent = 0 AND statut = 'ancien' ORDER BY id ASC";
                    }
                } else {
                    // Afficher les membres actifs
                    if ($type == 'fondateur') {
                        $sql = "SELECT * FROM employes WHERE membre_fondateur = 1 AND statut = 'actif' ORDER BY id ASC";
                    } elseif ($type == 'adherent') {
                        $sql = "SELECT * FROM employes WHERE membre_adherent = 1 AND statut = 'actif' ORDER BY id ASC";
                    } elseif ($type == 'employe') {
                        $sql = "SELECT * FROM employes WHERE membre_fondateur = 0 AND membre_adherent = 0 AND statut = 'actif' ORDER BY id ASC";
                    }
                }
                
                try {
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $members = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    
                    if (count($members) > 0) {
                        foreach ($members as $member) {
                            // Gestion de la photo
                            $photo = !empty($member['photo']) && file_exists($member['photo']) ? $member['photo'] : 'images/default.png';
                            if (!file_exists($photo)) {
                                $photo = 'images/default.png';
                            }
                            
                            echo '<div class="col-lg-4 wow slideInUp" data-wow-delay="' . $delay . 's">';
                            echo '<div class="team-item bg-light rounded overflow-hidden">';
                            echo '<div class="team-img position-relative overflow-hidden">';
                            echo '<img class="img-fluid w-100" src="' . $photo . '" alt="' . htmlspecialchars($member['prenom']) . ' ' . htmlspecialchars($member['nom']) . '">';
                            echo '</div>';
                            echo '<div class="text-center py-4">';
                            echo '<h4 class="text-primary">' . htmlspecialchars($member['prenom']) . ' ' . htmlspecialchars($member['nom']) . '</h4>';
                            echo '<p class="text-uppercase m-0">' . htmlspecialchars($member['fonction']) . '<br>';
                            if ($type == 'fondateur') {
                                echo '<b>MEMBRE FONDATEUR</b>';
                            } elseif ($type == 'adherent') {
                                echo '<b>MEMBRE ADHERENT</b>';
                            } else {
                                echo '<b>EMPLOYE</b>';
                            }
                            if ($show_ancien) {
                                echo '<br><span class="badge-ancien">Ancien membre</span>';
                            }
                            echo '</p>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            
                            $delay += 0.3;
                            if ($delay > 1.2) $delay = 0.3;
                        }
                    } else {
                        if (!$show_ancien) {
                            echo '<div class="col-12 text-center"><p>Aucun membre dans cette catégorie.</p></div>';
                        }
                    }
                } catch (PDOException $e) {
                    echo '<div class="col-12 text-center"><p>Erreur : ' . $e->getMessage() . '</p></div>';
                }
                
                echo '</div>';
            }
            
            // Affichage des membres actifs
            displayMembers($pdo, 'fondateur', 'Membres Fondateurs', 0.3, false);
            echo '<br>';
            displayMembers($pdo, 'adherent', 'Membres Adhérents', 0.3, false);
            displayMembers($pdo, 'employe', 'EMPLOYES', 0.3, false);
            
            // Affichage des anciens membres en bas
            echo '<br><hr style="border-top: 2px solid #06BBCC; margin: 30px 0;">';
            echo '<div class="ancien-section">';
            displayMembers($pdo, 'fondateur', 'Anciens Membres Fondateurs', 0.3, true);
            echo '<br>';
            displayMembers($pdo, 'adherent', 'Anciens Membres Adhérents', 0.3, true);
            displayMembers($pdo, 'employe', 'Anciens EMPLOYES', 0.3, true);
            echo '</div>';
            ?>
            
        </div>
    </div>
    <!-- Team End -->

    <!-- Vendor Start -->
    <div class="container py-5 mb-5">
        <div class="bg-white">
            <div class="owl-carousel vendor-carousel">
                <img src="img/ID/PRESI2.jpg" alt="">
                <img src="img/ID/MARIAMA LAMARANA DIALLO ANIMATRICE CU GAOUL.jpg" alt="">
                <img src="img/ID/MORIBA FOFANA CHARGE DE PROGRAMME.jpg" alt="">
                <img src="img/ID/MAMADOU KAZALIOU BAH ANIMATEUR GUINGAN.jpg" alt="">
                <img src="img/ID/AMADOU KORKA DIALLO ANIMATEUR MALANTA 1.jpg" alt="">
                <img src="img/ID/MAMADOU OURY TANTA DIALLO CHARGE DE PROJET.jpg" alt="">
                <img src="img/ID/MAMADOU ALIMOU BALDE ACCOMPAGNATEUR.jpg" alt="">
                <img src="img/ID/SARATA KANTE ANIMARICE YOUKOUNKOUN.jpg" alt="">
            </div>
        </div>
    </div>
    <!-- Vendor End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s w-100">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-4 col-md-6 footer-about">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-primary p-4">
                        <a href="index.php" class="navbar-brand">
                            <h3 class="m-0 text-white"><i class="fa fa-user-tie me-2"></i>APRODEJ-GUINEE</h3>
                        </a>
                        <p class="mt-3 mb-4">ASSOCIATION LA PROMOTION ET LE DÉVELOPPEMENT DE L'ENTREPREUNARIAT ET JEUNESSE ONG DE PROTECTION DES DROITS HUMAINS ET DE L'ENVIRONNEMENT.
                            <br> 
                            <br>
                            <em>Le soutien des enfants, jeunes et les personnes vulnerables</em>
                        </p>
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
                                    <a href="https://www.google.com/maps/place/ONG+APRODEJ/@11.315768,-12.2951546,17z/">Labé et Boké</a>
                                </p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-envelope-open text-primary me-2"></i>
                                <p class="mb-0"><a href="https://mail.google.com/mail/u/0/"> aprodejlabe2007@gmail.com</a></p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-telephone text-primary me-2"></i>
                                <p class="mb-0">+224 622 515 869</p>
                            </div>
                            <div class="d-flex mt-4">
                                <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-primary btn-square me-2" href="https://www.facebook.com/profile.php?id=100063629130970"><i class="fab fa-facebook-f fw-normal"></i></a>
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
                                <a class="text-light mb-2" href="apropos.php"><i class="bi bi-arrow-right text-primary me-2"></i>Apropos</a>
                                <a class="text-light mb-2" href="projets.php"><i class="bi bi-arrow-right text-primary me-2"></i>Nos Projets</a>
                                <a class="text-light mb-2" href="equipe.php"><i class="bi bi-arrow-right text-primary me-2"></i>Notre Equipe</a>
                                <a class="text-light" href="contact.php"><i class="bi bi-arrow-right text-primary me-2"></i>Contactez-nous</a>
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
                                    <img src="img/francofonie.png" alt="Francophonie" class="img-fluid bg-white p-1 rounded">
                                </div>
                                <div class="col-6">
                                    <img src="img/LogoAFD_EF.jpeg" alt="Expertise France" class="img-fluid bg-white p-1 rounded">
                                </div>
                            </div>
                        </div>                 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-white w-100" style="background: #061429;">
        <div class="container text-center">
            <div class="row justify-content-end">
                <div class="col-lg-8 col-md-6">
                    <div class="d-flex align-items-center justify-content-center" style="height: 75px;">
                        <p class="mb-0">&copy;2023 <a class="text-white border-bottom" href="index.php" style="font-size: 15px;">aprodejguinee.org</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>

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