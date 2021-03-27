<?php

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


      <tr>

        <!--#は自分に返す-->
        <form action="#" method="post">
        <th></th>
        <th></th>
        <!--gettimeのなかのidのなかのデータを変更する-->
        <th><input type="datetime-local"name=""placeholder="" value=""></th>
        <th><input type="datetime-local"name=""placeholder="" value=""></th>
        <th>1時間</th>
        <th><input type="number"name=""placeholder=""></th>
        <th><input type="submit"value="確定"></input></th>
        </form>
      </tr>



    </table>

  </body>
  </html>
