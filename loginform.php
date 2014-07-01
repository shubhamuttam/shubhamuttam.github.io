<?php
if(isset($_POST['username'])&&isset($_POST['password'])) {
echo $username=$_POST['username'];
    $password=$_POST['password'];
	
	 $password_hash=md5($password);
   if(!empty($username)&&!empty($password)){
   
     $query="SELECT `id` FROM `users` WHERE `username`='$username' AND `password`='$password_hash'";
       if($query_run=mysql_query($query)) {
	     		 $query_run;
				 
     $query_num_rows=mysql_num_rows($query_run);
		    if($query_num_rows==0) {
			  header('Location:index.php');
			} 
			else if($query_num_rows==1) {
			 $_SESSION['username']=$username;
			 header('Location:index.php');}
	    
	   }else echo "<script type=\"text/javascript\">"."window.alert('id password didnot match');"."</script>";;
     }
	 else echo "<script type=\"text/javascript\">"."window.alert('ENTER username and password');"."top.location='index.php';"."</script>";; 
}

?>
<html>
<head>
<title>Login system</title>
<link rel="shortcut icon" href="https://abs.twimg.com/favicons/favicon.ico/">
<link rel="stylesheet" type="text/css" href="style.css"/>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
<script type="text/javascript" src="custom.js"></script>
<style type="text/css">

</style>

</head>
<div id="header"></div>
<body>
<img src="faceicon.png" id="faceicon"/>
<div id="facename"><p><strong>SHUbh's Blog</strong></p></div>
<div id="instruction">
<h2>Instructions....!!!!</h2>
<p>First register in the blog</p>
<p>U can access blog as a </strong>USER</strong> or </strong>ADMIN</strong></p>
<p>After one time registration u can login by <strong>USERNAME</strong> and <strong>PASSWORD</strong></p>
<p>ADMIN can only delete the POSTS which are posted by him/her</p>
<p>U can POST images and COMMENT via images but<br>text field is cumpolsory,can't leave any field empty</p>
<p>Also edit your profile after login</p>
<p>thank u</p>
</div>

<div id="trigger">
<h1><a href="#" rel="popuprel" class="popup"><img src="login.png" id="login"></a></h1>

</div>
<div class="popupbox" id="popuprel">
<div id="intabdiv">
              <h2 id="logintext">LOGIN here!!!!</h2>
                    <form action="<?php echo $current_file;?>" method="POST">
<input type="text" name="username" placeholder="username" id="username" id="username"><br>
<input type="password" name="password"placeholder="password" id="password" id="password"><br>
<input type="submit" value="login" id="loginbutton">
</form>		   
             
          </div>
</div>

<div id="fade"></div>

<a href="register.php"><img src="register.png" id="register"></a>
</body>
</html>