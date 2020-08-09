<?php
/*
Template Name: Flexible Content Page
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Yardstic
 */

get_header(); ?>
	<div id="main" class="content-area site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php if( have_rows('content') ):					
					$intRow = 1;
				    while ( have_rows('content') ) : the_row();?>
				    
				        <?php if( get_row_layout() == 'single_column' ){
				        		$graphic = get_sub_field('graphic');
				        		$graphic = $graphic['sizes']['singl-col'];
				        		$bgimg = get_sub_field('background');
				        		$overrideID = get_sub_field('override_id');
				        	?>
				        	<section id="<?= !empty($overrideID) ? $overrideID:'section-'.$intRow ?>" class="singl-col <?= $bgclass; ?> animatedParent animateOnce" style="<?php if(!empty($bgimg['url'])): ?>background:url(<?php echo $bgimg['url']; ?>); background-position: center; background-size: cover;<?php endif; ?>"  <?= $intRow > 2 ? 'data-appear-top-offset="-200"' : '' ?>>
				        		<div class="w-container">
				        			<div class="w-row">
				        				<div class="w-col w-col-12">
					        				<div class="centered">
												<?php $strHeading = get_sub_field('section_title');?>
												<?php if($strHeading):?>
					        					<div class="banner">
						        					<?php if($graphic): ?>
														<img class="animated fadeInUpShort" src="<?= $graphic; ?>" alt="" />
													<?php endif; ?>
													<?php if($intRow == 1): ?><h1><?php else: ?><h2><?php endif;?>
														<?php echo $strHeading;?>
													<?php if($intRow == 1): ?></h1><?php else: ?></h2><?php endif;?>
													<?php if( get_sub_field('section_subtitle')  != "" ){?>
														<h3 class="subheading">
															<?php the_sub_field('section_subtitle');?>
														</h3>
													<?php } ?>
													<?php if(get_sub_field('content')):?>
														<div class="banner-content">
															<?php the_sub_field('content');?>
														</div>
													<?php endif;?>

													<?php 
													$strLink = get_sub_field('link_text');
													$strURL = get_sub_field('link_destination');
													if (!empty($strLink) && !empty($strURL)):?>
														<a class="readmore animated pulse" href="<?= $strURL ;?>">
															<?= $strLink ?>
														</a>
													<?php endif;?>
												</div>
											</div>
										<?php endif;?>
				        	   			</div>
				        	   		</div>
				        	   	</div>
							</section>
<!-- FEATURE ICONS-->
				        <?php } elseif ( get_row_layout() == 'feature_icons' ) { ?>
				        	<?php
				        		$columns = get_sub_field('columns');
				        		if($columns == 1) {
				        			$span = 12;
				        		} else if($columns == 2) {
				        			$span = 6;
				        		} else if($columns == 3) {
				        			$span = 4;
				        		} else if($columns == 4) {
				        			$span = 3;
				        		}

				        		$lastbg = $bg;
				        		$bg = get_sub_field('background');
				        		if($bg == 'white') {
				        			$bgclass = 'whitesection'.($lastbg == $bg ? ' removepadding' : '');
				        		} elseif($bg == 'lightgrey') {
				        			$bgclass = 'greysection'.($lastbg == $bg ? ' removepadding' : '');
				        		} elseif($bg == 'darkgrey') {
				        			$bgclass = 'greysection'.($lastbg == $bg ? ' removepadding' : '');
				        		}elseif($bg == 'color') {
				        			$bgclass = 'colorsection'.($lastbg == $bg ? ' removepadding' : '');
				        		}
				        		$overrideID = get_sub_field('override_id');
				        	?>
				        	<section id="<?= !empty($overrideID) ? $overrideID:'section-'.$intRow ?>" class="feat-icon <?= $bgclass; ?>" <?= $intRow > 2 ? 'data-appear-top-offset="-200"' : '' ?>>
								<div class="w-container overflow">
									<?php if(get_sub_field('section_title')):?>
									<div class="w-row">
										<div class="w-col">
											<div class="centered">
												<?php if($intRow == 1): ?><h1><?php else: ?><h2><?php endif;?>
													<?php the_sub_field('section_title');?>
												<?php if($intRow == 1): ?></h1><?php else: ?></h2><?php endif;?>
												<?php if( get_sub_field('section_subtitle')  != "" ){?>
													<h3 class="subheading">
														<?php the_sub_field('section_subtitle');?>
													</h3>
												<?php } ?>
											</div>
										</div>
									</div>
								<?php endif;?>
									<div class="w-row animatedParent animateOnce "<?= $intRow > 2 ? 'data-appear-top-offset="-200"' : '' ?> data-sequence="500">
										<?php
										if( have_rows('features') ):
											$i = 1;
										    while ( have_rows('features') ) : the_row();
										    	$link = get_sub_field('icon_link');
										    ?>
												<div class="w-col w-col-<?= $span ?> w-col-small-6">
											        <div class="benefit benefit-<?= $span ?>">
												        	<i class="fa <?php the_sub_field('icon');?> animated growIn" data-id='<?php echo $i;?>' style="color: <?php the_sub_field('icon_colour');?>"></i>
												        	<h3>
												        		<?php the_sub_field('title');?>
												        	</h3>
												        <?php if($link):?>
												    	<?php endif;?>
											        	<div class="benefit-content">
											        		<?php the_sub_field('description');?>
											        	</div>
											        	<?php if($link):?>
											        		<a class="readmore" href="<?php echo $link?>"><?php the_sub_field('link_name')?> &nbsp;<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
											        	<?php endif;?>
											        </div>
											    </div>
											    <?php $i++;?>
										    <?php endwhile;
										else :
										endif;
										?>
									</div>
								</div>
							</section>
<!-- FUNNELS-->
				        <?php } elseif ( get_row_layout() == 'funnels' ) { ?>
				        	<?php
				        		$columns = get_sub_field('columns');
				        		if($columns == 1) {
				        			$span = 12;
				        		} else if($columns == 2) {
				        			$span = 6;
				        		} else if($columns == 3) {
				        			$span = 4;
				        		} else if($columns == 4) {
				        			$span = 3;
				        		}

				        		$lastbg = $bg;
				        		$bg = get_sub_field('background');
				        		if($bg == 'white') {
				        			$bgclass = 'whitesection'.($lastbg == $bg ? ' removepadding' : '');
				        		} elseif($bg == 'lightgrey') {
				        			$bgclass = 'greysection'.($lastbg == $bg ? ' removepadding' : '');
				        		} elseif($bg == 'darkgrey') {
				        			$bgclass = 'greysection'.($lastbg == $bg ? ' removepadding' : '');
				        		}elseif($bg == 'color') {
				        			$bgclass = 'colorsection'.($lastbg == $bg ? ' removepadding' : '');
				        		}
				        		$overrideID = get_sub_field('override_id');
				        	?>
				        	<section id="<?= !empty($overrideID) ? $overrideID:'section-'.$intRow ?>" class="funnel <?= $bgclass; ?>" <?= $intRow > 2 ? 'data-appear-top-offset="-200"' : '' ?>>
								<div class="w-container overflow">
									<?php if(get_sub_field('section_title')):?>
									<div class="w-row">
										<div class="w-col">
											<div class="centered">
												<?php if($intRow == 1): ?><h1><?php else: ?><h2><?php endif;?>
													<?php the_sub_field('section_title');?>
												<?php if($intRow == 1): ?></h1><?php else: ?></h2><?php endif;?>
												<?php if( get_sub_field('section_subtitle')  != "" ){?>
													<h3 class="subheading">
														<?php the_sub_field('section_subtitle');?>
													</h3>
												<?php } ?>
											</div>
										</div>
									</div>
								<?php endif;?>
									<div class="w-row animatedParent animateOnce "<?= $intRow > 2 ? 'data-appear-top-offset="-200"' : '' ?> data-sequence="500">
										<?php
										if( have_rows('funnels') ):
											$i = 1;
										    while ( have_rows('funnels') ) : the_row();
										    	$link = get_sub_field('link');
										    	$arrColor = get_sub_field('icon_colour');
										    ?>
												<div class="w-col w-col-4 w-col-medium-4 w-col-small-4 w-col-tiny-12 animated growIn"  data-id='<?php echo $i;?>'>
													<a class="" href="<?php echo $link?>">
												        <div class="funnel_container">

											        		<a href="<?= $link;?>">
												        		<i class="fa <?php the_sub_field('icon');?>" style="color: <?= $arrColor;?>"></i>
												        		<span class="content">
														        	<h3>
														        		<?php the_sub_field('title');?>
														        	</h3>
														        	<p>
														        		<?php the_sub_field('description');?>
														        	</p>
														        </span>
														    </a>

												     	</div>
												    </a>
											    </div>
											    <?php $i++;?>
										    <?php endwhile;
										endif;
										?>
									</div>
								</div>
							</section>
<!-- GRAPHIC LINKS-->
				        <?php } elseif( get_row_layout() == 'graphic_links' ) {  ?>
				        	<?php
				        		$columns = get_sub_field('columns');
				        		if($columns == 2) {
				        			$span = 'w-col-6';
				        		} else if($columns == 3) {
				        			$span = 'w-col-4 w-col-medium-4 w-col-small-6 w-col-tiny-12';
				        		} else if($columns == 4) {
				        			$span = 'w-col-3 w-col-medium-6 w-col-small-6 w-col-tiny-12';
				        		}
				        		$lastbg = $bg;
				        		$bg = get_sub_field('background');
				        		if($bg == 'white') {
				        			$bgclass = 'whitesection'.($lastbg == $bg ? ' removepadding' : '');
				        		} elseif($bg == 'lightgrey') {
				        			$bgclass = 'greysection'.($lastbg == $bg ? ' removepadding' : '');
				        		} elseif($bg == 'darkgrey') {
				        			$bgclass = 'greysection'.($lastbg == $bg ? ' removepadding' : '');
				        		}elseif($bg == 'color') {
				        			$bgclass = 'colorsection'.($lastbg == $bg ? ' removepadding' : '');
				        		}
				        		$overrideID = get_sub_field('override_id');
				        	?>
				        	<section id="<?= !empty($overrideID) ? $overrideID:'section-'.$intRow ?>" class="graphiclinks <?= $bgclass; ?> solutions animatedParent animateOnce" <?= $intRow > 2 ? 'data-appear-top-offset="-200"' : '' ?> data-sequence="500">
				        		<div class="w-container">
			        				<?php $strHeading = get_sub_field('section_title'); 
			        				if(!empty($strHeading)): ?>
					        			<div class="w-row">
					        				<div class="w-col w-col-12">
						        				<div class="centered">
													<?php if($intRow == 1): ?><h1><?php else: ?><h2><?php endif;?>
														<?php the_sub_field('section_title');?>
													<?php if($intRow == 1): ?></h1><?php else: ?></h2><?php endif;?>
													<?php if( get_sub_field('section_subtitle')  != "" ){?>
														<h3 class="subheading">
															<?php the_sub_field('section_subtitle');?>
														</h3>
													<?php } ?>
												</div>
											</div>
										</div>
									<?php endif; ?>
									<div class="w-row" >
										<?php
										if( have_rows('graphics') ):
											$i = 1;
										    while ( have_rows('graphics') ) : the_row();
										    	$arrImg = get_sub_field('image');
										    	$strTitle = get_sub_field('title');
										    	$from = get_sub_field('from_price');
										    	$strText = get_sub_field('content'); 
										    	$strLinkText = get_sub_field('link_text');
										    	$strLink = get_sub_field('link_destination');
								        		?>
												<div class="w-col <?= $span ?>">
													<a class="design_method" href="<?= $strLink ;?>">
					                                    <div class="design_method_image_block" style="background-image:url('<?php echo $arrImg['sizes']['featured_products'];?>');">
					                                        <span class="design_description">
					                                            <strong><?= $strTitle ;?></strong>
					                                            <br>
					                                            <?= $strText;?>
					                                        </span>
					                                    </div>
					                                    <h4 class="design_method_title">
					                                        <?php the_sub_field('icon');?>&nbsp;&nbsp;<?php the_sub_field('title');?>
					                                    </h4>
					                                </a>
												</div>
											    <?php $i++;?>
										    <?php endwhile;
										endif;
										?>
									</div>
								</div>
							</section>
<!-- FEATURED PRODUCTS-->
				        <?php } elseif( get_row_layout() == 'featured_product' ) {  ?>
				        	<?php
				        		$lastbg = $bg;
				        		$bg = get_sub_field('background');
				        		if($bg == 'white') {
				        			$bgclass = 'whitesection'.($lastbg == $bg ? ' removepadding' : '');
				        		} elseif($bg == 'lightgrey') {
				        			$bgclass = 'greysection'.($lastbg == $bg ? ' removepadding' : '');
				        		} elseif($bg == 'darkgrey') {
				        			$bgclass = 'greysection'.($lastbg == $bg ? ' removepadding' : '');
				        		}elseif($bg == 'color') {
				        			$bgclass = 'colorsection'.($lastbg == $bg ? ' removepadding' : '');
				        		}
				        		$overrideID = get_sub_field('override_id');
				        	?>
				        	<section id="<?= !empty($overrideID) ? $overrideID:'section-'.$intRow ?>" class="featured_product <?= $bgclass; ?> solutions animatedParent animateOnce" <?= $intRow > 2 ? 'data-appear-top-offset="-200"' : '' ?> data-sequence="500">
				        		<div class="w-container">
			        				<?php $strHeading = get_sub_field('section_title'); 
			        				if(!empty($strHeading)): ?>
					        			<div class="w-row">
					        				<div class="w-col w-col-12">
						        				<div class="centered">
													<?php if($intRow == 1): ?><h1><?php else: ?><h2><?php endif;?>
														<?php the_sub_field('section_title');?>
													<?php if($intRow == 1): ?></h1><?php else: ?></h2><?php endif;?>
													<?php if( get_sub_field('section_subtitle')  != "" ){?>
														<h3 class="subheading">
															<?php the_sub_field('section_subtitle');?>
														</h3>
													<?php } ?>
												</div>
											</div>
										</div>
									<?php endif; ?>
									<div class="w-row">
										<?php
								            if( have_rows('featured_products') ):
								                while ( have_rows('featured_products') ) : the_row();?>
								                    <?php 
								                    $image = get_sub_field('image');
								                    $designs = get_sub_field('template_link');
								                    ?>
								                    <div class="w-col w-col-3 w-col-small-6 w-col-tiny-6">
								                        <div class="product" href="#">
								                            <div class="product_image_container">

								                                <img class="product_image" alt="" src="<?php echo $image['sizes']['featured_products'];?>">
								                                <div class="product_overlay">
								                                    <?php if($designs){?>
								                                    <a class="" href="<?php the_sub_field('product_link');?>">
								                                        <span>View prices&nbsp;&nbsp;<i class="fa fa-arrow-circle-right"></i></span>
								                                    </a>
								                                    <a class="" href="<?php echo $designs;?>">
								                                        <span>View Templates&nbsp;&nbsp;<i class="fa fa-arrow-circle-right"></i></span>
								                                    </a>
								                                    <?php } else { ?>
								                                    <a class="full" href="<?php the_sub_field('product_link');?>">
								                                        <span>View prices&nbsp;&nbsp;<i class="fa fa-arrow-circle-right"></i></span>
								                                    </a>
								                                    <?php }?>
								                                </div>
								                            </div>
								                            <div class="productinfo">
								                                <h4 class="product_title">
								                                    <?php the_sub_field('title');?>
								                                </h4>
								                                <span class="product_subtitle">
								                                    <span class="subtitle_price">From <?php the_sub_field('from_price');?></span>
								                                </span>
								                            </div>
								                            <a class="mobile_overlay_link" href="<?php the_sub_field('product_link');?>"></a>
								                        </div>
								                    </div>
								                <?php endwhile;
								            endif;
								            ?>
									</div>
								</div>
							</section>
<!-- IMAGE WITH TEXT-->
						<?php } elseif( get_row_layout() == 'image_with_text' ) {  ?>
				        	<?php
				        		$alignment = get_sub_field('image_alignment');
				        		$lastbg = $bg;
				        		$bg = get_sub_field('background');
				        		if($bg == 'white') {
				        			$bgclass = 'whitesection'.($lastbg == $bg ? ' removepadding' : '');
				        		} elseif($bg == 'lightgrey') {
				        			$bgclass = 'greysection'.($lastbg == $bg ? ' removepadding' : '');
				        		} elseif($bg == 'darkgrey') {
				        			$bgclass = 'greysection'.($lastbg == $bg ? ' removepadding' : '');
				        		}elseif($bg == 'color') {
				        			$bgclass = 'colorsection'.($lastbg == $bg ? ' removepadding' : '');
				        		}

				        		$img = get_sub_field('image');
								$img = $img['sizes']['sideimage'];

								$overrideID = get_sub_field('override_id');
				        	?>
				        	<section id="<?= !empty($overrideID) ? $overrideID:'section-'.$intRow ?>" class="img-w-txt <?= $bgclass; ?> intro animatedParent animateOnce" <?= $intRow > 2 ? 'data-appear-top-offset="-400"' : '' ?>>
				        		<div class="w-container">
				        			<div class="w-row">
					        			<div class="w-col w-col-12">
											<?php if($intRow == 1): ?><h1><?php else: ?><h2><?php endif;?>
												<?php the_sub_field('section_title');?>
											<?php if($intRow == 1): ?></h1><?php else: ?></h2><?php endif;?>
					        			</div>
				        			</div>
				        			<div class="w-row">
				        				<div class="w-col w-col-8" style="float: <?= $alignment; ?>">
											<?php the_sub_field('content');?>
										</div>
										<div class="w-col w-col-4 sideimage">
											<img class="animated fadeInUpShort" src="<?= $img ?>" alt="" />
										</div>
									</div>
								</div>
							</section>
<!-- TEXT ONLY-->							
						<?php } elseif( get_row_layout() == 'text_only' ) {  ?>
				        	<?php
				        		$lastbg = $bg;
				        		$bg = get_sub_field('background');
				        		if($bg == 'white') {
				        			$bgclass = 'whitesection'.($lastbg == $bg ? ' removepadding' : '');
				        		} elseif($bg == 'lightgrey') {
				        			$bgclass = 'greysection'.($lastbg == $bg ? ' removepadding' : '');
				        		} elseif($bg == 'darkgrey') {
				        			$bgclass = 'greysection'.($lastbg == $bg ? ' removepadding' : '');
				        		}elseif($bg == 'color') {
				        			$bgclass = 'colorsection'.($lastbg == $bg ? ' removepadding' : '');
				        		}
				        		$col = get_sub_field('colnumber');
				        		$overrideID = get_sub_field('override_id');

				        	?>
				        	<section id="<?= !empty($overrideID) ? $overrideID:'section-'.$intRow ?>" class="txt <?= $bgclass; ?> animatedParent animateOnce"<?= $intRow > 2 ? 'data-appear-top-offset="-400"' : '' ?>>
				        		<div class="w-container">
				        			<div class="w-row">
				        				<div class="w-col w-col-12">
									<?php if($intRow == 1): ?><h1><?php else: ?><h2><?php endif;?>
				        					<?php the_sub_field('section_title');?>
									<?php if($intRow == 1): ?></h1><?php else: ?></h2><?php endif;?>
				        				</div>
				        			</div>
				        			<div class="w-row">
					        			<?php
					        			switch ($col) {
										    case '1':
												if( have_rows('content1') ):
												    while ( have_rows('content1') ) : the_row();?>
												        <div class="w-col w-col-12" style="float: <?= $alignment; ?>">
												        	<div class="heading-container">
													        	<?php if($intRow == 1): ?><h3><?php else: ?><h3><?php endif;?>
																	<?php the_sub_field('content_subtitle');?>
																<?php if($intRow == 1): ?></h3><?php else: ?></h3><?php endif;?>
															</div>
															<div class="content-container">
																<?php the_sub_field('content');?>
															</div>
														</div>
													<?php
												    endwhile;
												endif;
										    break;
										    case '2':
									        	$col = get_sub_field('column_width');
												if( have_rows('content2') ):
													// 09-08-2017 LW: Found that if a default was set on the column field an array is returned instead of the field value. This makes it return a php error
									        		switch($col){
									        			case '9':
									        				$strCol1 = 'w-col w-col-9 w-col-medium-8';
									        				$strCol2 = 'w-col w-col-3 w-col-medium-4';
									        			break;
									        			case '8':
									        				$strCol1 = 'w-col w-col-8 w-col-medium-8';
									        				$strCol2 = 'w-col w-col-4 w-col-medium-4';
									        			break;
									        			case '7':
									        				$strCol1 = 'w-col w-col-7 w-col-medium-8';
									        				$strCol2 = 'w-col w-col-5 w-col-medium-4';
									        			break;
									        			case '5':
									        				$strCol1 = 'w-col w-col-5 w-col-medium-6';
									        				$strCol2 = 'w-col w-col-7 w-col-medium-6';
									        			break;
									        			case '4':
									        				$strCol1 = 'w-col w-col-4 w-col-medium-6';
									        				$strCol2 = 'w-col w-col-8 w-col-medium-6';
									        			break;
									        			case '3':
									        				$strCol1 = 'w-col w-col-3 w-col-medium-6';
									        				$strCol2 = 'w-col w-col-9 w-col-medium-6';
									        			break;
									        			case '6':
									        			default:
									        				$strCol1 = 'w-col w-col-6 w-col-medium-6';
									        				$strCol2 = 'w-col w-col-6 w-col-medium-6';
									        			break;
									        		}
									        		$intRow = 1;
												    while ( have_rows('content2') ) : the_row();?>
												        <div class="<?= $intRow == 1 ? $strCol1 : $strCol2 ?>" style="float: <?= $alignment; ?>">
												        	<div class="sub-heading">
																<div class="heading-container">
														        	<?php if($intRow == 1): ?><h3><?php else: ?><h3><?php endif;?>
																		<?php the_sub_field('content_subtitle');?>
																	<?php if($intRow == 1): ?></h3><?php else: ?></h3><?php endif;?>
																</div>
															</div>
															<div class="content-container">
																<?php the_sub_field('content');?>
															</div>
														</div>
														<?php
														$intRow ++;
												    endwhile;
												endif;
										       break;
										    case '3':
												if( have_rows('content3') ):
												    while ( have_rows('content3') ) : the_row();?>
												        <div class="w-col w-col-4" style="float: <?= $alignment; ?>">
												        	<div class="sub-heading">
																<div class="heading-container">
														        	<?php if($intRow == 1): ?><h3><?php else: ?><h3><?php endif;?>
																		<?php the_sub_field('content_subtitle');?>
																	<?php if($intRow == 1): ?></h3><?php else: ?></h3><?php endif;?>
																</div>
															</div>
															<div class="content-container">
																<?php the_sub_field('content');?>
															</div>
														</div>
													<?php
												    endwhile;
												endif;
											break;
										    default:
										    ?>
										        <div class="w-col w-col-12" style="float: <?= $alignment; ?>">
													<?php the_sub_field('content');?>
												</div>
											<?php break; ?>
										<?php } ?>
									</div>
								</div>
							</section>
<!-- SAMPLE PACK-->							
				<?php } elseif( get_row_layout() == 'sample_pack' ) {  ?>
				        	<?php
				        		$lastbg = $bg;
				        		$bg = get_sub_field('background');
				        		if($bg == 'white') {
				        			$bgclass = 'whitesection'.($lastbg == $bg ? ' removepadding' : '');
				        		} elseif($bg == 'lightgrey') {
				        			$bgclass = 'greysection'.($lastbg == $bg ? ' removepadding' : '');
				        		} elseif($bg == 'darkgrey') {
				        			$bgclass = 'greysection'.($lastbg == $bg ? ' removepadding' : '');
				        		}elseif($bg == 'color') {
				        			$bgclass = 'colorsection'.($lastbg == $bg ? ' removepadding' : '');
				        		}
				        		$overrideID = get_sub_field('override_id');
				        	?>
				        	<section id="<?= !empty($overrideID) ? $overrideID:'section-'.$intRow ?>" class=" sample_pack <?= $bgclass; ?> animatedParent animateOnce" data-appear-top-offset="-200">
				        		<div class="w-container">
									<div class="w-row">
										<div class="sample-pack animated fadeInUpShort">
											<?php
											if( have_rows('sample_pack') ):
											    while ( have_rows('sample_pack') ) : the_row();
											    	$image = get_sub_field('preview_image');
											    	?>
											    		<div class="w-row">
															<div class="w-col w-col-6 w-col-medium-6 w-col-small-12 w-col-tiny-12 img-small">
																<div class="sample-image">
																	<img src="<?php echo $image['sizes']['sample_pack']?>" alt="<?= $image['alt'] ?>"></img>
																</div>
															</div>

															<div class="w-col w-col-6 w-col-medium-6 w-col-small-12 w-col-tiny-12">
																<div class="sample-content">
																	<h2><?php the_sub_field('title');?></h2>
																	<p><?php the_sub_field('description');?></p>
																	<a class="readmore" href="<?php the_sub_field('button_link');?>">
																		<?php the_sub_field('button_text');?> &nbsp;<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
																	</a>
																</div>
															</div>
														</div>

											   <?php endwhile;
											else :
											endif;
											?>
										</div>
									</div>
								</div>
							</section>
<!-- PHOTO GALLERY-->
 						<?php } elseif( get_row_layout() == 'photo_gallery' ) {  ?>
	 						<?php 
	 						if(!wp_script_is('prettyPhoto-js')) wp_enqueue_script( 'prettyPhoto-js', get_template_directory_uri() . '/modules/prettyphoto/jquery.prettyPhoto.js', array('jquery'), '', true );
							if(!wp_style_is('prettyPhoto-css')) wp_enqueue_style( 'prettyPhoto-css', get_template_directory_uri() . '/modules/prettyphoto/prettyPhoto.css' );
							?>
				        	<?php
				        		$lastbg = $bg;
				        		$bg = get_sub_field('background');
				        		if($bg == 'white') {
				        			$bgclass = 'whitesection'.($lastbg == $bg ? ' removepadding' : '');
				        		} elseif($bg == 'lightgrey') {
				        			$bgclass = 'greysection'.($lastbg == $bg ? ' removepadding' : '');
				        		} elseif($bg == 'darkgrey') {
				        			$bgclass = 'greysection'.($lastbg == $bg ? ' removepadding' : '');
				        		}elseif($bg == 'color') {
				        			$bgclass = 'colorsection'.($lastbg == $bg ? ' removepadding' : '');
				        		}
				        		$overrideID = get_sub_field('override_id');
				        	?>
							<section id="<?= !empty($overrideID) ? $overrideID:'section-'.$intRow ?>" class=" photo-gallery <?= $bgclass; ?>" <?= $intRow > 2 ? 'data-appear-top-offset="-200"' : '' ?>>
								<div class="w-container">
				        			<div class="w-row">
				        				<div class="w-col w-col-12">
				        					<div class="gallery-header centered">
												<?php if($intRow == 1): ?><h1><?php else: ?><h2><?php endif;?>
													<?php the_sub_field('section_title');?>
												<?php if($intRow == 1): ?></h1><?php else: ?></h2><?php endif;?>
												<?php if( get_sub_field('section_subtitle')  != "" ){?>
													<h3 class="subheading">
														<?php the_sub_field('section_subtitle');?>
													</h3>
												<?php } ?>
											</div>
										</div>
									</div>
									<div class="w-row">
									
										<div class="slick photo-gallery" data-slick='{"dots": true,"arrows": false,"autoplay":true,"infinite":true,"autoplaySpeed":1500,"slidesToShow":4,"slidesToScroll":1,"responsive": [{"breakpoint": 991,"settings": {"slidesToShow": 3,"slidesToScroll": 1,"dots": true}},{"breakpoint": 780,"settings": {"slidesToShow": 2, "slidesToScroll": 1}}, {"breakpoint": 400,"settings": {"slidesToShow": 1, "slidesToScroll": 1}}]}'>
											<?php 
											$images = get_sub_field('photo_gallery_images');
											//echo '<pre>'.print_r($images,true).'</pre>';
											if( $images ): ?>
												<?php $i = 1; ?>
											    <?php foreach( $images as $image ): ?>
											        <div class="photo-tile">
														<a class="grid_page_box" rel="prettyPhoto[gallery]" href="<?= $image['sizes']['large']; ?>" data-id='<?= $i; ?>'>
											         		<img src="<?php echo $image['sizes']['activity']; ?>" alt="<?php echo $image['alt']; ?>" />
											         	</a>
											        </div>
											        <?php $i++ ;?>
											    <?php endforeach; ?>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</section>
							<?php
							if(!wp_script_is('slick-js')) wp_enqueue_script( 'slick-js', get_template_directory_uri().'/slick/slick.min.js', array('jquery'), false, true );
							if(wp_script_is('slick-js')) { 
							?>
								<script type="text/javascript">
									/*jQuery(document).ready(function(){
										jQuery('.slick.photo-gallery').slick();
									});*/
								</script>
							<?php } ?>
<!-- TEXT WITH SIDEBAR-->	
				        <?php } elseif( get_row_layout() == 'text_with_sidebar' ) {  ?>
				        	<?php
				        		$lastbg = $bg;
				        		$bg = get_sub_field('background');
				        		if($bg == 'white') {
				        			$bgclass = 'whitesection'.($lastbg == $bg ? ' removepadding' : '');
				        		} elseif($bg == 'lightgrey') {
				        			$bgclass = 'greysection'.($lastbg == $bg ? ' removepadding' : '');
				        		} elseif($bg == 'darkgrey') {
				        			$bgclass = 'greysection'.($lastbg == $bg ? ' removepadding' : '');
				        		}elseif($bg == 'color') {
				        			$bgclass = 'colorsection'.($lastbg == $bg ? ' removepadding' : '');
				        		}
				        		$overrideID = get_sub_field('override_id');
				        	?>
				        	<section id="<?= !empty($overrideID) ? $overrideID:'section-'.$intRow ?>" class="txt-sidebar <?= $bgclass; ?> animatedParent animateOnce" <?= $intRow > 2 ? 'data-appear-top-offset="-200"' : '' ?>>
				        		<div class="w-container">
				        			<div class="w-row">
				        				<div class="w-col w-col-9">
											<?php if($intRow == 1): ?><h1><?php else: ?><h2><?php endif;?>
												<?php the_sub_field('section_title');?>
											<?php if($intRow == 1): ?></h1><?php else: ?></h2><?php endif;?>
											<?php the_sub_field('content');?>
										</div>
										<div class="w-col w-col-3">
											<?php
											if( have_rows('sidebar') ):
												$i = 1;
											    while ( have_rows('sidebar') ) : the_row(); ?>
											    	<a class="sidebar_box" href="<?php the_sub_field('link');?>">
														<h3>
															<?php the_sub_field('title');?>
														</h3>
														<div class="sidebar_box_content">
															<?php the_sub_field('content');?>
														</div>
													</a>
												<?php endwhile;
											else :
											   	$args = array(
													    'numberposts' => 1,
													    'post_type' => 'testimonial',
													    'post_status' => 'publish',
													    'orderby' => 'rand'
													);
													$recent_posts = wp_get_recent_posts( $args, ARRAY_A );
													foreach( $recent_posts as $recent ){ 
														?>
															<div class="sidebar testimonial">
										                    	<?php the_field('testimonial',$recent["ID"]) ?>
								        						<span class="clientname">
								        							<?php the_sub_field('name',$recent["ID"])?>
								        							<span class="org">
								        								<?php the_field('organisation',$recent["ID"])?>
								        							</span>
								        						</span>
															</div>
													<?php }
											endif;
											?>
										</div>
									</div>
								</div>
							</section>
<!-- TABS-->
						<?php } elseif( get_row_layout() == 'tabs' ) {  ?>
				        	<?php
				        		$lastbg = $bg;
				        		$bg = get_sub_field('background');
				        		if($bg == 'white') {
				        			$bgclass = 'whitesection'.($lastbg == $bg ? ' removepadding' : '');
				        		} elseif($bg == 'lightgrey') {
				        			$bgclass = 'greysection'.($lastbg == $bg ? ' removepadding' : '');
				        		} elseif($bg == 'darkgrey') {
				        			$bgclass = 'greysection'.($lastbg == $bg ? ' removepadding' : '');
				        		}elseif($bg == 'color') {
				        			$bgclass = 'colorsection'.($lastbg == $bg ? ' removepadding' : '');
				        		}
				        		$overrideID = get_sub_field('override_id');
				        	?>
				        	<section id="<?= !empty($overrideID) ? $overrideID:'section-'.$intRow ?>" class="tab <?= $bgclass; ?> animatedParent animateOnce" <?= $intRow > 2 ? 'data-appear-top-offset="-200"' : '' ?>>
				        		<div class="w-container">
				        			<div class="w-row">
				        				<div class="w-col w-col-12">
											<?php if($intRow == 1): ?><h1><?php else: ?><h2><?php endif;?>
												<?php the_sub_field('section_title');?>
											<?php if($intRow == 1): ?></h1><?php else: ?></h2><?php endif;?>
											<?php the_sub_field('content');?>
										</div>
										<div class="w-col w-col-12">
											<div class="responsiveTabs">
											    <?php
												if( have_rows('responsive_tabs') ):
													$i = 1;
													?>
													<ul>
													    <?php while ( have_rows('responsive_tabs') ) : the_row(); ?>
															<li>
																<a href="#tab-<?= $i ; ?>">
																	<?php the_sub_field('tab_title');?>
																</a>
															</li>
														<?php
														$i++;
														endwhile; ?>
											    	</ul>
												<?php else :
												endif;
												?>
												<?php
												if( have_rows('responsive_tabs') ):
													$i = 1;?>
												    <?php while ( have_rows('responsive_tabs') ) : the_row(); ?>
														<div id="tab-<?= $i ; ?>">
															<?php the_sub_field('tab_content');?>
														</div>
													<?php $i++;
													endwhile; ?>
												<?php else :
												endif;
												?>			
											</div>
										</div>
									</div>
								</div>
							</section>
<!-- FEATURE LIST-->
						<?php } elseif( get_row_layout() == 'feature_list' ) {  ?>
				        	<?php
				        		$columns = get_sub_field('columns');
				        		$image = get_sub_field('image');
				        		$image = $image['sizes']['centered'];
				        		$lastbg = $bg;
				        		$bg = get_sub_field('background');
				        		if($bg == 'white') {
				        			$bgclass = 'whitesection'.($lastbg == $bg ? ' removepadding' : '');
				        		} elseif($bg == 'lightgrey') {
				        			$bgclass = 'greysection'.($lastbg == $bg ? ' removepadding' : '');
				        		} elseif($bg == 'darkgrey') {
				        			$bgclass = 'greysection'.($lastbg == $bg ? ' removepadding' : '');
				        		}elseif($bg == 'color') {
				        			$bgclass = 'colorsection'.($lastbg == $bg ? ' removepadding' : '');
				        		}
				        		$overrideID = get_sub_field('override_id');
				        	?>
				        	<section id="<?= !empty($overrideID) ? $overrideID:'section-'.$intRow ?>" class="feat_list <?= $bgclass; ?> animatedParent animateOnce" <?= $intRow > 2 ? 'data-appear-top-offset="-200"' : '' ?>>
				        		<div class="w-container">
				        			<div class="w-row">
					        			<div class="w-col">
					        				<div class="centered">
					        					<?php if($image != "") { ?>
					        						<img class="animated fadeInUpShort" src="<?= $image['sizes']['centered']; ?>" alt="<?php echo $image['alt']?>"   />
					        					<?php } ?>
												<?php if($intRow == 1): ?><h1><?php else: ?><h2><?php endif;?>
													<?php the_sub_field('section_title');?>
												<?php if($intRow == 1): ?></h1><?php else: ?></h2><?php endif;?>
												<?php if( get_sub_field('section_subtitle')  != "" ){?>
													<h3 class="subheading">
														<?php the_sub_field('section_subtitle');?>
													</h3>
												<?php } ?>
												<div>
													<?php the_sub_field('content');?>
												</div>
											</div>
					        			</div>
				        			</div>
				        			<div class="w-row">
				        				<?php if($columns == 1) { ?>
					        				<div class="w-col w-col-12">
					        					<div class="centered">
					        						<?php if( have_rows('features') ): ?>
						        						<ul class="features">
							        						<?php while ( have_rows('features') ) : the_row(); ?>
							        							<li>
							        								<?php the_sub_field('title');?>
							        							</li>
						        							<?php endwhile; ?>
														</ul>
													<?php else :
													endif;
													?>
												</div>
											</div>
										<?php } else { ?>
											<div class="centered w-clearfix">
												<div class="w-col w-col-6 w-col-medium-6 w-col-small-6 w-col-tiny-6">
					        						<?php if( have_rows('features') ): ?>
						        						<ul class="features">
							        						<?php while ( have_rows('features') ) : the_row(); ?>
							        							<li>
							        								<?php the_sub_field('title');?>
							        							</li>
						        							<?php endwhile; ?>
														</ul>
													<?php else :
													endif;
													?>
												</div>
												<div class="w-col w-col-6 w-col-medium-6 w-col-small-6 w-col-tiny-6">
					        						<?php if( have_rows('features_column_2') ): ?>
						        						<ul class="features">
							        						<?php while ( have_rows('features_column_2') ) : the_row(); ?>
							        							<li>
							        								<?php the_sub_field('title');?>
							        							</li>
						        							<?php endwhile; ?>
														</ul>
													<?php else :
														// no rows found
													endif;
													?>
												</div>
											</div>
										<?php } ?>
									</div>
									<div class="w-row">
										<div class="w-col w-col-12">
											<div class="extra-text">
												<?php the_sub_field('extra_text')?>
											</div>
										</div>
									</div>

								</div>
							</section>
<!-- PORTFOLIO-->
						<?php } elseif( get_row_layout() == 'portfolio' ) {  
							$lastbg = $bg;
				        		$bg = get_sub_field('background');
				        		if($bg == 'white') {
				        			$bgclass = 'whitesection'.($lastbg == $bg ? ' removepadding' : '');
				        		} elseif($bg == 'lightgrey') {
				        			$bgclass = 'greysection'.($lastbg == $bg ? ' removepadding' : '');
				        		} elseif($bg == 'darkgrey') {
				        			$bgclass = 'greysection'.($lastbg == $bg ? ' removepadding' : '');
				        		}elseif($bg == 'color') {
				        			$bgclass = 'colorsection'.($lastbg == $bg ? ' removepadding' : '');
				        		}
				        	$overrideID = get_sub_field('override_id');
				        	?>
				        	<section id="<?= !empty($overrideID) ? $overrideID:'section-'.$intRow ?>" class="portfolio <?= $bgclass; ?> " <?= $intRow > 2 ? 'data-appear-top-offset="-200"' : '' ?>>
				        		<div class="w-container">
									<div class="w-row">
										<div class="pf_title">
											<?php if($intRow == 1): ?><h1><?php else: ?><h2><?php endif;?>
												<?php the_sub_field('section_title_portfolio');?>
											<?php if($intRow == 1): ?></h1><?php else: ?></h2><?php endif;?>
											<?php if( get_sub_field('section_subtitle_portfolio')  != "" ){?>
												<h3 class="subheading">
													<?php the_sub_field('section_subtitle_portfolio');?>
												</h3>
											<?php } ?>
										</div>
									</div>
								</div>
				        		<div class="w-row">
				        			<div class="w-container">
					        			<div class="slick examples" data-slick='{"dots": true, "arrows": false, "autoplay": true, "infinite": true, "autoplaySpeed": 5000, "slidesToShow": 4, "slidesToScroll": 2, "responsive": [{"breakpoint": 1024,"settings": {"slidesToShow": 3}},{"breakpoint": 780,"settings": {"slidesToShow": 2}}, {"breakpoint": 480,"settings": {"slidesToShow": 1}}]}'>
					        				<?php
												$args = array(
												    'numberposts' => 8,
												    'orderby' => 'asc',
												    'post_type' => 'portfolio',
												    'post_status' => 'publish'
												);
												$recent_posts = wp_get_recent_posts( $args, ARRAY_A );
												foreach( $recent_posts as $recent ){ ?>
									                <div class="example_container">
														<a class="solution" href="<?php echo get_permalink($recent["ID"]);?>">
															<?php echo get_the_post_thumbnail( $recent["ID"], 'portfolio-thumb' ); ?>
															<h3>
																<?php echo $recent["post_title"];?>
															</h3>
														</a>
													</div>
											<?php } ?>
					        			</div>
					        		</div>
				        		</div>
				        	</section>

				        	<?php
							if(!wp_script_is('slick-js')) wp_enqueue_script( 'slick-js', get_template_directory_uri().'/slick/slick.min.js', array('jquery'), false, true );
							if(wp_script_is('slick-js')) { 
							?>
								<script type="text/javascript">
								/*jQuery(document).ready(function(){
									jQuery('.examples').slick();
								});*/
								</script>
							<?php } ?>
<!-- GRID SECTION-->
						<?php } elseif( get_row_layout() == 'grid_section' ) { 
	 						if(!wp_script_is('prettyPhoto-js')) wp_enqueue_script( 'prettyPhoto-js', get_template_directory_uri() . '/modules/prettyphoto/jquery.prettyPhoto.js', array('jquery'), '', true );
							if(!wp_style_is('prettyPhoto-css')) wp_enqueue_style( 'prettyPhoto-css', get_template_directory_uri() . '/modules/prettyphoto/prettyPhoto.css' );

							$lastbg = $bg;
				        		$bg = get_sub_field('background');
				        		if($bg == 'white') {
				        			$bgclass = 'whitesection'.($lastbg == $bg ? ' removepadding' : '');
				        		} elseif($bg == 'lightgrey') {
				        			$bgclass = 'greysection'.($lastbg == $bg ? ' removepadding' : '');
				        		} elseif($bg == 'darkgrey') {
				        			$bgclass = 'greysection'.($lastbg == $bg ? ' removepadding' : '');
				        		}elseif($bg == 'color') {
				        			$bgclass = 'colorsection'.($lastbg == $bg ? ' removepadding' : '');
				        		}
				        	$overrideID = get_sub_field('override_id');
				        	?>
							<section id="<?= !empty($overrideID) ? $overrideID:'section-'.$intRow ?>" class="grid <?= $bgclass; ?> listsection" <?= $intRow > 2 ? 'data-appear-top-offset="-200"' : '' ?>>
								<div class="w-container">
									<div class="w-row">
										<div class="w-col">
					        				<div class="centered">
												<?php if($intRow == 1): ?><h1><?php else: ?><h2><?php endif;?>
													<?php the_sub_field('section_title');?>
												<?php if($intRow == 1): ?></h1><?php else: ?></h2><?php endif;?>
												<?php if( get_sub_field('section_subtitle')  != "" ){?>
													<h3 class="subheading">
														<?php the_sub_field('section_subtitle');?>
													</h3>
												<?php } ?>
											</div>
					        			</div>
					        		</div>
					        		<div class="w-row">
					        			<?php if( have_rows('grid_items') ): ?>
			        						<?php while ( have_rows('grid_items') ) : the_row(); ?>
			        							<?php
			        								$image = get_sub_field('image');
			        							?>
			        							<div class="w-col w-col-3 w-col-small-6 w-col-tiny-6">
				        							<?php
				        								$i = 1;
				        								$link = get_sub_field('link');
				        							?>
											        <div class="grid_single">
														<a class="grid_page_box" <?= !empty($link)?'href="'.$link.'"':'rel="prettyPhoto[Grid]" href="'.$image['sizes']['large'].'"' ?> data-id='<?= $i; ?>'>
											         		<img src="<?= $image['sizes']['gridthumb'] ; ?>" alt="" />
					        								<span class="gridtitle">
					        									<?php the_sub_field('title');?>
					        								</span>
											         	</a>
											        </div>
											        <?php $i++ ;?>
			        							</div>
		        							<?php endwhile; ?>
										<?php else :
										endif;
										?>
					        		</div>
					        	</div>				        	
							</section>
<!-- FAQ -->							
						<?php } elseif( get_row_layout() == 'faq' ) {  
				        		$lastbg = $bg;
				        		$bg = get_sub_field('background');
				        		if($bg == 'white') {
				        			$bgclass = 'whitesection'.($lastbg == $bg ? ' removepadding' : '');
				        		} elseif($bg == 'lightgrey') {
				        			$bgclass = 'greysection'.($lastbg == $bg ? ' removepadding' : '');
				        		} elseif($bg == 'darkgrey') {
				        			$bgclass = 'greysection'.($lastbg == $bg ? ' removepadding' : '');
				        		}elseif($bg == 'color') {
				        			$bgclass = 'colorsection'.($lastbg == $bg ? ' removepadding' : '');
				        		}
				        	?>
				        	<section id="<?= !empty($overrideID) ? $overrideID:'section-'.$intRow ?>" class="faq <?= $bgclass; ?> " <?= $intRow > 2 ? 'data-appear-top-offset="-200"' : '' ?>>
				        		<div class="w-container">
				        			<div class="w-col w-col-12">
				        				<div class="centered">
					        				<?php if($intRow == 1): ?><h1><?php else: ?><h2><?php endif;?>
												<?php the_sub_field('section_title');?>
											<?php if($intRow == 1): ?></h1><?php else: ?></h2><?php endif;?>
										</div>
				        			</div>
				        			<div class="w-col w-col-12">
			                    		<?php
			                    		$args = array( 'post_type' => 'qa_faqs', 'posts_per_page' => -1 );
										$loop = new WP_Query( $args );
										while ( $loop->have_posts() ) : $loop->the_post();?>
											<article class="faq-question">
												<h3>
													<?php the_title();?>
												</h3>
												<div class="entry-content">
													<?php the_content(); ?>
												</div>
											</article>
										<?php endwhile;
										wp_reset_query();?>
									</div>
								</div>
							</section>
<!-- TESTIMONIALS-->
						<?php } elseif( get_row_layout() == 'testimonials' ) {  
							$lastbg = $bg;
				        		$bg = get_sub_field('background');
				        		if($bg == 'white') {
				        			$bgclass = 'whitesection'.($lastbg == $bg ? ' removepadding' : '');
				        		} elseif($bg == 'lightgrey') {
				        			$bgclass = 'greysection'.($lastbg == $bg ? ' removepadding' : '');
				        		} elseif($bg == 'darkgrey') {
				        			$bgclass = 'greysection'.($lastbg == $bg ? ' removepadding' : '');
				        		}elseif($bg == 'color') {
				        			$bgclass = 'colorsection'.($lastbg == $bg ? ' removepadding' : '');
				        		}
				        	$overrideID = get_sub_field('override_id');
				        	?>
							<section id="<?= !empty($overrideID) ? $overrideID:'section-'.$intRow ?> " class="testimonials <?= $bgclass; ?> listsection animatedParent animateOnce"<?= $intRow > 2 ? ' data-appear-top-offset="-200"' : '' ?>>
								<div class="w-container">
									<div class="centered">
					        			<?php if($intRow == 1): ?><h1><?php else: ?><h2><?php endif;?>
					        				<?php echo get_sub_field('section_title');?>
					        			<?php if($intRow == 1): ?></h1><?php else: ?></h2><?php endif;?>
					        		</div>
									<div class="w-row">				
										<div class="w-col w-col-12">
											<div class="test-centered">
												<?php

												if( have_rows('testimonial') ):
													while ( have_rows('testimonial') ) : the_row();

														$post_object = get_sub_field('testimonial_select');
														$post = $post_object;
														setup_postdata( $post ); 
														$i = 1;
														?>

														<div class="w-col w-col-6 ">
															<div class="testimonial animated fadeInUpShort" data-id='<?= $i ?>'>
										                    	<?php the_field('testimonial',$post->ID )?>
								        						<?php if(get_field('name')):?>
									        						<span class="clientname">
									        							<?php the_field('name',$post->ID)?>,
									        							<span class="org">
									        								<?php the_field('organisation',$post->ID)?>
									        							</span>
									        						</span>
								        						<?php endif;?>
															</div>
														</div>
														<?php $i++;?>
														<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly

													endwhile;
												else:
													$args = array(
													    'numberposts' => 2,
													    'post_type' => 'testimonial',
													    'post_status' => 'publish',
													    'orderby' => 'rand'
													);
													$recent_posts = wp_get_recent_posts( $args, ARRAY_A );
													foreach( $recent_posts as $recent ){ 
														?>
														<div class="w-col w-col-6">
															<div class="testimonial">
										                    	<?php the_field('testimonial',$recent["ID"]) ?>
								        						<span class="clientname">
								        							<?php the_sub_field('name',$recent["ID"])?>
								        							<span class="org">
								        								<?php the_field('organisation',$recent["ID"])?>
								        							</span>
								        						</span>
															</div>
														</div>					
													<?php }

												endif;
												?>
											</div>
										</div>
									</div>
								</div>
							</section>
<!-- MAP -->
						<?php } elseif( get_row_layout() == 'google_map' ) { 
						$overrideID = get_sub_field('override_id');
				        	?>
							<section id="id="<?= !empty($overrideID) ? $overrideID:'section-'.$intRow ?>"" class="googlemap map <?= $bgclass; ?>">
								<?php 
								$location = get_sub_field('location');
								
								if( !empty($location) ):	?>
									<div class="acf-map">
										<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
										</div>
									</div>
								<?php endif; ?>
	        	
							</section>
							<?php wp_enqueue_script( 'google-map', get_template_directory_uri().'/js/google-map.js', array('jquery'), false, true );?>
	        				<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC2x6tH_Unp6qZEuIXAnwf9DUO5zP3N4Jg"></script>
<!-- RESOURCES-->
						<?php } elseif( get_row_layout() == 'resources' ) {  
							$lastbg = $bg;
				        		$bg = get_sub_field('background');
				        		if($bg == 'white') {
				        			$bgclass = 'whitesection'.($lastbg == $bg ? ' removepadding' : '');
				        		} elseif($bg == 'lightgrey') {
				        			$bgclass = 'greysection'.($lastbg == $bg ? ' removepadding' : '');
				        		} elseif($bg == 'darkgrey') {
				        			$bgclass = 'greysection'.($lastbg == $bg ? ' removepadding' : '');
				        		}elseif($bg == 'color') {
				        			$bgclass = 'colorsection'.($lastbg == $bg ? ' removepadding' : '');
				        		}
				        	$overrideID = get_sub_field('override_id');
					       	?>
							<section id="<?= !empty($overrideID) ? $overrideID:'section-'.$intRow ?>" class="resources <?= $bgclass; ?> listsection" <?= $intRow > 2 ? 'data-appear-top-offset="-200"' : '' ?>>
								<div class="w-container">
									<div class="w-row">
										<div class="w-col w-col-12">
				        					<?php if($intRow == 1): ?><h1><?php else: ?><h2><?php endif;?>
												<?php the_sub_field('section_title');?>
											<?php if($intRow == 1): ?></h1><?php else: ?></h2><?php endif;?>
											<?php if( get_sub_field('section_subtitle')  != "" ){?>
												<h3 class="subheading">
													<?php the_sub_field('sub_title');?>
												</h3>
											<?php } ?>
					        			</div>
					        		</div>
									<div class="w-row">
											<?php
											if( have_rows('resource_link') ):
												$i = 1;
												?>
												<?php while ( have_rows('resource_link') ) : the_row(); ?>
													<div class="w-col w-col-6 w-col-medium-12 w-col-small-12 w-col-tiny-12 single_resource">
														<div class="resource">
															<div class="w-row">
																<div class="w-col w-col-4 w-col-small-4">
																	<?php $arrImg = get_sub_field('preview_image');?>
																	<img src="<?= $arrImg['sizes']['preview']?>" alt="<?= $arrImg['alt']?>">
																</div>
																<div class="w-col w-col-8 w-col-small-8">
																	<h3 class="resource_title">
																		<?php the_sub_field('resource_title');?>
																	</h3>
																	<p>
																		<?php the_sub_field('resource_description');?>
																	</p>
																	<?php if (get_sub_field('download_link')):?>
																		<a class="readmore" href="<?php the_sub_field('download_link');?>" download>
																			Download
																		</a>
																	<?php endif;?>
																	<!-- <?php echo '<pre>',print_r($file, true),'</pre>'; ?> -->
																</div>
															</div>
														</div>							
													</div>
												<?php
												$i++;
												endwhile; ?>
										   	<?php else :
											endif;
											?>
						        	</div>
							</section>
<!-- BLOG-->					
						<?php } elseif( get_row_layout() == 'blog' ) {  
							$lastbg = $bg;
				        		$bg = get_sub_field('background');
				        		if($bg == 'white') {
				        			$bgclass = 'whitesection'.($lastbg == $bg ? ' removepadding' : '');
				        		} elseif($bg == 'lightgrey') {
				        			$bgclass = 'greysection'.($lastbg == $bg ? ' removepadding' : '');
				        		} elseif($bg == 'darkgrey') {
				        			$bgclass = 'greysection'.($lastbg == $bg ? ' removepadding' : '');
				        		}elseif($bg == 'color') {
				        			$bgclass = 'colorsection'.($lastbg == $bg ? ' removepadding' : '');
				        		}
				        	$overrideID = get_sub_field('override_id');
					       	?>
							<section id="<?= !empty($overrideID) ? $overrideID:'section-'.$intRow ?>" class="blog <?= $bgclass; ?> listsection" <?= $intRow > 2 ? 'data-appear-top-offset="-200"' : '' ?>>
								<div class="w-container">
									<div class="w-row">
										<div class="w-col">
											<?php if($intRow == 1): ?><h1><?php else: ?><h2><?php endif;?>
													<?php the_sub_field('section_title');?>
												<?php if($intRow == 1): ?></h1><?php else: ?></h2><?php endif;?>
												<?php if( get_sub_field('section_subtitle')  != "" ){?>
													<h3 class="subheading">
														<?php the_sub_field('sub_title');?>
													</h3>
												<?php } ?>
										</div>
									</div>
									<div class="w-row">
					                    <?php
										$args = array(
										    'numberposts' => 3,
										    'post_status' => 'publish'
										);
										$recent_posts = wp_get_recent_posts( $args, ARRAY_A );
										$i=1;
										foreach( $recent_posts as $recent ){ 
											if ( has_post_thumbnail($recent["ID"]) ) {
					                            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($recent["ID"]), 'blog_thumb' );
					                            // echo '<pre>'.print_r($thumb,true).'</pre>';
					                            $url = $thumb['0'];
					                        }
					                        else {
					                            $url = get_stylesheet_directory_uri() . '/images/placeholder.jpg';
					                        }
					                        if($i == 1) {
					                            $cols = "w-col w-col-6 w-col-medium-12";
					                        } else {
					                            $cols = "w-col w-col-3 w-col-medium-6";
					                        }?>
											<div class="<?= $cols;?>">
												 <article class="blog_article">
					                                <div class="blog_image" style="background: url(<?=$url?>)">
					                                </div>
					                                <div class="blog_extract">
					                                    <h3>
					                                      <?php echo $recent["post_title"];?>
					                                    </h3>
					                                    <span class="date">
					                                       <?php echo $recent["date"];?>
					                                    </span>
					                                    <div>
					                                        <?php $content = get_the_content(); $content = strip_tags($content); echo substr($content, 0, 100);?>...
					                                    </div>
					                                </div>
					                                <div class="product_overlay">
					                                    <a class="blog_link" href="<?php echo get_permalink($recent["ID"]);?>">
					                                        <span>
					                                            Read more
					                                        </span>
					                                    </a>
					                                </div>
					                            </article>
				                               <!--  <a class="solution" href="<?php echo get_permalink($recent["ID"]);?>">
													<?php echo get_the_post_thumbnail( $recent["ID"], 'blogthumb' ); ?>
													<h3>
														<?php echo $recent["post_title"];?>
													</h3>
												</a> -->
					                        </div>
					                        <?php $i++;?>
										<?php } ?>
									</div>
								</div>
							</section>
