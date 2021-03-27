<?php
session_start();
$error="";
$result=true;
//存在確認
if(isset($_POST["name"])){
//中身がいるか
echo"あり";
if(empty($_POST["name"])){
  $error=$error."名前に空欄があります。"."<br>";
  $resulu=false;
}
}

if (!empty($_POST["name"])&&$result==true){
  //print_r($_POST["send"]);   
  $_SESSION["name"] = $_POST["name"];
  header( "Location:test2.php" );
  exit();
}
?>

<!DOCTYPE html>
<head>
<html lang="ja">
  <meta charset="UTF-8">
  <meta name="keywords"content="キーワード">
  <title>Lesson1</title>
  <link rel="stylesheet" href="../css/send.css">
  <body>
    <div>
    <?php
        if($result==false){
          echo "<script>";
          echo "alert('" . $error . "');";
          echo "</script>";
        }
        ?>
      <div id="send">

        <h1>新規登録</h1>
        <!--自分自身にポストする-->
        <form action="#" method="post">
          <div class="cp_iptxt">
            <label class="ef">
              <input type="text" name="name" placeholder="お名前">
              <button id="button" type="submit">送信</button>
            </label>
            </form>
            
            <form action="done.php">
              <button id="button" type="submit"><a href="">ログイン</a></button>
            </form>
          </div>
      </div>
    </div>
  </body>
  </html>
