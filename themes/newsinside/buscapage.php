<?php
/*
Template Name: Resultados de Busca
*/
?>
<?php get_header(); ?>

<div class="row"> <!-- Content -->
	<div class="col-md-8"> <!-- Post -->
		<div class="breadcrumb"><?php if(function_exists('bcn_display')) { bcn_display(); } ?></div>
		<div class="content">
			<div class="busca">
				<gcse:search></gcse:search>
			</div>
		</div>
	</div>
	<div class="col-md-4" id="sidebar"> <!-- Sidebar -->
		<?php get_sidebar(1); ?>
	</div>
</div>
<?php get_footer(); ?>