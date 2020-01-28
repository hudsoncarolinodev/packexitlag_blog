<?php
/**
 * packexitlag_blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package packexitlag_blog
 */

if ( ! function_exists( 'packexitlag_blog_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function packexitlag_blog_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on packexitlag_blog, use a find and replace
		 * to change 'packexitlag_blog' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'packexitlag_blog', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'packexitlag_blog' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'packexitlag_blog_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'packexitlag_blog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function packexitlag_blog_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'packexitlag_blog_content_width', 640 );
}
add_action( 'after_setup_theme', 'packexitlag_blog_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function packexitlag_blog_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'packexitlag_blog' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'packexitlag_blog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'packexitlag_blog_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function packexitlag_blog_scripts() {


	//FONTS
	// wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf');
	wp_enqueue_style( 'googleapis', 'https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800,900&display=swap');
	//wp_enqueue_style( 'cloudflare', 'https://cdnjs.cloudflare.com/ajax/libs/hamburgers/1.1.3/hamburgers.min.css');
	//wp_enqueue_style( 'jquery', 'https://code.jquery.com/jquery-3.3.1.min.js');

	//CSS
	wp_enqueue_style( 'packexitlag_blog-reset', get_template_directory_uri() . '/css/reset.css');
	wp_enqueue_style( 'packexitlag_blog-style', get_stylesheet_uri() );

	//JAVA SCRIPT
	//wp_enqueue_script( 'packexitlag_blog-scripts', get_template_directory_uri() . '/js/scripts.js' );
	// wp_enqueue_script( 'packexitlag_blog-forms', get_template_directory_uri() . '/js/js-forms.js' );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'packexitlag_blog_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/********************************************
			FUNCÕES EXTRAS
*********************************************/
	//REDUX FRAMEWORK
	if (class_exists('ReduxFramework')) {
		require_once (get_template_directory() . '/redux/sample-config.php');
	}

	//REGISTRAR SVG
	function cc_mime_types($mimes) {
	  $mimes['svg'] = 'image/svg+xml';
	  return $mimes;
	}
	add_filter('upload_mimes', 'cc_mime_types');

	//PAGINAÇÃO
	function pagination($pages = '', $range = 4){
	    $showitems = ($range * 2)+1;
	    global $paged;
	    if(empty($paged)) $paged = 1;

	    if($pages == ''){
	        global $wp_query;
	        $pages = $wp_query->max_num_pages;
	        if(!$pages){
	            $pages = 1;
	        }
	    }

	    if(1 != $pages){

	        echo "<div class=\"paginador\">";
	        //if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
	        //if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
			$htmlPaginas = "";
	        for ($i=1; $i <= $pages; $i++){
	            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
	                $htmlPaginas .= ($paged == $i)? '<a href="' . get_pagenum_link($i) . '" class="numero selecionado">' . $i . '</a>' : '<a href="' . get_pagenum_link($i) . '" class="numero">' . $i . '</a>';
	            }

	        }

	        if ($paged < $pages && $showitems < $pages) echo '<a href="' . get_pagenum_link($paged + 1) . '" class="esquerda"><i class="fa fa-chevron-left" aria-hidden="true"></a></i></a>';
	        	echo $htmlPaginas;

			if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo '<a href="' . get_pagenum_link($pages) . '" class="direita"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>';

	        	echo "</div>\n";

		}

	}

	//FUNÇÃO DE ABREVIAÇÃO DE CARACTER
	function customExcerpt($qtdCaracteres) {
	  $excerpt = get_the_excerpt();
	  $qtdCaracteres++;
	  if ( mb_strlen( $excerpt ) > $qtdCaracteres ) {
	    $subex = mb_substr( $excerpt, 0, $qtdCaracteres - 5 );
	    $exwords = explode( ' ', $subex );
	    $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
	    if ( $excut < 0 ) {
	      echo mb_substr( $subex, 0, $excut );
	    } else {
	      echo $subex;
	    }

	    echo '...';
	  }else{
	    echo $excerpt;
	  }

	}

	// VERSIONAMENTO DE FOLHAS DE ESTILO
	function my_wp_default_styles($styles){
		$styles->default_version = "13012020";
	}
	
	add_action("wp_default_styles", "my_wp_default_styles");

 	// VERSIONAMENTO DE FOLHAS DE ESTILO
	function my_wp_default_scripts($scripts){
		$scripts->default_version = "13012020";
	}
	add_action("wp_default_scripts", "my_wp_default_scripts");




	add_filter( 'rwmb_meta_boxes', 'registraMetaboxes' );
	function registraMetaboxes( $metaboxes ){

		$prefix = 'Exitlag_';

		// METABOX DE DESTAQUE
		$metaboxes[] = array(

			'id'			=> 'detalhesPost',
			'title'			=> 'Detalhes do Destaque - Campos não obrigatórios',
			'pages' 		=> array( 'post' ),
			'context' 		=> 'normal',
			'priority' 		=> 'high',
			'autosave' 		=> false,
			'fields' 		=> array(
				
				array(
					'name'  => 'Deixar em destaque',
					'id'    => "{$prefix}post_carrossel_destaque",
					'desc'  => 'Marque este campo para deixar o post em destaque na página inicial',
					'type'      => 'switch',
				    'style'     => 'rounded',
				    'on_label'  => 'Ativo',
				    'off_label' => 'Inativo',
				),	

				array(
					'name'  => 'DESTAQUE',
					'id'    => "{$prefix}post_carrossel_destaque_Updates",
					'desc'  => 'Marque este campo para adicionar selo DESTAQUE',
					'type'      => 'switch',
				    'style'     => 'rounded',
				    'on_label'  => 'Ativo',
				    'off_label' => 'Inativo',
				),	

				array(
					'name'  => 'Imagem específica para o destaque',
					'id'    => "{$prefix}post_carrossel_destaque_foto",
					'desc'  => 'Adicione uma imagem específica para o banner destaque - tamanho mínimo: 590 x 415',
					'type' => 'single_image',
				),	
								
			),
		);

		// METABOX DE DESTAQUE
		$metaboxes[] = array(

			'id'			=> 'detalhesPost',
			'title'			=> 'Detalhes do Destaque - Campos não obrigatórios',
			'pages' 		=> array( 'posten' ),
			'context' 		=> 'normal',
			'priority' 		=> 'high',
			'autosave' 		=> false,
			'fields' 		=> array(
				
				array(
					'name'  => 'Deixar em destaque',
					'id'    => "{$prefix}posten_carrossel_destaque",
					'desc'  => 'Marque este campo para deixar o post em destaque na página inicial',
					'type'      => 'switch',
				    'style'     => 'rounded',
				    'on_label'  => 'Ativo',
				    'off_label' => 'Inativo',
				),	

				array(
					'name'  => 'UPDATES',
					'id'    => "{$prefix}posten_carrossel_destaque_Updates",
					'desc'  => 'Marque este campo para deixar o post em UPDATES',
					'type'      => 'switch',
				    'style'     => 'rounded',
				    'on_label'  => 'Ativo',
				    'off_label' => 'Inativo',
				),	

				array(
					'name'  => 'Imagem específica para o destaque',
					'id'    => "{$prefix}posten_carrossel_destaque_foto",
					'desc'  => 'Adicione uma imagem específica para o banner destaque - tamanho mínimo: 590 x 415',
					'type' => 'single_image',
				),	
								
			),
		);

		return $metaboxes;
	}

	tipoDestaque();
	// CUSTOM POST TYPE DESTAQUES
	function tipoDestaque() {

		$rotulosDestaque = array(
								'name'               => 'Post en',
								'singular_name'      => 'post en',
								'menu_name'          => 'Posts en',
								'name_admin_bar'     => 'Posts en',
								'add_new'            => 'Adicionar novo',
								'add_new_item'       => 'Adicionar novo post en',
								'new_item'           => 'Novo post en',
								'edit_item'          => 'Editar post en',
								'view_item'          => 'Ver post en',
								'all_items'          => 'Todos os Posts en',
								'search_items'       => 'Buscar post en',
								'parent_item_colon'  => 'Dos Posts en',
								'not_found'          => 'Nenhum post en cadastrado.',
								'not_found_in_trash' => 'Nenhum post en na lixeira.'
							);

		$argsDestaque 	= array(
								'labels'             => $rotulosDestaque,
								'public'             => true,
								'publicly_queryable' => true,
								'show_ui'            => true,
								'show_in_menu'       => true,
								'menu_position'		 => 4,
								'menu_icon'          => 'dashicons-megaphone',
								'query_var'          => true,
								'rewrite'            => array( 'slug' => 'all-posts' ),
								'capability_type'    => 'post',
								'has_archive'        => true,
								'hierarchical'       => false,
								'supports'           => array( 'title','thumbnail', 'editor','excerpt')
							);

		// REGISTRA O TIPO CUSTOMIZADO
		register_post_type('posten', $argsDestaque);

	}

	taxonomiaCategoriaDestaque();
	// TAXONOMIA DE DESTAQUE
		function taxonomiaCategoriaDestaque() {

			$rotulosCategoriaDestaque = array(
				'name'              => 'Categorias de post',
				'singular_name'     => 'Categoria de post',
				'search_items'      => 'Buscar categorias de post',
				'all_items'         => 'Todas as categorias de post',
				'parent_item'       => 'Categoria de post pai',
				'parent_item_colon' => 'Categoria de post pai:',
				'edit_item'         => 'Editar categoria de post',
				'update_item'       => 'Atualizar categoria de post',
				'add_new_item'      => 'Nova categoria de post',
				'new_item_name'     => 'Nova categoria',
				'menu_name'         => 'Categorias de post',
				);

			$argsCategoriaDestaque 		= array(
				'hierarchical'      => true,
				'labels'            => $rotulosCategoriaDestaque,
				'show_ui'           => true,
				'show_admin_column' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'category-post' ),
				);

			register_taxonomy( 'categoriaposten', array( 'posten' ), $argsCategoriaDestaque );

		}	


function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);






	

