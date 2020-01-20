<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'projetos_packexitlag_blog' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '_yu.B!]v9tZpNj~{4U?kfLC+=S7Wk*Z#Oi>MggL 2hm@W>0$^R)1t *?T2{r&Eis' );
define( 'SECURE_AUTH_KEY',  'hN[0~#]~&Kf;(a2S13(imA{3M;m%B7rt.U|ieeH=1M.AxtHblSLES@X:qu]:A0Pk' );
define( 'LOGGED_IN_KEY',    'Q!Ks~6:wFYvH3{JNd5Q*!a`jFu6ZeaALD)ZN|bogRc`ZOiz~PkpIDa=CG7=y0*}X' );
define( 'NONCE_KEY',        'v,{$OswoRx}w(RddW:copk]46`x#hQU`UYOW9zrt2XiK7s|  +Y, [q%T)<AlMvr' );
define( 'AUTH_SALT',        '^DALu}(&qH~/+Z#B9*4yfXq2`^HKZ]5@(;/uJ-mOLVGi7gvR@M>6wVNXr1d0Zo*I' );
define( 'SECURE_AUTH_SALT', 'WK7/94mtMvc**~tv@e>nQ`F]:mIU++!0[=RyRT[%l%B&u,(eH_^`wA2%cK2eXNi:' );
define( 'LOGGED_IN_SALT',   'v8y&=_I<S!KxpI2;<w*_OP5YO`XRYSs[1>^r3uOAiV3jh8.yxX%bAM<BZH$h-8<{' );
define( 'NONCE_SALT',       'O>rzlqYG15ZCPFWA8aDQ@>$<,99r8af96:GeZMz}~1m)rFWm>El/%d<Tj|YU&Bch' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'pk_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
