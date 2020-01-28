<?php
/**
 * Template Name: Inicial pt-br
 * Description: Página Inicial pt-br
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package packexitlag_blog
 */
get_header();
?>
	<section class="section-header-blog">
		<div class="container">
			<h1><?php echo get_the_title(); ?></h1>
			<nav class="nav-blog">
				<div class="scroll-nav-mobile">
					<ul>
					<li>
						<a class="transition active-link-blog" href="<?php echo esc_url( home_url( '/' ) ); ?>">Início</a>
					</li>
					<li>
						<a class="transition" href="<?php echo esc_url( home_url( '/todos-os-posts/' ) ); ?>">Todos os posts</a>
					</li>
					<?php
						$i =0;
						$categorias = get_categories();
						foreach ($categorias as $categorias):
							$nomeCategoria = $categorias->name;
							$linkCategoria = get_category_link( $categorias->cat_ID );
							if($i <5):
					?>
					<li>
						<a  class="transition" href="<?php echo $linkCategoria; ?>"><?php echo $nomeCategoria; ?></a>
					</li>
					<?php endif;$i++; endforeach; ?>
					</ul>
				</div>
				
				<div class="search-blog">
					<form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
						<input type="text" name="s" id="search" placeholder="Buscar">
						<button type="submit" class="fas fa-search"></button>
					</form>
				</div>
			</nav>
		</div>
	</section>

	<section class="section-content-blog">
		<div class="container">
			<div class="areaDestaque">
			<?php 
				$postDestaque = new WP_Query(
					array(
						'post_type'      => 'post',
						'posts_per_page' => -1, 
						'order' => 'DESC', 
					)
				);
			?>

			<?php

			while($postDestaque->have_posts()): $postDestaque->the_post();
				$imagem_destaque = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' )[0];
				$verificacaoDestaque = rwmb_meta('Exitlag_post_carrossel_destaque');
				$verificacaoUpdates  = rwmb_meta('Exitlag_post_carrossel_destaque_Updates');
				$fotoDestaque        = rwmb_meta('Exitlag_post_carrossel_destaque_foto')['full_url'];

				if($fotoDestaque){
					$imagem_destaque  = $fotoDestaque;
				}
				if($verificacaoDestaque == 1):
			?>
			<a href="<?php echo get_permalink() ?>" class="main-post-blog">
				<img src="<?php echo $imagem_destaque; ?>" alt="<?php echo get_the_title()?>">
				<div class="contain-main-post-blog">
					<div class="content-main-post-blog">
						<p><?php echo the_time('j M Y'); ?></p>
						<h2><?php echo get_the_title()?></h2>
					</div>
					<?php if($verificacaoUpdates == 1): ?>
					<div class="star-main-post-blog">
						<span class="far fa-star"></span>
						  <p>DESTAQUE</p>
					</div>
					<?php endif; ?>
				</div>
			</a>
			<?php endif;endwhile; ?>
			</div>

			<div class="contain-block-posts-blog">
				<h2>Os mais populares</h2>
				<div class="block-post-blog flex">

					<?php 

						$popularpost = new WP_Query( array( 'posts_per_page' => 3, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
						while ( $popularpost->have_posts() ) : $popularpost->the_post();
						$popularpost_img = wp_get_attachment_image_src( get_post_thumbnail_id($popularpost->ID), 'full' )[0];
						$categoriasPost = get_the_category();
						foreach ($categoriasPost as $categoria){
							$categoriaPostNome = $categoria->name;
							$categoriaPostLink = get_category_link($categoria->cat_ID);
						}
					?>
					<a href="<?php echo  get_permalink() ?>" class="each-post-blog">
						<div class="img-post-blog">
							<img src="<?php echo $popularpost_img; ?>" alt="<?php echo get_the_title(); ?>">
						</div>
						<h3 class="title-post-blog"><?php echo get_the_title(); ?></h3>
						<div class="cat-post-blog flex">
							<p><?php echo the_time('j \d\e F \d\e Y'); ?> </p>
							<span>|</span>
							<p><?= $categoriaPostNome; ?></p>
						</div>
					</a>
				  <?php endwhile;?>
				</div>
			</div>
			
			<div class="contain-block-posts-blog">
				<h2>Últimos posts</h2>
				<?php 
					$posts = new WP_Query(
						array(
							'post_type' => 'post',
							'posts_per_page' => 5, 
							'orderby' => 'id',
						)
					);

					while($posts->have_posts()): $posts->the_post();
						$imagem_destaque = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' )[0];
						$categoriasPost = get_the_category();
						foreach ($categoriasPost as $categoria){
							$categoriaPostNome = $categoria->name;
							$categoriaPostLink = get_category_link($categoria->cat_ID);
						}
				?>
				<a href="<?php echo get_permalink() ?>" class="each-post-blog margin-each-post-blog flex">
					<div class="img-post-blog">
						<img src="<?php echo $imagem_destaque; ?>" alt="<?php echo get_the_title()?>">
					</div>
					<div class="container-post-blog">
						<h3 class="title-post-blog"><?php echo get_the_title()?></h3>
						<div class="cat-post-blog flex">
							<p><?php echo the_time('j M Y'); ?></p>
							<span>|</span>
							<p><?= $categoriaPostNome; ?></p>
						</div>
						<p class="paragraph-post-blog"><?php the_excerpt(); ?></p>
					</div>					
				</a>
				<?php endwhile; ?>
				<a class="button-all-posts-blog transition" href="<?php echo esc_url( home_url( '/categoria/todos-os-posts/' ) ); ?>">ver todos os posts <span class="fas fa-angle-right"></span></a>

			</div>
		</div>
	</section>
	<?php if($configuracao['opt_box_vermelho_titulo']):?>
	<section class="section-knowing">		
		<div class="contain-free-test">			
			<div class="content-free-test">
				
				<h3><?php echo $configuracao['opt_box_vermelho_titulo']; ?></h3>
				<?php 	 if($configuracao['opt_box_vermelho_tituloLink']): ?>
				<a class="button-teste-gratis transition" href="<?php echo $configuracao['opt_box_vermelho_tituloLink']; ?>">Teste Grátis<span class="fas fa-angle-right"></span></a>	
				<?php endif; ?>		
			</div>					
		</div>
	</section>
	<?php endif;?>
<?php get_footer(); ?>