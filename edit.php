<?php
include('core.php');
include('server.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="style.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Live Username Check on registration form Using PHP/jQuery</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function()
{
$("#username").change(function() 
{ 

var username = $("#username").val();
if(username.length > 3)
{
$("#availability_status").html('<img src="loader.gif" align="absmiddle">&nbsp;Checking availability...');


$.ajax({  
    type: "POST",  
    url: "ajax_check_password.php", 
    data: "password="+ username,  
    success: function(server_response){  
   
   $("#availability_status").ajaxComplete(function(event, request){ 

	if(server_response == '0')
	{ 
	$("#availability_status").html('<img src="available.png" align="absmiddle"> <font color="Green"> Available </font>  ');
	
	}  
	else  if(server_response == '1')
	{  
	 $("#availability_status").html('<img src="not_available.png" align="absmiddle"> <font color="red">Not Available </font>');
	}  
   
   });
   } 
   
  }); 

}
else
{

$("#availability_status").html('<font color="#cc0000">Username too short</font>');

}



return false;
});

});
</script>
<link rel="stylesheet" href="nblack.css" type="text/css" media="screen">
</link>
<style type="text/css">
body {
	font-family:Arial, Helvetica, sans-serif
}
#availability_status {
	font-size:11px;
	margin-left:10px;
}
#title{position:absolute;left:-5px;top:-10px;
height:70px;width:1371px;
background-color:#425a9c;}

.faceicon{position:absolute;left:180px;top:-45px;}
.userpic{position:absolute;left:550px;top:-50px;}
.messagename{position:absolute;left:550px;top:-30px;color:white;font-family:arail; font-size:20px;}


input{ 
	padding: 4px;
	border: solid 1px #E5E5E5;
	font: normal 15px Arial;
	color:red;
	margin:3px;
	width: 200px;
	background: #FFFFFF url('form_background.png') left top repeat-x;/*Mimic Background Property in Internet Explorer since IE 6,7,8 does not support CSS3*/
	background: -webkit-gradient(linear, left top, left 25, from(#FFFFFF), color-stop(4%, #EEEEEE), to(#FFFFFF));
	background: -moz-linear-gradient(top, #FFFFFF, #EEEEEE 1px, #FFFFFF 25px);
	box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;/*0.1 actually means 10 %*/
	-moz-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;
	-webkit-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;
	}
	
	input:hover,input:focus { 
-moz-box-shadow:0 0 8px lightblue;
	-webkit-box-shadow:0 0 8px lightblue;
	box-shadow:0 0 8px lightblue;
}



#changepassword{position:absolute;left:0px;top:px;}

#changepassword,#changepic,#changemail,#changefullname {
	width: auto;
	height:30px;
	background: #617798;
	font-size: 14px;
	color: #FFFFFF;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	cursor:pointer;
	}
	

	
#pass{position:absolute;left:180px;top:200px;border:2px dotted red;}
#name{position:absolute;left:780px;top:200px;border:2px dotted red;}
#pic{position:absolute;left:180px;top:400px;border:2px dotted red;}
#mai{position:absolute;left:780px;top:400px;border:2px dotted red;}

</style>
</head>
<body>
<div id="title"></div>
<a href="login_success2.php">back</a>
<ul id="menu">
<li class="faceicon"><img src="faceicon.png"width="50px"height="50px"></li>
  <li class="menu-right"><a href="#"><font size="6" color="#32477a">More</font></a>
    <div class="menu-container-1 align-center"><!-- External social links - START  -->
      
      <div class="column-1">
        <ul class="l1">
          <li><a href="logout.php">logout</a></li>
          <li><a href="login_success2.php">Home</a></li>
        </ul>
      </div>
    </div>
  </li>
 <li class="userpic"><img src="<?php echo getfield0('filename');?>" width="50px" height="50px"></li>
  <li class="messagename">Welcome <font size="7"><?php echo getfield0('fullname');?></font></li>
</ul>
<div id="pass">
<form method="POST" action="edit.php">
<input type="password" name="username" id="oldpassword"  placeholder="oldpassword"><span id="availability_status"></span><br>
<input id="newpassword"type="password" name="password" placeholder="newpassword"><br>
<input id="newpasswordagain"type="password" name="password_again"placeholder="repeat newpassword"><br>
<input name="submit" type="submit" value="change password" id="changepassword" />
</form></div>

<div id="name">
<form action="edit.php" method="POST">
<input id="fullname"type="text" name="fullname" placeholder="<?php echo getfield0('fullname');?>"><br>
<input id="namepassword"type="password" name="fullpassword" placeholder="currentpassword"><br>
<input name="submit" type="submit" value="chnage name" id="changefullname" />
</form></div>

<div id="pic">
<form action="edit.php" method="POST" enctype="multipart/form-data">
<input type="file" name="file"><br>
<input id="filepassword"type="password" name="picpassword" placeholder="current password"><br>
<input name="submit" type="submit" value="change pic" id="changepic" />
</form></div>

<div id="mai">
<form action="edit.php" method="POST">
<input id="email" type="text" name="email" placeholder="<?php echo getfield0('email');?>"><br>
<input id="emailpassword"type="password" name="mailpassword" placeholder="current password"><br>
<input name="submit" type="submit" value="change mail" id="changemail" />
</form>
</div>
</body>
</html>

<?php
if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['password_again']))
{
$username=$_SESSION['username'];
$oldpassword=md5($_POST['username']);
$password=$_POST['password'];
$password_again=$_POST['password_again'];
$password_hash=md5($password);
if(!empty($oldpassword)&&!empty($password)&&!empty($password_again)){
 $checkpassword=getfield0('password');
 if($oldpassword==$checkpassword){
    if($password!=$password_again) {
	     echo "<script type=\"text/javascript\">"."window.alert('password did not matched');"."</script>";  
	} else {
	  $query="UPDATE `users` SET `password` = '$password_hash' WHERE `username` ='$username'";
		if($query_run=mysql_query($query)){
			  echo "<script type=\"text/javascript\">"."window.alert('password successfully chnaged');"."top.location='edit.php';"."</script>";
 } else  echo "<script type=\"text/javascript\">"."window.alert('password inserting problem');"."</script>";  
 }
} else echo "<script type=\"text/javascript\">"."window.alert('old and new password did not matched');"."</script>"; 
}else  echo "<script type=\"text/javascript\">"."window.alert('empty fied');"."</script>";  
}

