<?php
require_once('../DB/config.php');
require_once('../DB/testdb.php');
session_start();



//この部分の必要性はしたでechoしている
if(!empty($_SESSION["send"])){
  $name = $_SESSION["send"]["name"];
  $gender = $_SESSION["send"]["gender"];
  $email = $_SESSION["send"]["email"];
  $tel = $_SESSION["send"]["tel"];
  $birth = $_SESSION["send"]["birth"];
  $riyu = $_SESSION["send"]["riyu"];
  $password = $_SESSION["send"]["password"];
  $blood = $_SESSION["send"]["blood"];
  $user_img= $_SESSION["send"]["user_img"];
}


if (!empty($_POST["send"])){
  
  $name = $_POST["send"]["name"];
  $gender = $_POST["send"]["gender"];
  $email = $_POST["send"]["email"];
  $tel = $_POST["send"]["tel"];
  $birth = $_POST["send"]["birth"];
  $riyu = $_POST["send"]["riyu"];
  $password = $_POST["send"]["password"];
  $blood = $_POST["send"]["blood"];
  $user_img = $_POST["send"]["user_img"];

if(!empty($_POST["entry"]["submit"])){
    //データベースに接続 testdbはDBフォルダのtestdb
    $testdb = new testdb($host,$dbname,$user,$pass);
    $testdb->connect();
    
    $riyu = implode(",", $riyu);
    $result=$testdb->add($name,$gender,$email,$tel,$birth,$riyu,$password,$blood,$user_img);
    header( "Location: done.php" );
    exit();
  }

}
?>






<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="keywords"content="キーワード">
  <title>Lesson1</title>
  <link rel="stylesheet" href="../css/send.css">

  <body>
    <div>
      <div id="send">

        <h1>確認</h1>
        <p>こちらでよろしいでしょうか？</p>
        <p>登録ボタンを押してください。</p>
        <form action="#" method="post">
          <div class="cp_iptxt">
          <label class="ef">
              <input type="text" name="send[name]" value="<?php echo $name; ?>">

              <lavel><input type="radio" name="send[gender]" value="<?php echo $gender; ?>" value="男" 
              <?php
              if($gender=="男"){
                echo "checked";
              }
              ?>
              >男</lavel>
              <lavel><input type="radio" name="send[gender]" value="<?php echo $gender; ?>" value="女"
              <?php
              if($gender=="女"){
                echo "checked";
              }
              ?>
              >女</lavel>
              <input type="text" name="send[email]" value="<?php echo $email; ?>">
              <input type="text" name="send[tel]" value="<?php echo $tel; ?>">
              <input type="date" name="send[birth]" value="<?php echo date( "Y-m-d" ,  strtotime($birth)); ?>">
              <input type="checkbox" name="send[riyu][]" value="面白い"  class="check"  value="<?php echo $riyu; ?>"
              <?php
              if(in_array("面白い", $riyu)){
                echo "checked";
              }
              ?>
              >面白い
              <input type="checkbox" name="send[riyu][]" value="役に立つ" class="check" value="<?php echo $riyu; ?>"
              <?php
              if(in_array("役に立つ", $riyu)){
                echo "checked";
              }
              ?>
              >役に立つ
              <input type="checkbox" name="send[riyu][]" value="いまいち" class="check"  value="<?php echo $riyu; ?>"
              <?php
              if(in_array("いまいち", $riyu)){
                echo "checked";
              }
              ?>
              >いまいち
              <input type="password" name="send[password]" value="<?php echo $password; ?>">
              <p>血液型</p>
              <select name="send[blood]" id="option">
              <option value="A"
              <?php
              if($blood=="A"){
                echo "selected";
              }
              ?>
              >A型</option>
              <option value="B"
              <?php
              if($blood=="B"){
                echo "selected";
              }
              ?>
              >B型</option>
              <option value="O"
              <?php
              if($blood=="O"){
                echo "selected";
              }
              ?>
              
              >O型</option>
              <option value="AB"
              <?php
              if($blood=="AB"){
                echo "selected";
              }
              ?>
              >AB型</option>
              </select></p>
              <input type="text" name="send[user_img]" hidden="" value="null">
              <br>
              <button id="button" type="submit" name="entry[submit]" value="送信">送信</button>
            </label>
          </div>
        </form>
      </div>
    </div>
  </body>
  </html>
