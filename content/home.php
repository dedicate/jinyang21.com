<div id='home-bg'>
	<div id='maximage-holder' style='width: 100%; height: 100%;'>
		<div id="maximage" style='z-index: 99;'>
			<img src="<?php echo FILE_PATH?>/h/1.jpg" alt="" />
			<img src="<?php echo FILE_PATH?>/h/2.jpg" alt="" />
			<img src="<?php echo FILE_PATH?>/h/3.jpg" alt="" />
			<img src="<?php echo FILE_PATH?>/h/4.jpg" alt="" />
			<img src="<?php echo FILE_PATH?>/h/5.jpg" alt="" />
		</div>
	</div>
</div>

<script type="text/javascript" charset="utf-8">
	$(function() {
		jQuery('#maximage').maximage({
			cssBackgroundSize: false, // We don't want to use background-size:cover for our custom size
			backgroundSize: function( $item ){
				var verticalOffset = 0, // Top offset + Bottom offset
					horizontalOffset = 0; // Left offset + Right offset
	
				if($.Window.data('w') / $.Window.data('h') < $item.data('ar')) { // Image size based on height
					$item
						.height($.Window.data('h') - verticalOffset)
						.width((($.Window.data('h') - verticalOffset) * $item.data('ar')).toFixed(0));
				} else { // Image size based on width
					$item
						.height((($.Window.data('w') - horizontalOffset) / $item.data('ar')).toFixed(0))
						.width($.Window.data('w') - horizontalOffset);
				}
			},
			onImagesLoaded: function(){
				jQuery('#maximage').fadeIn();
			}
		});
	});
</script>