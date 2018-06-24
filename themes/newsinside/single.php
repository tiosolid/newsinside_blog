<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */

?>
<?php get_header(); ?>

<div class="row"> <!-- Content -->
	<div class="col-md-8"> <!-- Post -->
		<div class="breadcrumb"><?php if(function_exists('bcn_display')) { bcn_display(); } ?></div>
		<?php if (have_posts()) : ?>
			<div class="content">
				<?php while (have_posts()) : the_post(); ?>
					<!-- Twitter Card Tags -->
					<meta name="twitter:card" content="summary_large_image" />
					<meta name="twitter:site" content="@newsinside" />
					<meta name="twitter:title" content="<?php the_title(); ?>" />
					<meta name="twitter:description" content="<?php the_excerpt(); ?>" />

					<div itemscope itemtype="http://schema.org/NewsArticle" class="posts" id="post-<?php the_ID(); ?>">
						<h2 itemprop="headline"><?php the_title(); ?></h2>
						<div class="entry">
							<span itemprop="articleBody"><?php the_content('Read the rest of this entry &raquo;'); ?></span>
							<div class="row">
								<div class="col-md-12">
									<div class="fb-like" data-href="<?php the_permalink() ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
								</div>
							</div>
						</div>
						<div id="postmetadata" class="row postmeta">
							<meta itemprop="datePublished" content="<?php the_time('c'); ?>"/>
							<div id="metaleft" class="col-md-6 col-sm-6">
								<p class="text-left"><small>
									Publicado em: <?php the_time('d/m/Y') ?> por <?php the_author() ?> <?php edit_post_link('[Editar Post]', '', ''); ?>
									<br />
									Leia mais sobre: <?php the_tags('', ', ', ''); ?>
								</small></p>
							</div>
							<div id="metaright" class="col-md-6 col-sm-6">
								<p class="text-right"><small>
									Categoria(s): <?php the_category(', ') ?>
									<br />
									<?php comments_popup_link('Nenhum Coment&#225;rio', '1 Coment&#225;rio', '% Coment&#225;rios'); ?>
								</small></p>
							</div>
						</div>
					</div>
					<?php if(function_exists('related_posts')) { ?>
						<div class="row">
							<div id="related" class="col-md-12"><?php related_posts(); ?></div>
						</div>
					<?php } ?>
					<?php comments_template(); ?>
				<?php endwhile; ?>
			</div>
		<?php else : ?>
			<h2 class="center">Post Não Encontrado</h2>
			<p class="center">Desculpe, mas o post solicitado não pode ser encontrado.</p>
		<?php endif; ?>
	</div>
	<div class="col-md-4" id="sidebar"> <!-- Sidebar -->
		<?php get_sidebar(1); ?>
	</div>
</div>
<?php get_footer(); ?>