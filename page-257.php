<?php get_header(); ?>

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


<div id="container" class="content">

<?php

    $cat_args = array(
        'orderby'      => 'date',
        'order'        => 'DESC',
        'child_of'     => 0,
        'parent'       => '',
        'type'         => 'post',
        'hide_empty'   => true,
        'taxonomy'     => 'category',
    );

    $categories = get_categories( $cat_args );

    foreach ( $categories as $category ) {

        $query_args = array(
            'post_type'      => 'post',
            'category_name'  => $category->slug,
            'posts_per_page' => 4,
            'orderby'        => 'date',
            'order'          => 'DESC'
        );

        $recent = new WP_Query($query_args);

        ?>

<!-- CATEGORY TITLE -->
<br>
      <p><hr class="style-one" width="1000" align="center"></p>     <!-- CATEGORY LINE DIVIDER -->

      <h222 align="center" >
        
          
        <p class="index-category-title cat<?php echo do_shortcode('[return_cat_id]'); ?>-title"><a href="/index.php?cat=3"><?php echo $category->slug;?></a></p>
        
      </h222>
<br>
<!-- /CATEGORY TITLE -->


        <?php while( $recent->have_posts() ) :
            $recent->the_post();
        ?>

        <div class="element-item transition <?php echo $category->slug;?>" data-category="<?php echo $category->slug;?>">
            

<div class="cell<?php echo do_shortcode('[return_cat_id]'); ?> cell" id="color index-cell cell<?php echo do_shortcode('[return_post_id]'); ?>">
																
	
<h2><p id="p3"><?php the_title();?></p></h2> 	

<?php the_content(); ?>

<p>Date: <?php the_time('F jS, Y'); ?></p>		
						
						
					</div>



        </div>
        <?php endwhile;
    
    ?> 

<!-- SHOW MORE -->
<br><br><br><p class="index-showmore cat3-more"><a href="/index.php?cat=3">show more &raquo;</a></p>
<!-- /SHOW MORE -->

    <?php }
    wp_reset_postdata();
?>

</div>









