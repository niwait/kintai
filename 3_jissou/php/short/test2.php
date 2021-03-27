<?php
require_once('DB/config.php');
require_once('DB/testdb.php');
session_start();

if(!empty($_SESSION["name"])) {
  $name = $_SESSION["name"];
}




if(!empty($_POST["entry"]["submit"])){
  $testdb = new testdb($host,$dbname,$user,$pass);
  $testdb->connect();
  $result=$testdb->add($name);
  header( "Location: test3.php" );

}


?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="keywords"content="キーワード">
  <title>Lesson1</title>
  <link rel="stylesheet" href="../css/check.css">

  <body>
    <div>
      <div id="send">
        <h1>確認</h1>
        <p>こちらでよろしいでしょうか？</p>
        <p>登録ボタンを押してください。</p>
        <form action="#" method="post">
          <div class="cp_iptxt">
          <label class="ef">
              <input type="text" name="name" value="<?php echo $name; ?>">              
              <button id="button" type="submit" value="登録"name="entry[submit]">登録</button>
            </label>
          </div>
        </form>
      </div>
    </div>
  </body>
  </html>
