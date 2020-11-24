<?php

	include('../connect.php');
    $latit = @$_GET['lat'];
    $longi = @$_GET['long'];
	$rad= @$_GET['rad'];

	$querysearch="SELECT id, name, address, capacity,st_x(st_centroid(geom)) as lng, st_y(st_centroid(geom)) as lat, ST_DistanceSphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1), worship_place.geom) as jarak FROM worship_place where ST_DistanceSphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1), worship_place.geom) <= ".$rad.""; 


    $hasil=pg_query($querysearch);

    while($baris = pg_fetch_array($hasil))
        {
            $id=$baris['id'];
            $name=$baris['name'];
            $address=$baris['address'];
            $capacity=$baris['capacity'];
            $latitude=$baris['lat'];
            $longitude=$baris['lng'];
            $dataarray[]=array('id'=>$id,'name'=>$name,'address'=>$address,'capacity'=>$capacity,  "latitude"=>$latitude,"longitude"=>$longitude);
        }
        echo json_encode ($dataarray);
?>