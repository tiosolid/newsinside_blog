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
					<div class="posts" id="post-<?php the_ID(); ?>">
						<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						<div class="entry">
							<?php the_content('Read the rest of this entry &raquo;'); ?>
							<!--<div class="fb-like" data-href="<?php the_permalink() ?>" data-layout"button_count" data-action="like" data-show-faces="true" data-share="true"></div>-->
						</div>
						<div id="postmetadata" class="row postmeta">
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
				<?php endwhile; ?>
				<nav>
				  <ul class="pager">
					<li class="previous"><?php previous_posts_link('&larr; P&#225;gina Anterior'); ?></li>
					<li class="next"><?php next_posts_link('Pr&#243;xima P&#225;gina &rarr;'); ?></li>
				  </ul>
				</nav>
			</div>
		<?php else : ?>
			<h2 class="text-center">Post Não Encontrado</h2>
			<p class="text-center">Desculpe, mas o post solicitado não pode ser encontrado</p>
		<?php endif; ?>
	</div>
	<div class="col-md-4"> <!-- Sidebar -->
		<?php get_sidebar(1); ?>
	</div>
</div>
<?php get_footer(); ?>