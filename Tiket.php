<?php
class Tiket extends Database {
public function tampil(){
$sql=$this->mysqli->query("SELECT * FROM tiket") or die ($this->CekError());
while($data=$sql->fetch_object()){
$datatiket[]=$data;
}
if(isset($datatiket)){
return $datatiket;
}
$this->TutupKoneksi();
}
public function detail($id_tiket){
$sql=$this->mysqli->query("SELECT * FROM tiket WHERE id_tiket='".$id_tiket."'") or die ($this->CekError());
$datatiket=$sql->fetch_object();
if(isset($datatiket)){
return $datatiket;
}
$this->TutupKoneksi();
}
function update($id_tiket,$data){
$script_update_temp=null;
foreach($data as $field=>$value){
$script_update_temp.= $field."='".$value."',";
}
$script_update=rtrim($script_update_temp,',');
$this->mysqli->query("UPDATE tiket SET ".$script_update."WHERE id_tiket='".$id_tiket."'") or die ($this->CekError());
$this->TutupKoneksi();
}
function hapus($id_tiket){
$this->mysqli->query("DELETE FROM tiket WHERE id_tiket='$id_tiket'");
$this->TutupKoneksi();
}
function simpan($data){
$kolom_nya=null;
$nilai_nya=null;
foreach($data as $kolom=>$nilai){
$kolom_nya .= $kolom.",";
$nilai_nya .= "'".$nilai."',";
}
$kolom_nya_baru=rtrim($kolom_nya,',');
$nilai_nya_baru=rtrim($nilai_nya,',');
$sql_simpan="INSERT INTO tiket (".$kolom_nya_baru.") VALUES (".$nilai_nya_baru.")";
$this->mysqli->query($sql_simpan) or die($this->CekError());
$this->TutupKoneksi();
}
}