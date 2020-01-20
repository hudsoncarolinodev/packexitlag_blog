<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package packexitlag_blog
 */

get_header();
?>

	<section class="section-header-blog">
		<div class="container">
			<h1>Blog</h1>
			<nav class="nav-blog">
				<div class="scroll-nav-mobile">
					<ul>
					<li>
						<a class="transition active-link-blog" href="<?php echo esc_url( home_url( '/' ) ); ?>">Início</a>
					</li>
					<li>
						<a class="transition" href="<?php echo esc_url( home_url( '/category/todos-os-posts/' ) ); ?>">Todos os posts</a>
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
			<?php 
				$postDestaque = new WP_Query(
					array(
						'post_type' => 'post',
						'posts_per_page' => 1, 
						'orderby' => 'id',
						'tax_query' => array(
							array(
								'taxonomy' => "category",
								'field'    => 'slug',
								'terms'    => "destaques",
							)
						)
					)
				);
			?>

			<?php
			while($postDestaque->have_posts()): $postDestaque->the_post();
				$imagem_destaque = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' )[0];
				$categoriasPost = get_the_category();
				foreach ($categoriasPost as $categoria){
					$categoriaPostNome = $categoria->name;
					$categoriaPostLink = get_category_link($categoria->cat_ID);
				}
			?>
			<a href="<?php echo get_permalink() ?>" class="main-post-blog">
				<img src="<?php echo $imagem_destaque; ?>" alt="<?php echo get_the_title()?>">
				<div class="contain-main-post-blog">
					<div class="content-main-post-blog">
						<p><?php echo the_time('j M Y'); ?></p>
						<h2><?php echo get_the_title()?></h2>
					</div>
					<div class="star-main-post-blog">
						<span class="far fa-star"></span>
						<p><?= $categoriaPostNome; ?></p>
					</div>
				</div>
			</a>
			<?php endwhile; ?>

			<div class="contain-block-posts-blog">
				<h2>Os mais populares</h2>
				<div class="block-post-blog flex">
					<?php 
						$args = ['numberposts' => 3];
						$recent_posts = wp_get_recent_posts( $args, ARRAY_A );
						foreach($recent_posts as $recent_posts):
								$imagem_destaque = wp_get_attachment_image_src( get_post_thumbnail_id($recent_posts['ID'] ), 'full' )[0];
					?>
					<a href="<?php echo  get_permalink($recent_posts['ID']) ?>" class="each-post-blog">
						<div class="img-post-blog">
							<img src="<?php echo $imagem_destaque ?>" alt="<?php echo $recent_posts['post_title'] ?>">
						</div>
						<h3 class="title-post-blog"><?php echo $recent_posts['post_title'] ?></h3>
						<div class="cat-post-blog flex">
							<p>07 de de setembro de 2019 </p>
							<span>|</span>
							<p>Jogos</p>
						</div>
					</a>
				  <?php endforeach;?>
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
				<a class="button-all-posts-blog transition" href="<?php echo esc_url( home_url( '/category/todos-os-posts/' ) ); ?>">ver todos os posts <span class="fas fa-angle-right"></span></a>

			</div>
		</div>
	</section>

	<section class="section-knowing">		
		<div class="contain-free-test">			
			<div class="content-free-test">
				<h3>Teste grátis por 3 dias,</h3>
				<h3>sem cadastro do cartão de crédito! Conheça o ExitLag.</h3>
				<a class="button-teste-gratis transition" href="https://www.exitlag.com/pt/teste-gratis">Teste Grátis<span class="fas fa-angle-right"></span></a>			
			</div>					
		</div>
	</section>

<?php
get_footer();
