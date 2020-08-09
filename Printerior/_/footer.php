<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package opsv3
 */

?>
</div><!-- #content -->
</body>
	<footer id="colophon" class="site-footer">
		<div class="w-container">
			<div class="w-row">
				<!-- Navigation-->
				<div class="w-col w-col-4 w-col-medium-4 w-col-small-6 w-col-tiny-12">
				<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('footer_widget_1') ) ?>
				</div>
				<!--SUPPORT-->
				<div class="w-col w-col-4 w-col-medium-4 w-col-small-6 w-col-tiny-12">
				<?php if (get_theme_mod('telephone_textbox') != "") { ?>
                    <a class="footer_contact" href="tel:<?= get_theme_mod('telephone_textbox') ?>">
                        <i class="fa fa-phone"></i>
                        <span class="contact_detail">
                            Telephone
                        </span>
                        <span class="hours">
                            <?= get_theme_mod('telephone_textbox') ?>
                        </span>
                    </a>
                <?php } ?>
                <?php if (get_theme_mod('email_textbox') != "") { ?>
                    <a class="footer_contact" href="mailto:<?= the_sub_field('email');?>">
                        <i class="fa fa-envelope"></i>
                        <span class="contact_detail">Email</span>
                        <span class="hours"><?= get_theme_mod( 'email_textbox') ?></span>
                    </a>
                <?php } ?>
                <?php
                if( have_rows('contact_details',15) ):
                    while ( have_rows('contact_details',15) ) : the_row();?>
                        <?php
                        $address = get_sub_field('address');
                        if ($address != "") {
                        ?>
                            <a class="footer_contact" href="<?php echo site_url();?>/contact-us">
                                <i class="fa fa-thumb-tack"></i>
                                <span class="contact_detail">Be Social With Us</span>
                                <span class="hours">
                                    <?= the_sub_field('address');?>
                                </span>
                            </a>
                        <?php } ?>
                    <?php
                    endwhile;
                endif;
                ?>
                 <?= get_theme_mod('opening_hours_textbox');?>
				</div>
				<!-- SOCIAL MEDIA-->
				<div class="w-col w-col-4 w-col-medium-4 w-col-small-12 w-col-tiny-12">
				<?php get_template_part('template-parts/social','icons'); ?>
                    <div class="payment-types">
                        <?php get_template_part('template-parts/payment-types'); ?>
                    </div>
                    <div class="payment-gateway">
                        <?php get_template_part('template-parts/payment-gateway'); ?>
                    </div>
				</div>
			</div>
		</div>
		<div class="footerlinks"><!-- .site-info -->
		<div class="w-container">
			By <a style="color:#67C8FF	;">BlueKrakenTechnologies</a>
  			| &copy; <?= strftime('%Y'); ?> <?php echo get_theme_mod( 'copyright_textbox', 'Your Company Name' ); ?>																	<a style="color:black; cursor:default;"> CW & AP </a>
  		</div>
	</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
<!-- FOOTER ENQUEUES -->
<?php
get_template_part('template-parts/footer','flexible-content');
get_template_part('template-parts/footer','flexible-content-theme');
?>
</html>
