<?php
require_once('../DB/config.php');
require_once('../DB/senddb.php');
require_once('../inc/login.php');


$senddb = new senddb($host,$dbname,$user,$pass);
$senddb->connect();

if(!empty($_POST['delete']['id'])){
  $senddb->deleteuser($_POST['delete']['id']);
 
 }
 if(!empty($_POST['up'])){
  $senddb->updateother($_POST["up"]["id"],
  $_POST["up"]["name"],
  $_POST["up"]["gender"],
  $_POST["up"]["email"],
  $_POST["up"]["tel"],
  $_POST["up"]["birth"],
  $_POST["up"]["riyu"],
  $_POST["up"]["password"],
  $_POST["up"]["blood"]
);
echo "<script>";
echo "alert('" . "変更しました" . "');";
echo "</script>";

 }
if(!empty($_GET['id'])){
  $filter=sprintf(
    " WHERE id='%s'",
    $_GET["id"]
  );
  $resultinfo=$senddb->find($filter);
 
 }
 



?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="keywords"cget-ontent="キーワード">
  <title>Lesson1</title>
  <link rel="stylesheet" href="../css/sift.css">


  <body>

  <?php
    require_once('../inc/nav.php');
    ?>

    <table>
      <tr>
        <th>ユーザー名</th>
        <th>性別</th>
        <th>メールアドレス</th>
        <th>電話番号</th>
        <th>生年</th>
        <th>理由</th>
        <th>パスワード</th>
        <th>血液型</th>
        <th></th>
        <th></th>
      </tr>
<?php  ?>
<form action="#" method="post">
<?php foreach($resultinfo as $row): ?>
      <tr>
      <td><input type ="textbox" name="up[name]" value="<?=$row['name']?>"></td>
      <td><input type ="textbox" name="up[gender]" value="<?=$row['gender']?>"></td>
      <td><input type ="textbox" name="up[email]" value="<?=$row['email']?>"></td>
      <td><input type ="textbox" name="up[tel]" value="<?=$row['tel']?>"></td>
      <td><input type ="textbox" name="up[birth]" value="<?=$row['birth']?>"></td>
      <td><input type ="textbox" name="up[riyu]" value="<?=$row['riyu']?>"></td>
      <td><input type ="textbox" name="up[password]" value="<?=$row['password']?>"></td>
      <td><input type ="textbox" name="up[blood]" value="<?=$row['blood']?>"></td>
      <th></th>
      <th><button id="button" type="submit" name="delete[id]" value="<?=$row['id']?>">削除</button></th>
      <th><button id="button" type="submit" name="up[id]" value="<?=$row['id']?>">確定</a></th>
      </tr>

      <?php endforeach;?>


</form>

    </table>







  </body>
  </html>
