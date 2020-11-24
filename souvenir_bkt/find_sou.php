<?php
require '../connect.php';
$cari_nama = $_GET["cari_nama"];


$querysearch	="SELECT distinct id, name,address, st_x(st_centroid(geom)) as longitude, 
st_y(st_centroid(geom)) as latitude from souvenir where lower(name)like lower('%$cari_nama%')"; 

$data = array();

$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
	{
		  $id=$row['id'];
		  $name=$row['name']; 
		  $address=$row['address'];
		  $longitude=$row['longitude'];
		  $latitude=$row['latitude'];
		  $tabel='sou';
		  $dataarray[]=array('id'=>$id,'name'=>$name,'address'=>$address,'longitude'=>$longitude,'latitude'=>$latitude,'tabel'=>$tabel);
	}

$querysearch2="SELECT distinct id, name,address, st_x(st_centroid(geom)) as longitude, 
st_y(st_centroid(geom)) as latitude from small_industry where lower(name)like lower('%$cari_nama%')"; 
$hasil2=pg_query($querysearch2);
while($row = pg_fetch_array($hasil2))
	{
		  $id=$row['id'];
		  $name=$row['name']; 
		  $address=$row['address'];
		  $longitude=$row['longitude'];
		  $latitude=$row['latitude'];
		  $tabel='ik';
		  $dataarray[]=array('id'=>$id,'name'=>$name,'address'=>$address,'longitude'=>$longitude,'latitude'=>$latitude,'tabel'=>$tabel);
	}

echo json_encode ($dataarray);
?>