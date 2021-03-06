<?php
	date_default_timezone_set('UTC');
	include 'content/database.php';

	define('FILE_PATH', 'http://misc.fucms.com/dedicated/jy21');
	
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
		case '/join.htm':
			$includeContent = BASE_PATH . '/content/join.php';
			$selectedIndex = 1;
			break;
		case '/contact.htm':
			$includeContent = BASE_PATH . '/content/contact.php';
			$selectedIndex = 5;
			break;
		default:
			if(substr($url, 0, 5) == '/blog') {
				$includeContent = BASE_PATH . '/content/blog.php';
				$selectedIndex = 5;
				$blogId = substr($url, 6, 24);
				break;
			}
			if(substr($url, 0, 5) == '/news') {
				$includeContent = BASE_PATH . '/content/news.php';
				$selectedIndex = 5;
				break;
			}
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
<title>JY21</title>
<meta name="keywords" content="JY21女装">
<meta name="description" content="">
<meta http-equiv="Pragma" CONTENT="no-cache"> 
<meta http-equiv="Cache-Control" CONTENT="no-cache"> 
<meta http-equiv="Expires" CONTENT="0"> 
<link rel='shortcut icon' href='/favicon.ico' type='image/x-icon'>

<script type="text/javascript" src="/js/jquery.1.8.0.min.js"></script>
<script type="text/javascript" src="/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="/js/underscore.1.4.4.min.js"></script>
<script type="text/javascript" src="/js/backbone.1.0.0.min.js"></script>

<!--script type="text/javascript" src="/js/jquery.animate.color.min.js"></script -->
<script type="text/javascript" src="/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="/js/jquery.imagesloaded.min.js"></script>

<script type="text/javascript" src="/js/lightbox.js"></script>
<!-- script type="text/javascript" src="/js/jquery.chosen.min.js"></script -->
<script type="text/javascript" src="/js/cufon-yui-1.09i.js"></script>
<script type="text/javascript" src="/font/Embassy_500.font.js"></script>
<!-- script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA25sVpx-7yjUigqlO85LIisycEHdUdTAE&sensor=false"></script -->
<script type="text/javascript" src="/js/jquery-ui-1.10.3.custom.min.js"></script>
<script type="text/javascript" src="/js/pushState.js"></script>

<script src="/js/jquery.cycle.all.min.js" type="text/javascript" charset="utf-8"></script>
<script src="/js/jquery.maximage.min.js" type="text/javascript" charset="utf-8"></script>

<link href="/res/template.css" media="screen" rel="stylesheet" type="text/css">
<link href="/res/jquery.mCustomScrollbar.css" media="screen" rel="stylesheet" type="text/css">

<link href="/res/lightbox.css" media="screen" rel="stylesheet" type="text/css" />
<link href="/res/jquery.maximage.min.css" media="screen" rel="stylesheet" type="text/css" />
<!-- link href="/res/chosen.css" media="screen" rel="stylesheet" type="text/css" -->

<style type="text/css" media="screen">
			#maximage {
			    position:relative !important;
				display: none;
			}
		</style>

</head>




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
<div class='bg-plates-holder centered'>
	<div class='bg-plate-wrapper'>
		<div class='bg-plate init-hide'></div>
	</div>
</div>

<?php
	if($includeContent == "") {
?>
<div class='intro-animate centered'>
	<div id='light'>
		<div class='logo-bg'>
			<div class='logo-caption-shine'></div>
			<div class='logo-gold'></div>
		</div>
	</div>
	<div id='card'>
		<div class='card-paper init-hide'>
			<div class='anim1 init-hide text-bg'></div>
			<div class='anim2 init-hide'>Summer Collection 2015</div>
			<div class='anim3 init-hide upper-dec text-bg'></div>
			<div class='anim4 init-hide'><a id='start' style='display: none;' href='/home.htm'>Invited&nbsp;&nbsp;</a></div>
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
						<a class="<?php echo $selectedIndex == 4 ? 'selected' : ''?>" href="/location.htm"><div class='t'>门店位置 <br /> <span class='en'>STORE LOCATION</span></div></a>
					</li>
					<li class="news">
						<a class="<?php echo $selectedIndex == 5 ? 'selected' : ''?>" href="/contact.htm"><div class='t'>联系我们<br /> <span class='en'>CONTACT US</span></div></a>
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
		<div class="body_tail">
			<div class='jp-player'>
				<div id="jquery_jplayer_1"></div>
				<div id='jp-button' class='pause' data-status='play'></div>
			</div>
			<div class='left-links'>
				<a href='/join.htm'>加入我们</a>			
				<a target='_blank' class='out-link' href='http://e.weibo.com/JY21style'><img src='/res/weibo_logo_mini.png' style='height: 12px;' />&nbsp;官方微博</a>
				<a target='_blank' class='out-link' href='http://thebeautygroup.com'>The Beauty Group</a>
			</div>
			<div class='right-text'>
				2013 JY21 ALL RIGHTS RESERVED
			</div>
		</div>
	</div>
</div>
</body>

<script type="text/javascript" src="/js/jPlayer.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#jquery_jplayer_1").jPlayer({
		ready: function() {
			$(this).jPlayer("setMedia", {
				mp3:"http://misc.fucms.com/dedicated/jy21/cmar.mp3"
			}).jPlayer("play");
		},
		loop: true,
		swfPath: "/js/Jplayer.swf",
		supplied: "mp3",
	});
});

$('#jp-button').click(function() {
	if($(this).data('status') == 'play') {
		$("#jquery_jplayer_1").jPlayer("pause");
		$(this).data('status', 'pause');
		$(this).attr('class', 'play');
	} else {
		$("#jquery_jplayer_1").jPlayer("play");
		$(this).data('status', 'play');
		$(this).attr('class', 'pause');
	}
});
</script>
</html>