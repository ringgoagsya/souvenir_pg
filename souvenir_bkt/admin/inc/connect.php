<?php
	$host = "localhost";
	$user = "postgres";
	$pass = "simpatiku76";
	$port = "5432";
	$dbname = "bkt_tourism";
	$conn = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$pass) or die("Gagal");
?>