<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package opsv3
 */
get_header(); ?>
<head>
	<meta name="p:domain_verify" content="352a10b9e96f8699008b6da3e2e01a10"/>
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	
</head>

<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<?php
      	$backgroundImage = get_field('banner_image',210);
        ?>
		<section class="top_section" style="background-size:cover; background-image: url('<?php echo $backgroundImage['sizes']['banner'];?>');?>">
			<div class="w-container">
			    <div class="w-row">
			    	<div class="w-col w-col-7">
		                <h1>
				    		<?php
	            			$altTitle = get_field('title_override', 210);
	            			if($altTitle != "") {
	            				echo $altTitle;
	            			} else {
	            				echo 'Blog';
	            			}
		            		?>
		            	</h1>
					</div>
				</div>
			</div>
		</section>
		<?php
        	if( have_rows('featured_categories', 210) ):?>
			<section class="greysection reducedbottom">
				<div class="w-container">
					<div class="w-row">
	                    <?php while ( have_rows('featured_categories', 210) ) : the_row();?>
	                		<?php
	                		$image = get_sub_field('image');
	                		$image = $image['sizes']['featuredImage'];
	                		?>
						<div class="w-col w-col-4 w-col-medium-12 w-col-small-12 w-col-tiny-12">
								<a class="cat_tile" style="position:relative;" href="<?php the_sub_field('link');?>">
								<div style="position:relative; padding: 20px 10px; text-align: center; color: #FFF; font-size: 1.5rem; line-height: 100px; height:150px; background-image: url('<?php echo $image;?>');" >
									<span class="cat_title">
										<?php the_sub_field('name');?>
									</span>
									<div class="product_overlay" style=" background-color:rgba(50,50,50,0.7);">
					                                <span style="line-height:140px;" class="blog_cat_link" href="<?php the_permalink();?>">
						                                View Blog Category
					                                </span>
					                            </div>
								</div>
									
								</a>
							</div>
						<?php endwhile;?>
					</div>
				</div>
			</section>
	        <?php
	    	endif;
	        ?>
    <section class="blogsection reducedbottom">
            <div class="w-container">
                <div class="w-row">
                	<div class="w-col w-col-9">
                		<div class="w-row">
                			<?php if ( have_posts() ) : ?>
								<?php $i=1;?>
								<?php while ( have_posts() ) : the_post(); ?>
									<?php
									if ( has_post_thumbnail() ) {
										$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'blogthumb' );
										$url = $thumb['0'];
									}
									else {
										$url = get_stylesheet_directory_uri() . '/img/placeholder.jpg';
									}

									if($i == 1) {
										$cols = "w-col w-col-12 w-col-small-12 w-col-tiny-12";
									} else {
										$cols = "w-col w-col-6 w-col-small-6 w-col-tiny-12";
									}
									?>
									<div class="<?php echo $cols;?>">
				                        <article class="blog_article roll_article">
				                            <div class="blog_image " style="background-image: url('<?=$url?>');">
				                            </div>
				                            <div class="blog_extract">
				                                <h3>
				                                    <?php the_title();?>
				                                </h3>
				                                <span class="date">
				                                	<?php the_time('j F Y'); ?>
				                                </span>
				                                <div>
				                                    <?php the_excerpt();?>
				                                </div>
				                            </div>
				                            <div class="product_overlay">
				                                <a class="blog_link" href="<?php the_permalink();?>">
					                                <span>
					                                	Read more
					                                </span>
				                                </a>
				                            </div>
				                            <a class="mobile_overlay_link" href="<?php the_permalink();?>"></a>
				                        </article>
				                    </div>
				                    <?php $i++;?>
								<?php endwhile; ?>
							<?php else : ?>
								<?php get_template_part( 'content', 'none' ); ?>
							<?php endif; ?>
							<div class="w-col w-col-12">
					    		<?php the_posts_navigation(); ?>
					    	</div>
				    	</div>
	                </div>
	                <div class="w-col w-col-3">

	                	<div class="blog_sidebar">
	                		<h3>
	                			Tags
	                		</h3>
	                		<ul class="tags">
			                	<?php $tags = get_tags();
									if ($tags) {
										foreach ($tags as $tag) {

											echo '<li><a href="' . get_tag_link( $tag->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $tag->name ) . '" ' . '>' . $tag->name.'</a></li>';
										}
									}
								?>
							</ul>
			                <?php dynamic_sidebar( 'Blog Widget' ); ?> 
			            </div>
	                </div>
                </div>
            </div>
        </section>
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();?>
