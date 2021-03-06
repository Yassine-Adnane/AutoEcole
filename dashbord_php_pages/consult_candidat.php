<?php

require "../php/connection.php";

$cin         = '';
$nameCandidat = '';
$prenomCandidat = '';
$genreCandidat = '';
$teleCandidat = '';
$emailCandidat = '';
$adresseCandidat = '';

if(isset($_GET['consult']))
{

    $cin = $_GET['consult'];
    
    $resultdata = $con->query("SELECT * FROM candidats WHERE cin LIKE '$cin' ") or die($mysqli->error());

    $photoCandidatData = $con->query("SELECT * FROM photos_candidats WHERE cin LIKE '$cin' ") 
    or die($mysqli->error());
    
    
    if(mysqli_num_rows($resultdata) == 1)
    {
        $row  =  $resultdata->fetch_array();

        $nameCandidat    = $row['nom'];
        $prenomCandidat  = $row['prenom'];
        $genreCandidat   = $row['genre'];
        $teleCandidat    = $row['tele'];
        $emailCandidat   = $row['email'];
        $adresseCandidat = $row['adresse'];
        
    }

    if(mysqli_num_rows($photoCandidatData) == 1)
    {
        $row  =  $photoCandidatData->fetch_array();

        $PhotoCandidat = $row['candidats_photo'];
        
    }    
}

    if(isset($_POST['modifier_candidat']))
    {

      $nom            =  $_POST['nom'];
      $prenom         =  $_POST['prenom'];
      $genre          =  $_POST['genre'];
      $tele           =  $_POST['tele'];
      $email          =  $_POST['email'];
      $adresse        =  $_POST['adresse'];
      /*$adressemMaps   =  $_POST['adressemMaps'];*/

      

      /* Update Photo Candidat */
      if(isset($_FILES['candidatphoto']['name']))
      {
        /* Repare PhotoName */
        $photos_name = $_FILES['candidatphoto']['name'];
    
        $extPhoto = end(explode('.',$photos_name));
    
        $photos_name = "candidat_cin_". $cin.'.'.$extPhoto;
        /* End Repare PhotoName */
    
        /*
        $source_path_photos = $_FILES['candidatphoto']['tmp_name'];
    
        $destination_path_photos = "photos_candidats/".$photos_name;
    
        $upload = move_uploaded_file($source_path_photos,$destination_path_photos);

        */
      
      }

      $con ->query("UPDATE candidats 
                    SET nom='$nom',
                    prenom = '$prenom',
                    genre = '$genre',
                    tele = '$tele',
                    email = '$email',
                    adresse = '$adresse'
                    WHERE cin LIKE '$cin'")
      or die($con->error);

      /* End Update Photo Candidat */
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
      <h1>Consulter Candidat</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Blank</li>
        </ol>
      </nav>
    </div><!-- End Page Title col-lg-6 -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Modifier Infos Candidat</h5>
               
              <!-- Start Form Create Candidat -->
                <form action="" method="POST" enctype="multipart/form-data" >
                  <!-- -->
                  <div class="form-group">
                    <label style="margin-top:10px">CIN :</label>
                    <input type="text" class="form-control" name="cin" placeholder="CIN Candidat" value = "<?php echo $cin ?>" disabled>
                  </div>

                  <div class="form-group">
                      <label>Nom :</label>
                      <input type="text" class="form-control" name="nom" placeholder="Nom Candidat" value = "<?php echo $nameCandidat ?>" disabled>
                  </div>
                  <div class="form-group">
                    <label style="margin-top:10px">Pr??nom :</label>
                    <input type="text" class="form-control" name="prenom" placeholder="Pr??nom Candidat" value = "<?php echo $prenomCandidat ?>" disabled>
                  </div>
                 
                  <div class="form-group">
                      <label style="margin-top:10px">Genre</label>
                      <select class="form-control" name="genre" disabled>
                        <?php
                          if($genreCandidat == 'Homme')
                          {
                          ?>  
                          <option value="Homme">Homme</option>
                          <?php
                          }
                          else
                          {
                          ?>
                           <option value="Femme">Femme</option>
                           <?php
                          }
                        ?>

                      </select>
                  </div>

                  <div class="form-group">
                    <label  style="margin-top:10px">Num t??l?? :</label>
                    <input type="text" class="form-control" name="tele" placeholder="T??l??phone Candidat" value = "<?php echo $teleCandidat ?>" disabled>
                  </div>

                  <div class="form-group">
                      <label style="margin-top:10px">Email</label>
                      <input type="Email" class="form-control" name="email" placeholder="Email Candidat" value = "<?php echo $emailCandidat ?>" disabled>
                    </div>  

                  <div class="form-group">
                    <label style="margin-top:10px">Adresse</label>
                    <input type="text" class="form-control" name="adresse" placeholder="Adresse Candidat" value = "<?php echo $adresseCandidat ?>" disabled>
                  </div>

                  <div class="form-group">
                    <label style="margin-top:10px">Maps</label>
                    <input type="text" class="form-control" name="adressemMaps" placeholder="Localisation Maps" value = "<?php echo "test Maps" ?>" disabled>
                  </div>

                   <!-- -->
                  
                  <div class="modal-footer" style="margin-top:100px">
                  <!-- 
                        <button type="submit" class="btn btn-primary" name="modifier_candidat">Modifier</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Quitter</button>
                   -->
                  </div>
                  
                  <!-- -->
                  
                  <!-- End Form Create Candidat -->
                  </form> <!-- End Form -->

                  
                  <!-- -->
            </div>
          </div>

        </div>

        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Image Candidat</h5>
             
              <!-- -->
               <!-- Start Image Candidat -->
               <div class="d-flex justify-content-center" >
                  <div class="photoCandidats">
                  <!-- Test -->
                  <?php
                  require "../php/connection.php";
                  $resultphoto = $con->query("SELECT * FROM photos_candidats WHERE cin LIKE '$cin' ") or die ($mysqli->error())
                  ?>

                  <?php while($row = $resultphoto->fetch_assoc()) : ?>

                  <img src="photos_candidats/<?php echo $row['candidats_photo'];?>" style="height: 284px;width: 230px; border-style: solid;" >
                 
                  <?php endwhile ?>
                  
                  </div>
                  
                </div>
      
                 <!-- End Image Candidat -->
                
                 <!--
                 <div class="form-group">
                    <label style="margin-top:30px;margin-left:150px"></label>
                    <input type="file" class="form-control-file" name="candidatphoto">
                  </div>
                 -->
              <!-- -->
            </div>
          </div>
        <!-- -->
          <!--Test-->   
          <div class="test">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">CIN Candidat</h5>
              
                <!-- -->
                <!-- Start Image Candidat -->
                <div class="d-flex justify-content-center" style="border-style: solid;" >
                    <div class="photoCandidats">
                    <!-- Test -->
                    <?php
                    require "../php/connection.php";
                    $resultphoto = $con->query("SELECT * FROM images_cin WHERE cin LIKE '$cin' ") or die ($mysqli->error())
                    ?>

                    <?php while($row = $resultphoto->fetch_assoc()) : ?>

                    <img src="cin_candidats/<?php echo $row['image_cin'];?>" style="height: 284px;width:500px;" >
                  
                    <?php endwhile ?>
                      
                    </div>                    
                    
                  </div>

                  <!-- End CIN Candidat -->
                
                  <!--
                    <div class="form-group">
                      <label style="margin-top:30px">Modifier Photo CIN &nbsp; &nbsp; &nbsp; &nbsp;</label>
                      <input type="file" class="form-control-file">
                    </div>
                  -->

                <!-- -->
              </div>
            </div>
            </div> <!--End Div Tree (CIN Image) -->
          <!--Test-->
        </div> <!--End Div two -->
        <!-- -------------------------------------------------->
        
      
        <!-- -------------------------------------------------->
        
      </div>

      <div class="card">
            <div class="card-body">
              <h5 class="card-title">Liste Coures Th??orique</h5>
              Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aut, aspernatur.
              </div>
      </div>
      
      <div class="card">
            <div class="card-body">
              <h5 class="card-title">Liste Coures Pratique</h5>
              Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aut, aspernatur.
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