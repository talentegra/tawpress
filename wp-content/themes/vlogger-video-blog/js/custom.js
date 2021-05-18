jQuery(function($){
	window.vlogger_video_blog_currentfocus=null;
  	vlogger_video_blog_checkfocusdElement();
	var vlogger_video_blog_body = document.querySelector('body');
	vlogger_video_blog_body.addEventListener('keyup', vlogger_video_blog_check_tab_press);
	var vlogger_video_blog_gotoHome = false;
	var vlogger_video_blog_gotoClose = false;
	window.responsiveMenu=false;
 	function vlogger_video_blog_checkfocusdElement(){
	 	if(window.vlogger_video_blog_currentfocus=document.activeElement.className){
		 	window.vlogger_video_blog_currentfocus=document.activeElement.className;
	 	}
 	}
 	function vlogger_video_blog_check_tab_press(e) {
		"use strict";
		// pick passed event or global event object if passed one is empty
		e = e || event;
		var activeElement;

		if(window.innerWidth < 999){
		if (e.keyCode == 9) {
			if(window.responsiveMenu){
			if (!e.shiftKey) {
				if(vlogger_video_blog_gotoHome) {
					jQuery( ".main-menu ul:first li:first a:first-child" ).focus();
				}
			}
			if (jQuery("a.closebtn.mobile-menu").is(":focus")) {
				vlogger_video_blog_gotoHome = true;
			} else {
				vlogger_video_blog_gotoHome = false;
			}

		}else{

			if(window.vlogger_video_blog_currentfocus=="mobiletoggle"){
				jQuery( "" ).focus();
			}}}
		}
		if (e.shiftKey && e.keyCode == 9) {
		if(window.innerWidth < 999){
			if(window.vlogger_video_blog_currentfocus=="header-search"){
				jQuery(".mobiletoggle").focus();
			}else{
				if(window.responsiveMenu){
				if(vlogger_video_blog_gotoClose){
					jQuery("a.closebtn.mobile-menu").focus();
				}
				if (jQuery( ".main-menu ul:first li:first a:first-child" ).is(":focus")) {
					vlogger_video_blog_gotoClose = true;
				} else {
					vlogger_video_blog_gotoClose = false;
				}

				if (e.target.parentNode.previousElementSibling.childElementCount == 2) {
					if(e.target.parentNode.previousElementSibling.children[1].className === "sub-menu"){
						e.target.parentNode.previousElementSibling.children[1].style.display = "block";
					}
				}
			
			}else{

			if(window.responsiveMenu){
			}}}}
		}
	 	vlogger_video_blog_checkfocusdElement();
	}
});

jQuery(function($){
	var navmenus = navmenus || {};

	navmenus.primaryMenu = {

		init: function() {
			this.focusMenuWithChildren();
		},
		// The focusMenuWithChildren() function implements Keyboard Navigation in the Primary Menu
		// by adding the '.focus' class to all 'li.menu-item-has-children' when the focus is on the 'a' element.
		focusMenuWithChildren: function() {
			// Get all the link elements within the primary menu.
			var links, i, len,
				menu = document.querySelector( '.main-navigation' );

			if ( ! menu ) {
				return false;
			}
			links = menu.getElementsByTagName( 'a' );

			// Each time a menu link is focused or blurred, toggle focus.
			for ( i = 0, len = links.length; i < len; i++ ) {
				links[i].addEventListener( 'focus', vlogger_video_blog_toggleFocus, true );
				links[i].addEventListener( 'blur', vlogger_video_blog_toggleFocus, true );
			}

			//Sets or removes the .focus class on an element.
			function vlogger_video_blog_toggleFocus() {
				var self = this;

				// Move up through the ancestors of the current link until we hit .primary-menu.
				while ( -1 === self.className.indexOf( 'mobile_nav' ) ) {
					// On li elements toggle the class .focus.
					if ( 'li' === self.tagName.toLowerCase() ) {
						if ( -1 !== self.className.indexOf( 'focus' ) ) {
							self.className = self.className.replace( ' focus', '' );
						} else {
							self.className += ' focus';
						}
					}
					self = self.parentElement;
				}
			}
		}
	}; 

	function vlogger_video_blog_navigationmenuReady( fn ) {
		if ( typeof fn !== 'function' ) {
			return;
		}
		if ( document.readyState === 'interactive' || document.readyState === 'complete' ) {
			return fn();
		}
		document.addEventListener( 'DOMContentLoaded', fn, false );
	}
	vlogger_video_blog_navigationmenuReady( function() {
		navmenus.primaryMenu.init();	// Primary Menu
	} );
});

jQuery(document).ready(function() {
	var owl = jQuery('#playlist_sec .owl-carousel');
		owl.owlCarousel({
			margin: 25,
			nav: true,
			autoplay:true,
			autoplayTimeout:2000,
			autoplayHoverPause:true,
			loop: true,
			navText : ['<i class="fa fa-lg fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-lg fa-chevron-right" aria-hidden="true"></i>'],
			responsive: {
			  0: {
			    items: 1
			  },
			  600: {
			    items: 2
			  },
			  1024: {
			    items: 2
			}
		}
	})
})
