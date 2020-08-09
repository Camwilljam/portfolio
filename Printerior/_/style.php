<?php
$absolute_path = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
$wp_load = $absolute_path[0] . 'wp-load.php';
require_once($wp_load);
ops_get_params(TRUE);
global $blnStyleSheet;
$blnStyleSheet = TRUE;
require_once OPSADMIN_PATH.'ops-config/globals.php';

if(!isset($objAppFunction)) global $objAppFunction;

// GLOBAL
	$PrimaryColor = get_theme_mod( 'primary_settings');
	$SecondaryColor = get_theme_mod( 'secondary_settings');
	$TextColor = get_theme_mod( 'text_colour_settings');
// HEADER
	$TopHeaderBG = get_theme_mod( 'top-header-setting');
	$HeaderBG = get_theme_mod( 'header-background');
	$MenuColor = get_theme_mod( 'menu-colour-setting');
	$MiniMenuColor = get_theme_mod( 'mini-menu-colour-setting');
	$MegaMenuBG = get_theme_mod( 'mega-menu-background');
	$MegaMenuCat = get_theme_mod( 'mega-menu-category');
	$MegaMenuLink = get_theme_mod( 'mega-menu-link');
	$MegaMenuLinkHover = get_theme_mod( 'mega-menu-link-hover');
	$AccountLink = get_theme_mod( 'account-link');
	$AccountLinkHover = get_theme_mod( 'account-link-hover');
// FOOTER
	$FooterBG = get_theme_mod( 'footer-background');
	$FooterBottomBG = get_theme_mod( 'footer-bottom-background');
	$FooterBottomText = get_theme_mod( 'footer-bottom-text');
	$FooterBottomLink = get_theme_mod( 'footer-bottom-link');
	$FooterBottomLinkHover = get_theme_mod( 'footer-bottom-link-hover');
	$FooterBoxBG = get_theme_mod( 'footer-box-background');
	$FooterH3 = get_theme_mod( 'footer-h3');
	$FooterLink = get_theme_mod( 'footer-link');
	$FooterLinkHover = get_theme_mod( 'footer-link-hover');
	$FooterText = get_theme_mod( 'footer-text');

header('Content-type: text/css');
header('Cache-control: must-revalidate');
?>
<head>
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
</head>
<style>
*{
	font-family: 'Quicksand', sans-serif;
	
}

