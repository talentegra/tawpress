<?php
/**
 * Template for displaying Assignment after sent.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/addons/assignments/content-assignment/buttons/result.php.
 *
 * @author  ThimPress
 * @package  Learnpress/Assignments/Templates
 * @version  3.0.1
 */

defined( 'ABSPATH' ) || exit();

$assignment_db        = LP_Assigment_DB::getInstance();
$course              = LP_Global::course();
$current_assignment  = LP_Global::course_item();
$user                = learn_press_get_current_user();
$current_useritem_id = learn_press_get_user_item_id( $user->get_id(), $current_assignment->get_id(), $course->get_id() );

if ( ! $current_useritem_id ) {
	$course_data         = $user->get_course_data( $course->get_id() );
	$current_useritem_id = $course_data->get_item( $current_assignment->get_id() )->get_user_item_id();
}

//$last_answer     = learn_press_get_user_item_meta( $current_useritem_id, '_lp_assignment_answer_note', true );
$last_answer     = $assignment_db->get_extra_value( $current_useritem_id, $assignment_db::$answer_note_key );
$uploaded_files  = learn_press_assignment_get_uploaded_files( $current_useritem_id );
$result_grade    = learn_press_assignment_get_result( $current_assignment->get_id(), $user->get_id(), $course->get_id() );
$reference_files = learn_press_get_user_item_meta( $current_useritem_id, '_lp_assignment_evaluate_upload', true );
$instructor_note = learn_press_get_user_item_meta( $current_useritem_id, '_lp_assignment_instructor_note', true );
?>

<div class="assignment-result <?php echo esc_attr( $result_grade['grade'] ); ?>">
	<h3><?php esc_html_e( 'Your Result', 'learnpress-assignments' ); ?></h3>

	<div class="result-grade">
		<span class="result-achieved"><?php echo $result_grade['user_mark']; ?></span>
		<span class="result-require"><?php echo $result_grade['mark']; ?></span>
		<p class="result-message"><?php echo sprintf( __( 'Your grade is <strong>%s</strong>', 'learnpress-assignments' ), $result_grade['grade'] == '' ? esc_html__( 'Ungraded', 'learnpress-assignments' ) : $result_grade['grade'] ); ?> </p>
	</div>
</div>

<div class="assignment-after-sent">
	<h3><?php esc_html_e( 'Your Answer:', 'learnpress-assignments' ); ?></h3>
	<blockquote><?php echo wpautop( $last_answer ); ?></blockquote>

	<?php if ( ! empty( $uploaded_files ) ) : ?>
		<h3><?php esc_html_e( 'Your Uploaded File(s):', 'learnpress-assignments' ); ?></h3>

		<div class="learn-press-assignment-uploaded">
			<ul class="assignment-files assignment-uploaded">
				<?php foreach ( $uploaded_files as $file ) : ?>
					<li><a href="<?php echo esc_url( get_site_url() . $file->url ); ?>" target="_blank"><?php echo $file->filename; ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
	<?php endif; ?>
</div>

<div class="learn_press_assignment_reference">
	<?php if ( ! empty( $instructor_note ) ) : ?>
		<h3><?php esc_html_e( 'Instructor Message:', 'learnpress-assignments' ); ?></h3>
		<blockquote><?php echo $instructor_note; ?></blockquote>
	<?php endif; ?>

	<?php if ( ! empty( $reference_files ) ) : ?>
		<h3><?php esc_html_e( 'References:', 'learnpress-assignments' ); ?></h3>

		<ul class="assignment-files assignment-references">
			<?php foreach ( $reference_files as $att_id ) : ?>
				<li><?php echo wp_get_attachment_link( $att_id, $size = 'none' ); ?></li>
			<?php endforeach; ?>

		</ul>
	<?php endif; ?>
</div>
