<?php
/*
*
* Template Name: OPS My Account
*
*/
?>
<?php get_header();?>

<div class="w-container">
    <article id="myaccount" class="w-col w-col-12 w-clearfix">
    
            <?php
                if($pagename == 'register') $_REQUEST['scr'] = 'create';
                require_once OPS_PATH."myaccount.php";
            ?>
    </article>
</div>
<?php get_footer(); ?>