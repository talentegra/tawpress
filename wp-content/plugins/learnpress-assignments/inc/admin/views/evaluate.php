<?php
/**
 * Admin View: Assignment evaluate page.
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit();
?>

<?php
$assignment_id = LP_Request::get_int( 'assignment_id' );
$user_id       = LP_Request::get_int( 'user_id' );

if ( ! learn_press_assignment_verify_url( $assignment_id ) ) {
	?>
	<div id="error-page">
		<p><?php _e( 'Sorry, you are not allowed to access this page.', 'learnpress-assignments' ); ?></p>
	</div>
	<?php
	return;
}

if ( ! $user_id ) {
	esc_html_e( 'Invalid student', 'learnpress-assignments' );

	return;
}

if ( ! $assignment = learn_press_get_assignment( $assignment_id ) ) {
	esc_html_e( 'Invalid course', 'learnpress-assignments' );

	return;
}
?>

<?php
$assignment_db = LP_Assigment_DB::getInstance();
$user          = learn_press_get_user( $user_id );
$course        = learn_press_get_item_courses( $assignment_id );
$lp_course     = learn_press_get_course( $course[0]->ID );

$course_data = $user->get_course_data( $lp_course->get_id() );

$evaluated = $user->has_item_status( array( 'evaluated' ), $assignment_id, $lp_course->get_id() );

// $item = $course_data->get_item( $assignment_id );

/*** code fix temporary - tungnx */
global $wpdb;
$tb_lp_user_items = $wpdb->prefix . 'learnpress_user_items';
$query            = $wpdb->prepare(
	"
	SELECT * FROM $tb_lp_user_items
	WHERE user_id = %d
	AND item_type = 'lp_assignment'
	AND item_id = %d",
	$user_id,
	$assignment_id
);

$result = $wpdb->get_row( $query );

if ( ! $result || ! is_object( $result ) ) {
	return;
}

$user_item_id = $result->user_item_id;
/*** End */


//$last_answer    = learn_press_get_user_item_meta( $user_item_id, '_lp_assignment_answer_note', true );
$last_answer    = $assignment_db->get_extra_value( $user_item_id, $assignment_db::$answer_note_key );
$uploaded_files = learn_press_assignment_get_uploaded_files( $user_item_id );
?>

<div class="wrap" id="learn-press-evaluate">
	<h2><?php esc_html_e( 'Evaluate Form', 'learnpress-assignments' ); ?></h2>
	<a href="<?php echo esc_url( learn_press_assignment_students_url( $assignment_id ) ); ?>"><?php esc_html_e( 'Back to list students', 'learnpress-assignments' ); ?></a>

	<div id="poststuff" class="<?php echo $evaluated ? esc_attr( 'assignment-evaluated' ) : ''; ?>">
		<form method="post">
			<input type="hidden" name="user_item_id" value="<?php echo esc_attr( $user_item_id ); ?>">

			<div id="post-body" class="metabox-holder columns-2">
				<div id="postbox-container-1" class="postbox-container">
					<div id="side-sortables" class="meta-box-sortables ui-sortable">
						<div id="submitdiv" class="postbox ">
							<h2 class="hndle ui-sortable-handle">
								<span><?php esc_html_e( 'Actions', 'learnpress-assignments' ); ?></span>
							</h2>

							<div class="inside">
								<div class="submitbox" id="submitpost">
									<div id="minor-publishing">
										<div id="major-publishing-actions">
											<?php if ( ! $evaluated ) : ?>
												<input name="action" type="submit" class="button button-large" value="<?php esc_attr_e( 'save', 'learnpress-assignments' ); ?>">
											<?php endif; ?>
											<input name="action" type="submit" class="button button-primary button-large evaluate" value="<?php echo $evaluated ? esc_attr_e( 're-evaluate', 'learnpress-assignments' ) : esc_attr_e( 'evaluate', 'learnpress-assignments' ); ?>">
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
				<div id="postbox-container-2" class="postbox-container">
					<div class="inside">
						<h3 class="assignment-title">
							<a href="<?php echo esc_url( $assignment->get_edit_link() ); ?>" target="_blank" rel="noreferrer noopener">
								<?php echo esc_html( $assignment->get_title() ); ?>
							</a>
						</h3>

						<?php $intro = get_post_meta( $assignment_id, '_lp_introduction', true ); ?>
						<?php if ( $intro ) : ?>
							<div class="assignment-content"><?php echo $intro; ?></div>
						<?php endif; ?>

						<div class="submission-heading">
							<h4 style="font-size: 16px; margin-bottom: 10px;"><?php esc_html_e( 'Submission', 'learnpress-assignments' ); ?></h4>
							<p class="description"><?php esc_html_e( 'Include student assignment answer and attach files.', 'learnpress-assignments' ); ?></p>
						</div>
						<div class="answer-content" style="display: grid; grid-template-columns: 200px 1fr;">
							<h4><label for="user-answer"><?php esc_html_e( 'Answer', 'learnpress-assignments' ); ?></label></h4>
							<div>
								<?php
								wp_editor(
									$last_answer,
									'assignment-editor-student-answer',
									array(
										'media_buttons' => false,
										'textarea_rows' => 10,
									)
								);
								?>
								<i><?php esc_html_e( 'Instructor can not modify submission of student, every change has no effect.', 'learnpress-assignments' ); ?></i>
							</div>
						</div>

						<div class="answer-uploads" style="display: grid; grid-template-columns: 200px 1fr; align-items: center;">
							<h4><label for="user-uploads"><?php esc_html_e( 'Attach File', 'learnpress-assignments' ); ?></label></h4>
							<div>
								<?php if ( $uploaded_files ) : ?>
									<ul class="assignment-files assignment-uploaded list-group list-group-flush">
										<?php foreach ( $uploaded_files as $file ) : ?>
											<li class="list-group-item">
												<a href="<?php echo esc_url( get_site_url() . '/' . $file->file ); ?>" target="_blank">
													<?php echo $file->filename; ?>
												</a>
											</li>
										<?php endforeach; ?>
									</ul>
								<?php else : ?>
									<i><?php esc_html_e( 'There is no assignments attach file(s).', 'learnpress-assignments' ); ?></i>
								<?php endif; ?>
							</div>
						</div>

						<div>
							<h4 style="font-size: 16px; margin-bottom: 10px;"><?php esc_html_e( 'Evaluation', 'learnpress-assignments' ); ?></h4>
							<p class="description"><?php esc_html_e( 'Your evaluation about student submission.', 'learnpress-assignments' ); ?></p>
						</div>

						<?php LP_Assignment_Evaluate::instance( $assignment, $user_item_id, $evaluated )->display(); ?>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
