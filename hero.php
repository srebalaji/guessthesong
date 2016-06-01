<?php
session_start();
?>
<script src="jquery-1.10.2.js"></script>
<script src="jsrc/morptext/dist/morphext.min.js"></script>
<script src="jsrc/funny/jquery.funnyText.js"></script>

<script src="jsrc/TimeCircles/inc/TimeCircles.js"></script>
<script src="jsrc/master/jquery-letterfx.js"></script>
<script src="jsrc/master/jquery-letterfx.min.js"></script>
<script src="jsrc/master/tuxsudo.min.js"></script>

<link rel="stylesheet" href="jsrc/morptext/dist/morphext.css">
<link rel="stylesheet" href="jsrc/master/jquery-letterfx.css">
<link rel="stylesheet" href="jsrc/master/jquery-letterfx.min.css">
<link rel="stylesheet" href="jsrc/TimeCircles/inc/TimeCircles.css">
<link rel="stylesheet" href="jsrc/morptext/dist/animate.css">
<link rel="stylesheet" href="jsrc/funny/jquery.funnyText.css">


<link rel="stylesheet" href="style1.css">

<link rel="stylesheet" href="Messi-master/messi.min.css" />
<link rel="stylesheet" href="Messi-master/messi.min.css" />
<script src="howler.js"></script>
<script src="howler.min.js"></script>

<script src="Messi-master/messi.min.js"></script> 

<script src="http://connect.facebook.net/en_US/all.js" type="text/javascript" charset="utf-8"></script>

<?php
include('db.php');

if(isset($_SESSION['u_id']))
{
$fid=$_SESSION['u_id'];
$sql="select isf from scores where fb_id='$fid'";
$pree=$conn->prepare($sql);
$pree->execute();
foreach($pree->fetchAll() as $row)
 {
  $isf=$row['isf'];
 }
if($isf=='n')
{
echo 'you have to login via facebook to access this section';
die();
}
}
else
{
echo 'you have to login via facebook to access this section';
die();
}

if(isset($_GET['c']))
{
$ch=$_GET['c'];

// aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
?>
<script>
var ch="<?php echo $ch; ?>";

var counts=1,total=0;
 $(document).ready(function()
 {


$("#astart").css("display","none");
start_func();


$("#astart").click(function()
{
window.total=window.total+window.sso;
window.counts++;
if(window.counts==7){
if(window.total>=2200){

$("#load").html("<div id='total_score'>your score in current level is "+window.total+"</br></br></div><div id='start2' class='myButton'>Try this level for better score&nbsp;&nbsp;&nbsp;</div><div id='save' class='myButton' >Go To Next Level</div>");

start_func();save();
}
else
{
$("#load").html("<div id='total_score'>your total score is "+window.total+"</br><span style='font-size:1em'>Sorry!! you need at least 2200 points</span></br></div><div id='start2' class='myButton'>Try again to get to the next level</div>");
start_func();
}

$("#astart").css("display","none"); 
}
else
{
$("#load").load("core2.php?now="+ch);
 $("#start").css("display","none");
 $("#astart").css("display","none");
 }
 

});


});

function start_func()
{

$("#start,#start2").click(function()
{

$("#save").css("display","none");
window.counts=1;window.total=0;
$("#load").load("core2.php?now="+ch);
 $("#start,#start2").css("display","none");
});
}

function save()
{

$("#save").click(function()
{

$.ajax({url:"gands2.php?top="+ch,
type:"POST",
data:{score: window.total}
}).done( function(data){
window.counts=1;window.total=0;
$("#gands").html(data);
$("#load").load("core2.php?now="+ch);
$("#start2,#save").css("display","none");

});
});
}
</script>
<?php
if(isset($_SESSION['u_id']) )
{
$q=$_SESSION['u_id'];
$sql8="select h_level from scores where fb_id='$q' and isf='y'";
$pree=$conn->prepare($sql8);
$pree->execute();
foreach($pree->fetchAll() as $row)
  {

$level=$row['h_level'];
  }
  
  
}

?>
<div id="gands">
Level <span><? echo ($level)+1; ?></span>
</div>

<div id="start" class="myButton">Get the first song</div>

<div id="load"></div>

<div id="astart" class="myButton">Get the next song</div>
<?
}
else
{
?>

<center><div id="loads" style="color:white">
<h3>play for your hero songs and your scores will be added to your heroes in the leaderboards and to your profile</h3>
<h3>Select your hero to play his movie songs</h3>
<table cellpadding="2" cellspacing="15">
<tr>
<td><img src="original.gif" width="80" height="80"></td>
<td><a href="hero.php?c=vijay">Vijay</a></td>
</tr>

<tr>
<td><img src="original.gif" width="80" height="80"></td>
<td><a href="hero.php?c=ajith">Ajith</a></td>
</tr>

<tr>
<td><img src="original.gif" width="80" height="80"></td>
<td><a href="hero.php?c=surya">Surya</a></td>
</tr>

<tr>
<td><img src="original.gif" width="80" height="80"></td>
<td><a href="hero.php?c=Kamala_kasan">Kamala Hasan</a></td>
</tr>

<tr>
<td><img src="original.gif" width="80" height="80"></td>
<td><a href="hero.php?c=dhanush">Dhanush</a></td>
</tr>

</table>

</div></center>

<?php
}


?>








