<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sibejoo Komik</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/fonts.css">
    <link rel="stylesheet" type="text/css" href="fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" type="text/css" href="fonts/pe-icon-7-stroke/css/helper.css">

	<script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="js/masonry.pkgd.min.js"></script>
    <script type="text/javascript">
	
	
	$(document).ready(function(e) {
        var $container = $("#gallery-container");
		
		$container.masonry({
			columnwidth : "#gallery-sizer",
			itemSelector : ".gallery-item",
			gutter : 30
		});
		
		var msnry = $container.data('masonry');
		$container.masonry('bindResize');
		
    });
	
	
	</script>
    
</head>

<body>

<div id="main-hoverbar">
	<header>
	<h1>Sibejoo</h1>
	</header>
</div>

<div id="main-container">
	
    <div id="greeting-container">
    	<h2>Welcome!</h2>
        <p>We are Sibejoo. We Care. We Share</p>
    </div>

	<h2>What's New</h2>
    <div id="gallery-container">
    	<div id="gallery-sizer"></div>
        <div class="gallery-item">
        	<img src="img/food-h-c-300-420-9.jpg" />
            <div class="gallery-item-title">Something</div>
            <div class="gallery-item-action">
            	<a href="#"><span class="pe-7s-exapnd2 pe-va pe-border"></span></a>
            </div>
        </div>
        <div class="gallery-item">
        	<img src="img/food-q-c-300-200-2.jpg" />
            <div class="gallery-item-title">Something</div>
            <div class="gallery-item-action">
            	<a href="#"><span class="pe-7s-exapnd2 pe-va pe-border"></span></a>
                <a href="#"><span class="pe-7s-comment pe-va pe-border"></span> </a>
            </div>
        </div>
        <div class="gallery-item">
        	<img src="img/food-q-c-300-300-10.jpg" />
        	<div class="gallery-item-title">Something</div>
            <div class="gallery-item-action">
            	<a href="#"><span class="pe-7s-exapnd2 pe-va pe-border"></span></a>
                <a href="#"><span class="pe-7s-comment pe-va pe-border"></span> </a>
            </div>
        </div>
        <div class="gallery-item w2">
        	<img src="img/nature-q-c-620-300-2.jpg" />
            <div class="gallery-item-title">Something</div>
            <div class="gallery-item-action">
            	<a href="#"><span class="pe-7s-exapnd2 pe-va pe-border"></span></a>
                <a href="#"><span class="pe-7s-comment pe-va pe-border"></span> </a>
            </div>
        </div>
        <div class="gallery-item">
        	<img src="img/food-h-c-300-420-9.jpg" />
        	<div class="gallery-item-title">Something</div>
            <div class="gallery-item-action">
            	<a href="#"><span class="pe-7s-exapnd2 pe-va pe-border"></span></a>
                <a href="#"><span class="pe-7s-comment pe-va pe-border"></span> </a>
            </div>
        </div>
        <div class="gallery-item">
        	<img src="img/food-q-c-300-300-10.jpg" />
        	<div class="gallery-item-title">Something</div>
            <ul class="gallery-item-action">
            	<a href="#"><span class="pe-7s-exapnd2 pe-va pe-border"></span></a>
                <a href="#"><span class="pe-7s-comment pe-va pe-border"></span> </a>
            </ul>
        </div>
        <div class="gallery-item">
        	<img src="img/food-h-c-300-420-9.jpg" />
            <div class="gallery-item-title">Something</div>
        	<ul class="gallery-item-action">
            	<a href="#"><span class="pe-7s-exapnd2 pe-va pe-border"></span></a>
                <a href="#"><span class="pe-7s-comment pe-va pe-border"></span> </a>
            </ul>
        </div>
    </div>
 
</div>
    
</body>
</html>
