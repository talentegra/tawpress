<?php

class HappyForms_Admin_Notices {

	/**
	 * The singleton instance.
	 *
	 * @since 1.0
	 *
	 * @var HappyForms_Admin_Notices
	 */
	private static $instance;

	/**
	 * The notices registered for the current session.
	 *
	 * @since 1.0
	 *
	 * @var array
	 */
	private $notices = array();

	/**
	 * The singleton constructor.
	 *
	 * @since 1.0
	 *
	 * @return HappyForms_Admin_Notices
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		self::$instance->hook();

		return self::$instance;
	}

	/**
	 * Register hooks.
	 *
	 * @since 1.0
	 *
	 * @return void
	 */
	public function hook() {
		add_action( 'admin_notices', array( $this, 'display_admin_notices' ) );
		add_action( 'admin_notices', array( $this, 'display_review_notice' ) );
		add_action( 'happyforms_preview_notices', array( $this, 'display_preview_notices' ) );
		add_action( 'happyforms_form_before', array( $this, 'handle_preview_notices' ), 20 );
		add_action( 'wp_ajax_happyforms_hide_notice', array( $this, 'handle_ajax' ) );
		add_action( 'wp_ajax_happyforms_review_notice_action', array( $this, 'review_notice_action' ) );
	}

	/**
	 * Register a notice to be displayed after the next refresh.
	 *
	 * @since 1.0
	 *
	 * @param int|string $id      The notice ID.
	 * @param string     $message The notice message.
	 * @param array      $args    Configuration data for the notice.
	 * @param WP_User    $user    An optional user to scope this notice to.
	 *
	 * @return void
	 */
	public function register( $id, $message, $args = array(), WP_User $user = null ) {
		$defaults = array(
			'cap' => 'switch_themes',
			'dismissible' => false,
			'screen' => array( 'dashboard' ),
			'type' => 'info',
			'one-time' => false,
		);

		$args = wp_parse_args( $args, $defaults );
		$notice = array_merge( array( 'message' => $message ), $args );
		$this->notices[$id] = $notice;

		$transient_id = $this->get_user_transient_id();
		$user_notices = $this->get_user_notices();
		$user_notices[$id] = $notice;
		set_transient( $transient_id, $user_notices );
	}

	/**
	 * Get the registered notices for the current session.
	 *
	 * @since 1.0
	 *
	 * @param WP_Screen $screen The current screen object.
	 *
	 * @return array
	 */
	private function get_notices( $screen_id = '' ) {
		$notices = array();
		$dismissed = $this->get_dismissed_notices( get_current_user_id() );

		foreach ( $this->notices as $id => $notice ) {
			if ( current_user_can( $notice['cap'] )
				&& in_array( $screen_id, $notice['screen'] )
				&& ! in_array( $id, $dismissed ) ) {
				$notices[$id] = $notice;
			}
		}

		$user_notices = $this->get_user_notices();

		foreach ( $user_notices as $id => $notice ) {
			if ( current_user_can( $notice['cap'] ) && in_array( $screen_id, $notice['screen'] ) && ! in_array( $id, $dismissed ) ) {
				$notices[$id] = $notice;
			}
		}

		if ( ! empty( $user_notices ) ) {
			$transient_id = $this->get_user_transient_id();
			delete_transient( $transient_id );
		}

		return $notices;
	}

	/**
	 * Get the registered notices for the specified user.
	 *
	 * @since 1.0
	 *
	 * @param WP_User $user The user object to fetch notices for.
	 *
	 * @return array
	 */
	private function get_user_notices( WP_User $user = null ) {
		$transient_id = $this->get_user_transient_id();
		$notices = get_transient( $transient_id );
		$notices = false !== $notices ? $notices : array();

		return $notices;
	}

