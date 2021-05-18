( function( $, settings ) {

	var happyForms = window.happyForms || {};
	window.happyForms = happyForms;

	happyForms.freeDashboard = {
		init: function() {
			$( document ).on( 'click', '#adminmenu #toplevel_page_happyforms a[href="#responses"]', this.onModalTriggerClick.bind(this) );
			$( document ).on( 'click', '#adminmenu #toplevel_page_happyforms a[href="#settings"]', this.onModalTriggerClick.bind(this) );
			$( document ).on( 'click', '#adminmenu #toplevel_page_happyforms a[href="#integrations"]', this.onModalTriggerClick.bind(this) );
			$( document ).on( 'click', '.happyforms-upgrade-modal .happyforms-continue-link', this.onContinueClick.bind(this) );
			$( document ).on( 'click', '.happyforms-upgrade-modal .happyforms-export-button', this.onExportButtonClick.bind(this) );
			$( document ).on( 'click', '.happyforms-upgrade-modal .happyforms-upgrade-modal__close', this.onCloseClick.bind(this) );
		},

		onModalTriggerClick: function( e ) {
			e.preventDefault();

			this.openModal( settings.modal_id );
		},

		openModal: function( modalId ) {
			tb_show( '', '#TB_inline?width=600&amp;inlineId=' + modalId );
			$( '#TB_window' ).addClass( 'happyforms-admin-modal' ).addClass( modalId );
			$( '#TB_ajaxContent' ).height( 'auto' );
			$( '#TB_title' ).width( $( '#TB_ajaxContent' ).width() );
			$( '#TB_closeWindowButton' ).blur();
		},

		closeModal: function() {
			tb_remove();
		},

		onContinueClick: function( e ) {
			e.preventDefault();

			this.closeModal();
		},

		onExportButtonClick: function( e ) {
			e.preventDefault();

			$( '.happyforms-upgrade-modal .happyforms-export-button' ).hide();
			$( '.happyforms-upgrade-modal form' ).addClass( 'shown' );
		},

		onCloseClick: function( e ) {
			e.preventDefault();

			this.closeModal();
		}
	};

	$( document ).ready( function() {
		happyForms.freeDashboard.init();
	} );

} )( jQuery, _happyFormsDashboardSettings );
