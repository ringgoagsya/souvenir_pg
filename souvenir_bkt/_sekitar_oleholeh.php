<?php

	include('../connect.php');
    $latit = @$_GET['lat'];
    $longi = @$_GET['long'];
	$rad= @$_GET['rad'];

	$querysearch="SELECT id, name, owner, cp, address, st_x(st_centroid(geom)) as lng, st_y(st_centroid(geom)) as lat, ST_DistanceSphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1), souvenir.geom) as jarak FROM souvenir where ST_DistanceSphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1), souvenir.geom) <= ".$rad.""; 


    $hasil=pg_query($querysearch);

	$hasil=pg_query($querysearch);

        while($baris = pg_fetch_array($hasil))
            {
                $id=$baris['id'];
                $name=$baris['name'];
                $owner=$baris['owner'];
                $cp=$baris['cp'];
                $address=$baris['address'];
                
                $latitude=$baris['lat'];
                $longitude=$baris['lng'];
                $dataarray[]=array('id'=>$id,'name'=>$name,'cp'=>$cp,'address'=>$address, "latitude"=>$latitude,"longitude"=>$longitude);
            }
            echo json_encode ($dataarray);

?>