<?php

	include('../connect.php');
    $latit = @$_GET['lat'];
    $longi = @$_GET['long'];
	$rad= @$_GET['rad'];

	$querysearch="SELECT id, name, address, st_x(st_centroid(geom)) as lng, st_y(st_centroid(geom)) as lat, ST_DistanceSphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1), tourism.geom) as jarak FROM tourism where ST_DistanceSphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1), tourism.geom) <= ".$rad.""; 


    $hasil=pg_query($querysearch);

        while($baris = pg_fetch_array($hasil))
            {
                $id=$baris['id'];
                $name=$baris['name'];
                $address=$baris['address'];
                $
                $latitude=$baris['lat'];
                $longitude=$baris['lng'];
                $dataarray[]=array('id'=>$id,'name'=>$name,'address'=>$address, "latitude"=>$latitude,"longitude"=>$longitude);
            }
            echo json_encode ($dataarray);
?>