	/**
	 * Action: display the notices registered for the current section.
	 *
	 * @since 1.0
	 *
	 * @hooked action admin_notices
	 *
	 * @return void
	 */
	public function display( $screen_id = '' ) {
		$notices = $this->get_notices( $screen_id );

		foreach ( $notices as $id => $notice ) {
			$type = $notice['type'];

			$default_classes = array( 'notice', 'happyforms-notice' );
			$extra_classes = ( isset( $notice['classes'] ) ) ? $notice['classes'] : array( 'notice-' . $type );

			$classes = array_merge( $default_classes, $extra_classes );

			$message = $notice['message'];
			$dismissible = wp_validate_boolean( $notice['dismissible'] );
			$onetime = wp_validate_boolean( $notice['one-time'] );
			$nonce = ( $dismissible && ! $onetime ) ? ' data-nonce="' . esc_attr( wp_create_nonce( 'happyforms_dismiss_' . $id ) ) . '"' : '';

			if ( $dismissible ) {
				$classes[] = 'is-dismissible';
			}

			$classes_string = implode( ' ', $classes );
			?>
			<div id="happyforms-notice-<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes_string ); ?>"<?php echo $nonce; ?>>
				<?php if ( isset( $notice['title'] ) ) : ?>
					<h2 class="happyforms-notice__title"><?php echo $notice['title']; ?></h2>
				<?php endif; ?>
				<?php
				if ( 'custom' !== $type ) :
					echo wpautop( $message );
				else:
					echo $message;
				endif;
				?>
				<?php if ( $dismissible && 'custom' === $type && 'happyforms-preview' === $screen_id ) : ?>
					<a href="#" class="happyforms-dismiss-notice"></a>
				<?php endif; ?>
			</div>
			<?php
		}
	}

	public function display_admin_notices() {
		$screen = get_current_screen();
		return $this->display( $screen->id );
	}

	public function display_preview_notices() {
		$screen_id = 'happyforms-preview';
		return $this->display( $screen_id );
	}

	public function handle_preview_notices( $form ) {
		if ( happyforms_is_preview() ) {
			$user_id = get_current_user_id();
			$notices = $this->get_notices( 'happyforms-preview' );
			$dismissed_notices = $this->get_dismissed_notices( $user_id );

			if ( 0 !== $form['ID'] ) {
				foreach ( $notices as $id => $notice ) {
					if ( 0 === $id ) {
						continue;
					}

					$new_form_notice_id = str_replace( $form['ID'], 0, $id );

					if ( in_array( $new_form_notice_id, $dismissed_notices ) && ! in_array( $id, $dismissed_notices ) ) {
						$dismissed_new_form_notice_id_index = array_search( $new_form_notice_id, $dismissed_notices );
						unset( $dismissed_notices[$dismissed_new_form_notice_id_index] );

						array_push( $dismissed_notices, $id );
					}
				}

				$this->update_dismissed_notices( $user_id, $dismissed_notices );
			}
		}
	}

	/**
	 * Get the transient ID for the specified user.
	 *
	 * @since 1.0
	 *
	 * @param WP_User $user The user to retrieve the transient ID for.
	 *
	 * @return string
	 */
	public function get_user_transient_id( WP_User $user = null ) {
		if ( is_null( $user ) ) {
			$user = wp_get_current_user();
		}

		return 'happyforms_admin_notices_' . md5( $user->user_login );
	}

	/**
	 * Action: handle ajax requests of notice dismissal.
	 *
	 * @since 1.0
	 *
	 * @hooked action wp_ajax_happyforms_hide_notice
	 *
	 * @return void
	 */
	public function handle_ajax() {
		// Only run this during an Ajax request.
		if ( 'wp_ajax_happyforms_hide_notice' !== current_action() ) {
			return;
		}

		// Get POST parameters
		$nid = isset( $_POST['nid'] )   ? sanitize_key( $_POST['nid'] ) : false;
		$nonce = isset( $_POST['nonce'] ) ? $_POST['nonce'] : false;

		// Check requirements
		if ( ! defined( 'DOING_AJAX' ) ||
			true !== DOING_AJAX ||
			false === $nid ||
			false === $nonce ||
			! wp_verify_nonce( $nonce, 'happyforms_dismiss_' . $nid ) ) {
			// Requirement check failed. Bail.
			wp_die();
		}

		// Get the array of notices that the current user has already dismissed
		$user_id = get_current_user_id();
		$dismissed = $this->get_dismissed_notices( $user_id );

		// Add a new notice to the array
		$dismissed[] = $nid;
		$success = $this->update_dismissed_notices( $user_id, $dismissed );

		// Return a success response.
		if ( $success ) {
			echo 1;
		}
		wp_die();
	}

	public function review_notice_action(){
		if ( 'wp_ajax_happyforms_review_notice_action' !== current_action() ) {
			return;
		}

		if ( isset( $_POST[ 'recommend' ] ) ) {
			// if dismiss hider permanently
			set_transient( 'happyforms_review_notice_recommend', $_POST[ 'recommend' ], 0 );
		}

		if ( isset( $_POST[ 'dismiss' ] ) && $_POST[ 'dismiss' ] == true ) {
			// if dismiss hider permanently
			delete_transient( 'happyforms_review_notice_recommend' );
			set_transient( 'happyforms_hide_review_notice', true, 0 );
		}

		echo 1;
		wp_die();
	}

