<?php


$con = mysqli_connect('localhost', 'root', '', 'db_autoecole');

$nameCandidat       = '';
$prenomCandidat     = '';
$cinCandidat        = '';
$genreCandidat      = '';
$teleCandidat       = '';
$emailCandidat      = '';
$pswrdCandidat      = '';
$updateCandidat     = false;
$idUpd              = 0;




if(isset($_POST['save']))
{
    $cin    = $_POST['cin'];
    $nom    = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $genre  = $_POST['genre'];
    $tele   = $_POST['tele'];
    $email  = $_POST['email'];
    $psswd  = $_POST['psswd'];
    $cpsswd = $_POST['cpsswd'];

    $con ->query("INSERT INTO candidats (cin,nom,prenom,genre,tele,email,psswd,cpsswd) 
    VALUES ('$cin','$nom','$prenom','$genre','$tele','$email','$psswd','$cpsswd')") or
    die($con->error);

    $_SESSION['message_crud'] = "Candidat a bien ajouter";
    $_SESSION['msg_type'] = "success";

}


if(isset($_GET['delete']))
{
    $idCandidat = $_GET['delete'];
    $con ->query("DELETE FROM candidats WHERE id=$idCandidat") or die ($mysqli->error());
    
    $_SESSION['message_crud'] = "Candidat a bien supprimer";
    $_SESSION['msg_type'] = "danger";

    header("location:add_candidat.php");

}

if(isset($_GET['edit']))
{

    $id = $_GET['edit'];
    $updateCandidat = true;

    $resultdata = $con->query("SELECT * FROM candidats WHERE id=$id") or die($mysqli->error());
    
    
    if(mysqli_num_rows($resultdata) == 1)
    {
        $row  =  $resultdata->fetch_array();

        $idUpd = $row['id'];
        $nameCandidat = $row['nom'];
        $prenomCandidat = $row['prenom'];
        $cinCandidat = $row['cin'];
        $genreCandidat = $row['genre'];
        $teleCandidat = $row['tele'];
        $emailCandidat = $row['email'];
        $pswrdCandidat = $row['psswd'];
        
    }
    
}


if(isset($_POST['update']))
{
 
    $NomUpdate     = $_POST['nom'];
    $PrenomUpdate  = $_POST['prenom'];
    $CINUpdate     = $_POST['cin'];
    $GenreUpdate   = $_POST['genre'];
    $EmailUpdate    = $_POST['email'];
    $TeleUpdate    = $_POST['tele'];

    $con -> query("UPDATE candidats SET 
    nom='$NomUpdate',
    prenom='$PrenomUpdate'
    WHERE id=$idUpd") or die($mysqli->error());

    $_SESSION['message_crud'] = "Candidat a bien Modifier";
    $_SESSION['msg_type'] = "danger";
    
    
    
}

?>