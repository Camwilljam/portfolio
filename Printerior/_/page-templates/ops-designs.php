<?php
/*
*
* Template Name: OPS Template Designs
*
*/
?>
<?php get_header();?>
    <article id="designs">
        <?php
			//START SWITCH screen
			// 30-08-2018 MM: Removed the ARTWORK define and moved the TEMPLATES define into the switch statement so that when the approvals is used it can still get through without needing the template system. 
			switch($_REQUEST['scr']) {	
				case "proof":
				case "editproof":
				case "preview":
		            include_once OPS_PATH."template-ops/edit-proof.php";
				break;

				default:
					// 30-08-2018 MM: Updated this so it runs through the get template function. 
					if (!isset($objAppFunction)) global $objAppFunction; 
					include OPS_PATH.'templates/sites/'.$_SESSION['sitename'].'/tpl_catalogue_usp.php';
					if(defined('TEMPLATES')&&TEMPLATES){    
	        			include_once OPS_PATH."template-ops/listing.php";
					} elseif (defined('TEMPLATE_CLOUD')&&TEMPLATE_CLOUD) {
			        	include_once OPS_PATH."template-cloud/listing.php";
					}
				break;
			}      		
        ?>
    </article>
	
<?php get_footer(); ?>