<!-- FEATURE TABS-->
						<?php } elseif( get_row_layout() == 'features' ) {  
							$lastbg = $bg;
				        		$bg = get_sub_field('background');
				        		if($bg == 'white') {
				        			$bgclass = 'whitesection'.($lastbg == $bg ? ' removepadding' : '');
				        		} elseif($bg == 'lightgrey') {
				        			$bgclass = 'greysection'.($lastbg == $bg ? ' removepadding' : '');
				        		} elseif($bg == 'darkgrey') {
				        			$bgclass = 'greysection'.($lastbg == $bg ? ' removepadding' : '');
				        		}elseif($bg == 'color') {
				        			$bgclass = 'colorsection'.($lastbg == $bg ? ' removepadding' : '');
				        		}
				        	$overrideID = get_sub_field('override_id');
					       	?>
							<section id="<?= !empty($overrideID) ? $overrideID:'section-'.$intRow ?>" class="feature_tab <?= $bgclass; ?> listsection" <?= $intRow > 2 ? 'data-appear-top-offset="-200"' : '' ?>>
								<div class="w-container">
									<div class="w-row">
										<div class="w-col">
											<div class="centered">
												<?php if($intRow == 1): ?><h1><?php else: ?><h2><?php endif;?>
													<?php the_sub_field('section_title');?>
												<?php if($intRow == 1): ?></h1><?php else: ?></h2><?php endif;?>
												<?php if( get_sub_field('section_subtitle')  != "" ){?>
													<h3 class="subheading">
														<?php the_sub_field('sub_title');?>
													</h3>
												<?php } ?>
											</div>
										</div>
									</div>
									<?php
										if( have_rows('feature_tabs') ):
											$i = 1;
											?>
											<div class="w-row">
												<div class="w-col">
													<div class="slick slider-nav" data-slick='{"slidesToShow": 5, "slidesToScroll": 1, "arrows": false, "asNavFor": ".slider-for", "dots": true, "centerMode": false, "focusOnSelect": true}'>
														<?php
														while ( have_rows('feature_tabs') ) : the_row(); ?>
															<div class="slider-nav-link">
																<div class="slider_nav_link_internal">
																	<?php the_sub_field('icon');?>
																	<span class="feature_title">
																		<?php the_sub_field('tab_title');?>
																	</span>
																</div>
															</div>
															<?php
															$i++;
														endwhile; ?>
													</div>
													<div class="slick slider-for" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "arrows": false, "fade": true, "asNavFor": ".slider-nav","responsive":[{"breakpoint":1024,"settings": {"arrows": true}},{"breakpoint":800,"settings": {"arrows": true}}]}'>
														<?php 
														while ( have_rows('feature_tabs') ) : the_row(); ?>
															<div class="feature_slide">
																<div class="w-row">
																	<div class="w-col w-col-7">
																		<h3><?php the_sub_field('tab_subtitle');?></h3>
																		<p><?php the_sub_field('tab_content');?></p>
																	</div>
																	<div class="w-col w-col-5">
								        							<?php
								        								$image = get_sub_field('image');
														        		$image = $image['sizes']['feat'];
								        							?>
																	<?php if(!empty($image)): ?><img class="slideimage go" src="<?= $image ?>" alt="" /><?php endif; ?>
																	</div>
																</div>
															</div>
															<?php
															$i++;
														endwhile; ?>
													</div>
												</div>
											</div>
									   	<?php else :
											// no rows found
										endif;
									?>	
								</div>
							</section>
							<?php
							if(!wp_script_is('slick-js')) wp_enqueue_script( 'slick-js', get_template_directory_uri().'/slick/slick.min.js', array('jquery'), false, true );
							if(wp_script_is('slick-js')) { 
							?>
								<script type="text/javascript">
								/*jQuery(document).ready(function(){
									jQuery('.slider-for').slick();
									jQuery('.slider-nav').slick();
								});*/
								</script>
							<?php } ?>
