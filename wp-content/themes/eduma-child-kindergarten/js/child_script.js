(function ($) {
	"use strict";

	var thim_Contact_Course_Popup = function() {
		if ($('#contact-form-registration >.wpcf7').length) {
			var el = $('#contact-form-registration >.wpcf7'),
					el_H = el.outerHeight(),
					win_H = $(window).height();
			if (win_H > el_H) {
				el.css('top', ( win_H - el_H ) / 2);
			}
			el.append('<a href="#" class="thim-close fa fa-times"></a>');
		}

		$(document).on('click', '.thim-enroll-kindergarten .thim-enroll-course-button', function (e) {
			e.preventDefault();
			$('body').addClass('thim-contact-popup-active');
			$('#contact-form-registration').addClass('active');
		});

		$(document).on('click', '#contact-form-registration', function (e) {
			if ($(e.target).attr('id') == 'contact-form-registration') {
				$('body').removeClass('thim-contact-popup-active');
				$('#contact-form-registration').removeClass('active');
			}
		});

		$(document).on('click', '#contact-form-registration .thim-close', function (e) {
			e.preventDefault();
			$('body').removeClass('thim-contact-popup-active');
			$('#contact-form-registration').removeClass('active');
		});
	}


	$(window).load(function () {
		thim_Contact_Course_Popup();

		$(document).on('click', '#contact-form-registration .wpcf7-form-control.wpcf7-submit', function () {
			$(document).on('mailsent.wpcf7', function (event) {
				setTimeout(function(){
					$('body').removeClass('thim-contact-popup-active');
					$('#contact-form-registration').removeClass('active');
				}, 3000);
			});
		});
	});
})(jQuery);