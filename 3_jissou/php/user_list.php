<?php

require_once('../DB/config.php');
require_once('../DB/senddb.php');
require_once('../inc/login.php');

$senddb = new senddb($host,$dbname,$user,$pass);
$senddb->connect();

if(!empty($_POST['delete']['id'])){
 $senddb->deleteuser($_POST['delete']['id']);

}
$resultinfo=$senddb->find();








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

      <form action="#" method="post">
        <button id="button" type="submit">CSV</button>
      </form>
    
    <table>
      <tr>
        <th>ユーザー名</th>
        <th>メールアドレス</th>
        <th>電話番号</th>
        <th></th>
        <th></th>
      </tr>


<form action="#" method="post">
  <?php  foreach($resultinfo as $row):?>
    <tr>
     <td><?=$row['id']?></td>
      <td><?=$row['name']?></td>
      <td><?=$row['email']?></td>
      <td><?=$row['password']?></td>
      <th><button id="button" type="submit" name="delete[id]" value="<?=$row['id']?>">削除</button></th>
      <!--urlに設定することでＧＥＴで送ったという意味-->
      <th><a href="user_update.php?id=<?=$row['id']?>"value="変更">変更</a></th>
    </tr>
  <?php endforeach;?>

</form>


    </table>







  </body>
  </html>
