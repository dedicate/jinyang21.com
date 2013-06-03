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
				if($(this).attr('class') != 'out-link') {
					e.preventDefault();
					var href = $(this).attr('href');
					Backbone.history.navigate(href, true);
				}
			});
		},
		routes: {
			':url': "frontPage"
		},
		frontPage: function(url) {
			$.ajax({
				dataType: 'html',
				url: url,
				success: function(html) {
					bodyMainFrame.animate({'left': '-100%'}, 500, function() {
						bodyMainFrame.empty();
						bodyMainFrame.append(html);
						bodyMainFrame.css('left', '100%');
						bodyMainFrame.animate({'left': 0}, 500);
					});
				}
			});
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
	}
	repositionToolbar();
	$(window).resize(function() {
		repositionToolbar();
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
			//$(this).stop().animate({'color':'#000000'}, 500);
		}).mouseleave(function() {
			//$(this).stop().animate({'color':'#ffffff'}, 500);
		});
	});
	liBg.stop().css({'left':liWidth * (currentIndex)});
	tbUl.mouseenter(function() {
		//$(tbLink[currentIndex]).stop().animate({'color':'#ffffff'}, 500);
	}).mouseleave(function() {
		liBg.stop().animate({'left':liWidth * (currentIndex)}, 500);
		//$(tbLink[currentIndex]).stop().animate({'color':'#000000'}, 500);
	});
	
	/***********************/
	/**cufon**/
	/***********************/
	Cufon.replace('#start');
	Cufon.replace('.anim2');
});
