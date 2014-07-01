<?php
require 'server.php';
require 'core.php';
if(!isset($_SESSION['username'])) {
   if(isset($_FILES['file']['name'])&&isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['password_again'])&&isset($_POST['fullname'])&&isset($_POST['gender'])&&isset($_POST['email'])&&isset($_POST['type']))
    {
	$name=$_FILES['file']['name'];
	$tmp_name=$_FILES['file']['tmp_name'];
	     $size=$_FILES['file']['size'];
		 $max_size=2097152;
	  $username=$_POST['username'];
	 $password=$_POST['password'];
	 $password_again=$_POST['password_again'];
	$fullname=$_POST['fullname'];
	$gender=$_POST['gender'];
	$type=$_POST['type'];
	$email=$_POST['email'];
	
	$password_hash=md5($password);
	if(!empty($name)&&!empty($username)&&!empty($password)&&!empty($password_again)&&!empty($fullname)&&!empty($gender)&&!empty($email)&&!empty($type)){
	 if($password!=$password_again) {
	     echo "<script type=\"text/javascript\">"."window.alert('password did not matched');"."</script>";  
	} else {
	  
	    $query="SELECT `username` FROM `users` WHERE `username`='$username'";
		$query_run=mysql_query($query);
	    if(mysql_num_rows($query_run)==1){
		echo "<script type=\"text/javascript\">"."window.alert('user already exist,please try with another name');"."top.location='register.php';"."</script>";;
		}
		else { 
		if($size<=$max_size){
		$location='uploads/';
				$filename=$location.$username.$name;
				move_uploaded_file($tmp_name,$filename)	;		
		      $query="INSERT INTO `users`  VALUES('','".mysql_real_escape_string($username)."','".mysql_real_escape_string($password_hash)."','".mysql_real_escape_string($fullname)."','".mysql_real_escape_string($gender)."','".mysql_real_escape_string($email)."','".mysql_real_escape_string($type)."','".mysql_real_escape_string($filename)."')";    
		      if($query_run=mysql_query($query)){
			  {echo "<script type=\"text/javascript\">"."window.alert('Registration successfully done!!!');"."top.location='loginform.php';"."</script>";}
			  
			  }else {echo "<script type=\"text/javascript\">"."window.alert('Please try again');"."top.location='register.php';"."</script>";}
		}else {echo "<script type=\"text/javascript\">"."window.alert('Filesize must be lless than 2MB');"."top.location='register.php';"."</script>";}}
	}
	 
	
	}else {echo "<script type=\"text/javascript\">"."window.alert('Please fill all field');"."top.location='register.php';"."</script>";}
	}else echo '<font color="white">'.'isset not completed'.'</font>';
	
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Custom Pop Up Demo</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function()//When the dom is ready 
{
$("#username").change(function() 
{ //if theres a change in the username textbox

var username = $("#username").val();//Get the value in the username textbox
if(username.length > 3)//if the lenght greater than 3 characters
{
$("#availability_status").html('<img src="loader.gif" align="absmiddle">&nbsp;Checking availability...');
//Add a loading image in the span id="availability_status"

$.ajax({  //Make the Ajax Request
    type: "POST",  
    url: "ajax_check_username.php",  //file name
    data: "username="+ username,  //data
    success: function(server_response){  
   
   $("#availability_status").ajaxComplete(function(event, request){ 

	if(server_response == '0')//if ajax_check_username.php return value "0"
	{ 
	$("#availability_status").html('<img src="available.png" align="absmiddle"> <font color="Green"> Available </font>  ');
	//add this image to the span with id "availability_status"
	}  
	else  if(server_response == '1')//if it returns "1"
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
//if in case the username is less than or equal 3 characters only 
}



return false;
});

});
</script>
<style type="text/css">

#availability_status {position:relative;
	font-size:11px;
	margin-left:10px;
	top:100px;left:-100px;
}

#header{position:absolute;left:-5px;top:-10px;
height:100px;width:1352px;
background-color:425a9c;
z-index:1;}

#faceicon{position:absolute;
top:0px;z-index:2;width:100px;height:100px;left:200px;}

#facename{position:absolute;top:-20px;left:500px;z-index:2;font-size:50px;color:white;}

#form{position:absolute;top:120px;left:550px;}

input{ 
	padding: 8px;
	
	border: solid 1px #E5E5E5;
	font: bold 15px Algerian;
	color:red;
	
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

#loginbutton {
	width: auto;
	background: #617798;
	font-size: 20px;
	color: #FFFFFF;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	cursor:pointer;
	}
	
	#registerbutton {
	width: auto;
	background: #617798;
	font-size: 20px;
	color: #FFFFFF;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	cursor:pointer;
	}

	.img3{position:relative;top:150px;left:200px;}
	
