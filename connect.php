<?php
$host = 'localhost';
$user ='root';
$pass = '';
$db = 'toko';
mysql_connect($host,$user,$pass) or die (mysql_error());
mysql_select_db('toko');
?>