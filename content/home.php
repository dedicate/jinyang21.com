<div id='home-bg'>
	<div id="slide">
		<div class="slider">
			<ul class="items">
				<li>
				<li><img src="/home/bg-1920-1.jpg" alt="" /></li>
				<li><img src="/home/bg-1920-2.jpg" alt="" /></li>
				</li>
			</ul>
		</div>
	</div>
</div>

<script>
	//setHomeImg();
	$(document).ready(function(){
		setTimeout(function() {
			$('.slider')._TMS({
				show:1,
				pauseOnHover:false,
				prevBu:false,
				nextBu:false,
				playBu:false,
				duration:9000,
				preset:'zoomer',
				pagination:true,
				pagNums:false,
				slideshow:7000,
				numStatus:false,
				banners:false,
				waitBannerAnimation:false,
				progressBar:false
			})
		}, 500);
	});
</script>