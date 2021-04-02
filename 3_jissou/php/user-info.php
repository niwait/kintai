<?php

require_once('../DB/config.php');
require_once('../DB/senddb.php');
require_once('../inc/login.php');


$senddb = new senddb($host,$dbname,$user,$pass);
$senddb->connect();


if(!empty($_FILES['image']['name']['user'])){
  $senddb->imgup($_SESSION['test']["id"],$_FILES['image']['name']['user']);
  if (is_uploaded_file($_FILES['image']['tmp_name']['user'])) {
   
 //tempファイルが歩かないか確認
 move_uploaded_file($_FILES['image']['tmp_name']['user'] , sprintf('C:\xampp\htdocs\test\3_jissou\img\%s',$_FILES['image']['name']['user']));
 //一時ファイルを名前つけて移動 ああ
}
}


$filter=sprintf(
  " WHERE id='%s'",
  $_SESSION["test"]["id"]
);

$resultinfo=$senddb->find($filter);

$resultinfo=$resultinfo->fetchAll();



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
<div id="userimg">

<img src="../img/<?=$resultinfo[0]['user_img']?>" width="128" height="128">

</div>
      
      <!--ボタンによってのわけかた-->

      <form action="#" method="post" enctype="multipart/form-data">
              <input type="file" name="image[user]" required>
              <button id="button" type="submit">画像登録</button>
      </form>

    
       <form action="user_up.php">
          <button id="button" type="submit" name="img[id]" value="<?=$row['id']?>">変更</button>
      </form>



      <table>

<?php foreach($resultinfo as $row): ?>
  <tr>
          <th>名前</th>
          <td><?=$row['name']?></td>
        </tr>
        <tr>
          <th>性別</th>
          <td><?=$row['gender']?></td>
        </tr>
        <tr>
          <th>メールアドレス</th>
          <td><?=$row['email']?></td>
        </tr>
        <tr>
          <th>電話番号</th>
          <td><?=$row['tel']?></td>
        </tr>
        <tr>
          <th>誕生日</th>
          <td><?=$row['riyu']?></td>
        </tr>
        <tr>
          <th>パスワード</th>
          <td><?=$row['password']?></td>
        </tr>
        <tr>
          <th>血液型</th>
          <td><?=$row['blood']?></td>
        </tr>
        <tr>
          <th class="label"></th>
          <td class="label"></td>
        </tr>
        <?php endforeach;?>       
      </table>
    </div>
  </body>
  </html>
