<?php
require_once('../DB/config.php');
require_once('../DB/send-time-db.php');
require_once('../DB/login.php');
$sendtime = new time($host,$dbname,$user,$pass);
//$filter=sprintf(" WHERE `user_id`='%s'",$_SESSION["id"]);
//接続
$sendtime->connect();
//表示
$resultinfo=$sendtime->find($filter);

//アップデート

if ($_POST) {

//Array ( [get-time] => Array
//( [39] => 01:01 ) [out-time] => Array ( [39] => 01:01 ) [over-time] => Array ( [39] => 2 ) )
//idを取得する必要がある。keyでidの取得をしている。
//gettimeのkeyつまり39をidに入れる。
                //kye
$id=(key($_POST['get_time']));
  //kye         //value
$gettime=$_POST['get_time'][$id];
$outtime=$_POST['out_time'][$id];
$overtime=$_POST['over_time'][$id];

$sendtime->update($id,$gettime,$outtime,$overtime);
header('Location: sift.php');
exit();
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

    <nav id="nav">
      <li><a href="sift.php">シフト管理</a></li>
      <li><a href="kintai.php">出退勤管理</a></li>
      <li><a href="user-info.php">ユーザー情報</a></li>
      <li><a href="send.php">ログアウト</a></li>
    </nav>

    <table>
      <tr>
        <th>日付</th>
        <th>ユーザー</th>
        <th>出勤時間</th>
        <th>退勤時間</th>
        <th>休憩時間</th>
        <th>残業時間</th>
        <th>変更</th>
      </tr>


<?php //foreach($resultinfo as $row): ?>

      <tr>

        <!--#は自分に返す-->
        <form action="#" method="post">
        <th><?=$row['date_time']?></th>
        <th><?=$row['name']?></th>
        <!--gettimeのなかのidのなかのデータを変更する-->
        <th><input type="datetime-local"name="get_time[<?=$row['id']?>]"placeholder="<?=$row['get_time']?>" value="<?=$row['get_time']?>"></th>
        <th><input type="datetime-local"name="out_time[<?=$row['id']?>]"placeholder="<?=$row['out_time']?>" value="<?=$row['out_time']?>"></th>
        <th>1時間</th>
        <th><input type="number"name="over_time[<?//=$row['id']?>]"placeholder="<?//=$row['over_time']?>"></th>
        <th><input type="submit"value="確定"></input></th>
        </form>
      </tr>
  <?php endforeach;?>


    </table>

  </body>
  </html>
