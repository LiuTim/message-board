<?php
	header ("content-type:text/html; charset=utf-8");

	$cn=mysql_connect("localhost","root","456987")or die ("Could not connect");
	
	mysql_query("SET NAMES 'UTF8'");
?>