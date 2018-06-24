<?php
/*
Plugin Name: Podcast Widget
Plugin URI: http://www.newsinside.org/
Description: Exibe uma imagem configurada via Custom Fields de uma determinada Categoria
Author: TioSolid
Version: 1
Author URI: http://www.newsinside.org/
*/

function PodcastWidget() {
	//Funcionalidade do Widget
	$categoria = get_option("PodcastWidget-categoria");
	$customfield = get_option("PodcastWidget-customfield");
	$imagem = get_option("PodcastWidget-imagem");
	
	//Valida as opções. Caso inválidas, não exibe nada na tela
	if ($categoria != false && $customfield != false && $imagem != false) {
		$lastpodcast = get_posts('numberposts=1&category=' . $categoria);
		
		if ($lastpodcast != null) {
			foreach($lastpodcast as $post) {
				$imagem_podcast = get_post_meta($post->ID, $customfield, true);
			
				if ($imagem_podcast == null) $imagem_podcast = $imagem;
			
				//Imprime o bloco html na página
				?>
				<div id="podcast" class="podcast-widget center-block">
					<a href="<?php echo get_permalink($post->ID); ?>"><img class="img-responsive" src="<?php echo $imagem_podcast; ?>" /></a>
					<nav>
						<ul class="pager">
							<li><a href="<?php echo get_permalink($post->ID); ?>">Clique aqui e ou&#231;a agora</a></li>
						</ul>
					</nav>
				</div>
				<?php
			}
		}
	}
}

function widget_PodcastWidget($args) {
  extract($args);
  $titulo = get_option("PodcastWidget-titulo");
  if ($titulo == false) $titulo = 'Podcast Widget';
  echo $before_widget;
	echo $before_title;
		echo $titulo;
	echo $after_title;
	PodcastWidget();
  echo $after_widget;
}

function PodcastWidget_control() { //Form do painel de controle do widget
	$titulo = get_option("PodcastWidget-titulo");
	$categoria = get_option("PodcastWidget-categoria");
	$customfield = get_option("PodcastWidget-customfield");
	$imagem = get_option("PodcastWidget-imagem");
	
	if ($titulo == false) $titulo = '';
	if ($categoria == false) $categoria = '';
	if ($customfield == false) $customfield = '';
	if ($imagem == false) $imagem = '';
  
	if ($_POST['PodcastWidget-Submit']) {
		$titulo = htmlspecialchars($_POST['PodcastWidget-titulo']);
		$categoria = $_POST['PodcastWidget-categoria'];
		$customfield = $_POST['PodcastWidget-customfield'];
		$imagem = $_POST['PodcastWidget-imagem'];

		update_option("PodcastWidget-titulo", $titulo);
		update_option("PodcastWidget-categoria", $categoria);
		update_option("PodcastWidget-customfield", $customfield);
		update_option("PodcastWidget-imagem", $imagem);
	}
?>
  <p>
    <label for="PodcastWidget-titulo">Titulo:</label>
    <input type="text" id="PodcastWidget-titulo" name="PodcastWidget-titulo" value="<?php echo $titulo; ?>" />
	<br />
	<label for="PodcastWidget-categoria">ID da Categoria:</label>
    <input type="text" id="PodcastWidget-categoria" name="PodcastWidget-categoria" value="<?php echo $categoria; ?>" />
	<br />
	<label for="PodcastWidget-customfield">Custom Field:</label>
    <input type="text" id="PodcastWidget-customfield" name="PodcastWidget-customfield" value="<?php echo $customfield; ?>" />
	<br />
	<label for="PodcastWidget-imagem">Imagem Default:</label>
    <input type="text" id="PodcastWidget-imagem" name="PodcastWidget-imagem" value="<?php echo $imagem; ?>" />

	<input type="hidden" id="PodcastWidget-Submit" name="PodcastWidget-Submit" value="1" />
  </p>
<?php
}

function PodcastWidget_init() {
  register_sidebar_widget('Podcast Widget', 'widget_PodcastWidget');
  register_widget_control('Podcast Widget', 'PodcastWidget_control', 300, 200 );
}

add_action("plugins_loaded", "PodcastWidget_init");
?>