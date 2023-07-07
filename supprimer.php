<?php

include "connection.php";
var_dump($_POST);
$newInsertion = new Maconnection("massage", "", "root", "localhost");
$newInsertion->deleteProduit_Secure($_POST['id']);


header("location: interface.php");


?>