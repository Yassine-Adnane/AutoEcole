<?php


$con = mysqli_connect('localhost', 'root', '', 'db_autoecole');



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

?>