<?php
/**
 * LearnPress Assignment Metabox
 * Use in LP4.
 */
class LP_Assignment_Meta_Box_Document {
	public static function metabox() {
		return apply_filters(
			'lp/metabox/assignment/document/lists',
			array(
				'_lp_attachments'  => array(
					'label'       => esc_html__( 'Attachments', 'learnpress-assignments' ),
					'description' => esc_html__( 'Attach the related documentations here!.', 'learnpress-assignments' ),
					'multil'      => true,
					'default'     => '',
					'type'        => 'file',
				),
				'_lp_introduction' => array(
					'label'       => esc_html__( 'Introduction', 'learnpress-assignments' ),
					'description' => esc_html__( 'A little help for students to get the right answer.', 'learnpress-assignments' ),
					'default'     => '',
					'type'        => 'textarea',
				),
			)
		);
	}

	public static function output( $post ) {
		wp_nonce_field( 'learnpress_save_meta_box', 'learnpress_meta_box_nonce' );
		?>

		<div class="lp-meta-box lp-meta-box--assignments">
			<div class="lp-meta-box__inner">
				<?php
				do_action( 'learnpress/assignment-document/before' );

				if ( function_exists( 'lp_meta_box_output' ) ) {
					lp_meta_box_output( self::metabox() );
				}

				do_action( 'learnpress/assignment-document/after' );
				?>
			</div>
		</div>

		<?php
	}

	public static function save( $post_id ) {
		$image_advanced = isset( $_POST['_lp_attachments'] ) ? wp_unslash( array_filter( explode( ',', $_POST['_lp_attachments'] ) ) ) : array();
		$introduction   = isset( $_POST['_lp_introduction'] ) ? wp_unslash( $_POST['_lp_introduction'] ) : '';

		update_post_meta( $post_id, '_lp_attachments', $image_advanced );
		update_post_meta( $post_id, '_lp_introduction', $introduction );
	}
}

class LP_Assignment_Meta_Box_Settings {
	public static function metabox() {
		return apply_filters(
			'lp/metabox/assignment/document/lists',
			array(
				'_lp_duration'          => array(
					'label'             => esc_html__( 'Duration', 'learnpress-assignments' ),
					'default_time'      => 'day',
					'default'           => '3',
					'custom_attributes' => array(
						'min'  => '0',
						'step' => '1',
					),
					'type'              => 'duration',
				),
				'_lp_mark'              => array(
					'label'             => esc_html__( 'Mark', 'learnpress-assignments' ),
					'description'       => esc_html__( 'Maximum mark can the students receive.', 'learnpress-assignments' ),
					'type'              => 'number',
					'type_input'        => 'number',
					'default'           => '10',
					'custom_attributes' => array(
						'min'  => '0',
						'step' => '0.1',
					),
				),
				'_lp_passing_grade'     => array(
					'label'             => esc_html__( 'Passing Grade', 'learnpress-assignments' ),
					'description'       => esc_html__( 'Requires user reached this point to pass the assignment.', 'learnpress-assignments' ),
					'default'           => '8',
					'custom_attributes' => array(
						'min'  => '0',
						'step' => '0.1',
					),
					'type'              => 'number',
					'type_input'        => 'number',
				),
				'_lp_retake_count'      => array(
					'label'             => esc_html__( 'Re-take', 'learnpress-assignments' ),
					'description'       => esc_html__( 'How many times the user can re-take this assignment. Set to 0 to disable', 'learnpress-assignments' ),
					'default'           => '0',
					'custom_attributes' => array(
						'min'  => '0',
						'step' => '1',
					),
					'type'              => 'number',
					'type_input'        => 'number',
				),
				'_lp_upload_files'      => array(
					'label'             => esc_html__( 'Upload files', 'learnpress-assignments' ),
					'description'       => esc_html__( 'Number files the user can upload with this assignment. Set to 0 to disable', 'learnpress-assignments' ),
					'default'           => '1',
					'custom_attributes' => array(
						'min'  => '0',
						'step' => '1',
					),
					'type'              => 'number',
					'type_input'        => 'number',
				),
				'_lp_file_extension'    => array(
					'label'       => esc_html__( 'File Extensions', 'learnpress-assignments' ),
					'description' => esc_html__( 'Which types of file will be allowed uploading?', 'learnpress-assignments' ),
					'type'        => 'text',
					'default'     => 'jpg,txt,zip,pdf,doc,docx,ppt',
				),
				'_lp_upload_file_limit' => array(
					'label'             => esc_html__( 'Size Limit', 'learnpress-assignments' ),
					'description'       => esc_html__( 'Set Maximum Attachment size for upload ( set less than 128 MB)', 'learnpress-assignments' ),
					'default'           => '2',
					'custom_attributes' => array(
						'min'  => '0',
						'step' => '1',
					),
					'type'              => 'number',
					'type_input'        => 'number',
				),
			)
		);
	}

	public static function output( $post ) {
		wp_nonce_field( 'learnpress_save_meta_box', 'learnpress_meta_box_nonce' );
		?>

		<div class="lp-meta-box lp-meta-box--assignments">
			<div class="lp-meta-box__inner">
				<?php
				do_action( 'learnpress/assignment-settings/before' );

				if ( function_exists( 'lp_meta_box_output' ) ) {
					echo lp_meta_box_output( self::metabox() );
				}

				do_action( 'learnpress/assignment-settings/after' );
				?>
			</div>
		</div>

		<?php
	}

	public static function save( $post_id ) {
		$duration       = isset( $_POST['_lp_duration'][0] ) && $_POST['_lp_duration'][0] !== '' ? implode( ' ', wp_unslash( $_POST['_lp_duration'] ) ) : '0 minute';
		$mark           = isset( $_POST['_lp_mark'] ) ? floatval( wp_unslash( $_POST['_lp_mark'] ) ) : 10;
		$passing_grade  = isset( $_POST['_lp_passing_grade'] ) ? floatval( wp_unslash( $_POST['_lp_passing_grade'] ) ) : 8;
		$retake         = isset( $_POST['_lp_retake_count'] ) ? absint( wp_unslash( $_POST['_lp_retake_count'] ) ) : 0;
		$upload         = isset( $_POST['_lp_upload_files'] ) ? absint( wp_unslash( $_POST['_lp_upload_files'] ) ) : 1;
		$file_extension = isset( $_POST['_lp_file_extension'] ) ? wp_unslash( $_POST['_lp_file_extension'] ) : 'jpg,txt,zip,pdf,doc,docx,ppt';
		$limit          = isset( $_POST['_lp_upload_file_limit'] ) ? absint( wp_unslash( $_POST['_lp_upload_file_limit'] ) ) : 2;

		update_post_meta( $post_id, '_lp_duration', $duration );
		update_post_meta( $post_id, '_lp_mark', $mark );
		update_post_meta( $post_id, '_lp_passing_grade', $passing_grade );
		update_post_meta( $post_id, '_lp_retake_count', $retake );
		update_post_meta( $post_id, '_lp_upload_files', $upload );
		update_post_meta( $post_id, '_lp_file_extension', $file_extension );
		update_post_meta( $post_id, '_lp_upload_file_limit', $limit );

	}
}

add_action( 'learnpress_save_lp_assignment_metabox', 'LP_Assignment_Meta_Box_Document::save' );
add_action( 'learnpress_save_lp_assignment_metabox', 'LP_Assignment_Meta_Box_Settings::save' );
