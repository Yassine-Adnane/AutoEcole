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
}

?>