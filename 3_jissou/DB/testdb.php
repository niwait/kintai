<?php
require_once("db.php");
//今までDB.ｐｈｐでしか使えなかった物がセンドでも使えるようになった。

class testdb extends DB{

   function add($name,$gender,$email,$tel,$birth,$riyu,$password,$blood,$user_img){
      $this->conectobject->query(
       sprintf(
          //testでは？
             "INSERT INTO send_tb VALUES(%s,'%s','%s','%s','%s','%s','%s','%s','%s','user_img')",
             "null",$name,$gender,$email,$tel,$birth,$riyu,$password,$blood,"null"
           )
         );
   }

   
//ないなら空文字を入れる処理
   function find($filter=""){
      $reslut = $this->conectobject->query("SELECT * FROM send_tb".$filter);
      return $reslut;
     }








}
?>
