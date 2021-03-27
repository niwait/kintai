<?php


session_start();
$error="";
$result=true;
//存在確認
if(isset($_POST["send"])){
//中身がいるか
if(empty($_POST["send"]["name"])){
  $error=$error."名前に空欄があります。"."\\n";
  $result=false;
}
if(empty($_POST["send"]["gender"])){
  $error=$error."genderに空欄があります。"."\\n";
  $result=false;
}
if(empty($_POST["send"]["email"])){
  $error=$error."emailに空欄があります。"."\\n";
  $result=false;
}
if(empty($_POST["send"]["tel"])){
$error=$error."telに空欄があります。"."\\n";
  $result=false;
}
if(empty($_POST["send"]["birth"])){
  $error=$error."birthに空欄があります。"."\\n";
  $result=false;
}
if(empty($_POST["send"]["riyu"])){
$error=$error."riyuに空欄があります。"."\\n";
  $result=false;
}
if(empty($_POST["send"]["password"])){
  $error=$error."passwordに空欄があります。"."\\n";
  $result=false;
}
if(empty($_POST["send"]["blood"])){
  $error=$error."bloodに空欄があります。"."\\n";
  $result=false;
}
}

if (!empty($_POST["send"])&&$result==true){
  //print_r($_POST["send"]);   
  $_SESSION["send"]["name"] = $_POST["send"]["name"];
  $_SESSION["send"]["gender"] = $_POST["send"]["gender"];
  $_SESSION["send"]["email"] = $_POST["send"]["email"];
  $_SESSION["send"]["tel"] = $_POST["send"]["tel"];
  $_SESSION["send"]["birth"] = $_POST["send"]["birth"];
  $_SESSION["send"]["riyu"] = $_POST["send"]["riyu"];
  $_SESSION["send"]["password"] = $_POST["send"]["password"];
  $_SESSION["send"]["blood"] = $_POST["send"]["blood"];
  $_SESSION["send"]["user_img"] = $_POST["send"]["user_img"];
  header( "Location:check.php" );
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
        <!--value=$_POSTsend[name]-->
        <form action="#" method="post">
          <div class="cp_iptxt">
            <label class="ef">
              <input type="text" name="send[name]" placeholder="お名前">
              <lavel><input type="radio" name="send[gender]" placeholder="男" value="男" checked>男</lavel>
              <lavel><input type="radio" name="send[gender]" placeholder="女" value="女">女</lavel>
              <input type="text" name="send[email]" placeholder="メールアドレス">
              <input type="text" name="send[tel]" placeholder="電話番号">
              <input type="date" name="send[birth]" placeholder="生年">
              <input type="checkbox" name="send[riyu][]" value="面白い" checked="checked" class="check">面白い
              <input type="checkbox" name="send[riyu][]" value="役に立つ" class="check">役に立つ
              <input type="checkbox" name="send[riyu][]" value="いまいち" class="check">いまいち
              <input type="password" name="send[password]" placeholder="パスワード">
              <p>血液型</p>
              <select name="send[blood]" id="option">
              <?php $selectbox=['A','B','AB','O'];
              foreach($selectbox as $blood){
                echo'<option value="'.$blood.'">'.$blood.'</option>';
              }
              
              ?>
              </select>
              <br>
              <input type="image" name="send[user_img]" hidden="" placeholder="イメージ" value="null">
         
              <button id="button" type="submit">送信</button>
            </label>
            </form>

            
          </div>
          <button onclick="location.href='done.php'">ログイン画面</button>
      </div>
     
    </div>
    
  </body>
  </html>
