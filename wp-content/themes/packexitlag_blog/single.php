<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package packexitlag_blog
 */
wpb_set_post_views(get_the_ID());
global $post;

$imagem_post = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' )[0];

$categoriaAtual = get_the_category();
$idPostAtual = $post->ID;

foreach($categoriaAtual as $categoriaAtual) {
	$idCategoriaAtual = $categoriaAtual->cat_ID;
}

get_header();

?>

<section class="section-header-blog">
	<div class="container">
		<h1>Blog</h1>
		<nav class="nav-blog">
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

			<div class="search-blog">
				<input type="text" name="search-blog" id="search-blog" placeholder="Buscar">
				<button class="fas fa-search"></button>
			</div>
		</nav>
		<span class="border-cat-blog-post"></span>
	</div>
</section>

<section class="section-content-blog">
	<div class="container">
		<div class="contain-blog-post">
			<a class="link-back-blog-post transition" href="javascript: history.go(-1)"><span class="fas fa-angle-left"></span>Voltar</a>
			<h2><?php echo get_the_title(); ?></h2>
			<div class="cat-post-blog flex">
				<p><?php echo the_time('j \d\e F \d\e Y'); ?></p>
				<span>|</span>
				<?php 
					foreach($categoriaAtual as $categoria) {
						echo '<p>' . $categoria->name . '</p>';
					}
				?>
			</div>
			<div class="main-post-blog">
				<img src="<?php echo $imagem_post; ?>" alt="<?php echo get_the_title(); ?>">
			</div>
			<div class="content-blog-post">
				<?php while(have_posts()){ the_post(); echo the_content(); } ?>
			</div>				
			<div class="share-blog-post">
				<h3>Compartilhe</h3>
				<div class="contain-share-blog-post">
					<a class="transition share" href="https://twitter.com/intent/tweet?original_referer=https://www.exitlag.com/pt;source=tweetbutton&amp;text=Com&nbsp;o&nbsp;nosso&nbsp;sistema&nbsp;você&nbsp;garante&nbsp;rotas&nbsp;otimizadas&nbsp;e&nbsp;estabilidade&nbsp;na&nbsp;conexão&nbsp;do&nbsp;servidor,&nbsp;melhorando&nbsp;seu&nbsp;desempenho&nbsp;nos&nbsp;jogos!&nbsp;https://www.exitlag.com/pt">
						<span class="fab fa-twitter"></span>
					</a>
					<a class="transition share" href="http://www.facebook.com/share.php?u=https://www.exitlag.com/pt">
						<span class="fab fa-facebook-f"></span>
					</a>
					<a class="transition share" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=https://www.exitlag.com/pt">
						<span class="fab fa-linkedin-in"></span>
					</a>
					<a class="transition share" href="mailto:info@example.com?&subject=&body=<?php echo get_permalink(); ?>">
						<span class="far fa-envelope"></span>
					</a>
				</div>										
			</div>
		</div>
		<div class="contain-block-posts-blog post-blog-related">
			<h2>Post relacionados</h2>
			<div class="block-post-blog flex">

				<?php
					$relacionados = new WP_Query( array( 'post_type' => 'post', 'orderby' => 'id', 'posts_per_page' => 4 ) );

					while($relacionados->have_posts()): $relacionados->the_post();
						$fotoRelacionados = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' )[0];
						$idPostRelacionado = $post->ID;

						global $post;

						$categoriaPostRelacionado = get_the_category();

						foreach($categoriaPostRelacionado as $categoriaPostRelacionado):
							$idCateogriaRelacionado = $categoriaPostRelacionado->cat_ID;

							if($idCategoriaAtual == $idCateogriaRelacionado && $idPostAtual != $idPostRelacionado):
				?>

				<a href="<?php echo get_permalink(); ?>" class="each-post-blog">
					<div class="img-post-blog">
						<img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' )[0]; ?>" alt="<?php echo get_the_title(); ?>">
					</div>
					<h3 class="title-post-blog"><?php echo get_the_title(); ?></h3>
					<div class="cat-post-blog flex">
						<p>Ler Post</p>
						<span class="fas fa-angle-right"></span>
					</div>
				</a>

				<?php endif; endforeach; endwhile; wp_reset_query(); ?>

			</div>
		</div>

		<div class="pagination-post-blog">
			<?php previous_post_link('%link', '<span class="fas fa-angle-left"></span>Post anterior'); ?>
			<a class="transition" href="<?php echo  home_url( '/todos-os-posts/' ); ?>">Todos os posts</a>
			<?php next_post_link('%link', 'próximo post<span class="fas fa-angle-right"></span>'); ?>
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

<?php get_footer();