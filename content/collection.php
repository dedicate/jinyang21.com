<div class='stage-full'>
	<div class='frame-content'>
		<div class='title'>
			SPRING SUMMER 2013 COLLECTION
		</div>
		<div class='content'>
			<div class='collection-gallery'>
				<ul class='gallery'>
					<li class='gallery-loading'>
						<div class='text'>
						Loading...
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<script>
var galleryFolder = '13aw';
var imagesToLoad = 20;
var currentImageLoadedIndex = 0;
var imageLoadPerpage = 5;
var moreImageToLoad = true;

$(document).ready(function() {
	$('.gallery-loading').css('opacity', 0.5);
	
	$(".collection-gallery").mCustomScrollbar({
		horizontalScroll:true,
		advanced:{
			autoExpandHorizontalScroll:true
		},
		callbacks:{
			onTotalScroll:function() {
				appendTextOnTotalScroll();
			},
			onTotalScrollOffset: 200
		}
	});
	
	for(var i = 1; i <= imageLoadPerpage; i++) {
		currentImageLoadedIndex++;
		var liTag = "<li>" + 
			"<a class='js-link' rel='lightbox[" + galleryFolder + "]' href='#' gallery='" + galleryFolder + "' pic='" + currentImageLoadedIndex + "'>" + 
			"<img src='/image/" + galleryFolder + "/" + currentImageLoadedIndex + ".jpg'>" + 
			"</a></li>";
		$(".collection-gallery ul.gallery .gallery-loading").before(liTag);
	}
	
	$(".collection-gallery .gallery img").load(function() {
		$(".collection-gallery").mCustomScrollbar("update");
	});
	
	function appendTextOnTotalScroll() {
		if(moreImageToLoad) {
			for(var i = 1; i <= imageLoadPerpage; i++) {
				currentImageLoadedIndex++;
				var liTag = "<li>" + 
				"<a class='js-link' rel='lightbox[" + galleryFolder + "]' href='#' gallery='" + galleryFolder + "' pic='" + currentImageLoadedIndex + "'>" + 
				"<img src='/image/" + galleryFolder + "/" + currentImageLoadedIndex + ".jpg'>" + 
				"</a></li>";
				$(".collection-gallery ul.gallery .gallery-loading").before(liTag);
				if(currentImageLoadedIndex >= imagesToLoad) {
					moreImageToLoad = false;
					$(".collection-gallery ul.gallery .gallery-loading").remove();
					break;
				}
			}
			$(".collection-gallery .gallery img").load(function() {
				$(".collection-gallery").mCustomScrollbar("update");
			});
		}
	}
});
</script>
	