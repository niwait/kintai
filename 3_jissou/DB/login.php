<?php
session_start();

if (empty($_SESSION["test"]["id"])) {

  header('Location: done.php');

}


?>
