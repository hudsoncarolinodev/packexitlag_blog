<?php
/**
 * The template for displaying archive pages
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
			</div>

			<div class="search-blog">
				<form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
					<input type="text" name="s" id="search" placeholder="Buscar">
					<button type="submit" class="fas fa-search"></button>
				</form>
			</div>
		</nav>
		<span class="border-cat-blog-post"></span>
	</div>
</section>

<section class="section-content-blog">
	<div class="container">		

		<div class="contain-block-posts-blog">
			<h2>Destaques</h2>

			<?php
				while(have_posts()): the_post();
					$imagem_post = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' )[0];
					$categoriasPost = get_the_category();
			?>

			<a href="post.html" class="each-post-blog margin-each-post-blog flex">
				<div class="img-post-blog">
					<img src="<?php echo $imagem_post; ?>" alt="<?php echo get_the_title(); ?>">
				</div>
				<div class="container-post-blog">
					<h3 class="title-post-blog"><?php echo get_the_title(); ?></h3>
					<div class="cat-post-blog flex">
						<p><?php echo the_date('j \d\e F \d\e Y') ; ?></p>
						<span>|</span>
						<?php 
							foreach ($categoriasPost as $categoria){
								echo '<p>' . $categoria->name . '</p>';
							}
						?>
					</div>
					<p class="paragraph-post-blog"><?php echo get_the_excerpt(); ?></p>
				</div>					
			</a>

			<?php endwhile; wp_reset_query(); ?>

			<div class="pagination-blog">
				<button class="fas fa-angle-left"></button>
				<div class="box-pagination-blog">
					1
				</div>
				<button class="fas fa-angle-right"></button>
				<p>de</p>
				<p>50</p>
			</div>

		</div>
	</div>
</section>

<section class="section-knowing">		
	<div class="contain-free-test">			
		<div class="content-free-test">
			<h3>Teste grátis por 3 dias,</h3>
			<h3>sem cadastro do cartão de crédito! Conheça o ExitLag.</h3>
			<a class="button-teste-gratis transition" href="cadastro.html">Teste Grátis<span class="fas fa-angle-right"></span></a>			
		</div>					
	</div>
</section>

<?php get_footer();