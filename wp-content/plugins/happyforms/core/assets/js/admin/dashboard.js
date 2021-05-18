( function( $, settings ) {

	var happyForms = window.happyForms || {};
	window.happyForms = happyForms;

	happyForms.dashboard = {
		init: function() {
			$( '.happyforms-editor-button' ).on( 'click', this.onEditorButton.bind( this ) );
			$( '.happyforms-dialog__button' ).on( 'click', this.onDialogButton.bind( this ) );
			$( '.happyforms-notice:not(.one-time)' ).on( 'click', '.notice-dismiss', this.onNoticeDismiss.bind( this ) );
			$( '#happyforms-review-notice' ).on( 'click', '.notice-dismiss', this.dismissReviewNotice.bind( this ) );
			$( '#happyforms-review-notice' ).on( 'click', '#hf-rate-submit', this.setRecomendation.bind( this ) );
		},

		onEditorButton: function( e ) {
			var title = $( e.currentTarget ).attr( 'data-title' );

			$('#happyforms-modal').dialog( {
				title: title,
				dialogClass: 'happyforms-dialog wp-dialog',
				draggable: false,
				width: 'auto',
				modal: true,
				resizable: false,
				closeOnEscape: true,
				position: {
					my: 'center',
					at: 'center',
					of: $(window)
				}
			} );
		},

		onDialogButton: function( e ) {
			e.preventDefault();
			e.stopImmediatePropagation();

			var formId = $( '#happyforms-dialog-select' ).val();
			if ( ! formId ) {
				return false;
			}

			var shortcode = settings.shortcode.replace( 'ID', formId );
			window.parent.send_to_editor( shortcode );
			$( '#happyforms-modal' ).dialog( 'close' );
			$( '#happyforms-dialog-select' ).val( '' );

			if ( editor = this.getCurrentEditor() ) {
				editor.focus();
			}
		},

		getCurrentEditor: function() {
			var editor,
				hasTinymce = typeof tinymce !== 'undefined',
				hasQuicktags = typeof QTags !== 'undefined';

			if ( ! wpActiveEditor ) {
				if ( hasTinymce && tinymce.activeEditor ) {
					editor = tinymce.activeEditor;
					wpActiveEditor = editor.id;
				} else if ( ! hasQuicktags ) {
					return false;
				}
			} else if ( hasTinymce ) {
				editor = tinymce.get( wpActiveEditor );
			}

			return editor;
		},

		onNoticeDismiss: function( e ) {
			e.preventDefault();

			var $target = $( e.target );
			var $parent = $target.parents( '.notice' ).first();
			var id = $parent.attr( 'id' ).replace( 'happyforms-notice-', '' );
			var nonce = $parent.data( 'nonce' );

			$.post( ajaxurl, {
					action: 'happyforms_hide_notice',
					nid: id,
					nonce: nonce
				}
			);
		},

		setRecomendation: function( e ) {
			var rate = $('input[name="happyforms-rate"]:checked').val();

			if ( 'undefined' !== typeof rate ){
				$( '#hf-recommend-screen' ).hide();
				if ( rate < 3 ) {
					$( '#hf-negative-rate' ).show();
				} else {
					$( '#hf-positive-rate' ).show();
				}

				var data = {
					action: 'happyforms_review_notice_action',
					recommend: rate
				}

				$.post( ajaxurl, data );
			}
		},

		dismissReviewNotice: function( e ) {
			var data = {
				action: 'happyforms_review_notice_action',
				dismiss: true
			}

			$.post( ajaxurl, data );
		},
	};

	$( document ).ready( function() {
		happyForms.dashboard.init();
	} );

} )( jQuery, _happyFormsAdmin );
