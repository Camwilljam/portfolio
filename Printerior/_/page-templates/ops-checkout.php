<?php
/*
*
* Template Name: OPS Checkout
*
*/
?>
<?php get_header();
global $objCustomer;?>
<?php 
include OPS_PATH.'templates/sites/'.$_SESSION['sitename'].'/tpl_catalogue_usp.php';
?>
<div class="w-container">
	<?php if(wp_get_theme() != 'OPSv3 Storefront' || $objCustomer->CheckLogin()){ ?>
		<article id="checkout" class="">
		<?php
		switch($pagename):
			case 'billing';
				include_once OPS_PATH."checkout-billing.php";
			break;	
			case 'create';
				include_once OPS_PATH."checkout-create.php";
			break;
			case 'payment';
				include_once OPS_PATH."checkout-payment.php";
			break;
			case 'confirm';
				include_once OPS_PATH."checkout-confirm.php";
			break;
			case 'checkout-ipn';
			case 'ipn';
				//select the correct checkout ipn file for the given vendor
				// include_once OPS_PATH."checkout/ipns/checkout-ipn-cardsave.php";
				// include_once OPS_PATH."checkout/ipns/checkout-ipn-paymentsense.php";
				include_once OPS_PATH."checkout/ipns/checkout-ipn-paypal.php";
			break;
			case 'checkout-ipn-paypal';
				include_once OPS_PATH."checkout/ipns/checkout-ipn-paypal.php";
			break;
			default;
				include_once OPS_PATH."checkout-cart.php";
			break;
		endswitch;
		?>
		</article>
	<?php } else { ?>
 		<article id="checkout" class="w-col w-col-12">   
        	<?php get_template_part('parts/storefront','login'); ?>
        </article>
	<?php }?>
</div>
<?php get_footer();?>