<?php
require_once("db.php");
//今までDB.ｐｈｐでしか使えなかった物がセンドでも使えるようになった。

class senddb extends DB{


   function find($filter=""){
  
      $reslut = $this->conectobject->query("SELECT * FROM send_tb".$filter);
      return $reslut;
     }


   function add($name,$gender,$email,$tel,$birth,$riyu,$password,$blood){
      $this->conectobject->query(
       sprintf(
          //testでは？
             "INSERT INTO send_tb VALUES(%s,'%s','%s','%s','%s','%s','%s','%s','%s')",
             "null",
             $name,$gender,$email,$tel,$birth,$riyu,$password,$blood
           )
         );
   }


   function finduserall(){
      $reslut = $this->conectobject->query("SELECT * FROM send_tb");
      return $reslut;

   }
  
   function update($id, $userinfo){
      
   $updatebody="id=".$id;
   foreach($userinfo as $key => $value ){
   $updatebody=$updatebody.','.' '.$key."=".'"' .$value .'"';
   }
   

       $reslut = $this->conectobject->query(
         sprintf(" 
            UPDATE send_tb
            SET %s
            WHERE id= %s",
            $updatebody,$id
              ));
      return $reslut;

   }

   function deleteuser($id){
      $reslut = $this->conectobject->query(
      sprintf(" 
      DELETE FROM `send_tb`
      WHERE id= %s",
      $id
      ));
      return $reslut;
   }


   function updateother($id, $name,$gender,$email,$tel,$birth,$riyu,$password,$blood){
      
          $reslut = $this->conectobject->query(
            sprintf(" 
               UPDATE send_tb
               SET name='%s',gender='%s',email='%s',tel='%s',birth='%s',riyu='%s',password='%s',blood='%s
               WHERE id= %s",
               $name,$gender,$email,$tel,$birth,$riyu,$password,$blood,
               $id
                 ));
         return $reslut;
   
      }


      function imgup($id,$userimge){
    
         $reslut = $this->conectobject->query(
           sprintf(" 
              UPDATE send_tb
              SET user_img='%s'
              WHERE id= %s",
              $userimge,
              $id
                ));
        return $reslut;
  
     }


}
?>
