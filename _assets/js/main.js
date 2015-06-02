jQuery(document).ready(function() {
	
	jQuery('#site-info').outerWidth(jQuery(window).width() - jQuery('#site-info').offset().left);
	if (document.getElementById("primary") != undefined) jQuery('.faixa').width(jQuery('#primary').offset().left);
//	jQuery('#carrossel').width(jQuery(window).width() - jQuery('.faixa').width());

	if (jQuery(window).width() > 768) {
		if (document.getElementById("primary") != undefined) jQuery('.faixa').width(jQuery('#primary').offset().left);
		jQuery('#site-info').outerWidth(jQuery(window).width() - jQuery('#site-info').offset().left);
//		jQuery('#carrossel').width(jQuery(window).width() - jQuery('.faixa').width());
	} else {
		jQuery('.faixa').width(80);
		jQuery('#site-info').outerWidth("100%");	
		jQuery('#carrossel').width('100%');
	}

	jQuery(window).resize(function() {
		if (jQuery(window).width() > 768) {
			if (document.getElementById("primary") != undefined) jQuery('.faixa').width(jQuery('#primary').offset().left);
			jQuery('#site-info').outerWidth(jQuery(window).width() - jQuery('#site-info').offset().left);
	//		jQuery('#carrossel').width(jQuery(window).width() - jQuery('.faixa').width());
		/*	jQuery('.site-title').css('right', '30px'); 
			jQuery('#menu').css('left', 'initial'); 		*/
			
		} else {
			jQuery('.faixa').width(80);
			jQuery('#site-info').outerWidth("100%");	
			jQuery('#carrossel').width('100%');
		}
	});


	jQuery(".hentry").mouseenter(function() {
		if (jQuery(window).width() > 768) {
			jQuery(this).children(".entry-header").stop(true, true).animate({
				top : '0px',
				height : '100%'
			});
			/*--------------------------------------------------------------------------------------*/
			jQuery(this).children(".entry-header3").stop(true, true).animate({
				top : '0px',
				height : '100%'
			});
		}

	});
	jQuery(".hentry").mouseleave(function() {
		if (jQuery(window).width() > 768) {

			jQuery(this).children(".entry-header").stop(true, true).delay(500).animate({
				top : '156px',
				height : '102px'

			});
			/*--------------------------------------------------------------------------------------*/
			jQuery(this).children(".entry-header3").stop(true, true).delay(500).animate({
				top : '119px',
				height : '132px'
			});
			/*--------------------------------------------------------------------------------------*/
		}

	});

	jQuery(".hentry-first").mouseenter(function() {
		if (jQuery(window).width() > 768) {
			jQuery(this).children(".entry-header-hoje").stop(true, true).animate({
				top : '0px',
				height : '100%'
			});
		}
	});
	jQuery(".hentry-first").mouseleave(function() {
		if (jQuery(window).width() > 768) {
			jQuery(this).children(".entry-header-hoje").stop(true, true).delay(500).animate({
				top : '171px',
				height : '86px'
			});
		}
	});

	/***--------------***/


	/*---------------------------------------------------------------------carrossel*/

});
/*   var height = window.innerHeight ? window.innerHeight : jQuery(window).height()
 var width = window.innerWidth ? window.innerWidth : jQuery(window).width()
 */

jQuery(window).on("load resize", function() {
	if (jQuery(window).width() > 768) {
		jQuery('#slides li').css('left', '0');
		jQuery('#slides li').width('850px');
		jQuery('.clip').width('850px');
		//   jQuery('.body').width(jQuery(window).width());
		jQuery('#slides li').height(jQuery(window).height());
		jQuery('.clip').css('left', '0');
		//    jQuery('#slides li').css('width', 'auto');

	} else {
		jQuery('#slides li').height(jQuery(window).height());
		jQuery('#slides li').css('width', 'auto');
		jQuery('.clip').width(jQuery(window).width());
		/*  jQuery('body').width(jQuery(window).width());*/
		jQuery('.clip').css('left', '0');
		/*
		 jQuery('#slides li').height('height');
		 jQuery('.clip').width(jQuery(window).width());
		 jQuery('#slides li').css('width', 'auto');
		 */
	}
});
var click = 0
var caixa = 0

jQuery(".faixa").click(function() {
	click++;
	if (click % 2 == 1) {
		if (jQuery(window).width() < 767) {
			jQuery("#menu").animate({
				left : '0'
			}, 600);
			jQuery(".faixa").animate({
				right : '100%'
			}, 600);
			jQuery(".site-title").animate({
				right : '100%'
			}, 600);
			jQuery("li #legenda").animate({
				right : '100%'/*,
				width : '300px'*/
			}, 600);
		}
	} else {
		if (jQuery(window).width() < 767) {
			jQuery("#menu").animate({
				left : '100%'
			}, 600);
			jQuery(".faixa").animate({
				right : '0px'
			}, 600);
			if(caixa != 1){
			jQuery(".site-title").animate({
				right : '0'
			}, 600);
			jQuery("li #legenda").animate({
				right : '40px'/*,
				width : '300px'*/
			}, 600);
			}
		}
	}
});

//Hammer starts here--------------------------------------------------------------
jQuery("#slides li").hammer().on("swipeup dragup", function(ev) {
	ev.gesture.preventDefault();

	var targetTop;

	if (jQuery(this).next().length) {
		targetTop = jQuery(this).next().offset().top;
	} else {
		targetTop = jQuery('#main').offset().top;
	}
	// #primary
	jQuery('html, body').animate({
		scrollTop : targetTop
	});

	ev.gesture.stopDetect();
});

jQuery("#slides li").hammer().on("swipedown dragdown", function(ev) {
	ev.gesture.preventDefault();

	var targetTop;

	if (jQuery(this).prev().length)
		targetTop = jQuery(this).prev().offset().top;
	else
		targetTop = 0;

	jQuery('html, body').animate({
		scrollTop : targetTop
	});

	ev.gesture.stopDetect();
});

jQuery("#caixa").click(function() {
	
	jQuery("#searchbox").fadeIn("fast", function() {
	});	
	if (jQuery(window).width() < 767) {
	jQuery(".fade").fadeOut();
	}	

});
jQuery("#caixa2").click(function() {
	caixa = 1;

	jQuery("#searchbox").fadeIn("fast", function() {
	});	

	click = click+1;
	
	if (jQuery(window).width() < 767) {
		jQuery("#menu").animate({
			left : '100%'
		}, 600);
		jQuery(".faixa").animate({
			right : '0px'
		}, 600);
		jQuery(".fade").fadeOut();
		jQuery(".site-title").animate({
			right : '20px'
		}, 600);
		jQuery("li #legenda").animate({
			right : '20px',
			width : '300px'
		}, 600);		
	}
	
});

jQuery(".sair").click(function() {
	jQuery("#searchbox").fadeOut("fast", function() {
	});
	jQuery(".fade").fadeIn();
});
jQuery("#content .sair").click(function() {
	jQuery("html").fadeOut("fast", function() {
		window.location.href = url;
	});
}); 
/*-------------------------*/
jQuery(window).resize(function() {
	if(click%2==1){
		if (jQuery(window).width() > 768) {		
			jQuery('.site-title').css('right', '30px');
			jQuery('#menu').css('left', 'initial'); 
			jQuery('#legenda').css('right', 'initial'); 	
		}		
	}
}); 
