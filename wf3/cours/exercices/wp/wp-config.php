<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'test_wp');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'test_wp');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'test_wp');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'u.d(lBFa8b}BB@iOv R$WfWkc=5h5V1oQW3WwoJBP7_)5QXyFd[w6OF}o[7;KXIJ');
define('SECURE_AUTH_KEY',  '78F:/(A6]%[KW{out`v^$`^+^`w``NV~9>U% 8]#&oP3h&4&RaQyqZ)|R?gfbdf&');
define('LOGGED_IN_KEY',    'qPef;l9HZ+h|lUz~6?]ON5_)RnQT>FC1W/%]zp=%VsrGRg}R+l)w~Qt%Pe9n>7|N');
define('NONCE_KEY',        '7:#4i7V*)0BQ5AwvLp)a+newAc%NT4HoPf0].Q#KLDYwPrihcyog?(@:|losd3B?');
define('AUTH_SALT',        'i.>[q:Z6j^;<12YYM9V>,2+aN41v-DN4@y:Csl[`5E_Kwpjs]N;|M<P7f]cmcVre');
define('SECURE_AUTH_SALT', 'Tf`SO.B4/+isbR2QSL$&rp~Z=bSL9wd?[uAr(9;%}ex=31X0a%)AP(eYpRAii%4y');
define('LOGGED_IN_SALT',   'uIYdc~3nyn.KmA(kxiu&g[s)5oY;K$pJMsZxqytnS+(d*~||lp%Ce@]jF<L$a$>!');
define('NONCE_SALT',       '&?b75XXd*wfzC)Bb<`zaSxfj*#PIWHu[g+j`{Nolo3TT7 qR%/Fz)v->|drKSiB{');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d'information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');