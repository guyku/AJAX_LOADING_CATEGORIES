<?php

add_action( 'wp_ajax_nopriv_filter', 'filter_ajax' );
add_action( 'wp_ajax_filter', 'filter_ajax' );

function filter_ajax() {


$category = $_POST['category'];

$args = array(
		'post_type' => 'post',
		'posts_per_page' => -1
		);

if(isset($category)) {
	$args['category__in'] = array($category);
}

		$query = new WP_Query($args);

		if($query->have_posts()) :
			while($query->have_posts()) : $query->the_post();?>
				
				<div id="main-content" class="cat<?php echo do_shortcode('[return_cat_id]'); ?>">

				<div id="inside">

					<div class="container-wrap">


			

	<div class="cell<?php echo do_shortcode('[return_cat_id]'); ?> cell" id="color index-cell cell<?php echo do_shortcode('[return_post_id]'); ?>">	


<h2><p id="p3"><?php the_title();?></p></h2> 	

<?php the_content(); ?>

<p>Date: <?php the_time('F jS, Y'); ?></p>	

	</div>

</div>

</div>

</div>

	<?php endwhile; ?>



	<?php

	else :
	echo '<p>No content found</p>';

	endif;
	wp_reset_postdata();


	die();
}
