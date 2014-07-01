<?php $f=0;
include 'server.php';
include 'core.php';
?>


<html>
<head>
<title>Pure Cross-Browser CSS3 Menu</title>
<link rel="stylesheet" href="nblack.css" type="text/css" media="screen">
</link>
<link rel="stylesheet" type="text/css" href="style.css"/>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
<script type="text/javascript" src="custom.js"></script>
<style type="text/css">
#delete{color:white;
width:30px;
border:1px solid white;
background-image:url(not_available.png);}

#page{position:absolute;left:50px;top:100px;}
#remain{position:absolute;left:200px;top:0px;}
input{ 
	padding: 2px;
	border: solid 1px #E5E5E5;
	font: normal 15px Arial;
	color:black;
	
	width: 100px;
	background: #FFFFFF url('form_background.png') left top repeat-x;/*Mimic Background Property in Internet Explorer since IE 6,7,8 does not support CSS3*/
	background: -webkit-gradient(linear, left top, left 25, from(#FFFFFF), color-stop(4%, #EEEEEE), to(#FFFFFF));
	background: -moz-linear-gradient(top, #FFFFFF, #EEEEEE 1px, #FFFFFF 25px);
	box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;/*0.1 actually means 10 %*/
	-moz-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;
	-webkit-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;
	}

#title{position:absolute;left:-5px;top:-10px;
height:70px;width:1371px;
background-color:#425a9c;}

.faceicon{position:absolute;left:180px;top:px;}
.userpic{position:absolute;left:600px;top:-5px;}
.messagename{position:absolute;left:600px;top:10px;color:white;font-family:arail; font-size:20px;}


#post{position:relative;left:800px;top:10px;height:40px;width:200px;}
#filepic{position:relative;left:800px;top:20px;width:200px;}
#postbutton{position:relative;left:590px;top:52px;}
#postbutton{
	width: auto;
	height:30px;
	background: #617798;
	font-size: 14px;
	color: #FFFFFF;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	cursor:pointer;
	}
	#filecomment{width:200px;}
	#comment{width:500px;}
	
	
	#updateform{color:black;font-family:Algerian;font-size:25px;position:relative;top:30px;left:20px;}
	#updatepost{
	padding: 8px;
	
	border: solid 1px #E5E5E5;
	font: bold 15px Algerian;
	color:red;
	position:relative;top:52px;left:20px;
	width: 300px;
	height:40px;
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
	#radio1{position:relative;top:72px;left:40px;font-size:15px;color:green;font-family:Algerian;}
#radio2{position:relative;top:72px;left:80px;font-size:15px;color:green;font-family:Algerian;}

	
#radio{width:20px;}	

#updatebutton {
	width: auto;
	background: #617798;
	font-size: 20px;
	color: #FFFFFF;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	cursor:pointer;
	}
	
#backbutton{
	width: auto;
	background: #617798;
	font-size: 20px;
	color: #FFFFFF;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	cursor:pointer;
	}
	
	#updatebutton{position:relative;top:80px;left:-50px;}
#backbutton{position:relative;top:50px;left:100px;}

#select{position:relative;top:70px;left:0px;color:black;font-size:18px;}
</style>
</head>
<body>

<div id="title"></div>
<ul id="menu">
<li class="faceicon"><img src="faceicon.png"width="50px"height="50px"></li>
  <li class="menu-right"><a href="#"><font size="6" color="#32477a">More</font></a>
    <div class="menu-container-1 align-center"><!-- External social links - START  -->
      
      <div class="column-1">
        <ul class="l1">
          <li><a href="logout.php">logout</a></li>
          <li><a href="edit.php">edit profile</a></li>
					</ul>
				  </div>
				</div>
			  </li>
			 <li class="userpic"><img src="<?php echo getfield0('filename');?>" width="50px" height="50px"></li>
			  <li class="messagename">Welcome <font size="7"><?php echo getfield0('fullname');?></font></li>
