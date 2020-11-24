<?php
require '../connect.php';

$geojson = array(
  'type'      => 'FeatureCollection',
  'features'  => array()
);
//$querysearch="	SELECT row_to_json(fc) 
//				FROM ( SELECT 'FeatureCollection' As type, array_to_json(array_agg(f)) As features 
//				FROM (SELECT 'Feature' As type , ST_AsGeoJSON(souvenir.geom)::json As geometry , row_to_json((SELECT l 
//				FROM (SELECT souvenir.name,ST_X(ST_Centroid(souvenir.geom)) 
//				AS lon, ST_Y(ST_CENTROID(souvenir.geom)) As lat) As l )) As properties 
//				FROM souvenir As souvenir  
//				) As f ) As fc ";

$querysearch = "SELECT ST_AsGeoJSON(souvenir.geom) As geometry from souvenir";

$hasil=pg_query($querysearch);
while($data=pg_fetch_array($hasil))
	{
		$feature = array(
         'type' => 'Feature',
         'geometry' => json_decode($data['geometry'], true)
     
      );
      array_push($geojson['features'], $feature);
	}

$querysearch="	SELECT ST_AsGeoJSON(small_industry.geom) As geometry from small_industry ";

$hasil=pg_query($querysearch);
while($data=pg_fetch_array($hasil))
	{
		$feature = array(
         'type' => 'Feature',
         'geometry' => json_decode($data['geometry'], true)
     
      );
      array_push($geojson['features'], $feature);
	}
	echo json_encode($geojson);
?>