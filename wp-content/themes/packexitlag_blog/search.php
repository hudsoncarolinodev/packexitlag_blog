<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package packexitlag_blog
 */

get_header();
?>


<section class="section-content-blog">
	<div class="container">		

		<div class="contain-block-posts-blog">
			<h2><?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Resultado da pesquisa por: %s', 'packexitlag_blog' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1></h2>

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

			
		</div>
	</div>
</section>
<?php
get_footer();
