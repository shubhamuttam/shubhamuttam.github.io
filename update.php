<?php
require 'server.php';
require 'core.php';
 if(isset($_POST['hide'])&&isset($_POST['post'])&&isset($_POST['del']))
	{ 
      $id=$_POST['hide'];
	  $username=$_SESSION['username'];
	  $post=$_POST['post'];
	  $del=$_POST['del'];
	  if(!empty($post)&&!empty($del)){
	  $query="UPDATE `post` SET `post` = '$post' WHERE `username` ='$username'";
if($query_run=mysql_query($query)){
	  if($del=='yes')
	  {
	  $query="DELETE FROM `comment` WHERE `pid` ='$id'";
	  if($query_run=mysql_query($query)){
	  echo "<script type=\"text/javascript\">"."window.alert('post successfully updated and previous comment dleted');"."top.location='login_success2.php';"."</script>";
	  }else echo "<script type=\"text/javascript\">"."window.alert('problem iid deleting');"."top.location='login_success2.php';"."</script>";
	  }else echo "<script type=\"text/javascript\">"."window.alert('post successfully updated');"."top.location='login_success2.php';"."</script>";
	  }else echo "<script type=\"text/javascript\">"."window.alert('query prlblem');"."top.location='login_success2.php';"."</script>";
 }else echo "<script type=\"text/javascript\">"."window.alert('fill all feild');"."top.location='login_success2.php';"."</script>";
}


?>