<?php
$datatiketkonser=NEW Tiket;
if($_GET['aksi']=='tampil'){
$html = null;
$html .='<h3>Daftar Tiket</h3>';
$html .='<p>Berikut ini data tiket konser</p>';
$html .='<table border="1" width="100%">
<thead>
<th>No.</th>
<th>Id Tiket</th>
<th>Nama Group</th>
<th>Tempat Konser</th>
<th>Tanggal Konser</th>
<th>Seat</th>
<th>Harga</th>
<th>Aksi</th>
</thead>
<tbody>';
$data = $datatiketkonser->tampil();
$no=null;
if(isset($data)){
foreach($data as $barisTiket){
$no++;
$html .='<tr>
<td>'.$no.'</td>
<td>'.$barisTiket->id_tiket.'</td>
<td>'.$barisTiket->nama_group.'</td>
<td>'.$barisTiket->tempat_konser.'</td>
<td>'.$barisTiket->tgl_konser.'</td>
<td>'.$barisTiket->seat.'</td>
<td>'.$barisTiket->harga.'</td>
<td>
<a href="index.php?file=tiket&aksi=edit&id_tiket='.$barisTiket->id_tiket.'">Edit</a>
<a href="index.php?file=tiket&aksi=hapus&id_tiket='.$barisTiket->id_tiket.'">Hapus</a>
</td>
</tr>';
}
}
$html .='</tbody>
</table>';
echo $html;
}
else if ($_GET['aksi']=='tambah') {
$html =null;
$html .='<h3 align="left">Form Tambah</h3>';

$html .='<form method="POST"action="index.php?file=tiket&aksi=simpan">';
$html .='<p>Id Tiket<br/>';
$html .='<input type="text" name="txtId"placeholder="Masukan Id Tiket" autofocus/></p>';
$html .='<p>Nama Group<br/>';
$html .='<input type="text" name="txtNama"placeholder="Masukan Nama Group" size="30" required/></p>';
$html .='<p>Tempat, Tanggal Konser<br/>';
$html .='<input type="text" name="txtTempatKonser"placeholder="Masukan Tempat Konser" size="30" required/>';
$html .='<input type="date" name="txtTanggalKonser"required/></p>';
$html .='<p>Tempat Duduk<br/>';
$html .='<input type="radio" name="txtSeat"value="Platinum"> Platinum';
$html .='<input type="radio" name="txtSeat"value="VIP"> VIP</p>';
$html .='<input type="radio" name="txtSeat"value="Silver"> Silver</p>';
$html .='<p>Harga Tiket<br/>';
$html .='<input type="text" name="txtHarga" placeholder="Masukan Harga Tiket" cols="50" rows="5" required/></p>';
$html .='<p><input type="submit" name="tombolSimpan"value="Simpan"/></p>';
$html .='</form>';
echo $html;
}
else if ($_GET['aksi']=='simpan') {
$data=array(
'id_tiket'=>$_POST['txtId'],
'nama_group'=>$_POST['txtNama'],
'tempat_konser'=>$_POST['txtTempatKonser'],
'tgl_konser'=>$_POST['txtTanggalKonser'],
'seat'=>$_POST['txtSeat'],
'harga'=>$_POST['txtHarga']
);
$datatiketkonser->simpan($data);
echo '<meta http-equiv="refresh" content="0;
url=index.php?file=tiket&aksi=tampil">';
}
else if ($_GET['aksi']=='edit') {
$tiket=$datatiketkonser->detail($_GET['id_tiket']);
if($tiket->seat =='Platinum') { $pilihPlatinum='checked';
if($tiket->seat =='VIP') { $pilihVIP='unchecked';
$pilihSilver=null; }
}
else {
$pilihPlatinum='checked'; $pilihVIP='unchecked'; $pilihSilver=null; }
$html=null;
$html .='<h3>Form Tambah</h3>';

$html .='<form method="POST"action="index.php?file=tiket&aksi=update">';
$html .='<p>Id Tiket<br/>';
$html .='<input type="text" name="txtId"value="'.$tiket->id_tiket.'"placeholder="Masukan Id Tiket" autofocus/></p>';
$html .='<p>Nama Group<br/>';
$html .='<input type="text" name="txtNama"value="'.$tiket->nama_group.'"placeholder="Masukan Nama Group" size="30" required/></p>';
$html .='<p>Tempat, Tanggal Konser<br/>';
$html .='<input type="text" name="txtTempatKonser"value="'.$tiket->tempat_konser.'"placeholder="Masukan Tempat Konser" size="30" required/>';
$html .='<input type="date" name="txtTanggalKonser"value="'.$tiket->tgl_konser.'"required/></p>';
$html .='<p>Tempat Duduk<br/>';
$html .='<input type="radio" name="txtSeat"value="Platinum" '.$pilihPlatinum.'> Platinum';
$html .='<input type="radio" name="txtSeat"value="VIP" '.$pilihVIP.'> VIP';
$html .='<input type="radio" name="txtSeat"value="Silver" '.$pilihSilver.'> Silver</p>';
$html .='<p>Harga Tiket<br/>';
$html .='<input type="text" name="txtHarga"value="'.$tiket->harga.'" placeholder="Masukan Harga Tiket" cols="50" rows="5" required/></p>';
$html .='<p><input type="submit" name="tombolSimpan"value="Simpan"/></p>';
$html .='</form>';
echo $html;
}
else if ($_GET['aksi']=='update') {
$data=array(
'nama_group'=>$_POST['txtNama'],
'tempat_konser'=>$_POST['txtTempatKonser'],
'tgl_konser'=>$_POST['txtTanggalKonser'],
'seat'=>$_POST['txtSeat'],
'harga'=>$_POST['txtHarga']
);
$datatiketkonser->update($_POST['txtId'],$data);
echo '<meta http-equiv="refresh" content="0;
url=index.php?file=tiket&aksi=tampil">';
}
else if ($_GET['aksi']=='hapus') {
$datatiketkonser->hapus($_GET['id_tiket']);
echo '<meta http-equiv="refresh" content="0;url=index.php?file=tiket&aksi=tampil">';
}
else {
echo '<p>Error 404 : Halaman tidak ditemukan !</p>';
}
?>