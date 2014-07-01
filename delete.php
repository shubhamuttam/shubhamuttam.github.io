<?php

require 'server.php';
require 'core.php';
    if(isset($_POST['hiden']))
	{
       $id=$_POST['hiden'];
	  $username=$_SESSION['username'];
	  $query="DELETE FROM `post` WHERE `pid` ='$id'";
	  if($query_run=mysql_query($query)){
	  $query="DELETE FROM `comment` WHERE `pid` ='$id'";
	  if($query_run=mysql_query($query)){
	         $postf=getfield1(1,'postf');
			 if($postf==$id)
			  {
			    $postf=$postf-1;
				$query="UPDATE `post` SET `postf` = '$postf' WHERE `id` ='1'";
         $run=mysql_query($query);
		 echo "<script type=\"text/javascript\">"."window.alert('post successfully deleted ');"."top.location='login_success2.php';"."</script>";
			  }
	  else echo "<script type=\"text/javascript\">"."window.alert('post  deleted');"."top.location='login_success2.php';"."</script>";
	  }
	  }else echo "qury problem";
	  }else echo "hide not set";
 
?>