<?php

	include('../connect.php');
    $latit = @$_GET['lat'];
    $longi = @$_GET['long'];
	$rad=@$_GET['rad'];

	$querysearch="SELECT id, name, address, cp, st_x(st_centroid(geom)) as lng, st_y(st_centroid(geom)) as lat, ST_DistanceSphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1), small_industry.geom) as jarak FROM small_industry where ST_DistanceSphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1), small_industry.geom) <= ".$rad.""; 

	$hasil=pg_query($querysearch);
        while($baris = pg_fetch_array($hasil))
            {
                $id=$baris['id'];
                $name=$baris['name'];
                $address=$baris['address'];
                $cp=$baris['cp'];
                $latitude=$baris['lat'];
                $longitude=$baris['lng'];
                $dataarray[]=array('id'=>$id,'cp'=>$cp,'address'=>$address, 'name'=>$name,"latitude"=>$latitude,"longitude"=>$longitude);
            }
            echo json_encode ($dataarray);
?>