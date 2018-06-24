<?php
/*
Template Name: Arquivo
*/
?>
<?php get_header(); ?>
<?php $cat_info = get_page_category($_GET["id"]); ?>

<div class="row"> <!-- Content -->
	<div class="col-md-8"> <!-- Post -->
		<div class="breadcrumb"><?php if(function_exists('bcn_display')) { bcn_display(); } ?></div>
		<div class="content">
			<div class="arquivos" id="arquivos">
				<h2>Arquivo - <?php echo $cat_info->name; ?></h2>
				<div class="arquivo">
					<h3>&#218;ltimos 30 artigos da categoria <?php echo $cat_info->name; ?>:</h3>
					<?php $lastposts = get_posts(array('numberposts'=> '30','category'=>$cat_info->cat_ID)); ?>
					<ul>
					<?php foreach ($lastposts as $post) { ?>
							<li><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
					<?php } ?>
					</ul>
					<br />
					<h3>Arquivo completo por data dos &#xFA;ltimos 12 meses:</h3>
					<ul><?php wp_get_archives(array('limit'=>'12')); ?></ul>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4"> <!-- Sidebar -->
		<?php get_sidebar(1); ?>
	</div>
</div>
<?php get_footer(); ?>