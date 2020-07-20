<!DOCTYPE html>
<html <?php language_attributes(); ?>>


  <head>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<?php wp_head() ?>
  </head>


  <body <?php body_class(); ?>>

    <div id="content">

     <?php include('content.php'); ?>

    </div>


	<?php wp_footer() ?>
  </body>

</html>