	/**
	 * Return a list of dismissed notices for the specified user.
	 *
	 * @since 1.0
	 *
	 * @param int|string $user_id The ID of the user who's
	 *                            dismissed the notices.
	 *
	 * @return array
	 */
	public function get_dismissed_notices( $user_id ) {
		$dismissed = get_user_meta( $user_id, 'happyforms-dismissed-notices', true );

		if ( ! is_array( $dismissed ) ) {
			$dismissed = array();
		}

		return $dismissed;
	}

	/**
	 * Update the list of dismissed notices for the specified user.
	 *
	 * @since 1.0
	 *
	 * @param int|string $user_id The ID of the user who's
	 *                            dismissed the notices.
	 * @param array $notices      A list of notices to dismiss.
	 *
	 * @return int|boolean
	 */
	public function update_dismissed_notices( $user_id, array $notices ) {
		return update_user_meta( $user_id, 'happyforms-dismissed-notices', $notices );
	}

	public function display_review_notice() {
		 $current_screen = get_current_screen();

		 if ( $current_screen->parent_base !== 'happyforms' || get_transient( 'happyforms_defer_review_notice' ) || get_transient( 'happyforms_hide_review_notice' ) ) {
			return;
		 }
		 

		 $recommendation = (int) get_transient( 'happyforms_review_notice_recommend' );
		 $positive_rate_show = 'none';
		 $negative_rate_show = 'none';

		  if( $recommendation > 0 && $recommendation <= 2 ){
		  	$negative_rate_show = 'show';
		  }
		  if( $recommendation >= 3 ){
		  	$positive_rate_show = 'show';
		  }

		$class = 'notice is-dismissible';
?>
		<div id="happyforms-review-notice" class="<?php echo $class; ?>" style="display: flex; align-items: center;">
			<?php if( $recommendation == 0 ): ?>
			<div id="hf-recommend-screen" class="hf-review-notice-wrap">
				<p><strong>Quick question. Would you recommend HappyForms to a friend?</strong></p>
				<p>
					<input type="radio" id="hf-veryunlikely" name="happyforms-rate" value="1"><label for="hf-veryunlikely">Very unlikely</label>
					<input type="radio" id="hf-unlikely" name="happyforms-rate" value="2"><label for="hf-unlikely">Unlikely</label>
					<input type="radio" id="hf-likely" name="happyforms-rate" value="3"><label for="hf-likely">Likely</label>
					<input type="radio" id="hf-verylikely" name="happyforms-rate" value="4"><label for="hf-verylikely">Very likely</label>
				</p>
				<p><button id="hf-rate-submit" class="button button-primary">Submit</button></p>
			</div>
			<?php endif; ?>
			<?php if( $recommendation == 0 || $recommendation <= 2 ): ?>
			<div id="hf-negative-rate" class="hf-review-notice-wrap" style="display: <?php echo $negative_rate_show;?>">
				<p><strong>Bummer. We&rsquo;re sorry to hear this.</strong></p>
				<p>What&rsquo;s up? How can we help? Just contact us to get a helping hand.</p>
				<p>&mdash;Scott, Founder at Happyforms</p>
				<p><a href="mailto:support@thethemefoundry.com" class="button button-primary" data-support="true">Ask Away</a></p>
			</div>
			<?php endif; ?>
			<?php if( $recommendation == 0 || $recommendation >= 3 ): ?>
			<div id="hf-positive-rate" class="hf-review-notice-wrap" style="display: <?php echo $positive_rate_show;?>">
				<p><strong>We see you like us. We like you too.</strong> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36" width="18" height="18"><path fill="#EF9645" d="M32.302 24.347c-.695-1.01-.307-2.47-.48-4.082-.178-2.63-1.308-5.178-3.5-7.216l-7.466-6.942s-1.471-1.369-2.841.103c-1.368 1.471.104 2.84.104 2.84l3.154 2.934 2.734 2.542s-.685.736-3.711-2.078l-10.22-9.506s-1.473-1.368-2.842.104c-1.368 1.471.103 2.84.103 2.84l9.664 8.989c-.021-.02-.731.692-.744.68L5.917 5.938s-1.472-1.369-2.841.103c-1.369 1.472.103 2.84.103 2.84L13.52 18.5c.012.012-.654.764-.634.783l-8.92-8.298s-1.472-1.369-2.841.103c-1.369 1.472.103 2.841.103 2.841l9.484 8.82c.087.081-.5.908-.391 1.009l-6.834-6.356s-1.472-1.369-2.841.104c-1.369 1.472.103 2.841.103 2.841L11.896 30.71c1.861 1.731 3.772 2.607 6.076 2.928.469.065 1.069.065 1.315.096.777.098 1.459.374 2.372.934 1.175.72 2.938 1.02 3.951-.063l3.454-3.695 3.189-3.412c1.012-1.082.831-2.016.049-3.151z"/><path d="M1.956 35.026c-.256 0-.512-.098-.707-.293-.391-.391-.391-1.023 0-1.414L4.8 29.77c.391-.391 1.023-.391 1.414 0s.391 1.023 0 1.414l-3.551 3.55c-.195.195-.451.292-.707.292zm6.746.922c-.109 0-.221-.018-.331-.056-.521-.182-.796-.752-.613-1.274l.971-2.773c.182-.521.753-.795 1.274-.614.521.183.796.753.613 1.274l-.971 2.773c-.144.412-.53.67-.943.67zm-7.667-7.667c-.412 0-.798-.257-.943-.667-.184-.521.089-1.092.61-1.276l2.495-.881c.523-.18 1.092.091 1.276.61.184.521-.089 1.092-.61 1.276l-2.495.881c-.111.039-.223.057-.333.057zm29.46-21.767c-.256 0-.512-.098-.707-.293-.391-.391-.391-1.024 0-1.415l3.552-3.55c.391-.39 1.023-.39 1.414 0s.391 1.024 0 1.415l-3.552 3.55c-.195.196-.451.293-.707.293zm-4.164-1.697c-.109 0-.221-.019-.33-.057-.521-.182-.796-.752-.614-1.274l.97-2.773c.183-.521.752-.796 1.274-.614.521.182.796.752.614 1.274l-.97 2.773c-.144.413-.531.671-.944.671zm6.143 5.774c-.412 0-.798-.257-.943-.667-.184-.521.09-1.092.61-1.276l2.494-.881c.522-.185 1.092.09 1.276.61.184.521-.09 1.092-.61 1.276l-2.494.881c-.111.039-.223.057-.333.057z" fill="#FA743E"/><path fill="#FFDB5E" d="M35.39 23.822c-.661-1.032-.224-2.479-.342-4.096-.09-2.634-1.133-5.219-3.255-7.33l-7.228-7.189s-1.424-1.417-2.843.008c-1.417 1.424.008 2.842.008 2.842l3.054 3.039 2.646 2.632s-.71.712-3.639-2.202c-2.931-2.915-9.894-9.845-9.894-9.845s-1.425-1.417-2.843.008c-1.418 1.424.007 2.841.007 2.841l9.356 9.31c-.02-.02-.754.667-.767.654L9.64 4.534s-1.425-1.418-2.843.007c-1.417 1.425.007 2.842.007 2.842l10.011 9.962c.012.012-.68.741-.66.761L7.52 9.513s-1.425-1.417-2.843.008.007 2.843.007 2.843l9.181 9.135c.084.083-.53.891-.425.996l-6.616-6.583s-1.425-1.417-2.843.008.007 2.843.007 2.843l10.79 10.732c1.802 1.793 3.682 2.732 5.974 3.131.467.081 1.067.101 1.311.14.773.124 1.445.423 2.34 1.014 1.15.759 2.902 1.118 3.951.07l3.577-3.576 3.302-3.302c1.049-1.05.9-1.99.157-3.15z"/></svg></p>
				<p>Now you&rsquo;ve got us curious, why do you like what we do? How can we do better? Can you <a href="https://wordpress.org/support/plugin/happyforms/reviews/?filter=5" data-review="true" target="_blank">share your thoughts in a review on WordPress.org?</a><br>We're just an indie startup playing ball alongsides some big wigs. Your five-star review helps us keep our collective middle finger raised, sayin&rsquo; &ldquo;nah&rdquo; to what really sucks &lsquo;bout forms.</p>
				<p>&mdash;Scott, Founder at Happyforms</p>
				<p><a href="https://wordpress.org/support/plugin/happyforms/reviews/?filter=5" class="button button-primary" data-review="true" target="_blank">Write a review on WordPress.org</a></p>
			</div>
			<?php endif; ?>
		</div>
		<?php
	}

}

if ( ! function_exists( 'happyforms_get_admin_notices' ) ):
/**
 * Get the HappyForms_Admin_Notices class instance.
 *
 * @since 1.0
 *
 * @return HappyForms_Admin_Notices
 */
function happyforms_get_admin_notices() {
	return HappyForms_Admin_Notices::instance();
}

endif;

/**
 * Initialize the HappyForms_Admin_Notices class immediately.
 */
happyforms_get_admin_notices();
