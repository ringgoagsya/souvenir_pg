<?php

	$host = "ec2-18-206-103-49.compute-1.amazonaws.com";
	$user = "essyzgnvwgwepl";
	$pass = "0417854c3ee064568312fd87cb0ba5a683c82c967f227736d2d5a23059d246ac";
	$port = "5432";
	$dbname = "dab9lvt6rmfttf";

	$conn = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$pass) or die("Gagal");
?>
