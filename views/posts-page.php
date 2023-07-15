<?php
/*
Creating Object get_integrations and print data 
*/
 $get_integrations = new Integrations();

  echo  '<hr>';
  $loop = $get_integrations->getPosts();
  echo  '<hr>';

 if ( $loop->have_posts() ) {
    //Loop posts
	if ( $loop->have_posts() ) {
    		while ( $loop->have_posts() ) : $loop->the_post();
    			global $post;
    			$post_id = $loop->post->ID;

                echo $loop->post->post_title;
                echo '<br>';
    endwhile;
    }
}
wp_reset_postdata();
