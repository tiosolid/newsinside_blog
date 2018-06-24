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
					<div class="pages" id="page-<?php the_ID(); ?>">
						<h2><?php the_title(); ?></h2>
						<div class="page">
							<?php the_content('Read the rest of this entry &raquo;'); ?>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		<?php else : ?>
			<h2 class="center">P&#xE1;gina Não Encontrado</h2>
			<p class="center">Desculpe, mas a p&#xE1;gina solicitada não pode ser encontrada.</p>
		<?php endif; ?>
	</div>
	<div class="col-md-4" id="sidebar"> <!-- Sidebar -->
		<?php get_sidebar(1); ?>
	</div>
</div>
<?php get_footer(); ?>