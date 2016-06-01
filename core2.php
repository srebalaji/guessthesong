
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
function __construct($now)
{

include('db.php');

$sql="select * from ".$now." where id= :randid";
$this->pree=$conn->prepare($sql);

}

function main()
{
 
  
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
  echo '<div class="timer" style="width:250px;height:250px" data-timer="15"></div>';
  echo '<div id="options" style="display:none" >
  <div id="one" style="font-size:2em" class="myButton2">'. $one.'</div></br>
  <div id="two" style="font-size:2em" class="myButton2">'. $two.'</div></br>
  <div id="three" style="font-size:2em" class="myButton2">'. $three.'</div></br>
  <div id="four" style="font-size:2em" class="myButton2">'. $four.'</div></br>
 </div>';
  ?>
  
<script>
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
    "total_duration": 15,
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

if(isset($_GET['now']))
{
//$now=$_GET['now'];
}
$now="song_list";
$obj=new core($now);
$obj->main();

?>

