<?php
require ('ind.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
</head>
<body>
	<style>
		img{
			width: 100%;
			height: 100%;
		}
		section{
					background:  url("bg.jpg") fixed;
background-size: cover;
		}
		.container{
	
			max-width:1024px;
			margin: 0 auto;
			padding: 0 70px;
		
		}
		.general{
			padding: 0 30px;
			width:100%;
			text-align: center;
		}
		.wordText{
			display: inline-block;
font-size:5rem;
font-weight: bold;
background: rgba(0, 154, 209,0.6);
box-shadow: -4px 5px 2px rgba(0, 0,0, 0.3);

border:5px solid #007ba7;
border-radius: 50px;
padding: 10px 30px;
letter-spacing:2rem;
		}
		#word{
			
			margin: 5px auto;
		}
		.image{
			margin:0 30px; 
			border:1px solid #007ba7;
			border-radius: 8px;
			display: inline-block;


width: 200px;

			height: 200px;
			border-radius: 5px;
			box-shadow: -5px 8px 2px rgba(0, 0, 0, 0.5);
		}
		.unvisible{
			display: none;
		}
		img.checked{
		border:2px solid #000;
		border-radius: 5px;
			box-shadow: 0px 4px 0px rgba(0, 0, 0, 0.6);
		}
		.gifka{
			position: absolute;
			width:300px;
			height: 300px;
			top: 50%;
			left:50%;
			margin-top: -150px;
			margin-left:-150px;
			
		}
		.moneydraggable{
width:100px;
			height: 100px;
			background: no-repeat url('money.jpeg');
			background-size: cover;
			border:1px solid transparent;
border-radius: 50%;
margin:0 auto;
		}
		.draggable{
			width:60px;
			height: 60px;
			background: no-repeat url('money.jpeg');
			background-size: cover;
			border:1px solid transparent;
border-radius: 50%;
display: inline-block;
		
		}
		.hederMarks{
position:absolute;
top:5px;
left:5px;
		}
.marks{

width:150px;
height: 110px;

background: no-repeat url('save.jpg');
			background-size: cover;


}
.textMarks{
margin-top: 15px;
text-align: center;
font-size: 2rem;
font-weight:bold; 


}
.containerMarks{
	width: 50px;
	position:absolute;
	left: 5px;
	top: 180px;
}
.menu{
	text-align: right;
}


a{
	margin: 0 20px;
	text-decoration: none;
}
a:hover{
	text-decoration: underline;
	font-size: 1.1rem;
	color: #000;

}
.activeLink{
	font-size: 1.3rem;
	font-weight:bold;
	color: #007ba7;
}

	</style>

			<div class ="menu">
			<a class="<?php echo ($_GET['level']==='two')?'activeLink':'';?>" href="?level=two">уровень 2</a>
			<a class="<?php echo ($_GET['level']==='one')?'activeLink':'';?>" href="?level=one">уровень 1</a>
		</div>
			


<section class="content">

	<div class="hederMarks"><div class="marks droppable"></div><p class="textMarks">0</p></div>
	<div class="containerMarks"></div>
	<input id = "hiddenNumber" type="hidden" value="<?php echo (isset($_POST['number']))?$_POST['number']:0;?>">
<div class ="container">

	<?= $content;?>
	

</div>
<div>
	<audio id="audioSuccess">
      <source src="Success.ogg" type="audio/ogg">
      <source src="Success.mp3" type="audio/mpeg">
    </audio>
    <audio id="audioError">
      <source src="Error.ogg" type="audio/ogg">
      <source src="Error.mp3" type="audio/mpeg">
    </audio>
</div>
<div class="gifka">
<img class ="gif success unvisible" src="success.gif">
<img class ="gif error unvisible" src="error.gif">
</div>


</section>
<p class="count unvisible"><?=$count;?></p>
<script type="text/javascript" src ="jquery-3.5.1.min.js"></script>

<script type="text/javascript" src ="jquery-ui-1.12.1/jquery-ui.min.js"></script>
	<script>
				let playerSuccess = document.querySelector('#audioSuccess');



				let playerError = document.querySelector('#audioError');
		let hiddenNumber = document.querySelector('#hiddenNumber');
let count = document.querySelector('.count');
let countValue = Number(count.innerHTML);
	let container = document.querySelector('.container');
	let gifSuccess = document.querySelector('.gif.success');
	let gifError = document.querySelector('.gif.error');
	let containerMarks = document.querySelector('.containerMarks');
	let moneydraggable = document.querySelector('.moneydraggable');
	

	container.addEventListener('click', function(event){
		let value = event.target.dataset.status;
		event.target.classList.add('checked');
	

		if(value){
			//moneydraggable.classList.remove('unvisible');
			gifSuccess.classList.remove('unvisible');
			playerSuccess.play();
			
			setTimeout(function(){
			gifSuccess.classList.add('unvisible');
			playerSuccess.pause();
			//moneydraggable.classList.add('unvisible');

			},2000);

			var newDiv = document.createElement("div");
			
			containerMarks.appendChild(newDiv);
			newDiv.className = 'draggable';
			//$('.moneydraggable').css('display','inline-block');
			//			setTimeout(function(){
			//this.css('display','none');
			//},2000);
			let numb = Number($('.textMarks').html());
			       			++numb;
          					$('.textMarks').html(numb);
			 $( function() {
				$( ".draggable" ).draggable({
				cursor: "move",
				start: function() {
            		$('.draggable').animate({width:"50px",height:"50px"});
            	},
            		stop: function() {
         				$('.draggable').css("display","none");
           					
        				}
        
       
			});
			    $( ".droppable" ).droppable({
			      drop: function( event, ui ) {
			        //$( this ).css("background-color","red");
			        //$('.draggable').css("display","none");
			       
      				}
    			});
		});
			

		}else{
			gifError.classList.remove('unvisible');
			playerError.play();
			setTimeout(function(){
			gifError.classList.add('unvisible');
			playerError.pause();
			
			},2000);
		}
container.innerHTML = '';
let formdata = new FormData();
if(hiddenNumber.value < countValue){
hiddenNumber.value ++;	
}else{
hiddenNumber.value = 0;
}

formdata.append('number',hiddenNumber.value);

let prom = fetch('ind.php',{
	method:'POST',
	body: formdata
});
prom.then((resp)=>{
	return resp.text();
}).then((text)=>{
	setTimeout(function(){

container.innerHTML = text;
},2000);
	
});


	

	});
	

</script>
</body>
</html>

