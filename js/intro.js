(function($) {
	var imgList = [];
	$.extend({
		preloadImages: function(imgArr, option) {
			var setting = $.extend({
				init: function(loaded, total) {},
				loaded: function(img, loaded, total) {},
				loaded_all: function(loaded, total) {}
			}, option);
			var total = imgArr.length;
			var loaded = 0;
			
			setting.init(0, total);
			for(var i in imgArr) {
				imgList.push($("<img />")
					.attr("src", imgArr[i])
					.load(function() {
						loaded++;
						setting.loaded(this, loaded, total);
						if(loaded == total) {
							setting.loaded_all(loaded, total);
						}
					})
				);
			}
			
		}
	});
})(jQuery);

$(document).ready(function() {
	var logoBg = $('.logo-bg');
	var captionShine = $('.logo-caption-shine');
	captionShine.css({opacity: 0.8});
	logoBg.mouseenter(function() {
		captionShine.stop().css("background-position","-500px 0").animate({"backgroundPositionX": '2000px'},700);
	});
	
	var fluid = $('.fluid');
	
	$(function() {
		$.preloadImages([
			"/res/plate-bg.png",
			"/res/brand-banner.jpg",
			"/res/card-paper.png",
			"/res/card-refl.png",
			"/res/loading.gif",
			"/res/main-frame-bg.jpg",
			"/res/mCSB_buttons.png",
			"/res/text.png",
			"/home/bg-1920-1.jpg",
			"/home/bg-1920-2.jpg",
			"/home/bg-1920-3.jpg",
			"/home/bg-1920-4.jpg"  //,
			/*
			"/home/bg-1440-1.jpg",
			"/home/bg-1440-2.jpg",
			"/home/bg-1440-3.jpg",
			"/home/bg-1440-4.jpg"
			*/
		], {
			loaded: function(img, loaded, total) {
				var percentage = (loaded/total) * 100 + '%';
				fluid.stop().animate({'width': percentage}, 100);
			},
			loaded_all: function(loaded, total) {
				fluid.animate({'opacity': 0}, 1000, function() {
					$(this).css('width', 0);
				});
			}
		});
	});

	$('.init-hide').css('opacity', 0);
	var bodyHead = $('#body_head');
	var bodyMain = $('.body_main_frame');
	var bodyTail = $('#body_tail');
	
	$('.logo-bg').click(function() {
		$('.logo-bg').animate({opacity: 0, top: '250px'}, 500, function() {
			$('.intro-animate').css('background', 'transparent');
			$('#light').remove();
			var bgPlatesHolder = $('.bg-plates-holder');
			var bgPlate = $('.bg-plate');
			
			bgPlate.css('top', '-80px');
			bgPlate.animate({top: 0, opacity: 1}, 600);
			
			setTimeout(function() {
				$('#card').css('display', 'block');
				$('.card-paper').animate({'top': 0, opacity: 1}, 500);
				$('.card-refl').animate({'top': 0, opacity: 1}, 500);
				
				$('.anim1').animate({opacity:1}, 1000, function() {
					$('.anim2').animate({opacity:1}, 800, function() {
						$('.anim3').animate({opacity:1}, 800, function() {
							$('.anim4').animate({height: '40px'}, 500, function() {
								$('.anim4').css('opacity', 1);
							});
						});
						$('.anim5').animate({opacity:1}, 800, function() {
							
						});
					});
				});
			}, 1000);
		});
	});
	
	$('#start').click(function() {
		$('.intro-animate').animate({opacity: 0}, 1000, function() {
			$(this).remove();
			$('.bg-wrapper').css('display', 'block');
			setTimeout(function() {
				bodyTail.animate({'opacity': 1}, 1000);
				bodyMain.animate({'opacity': 1}, 1000);
				bodyHead.animate({'opacity': 1}, 1000);
			}, 100);
		});
	});
});