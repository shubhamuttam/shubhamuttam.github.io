<?php
include('server.php');
 

if(isset($_POST['username'])) 
{
$password = md5(mysql_real_escape_string($_POST['username']));
$username=$_SESSION['username'];
$check_for_username = mysql_query("SELECT id FROM users WHERE username='$username' AND password='$password'");


if(mysql_num_rows($check_for_username))
{
echo '1';
}
else
{
echo '0';
}

}

?>