<?php
require_once("db.php");
//今までDB.ｐｈｐでしか使えなかった物がセンドでも使えるようになった。

class testdb extends DB{


   function add($name){
      $this->conectobject->query(
       sprintf(
          //testでは？
             "INSERT INTO testb VALUES(%s,'%s')",
             "null",$name
           )
         );
   }
   //ないなら空文字を入れる処理
   function find($filter=""){
    $reslut = $this->conectobject->query("SELECT * FROM test".$filter);
    return $reslut;
   }








}
?>