<?php
session_start();
include('db.php');
if(isset($_POST['score']) && !empty($_POST['score']) )
{
$score=$_POST['score'];
}

if(isset($_SESSION['u_id']))
{
$id=$_SESSION['u_id'];
$nscore=$score;
$sql2="update scores set score=score+'$nscore',h_level=h_level+1 where fb_id='$id'";
$pree=$conn->prepare($sql2);
$pree->execute();

if(isset($_GET['top']))
{
$top=$_GET['top'];
}

$sql3="update hero_top set ".$top."=".$top."+'$nscore'";
$pree=$conn->prepare($sql3);
$pree->execute();


$sql4="select h_level from scores where fb_id='$id'";
$pree2=$conn->prepare($sql4);
$pree2->execute();
foreach($pree2->fetchAll() as $row)
  {
  
  $ulevel=$row['h_level'];
  }
echo '<div id="gands2">
Level <span>'.($ulevel+1).'</span></div>';

}

?>