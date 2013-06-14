<?php 
$m = new MongoClient('mongodb://craftgavin:whothirstformagic?@419.bee.fucms.com');
$db = $m->cms_419;
$articleCollection = $db->article;
if(isset($_GET['newsId'])) {
	$newsId = $_GET['newsId'];
} else {
	$newsId = "";
}
if(isset($_GET['getRefresh'])) {
	$getRefresh = true;
} else {
	$getRefresh = false;
}
?>

<?php if(!$getRefresh) {?>
<div class='stage'>
	<div class='frame-content'>
		<div class='title'>
			JY21 NEWS
		</div>
		
		<div class='content news'>
<?php }?>

			<div class='news-list m-scroller'><ul>
			<?php
				$cursor = $articleCollection->find();
				$cursor->sort(array('created' => -1));
				$currentMonth = "";
				$blogMonth = "";
				foreach ($cursor as $doc) {
					$str = $doc['created'];
					if (($timestamp = strtotime($str)) !== false) {
						$blogMonth = date("M", $timestamp);
					}
					if($blogMonth != $currentMonth) {
						$currentMonth = $blogMonth;
			?>
				<li class='month'><?php echo $currentMonth ?></li>
			<?php
					}
			?>
				<li class='item'>
					<a href='/blog/<?php echo $doc['_id']?>' class='inner-content-refresh'>
						<img class='introicon' src='http://misc.fucms.com/public-misc/516246370194b7c469000017/<?php echo $doc['introicon'] ?>'/>
						<div class='date'><?php echo $doc['created'] ?></div>
						<div class='label'><?php echo $doc['label'] ?></div>
					</a>
					<div class='next'></div>
				</li>
			<?php
				}
			?>
			</ul></div>
			<script type='text/javascript'>
			$(document).ready(function() {
				$(".m-scroller").mCustomScrollbar();
				$(".next").css('opacity', 0);
				$(".item").mouseover(function() {
					$(this).find('.next').stop().animate({'left': '740px', 'opacity': 0.6});
					$(this).css('background-color', '#555');
				}).mouseout(function() {
					$(this).find('.next').stop().animate({'left': '800px', 'opacity': 0});
					$(this).css('background-color', '#222');
				});
				
				$('.inner-content-refresh').click(function() {
					window.innerContentRefresh = true;
				});
			});
			</script>
			
<?php if(!$getRefresh) {?>
		</div>
	</div>
</div>
<?php }?>