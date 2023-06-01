<?php
class Database {
protected $host='localhost';
protected $user='root';
protected $pass='';
protected $dbname='tiket_konser';
public $mysqli;
public function __construct(){
$this->mysqli=NEW mysqli($this->host,
$this->user,$this->pass,$this->dbname);
if($this->mysqli->connect_errno!=0){
$err=null;
$err .='Kode Error:'.$this->mysqli->connect_errno.'<br/>';
$err .='Deskripsi :'.$this->mysqli->connect_error;
}
}
public function tutupKoneksi(){
$this->mysqli->close();
}
public function cekError(){
return $this->mysqli->error;
}
}