/* PRIMARY COLOURS */
	
	.main-navigation li a:hover,
	.list_title,
	#masthead i.fa-times,
	#masthead i.fa-bars,

	.whitesection.tab .r-tabs .r-tabs-nav .r-tabs-state-active .r-tabs-anchor,
	.p-thumbs a,
	.p-thumbs a:visited,
	.order_step.active i,
	.order_step i,
	.cartbox-cell .fa,
	.comment-body a.comment-edit-link,
	.comment-body a.comment-reply-link,
	a:visited,
	#mobile_menu li.menu-item-has-children:after
	{
		color: <?= $PrimaryColor ;?> ;
	}

	div.matrix th.red{
		border-color: <?= $PrimaryColor ;?>;
		background-color: <?= $PrimaryColor ;?> ;
	}

	body, 
	footer,
	.colorsection,
	header .cta_container a,
	
	.mobile_icons,
	.slick-current .slider_nav_link_internal,
	.slider-for .slick-prev:before,
	.slider-for .slick-next:before,
	a.sidebar_box h3,
	.sample-pack,
	a.solution,
	.tab .r-tabs .r-tabs-nav .r-tabs-tab,
	.tab div.r-tabs .r-tabs-accordion-title .r-tabs-anchor,
	.tab div.r-tabs .r-tabs-accordion-title.r-tabs-state-active .r-tabs-anchor,

	.contact-box button,
	input[type="button"],
	input[type="reset"],
	input[type="submit"],
	.contact-box button,
	input[type="button"],
	input[type="reset"],
	input[type="submit"],
	section.process_section,
	.comment-body a.comment-reply-link,
	#checkout-action-login input[type="submit"],
	.solution h3,
	.template-box-sets .r-tabs .r-tabs-nav .r-tabs-tab,
	.r-tabs .r-tabs-accordion-title.r-tabs-state-active .r-tabs-anchor,
	.summary,
	.btn.secondary.lonebutton,
	.editor_tool.next,
	.template-proof.r-tabs .r-tabs-nav .r-tabs-tab,
	.tabs_column .summary_container a#lightboxTest,
	a.cta.central_cta.quote_cta.email_cta,
	.p-matrix-price:hover,
	.p-matrix-price-active,
	.cartsteps-cell-active,
	.footerlinks,
	.checkout-action a,
	.myaccount-action a,
	.myaccount-action a:visited,
	.cartbox-cell a.cta,
	.chatCustomerStyle,
	.chatCustomerStyle:before,
	#top_header,
	.account_link:nth-child(even),
	#myTab.r-tabs .r-tabs-nav .r-tabs-tab,
	.template_detail .r-tabs .r-tabs-nav .r-tabs-anchor,
	.sidebar_title,
	.faq-question h3,
	.p-schedule-wrapper,
	.cartbox-heading,
	.order_summary_title
	{
	  background-color: <?= $PrimaryColor ;?> ;
	}

	.chatCustomerStyle:after{
		border-color:transparent <?= $PrimaryColor ;?> transparent transparent;
	}
	.phone a,
	.email a,
	.phone a:visited,
	.email a:visited
	{
		border-color: <?= $PrimaryColor ;?>;
		color: <?= $PrimaryColor ;?> ;
	}


	h1,
	h2,
	h3,
	.single_sol_content h4,
	.tab div.r-tabs .r-tabs-nav .r-tabs-state-active .r-tabs-anchor,
	.features li:before,
	.examples .slick-dots li button:before,
	a span.gridtitle,
	a:visited span.gridtitle,
	.examples .slick-dots li.slick-active button:before,
	.examples .slick-dots li button:before,
	.cartbox-cell .fa,
	.p-thumbs a,
	.p-thumbs a:visited,
	.order_step i,
	.order_step.active i,
	.cartbox-cell .text-center,
	#masthead i.fa-bars,
	.home #masthead.mini-header i.fa-bars,
	.template_detail li.r-tabs-tab a,
	.template_detail li.r-tabs-tab a:visited,
	.template-box-sets .r-tabs .r-tabs-nav .r-tabs-state-active .r-tabs-anchor,
	.design_method_title,
	#description_tabs li > a,
	#description_tabs li > a:visited,
	ul.products_menu_list > li a:hover,
	.main-navigation li a,
	.main-navigation li a:visited,
	.product_title,
	.filter_block .toggle
	{
		color: <?= $PrimaryColor ;?> ;
	}
/* SECONDARY COLOURS */

div.matrix th.purple{
	border-color: <?= $SecondaryColor ;?>;
	background-color: <?= $SecondaryColor ;?> ;
}

.phone a:hover,
.email a:hover
{
	border-color:<?= $SecondaryColor ;?> ;
	color: <?= $SecondaryColor ;?> ;
}


.slide_content h2,
.slide_content h1,
.filter-more a,
.filter-less a,
.filter-more:before,
.filter-less:before,
.login-forgotpassword input[type="submit"],
ul.products_menu_list > li a,
ul.products_menu_list > li a:visited,
.p-matrix-cost,
.blog_extract h3,
.clientname,
#description_tabs li > a:hover,
#description_tabs li > a:focus,
#description_tabs li.r-tabs-state-active > a,
ul.products_menu_list li > ul > li > a:hover,
.product_subtitle,
.footer_contact:hover,
.p-matrix-price-link,
.product:hover,
ul#menu-footer-menu li a:hover,
.footerlinks a,
.main-navigation li a:hover
{
	color: <?= $SecondaryColor ;?> ;
}

.badge,
a.readmore,
a.optionbutton,
a.optionbutton:visited,
a.listing-product-link,
a.listing-product-link:visited,
a.form-submit,
.r-tabs .r-tabs-accordion-title .r-tabs-anchor,
.countdown,
.marginTop20px.cta.darkBlue,
input[type="submit"],
.cta,
.sample-pack a.readmore,
.sample-pack a.readmore,
.footer_contact i,
#myTab.r-tabs .r-tabs-nav .r-tabs-state-active .r-tabs-anchor,
.template_detail .r-tabs .r-tabs-nav .r-tabs-state-active .r-tabs-anchor,
#mobile_nav .search_form,
.slide a.readmore,
.checkout-action a,
 .checkout-action a.cta.solid.purple,
 .sidebar_content a.cta
{
	background-color: <?= $SecondaryColor ;?> ;
}

