<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link href="styleDashBord.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
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
        <div id="layoutSidenav">
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
                        <h1 class="mt-4">Gestion Candidats</h1>
                        <ol class="breadcrumb mb-4">
                           <!-- <li class="breadcrumb-item active">liste des candidats</li> -->
                        </ol>
                        <div class="row">
                           
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Candidats (Examen Théorie)</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Voir les détails</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Candidats (Examen Pratique)</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Voir les détails</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Informations important</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Voir les détails</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card mb-4 justify-content-md-end">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Listes des Candidats
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a href="add_candidat.php">
                                        <button class="btn btn-success  btn-sm" type="button">Ajouter Candidat</button>
                                    </a>
                                </div>
                            </div>
                            
                            <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prénom</th>
                                    <th scope="col">CIN</th>
                                    <th scope="col">Dossier</th>
                                    <th scope="col">Frais DH</th>
                                    <th scope="col">Reste DH</th>
                                    <th scope="col">Forfait TH</th>
                                    <th scope="col">Forfait PR</th>
                                    <th scope="col">Consulter</th>
                                    <th scope="col">Modifier</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <th scope="row">1</th>
                                    <td>image_Mark</td>
                                    <td>Mark</td>
                                    <td>A2</td>
                                    <td>A3</td>
                                    <td>-</td>
                                    <td>3500</td>
                                    <td>0</td>
                                    <td>Pack-TH-20H</td>
                                    <td>Pack-PR-30H</td>
                                    <td><button type="button" class="btn btn-primary btn-sm">Consulter</button></td>
                                    <td><button type="button" class="btn btn-primary btn-sm">Modifier</button></td>
                                                                        
                                    </tr>
                                    <tr>
                                    <th scope="row">2</th>
                                    <td>image_Ali</td>
                                    <td>Ali</td>
                                    <td>B6</td>
                                    <td>B7</td>
                                    <td>-</td>
                                    <td>5000</td>
                                    <td>1500</td>
                                    <td>Pack-TH-50H</td>
                                    <td>Pack-PR-60H</td>
                                    <td><button type="button" class="btn btn-primary btn-sm">Consulter</button></td>
                                    <td><button type="button" class="btn btn-primary btn-sm">Modifier</button></td>
                                    
                                    </tr>
                                    <tr>
                                    <th scope="row">3</th>
                                    <td>image_khalid</td>
                                    <td>khalid</td>
                                    <td>C10</td>
                                    <td>C11</td>
                                    <td>-</td>
                                    <td>3500</td>
                                    <td>0</td>
                                    <td>Pack-TH-20H</td>
                                    <td>Pack-PR-30H</td>
                                    <td><button type="button" class="btn btn-primary btn-sm">Consulter</button></td>
                                    <td><button type="button" class="btn btn-primary btn-sm">Modifier</button></td>
                                    </tr>

                                    <tr>
                                    <th scope="row">4</th>
                                    <td>image_Said</td>
                                    <td>Said</td>
                                    <td>C10</td>
                                    <td>C11</td>
                                    <td>-</td>
                                    <td>3500</td>
                                    <td>0</td>
                                    <td>Pack-TH-20H</td>
                                    <td>Pack-PR-30H</td>
                                    <td><button type="button" class="btn btn-primary btn-sm">Consulter</button></td>
                                    <td><button type="button" class="btn btn-primary btn-sm">Modifier</button></td>
                                    </tr>

                                    <tr>
                                    <th scope="row">5</th>
                                    <td>image_Yassine</td>
                                    <td>Yassine</td>
                                    <td>C10</td>
                                    <td>C11</td>
                                    <td>-</td>
                                    <td>3500</td>
                                    <td>0</td>
                                    <td>Pack-TH-20H</td>
                                    <td>Pack-PR-30H</td>
                                    <td><button type="button" class="btn btn-primary btn-sm">Consulter</button></td>
                                    <td><button type="button" class="btn btn-primary btn-sm">Modifier</button></td>
                                    </tr>

                                    <tr>
                                    <th scope="row">6</th>
                                    <td>image_Abdou</td>
                                    <td>Abdou</td>
                                    <td>C10</td>
                                    <td>C11</td>
                                    <td>-</td>
                                    <td>3500</td>
                                    <td>2500</td>
                                    <td>Pack-TH-20H</td>
                                    <td>Pack-PR-30H</td>
                                    <td><button type="button" class="btn btn-primary btn-sm">Consulter</button></td>
                                    <td><button type="button" class="btn btn-primary btn-sm">Modifier</button></td>
                                    </tr>

                                    <tr>
                                    <th scope="row">7</th>
                                    <td>image_Sarah</td>
                                    <td>Sarah</td>
                                    <td>C10</td>
                                    <td>C11</td>
                                    <td>-</td>
                                    <td>3500</td>
                                    <td>0</td>
                                    <td>Pack-TH-20H</td>
                                    <td>Pack-PR-30H</td>
                                    <td><button type="button" class="btn btn-primary btn-sm">Consulter</button></td>
                                    <td><button type="button" class="btn btn-primary btn-sm">Modifier</button></td>
                                    </tr>

                                    <tr>
                                    <th scope="row">8</th>
                                    <td>image_Fatima</td>
                                    <td>Fatima</td>
                                    <td>C10</td>
                                    <td>C11</td>
                                    <td>-</td>
                                    <td>3500</td>
                                    <td>0</td>
                                    <td>Pack-TH-20H</td>
                                    <td>Pack-PR-30H</td>
                                    <td><button type="button" class="btn btn-primary btn-sm">Consulter</button></td>
                                    <td><button type="button" class="btn btn-primary btn-sm">Modifier</button></td>
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
