<?php
/*
*
* Template Name: OPS Products
*
*/
?>

<?php get_header();?>
<?php if(empty($_REQUEST['cid']) && empty($_REQUEST['pid'])) get_template_part('template-parts/banner');?>
		<article id="catalogue">
				<?php if(isset($_REQUEST['url1']) && $_REQUEST['url1'] == 'search'):

		            $_REQUEST['action'] = "Search";
		            $_REQUEST['search'] = urldecode($_REQUEST['url']);
		            include_once OPS_PATH."catalog.php";
		        else:
			            include_once OPS_PATH."catalog.php";
			            
			    endif;  ?>
		</article>

<?php get_footer(); ?>