if(isset($_POST['fullname'])&&isset($_POST['fullpassword'])){
$fullname=$_POST['fullname'];$password=$_POST['fullpassword'];$checkpassword=getfield0('password');$username=$_SESSION['username'];
if(!empty($password)&&!empty($fullname)){$password=md5($password);
if($password==$checkpassword){ $query="UPDATE `users` SET `fullname` = '$fullname' WHERE `username` ='$username'";
if($query_run=mysql_query($query)){
			  echo "<script type=\"text/javascript\">"."window.alert('name successfully chnaged');"."top.location='edit.php';"."</script>";
 }
}else echo "<script type=\"text/javascript\">"."window.alert('current password did not matched');"."</script>"; 
}else echo "<script type=\"text/javascript\">"."window.alert('please fill both field');"."</script>"; 
}


if(isset($_POST['email'])&&isset($_POST['mailpassword'])){
$email=$_POST['email'];$password=$_POST['mailpassword'];$checkpassword=getfield0('password');$username=$_SESSION['username'];
if(!empty($password)&&!empty($email)){$password=md5($password);
if($password==$checkpassword){ $query="UPDATE `users` SET `email` = '$email' WHERE `username` ='$username'";
if($query_run=mysql_query($query)){
			  echo "<script type=\"text/javascript\">"."window.alert('email successfully chnaged');"."top.location='edit.php';"."</script>";
 }
}else echo "<script type=\"text/javascript\">"."window.alert('current password did not matched');"."</script>"; 
}else echo "<script type=\"text/javascript\">"."window.alert('please fill both field');"."</script>"; 
}

if(isset($_POST['picpassword'])&&isset($_FILES['file']['name'])){echo $name=$_FILES['file']['name'];
	 $tmp_name=$_FILES['file']['tmp_name'];
	     $size=$_FILES['file']['size'];
		 $max_size=2097152;
		 $password=$_POST['picpassword'];$checkpassword=getfield0('password');$username=$_SESSION['username'];
		 if(!empty($name)&&!empty($password)){$password=md5($password);
		 if($password==$checkpassword){
		 if($size<=$max_size){
		$location='uploads/';
				$filename=$location.$username.$name;
				if(move_uploaded_file($tmp_name,$filename)){
				$query="UPDATE `users` SET `filename` = '$filename' WHERE `username` ='$username'";
if($query_run=mysql_query($query)){
			  echo "<script type=\"text/javascript\">"."window.alert('pic successfully chnaged');"."top.location='edit.php';"."</script>";
 }else echo "<script type=\"text/javascript\">"."window.alert('query problem');"."</script>";
}else echo "<script type=\"text/javascript\">"."window.alert('problem in uploading file');"."</script>";
}else echo "<script type=\"text/javascript\">"."window.alert('size must be less than 2 mb');"."</script>";
		 
		 
		 }else echo "<script type=\"text/javascript\">"."window.alert('current password didnot match');"."</script>";
		 }else echo "<script type=\"text/javascript\">"."window.alert('please fill both field');"."</script>";
}


?>