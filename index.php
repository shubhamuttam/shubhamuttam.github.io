<?php

require 'core.php';
require 'server.php';

if(isset($_SESSION['username']))
{
  header('Location:login_success2.php');
  }
else include 'loginform.php';



?>
  