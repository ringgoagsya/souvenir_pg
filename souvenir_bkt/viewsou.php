<?php
include '../connect.php';
$id = $_GET['id'];


$querysearch	="SELECT souvenir.id,souvenir.name, souvenir.address, souvenir.cp, ST_X(ST_Centroid(souvenir.geom)) AS lng, ST_Y(ST_CENTROID(souvenir.geom)) 
            As lat FROM souvenir";

$data = array();
			   
$hasil=pg_query($querysearch);
while($baris = pg_fetch_array($hasil))
	{
		$id=$baris['id'];
        $name=$baris['name'];
        $address=$baris['address'];
        $cp=$baris['cp'];
        
        $longitude=$baris['lng'];
		$latitude=$baris['lat'];
        $tabel = 'sou';
        $dataarray[]=array('id'=>$id,'name'=>$name,'address'=>$address, 'lng'=>$longitude,'lat'=>$latitude,'tabel'=>$tabel);
    }

$querysearch2 ="SELECT small_industry.id, small_industry.name, small_industry.address, small_industry.owner, ST_X(ST_Centroid(small_industry.geom)) AS lng, ST_Y(ST_CENTROID(small_industry.geom)) 
            As lat FROM small_industry";
               
$hasil2=pg_query($querysearch2);
while($baris = pg_fetch_array($hasil2))
    {
        $id=$baris['id'];
        $name=$baris['name'];
        $address=$baris['address'];
        $owner=$baris['owner'];
        
        $longitude=$baris['lng'];
        $latitude=$baris['lat'];
        $tabel = 'ik';
        $dataarray[]=array('id'=>$id,'name'=>$name,'address'=>$address, 'lng'=>$longitude,'lat'=>$latitude,'tabel'=>$tabel);
        // $dataarray[]=array('id'=>$id,'name'=>$name,'address'=>$address, 'lng'=>$longitude,'lat'=>$latitude);
    }

echo json_encode ($dataarray);
?>