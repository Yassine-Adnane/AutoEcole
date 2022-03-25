<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link href="styleDashBord.css" rel="stylesheet" />
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Alami Auto-Ecole</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="../index.html">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav" class="StyleNav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="Home.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Ajouter Candidat</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Gestion candidats</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Gestion Candidats</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="gestion_candidats.php">Voir les détails</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Candidats (Examen Théorie)</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Candidats (Examen Pratique)</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Informations important</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Informations Candidat
                                    </div>
                                    <!-- Start Info Candidat -->
                                    <div class="info_candidat">
                                    <div class="container">
                                    <form class="">
                                        <div class="form-group test">
                                            <label style=" margin-top: 15px">Nom</label>
                                            <input type="text" class="form-control" placeholder="Nom Candidat">
                                        </div>
                                        <div class="form-group">
                                            <label style=" margin-top: 15px">Prénom</label>
                                            <input type="text" class="form-control" placeholder="Prénom Candidat">
                                        </div>

                                        <label style=" margin-top: 15px">Genre</label>
                                        <div class="form-group form-control">     
                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                                <label class="form-check-label" for="exampleRadios1">Home</label>
                                        </div>
                                        <div class="form-group form-control">     
                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option2">
                                                <label class="form-check-label" for="exampleRadios1">Femme</label>
                                        </div>
                                                
                                        <div class="form-group">
                                            <label style=" margin-top: 15px">Numéro Telephone</label>
                                            <input type="text" class="form-control" placeholder="Numéro Telephone Candidat">
                                        </div>

                                        <div class="form-group">
                                            <label style=" margin-top: 15px">Num CIN</label>
                                            <input type="text" class="form-control" placeholder="Num CIN Candidat">
                                        </div>
                                        <div class="form-group">
                                            <label style=" margin-top: 15px">Email</label>
                                            <input type="email" class="form-control" placeholder="Email Candidat">
                                        </div>
                                        <div class="form-group">
                                            <label style=" margin-top: 15px">Mot de Passe</label>
                                            <input type="text" class="form-control" placeholder="Mot de Passe temporaire">
                                        </div>
                                        <div class="form-group">
                                            <label style=" margin-top: 15px">Validation Mot de Passe</label>
                                            <input type="text" class="form-control" placeholder="Validation mot de passe temporaire">
                                        </div>

                                    </form>

                                    <div class="row">
                                        <div class="col-6">
                                        <button type="button" class="btn btn-success" style=" margin-top: 15px">Enregistrer</button>
                                        </div>
                                        <div class="col-6">
                                        <button type="button" class="btn btn-warning" style=" margin-top: 15px">Annuler</button>
                                        </div>
                                    </div>
                            

                                    </div> <!-- End Container -->
                                    </div>
                                    <!-- End Info Candidat -->
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                                
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Dossier Candidat
                                    </div>
                                    <!-- Start Dossier Candidat -->
                                    <div class="info_candidat">
                                    <div class="container">
                                    <form class="">
                                        <div class="form-group ">
                                            <label style="margin-top: 15px">Catégorie Permis</label>
                                            <select class="form-control" style="margin-top: 5px">
                                                <option>A - Moto</option>
                                                <option>B - Voiture</option>
                                                <option>C - Camion</option>
                                                <option>D - AutoBus</option>
                                            </select>
                                        </div>

                                        <div class="form-group ">
                                            <label style=" margin-top: 15px">Forfait Cours Théorique</label>
                                            <select class="form-control" style="margin-top: 5px">
                                                <option>20 Heurs</option>
                                                <option>30 Heurs</option>
                                                <option>40 Heurs</option>
                                                <option>50 Heurs</option>
                                            </select>
                                        </div>
                                     
                                        <div class="form-group ">
                                            <label style=" margin-top: 15px">Forfait Cours Pratique</label>
                                            <select class="form-control" style="margin-top: 5px">
                                                <option>20 Heurs</option>
                                                <option>30 Heurs</option>
                                                <option>40 Heurs</option>
                                                <option>50 Heurs</option>
                                            </select>
                                        </div>
                                        <form>
                                            <div class="form-group" style=" margin-top: 15px">
                                                <label for="exampleFormControlFile1">Photo Candidat</label> <br>
                                                <input type="file" class="form-control-file" id="exampleFormControlFile1" accept="image/*">
                                            </div>
                                        </form>
                                        <form>
                                            <div class="form-group" style=" margin-top: 18px">
                                                <label for="exampleFormControlFile1">Images CIN (Recto & Verso)</label> <br>
                                                <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                            </div>
                                        </form>

                   
                                    
                                    </form>
                                    </div> <!-- End Container -->
                                    </div>
                                    <!-- End Dossier Candidat -->
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                les Candidats qui ont examens prochainement :
                            </div>
                            
                            <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prénom</th>
                                    <th scope="col">CIN</th>
                                    <th scope="col">Date Examen Théorie</th>
                                    <th scope="col">Date Examen Pratique</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>A2</td>
                                    <td>A3</td>
                                    <td>05/04/2022</td>
                                    <td>A5</td>
                                    
                                    </tr>
                                    <tr>
                                    <th scope="row">2</th>
                                    <td>Ali</td>
                                    <td>B6</td>
                                    <td>B7</td>
                                    <td>15/04/2022</td>
                                    <td>B9</td>
                                    
                                    </tr>
                                    <tr>
                                    <th scope="row">3</th>
                                    <td>khalid</td>
                                    <td>C10</td>
                                    <td>C11</td>
                                    <td>01/04/2022</td>
                                    <td>C13</td>
                                    </tr>

                                    <tr>
                                    <th scope="row">4</th>
                                    <td>Said</td>
                                    <td>C10</td>
                                    <td>C11</td>
                                    <td>01/04/2022</td>
                                    <td>C13</td>
                                    </tr>

                                    <tr>
                                    <th scope="row">5</th>
                                    <td>Yassine</td>
                                    <td>C10</td>
                                    <td>C11</td>
                                    <td>01/04/2022</td>
                                    <td>C13</td>
                                    </tr>
                                    <tr>

                                    <th scope="row">6</th>
                                    <td>Alami</td>
                                    <td>C10</td>
                                    <td>C11</td>
                                    <td>01/04/2022</td>
                                    <td>C13</td>
                                    </tr>
                                    <tr>
                                    <th scope="row">7</th>
                                    <td>Mark</td>
                                    <td>A2</td>
                                    <td>A3</td>
                                    <td>05/04/2022</td>
                                    <td>A5</td>
                                    
                                    </tr>
                                    <tr>
                                    <th scope="row">8</th>
                                    <td>Ali</td>
                                    <td>B6</td>
                                    <td>B7</td>
                                    <td>15/04/2022</td>
                                    <td>B9</td>
                                    
                                    </tr>
                                    <tr>
                                    <th scope="row">9</th>
                                    <td>khalid</td>
                                    <td>C10</td>
                                    <td>C11</td>
                                    <td>01/04/2022</td>
                                    <td>C13</td>
                                    </tr>

                                    <tr>
                                    <th scope="row">10</th>
                                    <td>Said</td>
                                    <td>C10</td>
                                    <td>C11</td>
                                    <td>01/04/2022</td>
                                    <td>C13</td>
                                    </tr>

                                    <tr>
                                    <th scope="row">11</th>
                                    <td>Yassine</td>
                                    <td>C10</td>
                                    <td>C11</td>
                                    <td>01/04/2022</td>
                                    <td>C13</td>
                                    </tr>
                                    <tr>

                                    <th scope="row">12</th>
                                    <td>Alami</td>
                                    <td>C10</td>
                                    <td>C11</td>
                                    <td>01/04/2022</td>
                                    <td>C13</td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
