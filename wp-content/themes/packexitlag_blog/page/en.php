<?php
/**
 * Template Name: Inicial en
 * Description: Página Inicial en
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package packexitlag_blog
 */
get_header('en');
?>
	<section class="section-header-blog">
		<div class="container">
			<h1><?php echo get_the_title(); ?></h1>
			<nav class="nav-blog">
				<div class="scroll-nav-mobile">
					<ul>
					<li>
							<a class="transition" href="<?php echo esc_url( home_url('/en/' ) ); ?>">Home</a>
						</li>
						<li>
							<a class="transition" href="<?php echo esc_url( home_url( '/all-posts/' ) ); ?>">All posts</a>
						</li>
						<?php
							$i =0;
							
							$terms = get_terms( array(
							    'taxonomy' => 'categoriaposten',
							    'hide_empty' => false,
							) );
							foreach ($terms as $terms):
								$nomeCategoria = $terms->name;
								$linkCategoria = get_category_link( $terms->term_id );
								
								if($i <5):
						?>
						<li>
							<a  class="transition <?php if($current_category->name == $nomeCategoria){echo "active-link-blog";}?>" href="<?php echo $linkCategoria; ?>"><?php echo $nomeCategoria; ?></a>
						</li>
						<?php endif;$i++; endforeach; ?>
					</ul>
				</div>
				
				<div class="search-blog">
					<form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
						<input type="text" name="s" id="search" placeholder="Search">
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
						'post_type'      => 'posten',
						'posts_per_page' => -1, 
						'order' => 'DESC', 
					)
				);
			?>

			<?php

			while($postDestaque->have_posts()): $postDestaque->the_post();
				$imagem_destaque = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' )[0];
				$verificacaoDestaque = rwmb_meta('Exitlag_posten_carrossel_destaque');
				$verificacaoUpdates  = rwmb_meta('Exitlag_posten_carrossel_destaque_Updates');
				$fotoDestaque        = rwmb_meta('Exitlag_posten_carrossel_destaque_foto')['full_url'];

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
						  <p>Updates</p>
					</div>
					<?php endif; ?>
				</div>
			</a>
			<?php endif;endwhile; ?>
			</div>

			<div class="contain-block-posts-blog">
				<h2>Most popular</h2>
				<div class="block-post-blog flex">

					<?php 

					 
						$postDestaque = new WP_Query(
							array(
								'post_type'      => 'posten',
								'posts_per_page' => -1, 
								'order' => 'rand', 
							)
						);
					

					while($postDestaque->have_posts()): $postDestaque->the_post();
						$popularpost_img = wp_get_attachment_image_src( get_post_thumbnail_id($popularpost->ID), 'full' )[0];
						$categoriasPost = get_the_terms($postDestaque->ID ,'categoriaposten');
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
				<h2>Latest posts</h2>
				<?php 
					$posts = new WP_Query(
						array(
							'post_type' => 'posten',
							'posts_per_page' => 5, 
							'orderby' => 'id',
						)
					);

					while($posts->have_posts()): $posts->the_post();
						$imagem_destaque = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' )[0];
						$categoriasPost = get_the_terms($postDestaque->ID ,'categoriaposten');
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
				<a class="button-all-posts-blog transition" href="<?php echo esc_url( home_url( '/categoria/todos-os-posts/' ) ); ?>">see all posts<span class="fas fa-angle-right"></span></a>

			</div>
		</div>
	</section>
	<?php if($configuracao['opt_box_vermelho_titulo_en']):?>
	<section class="section-knowing">		
		<div class="contain-free-test">			
			<div class="content-free-test">
				
				<h3><?php echo $configuracao['opt_box_vermelho_titulo_en']; ?></h3>
				<?php 	 if($configuracao['opt_box_vermelho_tituloLink_en']): ?>
				<a class="button-teste-gratis transition" href="<?php echo $configuracao['opt_box_vermelho_tituloLink_en']; ?>">Teste Grátis<span class="fas fa-angle-right"></span></a>	
				<?php endif; ?>		
			</div>					
		</div>
	</section>
	<?php endif;?>
<?php get_footer('en'); ?>