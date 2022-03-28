<?php

$con = mysqli_connect('localhost', 'root', '', 'db_autoecole');

if(isset($_POST['save']))
{
    $cin    = $_POST['cin'];
    $nom    = $_POST['nom'];
    $prenom = $_POST['prenom'];

    $con ->query("INSERT INTO candidats (cin,nom,prenom) VALUES ('$cin','$nom','$prenom')") or
    die($con->error);
}

?>