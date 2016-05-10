<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>javascript slide show</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
	<style>
	.slide-show{
		width:400px;
		margin: auto;
		height: 300px;
		overflow: hidden;
		position: relative;
	}
	.slider {
		padding: 0;
		width:2000px;
	}
	.slider li{
		list-style: none;
		width: 400px;
		height: 300px;
		float: left;
	}
	.slide-show li img{
		width:100%;
		height: 100%;
	}
	.arrow{
		position: absolute;
	    top: 16px;
	    background: rgba(34, 34, 34, 0.37);
	    height: 300px;
	    width: 50px;
	    color: rgba(255, 255, 255, 0.51);
	    justify-content: center;
	    align-items: center;
	    display: flex;
	    font-size: 50px;
	    cursor: pointer;
	}
	.arrow-right {
	    right:0px;
	}
	.dots {
	    height: 10px;
	    position: absolute;
	    bottom: 20px;
	    z-index: 100;
	    width: 100%;
	    display: flex;
	    justify-content: center;
	    align-items: center;
	}

	.dots > div {
	    width: 5px;
	    height: 5px;
	    float: left;
	    background: white;
	    border: 1px solid black;
	    border-radius: 100%;
	    margin: 10px;
	    cursor: pointer;
	}
	.dots .current {
	    box-shadow: 0 0 0px 3px black;
	}

	.dots .current:after {content: '';border: 1px solid white;width: 11px;height: 11px;display: block;border-radius: 100%;margin-left: -4px;margin-top: -4px;}

	.header {
	   	position: absolute;
	    top: 16px;
	    background: rgba(34, 34, 34, 0.37);
	    height: 50px;
	    width: 400px;
	    color: rgba(255, 255, 255, 0.51);
	    justify-content: center;
	    align-items: center;
	    display: flex;
	    font-size: 50px;
	    cursor: pointer;
	}

	.play-button {
		height: 25px;
		width: 50px;
		background-color: rgba(255, 0, 0, 0.6);
		border-radius: 5px;
		position: relative;
		margin-right: 5px;
	}

	.play-button:after {
		content: "";
		display: block;
		position: absolute;
		top: 4px;
		left: 18px;
		margin: 0 auto;
		border-style: solid;
		border-width: 9.5px 0px 9.5px 17px;
		border-color: transparent transparent transparent rgba(255, 255, 255, 1);
	}


.pause-button {
		position: relative;
		width: 50px;
		height: 25px;
		background-color: rgba(255, 0, 0, 0.6);
		border-radius: 5px;
		margin-left: 5px;

	}

.pause-button:before {
	width:5px;
	height: 15px;
	background: #fff;
	position: absolute;
	content: "";
	top: 6px;
	left: 17px;
}

	.pause-button:after {
    width:5px;
	height: 15px;
	background: #fff;
	position: absolute;
	content: "";
	top: 6px;
	right: 17px;
}
	</style>
	<script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.0-rc.2/jquery-ui.min.js"   integrity="sha256-55Jz3pBCF8z9jBO1qQ7cIf0L+neuPTD1u7Ytzrp2dqo="   crossorigin="anonymous"></script>
</head>
<body>
<div class="slide-show">

<div class="header">
	<div class="play-button"></div>
	<div class="pause-button"></div>
</div>
	<div class="arrow-left arrow">
		<i class="fa fa-caret-left"></i>
	</div>
	<div class="dots">
		<div class="dot current"></div>
		<div class="dot"></div>
		<div class="dot"></div>
		<div class="dot"></div>
		<div class="dot"></div>
	</div>
	<ul class="slider" id="slider">
		<li class="slide"><img src="http://www.dirtbikefix.com/images/dirt-bike-graphics.jpg" alt=""></li>
		<li class="slide"><img src="http://motorklx.com/wp-content/uploads/2015/10/gambar-motor-kawasaki-klx.jpg" alt=""></li>
		<li class="slide"><img src="http://www.advbikex.com/advbikexwp/wp-content/uploads/2012/11/Brutus-Dirt-Bike.jpg" alt=""></li>
		<li class="slide"><img src="http://farm5.static.flickr.com/4094/4872546699_0d7cff4f19.jpg" alt=""></li>
		<li class="slide"><img src="http://dirtbikemagazine.com/wp-content/uploads/2014/11/RON_1368web.jpg" alt=""></li>
	</ul>
	
	<div class="arrow-right arrow">
		<i class="fa fa-caret-right"></i>
	</div>
</div>

<script>

var container = $('.slide-show'),
	slider = container.find('.slider'),
	slides = slider.find('li'),
	slide = 1,
	sliderInterval;

start();
$('.arrow').on('click', function () {
	stop();
	if($(this).hasClass('arrow-left')){
		slideTo(slide -= 1);
	}else{
		slideTo();	
	}
	start();	
});
$('.dot').on('click', function() {
	stop();
	slideTo($(this).index());
	start();	
});
function start() {
	sliderInterval = setInterval(function() {
		slideTo();
	}, 3000);
}

function stop() {
	clearInterval(sliderInterval);
}


function slideTo(num) {
	if(num < 0)num = slides.length - 1;

	var slideNumber = typeof num !== 'undefined' ? num : slide;

	slider.stop();

	slider.animate({
		marginLeft : -container.width() * slideNumber
	}, 1000);


	$('.dot').removeClass('current').eq(slideNumber).addClass('current');


	slide = slideNumber + 1;
	if(slide >= slides.length)
		slide = 0;


}
</script>
</body>
</html>