<?php

require_once('../DB/config.php');
require_once('../DB/senddb.php');
require_once('../inc/login.php');







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
        <th>商品</th>
        <th>商品B</th>
        <th>商品C</th>
        
      </tr>


<form action="#" method="post">
 
    <tr>
     <td><input type="text" name="send[a]" placeholder="商品"></td>
      <td><input type="text" name="send[b]" placeholder="商品B"></td>
      <td><input type="text" name="send[c]" placeholder="商品C"></td>
 
      <!--urlに設定することでＧＥＴで送ったという意味-->
      <button id="button" type="submit">購入</button>
    </tr>
  
</form>


    </table>







  </body>
  </html>
