<?php
include ('../connect.php');
$dataarray=array();
 
$sql=pg_query("SELECT id, name from souvenir Order by name asc");
			
while($row = pg_fetch_array($sql))
	{
		  $id_kuliner=$row['idr'];
		  $nama_kuliner=$row['name'];
		  $dataarray[]=array('id'=>$id_kuliner,'name'=>$nama_kuliner);
	}
echo json_encode ($dataarray);
   			  
?>