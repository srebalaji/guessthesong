<?php
include('db.php');
if(isset($_SESSION['u_id']) )
{
$q=$_SESSION['u_id'];
$sql8="select score,level from scores where fb_id='$q'";
$pree=$conn->prepare($sql8);
$pree->execute();
foreach($pree->fetchAll() as $row)
{
$score=$row['score'];
$level=$row['level'];
}
echo '<script>window.alert("'.$score.'");</script>';

}
//D9401BD9-3CFD-4D5E-8785-A081F2BFE52E
?>