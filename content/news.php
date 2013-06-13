<?php 
$m = new MongoClient('mongodb://craftgavin:whothirstformagic?@419.bee.fucms.com');
$db = $m->cms_419;
$articleCollection = $db->article;
?>

<div class='stage'>
	<div class='frame-content'>
		<div class='title'>
			JY21 NEWS
		</div>
		
		<div class='content news'>
			<div class='news-list m-scroller'><ul>
				<li class='month'>May</li>
			<?php
				$cursor = $articleCollection->find();
				foreach ($cursor as $doc) {
			?>
				<li class='item'>
					<a href='/news/<?php echo $doc['_id']?>'>
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
		</div>
	</div>
</div>

<script type='text/javascript'>
$(document).ready(function() {
	$(".m-scroller").mCustomScrollbar();
	$(".next").css('opacity', 0);
	$(".item").mouseover(function() {
		$(this).find('.next').stop().animate({'left': '770px', 'opacity': 0.6});
	}).mouseout(function() {
		$(this).find('.next').stop().animate({'left': '800px', 'opacity': 0});
	});
});
</script>