.product_overlay, .design_description{
	<?php  $color = $objAppFunction->Hex2RGB($SecondaryColor) ?>
	background-color: rgba(<?= $color['r'] ;?>,<?= $color['g'] ;?>,<?= $color['b'] ;?>, 0.7) ;
}

a.cta.central_cta.quote_cta.last_cta.p-matrix-proceed
{
	border-color:<?= $SecondaryColor ;?> ;
	background-color: <?= $SecondaryColor ;?> ;
}

/* TEXT COLOURS */

body,
p,
h1.site-title a,
h1.site-title a:visited,
/*.template-box-sets .r-tabs .r-tabs-nav .r-tabs-state-active .r-tabs-anchor,*/
a.listing-product-name,
a.listing-product-name:visited,
.slider-section .slick-dots li button:before,
.slider-section .slick-dots li.slick-active button:before,
.funnel i,
.whitesection .funnel h3,
.greysection .funnel h3,
a .funnel p,
h3.single_sol_h3,
.p-matrix-quantity,
.p-matrix-format,
.p-matrix th a,
.cart-view,
.blog h2.entry-title a,
time.entry-date.published,
a.url.fn.n,
.comment-body a,
.nav-links a,

.benefit h3,
.sidebar_box_content,
h3.subheading,
.message,
footer li a,
footer li a:visited,
footer a,
footer a:visited,
span.post-date
{
	color: <?= $TextColor ;?> ;
}

/* ==========
HEADER COLOUR
============*/
.home header#masthead{
		background-color: <?= $HeaderBG ;?>;
	}
<?php if($TopHeaderBG):?>
#top_header{
	background-color: <?= $TopHeaderBG ;?>;
}
<?php endif?>

<?php if($MenuColor):?>
.main-navigation li a,
.main-navigation li a:visited{
	color: <?= $MenuColor ;?>;
}
<?php endif;?>

<?php if($MiniMenuColor):?>;
.mini-header #primary-menu li a,
.mini-header #primary-menu li a:visited{
	color: <?= $MiniMenuColor ;?>;
}
<?php endif;?>

.products_menu{
	background-color: <?= $MegaMenuBG ;?>;
}

ul.products_menu_list > li a,
ul.products_menu_list > li a:visited{
	color: <?= $MegaMenuCat ;?>;
}

ul.prodmenu li a,
ul.prodmenu li a:visited{
	color: <?= $MegaMenuLink ;?>;
}

ul.products_menu_list > li a:hover,
ul.prodmenu li a:hover
ul.products_menu_list li > ul > li > a:hover{
	color: <?= $MegaMenuLinkHover ;?>;
}

.phone a,
.email a,
.phone a:visited,
.email a:visited,
	{
		border-color: <?= $AccountLink ;?>;
		color: <?= $AccountLink ;?> ;
	}

.phone a:hover,
.email a:hover,
{
	border-color:<?= $AccountLinkHover ;?> ;
	color: <?= $AccountLinkHover ;?> ;
}

/* ==========
FOOTER 
============*/

footer{
	background-color: <?= $FooterBG ;?>;
}

.footer-box{
	background-color: <?= $FooterBoxBG ;?>;
}

footer h3{
	color:  <?= $FooterH3 ;?>;
}

footer a, footer a:visited{
	color:  <?= $FooterLink ;?>;
}

footer a:hover{
	color:  <?= $FooterLinkHover ;?>;
}

.footerlinks{
	background-color: <?= $FooterBottomBG ;?>;
}

.footerlinks{
	color: <?= $FooterBottomText ;?>;
}
.footerlinks a,
.footerlinks a:visited{
	color: <?= $FooterBottomLink ;?>;
}

.footerlinks a:hover{
	color: <?= $FooterBottomLinkHover ;?>;
}

a.social i,
ul#menu-footer-menu li a,
footer li a,
footer li a:visited
{
	color: <?= $FooterLink ;?>;
}
a.social:hover i,
ul#menu-footer-menu li a:hover
{
	color: <?= $FooterLinkHover ;?>;
}

footer,
.card-types i{
	color: <?= $FooterText ;?>;
}

/* ==========
CONTENT BLOCKS
============*/


</style>

<!-- COLOUR OVERRIDE SECTIONS
SLIDER
CONTENT BLOCKS
PRODUCT
DESIGNS

STOREFRONT
-->
