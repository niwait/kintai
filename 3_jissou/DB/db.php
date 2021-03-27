<?php

class DB{
  protected $host;
  protected $dbname;
  protected $user;
  protected $pass;
  protected $conectobject;
  //接続状態を維持するために

function __construct($host,$dbname,$user,$pass){
  $this->host=$host;
  $this->dbname=$dbname;
  $this->user=$user;
  $this->pass=$pass;
}

function connect(){
  $this->conectobject = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname,$this->user,$this->pass);
  if(!$this->conectobject){
    echo 'DBに接続できませんでした';
    die();
    }
  }
}

?>
