<?php

  require "../php/connection.php";


if(isset($_POST['save_']))
{

  $cin         =  $_POST['cin'];
  $nom         =  $_POST['nom'];
  $nom         = strtoupper($nom);

  $prenom      =  $_POST['prenom'];
  $tele        =  $_POST['tele'];
  $adresse     =  $_POST['adresse'];
  $email       =  $_POST['email'];
  $psswd       =  $_POST['psswd'];
  $genre       =  $_POST['genre'];
  $categorie   =  $_POST['categorie'];
  $forfais     =  $_POST['forfais'];
  
  if(isset($_FILES['photo_cin']['name']))
  {
    $image_name = $_FILES['photo_cin']['name'];

    $ext = end(explode('.',$image_name));

    $image_name = "image_cin_". $cin.'.'.$ext;

    $source_path = $_FILES['photo_cin']['tmp_name'];

    $destination_path = "cin_candidats/".$image_name;

    $upload = move_uploaded_file($source_path,$destination_path);
  
  }
  else
  {
    $image_name = "";
  }

  //*** */
  
  if(isset($_FILES['candidatphoto']['name']))
  {
    $photos_name = $_FILES['candidatphoto']['name'];

    $extPhoto = end(explode('.',$photos_name));

    $photos_name = "candidat_cin_". $cin.'.'.$extPhoto;

    $source_path_photos = $_FILES['candidatphoto']['tmp_name'];

    $destination_path_photos = "photos_candidats/".$photos_name;

    $upload = move_uploaded_file($source_path_photos,$destination_path_photos);
  
  }
  else
  {
    $photos_name = "";
  }

  /** Start Calcul Frais Permis */
 $frais_candidat = 0;

 if($categorie == "A - Moto")
 {
   
    if($forfais == '20 Heurs')
    {
      
      $faris_moto_thorique = 0;
      $faris_moto_pratique = 0;

      $faris_moto_thorique = 30*30; //30 => Nomber Heurs,  30 => prix de l'heurs

      $faris_moto_pratique = 30*45; //30 => Nomber Heurs,  45 => 40dh prix de l'heurs

      // + Frais Dariba 750 dh + Frais 150 dh Docteur + 50dh Dossier + 450dh TVA

      $frais_candidat = $faris_moto_thorique + $faris_moto_pratique + 150 + 750 + 50 + 450;

    }
    if($forfais == '30 Heurs')
    {
      
      $faris_moto_thorique = 0;
      $faris_moto_pratique = 0;

      $faris_moto_thorique = 30*25; //30 => Nomber Heurs,  25 => prix de l'heurs

      $faris_moto_pratique = 30*40; //30 => Nomber Heurs,  40 => 40dh prix de l'heurs

      // + Frais Dariba 750 dh + Frais 150 dh Docteur + 50dh Dossier + 450dh TVA

      $frais_candidat = $faris_moto_thorique + $faris_moto_pratique + 150 + 750 + 50 + 450;

    }

    if($forfais == '40 Heurs')
    {
      
      $faris_moto_thorique = 0;
      $faris_moto_pratique = 0;

      $faris_moto_thorique = 30*20; //30 => Nomber Heurs,  20 => prix de l'heurs

      $faris_moto_pratique = 30*35; //30 => Nomber Heurs,  35 => 40dh prix de l'heurs

      // + Frais Dariba 750 dh + Frais 150 dh Docteur + 50dh Dossier + 450dh TVA

      $frais_candidat = $faris_moto_thorique + $faris_moto_pratique + 150 + 750 + 50 + 450;

    }
 }

  /** End Calcul Frais Permis */

  $con ->query("INSERT INTO candidats (cin,nom,prenom,tele,adresse,email,psswd,genre,categorie,forfais,frais_candidat) 
  VALUES ('$cin','$nom','$prenom','$tele',
          '$adresse','$email','$psswd',
          '$genre','$categorie','$forfais','$frais_candidat')") 
          or die($con->error);

  $con ->query("INSERT INTO images_cin (cin,image_cin) 
  VALUES ('$cin','$image_name')") 
  or die($con->error);
  
  $con ->query("INSERT INTO photos_candidats (cin,candidats_photo) 
  VALUES ('$cin','$photos_name')") 
  or die($con->error);
  
  /*Traitement Add Listes Lessons*/

  $Liste_coures_th = $con->query("SELECT * FROM coures_theorique WHERE categorie_permis = 'A - Moto'") 
  or die($mysqli->error());
    
  while($row = $Liste_coures_th->fetch_assoc()) :

        $code_coure_th_log  = $row['code_coure_th'];
        $cin_log_th         = $cin;
        $coure              = $row['description_th'];
        $type_coure         = "coure";
        $categorie_permis   = $categorie;

        $con->query("INSERT INTO log_coures_th (code_coure_th_log,cin,type_coure,coure,categorie) 
        VALUES ('$code_coure_th_log','$cin_log_th','$type_coure','$coure','$categorie_permis')")
        or die($mysqli->error());
        
  endwhile;

  $Liste_coures_pr = $con->query("SELECT * FROM coures_pratiques WHERE categorie_permis = 'A - Moto'") 
  or die($mysqli->error());
    
  while($row = $Liste_coures_pr->fetch_assoc()) :

        $code_coure_pr_log  = $row['code_coure_pr'];
        $cin_log_pr         = $cin;
        $coure              = $row['description_pr'];
        $type_coure         = "coure";
        $categorie_permis   = $categorie;

        $con->query("INSERT INTO log_coures_pr (code_coure_pr_log,cin,type_coure,coure,categorie) 
        VALUES ('$code_coure_pr_log','$cin_log_pr','$type_coure','$coure','$categorie_permis')")
        or die($mysqli->error());
        
  endwhile;

  /*End Traitement Add Listes Lessons*/

  /*Start Calcule Number Coures_Serie Moto ==> Th??orique*/
  
  if($categorie == 'A - Moto')
  {
    /*********************************************/
      if($forfais == '20 Heurs') /* Forfait 20Heurs */
      {
        for ($x = 1; $x < 11; $x++) 
        {
            $cin_log_th         = $cin;
            $code_serie         = "moto_serie_".''.rand(1,100000000);
            $type_coure         = "S??rie";
            $coure              = "S??rie Examen num-". $x;
            $categorie_permis   = $categorie;
      
            $con->query("INSERT INTO log_coures_th (code_coure_th_log,cin,type_coure,coure,categorie) 
            VALUES ('$code_serie','$cin_log_th','$type_coure','$coure','$categorie_permis')")
            or die($mysqli->error());
        }
      }

      if($forfais == '30 Heurs') /* Forfait 30Heurs */
      {
        for ($x = 1; $x < 21; $x++) 
        {
            $cin_log_th         = $cin;
            $code_serie         = "moto_serie_".''.rand(1,100000000);
            $type_coure         = "S??rie";
            $coure              = "S??rie Examen num-". $x;
            $categorie_permis   = $categorie;
      
            $con->query("INSERT INTO log_coures_th (code_coure_th_log,cin,type_coure,coure,categorie) 
            VALUES ('$code_serie','$cin_log_th','$type_coure','$coure','$categorie_permis')")
            or die($mysqli->error());
        }
      }

      if($forfais == '40 Heurs') /* Forfait 30Heurs */
      {
        for ($x = 1; $x < 31; $x++) 
        {
            $cin_log_th         = $cin;
            $code_serie         = "moto_serie_".''.rand(1,100000000);
            $type_coure         = "S??rie";
            $coure              = "S??rie Examen num-". $x;
            $categorie_permis   = $categorie;
      
            $con->query("INSERT INTO log_coures_th (code_coure_th_log,cin,type_coure,coure,categorie) 
            VALUES ('$code_serie','$cin_log_th','$type_coure','$coure','$categorie_permis')")
            or die($mysqli->error());
        }
      }
    /*********************************************/

  }
  
  /*End Calcule Number Coures_Serie Moto ==> Th??orique*/

  /*Start Calcule Number Coures_Serie Moto ==> Pratique*/
  if($categorie == 'A - Moto')
  {
    /*********************************************/
      if($forfais == '20 Heurs') /* Forfait 20Heurs */
      {
        for ($x = 1; $x < 11; $x++) 
        {
            $cin_log_th         = $cin;
            $code_serie         = "moto_Route_".''.rand(1,100000000);
            $type_coure         = "S??rie";
            $coure              = "S??rie Route Examen num-". $x;
            $categorie_permis   = $categorie;
      
            $con->query("INSERT INTO log_coures_pr (code_coure_pr_log,cin,type_coure,coure,categorie) 
            VALUES ('$code_serie','$cin_log_th','$type_coure','$coure','$categorie_permis')")
            or die($mysqli->error());
        }
      }
    /*********************************************/
    /*********************************************/
      if($forfais == '30 Heurs') /* Forfait 20Heurs */
      {
        for ($x = 1; $x < 21; $x++) 
        {
            $cin_log_th         = $cin;
            $code_serie         = "moto_Route_".''.rand(1,100000000);
            $type_coure         = "S??rie";
            $coure              = "S??rie Route Examen num-". $x;
            $categorie_permis   = $categorie;
      
            $con->query("INSERT INTO log_coures_pr (code_coure_pr_log,cin,type_coure,coure,categorie) 
            VALUES ('$code_serie','$cin_log_th','$type_coure','$coure','$categorie_permis')")
            or die($mysqli->error());
        }
      }
    /*********************************************/
    /*********************************************/
      if($forfais == '40 Heurs') /* Forfait 20Heurs */
      {
        for ($x = 1; $x < 31; $x++) 
        {
          echo "<script>alert(\"$x\")</script>";
            $cin_log_th         = $cin;
            $code_serie         = "moto_Route_".''.rand(1,100000000);
            $type_coure         = "S??rie";
            $coure              = "S??rie Route Examen num-". $x;
            $categorie_permis   = $categorie;
      
            $con->query("INSERT INTO log_coures_pr (code_coure_pr_log,cin,type_coure,coure,categorie) 
            VALUES ('$code_serie','$cin_log_th','$type_coure','$coure','$categorie_permis')")
            or die($mysqli->error());
        }
      }
    /*********************************************/

  }
  /*End Calcule Number Coures_Serie Moto ==> Pratique*/
  



  header("location:crud.php");
  
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
      <h1>Blank Page</h1>
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
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Infos Candidat</h5>
              <!-- Start Form Create Candidat crud.php -->
              <form action="" method="POST" enctype="multipart/form-data" >
                <!-- -->
                <div class="form-group">
                    <label>Nom :</label>
                    <input type="text" class="form-control" name="nom" placeholder="Nom Candidat" require >
                </div>
               <div class="form-group">
                 <label style="margin-top:10px">Pr??nom :</label>
                 <input type="text" class="form-control" name="prenom" placeholder="Pr??nom Candidat" >
                 </div>

                 <div class="form-group">
                    <label style="margin-top:10px">CIN :</label>
                    <input type="text" class="form-control" name="cin" placeholder="CIN Candidat" >
                  </div>

                  <div class="form-group">
                      <label style="margin-top:10px">Genre</label>
                      <select class="form-control" name="genre">
                        <!-- <option value="---">------</option> -->
                        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                      </select>
                      
                  </div>

                  <div class="form-group">
                    <label  style="margin-top:10px">Num t??l?? :</label>
                    <input type="text" class="form-control" name="tele" placeholder="T??l??phone Candidat"  maxlength="15">
                  </div>

                  <div class="form-group">
                    <label style="margin-top:10px">Adresse</label>
                    <input type="text" class="form-control" name="adresse" placeholder="Adresse Candidat" >
                  </div>

                  <div class="form-group">
                    <label style="margin-top:10px">Maps</label>
                    <input type="text" class="form-control" name="adressemMaps" placeholder="Localisation Maps" >
                  </div>
                <!-- -->
            </div>
          </div>

        </div>

        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Dossier Candidat</h5>
              <!-- -->
              <div class="form-group">
                  <label>Email</label>
                  <input type="Email" class="form-control" name="email" placeholder="Email Candidat" >
                </div>

                <div class="form-group">
                  <label style="margin-top:10px">Mot de passe (Par d??feaut) </label>
                  <input type="text" class="form-control" name="psswd" placeholder="Mot de passe Candidat par d??feaut " >
                </div>

                <div class="form-group">
                   <label style="margin-top:10px">Cat??gorie Permis</label>
                   <select class="form-control" name="categorie">
                     <!-- <option value="">------</option> -->
                     <option value="A - Moto">A - Moto</option>
                     <option value="B - Voiture">B - Voiture</option>
                     <option value="C - Camion">C - Camion</option>
                     <option value="D - AutoBus">D - AutoBus</option>
                   </select>
               </div>

               <div class="form-group">
                   <label for="exampleFormControlSelect1" style="margin-top:10px">Forfais Permis</label>
                   <select class="form-control" name="forfais">
                     <!-- <option value="">------</option> -->
                     <option value="20 Heurs">20 Heurs</option>
                     <option value="30 Heurs">30 Heurs</option>
                     <option value="40 Heurs">40 Heurs</option>
                   </select>
               </div>

               <div class="form-group">
                 <label style="margin-top:30px">Photo CIN &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
                 <input type="file" class="form-control-file"  name="photo_cin" >
               </div>

               <div class="form-group">
                 <label style="margin-top:30px">Photo Candidat</label>
                 <input type="file" class="form-control-file" name="candidatphoto" >
               </div>

               
               <div class="modal-footer" style="margin-top:30px">
                    <button type="submit" class="btn btn-primary" name="save_">Enregistrer</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Quitter</button>
                </div>

                
              <!-- -->
              </form>
              <!-- End Form Create Candidat -->
              
            </div>
          </div>

        </div>
      </div>
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