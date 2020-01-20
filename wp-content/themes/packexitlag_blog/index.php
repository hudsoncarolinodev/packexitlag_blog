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
						<a class="transition active-link-blog" href="blog.html">Início</a>
					</li>
					<li>
						<a class="transition" href="todos-posts.html">Todos os posts</a>
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
				$taxonomia = 'category';
				$listarEmpreendimentos = get_terms( $taxonomia, array(
					'orderby'    => 'count',
					'hide_empty' => 0,
					'parent'	 => 0
				));
					
			?>

			<a href="post.html" class="main-post-blog">
				<img src="<?php echo get_template_directory_uri(); ?>/img/blog/img-post-lg/post-06.jpg" alt="The best upcoming games to keep an eye on this year and the next">
				<div class="contain-main-post-blog">
					<div class="content-main-post-blog">
						<p>09 de setembro de 2019</p>
						<h2>The best upcoming games to keep an eye on this year and the next</h2>
					</div>
					<div class="star-main-post-blog">
						<span class="far fa-star"></span>
						<p>Destaque</p>
					</div>
				</div>
			</a>

			<div class="contain-block-posts-blog">
				<h2>Os mais populares</h2>
				<div class="block-post-blog flex">
					<a href="post.html" class="each-post-blog">
						<div class="img-post-blog">
							<img src="<?php echo get_template_directory_uri(); ?>/img/blog/img-post-md/post-01.jpg" alt="The best multiplayer PC games 2019: Top competitive games to play today">
						</div>
						<h3 class="title-post-blog">The best multiplayer PC games 2019: Top competitive games to play today</h3>
						<div class="cat-post-blog flex">
							<p>07 de de setembro de 2019 </p>
							<span>|</span>
							<p>Jogos</p>
						</div>
					</a>

					<a href="post.html" class="each-post-blog">
						<div class="img-post-blog">
							<img src="<?php echo get_template_directory_uri(); ?>/img/blog/img-post-md/post-02.jpg" alt="Fortnite is back...But It never really went anywhere">
						</div>
						<h3 class="title-post-blog">Fortnite is back...But It never really went anywhere</h3>
						<div class="cat-post-blog flex">
							<p>05 de de setembro de 2019 </p>
							<span>|</span>
							<p>Jogos</p>
						</div>
					</a>

					<a href="post.html" class="each-post-blog">
						<div class="img-post-blog">
							<img src="<?php echo get_template_directory_uri(); ?>/img/blog/img-post-md/post-03.jpg" alt="Legends of Runeterra: All you need to know about Riot's new game">
						</div>
						<h3 class="title-post-blog">Legends of Runeterra: All you need to know about Riot's new game</h3>
						<div class="cat-post-blog flex">
							<p>03 de de setembro de 2019 </p>
							<span>|</span>
							<p>Jogos</p>
						</div>
					</a>
				</div>
			</div>
			
			<div class="contain-block-posts-blog">
				<h2>Últimos posts</h2>

				<a href="post.html" class="each-post-blog margin-each-post-blog flex">
					<div class="img-post-blog">
						<img src="<?php echo get_template_directory_uri(); ?>/img/blog/img-post-sm/post-01.jpg" alt="The best multiplayer PC games 2019: Top competitive games to play today">
					</div>
					<div class="container-post-blog">
						<h3 class="title-post-blog">The best multiplayer PC games 2019: Top competitive games to play today</h3>
						<div class="cat-post-blog flex">
							<p>07 de de setembro de 2019 </p>
							<span>|</span>
							<p>Jogos</p>
						</div>
						<p class="paragraph-post-blog">Welcome to our pick of the best multiplayer PC games of 2019.  If videogames are defined by competition, then there’s nothing more gamey than drawing your controller from its holster and taking on other players. Whether you’re rubbing shoulders with your frenemies on the couch or taking on the world...</p>
					</div>					
				</a>

				<a href="post.html" class="each-post-blog margin-each-post-blog flex">
					<div class="img-post-blog">
						<img src="<?php echo get_template_directory_uri(); ?>/img/blog/img-post-sm/post-02.jpg" alt="Fortnite is back...But It never really went anywhere">
					</div>
					<div class="container-post-blog">
						<h3 class="title-post-blog">Fortnite is back...But It never really went anywhere</h3>
						<div class="cat-post-blog flex">
							<p>05 de de setembro de 2019 </p>
							<span>|</span>
							<p>Jogos</p>
						</div>
						<p class="paragraph-post-blog">Fortnite is back for another round with Chapter 2, which launched (again) worldwide yesterday. After a massive world-ending black hole event - dubbed “The End” - consumed everything (which included the previous island, lobby, and game itself), Fortnite has finally returned after being offline for almost 40 hours...</p>
					</div>					
				</a>

				<a href="post.html" class="each-post-blog margin-each-post-blog flex">
					<div class="img-post-blog">
						<img src="<?php echo get_template_directory_uri(); ?>/img/blog/img-post-sm/post-03.jpg" alt="Legends of Runeterra: All you need to know about Riot's new game">
					</div>
					<div class="container-post-blog">
						<h3 class="title-post-blog">Legends of Runeterra: All you need to know about Riot's new game</h3>
						<div class="cat-post-blog flex">
							<p>03 de de setembro de 2019 </p>
							<span>|</span>
							<p>Jogos</p>
						</div>
						<p class="paragraph-post-blog">Legends of Runeterra is a brand new digital card game from Riot Games. It was just announced as part of Riot’s ten year anniversary stream (along with a number of other hugely exciting projects), and will give players a whole new look at the world of League of Legends, bringing many of its iconic champions to life in a whole new way...</p>
					</div>					
				</a>

				<a href="post.html" class="each-post-blog margin-each-post-blog flex">
					<div class="img-post-blog">
						<img src="<?php echo get_template_directory_uri(); ?>/img/blog/img-post-sm/post-04.jpg" alt="Apex Legends gets a firing range and Daily Challenge re-rolls">
					</div>
					<div class="container-post-blog">
						<h3 class="title-post-blog">Apex Legends gets a firing range and Daily Challenge re-rolls</h3>
						<div class="cat-post-blog flex">
							<p>02 de de setembro de 2019 </p>
							<span>|</span>
							<p>Jogos</p>
						</div>
						<p class="paragraph-post-blog">Fortnite is back for another round with Chapter 2, which launched (again) worldwide yesterday. After a massive world-ending black hole event - dubbed “The End” - consumed everything (which included the previous island, lobby, and game itself), Fortnite has finally returned after being offline for almost 40 hours...</p>
					</div>					
				</a>

				<a href="post.html" class="each-post-blog margin-each-post-blog flex">
					<div class="img-post-blog">
						<img src="<?php echo get_template_directory_uri(); ?>/img/blog/img-post-sm/post-05.jpg" alt="Network Maitenance">
					</div>
					<div class="container-post-blog">
						<h3 class="title-post-blog">Network Maitenance</h3>
						<div class="cat-post-blog flex">
							<p>01 de de setembro de 2019 </p>
							<span>|</span>
							<p>Jogos</p>
						</div>
						<p class="paragraph-post-blog">We will be performing upgrades and network maintenance on all our servers. During this maintenance window unavailability is expected. Scheduled timeframe: Start: Thursday July 25 2019 at 17:00 UTC / July 25 14:00 BRT End: Thursday July 25 2019 at 18:00 UTC / July 25 15:00 BRT...</p>
					</div>					
				</a>

				<a class="button-all-posts-blog transition" href="todos-posts.html">ver todos os posts <span class="fas fa-angle-right"></span></a>

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

<?php
get_footer();
