<?php include("config/config.php"); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Projet DSSR - APRODEJ Guinée</title>
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
        .bg-header-dssr {
            background: linear-gradient(rgba(9, 30, 62, 0.7), rgba(9, 30, 62, 0.7)), url(img/projet-dssr-bg.jpg);
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
        }
       
        .beneficiary-card {
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
        .signature-box {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
        }
        .bg-success-custom {
            background: linear-gradient(135deg, #06BBCC 0%, #0d9488 100%);
        }
        
        /* Styles pour forcer toutes les images à avoir la même taille */
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
        
        .team-item .text-center {
            flex-shrink: 0;
        }
        
        /* Hover effect */
        .team-img img:hover {
            transform: scale(1.05);
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
                    <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>Boké, Guinée Conakry</small>
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
                        <h1 class="display-4 text-white animated slideInDown">Projet d'appui aux Droits et à la Santé Sexuelle et Reproductive</h1>
                        <h4 class="text-white animated slideInUp">Des Adolescent.e.s et Jeunes de 10-24 ans</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Contenu Principal -->
    <div class="container-fluid py-2 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container ">
            
            <!-- En-tête du projet -->
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 800px;">
                <h1 class="mb-0">APRODEJ-GUINEE</h1>
            </div>
            
            <!-- Logo et images -->
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <img src="img/Expertise france.png" alt="Expertise France" class="img-fluid" style="max-height: 50px; margin: 10px;">
                    <img src="img/AFD.jfif" alt="AFD" class="img-fluid" style="max-height: 100px; margin: 10px;">
                    <img src="img/france.jfif" alt="APRODEJ" class="img-fluid" style="max-height: 100px; margin: 10px;">
                </div>
            </div>
            
            <!-- Informations clés -->
            <div class="row g-4 mb-5 bg-primary">
                <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.1s">
                    <div class="info-card text-center">
                        <i class="fas fa-hand-holding-usd fa-3x text-primary mb-3"></i>
                        <h4>Financement</h4>
                        <p>Expertise France (EF) du Groupe Agence Française de Développement (AFD)</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.3s">
                    <div class="info-card text-center ">
                        <i class="fas fa-map-marked-alt fa-3x text-primary mb-3"></i>
                        <h4>Zone d'intervention</h4>
                        <p>Préfectures de Boké, Gaoual et Koundara</p>
                        <h6>25 Communes couvertes</h6>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.5s">
                    <div class="info-card text-center">
                        <i class="fas fa-calendar-alt fa-3x text-primary mb-3"></i>
                        <h4>Durée</h4>
                        <p>12 mois</p>
                        <h6>Janvier - Décembre 2026</h6>
                    </div>
                </div>
            </div>
            
            <!-- Objectifs et Résumé exécutif -->
            <div class="row mb-5">
                <div class="col-12">
                    <div class="info-card">
                        <h4><i class="fas fa-bullseye text-primary"></i> Objectif général</h4>
                        <p class="fs-5">Contribuer à la création d'un environnement favorable à la promotion de la Santé Sexuelle et Reproductive en Guinée</p>
                        
                        <h4 class="mt-4"><i class="fas fa-target text-primary"></i> Objectif spécifique</h4>
                        <p class="fs-5">Renforcer la prévention et la réponse aux inégalités de genre et VBG parmi les adolescent.es et jeunes de 10 à 24 ans au sein des communautés de 3 préfectures de la région de Boké (Boké, Gaoual et Koundara) d'ici la fin du projet</p>
                        
                        <hr class="my-4">
                        
                        <h4><i class="fas fa-file-alt text-primary"></i> Résumé exécutif</h4>
                        <p>Le projet vise à promouvoir des initiatives en matière de DSSR/PF des J&A et s'articule autour des objectifs :</p>
                        <ul>
                            <li>Contribuer à la création d'un environnement favorable à la promotion de la Santé Sexuelle et Reproductive en Guinée</li>
                            <li>Renforcer la prévention et la réponse aux inégalités de genre et VBG parmi adolescent.e.s et jeunes</li>
                        </ul>
                        <p>À travers ce projet, les adolescent.e.s et jeunes seront sensibilisés à leurs droits en matière de santé sexuelle et reproductive. Des outils et approches innovantes, notamment à travers les associations d'épargne et de crédits de jeunes et de femmes ou encore l'approche <strong>"Championnes du changement"</strong> seront développées.</p>
                    </div>
                </div>
            </div>
            
            <!-- Bénéficiaires -->
            <div class="row mb-5 bg-primary">
                <div class="col-12">
                    <div class="section-title text-center position-relative pb-3 mb-4 mx-auto">
                        <h2 class="fw-bold text-primary text-uppercase">Nos bénéficiaires</h2>
                        <h3 class="mb-0">31 285 personnes seront touchées</h3>
                    </div>
                </div>
                <div class="col-md-4 wow slideInUp" data-wow-delay="0.1s">
                    <div class="beneficiary-card">
                        <i class="fas fa-child fa-3x mb-3"></i>
                        <h4>Adolescents (10-19 ans)</h4>
                        <p class="display-6 fw-bold">8 031</p>
                        <p>4 819 filles | 3 211 garçons</p>
                    </div>
                </div>
                <div class="col-md-4 wow slideInUp" data-wow-delay="0.3s">
                    <div class="beneficiary-card">
                        <i class="fas fa-user-graduate fa-3x mb-3"></i>
                        <h4>Jeunes (20-24 ans)</h4>
                        <p class="display-6 fw-bold">12 540</p>
                        <p>7 524 filles | 5 016 garçons</p>
                    </div>
                </div>
                <div class="col-md-4 wow slideInUp" data-wow-delay="0.5s">
                    <div class="beneficiary-card">
                        <i class="fas fa-user-friends fa-3x mb-3"></i>
                        <h4>Adultes (+25 ans)</h4>
                        <p class="display-6 fw-bold">10 714</p>
                        <p>6 429 femmes | 4 284 hommes</p>
                    </div>
                </div>
            </div>
            
            <!-- Résultats escomptés -->
            <div class="row mb-5">
                <div class="col-12">
                    <div class="section-title text-center position-relative pb-3 mb-4 mx-auto">
                        <h5 class="fw-bold text-primary text-uppercase">Résultats attendus</h5>
                        <h3 class="mb-0">Les 3 résultats escomptés du projet</h3>
                    </div>
                </div>
                <div class="col-12">
                    <div class="result-card">
                        <h5><i class="fas fa-check-circle text-primary"></i> Résultat 1</h5>
                        <p>Les connaissances des jeunes et des enfants de 10 à 24 ans sur les enjeux de DSSR/PF et de lutte contre les VBG, sont améliorées à travers la mobilisation et la sensibilisation, en milieu scolaire et communautaire</p>
                    </div>
                    <div class="result-card">
                        <h5><i class="fas fa-check-circle text-primary"></i> Résultat 2</h5>
                        <p>Les parents d'enfants et jeunes, leaders communautaires et religieux ont développé leurs connaissances sur la DSSR/PF ainsi que leur rôle de "protecteur" contre les VBG</p>
                    </div>
                    <div class="result-card">
                        <h5><i class="fas fa-check-circle text-primary"></i> Résultat 3</h5>
                        <p>Les capacités des structures de santé, Organisations de la Société Civile (OSC locales), CECOJE, Club des Jeunes Filles leaders de Guinée, les membres des groupements de femmes et collèges sont renforcées en matière de DSSR/PF et lutte contre les VBG</p>
                    </div>
                </div>
            </div>
            
            <!-- Plan d'actions annuel -->
            <div class="row mb-5">
                <div class="col-12">
                    <div class="section-title text-center position-relative pb-3 mb-4 mx-auto">
                        <h5 class="fw-bold text-primary text-uppercase">Plan d'actions</h5>
                        <h3 class="mb-0">Plan d'actions annuel du projet</h3>
                    </div>
                </div>
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="activity-table table table-bordered">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Activités</th>
                                    <th>Résultats</th>
                                    <th>Responsables</th>
                                    <th>T1</th>
                                    <th>T2</th>
                                    <th>T3</th>
                                    <th>T4</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Atelier d'orientation du personnel</td>
                                    <td>Le personnel du projet sont orientés sur les objectifs</td>
                                    <td>Coordinateur APRODEJ</td>
                                    <td class="text-center"><i class="fas fa-check-circle text-success"></i></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Cérémonie de lancement du projet à Boké</td>
                                    <td>Présentation du projet aux autorités locales</td>
                                    <td>Coordinateur APRODEJ</td>
                                    <td class="text-center"><i class="fas fa-check-circle text-success"></i></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Reproduction des outils et supports de sensibilisation</td>
                                    <td>Supports adaptés au contexte local produits</td>
                                    <td>Coordinateur, Chargé suivi évaluation</td>
                                    <td class="text-center"><i class="fas fa-check-circle text-success"></i></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Création d'espaces de discussions sûrs dans les CECOJE</td>
                                    <td>Des espaces sûrs mis en place</td>
                                    <td>Coordinateur, Animateurs</td>
                                    <td class="text-center"><i class="fas fa-check-circle text-success"></i></td>
                                    <td class="text-center"><i class="fas fa-check-circle text-success"></i></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Formation des enseignant.e.s et pairs éducateurs</td>
                                    <td>125 personnes formées à l'approche ECS</td>
                                    <td>Coordinateur, Promotion Féminine</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"><i class="fas fa-check-circle text-success"></i></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Campagnes de sensibilisation communautaire</td>
                                    <td>Célébration des journées internationales</td>
                                    <td>Coordinateur, Promotion Féminine</td>
                                    <td class="text-center"><i class="fas fa-check-circle text-success"></i></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"><i class="fas fa-check-circle text-success"></i></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Séances de sensibilisation (parents, leaders, ados)</td>
                                    <td>600 séances de sensibilisation organisées</td>
                                    <td>Coordinateur, Superviseurs</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"><i class="fas fa-check-circle text-success"></i></td>
                                    <td class="text-center"><i class="fas fa-check-circle text-success"></i></td>
                                    <td class="text-center"><i class="fas fa-check-circle text-success"></i></td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>Fora/podiums communautaires</td>
                                    <td>25 fora réalisés</td>
                                    <td>Coordinateur, Superviseurs</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"><i class="fas fa-check-circle text-success"></i></td>
                                    <td class="text-center"><i class="fas fa-check-circle text-success"></i></td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>Mise en place de clubs des maris (CDM)</td>
                                    <td>25 clubs appuyés dans les 25 communes</td>
                                    <td>Coordinateur, Superviseurs</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"><i class="fas fa-check-circle text-success"></i></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>Formation des membres des CDM</td>
                                    <td>200 membres formés</td>
                                    <td>Coordinateur, Superviseurs</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"><i class="fas fa-check-circle text-success"></i></td>
                                    <td class="text-center"></td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>Soutien à la réinsertion socioéconomique</td>
                                    <td>12 filles réinsérées</td>
                                    <td>Coordinateur, Expertise France</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"><i class="fas fa-check-circle text-success"></i></td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>Prise en charge holistique des survivantes de VBG</td>
                                    <td>16 filles/femmes prises en charge</td>
                                    <td>Coordinateur, Promotion Féminine</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"><i class="fas fa-check-circle text-success"></i></td>
                                    <td class="text-center"><i class="fas fa-check-circle text-success"></i></td>
                                    <td class="text-center"></td>
                                </tr>
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
                        <h3 class="mb-0">Images du projet DSSR</h3>
                    </div>
                </div>
            </div>

            <!-- Cérémonie de lancement -->
            <div class="row mb-4">
                <div class="col-12">
                    <h4 class="text-primary mb-3">Cérémonie de lancement du projet (06 Mars 2026)</h4>
                </div>
            </div>
            <div class="row g-4 mb-5">
                <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid gallery-img" src="img/DSSR_imagesT1_Janv-Mars26/Cérémonie de lancement 06 Mars 26.JPG" alt="Lancement projet DSSR">
                        </div>
                        <div class="text-center py-3">
                            <h5 class="text-primary">Cérémonie de lancement</h5>
                            <small>06 Mars 2026</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid gallery-img" src="img/DSSR_imagesT1_Janv-Mars26/Cérémonie lancement 06 Mars 26_les officiels.JPG" alt="Les officiels">
                        </div>
                        <div class="text-center py-3">
                            <h5 class="text-primary">Les officiels</h5>
                            <small>Autorités présentes</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.5s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid gallery-img" src="img/DSSR_imagesT1_Janv-Mars26/Cérémonie lancement 06 Mars 26_Discour Expertise France.JPG" alt="Discours Expertise France">
                        </div>
                        <div class="text-center py-3">
                            <h5 class="text-primary">Discours Expertise France</h5>
                            <small>Prise de parole</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Célébration du 8 Mars -->
            <div class="row mb-4">
                <div class="col-12">
                    <h4 class="text-primary mb-3"> Célébration du 8 Mars - Journée Internationale de la Femme</h4>
                </div>
            </div>
            <div class="row g-4 mb-5">
                <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid gallery-img" src="img/DSSR_imagesT1_Janv-Mars26/Célébration 8 Mars le 15 Avril au CECOJE Boké.JPG" alt="Célébration 8 Mars CECOJE Boké">
                        </div>
                        <div class="text-center py-3">
                            <h5 class="text-primary">Célébration au CECOJE Boké</h5>
                            <small>15 Avril 2026</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid gallery-img" src="img/DSSR_imagesT1_Janv-Mars26/Célébration 8 Mars le 15 Avril au CECOJE Boké1.JPG" alt="Célébration 8 Mars Boké 1">
                        </div>
                        <div class="text-center py-3">
                            <h5 class="text-primary">Célébration au CECOJE Boké</h5>
                            <small>Activités culturelles</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.5s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid gallery-img" src="img/DSSR_imagesT1_Janv-Mars26/Célébration 8 Mars le 15 Avril au CECOJE Boké2.JPG" alt="Célébration 8 Mars Boké 2">
                        </div>
                        <div class="text-center py-3">
                            <h5 class="text-primary">Célébration au CECOJE Boké</h5>
                            <small>Participation des jeunes</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.7s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid gallery-img" src="img/DSSR_imagesT1_Janv-Mars26/Célébration 8 Mars le 22 Avril CECOJE Koundara.JPG" alt="Célébration 8 Mars Koundara">
                        </div>
                        <div class="text-center py-3">
                            <h5 class="text-primary">Célébration au CECOJE Koundara</h5>
                            <small>22 Avril 2026</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Présentation aux autorités -->
            <div class="row mb-4">
                <div class="col-12">
                    <h4 class="text-primary mb-3"> Présentation des animateurs aux autorités</h4>
                </div>
            </div>
            <div class="row g-4 mb-5">
                <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid gallery-img" src="img/DSSR_imagesT1_Janv-Mars26/Présentation des animaeturs aux autorités de Gaoual.JPG" alt="Autorités Gaoual">
                        </div>
                        <div class="text-center py-3">
                            <h5 class="text-primary">Présentation à Gaoual</h5>
                            <small>Autorités préfectorales</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid gallery-img" src="img/DSSR_imagesT1_Janv-Mars26/Présentation des animaeturs aux autorités de Gaoual (2).JPG" alt="Autorités Gaoual 2">
                        </div>
                        <div class="text-center py-3">
                            <h5 class="text-primary">Présentation à Gaoual</h5>
                            <small>Échange avec les autorités</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.5s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid gallery-img" src="img/DSSR_imagesT1_Janv-Mars26/Présentation des animaeturs aux autorités de Kakoni-Gaoual.JPG" alt="Autorités Kakoni">
                        </div>
                        <div class="text-center py-3">
                            <h5 class="text-primary">Présentation à Kakoni-Gaoual</h5>
                            <small>Autorités locales</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.7s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid gallery-img" src="img/DSSR_imagesT1_Janv-Mars26/Présentation des animaeturs aux autorités éducatives de Gaoual.JPG" alt="Autorités éducatives">
                        </div>
                        <div class="text-center py-3">
                            <h5 class="text-primary">Présentation aux autorités éducatives</h5>
                            <small>Gaoual</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Séances de sensibilisation -->
            <div class="row mb-4">
                <div class="col-12">
                    <h4 class="text-primary mb-3"><i class="fas fa-chalkboard-user"></i> Séances de sensibilisation</h4>
                </div>
            </div>
            <div class="row g-4 mb-5">
                <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid gallery-img" src="img/DSSR_imagesT1_Janv-Mars26/Séances de sensibilisation au CECOJE de Boké.JPG" alt="Sensibilisation CECOJE Boké">
                        </div>
                        <div class="text-center py-3">
                            <h5 class="text-primary">Sensibilisation au CECOJE Boké</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid gallery-img" src="img/DSSR_imagesT1_Janv-Mars26/Séances de sensibilisation au collège Kounsitel.JPG" alt="Sensibilisation Collège Kounsitel">
                        </div>
                        <div class="text-center py-3">
                            <h5 class="text-primary">Sensibilisation au collège Kounsitel</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.5s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid gallery-img" src="img/DSSR_imagesT1_Janv-Mars26/Séances de sensibilisation CR Kolaboui.JPG" alt="Sensibilisation CR Kolaboui">
                        </div>
                        <div class="text-center py-3">
                            <h5 class="text-primary">Sensibilisation à Kolaboui</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.7s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid gallery-img" src="img/DSSR_imagesT1_Janv-Mars26/Séances de sensibilisation CR Koumbia.JPG" alt="Sensibilisation Koumbia">
                        </div>
                        <div class="text-center py-3">
                            <h5 class="text-primary">Sensibilisation à Koumbia</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.9s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid gallery-img" src="img/DSSR_imagesT1_Janv-Mars26/Séances de sensibilisation CR Sambailo.JPG" alt="Sensibilisation Sambailo">
                        </div>
                        <div class="text-center py-3">
                            <h5 class="text-primary">Sensibilisation à Sambailo</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid gallery-img" src="img/DSSR_imagesT1_Janv-Mars26/Séances de sensibilisation CR Sangarédi.JPG" alt="Sensibilisation Sangarédi">
                        </div>
                        <div class="text-center py-3">
                            <h5 class="text-primary">Sensibilisation à Sangarédi</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid gallery-img" src="img/DSSR_imagesT1_Janv-Mars26/Séances de sensibilisation CR Tanènè.JPG" alt="Sensibilisation Tanènè">
                        </div>
                        <div class="text-center py-3">
                            <h5 class="text-primary">Sensibilisation à Tanènè</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.5s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid gallery-img" src="img/DSSR_imagesT1_Janv-Mars26/Séances de sensibilisation CR Wend Mbour.JPG" alt="Sensibilisation Wend Mbour">
                        </div>
                        <div class="text-center py-3">
                            <h5 class="text-primary">Sensibilisation à Wend Mbour</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.7s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid gallery-img" src="img/DSSR_imagesT1_Janv-Mars26/Séances de sensibilisation CR Youkounkoun1.JPG" alt="Sensibilisation Youkounkoun">
                        </div>
                        <div class="text-center py-3">
                            <h5 class="text-primary">Sensibilisation à Youkounkoun</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.9s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid gallery-img" src="img/DSSR_imagesT1_Janv-Mars26/Séances de sensibilisation CU Koundara.JPG" alt="Sensibilisation Koundara">
                        </div>
                        <div class="text-center py-3">
                            <h5 class="text-primary">Sensibilisation à Koundara</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid gallery-img" src="img/DSSR_imagesT1_Janv-Mars26/Séances de sensibilisation Dabiss.JPG" alt="Sensibilisation Dabiss">
                        </div>
                        <div class="text-center py-3">
                            <h5 class="text-primary">Sensibilisation à Dabiss</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid gallery-img" src="img/DSSR_imagesT1_Janv-Mars26/Séances de sensibilisation Kakoni.JPG" alt="Sensibilisation Kakoni">
                        </div>
                        <div class="text-center py-3">
                            <h5 class="text-primary">Sensibilisation à Kakoni</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.5s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid gallery-img" src="img/DSSR_imagesT1_Janv-Mars26/Séances de sensibilisation Sansalé.JPG" alt="Sensibilisation Sansalé">
                        </div>
                        <div class="text-center py-3">
                            <h5 class="text-primary">Sensibilisation à Sansalé</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.7s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid gallery-img" src="img/DSSR_imagesT1_Janv-Mars26/Séances de sensibilisation à Bintimodia.JPG" alt="Sensibilisation Bintimodia">
                        </div>
                        <div class="text-center py-3">
                            <h5 class="text-primary">Sensibilisation à Bintimodia</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.9s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid gallery-img" src="img/DSSR_imagesT1_Janv-Mars26/Séances de sensibilisation CR Sangarédi.JPG" alt="Sensibilisation à Sangarédi">
                        </div>
                        <div class="text-center py-3">
                            <h5 class="text-primary">Sensibilisation à Sangarédi</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid gallery-img" src="img/DSSR_imagesT1_Janv-Mars26/Séances de sensibilisation à Tamouya dans Bintimodia 28 Mars 2026.JPG" alt="Sensibilisation Tamouya">
                        </div>
                        <div class="text-center py-3">
                            <h5 class="text-primary">Sensibilisation à Tamouya</h5>
                            <small>28 Mars 2026</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid gallery-img" src="img/DSSR_imagesT1_Janv-Mars26/Séances de sensibilisations des adolescentes dans un atelier de couture à Koumbia.JPG" alt="Atelier couture Koumbia">
                        </div>
                        <div class="text-center py-3">
                            <h5 class="text-primary">Atelier de couture à Koumbia</h5>
                            <small>Sensibilisation des adolescentes</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>            
    </div>
    
    <!-- Vendor Start -->
   <div class="container-fluid py-0 wow fadeInUp" data-wow-delay="0.1s w-100">
        <div class="container py-5 mb-5">
            <h1>Nos partenaires Finaciers</h1>
            <div class="bg-white">
                <div class="owl-carousel vendor-carousel">
                    <img src="img/Expertise france.png" alt="" width="50%"height="50%">
                    <img src="img/AFD.jfif" alt="" width="50%"height="50%">
                    <img src="img/france.png" alt="" width="50%"height="50%">
                    <img src="img/unicef.png" alt="" width="50%" height="50%">
                    <img src="img/partenaires1.png" alt="" width="50%"height="50%">
                    <img src="img/logo-union-europeenne.jpg" alt="" width="50%"height="50%">
                    <img src="img/logo_coop.4ba0e51e9185.png" alt="" width="50%" height="50%">
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->
    
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