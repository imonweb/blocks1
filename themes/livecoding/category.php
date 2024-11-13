<?php get_header(); ?>
<?php 
	$queried_obj = Imon\LC_THEME\Categories::current_category(); 
	$title = $queried_obj->cat_name;
?>

<?php get_footer(); ?>