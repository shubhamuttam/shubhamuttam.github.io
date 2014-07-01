<?php
$error='could not connect';
$mysql_host='localhost';
$mysql_user='root';
$mysql_pass='';
$mysql_db='b_database';
$mysql_connection=mysql_connect($mysql_host,$mysql_user,$mysql_pass);

if(!@($mysql_connection)||!@mysql_select_db($mysql_db))
{ die(mysql_error());
}
  





?>
