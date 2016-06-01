<?php
include('db.php');
session_start();
/*
if(isset($_POST['request']) && !empty($_POST['request']) )
{
  if(isset($_SESSION['u_id']) )
  {
  
  $nid=$_SESSION['u_id'];
  $sql="select isf from scores where fb_id='$nid'";
  $pree=$conn->prepare($sql);
  $pree->execute();
  foreach($pree->fetchAll() as $re)
  {
  $one=$re['isf'];
  }
  if($one=="n")
  {
  $sql="delete from scores where fb_id='$nid'";
  $pree=$conn->prepare($sql);
  $pree->execute();
  session_destroy();
  echo "ono";
  
  }
  
  }
  
}
*/
session_destroy();
header("Location: play.php");
?>
<?php
/*
font-style: normal;
font-family: "Myriad Set Pro","Lucida Grande","Helvetica Neue","Helvetica","Arial","Verdana","sans-serif";
font-size: 3.4375em;
line-height: 1.0909;
font-weight: 200;

display: block;
font-size: 1.5em;m
*/

?>