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
		<div class="content">
			<div class="error-404" id="post-404">
				<h2>Erro 404 - P&#225;gina N&#227;o Encontrada</h2>
				<div class="erro404">
					<p align="center"><img class="img-responsive" src="<?php bloginfo('template_url'); ?>/images/winners.png" /></p>
					<?php $uri = $_SERVER['REQUEST_URI']; 
					$eurl = explode('/', $uri);
					$keywords = str_replace('-', ' ', $eurl[count($eurl) - 1]);
					?>
					<p>Desculpe, a p&#225;gina que voc&#234; procurava n&#227;o pode ser encontrada nesse endere&#231;o mas podemos ajudar-lo a encontrar-la no endere&#231;o correto.</p>
					<p><h3>Pesquisar</h3>
					Utilize a caixa de pesquisa abaixo e procure o que desejava em nosso site.
					<!-- Google CSE Search Box Begins  -->
					<form class="form-inline" action="http://www.newsinside.org/search" id="">
						<div class="form-group">
						<input type="hidden" name="cx" value="" />
						<input type="hidden" name="cof" value="FORID:11" />
						<input type="text" class="form-control input-sm" name="q" value="<?php echo $keywords; ?>" />
						<button class="btn btn-default btn-sm" type="submit" name="sa">Pesquisar</button>
						</div>
					</form>
					</p>
					
					<p><h3>Melhores Artigos</h3>
					Confira abaixo uma lista com alguns de nossos melhores artigos:
					<?php $topposts = get_posts('tag=featured&numberofposts=5'); ?>
					<ul>
					<?php foreach ($topposts as $post) { ?>
					<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="nofollow"><?php the_title(); ?></a></li>
					<?php } ?>
					</ul>
					</p>
					
					<p><h3>&#218;ltimos Artigos</h3>
					Abaixo voc&#234; pode ver uma lista com os &#250;ltimos 5 artigos publicados no site:
					<?php $topposts = get_posts('numberofposts=5'); ?>
					<ul>
					<?php foreach ($topposts as $post) { ?>
					<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="nofollow"><?php the_title(); ?></a></li>
					<?php } ?>
					</ul>
					</p>
					<p>
						<h3>Navegue por Categoria</h3>
						Caso ainda n&#227;o tenha encontrado o que deseja, utilize a navega&#231;&#227;o por categoria no menu no topo da p&#xE1;gina e conhe&#231;a tudo o que o NewsInside tem para lhe ofercer.
					</p>
				</div>
			</div>
		</div>			
	</div>
	<div class="col-md-4" id="sidebar"> <!-- Sidebar -->
		<?php get_sidebar(1); ?>
	</div>
</div>
<?php get_footer(); ?>