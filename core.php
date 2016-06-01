
<?php

?>
<script>
var counter=0,interval=0,sound=0,sso=0;

$("#s_load").Morphext({
    
    animation: "rubberBand",
    
    separator: ",",
   
    speed: 3000
});

</script>



<div id="s_load">
Just a sec,Almost done,taa daaaa...
</div>


<?php
class core
{
public $round=0;
public $score=0;
public $pree=0;
public $timer=0;
public $qw=0;
public $m=0;
function __construct()
{
if(isset($_GET['cu']))
{
$cu_level=$_GET['cu'];
  if($cu_level<=4)
  {
  $this->timer=15;$this->qw=5;$this->m=1;
  
  }
 else if($cu_level<=9)
  {
  $this->timer=13;$this->qw=10;$this->m=2;
  
  }
 else if($cu_level<=19)
  {
  $this->timer=12;$this->qw=20;$this->m=3;
 
  }
 else if($cu_level<=24)
  {
  $this->timer=12;$this->qw=25;$this->m=4;
  
  }
 else if($cu_level<=29)
  {
  $this->timer=11;$this->qw=30;$this->m=5;
  
  }
 else if($cu_level<=39)
  {
  $this->timer=10;$this->qw=40;$this->m=6;
  
  }
 else if($cu_level<=59)
  {
  $this->timer=9;$this->qw=60;$this->m=7;
  
  }
  else if($cu_level<=99)
  {
  $this->timer=9;$this->qw=100;$this->m=8;
  
  }
}
include('db.php');

$sql="select * from song_list where id= :randid";
$this->pree=$conn->prepare($sql);

}

function main()
{
  
  echo '<script>var timer=Number("'.$this->timer.'");</script>';

  $random=rand(589,686);
  $this->pree->execute(array(':randid' => $random));
  foreach($this->pree->fetchAll() as $row)
  {
  $link=$row['link'];
  $one=$row['one'];
  $two=$row['two'];
  $three=$row['three'];
  $four=$row['four'];
  $ans=$row['ans'];
  }
  
  echo '<div id="count"></div>';
  echo '<div class="timer" style="width:250px;height:250px" data-timer='.$this->timer.'></div>';
  echo '<div id="options" style="display:none" >
  <div id="one" style="font-size:2em" class="myButton2">'. $one.'</div></br>
  <div id="two" style="font-size:2em" class="myButton2">'. $two.'</div></br>
  <div id="three" style="font-size:2em" class="myButton2">'. $three.'</div></br>
  <div id="four" style="font-size:2em" class="myButton2">'. $four.'</div></br>
 </div>';
  ?>
  
<script>
var tt="<?php echo $this->timer; ?>";
var nn="<?php echo $this->qw; ?>";
var mm="<? echo $this->m; ?>";
$("#tt").html(tt);
$("#nn").html(nn);
$("#mm").html(mm);
var link="<?php echo $link; ?>";
alert(link);
window.sound=new Howl({
urls:[link],
onloaderror:function()
{

alert("unknown source");

},
onplay:function()
{

$("#s_load").css("display","none");
$("#options").css("display","inline");
//1.2 0.1
$(".timer").TimeCircles({
    "total_duration": timer,
    "animation": "smooth",
    "bg_width": 1.2,
    "fg_width": 0.1,
    "circle_bg_color": "#60686F",
    
    "time": {
        "Days": {
            
            "show": false
        },
        "Hours": {
            
            "show": false
        },
        "Minutes": {
            
            "show": false
        },
        "Seconds": {
            "text": "Seconds",
            "color": "#FF9999",
            "show": true
        }
    }
}); 


  window.counter = 15;
 
window.interval = setInterval(function() {
    counter--;
    if(window.counter==0)
    {
     clearInterval(window.interval);
     $(".timer").TimeCircles().stop();
      $("#options").off('click');
      window.sso=0;
    new Messi('your score is 0.', {title: 'Time\'s out!!!', titleClass: 'anim error', buttons: [{id: 0, label: 'Close', val: 'X'}]});
     $("#astart").css("display","inline");
    }
   
   
}, 1000);
} 
}).play();

</script>
<script>
var ans="<?php echo $ans; ?>";

$(document).ready(function() {
    $("#options").on('click',function(event) {
       var u_ans=event.target.id;
       
       $("#astart").css("display","inline");
       window.clearInterval(window.interval);
      window.sound.stop();
      $(".timer").TimeCircles().stop();
        if(String(ans)===String(u_ans))
        {
         window.sso=window.counter*50;
        
         new Messi('your score + '+window.sso, {title: 'Your answer is correct', titleClass: 'anim success', buttons: [{id: 0, label: 'Close', val: 'X'}]});
        }
        else
        {
        window.sso=0;
        new Messi('your score is 0.', {title: 'Your answer is wrong', titleClass: 'anim error', buttons: [{id: 0, label: 'Close', val: 'X'}]});
        }
        $("#options").off('click');
        
    });
});

</script>
<?php

}// main()

}// end of class

$obj=new core;
$obj->main();

?>

