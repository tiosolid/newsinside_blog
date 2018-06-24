<?php
/*
Template Name: Index
*/
?>
<?php get_header(); ?>

<!-- Twitter Card Tags -->
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@newsinside" />
<meta name="twitter:title" content="<?php echo get_bloginfo('name'); ?>" />
<meta name="twitter:description" content="<?php echo get_bloginfo('description'); ?>" />
<meta name="twitter:image" content="http://www.newsinside.org/wp-content/themes/newsinside/images/newsinside-twitter.png" />

<div class="row"> <!-- Content -->
	<div class="col-md-8"> <!-- Left Side -->
		<?php if(function_exists('dynamic_content_gallery')) { ?>
			<div class="row"> <!-- Featured -->
				<div class="col-md-12">
					<div class="featured" id="feat">
						<?php dynamic_content_gallery(); ?>
					</div>			
				</div>
			</div>
		<?php } ?>
		<div class="row">
			<div class="col-md-6"> <!-- Articles -->
				<div class="content">
					<h3 class="widgettitle">&#218;ltimos Artigos</h3>
					<?php 
					$myposts = get_posts('numberposts=5');
					foreach($myposts as $post) { 
						setup_postdata($post); ?>
						<div class="posts" id="post-<?php the_ID(); ?>">
							<h2 class="ultimos"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
							<div class="entry"><?php the_excerpt() ?></div>
							<div id="postmetadata" class="row postmeta">
								<div id="metaleft" class="col-md-6 col-xs-6">
									<p class="text-left">
										<a href="<?php the_permalink(); ?>">Ver artigo completo</a>
									</p>
								</div>
								<div id="metaright" class="col-md-6 col-xs-6">
									<p class="text-right">
										<?php comments_popup_link('Nenhum Coment&#225;rio', '1 Coment&#225;rio', '% Coment&#225;rios'); ?>
									</p>
								</div>
							</div>
						</div>
					<?php } ?>
					<nav>
						<ul class="pager">
							<li><a href="<?php bloginfo('url') ?>/artigos" title="Clique aqui para ver todos os artigos do site">Ver todos os artigos </a></li>
						</ul>
					</nav>
				</div>
			</div>
			<div class="col-md-6"> <!-- Sidebar 2 -->
				<?php get_sidebar(2); ?>
			</div>
		</div>
	</div>
	<div class="col-md-4" id="sidebar"> <!-- Sidebar -->
		<?php get_sidebar(1); ?>
	</div>
</div>
<?php get_footer(); ?>