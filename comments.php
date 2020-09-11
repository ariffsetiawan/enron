<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Enron
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
<div style="clear:both;height:30px;"></div>

<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h4 class="comments-number">Comments (<?php echo get_comments_number();?>)</h4>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'enron' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'enron' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'enron' ) ); ?></div>
		</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation ?>

		<ul class="commentlist">
			<?php
				// wp_list_comments( array(
					// 'style'      => 'ul',
					// 'short_ping' => true,
				// ) );
				wp_list_comments('type=comment&callback=enron_comment');
			?>
		</ul><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'enron' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'enron' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'enron' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'enron' ); ?></p>
	<?php endif; ?>

	<?php //comment_form(); ?>
	
	<?php
	$comments_args = array(
  'id_form'           => 'commentform',
  'id_submit'         => 'submit',
  'title_reply'       => __( 'Leave a Reply' ),
  'title_reply_to'    => __( 'Leave a Reply to %s' ),
  'cancel_reply_link' => __( 'Cancel Reply' ),
  'label_submit'      => __( 'Post Comment' ),

  'comment_field' =>  '<div class="form-row"><div class="input-wrapper"><label for="comment" style="color: #6F6F6F;left: 12px;position: absolute;top: 8px;display: block;margin-bottom: 5px;">' . _x( 'Comment', 'noun' ) .
    '</label><textarea id="comment" name="comment" cols="30" rows="10" aria-required="true">' .
    '</textarea><i class="icon-edit"></i></div></div>',

  'must_log_in' => '<p class="must-log-in">' .
    sprintf(
      __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
      wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
    ) . '</p>',

  'logged_in_as' => '<p class="logged-in-as">' .
    sprintf(
    __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ),
      admin_url( 'profile.php' ),
      $user_identity,
      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
    ) . '</p>',

  'comment_notes_before' => '<p class="comment-notes">' .
    __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) .
    '</p>',

  'comment_notes_after' => '',

  'fields' => apply_filters( 'comment_form_default_fields', array(

    'author' =>
      '<div class="form-row"><div class="col1 input-wrapper">' .
      '<label for="author" style="color: #6F6F6F;left: 12px;position: absolute;top: 8px;display: block;margin-bottom: 5px;">' . __( 'Name', 'domainreference' ) . '</label> ' .
      '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
      '" size="30"' . $aria_req . ' /><i class="icon-3d-glasses"></i></div></div>',

    'email' =>
      '<div class="form-row"><div class="col1 input-wrapper"><label for="email" style="color: #6F6F6F;left: 12px;position: absolute;top: 8px;display: block;margin-bottom: 5px;">' . __( 'Email', 'domainreference' ) . '</label> ' .
      '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
      '" size="30"' . $aria_req . ' /><i class="icon-envelope"></i></div></div>',

    'url' =>
      '<div class="form-row"><div class="col1 input-wrapper"><label for="url" style="color: #6F6F6F;left: 12px;position: absolute;top: 8px;display: block;margin-bottom: 5px;">' .
      __( 'Website', 'domainreference' ) . '</label>' .
      '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
      '" size="30" /><i class="icon-link"></i></div></div>'
    )
  ),
);

	comment_form($comments_args);
	?>

</div><!-- #comments -->

