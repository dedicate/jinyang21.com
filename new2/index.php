<?php
	define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
	define('BASE_PATH', dirname(__FILE__));
	$url = $_SERVER["REQUEST_URI"];
	
	$includeContent = "";
	$selectedIndex = 1;
	switch($url) {
		case '/home.htm':
			$includeContent = BASE_PATH . '/content/home.php';
			$selectedIndex = 1;
			break;
		case '/branding.htm':
			$includeContent = BASE_PATH . '/content/branding.php';
			$selectedIndex = 2;
			break;
		case '/collection.htm':
			$includeContent = BASE_PATH . '/content/collection.php';
			$selectedIndex = 3;
			break;
		case '/location.htm':
			$includeContent = BASE_PATH . '/content/location.php';
			$selectedIndex = 4;
			break;
		case '/news.htm':
			$includeContent = BASE_PATH . '/content/news.php';
			$selectedIndex = 5;
			break;
	}
		
	
	if(IS_AJAX) {
		include $includeContent;
		exit(1);
	}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
<meta name="keywords" content="">
<meta name="description" content="">
<title></title>
<script type="text/javascript" src="/js/jquery.1.9.1.min.js"></script>
<script type="text/javascript" src="/js/underscore.1.4.4.min.js"></script>
<script type="text/javascript" src="/js/backbone.1.0.0.min.js"></script>

<script type="text/javascript" src="/js/pushState.js"></script></head>

<script type="text/javascript" src="/js/jquery.animate.color.min.js"></script>
<script type="text/javascript" src="/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="/js/jquery.imagesloaded.min.js"></script>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA25sVpx-7yjUigqlO85LIisycEHdUdTAE&sensor=false"></script>

<link href="/res/template.css" media="screen" rel="stylesheet" type="text/css">
<link href="/res/jquery.mCustomScrollbar.css" media="screen" rel="stylesheet" type="text/css">

<?php
	if($includeContent == "") {
?>
<script type="text/javascript" src="/js/intro.js"></script>
<link href="/res/intro.css" media="screen" rel="stylesheet" type="text/css">
<?php
	}
?>

<body>
<div class='loaderbar'><div class='fluid'></div></div>
<div class='bg-plates-holder centered'><div class='bg-plate init-hide'></div></div>

<?php
	if($includeContent == "") {
?>
<div class='intro-animate'>
	<div id='light'>
		<div class='light-object'></div>
		<div class='logo-gold-bg'><div class='logo-gold'></div></div>
	</div>
	<div id='card'>
		<div class='card-paper init-hide'>
			<div class='anim1 init-hide text-bg'></div>
			<div class='anim2 init-hide text-bg'></div>
			<div class='anim3 init-hide upper-dec text-bg'></div>
			<div class='anim4 init-hide'><a id='start' href='/home.htm'>INVITED</a></div>
			<div class='anim5 init-hide lower-dec text-bg'></div>
		</div>
		<div class='card-refl init-hide'></div>
	</div>
</div>
<?php
	}
?>
<div class='bg-wrapper centered'>
	<div id="body_head" class='init-hide'>
		<div class="body_head">
			<div class="logo"></div>
		
			<div class="navi-main">
				<div id='li-bg'></div>
				<ul>
					<li class="home">
						<a class="<?php echo $selectedIndex == 1 ? 'selected' : ''?>" href="/home.htm"><div class='t'>首页 <br /> <span class='en'>HOME</span></div></a>
					</li>
					<li class="story">
						<a class="<?php echo $selectedIndex == 2 ? 'selected' : ''?>" href="/branding.htm"><div class='t'>品牌故事 <br /> <span class='en'>BRANDING</span></div></a>
					</li>
					<li class="collection">
						<a class="<?php echo $selectedIndex == 3 ? 'selected' : ''?>" href="/collection.htm"><div class='t'>系列展示 <br /> <span class='en'>COLLECTION</span></div></a>
					</li>
					<li class="location">
						<a class="<?php echo $selectedIndex == 4 ? 'selected' : ''?>" href="/location.htm"><div class='t'>门店位置 <br /> <span class='en'>LOCATION</span></div></a>
					</li>
					<li class="news">
						<a class="<?php echo $selectedIndex == 5 ? 'selected' : ''?>" href="/news.htm"><div class='t'>JY21事件<br /> <span class='en'>JY21 NEWS</span></div></a>
					</li>
				</ul>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	
	<div class='body_main_frame init-hide'>
		<?php
			if(!IS_AJAX && $includeContent != "") {
				include $includeContent;
			}
		?>
	</div>
	
	<div id="body_tail" class='init-hide'>
		<div class="body_tail">2013 JY21 ALL RIGHTS RESERVED</div>
	</div>
</div>

</body>
</html>