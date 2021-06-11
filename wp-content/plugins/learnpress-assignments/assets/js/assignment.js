/**
 * Single Assignment functions
 *
 * @author ThimPress
 * @package
 * @version 4.0.0
 * @author Nhamdv - Code is poetry
 */

( function( $ ) {
	! Number.prototype.AssignmenttoTime && ( Number.prototype.AssignmenttoTime = function( thisSettings ) {
		const MINUTE_IN_SECONDS = 60,
			HOUR_IN_SECONDS = 3600,
			DAY_IN_SECONDS = 24 * 3600;

		let seconds = this + 0,
			str = '',
			singularDayText = ' day left',
			pluralDayText = ' days left';

		if ( typeof thisSettings.singularDayText != 'undefined' ) {
			singularDayText = thisSettings.singularDayText;
		}

		if ( typeof thisSettings.pluralDayText != 'undefined' ) {
			pluralDayText = thisSettings.pluralDayText;
		}

		if ( seconds > DAY_IN_SECONDS ) {
			const days = Math.ceil( seconds / DAY_IN_SECONDS );
			str = days + ( days > 1 ? pluralDayText : singularDayText );
		} else {
			let hours = Math.floor( seconds / HOUR_IN_SECONDS ),
				minutes = 0;

			seconds = hours ? seconds % ( hours * HOUR_IN_SECONDS ) : seconds;
			minutes = Math.floor( seconds / MINUTE_IN_SECONDS );
			seconds = minutes ? seconds % ( minutes * MINUTE_IN_SECONDS ) : seconds;

			if ( hours && hours < 10 ) {
				hours = '0' + hours;
			}

			if ( minutes < 10 ) {
				minutes = '0' + minutes;
			}

			if ( seconds < 10 ) {
				seconds = '0' + seconds;
			}

			str = hours + ':' + minutes + ':' + seconds;
		}

		return str;
	} );

	function LPAssignment( settings ) {
		const self = this,
			thisSettings = $.extend( {}, settings ),
			$timeElement = $( '.assignment-countdown .progress-number' ),
			callbackEvents = new LP.Event_Callback( this );

		let remainingTime = thisSettings.remainingTime,
			timerCountdown = null;

		function timeCountdown() {
			stopCountdown();

			const overtime = thisSettings.remainingTime <= 0,
				isCompleted = -1 !== settings.status.indexOf( 'finished' );

			if ( isCompleted ) {
				return;
			}

			if ( overtime ) {
				$( 'form.save-assignment' ).off( 'submit.learn-press-confirm' );
				callbackEvents.callEvent( 'finish' );
				return;
			}

			thisSettings.remainingTime--;
			timerCountdown = setTimeout( timeCountdown, 1000 );
		}

		function stopCountdown() {
			timerCountdown && clearTimeout( timerCountdown );
		}

		function initCountdown() {
			thisSettings.watchChange( 'remainingTime', function( prop, oldVal, newVal ) {
				remainingTime = newVal;
				onTick.apply( self, [ oldVal, newVal ] );
				return newVal;
			} );
		}

		function onTick( oldVal, newVal ) {
			callbackEvents.callEvent( 'tick', [ newVal ] );

			if ( newVal <= 0 ) {
				stopCountdown();
				callbackEvents.callEvent( 'finish' );
			}
		}

		function showTime() {
			if ( remainingTime < 0 ) {
				remainingTime = 0;
			}
			if ( typeof thisSettings != 'undefined' ) {
				$timeElement.html( remainingTime.AssignmenttoTime( thisSettings ) );
			}
		}

		function submit() {
			$( 'form.save-assignment' ).trigger( 'submit' );
		}

		function init() {
			if ( thisSettings.onTick ) {
				self.on( 'tick', thisSettings.onTick );
			}

			if ( thisSettings.onFinish ) {
				self.on( 'finish', thisSettings.onFinish );
			}

			initCountdown();
			timeCountdown();
		}

		this.on = callbackEvents.on;
		this.off = callbackEvents.off;

		if ( thisSettings.totalTime > 0 ) {
			this.on( 'tick.showTime', showTime );
			this.on( 'finish.submit', submit );
		}

		this.getRemainingTime = function() {
			return remainingTime;
		};

		init();
	}

	$( document ).ready( function() {
		if ( typeof lpAssignmentSettings !== 'undefined' && $( '.assignment-countdown' ).length > 0 ) {
			window.lpAssignment = new LPAssignment( lpAssignmentSettings );
		}

		if ( $( '.save-assignment' ).length > 0 ) {
			let which;

			$( 'button' ).on( 'click', function() {
				which = $( this ).attr( 'id' );
			} );

			$( '.save-assignment' ).on( 'submit', function( e ) {
				if ( which == 'assignment-button-right' ) {
					const question = $( '#assignment-button-right' ).data( 'confirm' );
					const ok = confirm( question );

					if ( ok ) {
						return true;
					}

					e.preventDefault();
					return false;
				} else if ( which == 'assignment-button-left' ) {
					const question = $( '#assignment-button-left' ).data( 'confirm' );
					const ok = confirm( question );

					if ( ok ) {
						return true;
					}

					e.preventDefault();
					return false;
				}
			} );
		}

		$( '.assignment_action_icon' ).on( 'click', function() {
			const attName = $( this ).attr( 'name' );
			const attOrder = $( this ).attr( 'order' );
			const ajaxUrl = $( this ).attr( 'ajax_url' );
			const useritemId = $( this ).attr( 'useritem_id' );
			const question = $( this ).data( 'confirm' );
			const ok = confirm( question );

			if ( ok ) {
				const allowAmount = $( '#assignment-file-amount-allow' ).text();
				$.ajax( {
					type: 'post',
					url: ajaxUrl,
					data: {
						action: 'delete_assignment_upload_file',
						attName,
						attOrder,
						useritemId,
						_ajax_nonce: jQuery( '#assignment-file-nonce-' + attOrder ).val(),
					},
					success() {
						const newAllowAmount = parseInt( allowAmount ) + 1;

						$( '#assignment-uploaded-file-' + attOrder ).fadeOut();
						$( '#_lp_upload_file' ).prop( 'disabled', false );
						$( '#assignment-file-amount-allow' ).text( newAllowAmount );
					},
				} );
			} else {
				return false;
			}
		} );
	} );
}( jQuery ) );
