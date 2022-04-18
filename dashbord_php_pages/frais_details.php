
<?php

require "../php/connection.php";

global $candidat_nom;
$candidat_prenom = "";
$candidat_forfais = "";
$candidat_categorie = "";
$cin_candidat = "";
$val_montant = "";
$val_date_montant = "";
$val_methode_payment = "";
$Reste_frais = "";
$Total_frais = "";

if(isset($_GET['show']))
{

  $cin_candidat = $_GET['show'];


  $resultdata = $con->query("SELECT * FROM candidats WHERE cin LIKE '$cin_candidat' ") 
  or die ($mysqli->error());
 
    if(mysqli_num_rows($resultdata) == 1)
    {
        $row  =  $resultdata->fetch_array();
        $candidat_nom       = $row['nom'];
        $candidat_prenom    = $row['prenom'];
        $candidat_categorie = $row['categorie'];
        $candidat_forfais   = $row['forfais'];
        $Total_frais        = $row['frais_candidat'];

        /*$Reste_frais = "";*/
        $sum_frais = $con->query("SELECT SUM(frais_dh) FROM frais WHERE cin LIKE '$cin_candidat' AND categorie = '$candidat_categorie' ") 
        or die ($mysqli->error()); 

        while($row = $sum_frais->fetch_assoc()) :
          $Sum_frais = $row['SUM(frais_dh)'];  
          $Reste_frais = $Total_frais - $Sum_frais;  
        endwhile;

        
        /*Start Afficher Liste Frais */
        $data_frais = $con->query("SELECT * FROM frais WHERE cin LIKE '$cin_candidat' AND categorie = '$candidat_categorie' ") 
        or die ($mysqli->error()); 
        /*End Afficher Liste Frais */
        

        
    }
    
    
}

if(isset($_POST['add_frais']))
{
  /*Check if Frais Dépasse Total Frais*/
  $input_frais      = $_POST['input_frais'];
  $methode_Paiement = $_POST['methode_Paiement'];
  $date_frais       = $_POST['date_frais'];

  $checkFrais = $Sum_frais + $input_frais;

  echo "<script>alert(\"test\")</script>";
  echo "<script>alert(\"$input_frais\")</script>";
  echo "<script>alert(\"$checkFrais\")</script>";
  echo "<script>alert(\"$Total_frais\")</script>";

 
  if($checkFrais > $Total_frais)
  {
    //echo "<script>alert(\"vous pouver pas Saisi un Montante supérieure au frais \")</script>";
    /*header("location:frais_details.php?show=$cin_candidat");*/
  }
  else
  {
    //date_frais methode_Paiement
    $data_frais = $con->query("INSERT INTO frais (cin,frais_dh,categorie,methode,date_payement) 
    VALUES ('$cin_candidat','$input_frais','$candidat_categorie','$methode_Paiement','$date_frais')") 
    or die ($mysqli->error()); 
  }

  header("location:frais_details.php?show=$cin_candidat");
  
}

if(isset($_GET['delete']))
{
    $id_frais = $_GET['delete'];

    $array_data = explode(",",$id_frais);

    $val_id = $array_data[0];
    $val_cin = $array_data[1];

    $con ->query("DELETE FROM frais WHERE (id = '$val_id')") 
    or die ($mysqli->error());

    header("location:frais_details.php?show=$val_cin");
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Components / Accordion - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">NiceAdmin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

    <!-- ======= Start Sidebar ======= -->
    <?php 
        require "menu.php";
     ?>
  <!-- ======= End Sidebar ======= -->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Détails Frais Candidats</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Blank</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Candidat : &nbsp; &nbsp; <?php echo $candidat_nom .' ' . $candidat_prenom?> </h4>
              <h5 class="card-title" style="margin-top:-20px;">Catégorie de Permis  : &nbsp; <?php echo $candidat_categorie?> </h5>
              <h5 class="card-title" style="margin-top:-20px;">Forfais de Candidat  : &nbsp; <?php echo $candidat_forfais?> </h5>
              <h5 class="card-title" style="margin-top:-20px;">Frais Totale : &nbsp; <?php echo $Total_frais?> DH </h5>
              <h5 class="card-title" style="margin-top:-20px;margin-bottom:20px;color:red">Reste Frais (DH)  : &nbsp; <?php echo $Reste_frais?> DH </h5>

              <form action="" method="POST">

              <label>Montant DH:</label>
                  <input type="number" class="form-control" min="1" name="input_frais" value ="<?php echo $val_montant ?>" style="width:10%; display: inline;"  required>
                  
                  <label for="date_payment" style="margin-left:20px">Date de Paiement:</label>
                  <input type="date" class="form-control" value ="<?php echo $val_date_montant ?>" name="date_frais" style="width:20%; display: inline;" required >
                  
                  <label style="margin-left:20px">Méthode de Paiement :</label>
                  <select name="methode_Paiement" id="cars">
                    <option value="Argent espèces" >Argent espèces</option>
                    <option value="Virement bancaire">Virement bancaire</option>
                    <option value="chèque">chèque</option>
                  </select>
                  
                  <?php
                  if($Reste_frais == 0)
                  { 
                  ?>
                    <button button type="submit" class="btn btn-success" name="add_frais" style="margin-left:20px" disabled>Ajouter Faris</button>
                  <?php
                  }
                  elseif($Total_frais >= $Reste_frais)
                  { ?>
                      <button button type="submit" class="btn btn-success" name="add_frais" style="margin-left:20px">Ajouter Faris</button>
                  <?php
                  }
                  ?>

              </form>
              <!--End Form-->

              <!--Start Table-->
              <table class="table" style="margin-top:30px">
                <thead>
                  <tr>
                    <th scope="col">Montant</th>
                    <th scope="col">Date de Paiement</th>
                    <th scope="col">Méthode de Paiement</th>
                    <th scope="col">Opérations</th>
                  </tr>
                </thead>
                <tbody>
                  <!---->
                  <?php 
                  /*Start Afficher Liste Frais */
                    $data_frais = $con->query("SELECT * FROM frais WHERE cin LIKE '$cin_candidat' AND categorie = '$candidat_categorie' ") 
                    or die ($mysqli->error()); 
                    /*End Afficher Liste Frais */

                  while($row = $data_frais->fetch_assoc()) : 
                  ?>
                  <!---->
                  <tr>
                    <!---->
                    <td>
                    <?php echo $row['frais_dh']; ?>      
                    </td>
                    <td>
                    <?php echo $row['date_payement']; ?>      
                    </td>
                    <td>
                    <?php echo $row['methode']; ?>      
                    </td>
                    <td>
                        <a href="?delete=<?php echo $row['id']?>,<?php echo $row['cin']?>">Supprmier</a>
                    </td>
                    <!---->
                  </tr>
                  <?php endwhile ?>
                </tbody>
              </table>
              <!--End Table-->


            </div>

            </div> <!--End card -->
        </div> <!--Col-12 -->
        </div> <!--End Card-->
      </div> <!--End Row-->
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>