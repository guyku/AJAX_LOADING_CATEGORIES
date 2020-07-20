
<style type="text/css">
	
	div.container {
  max-width: 1250px;
 margin-left: 20px;
  margin-top: 0px;
  border: 0px solid green;
  padding-right: 0px;
  padding-left: 10%;
}
.content {
	display: grid;
  	grid-template: auto / 500px 500px;
  	grid-gap: 10px;
    grid-column-gap: 58px;
  	padding: 0px;
   	border: 0px solid green;
    margin 	
  }

</style>


<?php get_header(); ?>


<div id="container content-area" class="content js-filter load-posts-container">			<!-- CENTER CONTENT -->



	<?php

	$args = array(
		'post_type' => 'post',
		'posts_per_page' => -1,
		'category_name'  => $category->slug,
		);

		$query = new WP_Query($args);

?>
<p class="index-category-title cat<?= $cat->term_id; ?>-title"><a href="/index.php?cat=3"><?php echo $category->slug;?></a></p>
<?php
		if($query->have_posts()) :

			while($query->have_posts()) : $query->the_post(); ?>

				<div id="main-content" <?php body_class(); ?>>

				<div id="inside">

					<div class="container-wrap">
			

	<div class="cell<?php echo do_shortcode('[return_cat_id]'); ?> cell" id="index-cell cell<?php echo do_shortcode('[return_post_id]'); ?>">	

						
 								
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

?>

</div>

<div>
	<a href="" class="btn load-more" data-page="1" data-url="<?php echo admin_url('admin-ajax.php'); ?>"><span></span>Load More</a>
</div>


