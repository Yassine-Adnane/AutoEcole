<?php

require "../php/connection.php";

global $idupd;
$coure_th_value = '';
$resultdata_th = '';
$valcoures_update = '';
$CheckUpdate = false;
/********************* */
global $idupd_pr;
$coure_pr_value = '';
$resultdata_pr = '';
$valcoures_pr_update = '';
$CheckUpdate_pr = false;

/*********************************************************************** */
if(isset($_POST['save_th']))
{
  
  $coure_th_value = $_POST['coure_label_th'];

  if(!empty($coure_th_value))
  {

    $date_val = "moto_th_".''.date("Ymdhis");
    $categorie_moto = "A - Moto";
    $type_coures = "coure";

    /*echo "<script>alert(\"$date_val\")</script>";*/
    
    $con ->query("INSERT INTO coures_theorique (code_coure_th,categorie_permis,description_th,type_coures) 
    VALUES ('$date_val','$categorie_moto','$coure_th_value','$type_coures')") 
    or die($con->error);
    
  }
}

if(isset($_GET['delete']))
{
    $id_coures_delete = $_GET['delete'];
    $con ->query("DELETE FROM coures_theorique WHERE id = '$id_coures_delete' ") or die ($mysqli->error());
  
}

if(isset($_GET['modifier_th']))
{
  $id_coures_update = $_GET['modifier_th'];
  $idupd             = $_GET['modifier_th'];

  $resultdata_th = $con->query("SELECT * FROM coures_theorique WHERE id = '$id_coures_update'") or die ($mysqli->error());
 
    if(mysqli_num_rows($resultdata_th) == 1)
    {
        $row  =  $resultdata_th->fetch_array();
        $valcoures_update    = $row['description_th'];
       $CheckUpdate = true;
    }
   
}

if(isset($_POST['update_th']))
{

    $newvalue_th = $_POST['coure_label_th'];

    $con ->query("UPDATE coures_theorique SET description_th='$newvalue_th' WHERE id = $idupd ") 
    or die ($mysqli->error());
    
    $valcoures_update = '';

    header("location:gestion_coures.php");
}


/*********************************************************************************** */
//*** Traitement Partie Cours Pratique */
if(isset($_POST['save_pr']))
{
  
  $coure_pr_value = $_POST['coure_label_pr'];

  if(!empty($coure_pr_value))
  {
    $con ->query("INSERT INTO coures_pratiques (description_pr) 
    VALUES ('$coure_pr_value')") 
    or die($con->error); 
  }
}

if(isset($_GET['delete_pr']))
{
    $id_coures_delete_pr = $_GET['delete_pr'];
    $con ->query("DELETE FROM coures_pratiques WHERE id = '$id_coures_delete_pr' ") 
    or die ($mysqli->error());
}

if(isset($_GET['modifier_pr']))
{
  $id_coures_update_pr = $_GET['modifier_pr'];
  $idupd_pr            = $_GET['modifier_pr'];

  $resultdata_pr = $con->query("SELECT * FROM coures_pratiques WHERE id = '$id_coures_update_pr' ") 
  or die ($mysqli->error());
 
    if(mysqli_num_rows($resultdata_pr) == 1)
    {
        $row  =  $resultdata_pr->fetch_array();
        $valcoures_pr_update    = $row['description_pr'];
         $CheckUpdate_pr = true;
    }
   
}

if(isset($_POST['update_pr']))
{

    $newvalue_pr = $_POST['coure_label_pr'];

    $con ->query("UPDATE coures_pratiques SET description_pr='$newvalue_pr' WHERE id = $idupd_pr") 
    or die ($mysqli->error());
    
    $valcoures_pr_update = '';

    header("location:gestion_coures.php");
}



/*********************************************************************************** */

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

  <!-- font-awesome -->
  <script src="https://kit.fontawesome.com/f7f97a992e.js" crossorigin="anonymous"></script>

  <!-- Bootstrap CSS -->
  <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  

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
      <h1>Gestion Coures</h1>
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
                  <h5 class="card-title">Liste Coures Théorique (Moto)</h5>
                  <form action="" method="POST">
                      <input type="text" class="form-control" name="coure_label_th" value ="<?php echo $valcoures_update ?>" style="width:60%; display: inline;" >
                      
                      <?php 
                        if($CheckUpdate == false)
                        { 
                        
                        ?>
                          <button type="submit" class="btn btn-success" name="save_th" style="display:inline;">Ajouter Coure</button>
                        <?php 
                        }
                        else
                        {
                          
                        ?>
                          <button type="submit" class="btn btn-success" name="update_th" style="display:inline;">Modifier Coure</button>
                        <?php
                        }
                      ?>
                      
                  </form>      
                 
                  <br>
                  <hr>
                  <!-- Start Table -->
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Titre Coure</th>
                        <th scope="col">Operations</th>
                      </tr>
                    </thead>
                    <tbody> 
                        
                        <?php 
                        $resultdata_th = $con ->query("SELECT * FROM coures_theorique ORDER BY id ASC") or die($con->error); 
                        while($row = $resultdata_th->fetch_assoc()) : 
                        ?>
                        <tr>

                        <td>
                          <!-- -->
                          <?php echo $row['description_th']; ?>
                          <!-- -->
                        </td>

                        <td>
                          <!-- -->
                          

                          <a <?php $CheckUpdate = true; ?> href="?modifier_th=<?php echo $row['id'];  ?>">
                                <i class="fa-solid fa-pen-to-square fa-2xl" style="color:#FFD93D"></i>
                          </a>
  
                             <a href="?delete=<?php echo $row['id']; ?>">
                                <i class="fa-solid fa-trash-can fa-2xl" style="color:#FF6B6B"></i>
                            </a>
                          <!-- -->
                        </td>

                        </tr>

                        <?php endwhile ?>
                    </tbody>
                  </table>
                  <!-- End Table -->
                  </div>
            </div>
        </div> <!-- End Col -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Liste Coures Pratique (Moto)</h5>
                  <form action="" method="POST">
                      <input type="text" class="form-control" name="coure_label_pr" value ="<?php echo $valcoures_pr_update ?>" style="width:60%; display: inline;" >
                      
                      <?php 
                        if($CheckUpdate_pr == false)
                        { 
                        
                        ?>
                          <button type="submit" class="btn btn-success" name="save_pr" style="display:inline;">Ajouter Coure</button>
                        <?php 
                        }
                        else
                        {
                          
                        ?>
                          <button type="submit" class="btn btn-success" name="update_pr" style="display:inline;">Modifier Coure</button>
                        <?php
                        }
                      ?>
                      
                  </form>      
                 
                  <br>
                  <hr>
                  <!-- Start Table -->
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Titre Coure</th>
                        <th scope="col">Operations</th>
                      </tr>
                    </thead>
                    <tbody> 
                        
                        <?php 
                        $resultdata_pr = $con ->query("SELECT * FROM coures_pratiques") or die($con->error); 
                        while($row = $resultdata_pr->fetch_assoc()) : 
                        ?>
                        <tr>

                        <td>
                          <!-- -->
                          <?php echo $row['description_pr']; ?>
                          <!-- -->
                        </td>

                        <td>
                          <!-- -->
                          

                          <a <?php $CheckUpdate_pr = true; ?> href="?modifier_pr=<?php echo $row['id'];  ?>">
                                <i class="fa-solid fa-pen-to-square fa-2xl" style="color:#FFD93D"></i>
                          </a>
  
                             <a href="?delete_pr=<?php echo $row['id']; ?>">
                                <i class="fa-solid fa-trash-can fa-2xl" style="color:#FF6B6B"></i>
                            </a>
                          <!-- -->
                        </td>

                        </tr>

                        <?php endwhile ?>
                    </tbody>
                  </table>
                  <!-- End Table -->
                  </div>
            </div>
        </div> <!-- End Col -->

        <!-- 
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Liste Coures Pratique</h5>
                  <button type="button" class="btn btn-success" name="add_pr">Ajouter Coure</button>
                  </div>
            </div>
        </div> 
        --><!-- End Col -->
      </div> <!-- End Row -->
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

  <!-- Bootsrap -->
  <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>