$(document).ready(function() {
	$('a').click(function() {
		$(this).blur();
	});
});


var anim

$.cssHooks["backgroundPositionX"] = {
    get: function(elem, computed, extra) {
        return elem.style.backgroundPosition.split(' ')[0];
    },
    set: function(elem, value) {
        var y = elem.style.backgroundPosition.split(' ')[1];
        elem.style.backgroundPosition = value + ' ' + y;
    }
};

$(document).ready(function() {
	/***********************/
	/**push state**/
	/***********************/
	var bodyMainFrame = $('.body_main_frame');

	var ApplicationRouter = Backbone.Router.extend({
		initialize: function() {
			$('body').on('click', 'a', function(e) {
				if($(this).attr('class') != 'out-link' && $(this).attr('class') != 'js-link') {
					e.preventDefault();
					var href = $(this).attr('href');
					Backbone.history.navigate(href, true);
				}
			});
		},
		routes: {
			':url': "frontPage",
			'blog/:blogId': "getBlog"
		},
		frontPage: function(url) {
			if(window.innerContentRefresh == true) {
				window.innerContentRefresh = false;
				$.ajax({
					dataType: 'html',
					url: url + '?getRefresh=newsItem',
					success: function(html) {
						$('.content').animate({opacity:0}, 500, function() {
							$(this).empty().append(html).animate({'opacity':1});
						});
					}
				});
			} else {
				$.ajax({
					dataType: 'html',
					url: url,
					success: function(html) {
						bodyMainFrame.animate({'left': '-100%', opacity: 0}, 800, function() {
							bodyMainFrame.empty();
							bodyMainFrame.append(html);
							bodyMainFrame.css('left', '100%');
							bodyMainFrame.animate({'left': 0, opacity: 1}, 300);
						});
					}
				});
			}
		},
		getBlog: function(blogId) {
			if(window.innerContentRefresh == true) {
				window.innerContentRefresh = false;
				$.ajax({
					dataType: 'html',
					url: '/blog/' + blogId + '?getRefresh=newsItem',
					success: function(html) {
						$('.content').animate({opacity:0}, 500, function() {
							$(this).empty().append(html).animate({'opacity':1});
						});
					}
				});
			} else {
				$.ajax({
					dataType: 'html',
					url: '/blog/' + blogId,
					success: function(html) {
						$('.content').empty().append(html);
					}
				});
			}
		}
	});

	var appRouter = new ApplicationRouter();
	Backbone.history.start({pushState: true, silent: true});
	/***********************/
	/**END push state**/
	/***********************/
	
	var toolbar = $('#body_head');
	var liBg = $('#li-bg');
	var tbUl = toolbar.find('ul');
	var tbLis = toolbar.find('li');
	var tbLink = toolbar.find('a');
	var liWidth = 0;
	
	var bottomLink = $('#body_tail');
	/***********************/
	/**window resize**/
	/***********************/
	
	repositionToolbar = function() {
		var toolbarWidth = $(window).width() - 450;
		if(toolbarWidth > 450) {
			liWidth = Math.floor(toolbarWidth/tbLis.length);
			tbLis.css('width', liWidth);
			liBg.css('width', liWidth);
		}
		
		var bottomLinkTop = $(window).height() - 22;
		bottomLink.css('top', bottomLinkTop);
		
		var windowHeight = $(window).height();
		if(windowHeight < 910) {
			$('.body_main_frame').css('height', windowHeight - 125);
		} else if(windowHeight >= 910) {
			$('.body_main_frame').css('height', 750);
		}
		$('.logo-bg').css('top', windowHeight/2 - 60);
	}
	repositionToolbar();
	setHomeGalleryFolder = function() {
		if($(window).height() > 720) {
			window.galleryFolderName = '700';
		} else {
			window.galleryFolderName = '500';
		}
	}
	setHomeGalleryFolder();
	$(window).resize(function() {
		repositionToolbar();
		setHomeGalleryFolder();
	});
	
	var currentIndex = 0;
	tbLink.each(function(i, obj) {
		if($(obj).attr('class') == 'selected') {currentIndex = i;}
		
		$(obj).click(function() {
			$(this).attr('class', 'selected');
			currentIndex = i;
		});
		
		$(obj).mouseenter(function() {
			liBg.stop().animate({'left':liWidth * (i)}, 500);
		}).mouseleave(function() {
			
		});
	});
	liBg.stop().css({'left':liWidth * (currentIndex)});
	tbUl.mouseenter(function() {
	
	}).mouseleave(function() {
		liBg.stop().animate({'left':liWidth * (currentIndex)}, 500);
	});
	
	/***********************/
	/**cufon**/
	/***********************/
	Cufon.replace('#start');
	Cufon.replace('.anim2');
});
