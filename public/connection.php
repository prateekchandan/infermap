<?php
$host="localhost";
$uname="prateek";
$pass="Prateek5545@gmail.com";
$database = "infermap";	
$connection=mysql_connect($host,$uname,$pass) or die("Database Connection Failed");
$selectdb=mysql_select_db($database) or die("Database could not be selected");	
$result=mysql_select_db($database)
or die("database cannot be selected <br>");

session_cache_expire(0);
@session_start();
set_time_limit(0);
?>
