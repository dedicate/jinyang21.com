<ul id='home-bg'>
	<li class='bg-one'></li>
	<li class='bg-two'></li>
	<li class='bg-three'></li>
</ul>

<script type='text/javascript'>
$(document).ready(function() {
	var homeBgs = $('#home-bg li');
	var currentHomeBgIndex = 0;
	var nextHomeBgIndex = 0;
	var bgRun = function() {
		if(currentHomeBgIndex >= 2) {
			nextHomeBgIndex = 0;
		} else {
			nextHomeBgIndex = currentHomeBgIndex + 1;
		}
		
		var currentBg = $(homeBgs[currentHomeBgIndex]);
		var nextBg = $(homeBgs[nextHomeBgIndex]);
		
		
		switch(currentHomeBgIndex) {
			case 0:
				nextBg.css({'backgroundSize': '105%', 'zIndex': 2});
				currentBg.css({'backgroundSize': '100%'}).animate({'backgroundSize': '105%'}, 7000, 'linear', function() {
					currentBg.animate({'opacity': 0}, 600, function() {
						currentBg.css({'opacity': 1, 'zIndex': 1, 'backgroundSize': '100%'});
						$(nextBg).css({'zIndex': 3});
					});
				});
				break;
			case 1:
				nextBg.css({'backgroundSize': '100%', 'zIndex': 2});
				currentBg.css({'backgroundSize': '105%'}).animate({'backgroundSize': '100%'}, 7000, 'linear', function() {
					currentBg.animate({'opacity': 0}, 600, function() {
						currentBg.css({'opacity': 1, 'zIndex': 1, 'backgroundSize': '100%'});
						$(nextBg).css({'zIndex': 3});
					});
				});
				break;
			case 2:
				nextBg.css({'backgroundSize': '100%', 'zIndex': 2});
				currentBg.css({'backgroundSize': '100%'}).animate({'backgroundSize': '105%'}, 7000, 'linear', function() {
					currentBg.animate({'opacity': 0}, 600, function() {
						currentBg.css({'opacity': 1, 'zIndex': 1, 'backgroundSize': '100%'});
						$(nextBg).css({'zIndex': 3});
					});
				});
				break;
		}
		currentHomeBgIndex++;
		if(currentHomeBgIndex >= 3) {
			currentHomeBgIndex = 0;
		}
	}
	bgRun();
	setInterval(bgRun, 7800);
});
</script>