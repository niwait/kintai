<?php
require_once('../DB/config.php');
require_once('../DB/send-time-db.php');

$sendtime = new time($host,$dbname,$user,$pass);
$sendtime->connect();
$resulttime=$sendtime->add($_POST["user_id"],$_POST["gettime"],$_POST["outtime"],$_POST["overtime"]);


//成功したか
http_response_code( 200 ) ;
//jsonを使っているから返さないといけない
header("Content-Type: application/json; charset=UTF-8");
?>
