
<?php
session_start();


if(empty($_SESSION["test"])){
header("Location: done.php");
}


?>