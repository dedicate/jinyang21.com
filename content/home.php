<div id='home-bg'>

</div>

<script src="/js/kinetic.4.5.2.min.js"></script>
<script defer="defer">
	var sources = {
		0: "/res/home-bg-1920-1.jpg",
		1: "/res/home-bg-1920-2.jpg",
		2: "/res/home-bg-1920-3.jpg"
	};
	var  images = {};
	for(var idx in sources) {
		images[idx] = new Image();
		images[idx].src = sources[idx];
		images.onload = function() {
		};
	}
	var stage = new Kinetic.Stage({
		container: 'home-bg',
		width: 1920,
		height: 1000
	});

	var layer = new Kinetic.Layer();

	var rects = [
		new Kinetic.Rect({x: 0, y: 0, width: 1920, height: 1000}),
		new Kinetic.Rect({x: 0, y: 0, width: 1920, height: 1000}),
		new Kinetic.Rect({x: 0, y: 0, width: 1920, height: 1000})
	];
	
	for(var i = 0; i <= 2; i++) {
		rects[i].setFillPatternImage(images[i]);
		layer.add(rects[i]);
		rects[i].setZIndex(i);
	}
	stage.add(layer);
	stage.draw();
	
	var animateIdx = 2;
	anim = new Kinetic.Animation(function(frame) {
		switch(animateIdx) {
			case 2:
				scale = 1 + frame.time / 150000;
				rects[animateIdx].setScale(scale);
				break;
			case 1:
				xPos = -frame.time / 100;
				rects[animateIdx].setX(xPos);
				break;
			case 0:
				scale = 1 + frame.time / 80000;
				xPos = -frame.time / 100;
				rects[animateIdx].setScale(scale);
				rects[animateIdx].setX(xPos);
				break;
		}
		if(frame.time >= 4000) {
			var op = (5000 - frame.time) / 1000;
			rects[animateIdx].setOpacity(op);
		}
		if(frame.time >= 5000) {
			frame.time = 0;
			rects[animateIdx].hide();
			rects[animateIdx].setX(0);
			rects[animateIdx].setScale(1);
			rects[animateIdx].setOpacity(1);
			rects[animateIdx].setZIndex(0);
			
			animateIdx--;
			if(animateIdx < 0) {
				animateIdx = 2;
			}
			rects[animateIdx].setZIndex(2);
			if(animateIdx == 0) {
				rects[2].show();
				rects[2].setZIndex(1);
			} else {
				rects[animateIdx - 1].show();
				rects[animateIdx - 1].setZIndex(1);
			}
		}
	}, layer);
	anim.start();
</script>