</ul>
<div id="page">
					<?php if(isset($_SESSION['username'])){if(getfield0('type')=='admin'){?>
																<div id="postform">
																<form action="post.php" method="POST" enctype="multipart/form-data">
																<input type="text" name="post" id="post" placeholder="Post text!!!"><br>
																<input type="file" name="file" id="filepic">
																<input type="submit" value="post here" id="postbutton">
																</form>
																<?php
														}?>
					<div id="remain">
											<?php
											for($i=getfield1(1,'posti')+2;$i<getfield1(1,'postf')+2;$i++){
																		 $query="SELECT * FROM `post` WHERE `pid`='$i'";
																		$query_run=mysql_query($query);
																				if(mysql_num_rows($query_run)){
																		  $filename=getfield1($i,'filename');
																		 
																		  echo $a=getfield2($i);
																		  if($filename!="none")
																		  echo '<img  src="'.$filename.'" width="500px" height="250px">';
																		 
																		 if($_SESSION['username']==getfield1($i,'username')) {?>
																		 <form action="delete.php" method="POST">
																		 <input type="hidden" name="hiden" value="<?php echo $i;?>">
																		  <input type="submit" value="" id="delete"></form>
																		  
																		<div id="trigger">
																		<a href="#" rel="popuprel" class="popup">update</a>
																		</div>
																		<div class="popupbox" id="popuprel">
																		<div id="intabdiv">
																					  <h2 id="updateform">updateform</h2>
																							<form method="POST" action="update.php">
																							<input type="text" name="post" id="updatepost" placeholder="update post!!!">
																							<input type="hidden" name="hide" value="<?php echo $i;?>">
																							<p id="select">select whether u wanna DLT COMMENT or not,of POST</p>
																							<div id="radio1"><input  id="radio"type="radio" name="del" value="yes">yes</div>
																							<div id="radio2"><input id="radio"type="radio" name="del" value="no">no</div>
																							<input type="submit" value="update" id="updatebutton">
																							
																							</form>
																							<form action="login_success2.php">
																							<input type="submit" value="back" id="backbutton">
																							</form>
																					   
																					 
																				  </div>
																		</div>
																		  
																		  
																		 <?php
																		 }
																		 getfield3($i);
																		   
																		 
																		?>

																		<form action="login_success2.php" method="POST" enctype="multipart/form-data">
																		<input type="text" name="comment"placeholder="comment text" id="comment">
																		<br>
																		<input type="file" name="file" id="filecomment">
																		<input type="hidden" name="hide" value="<?php echo $i;?>">
																		<input type="submit" value="comment">
																		<?php if(isset($_POST['comment'])){
																				if(!empty($_POST['comment'])){
																		   $id=$_POST['hide'];
																			$comment=$_POST['comment'];
																			$username=$_SESSION['username'];
																			$filename=getfield0('filename');
																			$name=$_FILES['file']['name'];
																			 $tmp_name=$_FILES['file']['tmp_name'];
																				 $size=$_FILES['file']['size'];
																				 $max_size=2097152;
																				 if($name!=""){
																				$location='uploads/';
																						$commentpic=$location.$username.$name;
																						(move_uploaded_file($tmp_name,$commentpic));
																						}
																				else $commentpic="none";
																			$query="INSERT INTO `comment`  VALUES('','".mysql_real_escape_string($id)."','".mysql_real_escape_string($username)."','".mysql_real_escape_string($comment)."','".mysql_real_escape_string($filename)."','".mysql_real_escape_string($commentpic)."')";
																			if($query_run=mysql_query($query)){
																					  $f=1;break;} else echo "inserting problem";
																					  
																			}else echo "<script type=\"text/javascript\">"."window.alert('please fill text filed');"."</script>"; }
																		 ?>
																		</form>
																		</br>
																		</br>
																		<?php
																		}else echo "";}
											if($f==1)
											{
											  header('Location:login_success2.php');
											  }}
											?>
											</div>
</div>
</div>
</body>
</html>