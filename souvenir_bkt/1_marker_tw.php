<?php
require '../connect.php';

$cari = $_GET["cari"];

$querysearch	="SELECT id, name, address, open, close, st_x(st_centroid(geom)) as lon,st_y(st_centroid(geom)) as lat 
from tourism where id='$cari'";
			   
$hasil=pg_query($querysearch);
while($baris = pg_fetch_array($hasil))
	{
		  $id=$baris['id'];
		  $nama=$baris['name'];
		  $lokasi=$baris['address'];
		  $jam_buka=$baris['open'];
		  $jam_tutup=$baris['close'];	
		  $longitude=$baris['lon'];
		  $latitude=$baris['lat'];
		  $dataarray[]=array('id'=>$id,'name'=>$name,'address'=>$address,'open'=>$open, 'close'=>$close,'longitude'=>$longitude,'latitude'=>$latitude);
	}
echo json_encode ($dataarray);
?>
