<?php
require_once('../DB/config.php');
require_once('../DB/send-time-db.php');
require_once('../DB/login.php');
$sendtime = new time($host,$dbname,$user,$pass);
$sendtime->connect();
$filter=sprintf(" WHERE `user_id`='%s'",$_SESSION['test']["id"]);

$resultinfo=$sendtime->find($filter);
//下記条件でインナージョインを利用する。
//条件send.name = time.name




//ログアウト処理
if(isset($_GET['logout'])){
  $_SESSION = array();
    session_destroy();

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
        <th>日付</th>
        <th>ユーザー</th>
        <th>出勤時間</th>
        <th>退勤時間</th>
        <th>休憩時間</th>
        <th>残業時間</th>
        <th><a href="update.php">変更</a></th>
      </tr>
<?php foreach($resultinfo as $row): ?>
      <tr>
        <th><?=$row['date_time']?></th>
        <th><?=$row['name']?></th>
        <th><?=$row['getput_time']?></th>
        <th><?=$row['output_time']?></th>
        <th>1時間</th>
        <th><?=$row['over_time']?></th>
        <th><a href="update.php">変更</a></th>
      </tr>

  <?php endforeach;?>




    </table>







  </body>
  </html>
