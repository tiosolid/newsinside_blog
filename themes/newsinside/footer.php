<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */
?>
<div id="footer" class="row footer"> <!--footer-->
	<div class="col-md-12">
		<p><h1 class="text-center"><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?></h1></p>
		<p class="text-center"><small>
			<a href="<?php echo get_settings('home'); ?>" title="Voltar para a p&#225;gina inicial">Home</a> -
			<a href="<?php bloginfo('url'); ?>/about" title="Sobre o autor do blog">O Autor</a> -
			<a href="<?php bloginfo('url'); ?>/contato" title="Entre em contato conosco">Contato</a> -
			<a href="<?php bloginfo('url'); ?>/parcerias" title="Banners, buttons e outras formas de divulgar o nosso site">Parcerias</a> -
			<a href="<?php bloginfo('url'); ?>/politicas" title="Leia a pol&#237;tica de nosso site e os termos de Copyright">Pol&#237;ticas do site e Copyright</a> -
			<a href="<?php bloginfo('url'); ?>/anuncie" title="Gostaria de ver seu an&#250;ncio no NewsInside? Saiba como clicando aqui">Anuncie no NewsInside</a>
			<br />
			<a href="http://forums.newsinside.org" title="Visite nosso f&#243;rum">NewsInside F&#243;rum</a> -
			<a href="http://loja.newsinside.org" title="Visite nossa loja virtual">NewsInside Store</a>			
			<br />
			<i>P&#225;gina gerada em <?php timer_stop(1); ?> segundos - <?php echo get_num_queries(); ?> queries</i>
		</small></p>
	</div>
	<?php wp_footer(); ?>
</div>
</div> <!-- <div id="container"> -->
</body>
</html>