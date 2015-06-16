<?php


/**
 * Wrapper function to make it look pretty in comments.php.
 */
function adams_comment_form() {

  $commenter = wp_get_current_commenter();
  $req = get_option( 'require_name_email' );
  $aria_req = ( $req ? " aria-required='true'" : '' );

  $fields =  array(
    'author' =>
      '<p><input id="author" class="comment-form__author form__text" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
      '" size="30"' . $aria_req . ' /><label for="author">' . __( 'Name', 'domainreference' ) . ( $req ? '<span class="required">Required</span>' : '' ) . '</label></p>',
  
    'email' =>
      '<p><input id="email" class="comment-form__email form__text" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
      '" size="30"' . $aria_req . ' /><label for="email">' . __( 'Email', 'domainreference' ) . ( $req ? '<span class="required">Required (but not displayed)</span>' : '' ) .'</label></p>',
  
    'url' =>
      '<p><input id="url" class="comment-form__url form__text" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
      '" size="30" /><label for="url">' . __( 'Website', 'domainreference' ) . '</label></p>',
  );


  $comments_args = array(
    'class_submit'=>'comment-form__submit form__submit',
    // change the title of the reply section
    'title_reply'=>'Write a Reply or Comment',
    // remove text before fields.
    'comment_notes_before' => '',
    // remove "Text or HTML to be displayed after the set of comment fields"
    'comment_notes_after' => '',
    // redefine your own textarea (the comment body)
    'comment_field' => '<textarea id="comment" class="comment-form__text form__textarea" name="comment" aria-required="true"></textarea></p>',
    'fields' => apply_filters( 'comment_form_default_fields', $fields ),
  );

  comment_form($comments_args);
}

/**
 * Custom comment callback.
 */
function adams_comments_comment($comment, $args, $depth) { ?>
  <li <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="li-comment-<?php comment_ID(); ?>">
    <a name="comment-<?php comment_ID(); ?>"></a>
   
    <div class="comment__avatar">
      <?php echo get_avatar( $comment, 55 ); ?>
    </div>
        
    <div class="comment__content">
		  <span class="comment__name">
		    <a href="<?php get_comment_author_link(); ?>" rel="external nofollow" class="url url"><?php print get_comment_author(); ?></a>
		  </span>
		  
      <div class="comment__meta">
        <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>" title="Direct link to this comment">
          <?php  printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?>
  		  </a>
  		</div>
      <div class="comment__text" id="comment-<?php comment_ID(); ?>">
    	   
        <?php comment_text(); ?>
    	  <div class="comment__reply reply">
          <?php comment_reply_link( array_merge( $args, array( 'add_below' => 'comment', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
  	    </div>
      </div>    
    </div>
  </li>
<?php
}