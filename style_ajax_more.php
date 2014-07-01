<?php
include('server.php');


if(isset($_POST['comment']) &&is_numeric($_POST['comment']))
{
$lastmsg=$_POST['comment'];
$query="select * from `comment` where `id`>'$lastmsg' LIMIT 6";
$result = mysql_query($query);
while($row=mysql_fetch_array($result,MYSQL_ASSOC))
{ 
$msg_id=$row['id'];
$message=$row['comment'];
?>

<li> <?php echo $message; ?> </li>
<?php
}


?>
<?php
	
if( mysql_num_rows($result)==6){
   ?>
<div class="facebook_style" id="facebook_style"> <a id="<?php echo $message; ?>" href="#" class="load_more" >Show Older Posts <img src="arrow1.png" /></a> </div>
<?php
 }else {
    
    echo '  <div  id="facebook_style">
  <a  id="end" href="#" class="load_more" >No More Posts</a>
  </div>';
    
 }
}
?>