#username{position:relative;top:100px;left:-100px;font-family:Algerian;}
#password{position:relative;top:105px;left:-100px;font-family:Algerian;}
#passwordagain{position:relative;top:64px;left:110px;font-family:Algerian;}
#fullname{position:relative;top:70px;left:-100px;font-family:Algerian;}
#email{position:relative;top:15px;left:-100px;font-family:Algerian;}
#file{position:relative;top:10px;left:-100px;font-family:Arial;width:300px;height:40px;}
	
	
	
	
#registertext{position:relative;top:20px;left:0px;font-family:Algerian;}

#registerbutton{position:relative;top:30px;left:-30px;}
#loginbutton{position:relative;top:-34px;left:150px;}

#radio1{position:relative;top:42px;left:20px;font-size:15px;color:green;font-family:Algerian;}
#radio2{position:relative;top:22px;left:120px;font-size:15px;color:green;font-family:Algerian;}
#radio3{position:relative;top:25px;left:20px;font-size:15px;color:green;font-family:Algerian;}
#radio4{position:relative;top:5px;left:120px;font-size:15px;color:green;font-family:Algerian;}
	
#radio{width:20px;}
	
	#type{position:relative;top:105px;left:-100px;font-size:15px;color:green;font-family:Algerian;}
	#gender{position:relative;top:60px;left:-100px;font-size:15px;color:green;font-family:Algerian;}
	
</style>
</head>
<body>
<div id="header"></div>
<body>
<img src="faceicon.png" id="faceicon"/>
<div id="facename"><p><strong>SHUbh's Blog</strong></p></div>
<img src="popup.png" class="img3" width="600"height="450">
<div id="form">
<form action ="register.php" method="POST"  enctype="multipart/form-data">
<input type="text" name="username" id="username" class="form_element" value="<?php if(isset($username))echo $username;?>" placeholder="username"><span id="availability_status"></span><br>
<input id="password"type="password" name="password" placeholder="password"><br>
<input id="passwordagain"type="password" name="password_again"placeholder="repeat password"><br>
<input id="fullname"type="text" name="fullname" value="<?php if(isset($fullname))echo $fullname;?>" placeholder="Fullname"><br>
<div id="type">Admin/User :</div>
<div id="gender">Female/Male :</div>
<div id="radio1"><input  type="radio" name="gender" value="female"id="radio">female</div>
<div id="radio2"><input type="radio" name="gender" value="male"id="radio">male</div>
<div id="radio3"><input  type="radio" name="type" value="admin"id="radio">admin</div>
<div id="radio4"><input type="radio" name="type" value="user"id="radio">user</div>
<input type="file" name="file" id="file"><br>
<input id="email" type="text" name="email" placeholder="email"><br>
<div class="style_form">
      <input name="submit" type="submit" value="Register" id="registerbutton" />
    </div>
</form>

<form action="index.php">
<input type="submit" value="Login" id="loginbutton">
</form>
</div>
</body>
</html>
<?php
}
else if(isset($_SESSION['username'])){
echo "<script type=\"text/javascript\">"."window.alert('user already loged in,please first logout');"."top.location='index.php';"."</script>"; 
}




?>