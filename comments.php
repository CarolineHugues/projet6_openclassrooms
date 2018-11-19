<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
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

	<?php
	// You can start editing here -- including this comment!
	$fields =  array(

		'author' => '<div class="author-data"><p class="comment-form-author">
		<input id="author" name="author" placeholder="Prénom Nom *" aria-required="true" size="30" type="text" value="' . esc_attr($commenter['comment_author']) . '" />
		</p>',

		'email' => '<p class="comment-form-email">
	      <input id="email" name="email" value="'.$commenter['comment_email'].'" placeholder="Email * (Ne sera pas publié)" aria-required="true" size="30" type="email" /> 
	    </p></div></div>',
	);

	$comments_args = array(
	    'label_submit'=>'Envoyer',
	    'comment_notes_before' => ' ',
	    'comment_field' => '<div class="commentform"><p class="comment-form-comment"><textarea id="comment" name="comment" placeholder="Ecrire un commentaire ..." aria-required="true"></textarea></p>',
	    'fields' => apply_filters( 'comment_form_default_fields', $fields ),
	);

	comment_form($comments_args); ?>

	<section>
		<?php
		if ( have_comments() ) : ; ?>
			<ol class="comment-list">
				<?php
					wp_list_comments( array(
						'style'       => 'ol',
						'short_ping'  => true,
						'reply_text'  =>  __( 'Reply', 'twentyseventeen' ),
					) );?>
			</ol>

			<?php 
			the_comments_pagination( array(
				'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous', 'twentyseventeen' ) . '</span>',
				'next_text' => '<span class="screen-reader-text">' . __( 'Next', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
			) );
		endif; // Check for have_comments(). ?>
	</section>

	<?php 
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php _e( 'Comments are closed.', 'twentyseventeen' ); ?></p>
	<?php
	endif;	?>

</div><!-- #comments -->