<!-- GENERAL SLIDER -->
						<?php } elseif( get_row_layout() == 'gen_slider' ) {  ?>
				        	<?php
				        		$lastbg = $bg;
				        		$bg = get_sub_field('background');
				        		if($bg == 'white') {
				        			$bgclass = 'whitesection'.($lastbg == $bg ? ' removepadding' : '');
				        		} elseif($bg == 'lightgrey') {
				        			$bgclass = 'greysection'.($lastbg == $bg ? ' removepadding' : '');
				        		} elseif($bg == 'darkgrey') {
				        			$bgclass = 'greysection'.($lastbg == $bg ? ' removepadding' : '');
				        		}elseif($bg == 'color') {
				        			$bgclass = 'colorsection'.($lastbg == $bg ? ' removepadding' : '');
				        		}
				        		$overrideID = get_sub_field('override_id');
				        	?>
					        <section id="<?= !empty($overrideID) ? $overrideID:'section-'.$intRow ?>" class="slider-section"  >
				        		<div class="slick slider" data-slick='{"autoplay":true, "autoplaySpeed":4000, "fade":true, "speed":1000, "dots":false, "responsive": [{"breakpoint": 991,"settings": {"dots":false} }] }' >
							        <?php
							        if( have_rows('slider') ):
							            while ( have_rows('slider') ) : the_row();
								            $featuredImage = get_sub_field('featured_image');
								            $backgroundImage = get_sub_field('background_image');
								            ?>
								            <div class="slide" style=" background: url(<?php echo $backgroundImage['sizes']['slider']?>); background-size: cover;">
								                <div class="w-container">
								                    <div class="w-col w-col-6 w-col-medium-6 w-col-small-12 w-col-tiny-12">
								                    	<?php if($featuredImage):?>
								                        	<img class="slide_image" src="<?php echo $featuredImage['sizes']['featuredImage'];?>" alt="" />
								                    	<?php endif;?>
							                            <?php if($badge):?>
							                            	<div class="badge">
								                              	<?php
								                                    if($badge != "") {?>
								                                            <span class="badge_top">
								                                            	<?php the_sub_field('badge_top');?>
								                                            </span>
								                                            <span class="badge_bottom">
								                                            	<?php the_sub_field('badge_bottom');?>
								                                            </span>
								                                    <?php }
								                                ?>
							                            	</div>
							                            <?php endif;?>
								                    </div>
								                    <div class="w-col w-col-6 w-col-medium-6 w-col-small-12 w-col-tiny-12">
								                        <?php
								                        	$txtColor = get_sub_field('text_colour');
								                        	$strTitle = get_sub_field('slider_title');
								                        	$strContent = get_sub_field('slider_content');
								                        	$badge = get_sub_field('badge_bottom');
								                        ?>

								                        <div class="slide_content">
								                        	<?php if($strTitle):?>
								                            	<h2 class="">
								                                	<?= $strTitle;?>
								                            	</h2>
							                            	<?php endif;?>
							                            	<?php if($strContent):?>
									                            <div class="slider_text">
									                                <div class="message">
									                                    <?= $strContent;?>
									                                </div>
									                            </div>
								                        	<?php endif;?>
								                            <?php if (get_sub_field('slide_link') != '') { ?> 
								                                <a class="readmore" href="<?php the_sub_field('slide_link');?>">
								                                    <?php the_sub_field('slide_link_text');?> &nbsp;<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
								                                </a>
								                            <?php } ?>
								                        </div>
								                    </div>
								                </div>
								            </div>
							            <?php endwhile;
							        else :
							        endif;
							        ?>
							    </div>
							</section>
							<?php
							if(!wp_script_is('slick-js')) wp_enqueue_script( 'slick-js', get_template_directory_uri().'/slick/slick.min.js', array('jquery'), false, true );
							if(wp_script_is('slick-js')) { 
							?>
								<script type="text/javascript">
								/*jQuery(document).ready(function(){
									jQuery('.examples').slick();
								});*/
								</script>
							<?php } ?>

<!-- PRICE LIST-->				
						<?php } elseif( get_row_layout() == 'price_list' ) {  
							$lastbg = $bg;
				        		$bg = get_sub_field('background');
				        		if($bg == 'white') {
				        			$bgclass = 'whitesection'.($lastbg == $bg ? ' removepadding' : '');
				        		} elseif($bg == 'lightgrey') {
				        			$bgclass = 'greysection'.($lastbg == $bg ? ' removepadding' : '');
				        		} elseif($bg == 'darkgrey') {
				        			$bgclass = 'greysection'.($lastbg == $bg ? ' removepadding' : '');
				        		}elseif($bg == 'color') {
				        			$bgclass = 'colorsection'.($lastbg == $bg ? ' removepadding' : '');
				        		}
				       		$overrideID = get_sub_field('override_id');
					       	?>
							<section id="<?= !empty($overrideID) ? $overrideID:'section-'.$intRow ?>" class="prices <?= $bgclass; ?> listsection" <?= $intRow > 2 ? 'data-appear-top-offset="-200"' : '' ?>>
								<div class="w-container">
									<div class="w-row">
										<div class="w-col">
											<div class="centered">
												<?php if($intRow == 1): ?><h1><?php else: ?><h2><?php endif;?>
													<?php the_sub_field('section_title');?>
												<?php if($intRow == 1): ?></h1><?php else: ?></h2><?php endif;?>
												<?php if( get_sub_field('section_subtitle')  != "" ){?>
													<h3 class="subheading">
														<?php the_sub_field('sub_title');?>
													</h3>
												<?php } ?>
											</div>
										</div>
									</div>
									<div class="w-row">
										<div class="w-col">
											<div class="matrixwrapper">
												<div class="matrix">
													<table>
														<tr>
															<?php
															if( have_rows('package_titles') ):
															while ( have_rows('package_titles') ) : the_row(); ?>
																<th class="headcol empty">
																Packages
																</th>
																<?php if(get_sub_field('pkg_1')):?>
															        <th class="red">
															       		<?php the_sub_field('pkg_1');?>
															       	</th>
														       	<?php endif;?>
														       	<?php if(get_sub_field('pkg_2')):?>
															        <th class="purple">
															        	<?php the_sub_field('pkg_2');?>
															        </th>
															    <?php endif;?>
													        	<?php if(get_sub_field('pkg_3')):?>
														        	<th class="green">
														        		<?php the_sub_field('pkg_3');?>
														        	</th>
													    		<?php endif;?>
														    <?php endwhile;
																else :
																endif;
																?>
														</tr>											
														<?php
															if( have_rows('table_horizontal_column') ):
																$i = 1;
																?>
														<?php while ( have_rows('table_horizontal_column') ) : the_row(); 
															$strCol1 = get_sub_field('column_1');
															$strCol2 = get_sub_field('column_2');
															$strCol3 = get_sub_field('column_3');

														?>
													    <tr <?php if(empty($strCol1) && empty($strCol2) && empty($strCol3)): ?>class="headrow"<?php endif; ?>>
													        <td class="headcol">
													        	<?php the_sub_field('row_title');?>
													        </td>
													        <?php if(!empty($strCol1)):?>
														        <td class="red">
														        	<?php 
														        	$strCol1 = get_sub_field('column_1');
														        	switch($strCol1){
														        		case 'tick':
														        			?>
														        			<i class="fa fa-check" aria-hidden="true"></i>
														        			<?php
														        		break;
														        		case 'cross':
														        			?>
														        			<i class="fa fa-times" aria-hidden="true"></i>
														        			<?php
														        		break;
														        		default:
														        			echo $strCol1;										  
														        		break;										        		
														        	}?>
														        </td>
													        <?php else: ?>
													        	<td>&nbsp;</td>
													        <?php endif; ?>
													        <?php if(!empty($strCol2)):?>
														        <td class="purple">
														        	<?php 
														        	$strCol2 = get_sub_field('column_2');
														        	switch($strCol2){
														        		case 'tick':
														        			?>
														        			<i class="fa fa-check" aria-hidden="true"></i>
														        			<?php
														        		break;
														        		case 'cross':
														        			?>
														        			<i class="fa fa-times" aria-hidden="true"></i>
														        			<?php
														        		break;
														        		default:
														        			echo $strCol2;										  
														        		break;										        		
														        	}?>
														        </td>
													        <?php else: ?>
													        	<td>&nbsp;</td>														        
													        <?php endif;?>
													        <?php if(!empty($strCol3)): ?>
														        <td class="green">
														        	<?php 
														        	$strCol3 = get_sub_field('column_3');
														        	switch($strCol3){
														        		case 'tick':
														        			?>
														        			<i class="fa fa-check" aria-hidden="true"></i>
														        			<?php
														        		break;
														        		case 'cross':
														        			?>
														        			<i class="fa fa-times" aria-hidden="true"></i>
														        			<?php
														        		break;
														        		default:
														        			echo $strCol3;										  
														        		break;										        		
														        	}?>
														        </td>
													        <?php else: ?>
													        	<td>&nbsp;</td>														        
													    	<?php endif;?>
													    </tr>
														<?php
														$i++;
														endwhile; ?>
													</table>
												</div>
											</div>
										</div>
									</div>
									<div class="w-row">
										<div class="w-col w-col-12">
											<div class="extra-text">
												<?php the_sub_field('extra_text')?>
											</div>
										</div>
									</div>
									   	<?php else :
											// no rows found
										endif;
										?>	
								</div>
							</section>
						<?php 
			 			}
			 			$intRow ++;
			 			$intSequence = $intSequence + 10;
		    		endwhile;
				else:
				endif;?>
			</article><!-- #post-## -->
		<?php endwhile; // End of the loop. ?>
	</div><!-- #primary -->
<?php get_footer(); ?>
