<?php include("config/config.php"); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Projet Francophonie - APRODEJ Guinée</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

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
    
    <style>
        .bg-header-francophonie {
            background: linear-gradient(rgba(9, 30, 62, 0.7), rgba(9, 30, 62, 0.7)), url(img/projet-francophonie-bg.jpg);
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .info-card {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        .info-card:hover {
            transform: translateY(-5px);
        }
        .beneficiary-card {
            background: linear-gradient(135deg, #06BBCC 0%, #0d9488 100%);
            color: white;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            transition: transform 0.3s;
        }
        .beneficiary-card:hover {
            transform: translateY(-5px);
        }
        .result-card {
            background: #f8f9fa;
            border-left: 5px solid #06BBCC;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
        }
        .gallery-img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            object-position: center;
            transition: transform 0.3s ease;
        }
        .team-item {
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .team-img {
            height: 250px;
            overflow: hidden;
            background-color: #f0f0f0;
        }
        .team-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }
        .team-img img:hover {
            transform: scale(1.05);
        }
        .activity-table {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .activity-table thead {
            background: #06BBCC;
            color: white;
        }
        .activity-table th, .activity-table td {
            padding: 12px;
            vertical-align: top;
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
                    <small class="text-light"><i class="fa fa-envelope-open me-2"></i> aprodejlabe2007@gmail.com</small>
                </div>
            </div>
            <div class="col-lg-4 text-lg-end text-center mb-4 mb-lg-0">
                <div class="text-lg-end text-center align-items-end" style="height: 45px;">
                    <p style="color: aliceblue; text-align: center;">APRODEJ-GUINEE <br>l'ONG qui défend vos droits</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->
    
    <!-- Navbar Start -->
    <div class="container-fluid position-relative p-0">
        <div class="container-fluid bg-primary py-5" style="margin-bottom: 20px;">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-lg-10 text-center">
                        <h1 class="display-4 text-white animated slideInDown">Renforcement de l'Autonomisation des Filles/Femmes de Bambaya</h1>
                        <h4 class="text-white animated slideInUp">en Maraichage et en Pisciculture</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Contenu Principal -->
    <div class="container-fluid py-2 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            
            <!-- En-tête du projet -->
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 800px;">
                <h1 class="mb-0">APRODEJ-GUINEE</h1>
            </div>
            
            <!-- Logo -->
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <img src="img/francofonie.png" alt="Organisation Internationale de la Francophonie" class="img-fluid" style="max-height: 100px; margin: 10px;">
                </div>
            </div>
            
            <!-- Informations clés -->
            <div class="row g-4 mb-5">
                <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.1s">
                    <div class="info-card text-center">
                        <i class="fas fa-hand-holding-usd fa-3x text-primary mb-3"></i>
                        <h4>Financement</h4>
                        <p>Organisation Internationale de la Francophonie (OIF)</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.3s">
                    <div class="info-card text-center">
                        <i class="fas fa-map-marked-alt fa-3x text-primary mb-3"></i>
                        <h4>Zone d'intervention</h4>
                        <p>Commune rurale de Bambaya</p>
                        <h6>Préfecture de Labé</h6>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.5s">
                    <div class="info-card text-center">
                        <i class="fas fa-calendar-alt fa-3x text-primary mb-3"></i>
                        <h4>Durée</h4>
                        <p>24 mois</p>
                        <h6>01 Septembre 2025 - 31 Août 2027</h6>
                    </div>
                </div>
            </div>
            
            <!-- Objectifs -->
            <div class="row mb-5">
                <div class="col-12">
                    <div class="info-card">
                        <h4><i class="fas fa-bullseye text-primary"></i> Objectif général</h4>
                        <p class="fs-5">Contribuer à l'autonomisation économique et sociale des filles et femmes de la commune rurale de Bambaya à travers le développement des activités génératrices de revenus en maraichage et en pisciculture</p>
                        
                        <h4 class="mt-4"><i class="fas fa-target text-primary"></i> Objectifs spécifiques</h4>
                        <ul class="fs-5">
                            <li>Renforcer les capacités techniques et entrepreneuriales des filles/femmes en maraichage et en pisciculture</li>
                            <li>Faciliter l'accès aux intrants agricoles et aux équipements de production</li>
                            <li>Appuyer la mise en place de systèmes de commercialisation des produits</li>
                            <li>Promouvoir la sécurité alimentaire et nutritionnelle au sein des ménages</li>
                        </ul>
                        
                        <hr class="my-4">
                        
                        <h4><i class="fas fa-file-alt text-primary"></i> Résumé exécutif</h4>
                        <p>Le projet vise à renforcer l'autonomisation des filles et femmes de la commune rurale de Bambaya à travers le maraichage et la pisciculture. Il s'articule autour du renforcement des capacités techniques et entrepreneuriales, de la facilitation d'accès aux intrants agricoles et équipements de production, de l'appui à la mise en place de systèmes de commercialisation des produits, et de la promotion de la sécurité alimentaire et nutritionnelle au sein des ménages.</p>
                        <p>À travers ce projet, les filles et femmes bénéficieront de formations en techniques agricoles modernes, en pisciculture, en gestion d'entreprise et en commercialisation. Des groupements d'épargne et de crédit seront également mis en place pour faciliter l'accès au financement.</p>
                    </div>
                </div>
            </div>
            
            <!-- Bénéficiaires -->
            <div class="row mb-5">
                <div class="col-12">
                    <div class="section-title text-center position-relative pb-3 mb-4 mx-auto">
                        <h5 class="fw-bold text-primary text-uppercase">Bénéficiaires</h5>
                        <h3 class="mb-0">300 femmes seront directement touchées</h3>
                    </div>
                </div>
                <div class="col-md-6 wow slideInUp" data-wow-delay="0.1s">
                    <div class="beneficiary-card">
                        <i class="fas fa-female fa-3x mb-3"></i>
                        <h4>Filles/Femmes vulnérables</h4>
                        <p class="display-6 fw-bold">250</p>
                        <p>Issues des ménages les plus démunis</p>
                    </div>
                </div>
                <div class="col-md-6 wow slideInUp" data-wow-delay="0.3s">
                    <div class="beneficiary-card">
                        <i class="fas fa-graduation-cap fa-3x mb-3"></i>
                        <h4>Jeunes filles déscolarisées</h4>
                        <p class="display-6 fw-bold">50</p>
                        <p>En quête d'insertion professionnelle</p>
                    </div>
                </div>
                <div class="col-12 text-center mt-3">
                    <div class="beneficiary-card" style="background: linear-gradient(135deg, #0d9488 0%, #06BBCC 100%);">
                        <i class="fas fa-users fa-3x mb-3"></i>
                        <h4>Bénéficiaires indirects</h4>
                        <p class="display-6 fw-bold">1 500</p>
                        <p>Personnes dans les ménages des bénéficiaires</p>
                    </div>
                </div>
            </div>
            
            <!-- Résultats attendus -->
            <div class="row mb-5">
                <div class="col-12">
                    <div class="section-title text-center position-relative pb-3 mb-4 mx-auto">
                        <h5 class="fw-bold text-primary text-uppercase">Résultats attendus</h5>
                        <h3 class="mb-0">Les résultats escomptés du projet</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="result-card">
                        <h5><i class="fas fa-check-circle text-primary"></i> Résultat 1</h5>
                        <p>Les capacités des femmes en techniques agricoles et piscicoles sont renforcées</p>
                    </div>
                    <div class="result-card">
                        <h5><i class="fas fa-check-circle text-primary"></i> Résultat 2</h5>
                        <p>La production maraîchère et halieutique est améliorée dans la commune de Bambaya</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="result-card">
                        <h5><i class="fas fa-check-circle text-primary"></i> Résultat 3</h5>
                        <p>Les revenus des ménages bénéficiaires sont augmentés</p>
                    </div>
                    <div class="result-card">
                        <h5><i class="fas fa-check-circle text-primary"></i> Résultat 4</h5>
                        <p>La sécurité alimentaire est renforcée au niveau communautaire</p>
                    </div>
                </div>
            </div>
            
            <!-- Activités principales -->
            <div class="row mb-5">
                <div class="col-12">
                    <div class="section-title text-center position-relative pb-3 mb-4 mx-auto">
                        <h5 class="fw-bold text-primary text-uppercase">Activités principales</h5>
                        <h3 class="mb-0">Plan d'actions du projet</h3>
                    </div>
                </div>
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="activity-table table table-bordered">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Activités</th>
                                    <th>Responsables</th>
                                    <th>Période</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td>1</td><td>Diagnostic participatif des besoins en maraichage et pisciculture</td><td>Coordinateur APRODEJ</td><td>Sept-Oct 2025</td></tr>
                                <tr><td>2</td><td>Formation en techniques de maraichage (production, compostage, gestion de l'eau)</td><td>Expert agricole</td><td>Oct-Nov 2025</td></tr>
                                <tr><td>3</td><td>Formation en pisciculture (construction d'étangs, alimentation, récolte)</td><td>Expert piscicole</td><td>Nov-Déc 2025</td></tr>
                                <tr><td>4</td><td>Distribution d'intrants agricoles (semences, plants, engrais bio)</td><td>Coordinateur APRODEJ</td><td>Janv-Fév 2026</td></tr>
                                <tr><td>5</td><td>Construction/aménagement d'étangs piscicoles</td><td>Expert piscicole</td><td>Mars-Avril 2026</td></tr>
                                <tr><td>6</td><td>Appui à la création de groupements d'épargne et de crédit</td><td>Chargé suivi-évaluation</td><td>Mai-Juin 2026</td></tr>
                                <tr><td>7</td><td>Formation en gestion d'entreprise et commercialisation</td><td>Expert en entrepreneuriat</td><td>Juin-Juil 2026</td></tr>
                                <tr><td>8</td><td>Sensibilisation sur les droits des femmes et l'égalité de genre</td><td>Chargée genre et inclusion</td><td>Continu</td></tr>
                                <tr><td>9</td><td>Appui à la mise en place de systèmes de commercialisation</td><td>Coordinateur APRODEJ</td><td>Août-Sept 2026</td></tr>
                                <tr><td>10</td><td>Suivi-évaluation et capitalisation des acquis</td><td>Chargé suivi-évaluation</td><td>Continu</td></tr>
                                <tr><td>11</td><td>Atelier de clôture et partage des résultats</td><td>Coordinateur APRODEJ</td><td>Août 2027</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- Galerie d'images -->
            <div class="row mb-5">
                <div class="col-12">
                    <div class="section-title text-center position-relative pb-3 mb-4 mx-auto">
                        <h5 class="fw-bold text-primary text-uppercase">Galerie</h5>
                        <h3 class="mb-0">Images du projet Francophonie</h3>
                    </div>
                </div>
            </div>
            
            <div class="row g-4 mb-5">
                <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid gallery-img" src="img/projet_francophonie/1.jpeg" alt="Activité maraichage 1">
                        </div>
                        <div class="text-center py-3">
                            <h5 class="text-primary">Activités de maraichage</h5>
                            <small>Préparation des planches</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid gallery-img" src="img/projet_francophonie/2.jpeg" alt="Activité maraichage 2">
                        </div>
                        <div class="text-center py-3">
                            <h5 class="text-primary">Travaux champêtres</h5>
                            <small>Femmes en action</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.5s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid gallery-img" src="img/projet_francophonie/3.jpeg" alt="Groupe de femmes">
                        </div>
                        <div class="text-center py-3">
                            <h5 class="text-primary">Groupe de femmes</h5>
                            <small>Solidarité féminine</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.7s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid gallery-img" src="img/projet_francophonie/4.jpeg" alt="Culture maraîchère">
                        </div>
                        <div class="text-center py-3">
                            <h5 class="text-primary">Culture maraîchère</h5>
                            <small>Production agricole</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.9s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid gallery-img" src="img/projet_francophonie/5.jpeg" alt="Parterre de légumes">
                        </div>
                        <div class="text-center py-3">
                            <h5 class="text-primary">Parterre de légumes</h5>
                            <small>Jardin maraîcher</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid gallery-img" src="img/projet_francophonie/6.jpeg" alt="Femmes au travail">
                        </div>
                        <div class="text-center py-3">
                            <h5 class="text-primary">Femmes au travail</h5>
                            <small>Entretien des cultures</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid gallery-img" src="img/projet_francophonie/7.jpeg" alt="Récolte">
                        </div>
                        <div class="text-center py-3">
                            <h5 class="text-primary">Récolte</h5>
                            <small>Fruits du travail</small>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Signatures -->
            <div class="row mb-5">
                <div class="col-12">
                    <div class="info-card text-center">
                        <h4><i class="fas fa-handshake text-primary"></i> Engagement</h4>
                        <p>APRODEJ-GUINEE s'engage à mettre en œuvre ce projet avec transparence et efficacité pour l'autonomisation des filles et femmes de Bambaya.</p>
                    </div>
                </div>
            </div>
        </div>            
    </div>
    
    <!-- Vendor Start -->
    <div class="container-fluid py-0 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5 mb-5">
            <h1>Nos partenaires Financiers</h1>
            <div class="bg-white">
                <div class="owl-carousel vendor-carousel">
                    <img src="img/Expertise france.png" alt="Expertise France">
                    <img src="img/AFD.jfif" alt="AFD">
                    <img src="img/france.png" alt="France">
                    <img src="img/unicef.png" alt="UNICEF">
                    <img src="img/francofonie.png" alt="Francophonie">
                    <img src="img/logo-union-europeenne.jpg" alt="Union Européenne">
                    <img src="img/logo_coop.4ba0e51e9185.png" alt="Coopération">
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->
    
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-4 col-md-6 footer-about">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-primary p-4">
                        <a href="index.php" class="navbar-brand">
                            <h3 class="m-0 text-white"><i class="fa fa-user-tie me-2"></i>APRODEJ-GUINEE</h3>
                        </a>
                        <p class="mt-3 mb-4">ASSOCIATION LA PROMOTION ET LE DÉVELOPPEMENT DE L'ENTREPREUNARIAT ET JEUNESSE ONG DE PROTECTION DES DROITS HUMAINS ET DE L'ENVIRONNEMENT.</p>
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
                                <p class="mb-0">Labé, Guinée Conakry</p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-envelope-open text-primary me-2"></i>
                                <p class="mb-0">aprodejlabe2007@gmail.com</p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-telephone text-primary me-2"></i>
                                <p class="mb-0">+224 622 515 869</p>
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
                                <div class="col-6"><img src="img/unicef.png" alt="UNICEF" class="img-fluid bg-white p-1 rounded"></div>
                                <div class="col-6"><img src="img/logo-union-europeenne.jpg" alt="UE" class="img-fluid bg-white p-1 rounded"></div>
                                <div class="col-6"><img src="img/logo_coop.4ba0e51e9185.png" alt="Coopération" class="img-fluid bg-white p-1 rounded"></div>
                                <div class="col-6"><img src="img/AFD.jfif" alt="AFD" class="img-fluid bg-white p-1 rounded"></div>
                                <div class="col-6"><img src="img/france.png" alt="France" class="img-fluid bg-white p-1 rounded"></div>
                                <div class="col-6"><img src="img/Expertise france.png" alt="Expertise France" class="img-fluid bg-white p-1 rounded"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-white" style="background: #061429;">
        <div class="container text-center">
            <div class="row justify-content-end">
                <div class="col-lg-8 col-md-6">
                    <div class="d-flex align-items-center justify-content-center" style="height: 75px;">
                        <p class="mb-0">&copy; 2023 <a class="text-white border-bottom" href="index.php">aprodejguinee.org</a></p>
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