<div class="page-buttons">

<a href="http://test.local/about/">About</a>
<a href="http://test.local/Blog/">Blog</a>
<a href="http://test.local/Contact/">Contact</a>

</div>

<div class="categories">
	<ul>
		<li class="js-filter-item"><a href="http://test.local/home/">All Categories</a></li>
		<li class="js-filter-item"><a href="<?= home_url(); ?>">All Ajax Filter</a></li>
<?php 
$cat_args = array(
	'exclude' => array(1),
	'option_all' => 'All'
);

$categories = get_categories($cat_args);

foreach($categories as $cat) : ?>
	<li class="js-filter-item"><a data-category="<?= $cat->term_id; ?>" href="<?= get_category_link($cat->term_id); ?>"><?= $cat->name; ?></a></li>
<?php endforeach; ?>
</ul>
</div>