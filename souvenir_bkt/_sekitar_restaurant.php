<?php

	include('../connect.php');
    $latit = $_GET['lat'];
    $longi = $_GET['long'];
	$rad=$_GET['rad'];

	$querysearch="SELECT id, name, address, cp, open, close, capacity, employee, mushalla, park_area, bathroom, id_category, st_x(st_centroid(geom)) as lng, st_y(st_centroid(geom)) as lat, ST_DistanceSphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1), restaurant.geom) as jarak FROM restaurant where ST_DistanceSphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1), restaurant.geom) <= ".$rad.""; 


    $hasil=pg_query($querysearch);

        while($baris = pg_fetch_array($hasil))
            {
                $id=$baris['id'];
                $name=$baris['name'];
                $address=$baris['address'];
                $cp=$baris['cp'];
                $open=$baris['open'];
                $close=$baris['close'];
                $capacity=$baris['capacity'];
                $employee=$baris['employee'];
                $mushalla=$baris['mushalla'];
                $park_area=$baris['park_area'];
                $bathroom=$baris['bathroom'];
                $latitude=$baris['lat'];
                $longitude=$baris['lng'];
                $dataarray[]=array('id'=>$id,'name'=>$name,'address'=>$address,'cp'=>$cp, 'open'=>$open, 'close'=>$close,'capacity'=>$capacity, 'employee'=>$employee, 'mushalla'=>$mushalla,'park_area'=>$park_area, 'bathroom'=>$bathroom, "latitude"=>$latitude,"longitude"=>$longitude);
            }
            echo json_encode ($dataarray);
?>