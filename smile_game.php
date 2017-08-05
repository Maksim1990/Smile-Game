<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style>
    body{background-color:#c3defe ;}
  #leftSide  {background-color:#D4FC65;
 border:1px solid #080808;
  margin-left: 40px;}
  #rightSide {background-color:#080 ;
  border:1px solid #080808;
  margin-left: 40px;}
</style>
<script>
    level=1;
    countDownDate = 11;
function timeMin(){
  countDownDate=countDownDate-1;
  
    return countDownDate;
}
function  generateFaces(){
	var counter=0;
        
	var numberOfFaces=0;
	var theLeftSide =document.getElementById("leftSide");
	var theRightSide =document.getElementById("rightSide");
	while(numberOfFaces<5){
	
	var pict=document.createElement("img");
	pict.src="http://home.cse.ust.hk/~rossiter/mooc/matching_game/smile.png";

	var x_position=Math.random()*400;
	x_position=Math.floor(x_position);
	var y_position=Math.random()*400;
	y_position=Math.floor(y_position);
    pict.style.left=x_position+"px";
	pict.style.top=y_position+"px";
	theLeftSide.appendChild(pict);

	numberOfFaces+=1;
	counter+=1;
	}
	var leftSideImages = theLeftSide.cloneNode(true);
	leftSideImages.removeChild(leftSideImages.lastChild);
		theRightSide.appendChild(leftSideImages);
		
	var theBody = document.getElementsByTagName("body")[0];
	theLeftSide.lastChild.onclick= function nextLevel(event){
       
        event.stopPropagation();
        numberOfFaces += 5;
        countDownDate = 11;
         clearInterval(x);
        generateFaces();
         level+=1;
         
}
theBody.onclick = function gameOver() {
    alert("Game Over!");
    alert("Your Score is  "+level);
    level=1;
    theBody.onclick = null;
    theLeftSide.lastChild.onclick = null;
    var answer=confirm('Start game again?');
   if(answer){
     numberOfFaces = 0;
     while (theLeftSide.hasChildNodes()) {
    theLeftSide.removeChild(theLeftSide.lastChild);
                            }
   while (theRightSide.hasChildNodes()) {
    theRightSide.removeChild(theRightSide.lastChild);
                            }
        generateFaces();
   }else{
       alert('Thank you for playing this game & see you soon!')
   }
} 


var x=setInterval(function() {
   current=timeMin();
   if(current > -1){
     document.getElementById("demo").innerHTML = current + "s ";
 }
   else {

        document.getElementById("demo").innerHTML = "EXPIRED";
        alert("Game Over!");
alert("Your Score is  "+level);
var restart=confirm('Start game again?');
if(restart){
countDownDate = 11;

generateFaces();
clearInterval(x);
}else{
    clearInterval(x);
     alert('Thank you for playing this game & see you soon!')
}
    }
}, 1000); 


}
</script>
<style>
div {position:absolute;
		width:500px;
		height:500px;}
img {position:absolute;}
#rightSide { left: 500px; 
            border-left: 1px solid black }
</style>
</head>

<body id="theBody" onLoad="generateFaces()">
<h2>Matching Game</h2>
<p>Click on the extra smiling face on the left.</p>
  <p id="demo"></p>
  <div id="leftSide"></div>

    <div id="rightSide"></div>
  
</body>
</html>
