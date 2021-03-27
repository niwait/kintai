<?php

require_once('../DB/config.php');
require_once('../DB/senddb.php');
require_once('../inc/login.php');


$senddb = new senddb($host,$dbname,$user,$pass);
$senddb->connect();






if(!empty($_POST["up"])){
  $emptycheck=true;
  foreach($_POST["up"] as $key => $value ){
    if(empty($value)){
      $emptycheck=false;
      break;
    }
  }

if($emptycheck==true){
  $senddb->update($_SESSION["test"]["id"],$_POST["up"]);
}
}

$filter=sprintf(
  " WHERE id='%s'",
  $_SESSION["test"]["id"]
);

$resultinfo=$senddb->find($filter);


?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="keywords"content="キーワード">
  <title>Lesson1</title>
  <link rel="stylesheet" href="../css/user-info.css">


  <body>

    <?php
    require_once('../inc/nav.php');
    ?>

    <div id="send-details">
      <h2>ユーザー詳細</h2>
    </div>
    <div id="user">

            <form action="#" method="post">
                <button id="button" type="submit">確定</button>
           
      <table>

<?php foreach($resultinfo as $row): ?>
  <tr>
          <th>名前</th>
          <td><input type ="textbox" name="up[name]" value="<?=$row['name']?>"></td>
        </tr>
        <tr>
          <th>性別</th>
          <td><input type ="textbox" name="up[gender]" value="<?=$row['gender']?>"></td>
        </tr>
        <tr>
          <th>メールアドレス</th>
          <td><input type ="textbox" name="up[email]" value="<?=$row['email']?>"></td>
        </tr>
        <tr>
          <th>電話番号</th>
          <td><input type ="textbox" name="up[tel]" value="<?=$row['tel']?>"></td>
        </tr>
        <tr>
          <th>誕生日</th>
          <td><input type ="textbox" name="up[riyu]" value="<?=$row['riyu']?>"></td>
        </tr>
        <tr>
          <th>パスワード</th>
          <td><input type ="textbox" name="up[password]" value="<?=$row['password']?>"></td>
        </tr>
        <tr>
          <th>血液型</th>
          <td><input type ="textbox" name="up[blood]" value="<?=$row['blood']?>"></td>
        </tr>
        <tr>
          <th class="label"></th>
          <td class="label"></td>
        </tr>

        <?php endforeach;?>

        </form>
        </form>
      </table>
    </div>
  </body>
  </html>
