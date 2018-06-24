<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */

if ( post_password_required() ) : ?>
<p><?php _e('Digite sua senha para poder ver os coment&#225;rios.'); ?></p>
<?php return; endif; ?>

<div class="row">
	<div id="comentarios" class="col-md-12">
		<h3 class="comments-header" id="comments"><?php comments_number(__('Nenhum Coment&#225;rio'), __('1 Coment&#225;rio'), __('% Coment&#225;rios')); ?>
			<?php if ( comments_open() ) : ?>
				(<a href="#postcomment" title="<?php _e("Clique aqui para deixar um coment&#225;rio nesse artigo"); ?>">comentar</a>)
			<?php endif; ?>
		</h3>
		<?php if ( $comments ) : ?>
			<ol id="commentlist" class="commentlist list-unstyled">
				<?php foreach ($comments as $comment) : ?>
					<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="comment-meta"><em>
									<?php comment_author_link() ?> 
									<?php comment_type(_c('comentou|noun'), __('deixou um trackback'), __('deixou um pingback')); ?> 
									<?php _e('em'); ?> <?php comment_date() ?> @ 
									<a href="#comment-<?php comment_ID() ?>" title="Permalink para esse coment&#xE1;rio"><?php comment_time() ?></a>
									<?php edit_comment_link(__("Editar"), ' | '); ?>
								</em></div>								
							</div>
							<div class="panel-body">
								<div class="row">
									<div id="comment-text" class="col-md-11 col-sm-11 col-xs-10">
										<div class="comment-text"><?php comment_text() ?></div>
									</div>
									<div id="comment-avatar" class="col-md-1 col-sm-1 col-xs-2">
										<?php echo get_avatar($comment); ?>
									</div>
								</div>
							</div>
						</div>
					</li>
				<?php endforeach; ?>
			</ol>
		<?php else : // If there are no comments yet ?>
			<p><?php _e('Ningu&#233;m comentou nesse artigo. Porque voc&#234; n&#227;o &#233; o primeiro?'); ?></p>
		<?php endif; ?>
		<?php if (comments_open()) : ?>
			<h3 id="postcomment" class="comments-header"><?php _e('Fa&#231;a um Coment&#225;rio'); ?></h3>
			<div id="disclaimer" class="alert alert-warning">
				<small>
					<p>Antes de deixar um coment&#225;rio certifique-se de que voc&#234; leu e concorda com a nossa <a href="<?php echo get_terms_url(); ?>" title="Pol&#xED;tica de Privacidade" target="_blank">pol&#237;tica de coment&#225;rios</a>.</p>
					<p>Favor ler todos os coment&#225;rios antes de postar. D&#250;vidas em como usar as informa&#231;&#245;es ou programas citados nesse artigo devem ser postadas no <a href="http://forums.newsinside.org" title="NewsInside Forum" target="_blank">NewsInside F&#243;rum</a>.
					<strong>Coment&#225;rios com d&#250;vidas ou perguntas referentes a uso de programas ou tutoriais ser&#227;o exclu&#237;das sem aviso pr&#233;vio.</strong></p>
					<p>Para citar um coment&#225;rio anterior utilize a tag <code>&#60;blockquote>Texto a ser citado&#60;/blockquote></code>.</p>
					<p>Usamos um sistema de modera&#231;&#227;o. Caso seu coment&#225;rio n&#227;o apare&#231;a na lista ap&#243;s ter sido enviado, aguarde at&#233; que ele seja liberado pelo sistema.</p>
				</small>
			</div>
			<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
				<p><?php printf(__('Voc&#234; deve <a href="%s">efetuar o login</a> para poder postar um coment&#225;rio.'), get_option('siteurl')."/wp-login.php?redirect_to=".urlencode(get_permalink()));?></p>
			<?php else : ?>
				<div class="row">
				<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
					<?php if ( $user_ID ) : ?>
						<div class="form-group col-sm-6">
						<p><?php printf(__('Logado como %s'), '<a href="'.get_option('siteurl').'/wp-admin/profile.php">'.$user_identity.'</a>'); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Fazer logout') ?>"><?php _e('[Log out]'); ?></a></p>
						</div>
					<?php else : ?>
						<div class="form-group col-sm-6">
							<label for="author" class="control-label form-group-sm"><?php _e('Nome:*'); ?></label>
							<input type="text" class="form-control input-sm" name="author" id="author" value="<?php echo $comment_author; ?>" tabindex="1" />
						</div>
						<div class="form-group col-sm-6">
							<label for="email" class="control-label form-group-sm"><?php _e('Email:*');?></label>
							<input type="email" class="form-control input-sm" name="email" id="email" value="<?php echo $comment_author_email; ?>" tabindex="2" />
						</div>
						<div class="form-group col-sm-6">						
							<label for="url" class="control-label form-group-sm"><?php _e('Site:'); ?></label>
							<input type="url" class="form-control input-sm" name="url" id="url" value="<?php echo $comment_author_url; ?>" tabindex="3" />
						</div>
					<?php endif; ?>
					<!--<p><small><strong>XHTML:</strong> <?php printf(__('You can use these tags: %s'), allowed_tags()); ?></small></p>-->
					<div class="form-group col-sm-12">
						<label for="comment" class="control-label form-group-sm"><?php _e('Coment&#xE1;rio:'); ?></label>
						<textarea class="form-control input-sm" name="comment" id="comment" rows="5" tabindex="4"></textarea>
						<br />
						<button class="btn btn-default btn-sm" name="submit" type="submit" id="submit" tabindex="5"><?php echo attribute_escape(__('Enviar Coment&#225;rio')); ?></button>
						<?php do_action('comment_form', $post->ID); ?>															
						<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
					</div>
				</form>
				</div>
			<?php endif; // If registration required and not logged in ?>
		<?php else : // Comments are closed ?>
			<p class="text-center"><?php _e('Sorry, the comment form is closed at this time.'); ?></p>
		<?php endif; ?>
	</div>
</div>