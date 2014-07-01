<?php
include 'server.php';
require 'core.php';
if(isset($_POST['post']))
	{ $name=$_FILES['file']['name'];
	 $tmp_name=$_FILES['file']['tmp_name'];
	     $size=$_FILES['file']['size'];
		 $max_size=2097152;
      $post=$_POST['post'];
	  $username=$_SESSION['username'];
	  $type='admin';
	  if(!empty($post)){
	    if($name!=""){
		$location='uploads/';
				$filename=$location.$username.$name;
				(move_uploaded_file($tmp_name,$filename));
				}
		else $filename="none";
	     
		 $postf=1+getfield1(1,'postf');
	     $query="UPDATE `post` SET `postf` = '$postf' WHERE `pid` ='1'";
         $run=mysql_query($query);
	  
	  $query="INSERT INTO `post`  VALUES('','".mysql_real_escape_string($username)."','".mysql_real_escape_string($post)."','".mysql_real_escape_string($type)."','".mysql_real_escape_string($filename)."','','')";    
		      if($query_run=mysql_query($query)){
			  header('Location:login_success2.php');
			  }
	
	}else echo "please set please";

}


?>