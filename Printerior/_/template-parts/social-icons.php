<?php if(get_theme_mod( 'fb_textbox' )||get_theme_mod( 'in_textbox' )||get_theme_mod( 'tw_textbox' )||get_theme_mod( 'li_textbox' )||get_theme_mod( 'gp_textbox' )||get_theme_mod( 'pi_textbox' )||get_theme_mod( 'yt_textbox' )||get_theme_mod( 'rss_textbox' )||get_theme_mod( 'mail_textbox' )){?>
<h3>Follow Us</h3>
<?php };?>
<?= get_theme_mod( 'fb_textbox' ) != '' ? '<a class="social facebook" href="'.get_theme_mod( 'fb_textbox' ).'" target="_blank"><i class="fa fa-facebook"></i></a>' : '' ?>
<?= get_theme_mod( 'in_textbox' ) != '' ? '<a class="social instagram" href="'.get_theme_mod( 'in_textbox' ).'" target="_blank"><i class="fa fa-instagram"></i></a>' : '' ?>
<?= get_theme_mod( 'tw_textbox' ) != '' ? '<a class="social twitter" href="'.get_theme_mod( 'tw_textbox' ).'" target="_blank"><i class="fa fa-twitter"></i></a>' : '' ?>
<?= get_theme_mod( 'li_textbox' ) != '' ? '<a class="social linkedin" href="'.get_theme_mod( 'li_textbox' ).'" target="_blank"><i class="fa fa-linkedin"></i></a>' : '' ?>
<?= get_theme_mod( 'gp_textbox' ) != '' ? '<a class="social google" href="'.get_theme_mod( 'gp_textbox' ).'" target="_blank"><i class="fa fa-google-plus"></i></a>' : '' ?>
<?= get_theme_mod( 'pi_textbox' ) != '' ? '<a class="social pinterest" href="'.get_theme_mod( 'pi_textbox' ).'" target="_blank"><i class="fa fa-pinterest"></i></a>' : '' ?>
<?= get_theme_mod( 'yt_textbox' ) != '' ? '<a class="social youtube" href="'.get_theme_mod( 'yt_textbox' ).'" target="_blank"><i class="fa fa-youtube"></i></a>' : '' ?>
<?= get_theme_mod( 'rss_textbox' ) != '' ? '<a class="social rss" href="'.get_theme_mod( 'rss_textbox' ).'" target="_blank"><i class="fa fa-rss"></i></a>' : '' ?>
<?= get_theme_mod( 'mail_textbox' ) != '' ? '<a class="social mail" href="mailto:'.get_theme_mod( 'mail_textbox' ).'" target="_blank"><i class="fa fa-envelope"></i></a>' : '' ?>