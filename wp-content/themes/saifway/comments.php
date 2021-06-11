<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to saifway_comment() which is
 * located in the includes/template-tags.php file.
 *
 * @package Saifway
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */

if ( post_password_required() ) {
	return;
}

?>

	<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<header class="page-header">
			<h3 class="comments-title">
				<?php
					printf( _nx( 'One Comment on &ldquo;%2$s&rdquo;', '%1$s Comments on &ldquo;%2$s&rdquo;', esc_html( get_comments_number() ), 'comments title', 'saifway' ),
						number_format_i18n( esc_html( get_comments_number() ) ), '<span>' . esc_html( get_the_title() ) . '</span>' );
				?>
			</h3>
		</header>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above" class="comment-navigation" role="navigation">
			<h5 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'saifway' ); ?></h5>
			<ul class="pager">
				<li class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'saifway' ) ); ?></li>
				<li class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'saifway' ) ); ?></li>
			</ul>
		</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation ?>

		<ol class="comment-list media-list">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use saifway_comment() to format the comments.
				 * If you want to overload this in a child theme then you can
				 * define saifway_comment() and that will be used instead.
				 * See saifway_comment() in includes/template-tags.php for more.
				 */
				wp_list_comments( array( 'callback' => 'saifway_comment', 'avatar_size' => 60 ) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'saifway' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'saifway' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( l__( 'Newer Comments &rarr;', 'saifway' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'saifway' ); ?></p>
	<?php endif; ?>

	<?php comment_form( $args = array(
			  'id_form'           => 'commentform',  // that's the wordpress default value! delete it or edit it ;)
			  'id_submit'         => 'commentsubmit',
			  'title_reply'       => esc_html__( 'Leave a Reply', 'saifway'),  // that's the wordpress default value! delete it or edit it ;)
			  'title_reply_to'    => esc_html__( 'Leave a Reply to %s', 'saifway'),  // that's the wordpress default value! delete it or edit it ;)
			  'cancel_reply_link' => esc_html__( 'Cancel Reply', 'saifway'),  // that's the wordpress default value! delete it or edit it ;)
			  'label_submit'      => esc_html__( 'Post Comment', 'saifway' ),  // that's the wordpress default value! delete it or edit it ;)

			  'comment_field' =>  '<p><textarea placeholder="Start typing..." id="comment" class="" name="comment" cols="20" rows="8" aria-required="true"></textarea></p>',

			  'comment_notes_after' => '<p class="form-allowed-tags"></p><div class="alert alert-info">' . allowed_tags() . '</div>'

			  // So, that was the needed stuff to have bootstrap basic styles for the form elements and buttons

			  // Basically you can edit everything here!
			  // Checkout the docs for more: http://codex.wordpress.org/Function_Reference/comment_form
			  // Another note: some classes are added in the bootstrap-wp.js - ckeck from line 1

	));

	?>

</div><!-- #comments -->
