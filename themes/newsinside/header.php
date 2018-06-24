<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml" <?php language_attributes(); ?>>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php $cat_info = get_page_category($_GET["id"]); ?>
	<title><?php if (is_page('arquivo')) { echo "Arquivo: " . $cat_info->name . " - " . get_bloginfo('name'); } elseif (is_page('index')) { echo get_bloginfo('name') . " - " . get_bloginfo('description'); } else { wp_title(''); echo " - " . get_bloginfo('name'); } ?></title>
    
    <link href="<?php bloginfo('template_url'); ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/style.css" rel="stylesheet">

	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<script async src="<?php bloginfo('template_url'); ?>/bootstrap/js/jquery-2.1.3.min.js"></script>
	<script async src="<?php bloginfo('template_url'); ?>/bootstrap/js/bootstrap.min.js"></script>
	
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta http-equiv="Content-Language" content="pt-br" />
	<meta name="generator" content="WordPress" />
	<meta name="theme" content="NewsInside" />
	<meta name="robots" content="<?php if ( is_archive()) { ?>noindex<?php } else { ?>index<?php } ?>,follow">	
	<meta name="copyright" content="2015 <?php bloginfo('name') ?>" />
	<meta name="abstract" content="Noticias, homebrew, handheld, consoles, modificacoes, modchip, firmware, tutoriais, videogames" />
	
	<meta name="MSSmartTagsPreventParsing" content="true" />
	<meta name="verify-v1" content="q9+QNODnC8i99A+5NrjTm2wphQLIbzQ8GUPZl9btFRI=" />	
	<META name="y_key" content="a2215c27b6853fbf" > 
	
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://feeds2.feedburner.com/newsinside" />	
	<link rel="alternate" type="text/xml" title="RSS .92" href="http://feeds2.feedburner.com/newsinside" />	
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="http://feeds2.feedburner.com/newsinside" />	
	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" />	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="canonical" href="http://www.newsinside.org/" />
    <script type="application/ld+json">
    {  "@context" : "http://schema.org",
       "@type" : "WebSite",
       "name" : "NewsInside Blog",
       "url" : "http://www.newsinside.org"
    }
    </script>	

	<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
	<meta property="og:locale" content="pt_BR" />

	<?php if (have_posts()):while(have_posts()):the_post(); endwhile; endif;?>
	<meta name="author" content="<?php the_author();?>">
	 
	<!-- if page is content page -->
	<?php if (is_single()) { ?>
	<meta property="og:url" content="<?php the_permalink() ?>"/>
	<meta property="og:title" content="<?php single_post_title(); ?>" />
	<meta property="og:description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>" />
	<meta property="og:type" content="article" />
	<?php 
	if (function_exists('wp_get_attachment_thumb_url')) {
		$thumb_url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
		if ($thumb_url == "") { $thumb_url = 'http://www.newsinside.org/wp-content/themes/newsinside/images/newsinside-facebook.jpg'; }
	}
	?>
	<meta property="og:image" content="<?php echo $thumb_url; ?>" />
	 
	<!-- if page is others -->
	<?php } else { ?>
	<meta property="og:url" content="<?php bloginfo('url') ?>" />
	<meta property="og:title" content="<?php bloginfo('name'); ?>" />
	<meta property="og:description" content="<?php bloginfo('description'); ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:image" content="http://www.newsinside.org/wp-content/themes/newsinside/images/newsinside-facebook.jpg" /> <?php } ?>

	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php wp_head(); ?>
</head>

<body>
	<div id="fb-root"></div>
	<div class="container-fluid">
		<div class="row header" id="header"> <!-- header -->
			<div class="col-md-5 col-sm-8 col-xs-12"> <!-- Logo -->
				<div class="logo">
					<a href="<?php echo get_settings('home'); ?>" title="<?php bloginfo('name') ?>">
						<img class="img-responsive" src="<?php bloginfo('template_url'); ?>/images/logo.jpg" />
					</a>
				</div>		
			</div>
			<div class="col-md-7 hidden-xs">
				<div class="links">
					<span class="linkforum">
						<a href="http://forums.newsinside.org" title="Visite nosso f&#243;rum"></a>
					</span>
					<span class="linkloja">
						<a href="http://loja.newsinside.org" title="Visite nossa loja virtual"></a>			
					</span>
				</div>
			</div>
		</div><!-- header -->
		<div class="row" id="menu">
			<nav class="navbar navbar-default navbar-inverse"> <!--menu-->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
			        <span class="sr-only">Menu</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand visible-xs" href="<?php echo get_option('home'); ?>/">NewsInside</a>
			    </div>
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<!-- <li> -->
						<?php echo get_category_menu(get_the_category()); ?>
						<!-- </li> -->					
					</ul>
					<!-- Google CSE Search Box Begins  -->
					<form class="navbar-form navbar-right" role="search" action="http://www.newsinside.org/search" id="">
						<div class="form-group">
							<input type="hidden" name="cx" value="" />
							<input type="hidden" name="cof" value="FORID:11" />
							<input type="text" name="q" id="query" class="form-control" placeholder="Pesquisa" />
							<button type="submit" name="sa" id="submit" class="btn btn-default">Buscar</button>
						</div>
					</form>				
			</nav><!--menu-->
		</div>
<!-- </div> Do not close the div here, closed on footer -->