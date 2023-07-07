<?php

include "connection.php";

$uneInsertion = new Maconnection("massage", "", "root", "localhost");

$uneInsertion->insertionProduit_Secure($_POST['nom'], $_POST['prix'], $_POST['description']);

header('Location:interface.php');

?>