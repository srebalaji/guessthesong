<?php
session_start();
include('db.php');


if(isset($_POST['score']) && !empty($_POST['score']) )
{
$score=$_POST['score'];
}

if(isset($_SESSION['u_id']) && !empty($_SESSION['u_id']) )
{
$id=$_SESSION['u_id'];
$nscore=$score;
$sql2="update scores set score=score+'$nscore' ,level=level+1 where fb_id='$id'";
$pree=$conn->prepare($sql2);
$pree->execute();

$sql3="select score,level from scores where fb_id='$id'";
$pree2=$conn->prepare($sql3);
$pree2->execute();
foreach($pree2->fetchAll() as $row)
  {
  $uscore=$row['score'];
  $ulevel=$row['level'];
  }
echo '<div id="gands2">Score <span>'.$uscore.'</span> <span id="space"></span>
Level <span>'.($ulevel+1).'</span></div>';

}

else
{
$nscore=$score;
$nlevel="2";
$uniqid=uniqid('',true);
$sql="insert into scores values('','$uniqid','$score','1','n')";
$pree=$conn->prepare($sql);
$pree->execute();
$_SESSION['u_id']=$uniqid;
echo '<div id="gands2">Score <span>'.$nscore.'</span> <span id="space"></span>
Level <span>'.$nlevel.'</span></div>';
}




?>