<?php
$comments = get_comments( array(
	'post_id' => $post->ID,
	'number' => 10,
	'status' => 'approve'
	) );
foreach($comments as $comment)  {
	$d = "F jS, Y";
	$comment_date = get_comment_date( $d, $comment_ID );
	echo '<div class="review">';
	echo get_avatar($comment,$size='32',$default='<path_to_url>' ); 
	$user_name_str = substr(get_comment_author(),0, 20); 
	echo '<h6>'.$user_name_str.' - '.$comment_date.'</h6>';
	comment_text();
	echo '</div>'; 
}
?>