<?php
/*
YARPP Template: Thumbnails
Description: Requires a theme which supports post thumbnails
Author: TioSolid (NewsInside)
*/ ?>
<?php if (have_posts()):?>
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<h3>Veja Tamb&#xE9;m</h3>
			<div class="row center-block">
				<?php $clearfix_count = 0; ?>
				<?php while (have_posts()) : the_post(); ?>
					<?php if (has_post_thumbnail()):?>
						<div class="col-md-2 col-sm-2 col-xs-4">
							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
								<?php the_post_thumbnail('thumbnail', array('class'=>'img-responsive yarpp-img')); ?>
							</a>
							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
								<p class="text-center"><small><strong><?php the_title_attribute(); ?></strong></small></p>
							</a>							
						</div>
					<?php else: ?>
						<div class="col-md-2 col-sm-2 col-xs-4">
							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
								<?php $random_img_num = mt_rand(1, 10); $random_img_name = 'default-' . $random_img_num . '.png'; ?>
								<img class="img-responsive yarpp-img" src="<?php echo get_template_directory_uri() . '/images/' . $random_img_name; ?>" />
							</a>
							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
								<p class="text-center"><small><strong><?php the_title_attribute(); ?></strong></small></p>
							</a>
						</div>
					<?php endif; ?>
					<?php $clearfix_count++; ?>
					<?php if (($clearfix_count % 3) == 0) { ?>
						<div class="clearfix visible-xs-block"></div>
						<div class="visible-xs-block"><hr></div>
					<?php } ?>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
<?php endif; ?>