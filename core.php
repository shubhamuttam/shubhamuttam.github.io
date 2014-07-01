<?php
  ob_start();
 session_start();
 include 'server.php';
$current_file=$_SERVER['SCRIPT_NAME'];

if(isset($_SERVER['HTTP_REFERER'])&&!empty($_SERVER['HTTP_REFERER'])){
$http_referer=$_SERVER['HTTP_REFERER'];
}


function getfield0($field){
$query="SELECT `$field` FROM `users` WHERE `username`='".$_SESSION['username']."' ";
if($query_run=mysql_query($query)){
   return mysql_result($query_run,0,$field);}
}


function getfield4($username,$field){
$query="SELECT `$field` FROM `users` WHERE `username`='$username' ";
if($query_run=mysql_query($query)){
   return mysql_result($query_run,0,$field);}
}

function getfield1($id,$field){
$query="SELECT `$field` FROM `post` WHERE `pid`='$id'";
if($query_run=mysql_query($query)){
   return mysql_result($query_run,0,$field);}else echo'getfield1';
}


function getfield2($id){
$query="SELECT * FROM `post` WHERE `pid`='$id'";
if($result=mysql_query($query)){
while($row=mysql_fetch_array($result)){
echo '<font color="#395a9c" size="4">'.$row[2].'</font>'.'<font color="grey"size="2">'.' by '.'</font>'.'<font color="#395a9c" size="5">'.'<strong>'.$row[1].'</strong>'.'</font>';
echo nl2br("\n");

   }}else echo 'getfield2';
}

function getfield3($id){?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
<script type="text/javascript" src="jquery-1.3.2.min.js"></script>
<script type="text/javascript">
$(function() {



$('.load_more').live("click",function() {


var last_msg_id = $(this).attr("id");



if(last_msg_id!='end'){
    
  $.ajax({
type: "POST",
url: "style_ajax_more.php",
data: "comment="+ last_msg_id, 
beforeSend:  function() {
$('a.load_more').append('<img src="style_loader.gif" />');
  
},
success: function(html){
    $(".style").remove();
$("ol#updates").append(html);


}
});
  
}


 
 
 



return false;


});
});

</script>
<style>
body {
	font-family:Arial, 'Helvetica', sans-serif;
	color:#000;
	font-size:15px;
}


a {
color:#2276BB;
text-decoration:none;
}

* {
	margin:0px;
	padding:0px
}
ol.row {
	list-style:none
}
ol.row li {
	position:relative;
	border-bottom:1px solid #EEEEEE;
	padding:8px;
}
ol.row li:hover {
	background-color:#F7F7F7;
}
ol.row li:first-child {
}
#container {
	margin-left:60px;
	width:580px
}

 img {
border : none ;
}





#style  {
border:1px solid #D8DFEA;
padding:10px 15px;
background-color:#EDEFF4;
}


#style a {
color:#3B5998;
cursor:pointer;
text-decoration:none;
font-family:"lucida grande",tahoma,verdana,arial,sans-serif;
font-size:11px;
text-align:left;
}




</style>
</head>
<body>
<div id='container'>
  <ol class="row" id="updates">
    <?php
$query="SELECT * FROM `comment` WHERE `pid`='$id' LIMIT 6";
$result = mysql_query($query);
while($row=mysql_fetch_array($result,MYSQL_ASSOC))
{
$msg_id=$row['id'];
$message=$row['comment'];
$pic=$row['filename'];
$commentpic=$row['commentpic'];
$user=$row['username'];
?>
    <li><img src="<?php echo $pic;?>" width="20px" height="20px"><?php if($commentpic!="none"){?><img src="<?php echo $commentpic;?>" width="100px" height="100px"><?php echo nl2br("\n");}?><?php echo '<font color="black"size="3">'." ".$message.'<font>';?><?php echo '<font color="grey"size="2">'.' by '.$user.'</font>';?></li>
    <?php } ?>
  </ol>

  
  
  <div class="style" id="style">
  <a id="<?php echo $msg_id; ?>" href="#" class="load_more" >Show more Posts <img src="arrow1.png" /> </a>
  </div>
</div>
</body>
</html>
<?php
   }




/*
function comment($i,$pretext,$text){
   $text=$text+"/n"+$pretext;
   $query="UPDATE `post` SET `text` = '$text' WHERE `id` ='$i'";
if($query_run=mysql_query($query)){
  }else echo'fujojeojoj   awnfjhav ';
}

/*
function getfield2($id){
$query="SELECT `comment` FROM `post` WHERE `id`='".$id."' ";
if($result=mysql_query($query)){
while($row=mysql_fetch_array($result)){
printf("%s %s %s ",$row[1],$row[3],$row[4]);
echo nl2br("\n");

   }}else echo 'fuck';
}
/*
 function getfield3($field,$tid){
$query="SELECT `$field` FROM `record` WHERE `tid`='$tid' ";
if($query_run=mysql_query($query)){
   return mysql_result($query_run,0,$field);}
}
*/
?> 