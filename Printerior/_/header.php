<?php
global $objCustomer;
global $objCart;
global $objMobileDetect;
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package opsv3
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type = "image/png" href="images/flavicon.jpg"/>
<?php

$_REQUEST['url1'] = $wp_query->query_vars['url1'];
$_REQUEST['url2'] = $wp_query->query_vars['url2'];
$_REQUEST['url3'] = $wp_query->query_vars['url3'];
$_REQUEST['url4'] = $wp_query->query_vars['url4'];
$_REQUEST['url5'] = $wp_query->query_vars['url5'];

if(SEOLINK_CAT == strtolower($wp_query->post->post_name)):

	include_once OPS_PATH."catalogue_meta.php";

else:?>

	<title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>

<?php endif;?>
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<link rel="stylesheet" type="text/css" media="all" href="<?= get_stylesheet_directory_uri(); ?>/style.php" />
<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-119669372-30', 'auto');
	ga('send', 'pageview');
	ga('require', 'ecommerce', 'ecommerce.js');

</script>
<meta name="msvalidate.01" content="1597DC292003D46A6D7D58D607778749" />
<meta name="p:domain_verify" content="352a10b9e96f8699008b6da3e2e01a10"/>

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'opsv3' ); ?></a>





	<!--NEW CODE-->

			<!-- MAIN HEADER -->
	<div class="top-menu"><!--this is the very top menu-->

	<div id="mobilelogo">
				<?= get_theme_mod( 'themeslug_logo' ) != '' ? '<img class="main_logo dark" src="'.get_theme_mod( 'themeslug_logo' ).'" alt="'.get_bloginfo('name') .' - '.esc_attr( get_bloginfo( 'description', 'display' ) ).'">' : get_bloginfo( 'name' )  ?>

	</div>




		<!--DETAILS-->
		<div class="details">
			<h4 style="font-size:1.4em; margin:0.5em; margin-top:1em;"> 0845 226 0476 </h4>
			<div class="account_links">
			<!--SEARCH-->
				<div class="account_link search_link" title="Search">
					<form action="<?= site_url() ?>" method="get" class="searchform" name="search-form">
						<input type="text"  name="s" id="desktopsearch"/>
						  <input type="submit" id="headersearchbutton">
					</form>
						<i class="fa fa-search"></i>
				</div>
				<!--ACCOUNTS-->
					<?php if ($objCustomer->CheckLogin()) { ?>
						<a class="account_link " title="My Account" href="<?= site_url(); ?>/my-account/">
							 <i class="fa fa-user"></i>
						</a>
						 <a class="account_link " href="<?= site_url() ?>/my-account/?logoff" title="Log Out">
							<i class="fa fa-sign-in"></i>
						</a>
					<?php } else { ?>
						<a class="account_link " href="<?= site_url(); ?>/my-account/" title="Log In">
							<i class="fa fa-user"></i> <!-- Log In-->
						</a>
					<?php } ?>
						<a class="account_link cart_link " href="<?= site_url(); ?>/checkout/cart/" title="View Cart">
							<i class="fa fa-shopping-cart"></i>
							<span class="value">

							</span>
						</a>
			</div>
		</div>
		<div class="logo">
			<a href="http://printerior.yourdevwebsite.co.uk/">
				<?= get_theme_mod( 'themeslug_logo_light' ) != '' ? '<img class="main_logo light" src="'.get_theme_mod( 'themeslug_logo_light' ).'" alt="'.get_bloginfo('name') .' - '.esc_attr( get_bloginfo( 'description', 'display' ) ).'">' : (get_theme_mod( 'themeslug_logo' ) != '' ? '<img class="main_logo light" src="'.get_theme_mod( 'themeslug_logo' ).'" alt="'.get_bloginfo('name') .' - '.esc_attr( get_bloginfo( 'description', 'display' ) ).'">' : get_bloginfo( 'name' )) ?>
				<?= get_theme_mod( 'themeslug_logo' ) != '' ? '<img class="main_logo dark" src="'.get_theme_mod( 'themeslug_logo' ).'" alt="'.get_bloginfo('name') .' - '.esc_attr( get_bloginfo( 'description', 'display' ) ).'">' : get_bloginfo( 'name' )  ?>
		    </a>
					<!-- <h3 class="motto">The Home of Printed Wallpaper </h3> -->
		</div>


	<!--This is the normal navigation bar-->
	<div class="new-header">
			<div class="w-row">

					<div class="w-col w-col-12 w-col-medium-12 w-col-small-12 w-col-tiny-12 animatedParent animateOnce">
						<nav id="site-navigation" class="main-navigation" role="navigation">
				            <ul id="primary-menu" class="menu">


					           <!-- <li id="print" class="menu-item menu-item-type-custom menu-item-object-custom mega_link">
				                    <a class="menu-parent" href="<?php echo site_url();?>/print/">
				                        <?php
				                        $title = get_field('mega_menu_title',11);
				                        if($title){
				                        	echo $title;
				                        }
				                        else{
				                        	echo 'Products';
				                        }?>
				                    </a> -->
				                    <div class="products_menu_container">
				                        <div class="products_menu">
				                            <?php
				                                $navOptions['ul-class'] = 'products_menu_list';
				                                $navOptions['idCategory'] = '';
				                                include OPS_PATH . "menus/menu-ul-basic-megamenu.php";
				                            ?>
				                            <?php
				                            if( have_rows('print_megamenu',11) ):
	                        					while ( have_rows('print_megamenu',11) ) : the_row();
				                                    $arrImg = get_sub_field('side_bg',11);
				                                    ?>
						                            <a href="<?php the_sub_field('link')?>" class="products_menu_image" style="background-image:url('<?= $arrImg['url'] ;?>')">
				                                        <h4 class="menu_image_heading">
				                                            <?php the_sub_field('side_heading',11)?>
				                                        </h4>
				                                        <span>
				                                            <?php the_sub_field('side_subheading',11)?><i class="fa fa-arrow-circle-right"></i>
				                                        </span>
				                                    </a>
				                                <?php
				                            	endwhile;
						                    endif;
						                    ?>
				                        </div>
				                    </div>
				                </li>
				           <!--     <?php if(defined('TEMPLATES') && TEMPLATES):?>
					                <li id="design" class="menu-item menu-item-type-custom menu-item-object-custom mega_link">
					                    <a  class="menu-parent" href="<?php echo site_url();?>/designs">
					                    	<?php
					                        $title =  get_field('designs_menu_title',11);
					                        if($title){
					                        	echo $title;
					                        }
					                        else{
					                        	echo 'Personalised';
					                        }?>
					                    </a>-->
					                    <div class="products_menu_container">
					                        <div class="products_menu">
					                            <ul class="products_menu_templates w-clearfix">
					                                <div class="w-row">
					                                    <?php
					                                    global $objAppFunction;
					                                    include_once CLASS_PATH . 'TemplateOPS/TemplateProduct.php';
					                                    $objTemplateProduct = new TemplateProduct();

					                                    if($objTemplateProduct->loadProductList($_SESSION['cuserid'])){
					                                        $objProductMega = new Product();
					                                        ?>
					                                        <?php foreach($objTemplateProduct->arrQuery as $rowTProduct): ?>
					                                            <?php if($objProductMega->loadById($rowTProduct['Product_idProduct']) && $objProductMega->Enabled == 1) :?>
					                                                <div class="w-col w-col-3">
					                                                    <li>
					                                                        <a href="<?=  $objTemplateProduct->CreateLink($objProductMega->idProduct) ?>" title="<?= $objProductMega->ProductName?>">
					                                                            <img src="<?= $objAppFunction->ImageExists(PRODUCT_IMAGES.''.$objProductMega->idProduct.'.jpg')
					                                                                    ? IMAGES_URL.PRODUCT_IMAGES.''.$objProductMega->idProduct.'.jpg'
					                                                                    : IMAGES_URL.PRODUCT_IMAGES.'noimage-product-listing.jpg'; ?>" alt=""/>
					                                                            <span class="list_title">
					                                                                <?= $objProductMega->ProductName?>
					                                                            </span>
					                                                        </a>
					                                                    </li>
					                                                </div>
					                                            <?php endif; ?>
					                                        <?php endforeach; ?>
					                                        <?php
					                                    } else {
					                                        ?><p>No Templates setup</p><?php
					                                    }
					                                    ?>
					                                </div>
					                            </ul>
								     <?php
				                            if( have_rows('design_megamenu',11) ):
	                        					while ( have_rows('design_megamenu',11) ) : the_row();
				                                    	$arrImg = get_sub_field('designs_bg_img');
				                                    ?>
						                            <a href="<?php the_sub_field('link')?>" class="products_menu_image" style="background-image:url('<?= $arrImg['url'] ;?>')">
				                                        <h4 class="menu_image_heading">
				                                            <?php the_sub_field('designs_heading')?>
				                                        </h4>
				                                        <span>
				                                            <?php the_sub_field('designs_sub_heading')?><i class="fa fa-arrow-circle-right"></i>
				                                        </span>
				                                    </a>
				                                <?php
				                            	endwhile;
						                    endif;
						                    ?>
					                            <?php //$designimg = wp_get_attachment_image_url( the_field('designs_bg_img',11), 'full')?>

					                        </div>
					                    </div>
					                </li>
					            <?php endif;?>
				                <?php
				                    $options = array(
				                        'echo' => false,
				                        'container' => '',
				                        'theme_location' => 'primary-menu',
				                    );
				                    $menu = wp_nav_menu($options);
				                    //Get rid of the UL wrapper
				                    echo preg_replace( array( '#^<ul[^>]*>#', '#</ul>$#' ), '', $menu );
				                ?>
				            </ul>
				         </nav>
						<!-- ACCOUNT/CHECKOUT LINKS-->

				    </div>
				</div>
			<!-- </div> -->
		</div>

		<!-- MOBILE MENU BUTTON -->

		<div class="mobile_toggle">
			<i class="mobile_button fa fa-bars"></i>
		</div>
	</div>

		<!-- MOBILE MENU BUTTON -->

		<div class="mobile_toggle">
			<i class="mobile_button fa fa-bars"></i>
		</div>
	</div>


	<!-- MOBILE MENU -->
	<nav id="mobile_nav" class="notvisible">
    <i class="mobile_button fa fa-close"></i>
        <div class="mobile_icons">
            <div id="cart-head">
                <!--This one for my account link. always show as will act as login-->

                <!--Mark, make the next one only show if customer is logged in-->



                <i></i>
                <i></i>
                <i></i>
				<a href="<?php echo site_url(); ?>/checkout/cart/">
                    <i class="fa fa-shopping-cart"></i>
                </a>
                <?php if ($objCustomer->CheckLogin()) { ?>
                    <a href="<?php echo site_url(); ?>/my-account/">
                        <i class="fa fa-user"></i>
                    </a>
                    <a href="<?= site_url() ?>/my-account/?logoff">
                        <i class="fa fa-sign-in"></i>
                    </a>
                <?php } else { ?>
                    <a href="<?= site_url(); ?>/my-account/">
                        <i class="fa fa-sign-in"></i>
                    </a>
                <?php } ?>
            	<i class="fa fa-search searchicon" id="mobile_searchicon"></i>
            </div>
        </div>
        <form action="/" method="get" class="search_form" id="search_form_mobile" name="search-form">
            <input class="search_field" id="Search" name="s" placeholder="Find a product" value="<?php the_search_query(); ?>" required="required" type="text">
            <input class="searchicon" type="submit" value="search">
        </form>
        <?php wp_nav_menu( array( 'menu' => 'Mobile Menu','container' => '', 'menu_id' => 'mobile_menu') ); ?>
    </nav>

    <!-- BEGIN CONTENT -->

	<div id="content" class="site-content">

	<!--BECAUSE WORDPRESS IS SHIT AND DOESNT WORK, AND WITH US HAVING LITERALLY NONE OF THE FILES WE NEED
	TO GET THE MOBILE VIEW TO LOOK BETTER, EVERYTHING IS HARD CODED BELOW THAT WILL ONLY SHOW WHEN THE SCREEN IS A CERTAIN SIZE-->
