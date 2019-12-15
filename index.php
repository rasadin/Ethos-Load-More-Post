<?php  get_header(); ?>
<div class="page-header-section inner-page-header">
	<div class="page-head-content">
		<div class="page-breadcrumb-content">
			<?php echo do_shortcode('[get_breadcrumb_shortcode]'); ?>
		</div>
		<h2>Stay up to date with the latest Australian immaigration changes and news</h2>	
	</div>
</div>

<div class ="first-three_blog-post">
	<?php echo do_shortcode('[display_first_3_latest_blog_post_shortcode]'); ?>
</div>


<div class ="all-post-cat">
	<?php
	$categories = get_categories();
	echo '<div class="all-cat">' . 'All Categories' . '</div>';
	$cat_count=0;
	foreach($categories as $category) {
		$cat_count = $cat_count + 1;
	echo '<div class="'."cat".$cat_count.' cat-list"><a href="' . get_category_link($category->term_id) . '">' . $category->slug . '</a></div>';
	}?>
</div>

<div class ="all-post">
	<?php
	$categories = get_categories();
	echo do_shortcode('[blog_recent_post_load_shortcode]'); 
	?>
</div>


<div class ="all-post-filter-show">
	<?php
	$categories = get_categories();
	$cat_count=0;
	foreach($categories as $category) {
		$cat_count = $cat_count + 1;?>
		<div class ="<?php echo "cat-filter-post" . $cat_count ?>">
				<div id="ajax-filer-posts" class="row">
				<?php
					$postsPerPage = 3;
					$args = array(
							'category_name' => $category->slug,
							'post_type' => 'post',
							'posts_per_page' => $postsPerPage,
							
					);
					$loop = new WP_Query($args);
					echo $category->slug;
					while ($loop->have_posts()) : $loop->the_post();
				?>

				<div class="small-12 large-4 columns">
						<h1><?php the_title(); ?></h1>
						<p><?php //the_content(); ?></p>
				</div>

				<?php
					endwhile;
				wp_reset_postdata();
				?>
			</div>
			<div id="more_filter_posts">Load More</div>
		</div>
	<?php } ?>
		
</div>
















<?php get_footer(); ?>
