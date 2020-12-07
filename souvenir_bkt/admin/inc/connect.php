<?php
<<<<<<< HEAD
	$host = "localhost";
	$user = "postgres";
	$pass = "root";
	$port = "5432";
	$dbname = "souv";
=======
	$host = "ec2-184-72-235-159.compute-1.amazonaws.com";
	$user = "sjtnwkwqhxklku";
	$pass = "4d0b992db8431e4331287ab0430b51871509ed25a1b5feb3e9764ae1a78a6e2c";
	$port = "5432";
	$dbname = "dbehfdvl0f5kuv";
>>>>>>> 08cf8c322afb88135ecbfef6119eb0928ceb0d39
	$conn = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$pass) or die("Gagal");
?>
