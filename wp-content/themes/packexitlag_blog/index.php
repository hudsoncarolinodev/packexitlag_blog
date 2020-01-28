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
$current_category = get_queried_object();
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
							<a class="transition" href="<?php echo esc_url( home_url( '/' ) ); ?>">Início</a>
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
							<a  class="transition <?php if($current_category->name == $categorias->name){echo "active-link-blog";}?>" href="<?php echo $linkCategoria; ?>"><?php echo $nomeCategoria; ?></a>
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
			<h2>Todos os posts</h2>

			<?php
				while(have_posts()): the_post();
					$imagem_post = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' )[0];
					$categoriasPost = get_the_category();
			?>

			<a href="<?php echo get_permalink();?>" class="each-post-blog margin-each-post-blog flex">
				<div class="img-post-blog">
					<img src="<?php echo $imagem_post; ?>" alt="<?php echo get_the_title(); ?>">
				</div>
				<div class="container-post-blog">
					<h3 class="title-post-blog"><?php echo get_the_title(); ?></h3>
					<div class="cat-post-blog flex">
						<p><?php echo the_time('j \d\e F \d\e Y') ; ?></p>
						<span>|</span>
						<?php 
							$cont = 0;
							foreach ($categoriasPost as $categoria){
								if($cont == 0){
									echo '<p>' . $categoria->name . '</p>';
								}
								$cont ++;
							}
						?>
					</div>
					<p class="paragraph-post-blog"><?php echo get_the_excerpt(); ?></p>
				</div>					
			</a>

			<?php endwhile; wp_reset_query(); ?>

			<div class="pagination-blog">
				<!-- <button class="fas fa-angle-left"></button>
				<div class="box-pagination-blog">
					1
				</div>
				<button class="fas fa-angle-right"></button>
				<p>de</p>
				<p>50</p> -->
				<div class="paginador">
					<?php 
					if(function_exists('pagination')){
						pagination($additional_loop->$max_num_pages);
					}
					?>
				</div>
			</div>
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
<?php endif;	?>
<?php
get_footer();
