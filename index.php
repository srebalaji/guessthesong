<html>
<head>
<title>Guess the songz</title>
<link rel="shortcut icon" href="favicon.ico" >
<script src="jquery-1.10.2.js"></script>
<script src="jsrc/morptext/dist/morphext.min.js"></script>
<script src="jsrc/funny/jquery.funnyText.js"></script>
<script src="jsrc/jquery.videoBG.js"></script>
<script src="jsrc/master/jquery-letterfx.js"></script>
<script src="jsrc/master/jquery-letterfx.min.js"></script>
<script src="jsrc/master/tuxsudo.min.js"></script>
<link rel="stylesheet" href="jsrc/morptext/dist/morphext.css">
<link rel="stylesheet" href="jsrc/master/jquery-letterfx.css">
<link rel="stylesheet" href="jsrc/master/jquery-letterfx.min.css">
<link rel="stylesheet" href="jsrc/morptext/dist/animate.css">
<link rel="stylesheet" href="jsrc/funny/jquery.funnyText.css">


<style>
@font-face {
    font-family: 'myfirstfont';
    src: url('MyriadPro-Light.otf');
}

body{

background: url(original.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  
  
}
#js-rotating
{
 color:white;
 position:relative;
 top:300px;
font-style: normal;
font-family: "myfirstfont","Myriad Set Pro","Lucida Grande","Helvetica Neue","Helvetica","Arial","Verdana","sans-serif";
font-size: 3.4375em;
font-weight: 200;
letter-spacing:-2px;
-webkit-font-smoothing: subpixel-antialiased;

}
#funnyT
{

font-family: "myfirstfont","Myriad Set Pro","Lucida Grande","Helvetica Neue","Helvetica","Arial","Verdana","sans-serif";
font-size:10px;
position:relative;
 top:300px;
font-style: normal;
font-family: "myfirstfont","Myriad Set Pro","Lucida Grande","Helvetica Neue","Helvetica","Arial","Verdana","sans-serif";
font-siz: 3.4375em;
font-weight: 200;
letter-spacing:-2px;
-webkit-font-smoothing: subpixel-antialiased;
}
#core{
font-family: "myfirstfont","Myriad Set Pro","Lucida Grande","Helvetica Neue","Helvetica","Arial","Verdana","sans-serif";
font-size:3em;
color:white;
width:650px;
text-align:justify;
letter-spacing:.25px;
position:absolute;
top:250px;
left:350px;

}
#but
{
font-family: "myfirstfont","Myriad Set Pro","Lucida Grande","Helvetica Neue","Helvetica","Arial","Verdana","sans-serif";
font-size:2em;

position:relative;
top:400px;
left:530px;


}


.myButton {
	background-color:#ffffff;
	-moz-border-radius:30px;
	-webkit-border-radius:30px;
	border-radius:30px;
	display:inline-block;
	cursor:pointer;
	color:#000000;
	font-family:arial;
	font-size:17px;
	padding:3px 42px;
	text-decoration:none;
	text-shadow:0px 1px 0px #2f6627;
}
.myButton:active {
	position:relative;
	top:1px;
}

</style>
<script>

$(document).ready(function(){
/*
$('body').videoBG({
position:"fixed",
		zIndex:-1,
		mp4:'Apple.mp4',
		poster:'original.gif',
		opacity:0.5
});
*/

$("#but").click(function(){
window.location.href="play.php";
});


$("#funnyT").css("display","none");
$("#core").css("display","none");
$("#but").css("display","none");
$("#js-rotating").Morphext({
    
    animation: "flipInY",
    
    separator: ",",
   
    speed: 1000
});





$(this).delay(2500).queue(function(){
$("#funnyT").css("display","inline");
$("#js-rotating").css("display","none");

$('#funnyT').funnyText({
        speed: 300,
        borderColor: 'white',
        activeColor: 'black',
        color: 'white',
        fontSize: '7em',
        direction: 'both'
    });
  
    $("#funnyT").animate({top:'100px'});
    $("#core").css("display","inline");
    $("#core").letterfx({"fx":"fall","words":true,"timing":100});

});
setTimeout(function(){
$("#but").css("display","inline");
$("#but").Morphext({
    
    animation: "lightSpeedIn",
    
    separator: ",",
   
    speed: 1000
});


},5000);



});


</script>
</head>
<body style="">
<!-- background: rgba(0,0,0,.6) -->
<center><span id="js-rotating">Guess The Song</span></center>
<center><div id="funnyT">Guess The Song</div></center>
<div id="core">Its time to check how good you are in listening songs...</br>Try to guess the song with just 15 sec snippet of it </div> 
<div id="but" class="myButton">Start</div>

</body>
</html>


