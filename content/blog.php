<?php 
$m = new MongoClient('mongodb://craftgavin:whothirstformagic?@419.bee.fucms.com');
$db = $m->cms_419;
$articleCollection = $db->article;

$blog = $articleCollection->findOne(array('_id' => new MongoId($blogId)));
$timestamp = $blog['publishDate']->sec;

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
		
		<div class='content blog'>
<?php }?>

			<div class='blog m-scroller'>
				<a href='/news.htm' class='inner-content-refresh back'>返回列表</a>
				<div class='label'><?php echo $blog['label']?></div>
				<div class='date'><?php echo date("M d", $timestamp) ?></div>
				<div class='fulltext'><?php echo $blog['fulltext']?></div>
			</div>
			<script type='text/javascript'>
			$(document).ready(function() {
				$(".m-scroller").mCustomScrollbar();
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