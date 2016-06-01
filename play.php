<?php
include('db.php');
session_start();

if(isset($_SESSION['FBID']) && !empty($_SESSION['FBID']) )
{
   
  if(isset($_SESSION['u_id']) && isset($_SESSION['u_id']) )
  {
  $new=$_SESSION['FBID'];
  $old=$_SESSION['u_id'];
  $sql="update scores set fb_id='$new',isf='y' where fb_id='$old' on duplicate key update id=id";
  $pree=$conn->prepare($sql);
  $pree->execute();
  $_SESSION['u_id']=$_SESSION['FBID'];
 
  }
  else
  {
  $fid=$_SESSION['FBID'];
  $check="select * from scores where fb_id='$fid'";
  $pree=$conn->prepare($check);
  $pree->execute();
  $count=$pree->fetchAll();
  
  if(count($count)==0)
  {
  $sql="insert into scores values('','$fid','','','y')";
  $pree3=$conn->prepare($sql);
  $pree3->execute();
  $_SESSION['u_id']=$fid;
  }
  else
  {
  $_SESSION['u_id']=$_SESSION['FBID'];
  }
 
  }
  $sre=1;
}
else
{
$sre=2;

}

if(isset($_SESSION['u_id']) )
{
$q=$_SESSION['u_id'];
$sql8="select score,level from scores where fb_id='$q' and isf='y'";
$pree=$conn->prepare($sql8);
$pree->execute();
foreach($pree->fetchAll() as $row)
  {
$score=$row['score'];
$level=$row['level'];
  }
  
}
else
{
$score=0;
$level=0;
}

if($level<=4)
  {
  $imer=15;$n=5;$m=1;

  }
 else if($level<=9)
  {
  $imer=13;$n=10;$m=2;
  
  }
 else if($level<=19)
  {
  $imer=12;$n=20;$m=3;
 
  }
 else if($level<=24)
  {
  $imer=12;$n=25;$m=4;
  
  }
 else if($level<=29)
  {
  $imer=11;$n=30;$m=5;
  
  }
 else if($level<=39)
  {
  $imer=10;$n=40;$m=6;
  
  }
 else if($level<=59)
  {
  $imer=9;$n=60;$m=7;
  
  }
  else if($level<=99)
  {
  $imer=9;$n=100;$m=8;
  
  }
?>
<html>
<head>
<title>guess the songz</title>
<link rel="shortcut icon" href="favicon.ico" >
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






<style>
@font-face {
    font-family: 'myfirstfont';
    src: url('MyriadPro-Light.otf');
}

</style>
<script>
var cu_level="<?php echo ($level)+1; ?>";
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
$("#load").load("core.php?cu="+cu_level);
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
$("#load").load("core.php?cu="+cu_level);
 $("#start,#start2").css("display","none");
});
}

function save()
{

$("#save").click(function()
{

$.ajax({url:"gands.php",
type:"POST",
data:{score: window.total}
}).done( function(data){
window.counts=1;window.total=0;
$("#gands").html(data);
$("#load").load("core.php?cu="+cu_level);
$("#start2,#save").css("display","none");

});
});
}
function mt()
{
 $("#s_load").Morphext({
    
    animation: "lightSpeedIn",
    
    separator: ",",
   
    speed: 1000
});
}
</script>
</head>
<body>
<?php


//session_destroy();


if($sre==1)
{
  echo '<div style="color:white;position:absolute;left:90px;">Welcome  '.$_SESSION['FUSERNAME'].'</br><a href="logout.php">logout</a></div></br></br>';
}
if($sre==2)
{
echo '<a  href="fbconfig.php" ><img src="facebook_login.png" height="50" width="300"  alt="login via fb"></a>';
echo ' <div id="notice">Login via facebook to save your score </br> and to enter Leaderboards </div>';
}

if(isset($_SESSION['u_id']))
{

$check=$_SESSION['u_id'];
$sql="select isf from scores where fb_id='$check'";
$pree=$conn->prepare($sql);
$pree->execute();
foreach($pree->fetchAll() as $as)
{
$ss=$as['isf'];
}
if($ss=='n')
{
$sql8="delete from scores where fb_id='$check'";
  $pree=$conn->prepare($sql8);
  $pree->execute();
  session_unset();
}

}





?>

<div style="position:absolute;left:0px;top:0px;"><img src="beta.png" width="100" height="100"/></div> 

<div id="mile">
<span style="font-weight:bold">Milestone <span id="mm"> <?php echo $m; ?> </span> : &nbsp;</span> you got <span id="tt"> <? echo $imer; ?></span> sec for each song and make it to 2250 to enter next level</br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-weight:bold"> Next milestone in level <span id="nn"> <? echo $n; ?> </span></span>
</div>
<div id="gands">Score <span><? echo $score; ?></span> <span id="space"></span>
Level <span><? echo ($level)+1; ?></span>
</div>

<div id="start" class="myButton">Get the first song</div>

<div id="load"></div>

<div id="astart" class="myButton">Get the next song</div>

<div id="fb-root"></div>
<script>

</script>
<script>

FB.init({
    appId: '335516619949277', 
    status: true, 
    cookie: true,
    xfbml: true
});

function fb()
{
FB.ui(
   {
     method: 'feed',
     name: 'guess the song',
     link: 'http://guessthesongz.com',
    
     caption: 'try to guess the song with just 15 sec snippet of it',
     description: 'Hey !! do you think can you guess a song in 15 sec...if yes check out this website',
     message: 'check this out !!!'
   },
   function(response) {
     if (response && response.post_id) {
       alert('Post was published.');
     } else {
       alert('Post was not published.');
     }
   }
 );
}
</script>
<!-- <div class="fb-like" style="position:absolute;top:30px;left:600px;" data-href="https://apps.facebook.com/335516619949277" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>  -->
 
<div id="bfb" onclick="fb()" style="position:absolute;top:370px;left:600px;color:white">Share in FB</div>
</body>
</html>

