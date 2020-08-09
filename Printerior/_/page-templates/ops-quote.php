<?php
/*
*
* Template Name: OPS Quote
*
*/
?>
<?php get_header();?>
	<?php
	$backgroundImage = get_field('banner_image',312);
	?>
	<section class="top_section" style="padding: 4rem 0; background-repeat:no-repeat; background-size: cover; background-image: url('<?php echo $backgroundImage['sizes']['banner'];?>');?>">
		<div class="w-container">
		    <div class="w-row">
	        	<div class="w-col w-col-7">
            		<h1>
            			<?php
            			$altTitle = get_field('title_override');
            			if($altTitle != "") {
            				echo $altTitle;
            			} else {
            				echo 'Get a Quote';
            			}
            			?>
					</h1>
					<h2 class="subheading">Fill out the form below for a quick quote</h2>
			    </div>
			</div>
		</div>				
	</section>
    <section id="quote">
    	<div class="w-container">
			<?php include_once OPS_PATH.'quote/quote-processing.php';?>
	       	<form action="<?=WEBSITE_URL?>quote/" class="quote_form" id="productQuoteForm" method="post">
				<input type="hidden" name="required" value="TRUE" />
				<input type="hidden" name="oldFormID" value="<?=$formID?>" />
		        <div class="white_bg <?=(!$_SESSION['cuserid']) ? 'noTop' : ''?>">
		            <div class="w-form">
		            	<?php include_once OPS_PATH.'quote/quote-form.php';?>
		            </div>
		        </div>
		    </form>
	        <script>
	        	$( document ).on( "change", "#formIDSelect", function(event) {
	    			selected = $(this).find('option:selected');
				$('#quoteProductID').val(selected.data('prodid'));
				console.log(selected.data('prodid'));
				$("#productQuoteForm").submit();
			});
	        </script>
	    </div>
    </section>
	
<?php get_footer(); ?>